<?php

class Item extends CI_Controller {

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
        if ($this->isAccessDenied("item"))
        {
            redirect(base_url());
        }
        
        $this->load->model('item_model');
        $this->load->model('itemcategory_model');
        $this->load->model('itemprice_model');
        $this->load->model('stock_model');

        $data['main_content'] = "item_view";
        $this->load->view("layouts/main", $data);
    }

    public function add() {
        if ($this->isAccessDenied("item/add"))
        {
            redirect(base_url());
        }
        
        $this->load->model('itemcategory_model');
        
        $data['main_content'] = "additem_form";
        $this->load->view("layouts/main", $data);
    }

    public function add_db() {
        if ($this->isAccessDenied("item/add_db"))
        {
            redirect(base_url());
        }
        
        $this->load->model('item_model');
        $this->item_model->add_item();

        redirect(base_url() . 'item');
    }

    public function update($item_id) {
        if ($this->isAccessDenied("item/update"))
        {
            redirect(base_url());
        }
        
        $this->load->model('item_model');
        $this->load->model('itemcategory_model');
        
        $data['main_content'] = "updateitem_form";
        $data['item_id'] = base64_decode(urldecode($item_id));
        $this->load->view("layouts/main", $data);
    }

    public function update_db() {
        if ($this->isAccessDenied("item/update_db"))
        {
            redirect(base_url());
        }
        
        $this->load->model('item_model');
        $this->item_model->update_item();

        redirect(base_url() . 'item');
    }

    public function delete($item_id) {
        if ($this->isAccessDenied("item/delete"))
        {
            redirect(base_url());
        }
        
        $this->load->model('item_model');
        $this->item_model->delete_item(base64_decode(urldecode($item_id)));

        redirect(base_url() . 'item');
    }

}
