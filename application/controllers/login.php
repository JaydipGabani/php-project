<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('loginModel');
    }

    public function index()
    {
        $this->load->view('index');
    }

    public function validate()
    {

        $uname = $this->input->post('uname');
        $pass = $this->input->post('pass');
        $this->loginModel->login($uname, $pass);
    }

    public function logout()
    {

        $this->loginModel->logout();
    }
}
