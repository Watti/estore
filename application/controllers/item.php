<?php

class Item extends CI_Controller {

    public function index() {
        $this->home();
    }

    public function home() {
        $this->load->model('item_model');
        
        $data['main_content'] = "item_view";
        $this->load->view("layouts/main", $data);
    }

    public function add() {
        $this->load->model('item_model');
    }
    
    public function update() {
        $this->load->model('item_model');
    }
    
    public function delete() {
        $this->load->model('item_model');
    }
    
    public function view() {
        $this->load->model('item_model');
        
    }
}
