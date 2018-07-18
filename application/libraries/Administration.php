<?php

class Administration {

    var $jio_admin_id = 0;
    var $jio_logged_in = false;
    var $jio_adminname = '';
    var $jio_table = 'admin';
    
    function Administration() {
        $this->obj = & get_instance();
        if (!$this->jio_logged_in != TRUE && $this->obj->uri->segment(2) != 'login') {
            redirect('admin/login');
            exit;
        }
        $this->_session_to_library();
    }

    function _prep_password($password) {
        // Salt up the hash pipe
        // Encryption key as suffix.

        return $this->obj->encrypt->sha1($password . $this->obj->config->item('encryption_key'));
    }

    function _session_to_library() {
        // Pulls session data into the library.

        $this->jio_admin_id = $this->obj->session->userdata('jio_admin_id');
        $this->jio_adminname = $this->obj->session->userdata('jio_adminname');
        $this->jio_logged_in = $this->obj->session->userdata('jio_logged_in');
    }

    function _start_session($user) {
        // $user is an object sent from function login();
        // Let's build an array of data to put in the session.

        $data = array(
            'jio_admin_id' => $user->admin_id,
            'jio_adminname' => $user->username,
            'jio_logged_in' => true,
            'of_admin_login' => true
        );

        $this->obj->session->set_userdata($data);
        $this->_session_to_library();
    }

    function _destroy_session() {
        $data = array(
            'jio_admin_id' => 0,
            'jio_adminname' => '',
            'jio_logged_in' => false,
            'of_admin_login' => false
        );

        $this->obj->session->set_userdata($data);

        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    function login($username, $password) {
        $query = $this->obj->db->get($this->jio_table, 1);

        // First up, let's query the DB.
        // Prep the password to make sure we get a match.
        // And only allow active members.

        $this->obj->db->where('username', $username);
        $this->obj->db->where('password', md5($password));

        $query = $this->obj->db->get($this->jio_table, 1);

        if ($query->num_rows() == 1) {
            // We found a user!
            // Let's save some data in their session/cookie/pocket whatever.

            $user = $query->row();
            //print_r ($user);
            $this->_start_session($user);

            $this->obj->session->set_flashdata('user', 'Login successful...');

            return true;
        } else {
            // Login failed...
            // Couldn't find the user,
            // Let's destroy everything just to make sure.

            $this->_destroy_session();

            $this->obj->session->set_flashdata('user', 'Login failed...');

            return false;
        }
    }

    function logout() {
        $this->_destroy_session();
        $this->obj->session->set_flashdata('user', 'You are now logged out');
    }
}

?>