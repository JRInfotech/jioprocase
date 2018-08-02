<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ActiveAccount
 *
 * @author Developer
 */
class ActiveAccount extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
    }
    public function index() {
        $data['title']="Active Account";
        $data['view']="activeAccount";
        $this->load->view('layout',$data);
    }
    public function activePlane() {
        $data['title']="Active Plane";
        $data['view']="activePlane";
        $this->load->view('layout',$data);
    }
}
