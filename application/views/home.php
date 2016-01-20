<html>
    <head>
    
    </head>
    
    <body>
        <h1>This is my first View!</h1>
        
        <p>
            <?php foreach($records as $row) : ?>
            
                <h2><?php echo $row->bug_name; ?></h2>
            
            <?php endforeach; ?>
        </p>
    
    </body>

</html>