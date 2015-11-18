<?php

class Sales_model extends CI_Model {

    public function add_item($stock_id, $bill_id, $quantity,$discount,$total) {
        $data = array(
            'stock_id' => $stock_id,
            'bill_id' => $bill_id,
            'quantity' => $quantity,
            'discount' => $discount,
            'total' => $total,
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
