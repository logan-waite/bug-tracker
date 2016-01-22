<div>
    <?php foreach($comments as $comment): ?>
        <div class="comment">
            <?php // print_r($comment) ?>
            <h4><?php echo $comment->title ?></h4>
            <p><?php echo $comment->content ?></p>
        </div>
    <?php endforeach ?>
</div>
<div id="comment-buttons" class="nav">
    <div class="btn btn-small">
        New Comment
    </div>
</div>