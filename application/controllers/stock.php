<?php

class Stock extends CI_Controller {

    public function index() {
        $this->home();
    }

    public function home() {
        $this->load->model('stock_model');
        $this->load->model('item_model');
        $this->load->model('itemcategory_model');
        $this->load->model('itemprice_model');
        
        $data['main_content'] = "stock_view";
        $this->load->view("layouts/main", $data);
    }

    public function add($item_id) {
        $this->load->model('itemprice_model');
        
        $data['main_content'] = "addstockitem_form";
        $data['item_id'] = base64_decode(urldecode($item_id));
        $this->load->view("layouts/main", $data);
    }
    
    public function add_db() {
        $this->load->model('stock_model');
        $this->stock_model->add_stockitem();
        
        redirect(base_url() . 'stock');
    }

    public function update($item_id) {
        $this->load->model('stock_model');
        $this->load->model('itemprice_model');
        
        $data['main_content'] = "updatestockitem_form";
        $data['item_id'] = base64_decode(urldecode($item_id));
        $this->load->view("layouts/main", $data);
    }
    
    public function update_db() {
        $this->load->model('stock_model');
        $this->stock_model->update_stockitem();
        
        redirect(base_url() . 'stock');
    }
    
    public function delete_db($stock_id) {
        $this->load->model('stock_model');
        $this->stock_model->delete_stockitem(base64_decode(urldecode($stock_id)));

        redirect(base_url() . 'stock');
    }
    
}
