<?php
require_once('../../vendor/autoload.php');

use App\SQLiteConnection;
use App\SQLite;

$postID = $_POST['postid'];
$categoryID = $_POST['categoryid'];

$result = true;
try {
    $pdo = (new SQLiteConnection())->connect();
} catch (Exception $e) {
    $result =  'ERROR: '.$e;
}
$sqlite = new SQLite($pdo);
$postID = $sqlite->insertPost($postID, $categoryID);
$categoryID = $sqlite->getPostById($categoryID);
$result = count($categoryID);



$output = ['result' => $result];
exit(json_encode($output));