<?php

require_once('../vendor/autoload.php');

use App\Rest;

$data = new Rest('https://jsonplaceholder.org/posts');
$posts = $data->getData();


require_once('../include/head.php');
//var_dump($posts);
?>

<div class="container">
    <div class="news_block">
        <?php
        foreach ($posts as $post):?>
            <?php
            $date = str_replace('/', '-', $post['updatedAt']);
            $date = str_replace(' ', 'T', $date);
            $date = date("d-m-Y", strtotime($date));
            $countCategory = new \App\CountCategory($posts, $post['category']);
            ?>
            <div class="news_item">
                <div class="block_title">
                    <h1><?= $post['title'] ?></h1>
                    <div class="date_publish"><?= $date ?></div>
                </div>
                <div class="block_category">
                    <div class="category">Категория: <?= $post['category'] ?>(<?= $countCategory->getCountCategory() ?>)
                    </div>
                    <div class="favorit">Добавить в избранное <i class="fa fa-heart" aria-hidden="true"> </i></div>
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
</html>
