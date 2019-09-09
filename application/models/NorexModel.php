<?php

/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 14-02-2017
 * Time: 17:31
 */
class NorexModel extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function insert($data)
    {
        $this->db->insert('rawvalues',$data);

    }
}