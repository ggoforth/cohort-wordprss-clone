<?php

$error_reporting = true;

if ($error_reporting) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

include "db.php";
include "functions.php";

$id = isset($_GET['id']) ? $_GET['id'] : null;
$posts = get_posts($id);

if (is_single_page() && has_posts($posts)) {
    $comments = get_comments($id);
}

include "posts.php";
