<?php

require_once('../vendor/autoload.php');

use App\Rest;
use App\SQLiteConnection;
use App\SQLiteCreateTable as SQLiteCreateTable;
use App\SQLite;

$data = new Rest('https://jsonplaceholder.org/posts');
$posts = $data->getData();

try {
    $pdo = (new SQLiteConnection())->connect();
    echo 'Connected to the SQLite database successfully!';
} catch (Exception $e) {
    echo 'ERROR: ' . $e;
}
$sqlite = new SQLiteCreateTable((new SQLiteConnection())->connect());
$sqlite->createTables();
$sqlite = new SQLite($pdo);




require_once('../include/head.php');
//var_dump($posts);
?>

<div class="container">
    <div class="news_block">
        <?php
        foreach ($posts

        as $post): ?>
        <?php
        $date = str_replace('/', '-', $post['updatedAt']);
        $date = str_replace(' ', 'T', $date);
        $date = date("d-m-Y", strtotime($date));
        $countCategory = new \App\CountCategory($posts, $post['category']);
        $categoryID = $sqlite->getPostById($post['category']);
        ?>
        <div class="news_item">
            <div class="block_title">
                <h1><?= $post['title'] ?></h1>
                <div class="date_publish"><?= $date ?></div>
            </div>
            <div class="block_category">
                <div class="category">Категория: <?= $post['category'] ?>(<?= $countCategory->getCountCategory() ?>)</div>
                <div class="favorite">
                    <a href="javascript:void(0);" data-category="<?= $post['category'] ?>"
                       data-post="<?= $post['id'] ?>">Добавить в избранное</a>
                    <div id="preloader"></div>
                    <div class="result-wrapper">
                       <span id="result">(<?=count($categoryID)?>)</span>
                    </div>
                </div>
            </div>
                <div class="content_block">
                    <div class="image"><img src="<?= $post['thumbnail'] ?>" alt="<?= $post['title'] ?>"></div>
                    <div class="content"><?= $post['content'] ?></div>
                </div>
            </div>
            <?php
            endforeach; ?>
        </div>
    </div>
    </body>
    <script src="assets/js/script.js"></script>
    </html>
