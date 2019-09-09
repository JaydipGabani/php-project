<?php
/**
 * Created by PhpStorm.
 * User: HIT
 * Date: 1/18/2017
 * Time: 10:49 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class allocateLocationController extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('ci_session')) {
            if ($this->session->userdata('ci_session')['role'] == 1) {
                $data['ScannedData'] = '';
                $data['error'] = "";
                $data['role'] = 'admin';
                $this->load->view('headerView', $data);
                $this->load->view('allocateLocation', $data);
            } else if ($this->session->userdata('ci_session')['role'] == 2) {
                $data['ScannedData'] = '';
                $data['error'] = "";
                $data['role'] = 'worker';
                $this->load->view('headerView', $data);
                $this->load->view('allocateLocation', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    public function barcodeValues()
    {
        if ($this->session->userdata('ci_session')) {
            if ($this->session->userdata('ci_session')['role'] == 1) {
                $data['role'] = 'admin';
                $this->load->view('headerView', $data);
                $this->load->model('allocateLocationModel');
                $data['ScannedData'] = $this->allocateLocationModel->barcodeValues($this->input->post());
                $this->load->view('allocateLocation', $data);
            } else if ($this->session->userdata('ci_session')['role'] == 2) {
                $data['role'] = 'worker';
                $this->load->view('headerView', $data);
                $this->load->model('allocateLocationModel');
                $data['ScannedData'] = $this->allocateLocationModel->barcodeValues($this->input->post());
                $this->load->view('allocateLocation', $data);
            } else {
                redirect(base_url());
            }
        } else {
            redirect(base_url());
        }
    }

    public function locationAllocated()
    {
        if ($this->session->userdata('ci_session')) {
            if ($this->session->userdata('ci_session')['role'] == 1) {
                $data['role'] = 'admin';
                $this->load->view('headerView', $data);
                $this->load->model('allocateLocationModel');
                $data['ScannedData'] = $this->allocateLocationModel->locationAllocated($this->input->post());
                $this->load->view('allocateLocation', $data);
            } else if ($this->session->userdata('ci_session')['role'] == 2) {
                $data['role'] = 'worker';
                $this->load->view('headerView', $data);
                $this->load->model('allocateLocationModel');
                $data['ScannedData'] = $this->allocateLocationModel->locationAllocated($this->input->post());
                $this->load->view('allocateLocation', $data);
            } else {
                redirect(base_url());
            }
        } else {
            redirect(base_url());
        }
    }

    public function updateNorex()
    {
        if ($this->session->userdata('ci_session')['role'] == 1) {
            $data['role'] = 'admin';
            $this->load->view('headerView', $data);
            $this->load->model('allocateLocationModel');
            $data['ScannedData'] = $this->allocateLocationModel->updateNorex($this->input->post());
            $this->load->view('allocateLocation', $data);
        } else {
            redirect(base_url());
        }
    }
    public function updateProject()
    {
        if ($this->session->userdata('ci_session')['role'] == 1) {
            $data['role'] = 'admin';
            $this->load->view('headerView', $data);
            $this->load->model('allocateLocationModel');
            $data['ScannedData'] = $this->allocateLocationModel->updateProject($this->input->post());
            $this->load->view('allocateLocation', $data);
        } else {
            redirect(base_url());
        }
    }
}