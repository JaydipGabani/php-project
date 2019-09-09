<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 30-03-2017
 * Time: 23:06
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class projectController extends CI_Controller
{

    var $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = array(
            'role' => '',
            'tags' => ''
        );
    }

    public function role()
    {
        if ($this->session->userdata('ci_session')['role'] == 1) {
            $data['error'] = "";
            $data['role'] = 'admin';
            $this->load->model('projectModel');
        } elseif ($this->session->userdata('ci_session')['role'] == 3) {
            $data['error'] = "";
            $data['role'] = 'x';
            $this->load->model('projectModel');
        } elseif ($this->session->userdata('ci_session')['role'] == 4) {
            $data['error'] = "";
            $data['role'] = 'engineering';
            $this->load->model('projectModel');
        } else {
            redirect(base_url());
        }
        $this->load->view('headerView', $data);
    }

    public function index()
    {
        $data = $this->data;
        $this->role();
        $this->load->view('projectView', $data);
    }

    public function addProject()
    {
        $data = $this->data;
        $this->role();
        $this->projectModel->addProject($this->input->post());
        $this->load->view('projectView', $data);
    }


    public function searchProject()
    {
        $data = $this->data;
        $this->role();
        $data['searchedProject'] = $this->projectModel->searchProject($this->input->post());
        $this->load->view('projectView', $data);

    }

    public function updateProject()
    {
        $data = $this->data;
        $this->role();
        $data['searchedProject'] = $this->projectModel->updateProject($this->input->post());
        $this->load->view('projectView', $data);

    }

    public function deleteProject()
    {
        $data = $this->data;
        $this->role();
        $this->projectModel->deleteProject($this->input->post());
//            echo json_encode($this->input->post());
//            $this->load->view('headerView', $data);
//            $this->load->view('projectView', $data);

    }

    public function loadMoreProjects()
    {
        $this->role();
        $page = $_POST['page'];
        $projectData = $this->projectModel->loadMoreProjects($page);
        foreach ($projectData as $obj) {
            echo '<li class="col s2">' .
                $obj->pid
                . '</li>
                    <li class="col s10">' .
                $obj->pname
                . '</li>';
        }

        exit;
    }
}

//Notes:
// loadMoreProjects is the ajax function for

// send response shown blow in response

// <li>
//  <div class="col s2">pid</div>
//  <div class="col s10">pname</div>
// </li>