
<?php session_start() ?>
<div id='comments'>
    <?php foreach($comments as $comment): ?>
        <div class="comment">
            <?php
                $name = $comment->first_name." ".$comment->last_name;
                if ($name == " ") {
                    $name = "Rogue Leader";
                }
            ?>
            <user>- <?php echo $name ?></user>
            <form class='commentForm'>
                <input type='hidden' value='<?php echo $comment->id ?>' name='id'>
                <h4><?php echo $comment->title ?></h4>
                <p><?php echo $comment->content ?></p>
            </form>
            <?php if($_SESSION['userName'] == $name): ?>
            <i class='fa fa-pencil-square-o' onclick="edit_comment(this, <?php echo $comment->id ?>)"></i>
            <i class='fa fa-trash-o' onclick="delete_comment(<?php echo $comment->id ?>)"></i>
            <div id="comment<?=$comment->id?>" class="alert"> This is an alert! </div>
            <?php endif ?>
        </div>
    <?php endforeach ?>
</div>
