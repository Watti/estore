<?php

class AddBill_model extends CI_Model {

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
}