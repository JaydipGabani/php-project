<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 08-02-2017
 * Time: 23:43
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class manifestController extends CI_Controller
{
    var $data;
    public function __construct()
    {

        parent::__construct();
        $this->data = array(
            'role' => '',
            'error' => '',
            'menifestData' => '',
            'tags'=>''
        );

    }
    public function role()
    {
        if ($this->session->userdata('ci_session')['role'] == 1) {
            $data['error'] = "";
            $data['role'] = 'admin';
            $this->load->model('manifestModel');
        }
        elseif ($this->session->userdata('ci_session')['role'] == 3)
        {
            $data['error']= "";
            $data['role'] ='x';
            $this->load->model('manifestModel');
        }
        else {
            redirect(base_url());
        }
        $this->load->view('headerView', $data);
    }
    public function index()
    {
            $data=$this->data;
            $this->role();
            $data['manifestData'] = $this->manifestModel->retriveManifest();

            $this->load->view('manifestView', $data);

    }

    public function manifestReaderAstro()
    {
            $data=$this->data;
            $this->role();
            $this->manifestModel->manifestReaderAstro($this->input->post('excelData'));
            $data['manifestData'] = $this->manifestModel->retriveManifest();

            $this->load->view('manifestView', $data);
    }

    public function manifestReaderKeymark()
    {
            $data=$this->data;
            $this->role();
            $this->manifestModel->manifestReaderKeymark($this->input->post('excelData'));
            $data['manifestData'] = $this->manifestModel->retriveManifest();

            $this->load->view('manifestView', $data);
    }

    public function clearManifest()
    {
            $data=$this->data;
            $this->role();
            $this->manifestModel->clearManifest($this->input->post());

            $this->load->view('manifestView');

    }

    public function editTuple()
    {
            $data=$this->data;
            $this->role();
            $this->manifestModel->editTuple($this->input->post());
            $data['manifestData'] = $this->manifestModel->retriveManifest();

            $this->load->view('manifestView');

    }

    public function printManifest()
    {
        $data=$this->data;
        $this->role();
        $data['tags'] = $this->manifestModel->printManifest();

    }
}