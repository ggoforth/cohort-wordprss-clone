<?php

include "db.php";

if (!isset($_POST['post_id'])) {
    die('You can only comment on an existing post');
}

$data = $_POST;
$sql = sprintf('INSERT INTO comments (post_id, comment) VALUES (%d, "%s")', $data['post_id'], $data['comment']);

DB::insert($sql);

header(sprintf('Location: http://localhost:8080/wordpress?id=%s', $data['post_id']));
