
<div>
        <?php foreach($comments as $comment): ?>
            <div class="comment">
                <h4><?php echo $comment->title ?></h4>
                <p><?php echo $comment->content ?></p>
            </div>
        <?php endforeach ?>
</div>
