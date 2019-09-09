<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 23-01-2017
 * Time: 12:08
 */
class tempModel extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function retriveOrignalTags()
    {
        $this->db->select('*')->from('originalinventory');
        $display=$this->db->get();
        if($display->num_rows()>0){
            $display=$display->result();
            return $display;
        }
        return array();
    }
}