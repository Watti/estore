<?php

class ItemCategory extends CI_Controller {

    public function index() {
        $this->home();
    }

    public function home() {
        $this->load->model('itemcategory_model');

        $data['main_content'] = "itemcategory_view";
        $this->load->view("layouts/main", $data);
    }

    public function add() {
        $data['main_content'] = "additemcategory_form";
        $this->load->view("layouts/main", $data);
    }

    public function add_db() {
        $this->load->model('itemcategory_model');
        $this->itemcategory_model->add_item_category();

        redirect(base_url() . 'itemcategory');
    }

    public function update($itemcategory_id) {
        $this->load->model('itemcategory_model');
        $data['main_content'] = "updateitemcategory_form";
        $data['itemcategory_id'] = base64_decode(urldecode($itemcategory_id));
        $this->load->view("layouts/main", $data);
    }

    public function update_db() {
        $this->load->model('itemcategory_model');
        $this->itemcategory_model->update_item_category();

        redirect(base_url() . 'itemcategory');
    }

    public function delete($itemcategory_id) {
        $this->load->model('itemcategory_model');
        $this->itemcategory_model->delete_item_category(base64_decode(urldecode($itemcategory_id)));
        
        redirect(base_url() . 'itemcategory');
    }

}
