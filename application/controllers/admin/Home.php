<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author Jatin
 */
class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('administration');
    }
    public function index() {
        $data['title']="Dashboard";
        $data['view']="admin/dashboard";
        $this->load->view('admin/layout',$data);
    }
}
