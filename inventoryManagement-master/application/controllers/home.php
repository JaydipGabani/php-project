<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('ci_session')){
            $data['role']="";
            $ifAdmin = $this->session->userdata('ci_session')['role'];
            if($ifAdmin==1){
                $data['role']='admin';
            }
            else if($ifAdmin==2)
            {
                $data['role']='worker';
            }
            else if($ifAdmin==3)
            {
                $data['role']='x';
            }
            else if($ifAdmin==4)
            {
                $data['role']='engineering';
            }
            $this->load->view('homeView',$data);
        }
        else{
            redirect(base_url());
        }
	}
}
