<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 17-02-2017
 * Time: 00:35
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class recordController extends CI_Controller
{

    var $data;
    public function __construct()
    {
        parent::__construct();
        $this->data = array(
            'role' => '',
            'tags'=>''
        );
    }
    public function role()
    {
        if ($this->session->userdata('ci_session')['role'] == 1) {
            $data['error'] = "";
            $data['role'] = 'admin';
            $this->load->model('recordModel');
        }
        elseif ($this->session->userdata('ci_session')['role'] == 3)
        {
            $data['error']= "";
            $data['role'] ='x';
            $this->load->model('recordModel');
        }
        elseif ($this->session->userdata('ci_session')['role'] == 4)
        {
            $data['error']= "";
            $data['role'] ='engineering';
            $this->load->model('recordModel');
        }
        else {
            redirect(base_url());
        }
        $this->load->view('headerView', $data);
    }
    public function index()
    {
        $data=$this->data;
        $this->role();
        $this->load->view('recordView');
    }
    public function printingTags()
    {
        $data=$this->data;
        $this->role();
        $data['tags'] = $this->recordModel->printingTags($this->input->post());
        $this->load->view('printingTags', $data);
    }

    public function fatchData()
    {

        $data=$this->data;
        $this->role();
            //$data= json_decode($this->input->post('dataForfatching'));
            // echo json_encode($data);
            $this->recordModel->fatchData($this->input->post('dataForfatching'));
    }

    public function getCountry()
    {
        $data=$this->data;
        $this->role();

            $page = $_POST['page'];
        $site='';
//        echo $_POST['date'];
//        echo $_POST['NorexID'];
//        echo $_POST['AstroDieNo'];
            $countries = $this->recordModel->getCountry($_POST['date'], $_POST['NorexID'], $_POST['AstroDieNo'], $_POST['Projectid'], $_POST['KeymarkDieNo'], $_POST['Finish'], $_POST['PO'], $_POST['Location'], $_POST['LocOnSite'], $_POST['Tag_No'], $_POST['Barcode'], $_POST['orderby'], $_POST['ascDesc'], $_POST['issued'], $page);
//        $countries = array();
            $i = 0;
            //echo json_encode($countries);
            foreach ($countries as $obj) {
                if ($obj->wentforcutting) {
                    echo '<li class="red lighten-4">';
                } else {
                    echo '<li>';
                }
                if ($obj->Location == 2) {
                    $site = 'Carlstadt';
                } else if ($obj->Location == 1) {
                    $site = 'Teterboro';
                }
                echo '
        <br>
        <div class="row">
            <div class="col s-half">
                <!--checkbox-->
                <input type="checkbox" name="checkboxstoSelect" data-barcode="' . $obj->Barcode . '" class="filled-in inventoryCheckbox" id="checkbox' . $page . $i . '" value=""/>
                <label for="checkbox' . $page . $i++ . '"></label>
            </div>
            <div class="col s2">
                <div class="norexImg">
                    <img src="' . base_url() . 'application/img/ExtrusionJPEG/' . $obj->Location . '/' . $obj->NorexID . '.JPG" class="">
                </div>
            </div>
            <div class="col s9">
                <div class="row">
                    <div class="col s2">
                        <b>Date:</b>' . $obj->Date . '
                    </div>
                    <div class="col s2">
                        <!--norex-->
                        <b>NorexID:</b>' . $obj->NorexID . '
                    </div>
                    <div class="col s2">
                        <b>Projectid:</b>' . $obj->Projectid . '
                    </div>
                    <div class="col s2">
                        <b>Tag_No:</b>' . $obj->Tag_No . '
                    </div>
                    <div class="col s2">
                        <b>Qty:</b>' . $obj->Qty . '
                    </div>

                </div>
                <div class="row">
                    <div class="col s2">
                        <b>PO:</b>' . $obj->PO . '
                    </div>
                    <div class="col s2">
                        <b>AstroDieNo:</b>' . $obj->AstroDieNo . '
                    </div>
                    <div class="col s2">
                        <b>KeymarkNo:</b>' . $obj->KeymarkDieNo . '
                    </div>
                    <div class="col s2">
                        <b>Easco:</b>' . $obj->Easco . '
                    </div>
                    <div class="col s2">
                        <b>Finish:</b>' . $obj->Finish . '
                    </div>
                </div>
                <div class="row">
                    <div class="col s2">
                        <b>Barcode:</b>' . $obj->Barcode . '
                    </div>
                    <div class="col s2">
                        <b>WeightxFeet:</b>' . $obj->WeightxFeet . '
                    </div>
                    <div class="col s2">
                        <b>Length:</b>' . $obj->OrderLength . '
                    </div>
                    <div class="col s2">
                        <b>TotalLbs:</b>' . $obj->TotalLbs . '
                    </div>
                    <div class="col s2">
                        <b>Model:</b>' . $obj->Model . '
                    </div>
                </div>
                <div class="row">
                    <div class="col s2">
                        <b>Location:</b>' . $site . '
                    </div>
                    <div class="col s2">
                        <b>LocOnSite:</b>' . $obj->LocOnSite . '
                    </div>
                    <div class="col s8">
                        <b>Description:</b>' . $obj->Description . '
                    </div>
                </div>
            </div>
        </div>
    </li>';
            }
            exit;
        }
}