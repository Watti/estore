<?php

class Bill extends CI_Controller {

	public function index() {
        $this->home();
    }

    public function home() {
        $this->load->model('bill_model');

        $data['main_content'] = "bill_form";
        $this->load->view("layouts/main", $data);
    }

      /*public function add() {
        $data['main_content'] = "addbill_form";
        $this->load->view("layouts/main", $data);
    }*/

    public function add_db() {
        $this->load->model('bill_model');
        $this->bill_model->add_biling_item();

        redirect(base_url() . 'bill');
    }
}