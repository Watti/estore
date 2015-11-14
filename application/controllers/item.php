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
        $data['main_content'] = "additem_form";
        $this->load->view("layouts/main", $data);
    }
    
    public function add_item() {
        $this->load->model('item_model');
        $this->item_model->add_item();
        
        redirect(base_url() . 'item');
    }
    
    public function update($item_id) {
        $this->load->model('item_model');
        $data['main_content'] = "updateitem_form";
        $data['item_id'] = base64_decode(urldecode($item_id));
        $this->load->view("layouts/main", $data);
    }
    
    public function update_item() {
        $this->load->model('item_model');
        $this->item_model->update_item();
        
        redirect(base_url() . 'item');
    }
    
    public function delete($item_id) {
        $this->load->model('item_model');
        $this->item_model->delete_item(base64_decode(urldecode($item_id)));
        
        redirect(base_url() . 'item');
    }

}
