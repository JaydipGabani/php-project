<?php

/**
 * Created by PhpStorm.
 * User: HIT
 * Date: 25-11-2016
 * Time: 01:27
 */
class adminModel extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function UserList()
    {
        $this->db->select('*')->from('users');
        $display = $this->db->get();
        if ($display->num_rows() > 0) {
            $display = $display->result();
            return $display;
        }
        return array();
    }

    function AddUser($user)
    {
        $adddata = array(
            'name' => $user['name'],
            'uname' => $user['userName'],
            'pass' => 123456,
            'role' => $user['role']
        );
        $this->db->select('*')->from('users')->where('uname', $user['userName']);
        $row = $this->db->get();
        if ($row->num_rows() > 0) {
            return 'User already exists';
        } else {
            $this->db->insert('users', $adddata);
            return "User Added";
        }
    }

    function DeleteUser($user)
    {
        $this->db->where('uname', $user['uname']);
        $this->db->delete('users');
        return 'user deleted';
    }

    function Search($norex)
    {
        $this->db->select('*')->from('rawvalues')->where('NOREX', $norex['Norex'])->where('LOCATION', $norex['Location']);
        $row = $this->db->get();
        $row = $row->result();
        if ($row[0]->NOREX == null) {
            echo "<script>alert('Norex does not exist');</script>";
            redirect('/adminController', 'refresh');
        } else {
            return $row;
        }
        return array();
    }

    function Update($update)
    {
        $this->db->trans_start();
        $updatedt = array(
            'ASTRO' => $update['ASTRO'],
            'WINSYS' => $update['WINSYS'],
            'KEYMARK' => $update['KEYMARK'],
            'LOCATION' => $update['LOCATION'],
            'DESCRIPTION' => $update['DESCRIPTION'],
            'MODEL' => $update['MODEL'],
            'LBFT' => $update['LBFT'],
            'SH' => $update['SH'],
            'CAVITY' => $update['CAVITY'],
            'EASCO' => $update['EASCO']
        );
        $updatedtbom = array(
            'AstroDieNo' => $update['ASTRO'],
            'KeymarkDieNo' => $update['KEYMARK'],
        );
        $updatedtinventorystorage = array(
            'AstroDieNo' => $update['ASTRO'],
            'KeymarkDieNo' => $update['KEYMARK'],
            'Description' => $update['DESCRIPTION'],
            'WeightxFeet' => $update['LBFT'],
            'Model' => $update['MODEL'],
            'Easco' => $update['EASCO']
        );
        $updatedtmenifest = array(
            'AstroDieNo' => $update['ASTRO'],
            'KeymarkDieNo' => $update['KEYMARK'],
            'Part_Description' => $update['DESCRIPTION'],
            'Ft' => $update['LBFT'],
            'Model' => $update['MODEL']
        );
        $updatedtorder = array(
            'AstroDieNo' => $update['ASTRO'],
            'KeymarkDieNo' => $update['KEYMARK'],
            'Description' => $update['DESCRIPTION'],
            'WeightxFeet' => $update['LBFT']
        );
        $this->db->where('NOREX', $update['NOREX'])->where('LOCATION', $update['LOCATION']);
        $this->db->update('rawvalues', $updatedt);

//        $this->db->update('bom',$updatedtbom);
//        $this->db->update('bufferbom',$updatedtbom);

        $this->db->where('NorexID', $update['NOREX'])->where('Location', $update['LOCATION']);
        $this->db->update('inventorystorage', $updatedtinventorystorage);

        $this->db->where('NorexID', $update['NOREX'])->where('Location', $update['LOCATION']);
        $this->db->update('menifest', $updatedtmenifest);

//        $this->db->update('order',$updatedtorder);
//        $this->db->update('pendingorder',$updatedtorder);

        $this->db->trans_complete();
        return 'Norex: ' . $update['NOREX'] . ' updated';
    }

    function Delete($norex)
    {
        $this->db->where('Norex', $norex['Norex']);
        $this->db->delete('rawdata');
        return 'deleted';
    }

    public function norex_upload()
    {
//        echo json_encode($this->input->post());

        $config['upload_path'] = './img/norex';
        $config['allowed_types'] = 'jpeg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $data = $this->input->post();
        $this->load->library('upload');
        //$this->upload->initialize($config);
        //$this->upload->do_upload();
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($data['NorexImage'])) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('Upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->load->model('NorexModel');
            $this->NorexModel->insert($data);
            $data = array('message' => 'Successfully Uploaded data');
            $this->load->view('adminView', $data);
        }
    }
}

?>