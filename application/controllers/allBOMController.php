<?php
/**
 * NOTE : THIS IS A TEMPORARY CONTROLLER TO CHECK VIEWS, DO NOT CHANGE ANYTHING HERE.
 * Created by PhpStorm.
 * User: maunil
 * Date: 28-10-2016
 * Time: 13:58
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class allBOMController extends CI_Controller {

    public function index()
    {
        //$this->load->model('orderModel');
        $this->load->model('storageModel');
        //$this->load->model('bufferBOMModel');
        $data['error'] = "";
//        $data['bomData'] = $this->orderModel->retriveBom();
//        $data['pendingData'] = $this->orderModel->retrivePendingOrder();
//        $data['bufferBOMData'] = $this->bufferBOMModel->retriveBufferBOM();
        $data['bomData'] = $this->storageModel->retriveStorage();
        //echo json_encode($this->storageModel->retriveStorage());
        $data['role']='admin';
        $this->load->view('headerView',$data);
        $this->load->view('allBOM',$data);
    }

}
