<div>
    <h2>
        Current Issues
    </h2>
   <div id="issue-list">
        <?php foreach($issues as $issue): ?>
            <div class="nav-pills" onclick="choose_issue(<?php echo $issue->id ?>)">
                <p><?php echo $issue->name ?></p>
            </div>
        <?php endforeach ?>
    </div>
    <div id="comment-list">
        
    </div>
</div>   