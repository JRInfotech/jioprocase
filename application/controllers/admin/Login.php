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
            redirect('admin/home');
        } else {
            $data['title'] = "Login";
            $data['login'] = TRUE;
            $this->load->view('admin/login', $data);
        }
    }
    public function dologin() {
        if ($this->administration->jio_logged_in) {
            $data['title'] = "Home";
            $data['dashboard'] = TRUE;
            //$this->load->view('admin/index', $data);
            redirect('admin/home');
        } else {
            
            if (!$this->input->post('submit')) {
                $data['title'] = "Login";
                $data['login'] = TRUE;
                $this->load->view('admin/login', $data);
            } else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                if ($this->administration->login($username, $password)) {
                    redirect('admin/home', 'location');
                } else {
                    $data['title'] = "Login";
                    $data['msg'] = 'Invalid Login. Please try again.';
                    $this->load->view('admin/login', $data);
                }
            }
        }
    }
    function logout() {
        $this->administration->logout();
        redirect('admin/login');
    }
}
