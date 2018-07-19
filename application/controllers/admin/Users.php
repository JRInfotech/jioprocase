<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users3
 *
 * @author Developer
 */
class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Users_model','user');
    }
    public function index(){
        $data['title']="Users";
        $data['view']="admin/users/list";
        $data['js']="admin/users/js";
        $data['user']=$this->user->getAllUsers(1);
        $this->load->view('admin/layout',$data);
    }
}
