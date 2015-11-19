<?php

class Stock extends CI_Controller {

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
        if ($this->isAccessDenied("stock"))
        {
            redirect(base_url());
        }
        
        $this->load->model('stock_model');
        $this->load->model('item_model');
        $this->load->model('itemcategory_model');
        $this->load->model('itemprice_model');
        
        $data['main_content'] = "stock_view";
        $this->load->view("layouts/main", $data);
    }

    public function add($item_id) {
        if ($this->isAccessDenied("stock/add"))
        {
            redirect(base_url());
        }
        
        $this->load->model('itemprice_model');
        
        $data['main_content'] = "addstockitem_form";
        $data['item_id'] = base64_decode(urldecode($item_id));
        $this->load->view("layouts/main", $data);
    }
    
    public function add_db() {
        if ($this->isAccessDenied("stock/add_db"))
        {
            redirect(base_url());
        }
        
        $this->load->model('stock_model');
        $this->stock_model->add_stockitem();
        
        redirect(base_url() . 'stock');
    }

    public function update($item_id) {
        if ($this->isAccessDenied("stock/update"))
        {
            redirect(base_url());
        }
        
        $this->load->model('stock_model');
        $this->load->model('itemprice_model');
        
        $data['main_content'] = "updatestockitem_form";
        $data['item_id'] = base64_decode(urldecode($item_id));
        $this->load->view("layouts/main", $data);
    }
    
    public function update_db() {
        if ($this->isAccessDenied("stock/update_db"))
        {
            redirect(base_url());
        }
        
        $this->load->model('stock_model');
        $this->stock_model->update_stockitem();
        
        redirect(base_url() . 'stock');
    }
    
    public function delete($stock_id) {
        if ($this->isAccessDenied("stock/delete"))
        {
            redirect(base_url());
        }
        
        $this->load->model('stock_model');
        $this->stock_model->delete_stockitem(base64_decode(urldecode($stock_id)));

        redirect(base_url() . 'stock');
    }
    
    // For Ajax
    public function ajax_get_matching_items($bill_id, $item_code)
    {
        //echo 'Item Code : ' . $item_code;
        $this->load->model('stock_model');
        $this->load->model('itemcategory_model');
        $this->load->model('itemprice_model');
        $matching_items = $this->stock_model->get_matching_items($item_code);
        
        $data['stockitems'] = $matching_items;
        $data['bill_id'] = $bill_id;
        $this->load->view("stockitem_table_view", $data);
    }
}
