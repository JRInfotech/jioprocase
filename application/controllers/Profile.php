<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Profile
 *
 * @author Developer
 */
class Profile extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('user');
        if ($this->session->userdata('jio_logged_in_front') != true) {
            redirect('login');
        }
    }
    public function index() {
        $data['title']="Profile";
        $data['view']="profile";
        $this->load->view('layout',$data);
    }
}
