<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users_model
 *
 * @author jatin
 */
class Users_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function getAllUsers($status='') {
        return $this->db->where('status',$status)->get('user')->result();
    }
}
