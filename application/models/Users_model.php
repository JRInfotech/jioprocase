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
    public function checkUserName($userName) {
        $this->db->where('userName', $userName);
        return $this->db->get('user')->row();
    }
    public function checkReferralCode($referral_code) {
        $this->db->where('referral_code', $referral_code);
        return $this->db->get('user')->row();
    }
    public function registerNew($data) {
        return $this->db->insert('user',$data);
    }
    public function set_user_otp($data) {
        return $this->db->insert('user_otp',$data);
    }
}
