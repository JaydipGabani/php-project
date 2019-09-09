<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 10-02-2017
 * Time: 17:37
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class issueController extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('ci_session')['role'] == 1) {
            $data['role'] = 'admin';
            $data['issued'] = '';
            $this->load->view('headerView', $data);
            $this->load->view('issueView', $data);
        } else {
            redirect(base_url());
        }
    }

    public function updateWentForCutting()
    {
        if ($this->session->userdata('ci_session')['role'] == 1) {
            $this->load->model('issueModel');
            $data['role'] = 'admin';
            $data['issued'] = $this->issueModel->updateWentForCutting($this->input->post('barcodevalues'));
            $this->load->view('headerView', $data);
            $this->load->view('issueView', $data);
        } else {
            redirect(base_url());
        }
    }
}