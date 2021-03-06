<?php

class Sale_model extends CI_Model {

    public function add_item($stock_id, $bill_id, $quantity, $discount, $total) {
        $data = array(
            'stock_id' => $stock_id,
            'bill_id' => $bill_id,
            'quantity' => $quantity,
            'discount' => $discount,
            'total' => $total,
            'deleted' => 0
        );

        $this->db->insert('sale', $data);
    }

    public function is_already_exists($bill_id, $stock_id) {
        $this->db->where('bill_id', $bill_id);
        $this->db->where('stock_id', $stock_id);
        $qry = $this->db->get('sale');

        if ($qry->num_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    public function update_quantity_and_total($sale_id, $stock_id, $bill_id, $quantity, $total, $discount) {

        $condition_array = array('bill_id' => $bill_id, 'sale_id' => $sale_id, 'stock_id' => $stock_id);
        $this->db->where($condition_array);
        $data = array(
            'quantity' => $quantity,
            'total' => $total,
            'discount' => $discount
        );
        $this->db->update('sale', $data);
    }

    public function get_billitems_for_bill_id($bill_id) {
        $this->db->where('bill_id', $bill_id);
        $qry = $this->db->get('sale');

        if ($qry->num_rows() > 0) {
            return $qry->result();
        }
        return FALSE;
    }

    public function get_all_sales() {
        $qry = $this->db->get('sale');

        if ($qry->num_rows() > 0) {
            return $qry->result();
        }
        return FALSE;
    }

    public function remove($sale_id, $stock_id, $bill_id) {

        $this->db->delete('sale', array('sale_id' => $sale_id, 'stock_id' => $stock_id, 'bill_id' => $bill_id));
    }

    public function mark_as_deleted($bill_id) {

        $this->db->where('bill_id', $bill_id);
        $data = array(
            'deleted' => 1
        );
        $this->db->update('sale', $data);
    }

    public function get_total_for_bill_id($bill_id) {
        $this->db->group_by('bill_id');
        $this->db->where('bill_id', $bill_id);
        $this->db->select_sum('total');
        $qry = $this->db->get('sale');

        if ($qry->num_rows() > 0) {
            return $qry->row()->total;
        }
        return FALSE;
    }

}
