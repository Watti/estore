<?php

class ItemCategory_model extends CI_Model {

    public function add_item_category() {
        $data = array(
            'itemcategory_code' => $this->input->post('itemcategory_code'),
            'itemcategory_name' => $this->input->post('itemcategory_name'),
            'description' => $this->input->post('description'),
            'deleted' => 0
        );

        $this->db->insert('item_category', $data);
    }

    public function update_item_category() {
        $data = array(
            'itemcategory_code' => $this->input->post('itemcategory_code'),
            'itemcategory_name' => $this->input->post('itemcategory_name'),
            'description' => $this->input->post('description'),
            'deleted' => $this->input->post('deleted')
        );

        $this->db->where('itemcategory_id', $this->input->post('itemcategory_id'));
        $this->db->update('item_category', $data);
    }
    
    public function delete_item_category($item_category_id) {
        $this->db->delete('item_category', array('itemcategory_id' => $item_category_id));
    }

    public function get_item_category_by_id($item_category_id) {
        $this->db->where('itemcategory_id', $item_category_id);
        $result = $this->db->get('item_category');

        if ($result->num_rows() > 0) {
            return $result->row(0);
        }
        return FALSE;
    }

    public function get_all_item_categories() {
        $qry = $this->db->get('item_category');

        if ($qry->num_rows() > 0) {
            return $qry->result();
        }
        return FALSE;
    }

}
