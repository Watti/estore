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

    public function add($bill_id = NULL) {
        if ($this->isAccessDenied("bill/add")) {
            redirect(base_url());
        }

        $this->load->model('item_model');
        $this->load->model('bill_model');
        $this->load->model('sale_model');
        $this->load->model('stock_model');
        $this->load->model('itemprice_model');

//        $this->load->library('billstatus');
//        $this->load->library('paymentmethod');
//
//        if ($bill_id == NULL) {
//            $uId = $this->session->userdata('user_id');
//            $payMethod = PaymentMethod::CASH;
//            $billStatus = BillStatus::PENDING;
//
//            $bill_id = $this->bill_model->add_biling_item($uId, 0, $payMethod, $billStatus);
//            base64_encode(urlencode($bill_id));
//        } else {
//            $bill_id = base64_decode(urldecode($bill_id));
//        }

        $data['main_content'] = "addbill_form";
        $bill_id = base64_decode(urldecode($bill_id));
        $data['bill_id'] = $bill_id;

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

    public function add_billitem($bill_id = NULL) {
//        if ($this->isAccessDenied("bill/add_billitem")) {
//            redirect(base_url());
//        }
        if (isset($bill_id)) {
            $bill_id = base64_decode(urldecode($bill_id));

            $this->load->model('sale_model');
            $bill_items = $this->sale_model->get_billitems_for_bill_id($bill_id);
//            foreach ($bill_items as $item) {
//                $this->sale_model->update_quantity_and_total($item['sale_id'],  $item['stock_id'], $bill_id, $item[""], $item[]);
//            }
            $data['bill_id'] = $bill_id;
        }
        $data['main_content'] = "addbillitem_form";

        $this->load->view("layouts/main", $data);
    }

    public function add_billitem_db() {
        $bill_id = $this->input->post('bill_id');
        $stock_id = $this->input->post('stock_id');
        $this->load->model('bill_model');
        $this->load->model('sale_model');
        if (!isset($bill_id)) {

            $this->load->library('billstatus');
            $this->load->library('paymentmethod');

            $uId = $this->session->userdata('user_id');
            $payMethod = PaymentMethod::CASH;
            $billStatus = BillStatus::PENDING;

            $bill_id = $this->bill_model->add_biling_item($uId, 0, $payMethod, $billStatus);
        }
        //base64_encode(urlencode($bill_id));

        if (!$this->sale_model->is_already_exists($bill_id, $stock_id)) {
            $this->sale_model->add_item($stock_id, $bill_id, 0, 0, 0);
        }
        $url = base_url() . 'bill/add/' . urlencode(base64_encode($bill_id));
        redirect($url);
    }

    public function update_sale() {

        $this->load->model('sale_model');

        $sale_id = $this->input->post('sale_id');
        $stock_id = $this->input->post('stock_id');
        $bill_id = $this->input->post('bill_id');
        $quantity = $this->input->post('quantity');
        $total = $this->input->post('total');
        $discount = $this->input->post('discount');

        $this->sale_model->update_quantity_and_total($sale_id, $stock_id, $bill_id, $quantity, $total, $discount);
        $data['bill_id'] = $bill_id;
    }

}
