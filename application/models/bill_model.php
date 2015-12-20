<?php

class Bill_model extends CI_Model {

    public function add_biling_item($user_id, $amount, $payment_method, $status) {
        $data = array(
            'user_id' => $user_id,
            'amount' => $amount,
            'payment_method' => $payment_method,
            'status' => $status,
            'deleted' => 0
        );

        $this->db->insert('bill', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function get_all_bills() {
        $qry = $this->db->get('bill');

        if ($qry->num_rows() > 0) {
            return $qry->result();
        }
        return FALSE;
    }

    public function get_bill_by_id($bill_id) {
        $this->db->where('bill_id', $bill_id);
        $result = $this->db->get('bill');

        if ($result->num_rows() == 1) {
            return $result->row(0);
        }
        return FALSE;
    }

    public function update_as_deleted($bill_id) {
        $this->db->where('bill_id', $bill_id);
        $data = array(
            'deleted' => 1
        );
        $this->db->update('bill', $data);
    }

    public function update_status($bill_id, $status) {
        $this->db->where('bill_id', $bill_id);
        $data = array(
            'status' => $status
        );
        $this->db->update('bill', $data);
    }

    public function update_amount($bill_id, $amount, $payment_method) {
        $this->db->where('bill_id', $bill_id);
        $data = array(
            'amount' => $amount,
            'payment_method' => $payment_method
        );
        $this->db->update('bill', $data);
    }

    public function get_sales_by_user_and_date($user_id) {
        $this->db->where('user_id', $user_id);
        $date = date("Y-m-d");
       $this->db->like('date',$date);  
        $qry = $this->db->get('bill');
        if ($qry->num_rows() > 0) {
            return $qry->result();
        }
        return FALSE;
    }
}
