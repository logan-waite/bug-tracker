<html>
    <head>
        <style>
            nav {
                padding: 10px;
                border-radius: 5px;
                background: #e7e7e7;
                background: linear-gradient(#eee, #ddd);
            }
            .btn {
                display: inline-block;
                padding: 6px;
                margin: 0px 5px;
                background-color: #c7c7c7;
                background: linear-gradient(#efefef, #c7c7c7);
                border: 1px solid #e7e7e7;
                border-radius: 5px;
                cursor: pointer;
                box-shadow: 2px 2px 5px #555;
                font-family: Verdana, Geneva, sans-serif;
            }
            .btn:hover {
                background: linear-gradient(#c7c7c7, #efefef);
            }
        
            #issue-list {
                border: 1px solid blue;
                float: left;
            }
            #comment-list {
                border: 1px solid green;
                float: left;
            }
        </style>
    </head>
    
    <body>
        <h1>Bugtracker 1.0</h1>
        
        <nav>
            <div class="btn">
                New Issue
            </div>
<!--            <div class="btn">
                Current Issues
            </div>  -->
        </nav>
        <div>
            <h2>
                Current Issues
            </h2>
            <div id="issue-list">
                <?php foreach($issues as $issue): ?>
                    <div class="">
                        <?php echo $issue->name ?>
                    </div><br>
                <?php endforeach ?>
            </div>
            <div id="comment-list">
                <?php foreach($comments as $comment): ?>
                    <div class="">
                        <?php // print_r($comment) ?>
                        <h5><?php echo $comment->title ?></h5>
                        <p><?php echo $comment->content ?></p>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </body>

</html>