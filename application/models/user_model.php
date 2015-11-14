<?php

class User_model extends CI_Model {

    public function authenticate() {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($this->input->post('password')));

        $result = $this->db->get('user');

        if ($result->num_rows() == 1) {
            return $result->row(0);
        }
        return FALSE;
    }

    public function insert_user($usertype_id) {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'usertype_id' => $usertype_id,
            'display_name' => $this->input->post('display_name')
        );

        $this->db->insert('user', $data);
    }

    public function get_user_by_id($user_id) {
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('user');

        if ($result->num_rows() == 1) {
            return $result->row(0);
        }
        return FALSE;
    }

}
