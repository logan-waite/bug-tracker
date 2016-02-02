<?php foreach($issues as $issue): ?>
    <?php
        $statusID = $issue->statusID;
        switch ($statusID) {
            case 1:
                $status_class = "badge-urgent";
                break;
            case 2:
                $status_class = "badge-pending";
                break;
            case 3:
                $status_class = "badge-progress";
                break;
            case 4:
                $status_class = "badge-testing";
                break;
            case 5:
                $status_class = 'badge-closed';
                break;
            default:
                $status_class = "";
        }
    ?>
    <div class="nav-pills" id='issue<?php echo $issue->id ?>' onclick="choose_issue('choose_issue', <?php echo $issue->id ?>)">
        <p><span class='badge <?=$status_class?>'>0</span> <?php echo $issue->name ?></p>
    </div>
<?php endforeach ?>
