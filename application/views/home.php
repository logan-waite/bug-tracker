<html>
    <head>
        <?=link_tag(base_url().'assets/css/stylesheet.css')?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script>
            function choose_issue(id) {
                var url = '<?php echo base_url(); ?>index.php/ajax/choose_issue';
                //Send POST request to server
                $.post(url, {'issueID' : id}, function(result) {
                    // Plug resulting view into comment box
                    $("#comment-list").html(result);
                });
            }
            
            function add_issue_view() {
                var url = '<?php echo base_url(); ?>index.php/ajax/new_issue';
                $.post(url, function(result) {
                    $("#main-wrapper").html(result);
                });
            }
            
            function current_issue_view() {
                var url = '<?php echo base_url(); ?>index.php/ajax/current_issues';
                $.post(url, function(result) {
                    $("#main-wrapper").html(result);
                });
            }
</script>
    
    </head>
    
    <body>
        <h1>Bugtracker 1.0</h1>
        
        <nav>
            <div class="btn" onclick="add_issue_view()">
                New Issue
            </div>
            <div class="btn" onclick="current_issue_view()">
                Current Issues
            </div>
        </nav>
        
        <div id='main-wrapper'>
            <?php $this->load->view('current_issues'); ?>
        </div>
    
    </body>

</html>