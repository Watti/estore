<?php

class ItemPrice extends CI_Controller {

    public function index() {
        $this->home();
    }

    public function home() {
        $this->load->model('itemprice_model');

        $data['main_content'] = "itemprice_view";
        $this->load->view("layouts/main", $data);
    }

    public function add() {
        $data['main_content'] = "additemprice_form";
        $this->load->view("layouts/main", $data);
    }

    public function add_db() {
        $this->load->model('itemprice_model');
        $this->itemprice_model->add_item_price();

        redirect(base_url() . 'itemprice');
    }
    
    public function update($itemprice_id) {
        $this->load->model('itemprice_model');
        $data['main_content'] = "updateitemprice_form";
        $data['itemprice_id'] = base64_decode(urldecode($itemprice_id));
        $this->load->view("layouts/main", $data);
    }

    public function update_db() {
        $this->load->model('itemprice_model');
        $this->itemprice_model->update_item_price();

        redirect(base_url() . 'itemprice');
    }

    public function delete($itemprice_id) {
        $this->load->model('itemprice_model');
        $this->itemprice_model->delete_item_price(base64_decode(urldecode($itemprice_id)));
        
        redirect(base_url() . 'itemprice');
    }

}
