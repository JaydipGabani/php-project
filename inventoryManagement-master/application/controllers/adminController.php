<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 24-11-2016
 * Time: 23:41
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class adminController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        if ($this->session->userdata('ci_session')['role'] == 1) {
            $data['role'] = "admin";
            $this->load->model('adminModel');
            $data['AddNorexError'] = "";
            $data['AddUserError'] = "";
            $data['UpdateNorex'] = "";
            $data['UserList'] = $this->adminModel->UserList();
            $data['itemDisplay'] = array();
            $this->load->view('headerView', $data);
            $this->load->view('adminView', $data);
        }
        elseif ($this->session->userdata('ci_session')['role'] == 4) {
            $data['role'] = "engineering";
            $this->load->model('adminModel');
            $data['AddNorexError'] = "";
            $data['AddUserError'] = "";
            $data['UpdateNorex'] = "";
            $data['UserList'] = $this->adminModel->UserList();
            $data['itemDisplay'] = array();
            $this->load->view('headerView', $data);
            $this->load->view('adminView', $data);
        } else {
            redirect(base_url());
        }
    }

    public function Search()
    {
        if ($this->session->userdata('ci_session')['role'] == 1) {
            $data['role'] = "admin";
            $this->load->model('adminModel');
            $data['UserList'] = $this->adminModel->UserList();
            $data['AddNorexError'] = "";
            $data['AddUserError'] = "";
            $data['UpdateNorex'] = "";
            $data['itemDisplay'] = $this->adminModel->Search($this->input->post());
            $this->load->view('headerView', $data);
            $this->load->view('adminView', $data);
        }
        elseif ($this->session->userdata('ci_session')['role'] == 4) {
            $data['role'] = "engineering";
            $this->load->model('adminModel');
            $data['UserList'] = $this->adminModel->UserList();
            $data['AddNorexError'] = "";
            $data['AddUserError'] = "";
            $data['UpdateNorex'] = "";
            $data['itemDisplay'] = $this->adminModel->Search($this->input->post());
            $this->load->view('headerView', $data);
            $this->load->view('adminView', $data);
        } else {
            redirect(base_url());
        }
    }

    public function AddUser()
    {
        if ($this->session->userdata('ci_session')['role'] == 1) {
            $data['role'] = "admin";
            $this->load->model('adminModel');
            $data['AddNorexError'] = "";
            $data['UpdateNorex'] = "";
            $data['AddUserError'] = $this->adminModel->AddUser($this->input->post());
            $data['UserList'] = $this->adminModel->UserList();
            $this->load->view('headerView', $data);
            $this->load->view('adminView', $data);
        } else {
            redirect(base_url());
        }
    }

    function DeleteUser()
    {
        if ($this->session->userdata('ci_session')['role'] == 1) {
            $data['role'] = "admin";
            $this->load->model('adminModel');
            $data['AddNorexError'] = "";
            $data['UpdateNorex'] = "";
            $data['AddUserError'] = $this->adminModel->DeleteUser($this->input->post());
            $data['UserList'] = $this->adminModel->UserList();
            $this->load->view('headerView', $data);
            $this->load->view('adminView', $data);
        } else {
            redirect(base_url());
        }
    }

    public function Delete()
    {
        if ($this->session->userdata('ci_session')['role'] == 1) {
            $data['role'] = "admin";
            $this->load->model('adminModel');
            $data['AddUserError'] = "";
            $data['UpdateNorex'] = "";
            $data['UserList'] = $this->adminModel->UserList();
            $data['error'] = $this->adminModel->Delete($this->input->post('Norex'));
            $this->load->view('headerView', $data);
            $this->load->view('adminView', $data);
        } else {
            redirect(base_url());
        }
    }

    public function Update()
    {
        if ($this->session->userdata('ci_session')['role'] == 1) {
            $data['role'] = "admin";
            $this->load->model('adminModel');
            $data['AddNorexError'] = "";
            $data['AddUserError'] = "";
            $data['UpdateNorex'] = "";
            $data['UserList'] = $this->adminModel->UserList();// this line is for displaying user list in tab 1
            $data['UpdateNorex'] = $this->adminModel->Update($this->input->post());
            $this->load->view('headerView', $data);
            $this->load->view('adminView', $data);
        }elseif ($this->session->userdata('ci_session')['role'] == 4) {
            $data['role'] = "engineering";
            $this->load->model('adminModel');
            $data['AddNorexError'] = "";
            $data['AddUserError'] = "";
            $data['UpdateNorex'] = "";
            $data['UserList'] = $this->adminModel->UserList();// this line is for displaying user list in tab 1
            $data['UpdateNorex'] = $this->adminModel->Update($this->input->post());
            $this->load->view('headerView', $data);
            $this->load->view('adminView', $data);
        } else {
            redirect(base_url());
        }
    }

    public function AddNorex()
    {
        $target_dir = "./application/img/ExtrusionJPEG/" . $_POST['LOCATION'] . '/';
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
//                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 5000000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "JPG" && $imageFileType != "jpg" ) {
            echo "Sorry, only JPG files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            $data = array(
                "ASTRO" => $_POST['ASTRO'],
                "WINSYS" => $_POST['WINSYS'],
                "KEYMARK" => $_POST['KEYMARK'],
                "NOREX" => $_POST['NOREX'],
                "LOCATION" => $_POST['LOCATION'],
                "EASCO" => $_POST['EASCO'],
                "DESCRIPTION" => $_POST['DESCRIPTION'],
                "MODEL" => $_POST['MODEL'],
                "LBFT" => $_POST['LBFT'],
                "SH" => $_POST['SH'],
                "CAVITY" => $_POST['CAVITY']
            );
            $this->db->insert('rawvalues', $data);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                echo "Sorry, An error occurred";
            } else {
                $temp = explode(".", $_FILES["fileToUpload"]["name"]);
                $x = round(microtime(true)) . '.' . end($temp);
                echo '<script>alert($temp[1])</script>';
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], './application/img/ExtrusionJPEG/' . $_POST['LOCATION'] . '/' . $_POST['NOREX'] . '.' . explode('.', $x)[1])) {
                    $this->db->trans_commit();
                    if ($this->session->userdata('ci_session')['role'] == 1) {
                        $data['role'] = "admin";
                    }elseif ($this->session->userdata('ci_session')['role'] == 4) {
                        $data['role'] = "engineering";
                    }
                    $this->load->model('adminModel');
                    $data['AddUserError'] = "";
                    $data['UpdateNorex'] = "";
                    $data['AddNorexError'] = "New Norex added successfully ";
                    $data['UserList'] = $this->adminModel->UserList();
                    $this->load->view('headerView', $data);
                    $this->load->view('adminView', $data);
                } else {
                    $this->db->trans_rollback();
                    echo "Sorry, there was an error uploading your file.";
                    $data['addNorexMessage'] = "Sorry, there was an error uploading image.try again";
                }
            }
        }
    }
}
