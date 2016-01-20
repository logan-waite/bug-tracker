<?php

class Site extends CI_Controller {

    function index() {
        $data['myValue'] = "Some string";
        $data['anotherValue'] = "Another string";
        $this->load->view('home', $data);
    }
    
    function about() {
        $this->load->view('about');
    }
}