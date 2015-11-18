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
        $data['main_content'] = "bill_view";
        $this->load->view("layouts/main", $data);
    }
    
    public function add() {
        if ($this->isAccessDenied("bill/add"))
        {
            redirect(base_url());
        }
        
        $this->load->model('bill_model');
        $this->load->model('sales_model');
        $this->load->model('stock_model');
        $this->load->model('itemprice_model');
        
        $this->load->library('billstatus');
        $this->load->library('paymentmethod');
        
        $uId = $this->session->userdata('user_id');
        $payMethod = PaymentMethod::CASH;
        $billStatus = BillStatus::PENDING;
        
        $billId = $this->bill_model->add_biling_item($uId,0,$payMethod,$billStatus);
        $data['bill_id'] = base64_encode(urlencode($billId));
        $data['main_content'] = "addbill_form";
        $this->load->view("layouts/main", $data);
    }

    public function add_db() {
        if ($this->isAccessDenied("bill/add_db"))
        {
            redirect(base_url());
        }
        redirect(base_url() . 'bill');
    }

}
