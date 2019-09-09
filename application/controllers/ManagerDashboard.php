<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 25-10-2016
 * Time: 16:07
 *Description: controller for manager dashboard
 */
class ManagerDashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('ManagerDashboardModel');
    }
    public function index()
    {
        if($this->session->userdata('ci_session')){
            $this->load->view('managerDashView', array('error' => 'custom-error' ));
        }
        else{
            redirect(base_url());
        }
    }
    public function acceptfile(){
        /*    $userFile=$this->input->post('userfile');*/
        $this->ManagerDashboardModel->readFile();
    }

}
