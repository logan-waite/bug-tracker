<h2>
    New Issue
</h2>
<div id="new-form">
    <?php 
        $form_attributes = array(
            'name'  => 'new-issue-form',
            'cols'  => '100',
            
        );
        $title_data = array(
            'name'  => 'title',
            'id'    => 'title'
        );
        $description_data = array(
            'name'  => 'description',
            'id'    => 'description'
        );

        echo validation_errors();
        echo form_open('/new_issue/create_issue');

        echo form_label('Issue: ', 'title');
        echo "<br>";
        echo form_input($title_data);
        echo "<br>";
        echo form_label('Description: ', 'description');
        echo "<br>";
        echo form_textarea($description_data);
        echo "<br>";
        echo form_submit('submit', 'Submit', "class='btn btn-small'");

        echo form_close();
    ?>
</div>