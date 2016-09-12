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
        $this->load->model('comment_model');
        $issueID = $this->comment_model->delete_comment();
        
        $data['comments'] = $this->comment_model->get_comments($issueID);
        $page = $this->load->view('comments', $data, TRUE);
        echo $page;
        //var_dump($data);
        
    }
    
    function edit_comment() 
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
            $issueID = $this->comment_model->edit_comment();
            
            $data['comments'] = $this->comment_model->get_comments($issueID);
            $page = $this->load->view('comments', $data, TRUE);
            echo $page;
        }    
    }
}