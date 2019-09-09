<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 17-02-2017
 * Time: 00:37
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class recordModel extends CI_Model
{

//    public function getCountry($page){
//
//    }

    function printingTags($data)
    {
        $abcd = [];
        $barcode = explode(",", $data['dataForPrinting']);
        for ($i = 0; $i < count($barcode); $i++) {
            $this->db->select('*')->from('inventorystorage')->where('Barcode', $barcode[$i]);
            $data = $this->db->get()->result();
            $abcd = array_merge($abcd, $data);
        }
        return $abcd;
    }

    function getCountry($date, $NorexID, $AstroDieNo, $Projectid, $KeymarkDieNo, $Finish, $PO, $Location, $LocOnSite, $Tag_No, $Barcode, $orderby, $sort, $issued, $page)
    {
//        echo json_encode($date);

        $offset = 10 * $page;
        $limit = 10;
        $sql = "select * from inventorystorage where ";
//        echo $data;
//        echo json_encode($data);
        $f = 0;

        if ($date != null) {
            $sql = $sql . " date = '" . $date . "' ";
            $f = 1;
        }
        if ($NorexID != null && $f == 0) {
            $sql = $sql . "NorexID = '" . $NorexID . "' ";
            $f = 1;
        } else if ($NorexID != null) {
            $sql = $sql . "AND NorexID = '" . $NorexID . "' ";
        }

        if ($AstroDieNo != null && $f == 0) {
            $sql = $sql . "AstroDieNo = '" . $AstroDieNo . "' ";
            $f = 1;
        } else if ($AstroDieNo != null) {
            $sql = $sql . "AND AstroDieNo = '" . $AstroDieNo . "' ";
        }

        if ($Projectid != null && $f == 0) {
            $sql = $sql . "Projectid = '" . $Projectid . "' ";
            $f = 1;
        } else if ($Projectid != null) {
            $sql = $sql . "AND Projectid = '" . $Projectid . "' ";
        }

        if ($KeymarkDieNo != null && $f == 0) {
            $sql = $sql . "KeymarkDieNo = '" . $KeymarkDieNo . "' ";
            $f = 1;
        } else if ($KeymarkDieNo != null) {
            $sql = $sql . "AND KeymarkDieNo = '" . $KeymarkDieNo . "' ";
        }

        if ($Finish != null && $f == 0) {
            $sql = $sql . "Finish = '" . $Finish . "' ";
            $f = 1;
        } else if ($Finish != null) {
            $sql = $sql . "AND Finish = '" . $Finish . "' ";
        }

        if ($PO != null && $f == 0) {
            $sql = $sql . "PO = '" . $PO . "' ";
            $f = 1;
        } else if ($PO != null) {
            $sql = $sql . "AND PO = '" . $PO . "' ";
        }

        if ($Location != null && $f == 0) {
            $sql = $sql . "Location = '" . $Location . "' ";
            $f = 1;
        } else if ($Location != null) {
            $sql = $sql . "AND Location = '" . $Location . "' ";
        }

        if ($LocOnSite != null && $f == 0) {
            $sql = $sql . "LocOnSite = '" . $LocOnSite . "' ";
            $f = 1;
        } else if ($LocOnSite != null) {
            $sql = $sql . "AND LocOnSite = '" . $LocOnSite . "' ";
        }

        if ($Tag_No != null && $f == 0) {
            $sql = $sql . "Tag_No = '" . $Tag_No . "' ";
            $f = 1;
        } else if ($Tag_No != null) {
            $sql = $sql . "AND Tag_No = '" . $Tag_No . "' ";
        }

        if ($Barcode != null && $f == 0) {
            $sql = $sql . "Barcode = '" . $Barcode . "' ";
            $f = 1;
        } else if ($Barcode != null) {
            $sql = $sql . "AND Barcode = '" . $Barcode . "' ";
        }

        if ($issued != null && $f == 0) {
            $sql = $sql . "wentforcutting = '" . $issued . "' ";
            $f = 1;
        } else if ($issued != null) {
            $sql = $sql . "AND wentforcutting = '" . $issued . "' ";
        }

        if ($orderby != null)
            $sql = $sql . "ORDER BY No,$orderby $sort";

        if ($f == 0) {
            $sqla = "select * from inventorystorage order by $orderby $sort limit " . $offset . ',' . $limit;
//            echo $sqla;
            $result = $this->db->query($sqla)->result();
            return $result;
        } else {
            $sql = $sql . ' limit ' . $offset . ',' . $limit;
//            echo $sql;
            $result = $this->db->query($sql)->result();
            return $result;
        }
    }
}