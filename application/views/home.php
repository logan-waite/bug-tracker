<html>
    <head>
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <?=link_tag(base_url().'assets/css/stylesheet.css')?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src='<?=base_url()?>assets/js/javascript.js'></script>
    
    </head>
    
    <body>
        <div id='header'>
            <?php $this->load->view('header'); ?>
        </div>
        <nav>
            <div class="btn" onclick="add_issue_view('new_issue')">
                New Issue
            </div>
            <div class="btn" onclick="current_issue_view('current_issues')">
                Current Issues
            </div>
            <div id='title'>
                
            </div>
        </nav>
        
        <div id='main-wrapper'>
            <?php $this->load->view('current_issues'); ?>
        </div>
    
    </body>

</html>