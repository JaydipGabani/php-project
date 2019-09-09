
<?php
/**
 * NOTE : THIS IS A TEMPORARY CONTROLLER TO CHECK VIEWS, DO NOT CHANGE ANYTHING HERE.
 * Created by PhpStorm.
 * User: maunil
 * Date: 28-10-2016
 * Time: 13:58
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class bufferBOMController extends CI_Controller {

    public function index()
    {
        $this->load->model('orderModel');
        $data['error'] = "";
        $data['bomData'] = $this->orderModel->retriveBom();
        $data['pendingData'] = $this->orderModel->retrivePendingOrder();
        $this->load->model('bufferBOMModel');
        $data['bufferBOMData'] = $this->bufferBOMModel->retriveBufferBOM();


        $data['role']='admin';
        $this->load->view('headerView',$data);
        $this->load->view('bufferBOM',$data);
    }

    public function BOMExcelData()
    {
        $this->load->model('bufferBOMModel');
        $this->bufferBOMModel->BOMExcelData($this->input->post());
        redirect(base_url().'bufferBOMController');
    }

    function ChangeBufferBOM()
    {
        $this->load->model('bufferBOMModel');
        $this->bufferBOMModel->ChangeBufferBOM($this->input->post());
        redirect(base_url().'bufferBOMController');
    }

    function moveToBOM(){

        $this->load->model('bufferBOMModel');
        $this->bufferBOMModel->moveToBOM();
        redirect(base_url().'bufferBOMController');
    }

    function deleteBufferBOM()
    {
        $this->load->model('bufferBOMModel');
        $this->bufferBOMModel->deleteBufferBOM($this->input->post());
        redirect(base_url().'bufferBOMController');
    }
}
