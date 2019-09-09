<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class storageController extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('ci_session')){
            $data['role']="";
            $ifAdmin = $this->session->userdata('ci_session')['role'];
            if($ifAdmin==1){
                $data['role']='admin';
            }
		    $data['displayData'] = array();
			$this->load->view('headerView',$data);
            //$this->load->view('inventoryView',$data);
            $this->load->view('printReport',$data);
		}
		else{
			redirect(base_url());
		}
	}
	public function formFunction()
	{
        $data['role']="";
        $ifAdmin = $this->session->userdata('ci_session')['role'];
        if($ifAdmin==1){
            $data['role']='admin';
        }
        $this->load->model('storageModel');
		$data['displayData']=array();
		switch($this->input->post('submit')){
			case 'Add':
                $this->storageModel->Add($this->input->post());
                $this->load->view('headerView',$data);
                $this->load->view('inventoryView',$data);
			break;
			case 'Display':
				$result=$this->storageModel->Display();
				$data['displayData']=$result;
                $this->load->view('headerView',$data);
				$this->load->view('inventoryView',$data);
			break;
			case 'Search':
				$result=$this->storageModel->Search($this->input->post('norexId'));
				$data['displayData']=$result;
                $this->load->view('headerView',$data);
				$this->load->view('inventoryView',$data);
			break;
            case 'Delete':
                //echo $this->input->post('checkbox-items');
                $checkboxItemsToDelete = explode(',', $this->input->post('checkbox-items'));
               // echo '<br>';
                //echo $checkboxItemsToDelete[0];
                foreach ($checkboxItemsToDelete as $obj){
                    list($norex, $color, $location, $locationonsite,$projid,$Qty) = explode('|', $obj);
                    //echo '<br><hr>'.$norex. $color. $location. $locationonsite.$projid.$Qty.'<br><hr>';
                    $this->storageModel->Delete($norex, $color, $location, $locationonsite, $projid);
                }
                $result=$this->storageModel->Display();
                $data['displayData']=$result;
                $this->load->view('headerView',$data);
                $this->load->view('inventoryView',$data);
			break;
             case 'toInStock':
                $checkboxItemsToStock = json_decode($this->input->post('checkbox-items'));
                foreach ($checkboxItemsToStock as $obj){
                    list($norex, $color, $location, $locationonsite,$projid,$Qty) = explode('|', $obj);
                    $this->storageModel->inventoryToStorage($projid,$norex,$color,$Qty,$location,$locationonsite,$this->input->post('rqty'));
                }
                $result=$this->storageModel->Display();
                $data['displayData']=$result;
                $this->load->view('headerView',$data);
                $this->load->view('inventoryView',$data);
			break;

			default:
			    echo "default";
				$data=array();
                $this->load->view('headerView',$data);
				$this->load->view('inventoryView',$data);
		}

	}
	public function formSearchTag()
	{
        $data['role']="";
        $ifAdmin = $this->session->userdata('ci_session')['role'];
        if($ifAdmin==1){
            $data['role']='admin';
        }
		$this->load->model('storageModel');
		$result = $this->storageModel->searchByTag($this->input->post('tagno'));
		$data['orderData'] = $result;
		if($this->input->post('rowDataTransfer')!='[]'){
			$data['rowData']= json_decode($this->input->post('rowDataTransfer'));
		}
		else{
			$data['rowData']= $this->storageModel->searchById($result[0]->itemid);
		}
        $this->load->view('headerView',$data);
		$this->load->view('inventoryView',$data);
	}
}
