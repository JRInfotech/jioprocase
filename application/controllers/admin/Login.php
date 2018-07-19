<?php

/**
 * Description of Login
 *
 * @author Jatin
 */
class Login extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->library('administration');
    }
    public function index() {
        if ($this->administration->jio_logged_in) {
            $data['title'] = "Home";
            $data['dashboard'] = TRUE;
            redirect('admin/Home');
        } else {
            $data['title'] = "Login";
            $data['login'] = TRUE;
            $this->load->view('admin/Login', $data);
        }
    }
    public function dologin() {
        if ($this->administration->jio_logged_in) {
            $data['title'] = "Home";
            $data['dashboard'] = TRUE;
            //$this->load->view('admin/index', $data);
            redirect('admin/Home');
        } else {
            
            if (!$this->input->post('submit')) {
                $data['title'] = "Login";
                $data['login'] = TRUE;
                $this->load->view('admin/Login', $data);
            } else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                if ($this->administration->login($username, $password)) {
                    redirect('admin/Home', 'location');
                } else {
                    $data['title'] = "Login";
                    $data['msg'] = 'User Name Or Password is Wong .<br> Please try again.';
                    $this->load->view('admin/Login', $data);
                }
            }
        }
    }
    function logout() {
        $this->administration->logout();
        redirect('admin/Login');
    }
}
