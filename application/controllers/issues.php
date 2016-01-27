<?php
class Issues extends CI_Controller {
    
    function create_issue() 
    {
        $this->form_validation->set_rules('title', 'title', 'required',
                                         array('required' => 'You must have a %s for your issue.')
                                         );
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('new_issue_view');
        }
        else
        {
            $this->load->model("issue_model");
            $this->issue_model->create_issue();
        }
    }
    
    function close_issue() {
        $this->form_validation->set_rules('description', 'description', 'required',
                                         array('required' => 'Please enter a %s.')
                                         );
        
        if ($this->form_validation->run() == FALSE)
        {
            //$this->load->view('home');
        }
        else
        {
            $this->load->model("issue_model");
            $this->issue_model->close_issue();
        }     
    }

}