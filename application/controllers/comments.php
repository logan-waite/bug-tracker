<?php
class Comments extends CI_Controller {
    
    function create_comment() 
    {
        $this->form_validation->set_rules('commentTitle', 'title', 'required',
                                         array('required' => 'You must have a %s for your issue.')
                                         );
        
        if ($this->form_validation->run() == FALSE)
        {
        //    $this->load->view('new_issue_view');
        }
        else
        {
            $this->load->model("comment_model");
            $this->comment_model->create_comment();
        }
    }
    
    function delete_comment()
    {
        $id = trim($_POST['id']);
        echo "Comment ".$id." deleted!";
    }
}