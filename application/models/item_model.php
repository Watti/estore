<?php

class Item_model extends CI_Model {

    public function add_item() {
        $data = array(
            'itemcategory_id' => $this->input->post('itemcategory_id'),
            'item_code' => $this->input->post('item_code'),
            'item_name' => $this->input->post('item_name'),
            'bar_code' => $this->input->post('bar_code'),
            'unit' => $this->input->post('unit'),
            'description' => $this->input->post('description'),
            'deleted' => 0
        );

        $this->db->insert('item', $data);
    }

    public function update_item() {
        $checked = 0;
        if ($this->input->post('deleted')) {
            $checked = 1;
        }
            
        $data = array(
            'itemcategory_id' => $this->input->post('itemcategory_id'),
            'item_code' => $this->input->post('item_code'),
            'item_name' => $this->input->post('item_name'),
            'bar_code' => $this->input->post('bar_code'),
            'unit' => $this->input->post('unit'),
            'description' => $this->input->post('description'),
            'deleted' => $checked
        );

        $this->db->where('item_id', $this->input->post('item_id'));
        $this->db->update('item', $data);
    }
    
    public function delete_item($item_id) {
        $this->db->delete('item', array('item_id' => $item_id));
    }

    public function get_item_by_id($item_id) {
        $this->db->where('item_id', $item_id);
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
