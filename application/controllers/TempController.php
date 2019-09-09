<?php
/**
 * NOTE : THIS IS A TEMPORARY CONTROLLER TO CHECK VIEWS, DO NOT CHANGE ANYTHING HERE.
 * Created by PhpStorm.
 * User: maunil
 * Date: 28-10-2016
 * Time: 13:58
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class TempController extends CI_Controller {

    public function index()
    {
        //$this->load->model('orderModel');
        $this->load->model('tempModel');
        //$data['error'] = "";
        //$data['bomData'] = $this->orderModel->retriveBom();
        //$data['pendingData'] = $this->orderModel->retrivePendingOrder();
        //$data['bufferBOMData'] = $this->orderModel->retriveBufferBOM();
        $data['tags'] = $this->tempModel->retriveOrignalTags();

        $data['role']='admin';

           // $this->load->view('headerView',$data);
            //$this->load->view('allBOM',$data);
//            $this->load->view('printingView',$data);
//            $this->load->view('printingPO');
            $this->load->view('barcodeScanner',$data);
//            $this->load->view('allocateLocation',$data);

    }
    public function showbarcode(){
        echo json_encode($this->input->post());
    }
}
