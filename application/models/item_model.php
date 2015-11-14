<?php

class Item_model extends CI_Model {

    public function add_item() {
        $data = array(
            'type' => $this->input->post('item_type'),
            'bar_code' => $this->input->post('bar_code'),
            'unit' => $this->input->post('unit'),
            'quantity' => $this->input->post('quantity'),
            'minimum_quantity' => $this->input->post('minimum_quantity'),
            'remarks' => $this->input->post('remarks'),
            'item_code' => $this->input->post('item_code')
        );

        $this->db->insert('item', $data);
    }

    public function update_item() {
        $data = array(
            'type' => $this->input->post('item_type'),
            'bar_code' => $this->input->post('bar_code'),
            'unit' => $this->input->post('unit'),
            'quantity' => $this->input->post('quantity'),
            'minimum_quantity' => $this->input->post('minimum_quantity'),
            'remarks' => $this->input->post('remarks'),
            'item_code' => $this->input->post('item_code')
        );

        $this->db->where('id', $this->input->post('item_id'));
        $this->db->update('item', $data);
    }
    
    public function delete_item($item_id) {
        $this->db->delete('item', array('id' => $item_id));
    }

    public function get_item_by_id($item_id) {
        $this->db->where('id', $item_id);
        $result = $this->db->get('item');

        if ($result->num_rows() > 0) {
            return $result->row(0);
        }
        return FALSE;
    }

    public function get_all_items() {
        $qry = $this->db->get('item');

        if ($qry->num_rows() > 0) {
            return $qry->result();
        }
        return FALSE;
    }

}
