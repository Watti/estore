<?php

class ItemPrice extends CI_Controller {

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
        if ($this->isAccessDenied("itemprice"))
        {
            redirect(base_url());
        }
        
        $this->load->model('itemprice_model');

        $data['main_content'] = "itemprice_view";
        $this->load->view("layouts/main", $data);
    }

    public function add() {
        if ($this->isAccessDenied("itemprice/add"))
        {
            redirect(base_url());
        }
        
        $data['main_content'] = "additemprice_form";
        $this->load->view("layouts/main", $data);
    }

    public function add_db() {
        if ($this->isAccessDenied("itemprice/add_db"))
        {
            redirect(base_url());
        }
        
        $this->load->model('itemprice_model');
        $this->itemprice_model->add_item_price();

        redirect(base_url() . 'itemprice');
    }
    
    public function update($itemprice_id) {
        if ($this->isAccessDenied("itemprice/update"))
        {
            redirect(base_url());
        }
        
        $this->load->model('itemprice_model');
        $data['main_content'] = "updateitemprice_form";
        $data['itemprice_id'] = base64_decode(urldecode($itemprice_id));
        $this->load->view("layouts/main", $data);
    }

    public function update_db() {
        if ($this->isAccessDenied("itemprice/update_db"))
        {
            redirect(base_url());
        }
        
        $this->load->model('itemprice_model');
        $this->itemprice_model->update_item_price();

        redirect(base_url() . 'itemprice');
    }

    public function delete($itemprice_id) {
        if ($this->isAccessDenied("itemprice/delete"))
        {
            redirect(base_url());
        }
        
        $this->load->model('itemprice_model');
        $this->itemprice_model->delete_item_price(base64_decode(urldecode($itemprice_id)));
        
        redirect(base_url() . 'itemprice');
    }

}
