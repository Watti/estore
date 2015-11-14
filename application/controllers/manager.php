<?php

class Manager extends CI_Controller {

    public function index() {
        $this->home();
    }

    public function home() {
        $data['main_content'] = "manager_view";
        $this->load->view("layouts/main", $data);
    }

}
