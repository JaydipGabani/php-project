<?php
/**
 * Created by PhpStorm.
 * User: HIT
 * Date: 1/18/2017
 * Time: 10:50 PM
 */
class allocateLocationModel extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function barcodeValues($data)
    {
        $this->db->select('*')->from('inventoryStorage');
        $this->db->where('Barcode',$data['Barcode']);
        $display=$this->db->get();
        if($display->num_rows()>0){
            $display=$display->result();
            return $display;
        }
        return array();
    }
    function locationAllocated($data)
    {
        $d=array(
            'LocOnSite'=>$data['LocOnSite'],
            'Finish'=>$data['Finish'],
            'Qty'=>$data['Qty'],
            'OrderLength'=>$data['OrderLength']
        );
        $this->db->where('Barcode',$data['Barcode']);
        $this->db->update('inventorystorage',$d);

        $this->db->select('*')->from('inventoryStorage');
        $this->db->where('Barcode',$data['Barcode']);
        $display=$this->db->get();
        if($display->num_rows()>0){
            $display=$display->result();
            return $display;
        }
        return array();
    }
    function updateNorex($data)
    {
        $nor=$this->db->select('*')->from('rawvalues')->where('NOREX',$data['NorexID'])->where('LOCATION',$data['Location'])->get()->result();
        $d=array(
            'Description'=>$nor[0]->DESCRIPTION,
            'AstroDieNo'=>$nor[0]->ASTRO,
            'KeymarkDieNo'=>$nor[0]->KEYMARK,
            'WeightxFeet'=>$nor[0]->LBFT,
            'NorexID'=>$nor[0]->NOREX,
            'Model'=>$nor[0]->MODEL,
            'Location'=>$nor[0]->LOCATION
        );
        $this->db->where('Barcode',$data['Barcode']);
        $this->db->update('inventorystorage',$d);

        $this->db->select('*')->from('inventoryStorage');
        $this->db->where('Barcode',$data['Barcode']);
        $display=$this->db->get();
        if($display->num_rows()>0){
            $display=$display->result();
            return $display;
        }
       return array();
    }
}