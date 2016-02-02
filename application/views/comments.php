
<div id='comments'>
    <?php foreach($comments as $comment): ?>
        <div class="comment">
            <?php
                $name = $comment->first_name." ".$comment->last_name;
                if ($name == " ") {
                    $name = "Rogue";
                }
            ?>
            <user>- <?php echo $name ?></user>
            <h4><?php echo $comment->title ?></h4>
            <p><?php echo $comment->content ?></p>
            <i class='fa fa-pencil-square-o' onclick="edit_comment('edit_comment', <?php echo $comment->id ?>)"></i>
            <i class='fa fa-trash-o' onclick="delete_comment('delete_comment', <?php echo $comment->id ?>)"></i>
            <div id="comment<?=$comment->id?>" class="alert"> This is an alert! </div>
        </div>
    <?php endforeach ?>
</div>
