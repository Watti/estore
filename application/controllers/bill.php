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
        if ($this->isAccessDenied("bill")) {
            redirect(base_url());
        }
        $this->load->model('bill_model');
        $data['main_content'] = "bill_view";
        $this->load->view("layouts/main", $data);
    }

    public function add() {

        if ($this->isAccessDenied("bill/add")) {
            redirect(base_url());
        }
        $this->load->model('bill_model');
        $this->load->model('sales_model');
        $this->load->model('stock_model');
        $this->load->model('itemprice_model');

        $this->load->library('billstatus');
        $this->load->library('paymentmethod');

        $current_bill_id = $this->session->billingData('current_bill_id');
        
        if ($current_bill_id != '') {
            //DO SOMETHING! IT EXISTS!
        } else {

            $uId = $this->session->userdata('user_id');
            $payMethod = PaymentMethod::CASH;
            $billStatus = BillStatus::PENDING;

            $bill_id = $this->bill_model->add_biling_item($uId, 0, $payMethod, $billStatus);

            $billingData = array(
                'current_bill_id' => $bill_id
            );

            $this->session->set_billingdata($billingData);
        }
        $data['main_content'] = "addbill_form";
        $this->load->view("layouts/main", $data);
    }

    public function add_db() {
        if ($this->isAccessDenied("bill/add_db")) {
            redirect(base_url());
        }
        
        $this->load->model('bill_model');
        $this->load->model('sales_model');
        $this->load->model('stock_model');
        $this->load->model('itemprice_model');

        $this->load->library('billstatus');
        $this->load->library('paymentmethod');
        
        $itemCode = $this->input->post('item_code');
        $unitPrice = $this->input->post('unit_price');
        $total = $this->input->post('total');
                
        redirect(base_url() . 'bill');
    }

}
