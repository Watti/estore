<?php

class Stock extends CI_Controller {

    public function index() {
        $this->home();
    }

    public function home() {
        $this->load->model('item_model');
        
        $data['main_content'] = "item_view";
        $this->load->view("layouts/main", $data);
    }

    public function add() {
        $data['main_content'] = "addstockitem_form";
        $this->load->view("layouts/main", $data);
    }
    
    public function add_db() {
        $this->load->model('item_model');
        $this->item_model->add_item();
        
        redirect(base_url() . 'item');
    }

}
