<html>
    <head>
        <?=link_tag(base_url().'assets/css/stylesheet.css')?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
               // $(".nav-pills:first").addClass("active");
                $("#header").html("Current Issues");
            });

            function choose_issue(id) {
                var url = '<?php echo base_url(); ?>index.php/ajax/choose_issue';
                //Send POST request to server
                $.post(url, {'issueID' : id}, function(result) {
                    // Set current issue class to .active
                    $("#issue-list").on("click", ".nav-pills:not(.active)", function (event) {
                        $(".active", event.delegateTarget).removeClass("active");
                        $(this).addClass("active");
                    });
                    // Plug resulting view into comment box
                    $("#comment-list").html(result);

                });
            }
            
            function add_issue_view() {
                var url = '<?php echo base_url(); ?>index.php/ajax/new_issue';
                $.post(url, function(result) {
                    $("#header").html("Add Issue");
                    $("#main-wrapper").html(result);
                });
            }
            
            function current_issue_view() {
                var url = '<?php echo base_url(); ?>index.php/ajax/current_issues';
                $.post(url, function(result) {
                    $("#main-wrapper").html(result);
                    $("#header").html("Current Issues");
                });
            }
            
            function order_by(sort_by) {
                var url = '<?php echo base_url(); ?>index.php/ajax/sort_by';
                $.post(url, {'sort_by' : sort_by}, function(result) {
                    $("#issue-list").html(result);
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
            <div id='header'>
                
            </div>
        </nav>
        
        <div id='main-wrapper'>
            <?php $this->load->view('current_issues'); ?>
        </div>
    
    </body>

</html>