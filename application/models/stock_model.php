<?php

class Stock_model extends CI_Model {

    public function add_stockitem() {
        $data = array(
            'item_id' => $this->input->post('item_id'),
            'itemprice_id' => $this->input->post('itemprice_id'),
            'qty' => $this->input->post('qty'),
            'min_qty' => $this->input->post('min_qty'),
            'deleted' => 0
        );

        $this->db->insert('stock', $data);
    }

    public function update_stockitem() {
        $checked = 0;
        if ($this->input->post('deleted')) {
            $checked = 1;
        }
        $data = array(
            'item_id' => $this->input->post('item_id'),
            'itemprice_id' => $this->input->post('itemprice_id'),
            'qty' => $this->input->post('qty'),
            'min_qty' => $this->input->post('min_qty'),
            'deleted' => $checked
        );

        $this->db->where('stock_id', $this->input->post('stock_id'));
        $this->db->update('stock', $data);
    }

    public function delete_stockitem($stock_id) {
        $this->db->delete('stock', array('stock_id' => $stock_id));
    }

    public function get_stockitem_by_id($stock_id) {
        $this->db->where('stock_id', $stock_id);
        $result = $this->db->get('stock');

        if ($result->num_rows() > 0) {
            return $result->row(0);
        }
        return FALSE;
    }

    public function get_stockitem_by_item_id($item_id) {
        $this->db->where('item_id', $item_id);
        $result = $this->db->get('stock');

        if ($result->num_rows() > 0) {
            return $result->row(0);
        }
        return FALSE;
    }

    public function get_all_stockitems() {
        $qry = $this->db->get('stock');

        if ($qry->num_rows() > 0) {
            return $qry->result();
        }
        return FALSE;
    }

    public function get_matching_items($item_code) {
        $sql = "SELECT stock.stock_id,item.item_id,item.item_code,item.item_name,".
                "stock.itemprice_id,item.unit,item.itemcategory_id,item.description ".
                "FROM item JOIN stock ON item.item_id=stock.item_id AND item.item_code LIKE '%" .
                $this->db->escape_like_str($item_code) . "%'";
        $qry = $this->db->query($sql);
        
        if ($qry->num_rows() > 0) {
            return $qry->result();
        }
        return FALSE;
    }

}
