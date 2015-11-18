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

}
