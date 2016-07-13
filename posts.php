<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
          crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Posts!</title>
</head>
<body>
<div class="container">
    <div class="row">
        <h1 class="col-md-12">
            <a href="/wordpress">
                Greg's Blog
            </a>
        </h1>
    </div>
    <?php foreach ($posts as $post): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <?php if (!is_single_page()): ?>
                        <a href="index.php?id=<?php echo $post->id; ?>">
                            <?php $post->the_title() ?>
                        </a>
                        <?php else: ?>
                        <?php $post->the_title() ?>
                        <?php endif; ?>
                    </div>
                    <div class="panel-body">
                        <?php $post->the_content() ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
   
    <?php if (!has_posts($posts)): ?>
    <h2>No post found.</h2>
    <?php endif; ?>
   
    <?php if (is_single_page() && has_posts($posts)): ?>
    <?php include "comments.php"; ?>
    <?php endif; ?>
</div>
</body>
</html>