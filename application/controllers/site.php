<?php

class Site extends CI_Controller {

    function index() {
        
        session_start();
        
        //$_SESSION['user'] = 'Logan';
        
        if (!isset($_SESSION['user']))
        {
            $this->load->view('login');
        }
        else
        {
            echo $_SESSION['user'];
            $this->load->model('issue_model');
            $data['issues'] = $this->issue_model->get_active_issues();
            $this->load->view('home', $data);
        }
    }
    
    function load_header() {
        session_start();
        
        $this->load->model('user_model');
        $user['user'] = $this->user_model->get_logged_in_user($_SESSION['user']);
        $this->load->view('header', $user);
    }
}