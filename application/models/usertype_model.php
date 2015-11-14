<?php

class UserType_model extends CI_Model {

    public function get_usertype_by_id($usertype_id) {
        $this->db->where('usertype_id', $usertype_id);
        $result = $this->db->get('usertype');

        if ($result->num_rows() > 0) {
            return $result->row(0);
        }
        return FALSE;
    }

}
