<html>
    <head>
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
        <?=link_tag(base_url().'assets/css/stylesheet.css')?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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
                    $("#issue-tools").removeClass("hidden");
                    $(".issue-id").attr('value', id);
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
                var url = '<?php echo base_url(); ?>index.php/ajax/sort_by/active';
                $.post(url, {'sort_by' : sort_by}, function(result) {
                    $("#issue-list").html(result);
                    if (sort_by == 'priority') {
                        $('#date').removeClass('sort_active');
                        $('#priority').addClass('sort_active');
                    } else if (sort_by == 'date') {
                        $('#priority').removeClass('sort_active');
                        $('#date').addClass('sort_active');
                    }
                });
            }
            
            function change_status(id) {
                var url = '<?php echo base_url(); ?>index.php/ajax/change_status';
                var issueID = $(".issue-id").attr("value");
                var sort_by = $(".sort_active").attr('id');
                var state = 'active';
                
                $.post(url, {'status_id' : id, 'issue_id' : issueID, 'sort_by' : sort_by, 'active' : state}, function(result) {
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