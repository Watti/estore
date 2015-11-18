<?php

class Sales_model extends CI_Model {

    public function add_item() {
        $data = array(
            'stock_id' => $this->input->post('stock_id'),
            'bill_id' => $this->input->post('bill_id'),
            'quantity' => $this->input->post('quantity'),
            'discount' => $this->input->post('discount'),
            'total' => $this->input->post('total'),
            'date' => $this->input->post('date'),
            'deleted' => 0
        );

        $this->db->insert('bill', $data);
    }

    public function get_all_sales() {
        $qry = $this->db->get('sales');

        if ($qry->num_rows() > 0) {
            return $qry->result();
        }
        return FALSE;
    }
    
}
