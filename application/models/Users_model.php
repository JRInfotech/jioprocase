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
        $this->db->insert('user',$data);
        return $this->db->insert_id();
    }
    public function set_user_otp($data) {
        return $this->db->insert('user_otp',$data);
    }

    public function getUserDetail($id)
    {
        $this->db->where('u.u_id', $id);
        $this->db->where('otp.confirm', 0);
        $this->db->join('user_otp as otp','otp.user_id=u.u_id');
        return $this->db->get('user as u')->row();
    }
    public function updateOTPStatus($id,$otp) {
        $this->db->where('user_id',$id);
        $this->db->where('user_otp',$otp);
        return $this->db->update('user_otp',array('confirm'=>1));
    }
    public function userOtpConfirm($id) {
        $this->db->where('u_id',$id);
        return $this->db->update('user',array('otp_confirm'=>'1'));
    }
}
