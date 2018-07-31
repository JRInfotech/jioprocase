<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Developer
 */
class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('user');
        $this->load->model('Users_model','users');
    }
    public function index() {
        if ($this->user->jio_logged_in_front) {
            $data['title'] = "Home";
            $data['dashboard'] = TRUE;
            redirect('Home');
        } else {
            $data['title'] = "Login";
            $data['login'] = TRUE;
            $this->load->view('login', $data);
        }
    }
    public function dologin() {
        if ($this->user->jio_logged_in_front) {
            $data['title'] = "Home";
            $data['dashboard'] = TRUE;
            //$this->load->view('index', $data);
            redirect('Home');
        } else {
            if (!$this->input->post('submit')) {
                $data['title'] = "Login";
                $data['login'] = TRUE;
                $this->load->view('Login', $data);
            } else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                if ($this->user->login($username, $password)) {
                    redirect('Home', 'location');
                } else {
                    $data['title'] = "Login";
                    $data['msg'] = 'User Name Or Password is Wong .<br> Please try again.';
                    $this->load->view('Login', $data);
                }
            }
        }
    }
    function logout() {
        $this->user->logout();
        redirect('Login');
    }
    public function sign_up() {
        if ($this->user->jio_logged_in_front) {
            $data['title'] = "Home";
            $data['dashboard'] = TRUE;
            redirect('Home');
        } else {
            $data['title'] = "Login";
            $data['login'] = TRUE;
            $this->load->view('sing_up', $data);
        }
    }
    public function register_user() {
        if ($this->user->jio_logged_in_front) {
            $data['title'] = "Home";
            $data['dashboard'] = TRUE;
            //$this->load->view('index', $data);
            redirect('Home');
        } else {
            if (!$this->input->post('sign_up')) {
                $data['title'] = "Login";
                $data['login'] = TRUE;
                $this->load->view('sing_up', $data);
            } else {
                $username = trim($this->input->post('userName'));
                $phone_no = trim($this->input->post('phone_no'));
                $password = trim($this->input->post('password'));
                $refral_code = trim($this->input->post('referral_code'));
                // Check referral code 
                if(json_decode($this->check_referral_code($refral_code))){
                    $referralId=$this->users->checkReferralCode($refral_code);
                    if(!isset($referralId)){
                        $refence_by=0;
                    }else{
                        $refence_by=$referralId->u_id;
                    }
                    $userInfo=array(
                        'userName'=>$username,
                        'phone_no'=>$phone_no,
                        'password'=> md5($password),
                        'refence_by'=>$refence_by,
                        'referral_code'=>$this->referral_code_creat()
                    );
                    $registerFlag=$this->user->registerNew($userInfo);
                    if ($registerFlag) {
                        redirect('checkOtp/'.$registerFlag, 'location');
                    } else {
                        $data['title'] = "Login";
                        $data['msg'] = 'User Name Or Password is Wong .<br> Please try again.';
                        $this->load->view('Login', $data);
                    }
                }else{
                     redirect('login/sign_up');
                }
            }
        }
    }
    public function check_username() {
        $json = json_encode(true);
        $userName = $this->users->checkUserName(trim($this->input->get('userName')));
        if ($userName)
            $json = json_encode(false);
        echo $json;
    }
    public function check_referral_code($referralCode ='') {
        $json = false;
        if($this->input->get('referral_code')){
            $referralCode=trim($this->input->get('referral_code'));
        }
        if($referralCode != 'first'){
            $referral_code = $this->users->checkReferralCode($referralCode);
            if ($referral_code)
                $json = true;
        }else{
            $json = true;
        }
         if($this->input->get('referral_code')){
            echo json_encode($json);
         }else{
             return $json;
         }
    }
    public function referral_code_creat() {
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $res = "";
        for ($i = 0; $i < 5; $i++) {
            $res .= $chars[mt_rand(0, strlen($chars)-1)];
        }
        return $res;
    }

    public function otpView($userDetail)
    {
        if ($this->user->jio_logged_in_front) {
            $data['title'] = "Home";
            $data['dashboard'] = TRUE;
            redirect('Home');
        } else {
            $userDetail=$this->users->getUserDetail($userDetail);
            if(isset($userDetail) && count($userDetail) > 0){
                $data['title'] = "Otp View";
                $data['otp'] = TRUE;
                $data['phoneNo']=$userDetail->phone_no;
                $data['id']=$userDetail->u_id;
            $this->load->view('otpView', $data);
            }else{
                redirect('login');
            }
            
        }
    }

    public function verifiedOtp()
    {
        $opt=$this->input->post('otp');
        $id=$this->input->post('id');
        $userDetail=$this->users->getUserDetail($id);
       // echo "<prE>";print_r($userDetail);die;
        if(trim($userDetail->user_otp) == trim($opt)){
            //Update OTP Status
            $update=$this->users->updateOTPStatus($id,trim($opt));
            if($update){
                $this->users->userOtpConfirm($id);
                $user=new stdClass();
                $user->user_id=$id;
                $user->username=$userDetail->userName;
                $this->user->_start_session($user);
                redirect('Home','location');
            }
        }else{
            $this->session->set_flashdata('woringOtp','Invalid OTP <br> Please try again....');
            redirect('checkOtp/'.$userDetail->u_id, 'location');
        }
    }
}
