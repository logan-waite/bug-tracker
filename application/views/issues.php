<div style="margin-top: 10px; margin-bottom: 10px">
   Sort by: 
   <div class='btn btn-small'>Date</div>
   <div class='btn btn-small' onclick="order_by('priority')">Priority</div>
</div>
<?php foreach($issues as $issue): ?>
    <?php
        $priorityID = $issue->priorityID;
        switch ($priorityID) {
            case 1:
                $priority_class = "badge-urgent";
                break;
            case 2:
                $priority_class = "badge-pending";
                break;
            case 3:
                $priority_class = "badge-progress";
                break;
            case 4:
                $priority_class = "badge-testing";
                break;
            default:
                $priority_class = "";
        }
    ?>
    <div class="nav-pills" onclick="choose_issue(<?php echo $issue->id ?>)">
        <p><span class='badge <?=$priority_class?>'>0</span> <?php echo $issue->name ?></p>
    </div>
<?php endforeach ?>
