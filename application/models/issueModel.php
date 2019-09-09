<?php

/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 10-02-2017
 * Time: 17:33
 */
class issueModel extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function updateWentForCutting($data)
    {
        $this->db->trans_begin();
        $data = explode(',', $data);
        foreach ($data as $obj) {
            $update = array(
                'wentforcutting' => 1
            );
            $this->db->where('Barcode', $obj);
            $this->db->update('inventorystorage', $update);
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return "not issued";
        } else {
            $this->db->trans_commit();
            return "all items have been issued";
        }
    }
}