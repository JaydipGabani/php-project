<?php
/**
 * NOTE : THIS IS A TEMPORARY CONTROLLER TO CHECK VIEWS, DO NOT CHANGE ANYTHING HERE.
 * Created by PhpStorm.
 * User: maunil
 * Date: 28-10-2016
 * Time: 13:58
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class bufferOrderController extends CI_Controller {

    public function index()
    {
        $this->load->model('orderModel');
        $this->load->model('bufferBOMModel');
        $data['error'] = "";
        $data['bomData'] = $this->orderModel->retriveBom();
        $data['pendingData'] = $this->orderModel->retrivePendingOrder();
        $data['bufferBOMData'] = $this->bufferBOMModel->retriveBufferBOM();


        $data['role']='admin';
        $this->load->view('headerView',$data);
        $this->load->view('bufferOrder',$data);

    }

    function ChangeOrder()
    {
        $this->load->model('bufferOrderModel');
        $this->bufferOrderModel->ChangeOrder($this->input->post());
        redirect(base_url().'bufferOrderController');
    }

    public function deleteOrder()
    {
        $this->load->model('bufferOrderModel');
        $this->bufferOrderModel->deleteOrder($this->input->post());
        redirect(base_url().'bufferOrderController');
    }

    public function placeSingleOrder()
    {
        $this->load->model('bufferOrderModel');
        $this->bufferOrderModel->placeSingleOrder($this->input->post());
        //redirect(base_url().'bufferOrderController');
    }

    public function placeAllOrder()
    {
        $this->load->model('bufferOrderModel');
        $this->orderModel->placeAllOrder($this->input->post());
        redirect(base_url().'bufferOrderController');
    }

}
