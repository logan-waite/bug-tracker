<html>
    <head>
    
    </head>
    
    <body>
        <h1>This is my first View!</h1>
        
        <p>
            <?php foreach($records as $row) : ?>
            
                <h2><?php echo $row->bug_name; ?></h2>
                <p><?php echo $row->bug_description; ?> </p>
            
            <?php endforeach; ?>
        </p>
    
    </body>

</html>