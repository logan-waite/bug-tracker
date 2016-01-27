<div>
    <div style="margin-top: 10px; margin-bottom: 10px">
        Sort by: 
        <div class='btn btn-small sort_active' id='date' onclick="order_by('date')">Date</span></div>
        <div class='btn btn-small' id='priority' onclick="order_by('priority')">Priority</div>
    </div>
    <div id="issue-list">
        <?php $this->load->view('issues') ?>
    </div>
    <div id="comment-list">
        
    </div>
    <div id="issue-tools" class='hidden' role='tablist'>
        <?php $this->load->view('issue_tools'); ?>
    </div>
</div>   