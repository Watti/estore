<?php

class ItemPrice_model extends CI_Model {

    public function add_item_price() {
        $data = array(
            'itemprice_code' => $this->input->post('itemprice_code'),
            'unit_price' => $this->input->post('unit_price'),
            'discount_type' => $this->input->post('discount_type'),
            'deleted' => 0
        );

        $this->db->insert('item_price', $data);
    }

    public function update_item_price() {
        $data = array(
            'itemprice_code' => $this->input->post('itemprice_code'),
            'unit_price' => $this->input->post('unit_price'),
            'discount_type' => $this->input->post('discount_type'),
            'deleted' => $this->input->post('deleted')
        );

        $this->db->where('itemprice_id', $this->input->post('itemprice_id'));
        $this->db->update('item_price', $data);
    }
    
    public function delete_item_price($item_price_id) {
        $this->db->delete('item_price', array('itemprice_id' => $item_price_id));
    }

    public function get_item_price_by_id($item_price_id) {
        $this->db->where('itemprice_id', $item_price_id);
        $result = $this->db->get('item_price');

        if ($result->num_rows() > 0) {
            return $result->row(0);
        }
        return FALSE;
    }

    public function get_all_item_prices() {
        $qry = $this->db->get('item_price');

        if ($qry->num_rows() > 0) {
            return $qry->result();
        }
        return FALSE;
    }

}
