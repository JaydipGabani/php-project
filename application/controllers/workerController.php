<?php
/**
 * Created by PhpStorm.
 * User: HIT
 * Date: 3/9/2017
 * Time: 2:21 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class workerController extends CI_Controller {

    public function index()
    {
        $data['ScannedData']='';
        $this->load->view('workerView',$data);
    }

    public function barcodeValues()
    {
        $this->load->model('allocateLocationModel');
        $data['ScannedData']=$this->allocateLocationModel->barcodeValues($this->input->post());
        //redirect(base_url().'allocateLocationController');
        $this->load->view('workerView',$data);
    }
    public function locationAllocated()
    {
        $this->load->model('allocateLocationModel');
        $data['ScannedData']=$this->allocateLocationModel->locationAllocated($this->input->post());
        $this->load->view('workerView',$data);

    }
}