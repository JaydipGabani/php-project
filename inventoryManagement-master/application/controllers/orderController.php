<?php
/**
 * Created by PhpStorm.
 * User: HIT
 * Date: 14-11-2016
 * Time: 18:30
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class orderController extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('ci_session')){
            $data['role']="";
            $ifAdmin = $this->session->userdata('ci_session')['role'];
            if($ifAdmin==1){
                $data['role']='admin';
            }
            $this->load->model('orderModel');
            $data['error'] = "";
            $data['orderData'] = $this->orderModel->retriveOrder();
            $data['bomData'] = $this->orderModel->retriveBom();
            $data['instockData'] = $this->orderModel->retriveStock();
            $this->load->view('headerView',$data);
            $this->load->view('order',$data);
        }
        else{
            redirect(base_url());
        }
    }

    public function placeAllOrder()
    {
        $this->load->model('orderModel');
        $this->orderModel->placeAllOrder($this->input->post());
        //redirect(base_url().'orderController');
    }

    public function allocate()
    {
        $this->load->model('orderModel');
        $this->orderModel->Allocate($this->input->post());
        redirect(base_url().'orderController');
    }

    public function OrdertoStock()
    {
        $this->load->model('orderModel');
        $this->orderModel->OrderToStock($this->input->post('Norex'),$this->input->post('Color'),$this->input->post('pid'),$this->input->post('Qty'),$this->input->post('loc'),$this->input->post('los'),$this->input->post('rec'));
        redirect(base_url().'orderController');
    }

    public function deleteBom()
    {
        $this->load->model('orderModel');
        $this->orderModel->DeleteBom($this->input->post('Norex'),$this->input->post('Color'),$this->input->post('pid'));
        redirect(base_url().'orderController');
    }
    public function BOMExcelData()
    {
        $this->load->model('bufferBOMModel');
        $this->bufferBOMModel->BOMExcelData($this->input->post());
        redirect(base_url().'bufferBOMController');
    }

    //pending order
    public function PlaceOrder()
    {
        //echo json_encode($this->input->post());
        $this->load->model('orderModel');
        $this->orderModel->PlaceOrder($this->input->post());
        redirect(base_url().'bufferBOMController');
    }


    function ChanageOrder()
    {
        $this->load->model('orderModel');
        $this->orderModel->ChangeOrder($this->input->post());
        redirect(base_url().'bufferOrderController');
    }

    public function deleteOrder()
    {
        $this->load->model('orderModel');
        $this->orderModel->deleteOrder($this->input->post());
        redirect(base_url().'bufferOrderController');
    }
}