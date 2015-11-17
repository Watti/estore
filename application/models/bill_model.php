<?php

class Bill_model extends CI_Model {

    public function add_biling_item() {
        $data = array(
            'item_id' => $this->input->post('item_id'),
            'quantity' => $this->input->post('quantity'),
            'discount' => $this->input->post('discount'),
            'total' => $this->input->post('total'),
            'deleted' => 0
        );

        $this->db->insert('bill', $data);
    }

    public function get_all_bills() {
        $qry = $this->db->get('bill');

        if ($qry->num_rows() > 0) {
            return $qry->result();
        }
        return FALSE;
    }

}
