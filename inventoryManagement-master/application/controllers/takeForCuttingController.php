<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 10-02-2017
 * Time: 17:37
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class takeForCuttingController extends CI_Controller {

    public function index()
    {
        $this->load->view('barcodeScanner');
    }
    public function updateWentForCutting(){
        $this->load->model('takeForCuttingModel');
        $this->takeForCuttingModel->updateWentForCutting($this->input->post('barcodevalues'));
        redirect(base_url().'takeForCuttingController');
    }
}
