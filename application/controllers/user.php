<?php

class User extends CI_Controller {

    public function index() {
        $this->login();
    }

    public function login() {
        $data['main_content'] = "login_view";
        $this->load->view("layouts/main", $data);
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('display_name');
        $this->session->unset_userdata('usertype');
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();

        redirect(base_url());
    }

    public function authenticate() {
        $this->load->model('user_model');
        $this->load->model('usertype_model');

        $currentUser = $this->user_model->authenticate();
        if ($currentUser) {
            $currentUserType = $this->usertype_model->get_usertype_by_id($currentUser->usertype_id);
            if (!$currentUserType) {
                $data['login_errors'] = 'Invalid user. Please contact administrator';
                $data['main_content'] = "login_view";
                $this->load->view("layouts/main", $data);
            } else {
                $this->set_session_user($currentUser, $currentUserType);
            }
        } else {
            $data['login_errors'] = 'Login failed. Please enter valid username and password';
            $data['main_content'] = "login_view";
            $this->load->view("layouts/main", $data);
        }
    }

    public function view_profile() {
        $this->load->model('user_model');

        $data['main_content'] = "user_profile";
        $this->load->view("layouts/main", $data);
    }

    public function update_profile() {
        $this->load->model('user_model');
        $result = $this->user_model->authenticate();
        if ($result == FALSE) {
            $data['login_errors'] = 'Old password is incorrect';
        }

        $this->user_model->update_user_profile();

        $data['main_content'] = "user_profile";
        $this->load->view("layouts/main", $data);
    }

    // Private functions
    private function set_session_user($user, $usertype) {
        $userData = array(
            'user_id' => $user->user_id,
            'username' => $user->username,
            'display_name' => $user->display_name,
            'usertype' => $usertype->usertype_name,
            'logged_in' => TRUE
        );

        $this->session->set_userdata($userData);
        $user_page = str_replace(' ', '', strtolower($usertype->usertype_name)); // This will load the usertype controller

        redirect(base_url() . $user_page);
    }

}
