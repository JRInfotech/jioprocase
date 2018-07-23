<?php

class User {

    var $jio_id = 0;
    var $jio_username = '';
    var $table = 'user';
    var $jio_logged_in_front = False;

    function User() {
        date_default_timezone_set('Asia/Kolkata');
        $this->obj = & get_instance();
         if (!$this->jio_logged_in_front != TRUE && $this->obj->uri->segment(1) != 'login') {
            redirect('login');
            exit;
        }
        $this->obj->load->model('Users_model','users');
        $this->_session_to_library();
    }

    function _prep_password($password) {
        // Salt up the hash pipe
        // Encryption key as suffix.

        return $this->obj->encrypt->sha1($password . $this->obj->config->item('encryption_key'));
    }

    function _session_to_library() {
        // Pulls session data into the library.

        $this->jio_id = $this->obj->session->userdata('id');
        $this->jio_username = $this->obj->session->userdata('username');
        $this->jio_logged_in_front = $this->obj->session->userdata('jio_logged_in_front');
    }

    function _start_session($user) {
        // $user is an object sent from function login();
        // Let's build an array of data to put in the session.

        $data = array(
            'jio_id' => $user->user_id,
            'jio_username' => $user->username,
            'jio_logged_in_front' => true
        );

        $this->obj->session->set_userdata($data);
        $this->_session_to_library();
    }

    function _destroy_session() {
        $data = array(
            'jio_id' => 0,
            'jio_username' => '',
            'jio_logged_in_front' => false
        );

        $this->obj->session->set_userdata($data);

        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    function login($username, $password) {
        $query = $this->obj->db->get($this->table, 1);

        // First up, let's query the DB.
        // Prep the password to make sure we get a match.
        // And only allow active members.

        $where="(username = '".$username. "' OR phone_no ='".$username."' )";
        $this->obj->db->where($where);
        $this->obj->db->where('password', md5($password));
        $this->obj->db->where('status', 1);
        $this->obj->db->where('is_deleted', 0);

        $query = $this->obj->db->get($this->table, 1);
        if ($query->num_rows() == 1) {
            // We found a user!
            // Let's save some data in their session/cookie/pocket whatever.

            $user = $query->row();
            $resultUser=$this->obj->of_tbl->getSessionLogData($user->user_id);
            foreach($resultUser as $row){
                $logoutData = array(
                    'logout_time' => DATETIME,
                    'is_login'=>1
                );
                $this->obj->of_tbl->updateSessionLogData($logoutData,$row->user_id);
            }
            $this->_start_session($user);
            $token = $this->obj->of_tbl->getSecureKey();
            $data = array(
                'user_id' => $user->user_id,
                'token' => $token,
                'login_time' => DATETIME
            );
            $this->obj->of_tbl->addSessionLogData($data);
            $this->obj->session->set_flashdata('user', 'Login successful...');

            return $user;
        } else {
            // Login failed...
            // Couldn't find the user,
            // Let's destroy everything just to make sure.

            $this->_destroy_session();

            $this->obj->session->set_flashdata('user', 'Login failed...');

            return false;
        }
    }
    
    public function registerNew($data) {
        $query = $this->obj->db->get($this->table, 1);
        $where="(username = '".$data['userName']. "' OR phone_no ='".$data['phone_no']."' )";
        $this->obj->db->where($where);
        $this->obj->db->where('password', md5($data['password']));
        $query = $this->obj->db->get($this->table, 1);
        
        if ($query->num_rows() == 0) {
            /// Add User Detail  In dataBase
            if($this->obj->db->insert($this->table,$data)){
                // We found a user!
                // Let's save some data in their session/cookie/pocket whatever.
                $user = new stdClass();
                $user->user_id =$this->obj->db->insert_id();
                $user->username=$data['userName'];
                $this->_start_session($user);
                $key=$this->getSecureKey();
                $data = array(
                    'user_id' => $user->user_id,
                    'user_otp' => $this->otp_create() ,
                    'hase_key'=>$key,
                    'expire_date' => date('Y-m-d h:i:s', strtotime(date('Y-m-d h:i:s') . ' +1 day')),
                    'create_date' => date('Y-m-d h:i:s')
                );
                $this->obj->users->set_user_otp($data);
                $this->obj->session->set_flashdata('user', 'Login successful...');
                return true;
            }
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
            $data = array(
                'logout_time' => DATETIME,
                'is_login'=>1
            );
            $this->obj->of_tbl->updateSessionLogData($data,$this->obj->session->userdata('id'));
        $this->_destroy_session();
        $this->obj->session->set_flashdata('user', 'You are now logged out');
    }

    public function getMemberPermission($menu) {
        $data = $this->obj->common->getMemberModulePermission($this->obj->session->userdata('id'));
        if (isset($data['permission_data'])) {
            foreach ($data['permission_data'] as $value) {
                foreach ($value->member_permission as $row) {
                    if ($row->module_slug == $menu) {
                        $data['user_access'][] = $row;
                    }
                    if($menu == 'returns'){
                        if ($row->module_slug == 'return_main' || $row->module_slug == 'return_manage' || $row->module_slug == 'return_receipt' || $row->module_slug == 'po_order') {
                            $data['user_access'][] = $row;
                        }
                    }
                    if($menu == 'portal_store'){
                        if ($row->module_slug == 'portal' || $row->module_slug == 'store' || $row->module_slug =='sub_store' || $row->module_slug == 'tp_price' ) {
                            $data['user_access'][] = $row;
                        }
                    }
                    if($menu == 'orders'){
                        if ($row->module_slug == 'po' || $row->module_slug == 'so' || $row->module_slug == 'ds') {
                            $data['user_access'][] = $row;
                        }
                    }
                    if($menu == 'warehouse'){
                        if ($row->module_slug == 'rack' || $row->module_slug == 'barcode' || $row->module_slug == 'instock' || $row->module_slug == 'check_product' || $row->module_slug == 'shift_product' || $row->module_slug == 'test_barcode' || $row->module_slug == 'check_rack') {
                            $data['user_access'][] = $row;
                        }
                    }
                    if($menu == 'cms'){
                        if ($row->module_slug == 'pnl' || $row->module_slug == 'i_zone' || $row->module_slug == 'order_type' || $row->module_slug == 'courier_type' || $row->module_slug == 'consignment' || $row->module_slug == 'ads') {
                            $data['user_access'][] = $row;
                        }
                    }
                }
            }
        }
        return $data;
    }
    public function otp_create() {
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $res = "";
        for ($i = 0; $i < 6; $i++) {
            $res .= $chars[mt_rand(0, strlen($chars)-1)];
        }
        return $res;
    }
    /**
     * Get secure key
     *
     * @return  string
     */
    public function getSecureKey() {
        $string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $stamp = time();
        $secure_key = '';

        $pre = '';
        for ($p = 0; $p <= 10; $p++) {
            $pre.=substr($string, rand(0, strlen($string) - 1), 1);
        }

        for ($i = 0; $i < strlen($stamp); $i++) {
            $key = substr($string, substr($stamp, $i, 1), 1);
            $secure_key.=(rand(0, 1) == 0 ? $key : (rand(0, 1) == 1 ? strtoupper($key) : rand(0, 9)));
        }

        $post = '';
        for ($p = 0; $p <= 10; $p++) {
            $post.=substr($string, rand(0, strlen($string) - 1), 1);
        }
        return $pre . '-' . $secure_key . $post;
    }
}

?>
