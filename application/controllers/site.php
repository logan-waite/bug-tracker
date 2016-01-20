<?php

class Site extends CI_Controller {

    function index() {
        $this->load->model('bug_model');
        $data['records'] = $this->bug_model->getAll();
        $this->load->view('home', $data);
    }

}