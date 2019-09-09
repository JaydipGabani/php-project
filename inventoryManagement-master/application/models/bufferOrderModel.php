<?php
/**
 * Created by PhpStorm.
 * User: gaban
 * Date: 17-01-2017
 * Time: 23:50
 */
class bufferOrderModel extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function ChangeOrder($buforder)
    {
        $this->db->where('Projectid',$buforder['Projectid'])->where('Finish',$buforder['Finish'])->where('NorexID',$buforder['norexId']);
        $this->db->update('pendingorder',array('Qty'=>$buforder['Qty']));
    }

    function deleteOrder($data)
    {
        $this->db->where('No',$data['No']);
        $this->db->delete("pendingorder");
    }

    public function placeSingleOrder($data)
    {
        //echo json_encode($data);
        $this->db->select('DESCRIPTION,KEYMARK,ASTRO')->from('rawvalues')->where('NOREX',$data['NorexId']);
        $display=$this->db->get()->result();
        $data['DESCRIPTION']=$display[0]->DESCRIPTION;
        $data['KeymarkDieNo']=$display[0]->KEYMARK;
        $data['AstroDieNo']=$display[0]->ASTRO;
        unset($data['submit']);
        $this->db->insert('pendingorder', $data);
        redirect(base_url().'bufferOrderController');
    }


    function placeAllOrder($po){

        $query = $this->db->get('pendingorder');
        foreach ($query->result() as $row) {
            $row->PO=$po['POnum'];
            $this->db->insert('order',$row);
        }
        $this->db->truncate('pendingorder');
    }

}