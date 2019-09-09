<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 25-11-2016
 * Time: 18:35
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class changePass extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('ci_session')) {
            $data['role']="";
            $ifAdmin = $this->session->userdata('ci_session')['role'];
            if($ifAdmin==1){
                $data['role']='admin';
            }
            $data['uname'] = $this->session->userdata('ci_session')['userdata'];
            $this->load->view('headerView',$data);
            $this->load->view('changePassView',$data);
        }
    }
    public function changePassword()
    {
        $user= array(
            'pass'=>$this->input->post('pass')
        );
        //echo json_encode($user);
        $this->db->where('uname',$this->input->post('uname'))->where('pass',$this->input->post('opass'));
        $this->db->update('users',$user);
        $this->load->model('loginModel');
        $this->loginModel->logout();
    }
}
