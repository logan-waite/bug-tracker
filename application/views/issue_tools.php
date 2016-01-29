<div class='panel'>
    <div class="btn btn-small" role='tab' data-toggle='collapse' data-target='#close-window' data-parent='#issue-tools'>
        Close Issue
    </div>
    <div class="collapse" id="close-window">
        <div class='well'>
            <?php echo form_open('issues/close_issue') ?>
                <label for='description'>Description: </label><br>
                <input type='text' name='description' id='description' autocomplete="off">
                <input type='hidden' class='issue-id' name='id'>
                <input type='submit' class='btn btn-small' value='Submit'>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<div class='panel'>
    <div class="btn btn-small" role='tab' data-toggle='collapse' data-target='#change-status' data-parent='#issue-tools'>
        Change Issue Status
    </div>
    <div class="collapse" id="change-status">
        <div class='well'>
            <input type='hidden' class='issue-id' name='id'>
            <span class='badge badge-urgent' onclick='change_status(1)'>Urgent</span><br>
            <span class='badge badge-pending' onclick='change_status(2)'>Pending</span><br>
            <span class='badge badge-progress' onclick='change_status(3)'>In Progress</span><br>
            <span class='badge badge-testing' onclick='change_status(4)'>Testing</span><br>
            <span class='badge badge-closed' data-toggle='collapse' data-target="#close-window">Closed</span> 
        </div>
    </div>
</div>
<div class='panel'>
    <div class="btn btn-small" role='tab' data-toggle='collapse' data-target='#new-comment' data-parent='#issue-tools'>
        New Comment
    </div>
    <div class="collapse" id="new-comment">
        <div class='well'>
            STUFF
        </div>
    </div>
</div>

