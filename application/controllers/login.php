<?php

class Login extends CI_Controller {
 
    function check() {
        
        $this->load->model("user_model");
        
        $result = $this->user_model->check_input();
        
        if(!$result['valid'])
        {
            $data['valid'] = FALSE;
            $this->load->view("login", $data);    
        }
        else 
        {
            session_start();
            $_SESSION['user'] = $result['userID'];
            $_SESSION['userName'] = $result['userName'];
            
            $this->load->model('issue_model');
            $data['issues'] = $this->issue_model->get_active_issues();
            $this->load->view('home', $data);
        }
    }
    
    function new_user() {
        $this->load->view('new_user');
    }
}