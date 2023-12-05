<?php

require_once('../vendor/autoload.php');

use App\Rest;
$data = new Rest('https://jsonplaceholder.org/posts');
$posts = $data->getData();
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>


<?php
foreach ($posts as $post) {
    echo $post['title'].'<br>';
}
?>
    </body>
</html>
