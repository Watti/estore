<?php

class ItemCategory extends CI_Controller {

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
        if ($this->isAccessDenied("itemcategory"))
        {
            redirect(base_url());
        }
        
        $this->load->model('itemcategory_model');

        $data['main_content'] = "itemcategory_view";
        $this->load->view("layouts/main", $data);
    }

    public function add() {
        if ($this->isAccessDenied("itemcategory/add"))
        {
            redirect(base_url());
        }
        
        $data['main_content'] = "additemcategory_form";
        $this->load->view("layouts/main", $data);
    }

    public function add_db() {
        if ($this->isAccessDenied("itemcategory/add_db"))
        {
            redirect(base_url());
        }
        
        $this->load->model('itemcategory_model');
        $this->itemcategory_model->add_item_category();

        redirect(base_url() . 'itemcategory');
    }

    public function update($itemcategory_id) {
        if ($this->isAccessDenied("itemcategory/update"))
        {
            redirect(base_url());
        }
        
        $this->load->model('itemcategory_model');
        $data['main_content'] = "updateitemcategory_form";
        $data['itemcategory_id'] = base64_decode(urldecode($itemcategory_id));
        $this->load->view("layouts/main", $data);
    }

    public function update_db() {
        if ($this->isAccessDenied("itemcategory/update_db"))
        {
            redirect(base_url());
        }
        
        $this->load->model('itemcategory_model');
        $this->itemcategory_model->update_item_category();

        redirect(base_url() . 'itemcategory');
    }

    public function delete($itemcategory_id) {
        if ($this->isAccessDenied("itemcategory/delete"))
        {
            redirect(base_url());
        }
        
        $this->load->model('itemcategory_model');
        $this->itemcategory_model->delete_item_category(base64_decode(urldecode($itemcategory_id)));
        
        redirect(base_url() . 'itemcategory');
    }

}
