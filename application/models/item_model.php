<?php

class Item_model extends CI_Model {

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
