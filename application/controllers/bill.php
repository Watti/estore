<?php

class Bill extends CI_Controller {

    public function isAccessDenied($url) {
        $perm = $this->session->userdata('permission');
        if ($perm) {
            $permission = explode(",", $perm);
            if (in_array($url, $permission)) {
                return FALSE;
            }
        }
        return TRUE;
    }

    public function index() {
        $this->home();
    }

    public function home() {
        if ($this->isAccessDenied("bill"))
        {
            redirect(base_url());
        }
        
        $this->load->model('bill_model');

        $data['main_content'] = "bill_form";
        $this->load->view("layouts/main", $data);
    }

    public function add_db() {
        if ($this->isAccessDenied("bill/add_db"))
        {
            redirect(base_url());
        }

        $this->load->model('bill_model');
        $this->bill_model->add_biling_item();

        redirect(base_url() . 'bill');
    }

}
