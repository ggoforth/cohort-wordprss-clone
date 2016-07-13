<h2>Comments</h2>
<div class="comments">
    <?php foreach ($comments as $comment): ?>
    <div class="comment">
        <div class="panel-danger panel">
            <div class="panel-body">
                <?php echo $comment['comment']; ?> 
            </div>
        </div>  
    </div>
    <?php endforeach; ?>
</div>
<form action="comment.php" method="post">
    <div class="panel panel-default">
        <div class="panel-heading">We'd love to hear from you!</div>
        <div class="panel-body">
                <textarea name="comment"
                          class="form-control"
                          style="height: 10em;"
                          id="comment"></textarea>
        </div>
        <div class="panel-footer">
            <button type="submit"
                    class="btn btn-block btn-primary">Send Comment
            </button>
        </div>
    </div>
    <input type="hidden" name="post_id" value="<?php echo $post->id ?>">
</form>
