<?php

/**
 * Model ListManagerModel will be used to manage different lists
 */
class storageModel extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function Add($dataToSave)
    {
        $insertData = array(
            'Norex' => $dataToSave['norexId'],
            'Projectid' => $dataToSave['Projectid'],
            'Color' => $dataToSave['color'],
            'Location' => $dataToSave['site'],
            'LocOnSite' => $dataToSave['locationOnSite'],
            'Qty' => $dataToSave['Qty']
        );
        $this->db->insert('inventorystorage', $insertData);
        return null;

    }

    function Search($norex)
    {

        $this->db->select('*')->from('inventorystorage')->join('rawdata', 'rawdata.NOREX= inventorystorage.Norex')->where('inventorystorage.Norex', $norex);
        $row = $this->db->get();
        $row = $row->result();
        return $row;
    }

    function Display()
    {

        $this->db->select('*')->from('inventorystorage')->join('rawdata', 'rawdata.NOREX= inventorystorage.Norex');
        $display = $this->db->get();
        if ($display->num_rows() > 0) {
            $display = $display->result();
            $data['displayData'] = $display;
            return $display;
        }
        return array();
    }

    function retriveStorage()
    {
		//'inventorystorage.NorexID', 'Finish', 'Location', 'LocOnSite', 'Qty', 'OrderLength', 'Projectid'
        $query = "SELECT b.* FROM bom b LEFT OUTER JOIN inventorystorage i ON b.NorexID = i.NorexID AND i.Projectid=0 AND b.Finish = i.Finish";
        /*$this->db->select('*')->from('bom');
        $this->db->join('inventorystorage', 'bom.NorexID = inventorystorage.NorexID AND bom.Finish = inventorystorage.Finish');
        $this->db->where('inventorystorage.Projectid','0');//->where()->where(');*/
        /*$display = $this->db->get();
        if ($display->num_rows() > 0) {
            $display = $display->result();
            $data['displayData'] = $display;
            //echo json_encode($display);
            return $display;
        }*/
        $q=$this->db->query($query);
//        echo json_encode($q->result_array());
        return $q->result_array();
        //return array();
    }

    function Delete($norex, $color, $location, $locationonsite, $Projectid)
    {
        $this->db->where('Projectid', $Projectid);
        $this->db->where('Norex', $norex);
        $this->db->where('Color', $color);
        $this->db->where('Location', $location);
        $this->db->where('LocOnSite', $locationonsite);
        $this->db->delete('inventorystorage');
    }

    function inventoryToStorage($Projectid, $norex, $color, $qty, $loc, $loconsite, $rqty)
    {
        if ($qty == $rqty || $rqty==null) {
            $this->db->select('*')->from('inventorystorage')->where('Projectid', 0)->where('Norex', $norex)->where('Color', $color)->where('Location', $loc)->where('LocOnSite', $loconsite);
            $query = $this->db->get();
            $row=$query->result();
            $result=$row[0];
            if ($query->num_rows() > 0) {
                $rqty = $rqty + $result->Qty;
                $d = array("Qty" => $rqty);
                $this->db->where('Norex', $norex)->where('Color', $color)->where('Projectid', 0)->where('Location', $loc)->where('LocOnSite', $loconsite);
                $this->db->update('inventorystorage', $d);
            } else {
                $d = array("Projectid" => 0);
                $this->db->where('Norex', $norex)->where('Color', $color)->where('Qty', $qty)->where('Location', $loc)->where('LocOnSite', $loconsite);
                $this->db->update('inventorystorage', $d);
            }
        } else {
            $nqty = $qty - $rqty;
            $this->db->select('*')->from('inventorystorage')->where('Projectid', 0)->where('Norex', $norex)->where('Color', $color)->where('Location', $loc)->where('LocOnSite', $loconsite);
            $query = $this->db->get();
            $row=$query->result();
            $result=$row[0];
            if ($query->num_rows() > 0) {
                $rqty = $rqty + $result->Qty;
                $d = array("Qty" => $rqty);
                $this->db->where('Norex', $norex)->where('Color', $color)->where('Projectid', 0)->where('Location', $loc)->where('LocOnSite', $loconsite);
                $this->db->update('inventorystorage', $d);
                $d = array("Qty" => $nqty);
                $this->db->where('Norex', $norex)->where('Color', $color)->where('Projectid', $Projectid)->where('Location', $loc)->where('LocOnSite', $loconsite);
                $this->db->update('inventorystorage', $d);
            } else {
                $this->db->insert('inventorystorage', array('Norex' => $norex, 'Color' => $color, 'Location' => $loc, 'LocOnSite' => $loconsite, 'Qty' => $rqty, 'Projectid' => 0));
                $d = array("Qty" => $nqty);
                $this->db->where('Norex', $norex)->where('Color', $color)->where('Projectid', $Projectid)->where('Location', $loc)->where('LocOnSite', $loconsite);
                $this->db->update('inventorystorage', $d);
            }

        }
    }
}
?>
