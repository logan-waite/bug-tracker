<div class="btn btn-small" data-toggle='collapse' data-target='#close-window' data-parent='#issue-list'>
    Close Issue
</div>
<div class="collapse" id="close-window">
    <div class='well'>
        <?php form_open('issues/') ?>
            <label for='description'>Description: </label><br>
            <input type='text' name='description' id='description'>
            <input type='submit' class='btn btn-small' value='Submit'>
        <?php form_close() ?>
    </div>
</div>
<div class="btn btn-small" data-toggle='collapse' data-target='#change-status' data-parent='#issue-list'>
    Change Issue Status
</div>
<div class="collapse" id="change-status">
    <div class='well'>
        STUFF
    </div>
</div>
<div class="btn btn-small" data-toggle='collapse' data-target='#new-comment' data-parent='#issue-list'>
    New Comment
</div>
<div class="collapse" id="new-comment">
    <div class='well'>
        STUFF
    </div>
</div>
