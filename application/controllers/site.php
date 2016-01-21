<?php

class Site extends CI_Controller {

    function index() {
        $this->load->model('issue_model');
        $this->load->model("comment_model");

        $data['issues'] = $this->issue_model->get_all_issues();
        $data['comments'] = $this->comment_model->get_comments();
        $this->load->view('home', $data);
    }

}