<?php

/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 08-02-2017
 * Time: 23:52
 */
class manifestModel extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function printManifest()
    {
        $this->db->trans_start();
        $printingData = array();
        $manifest = $this->db->select('*')->from('menifest')->get()->result();
//        echo json_encode($manifest);
        foreach ($manifest as $obj) {
            $keymarksearch = '%' . substr(str_replace(' ', '', $obj->KeymarkDieNo), 1);

//            $query = $this->db->select('NOREX,MODEL,LOCATION,DESCRIPTION')->from('rawvalues')->where('ASTRO', $obj->AstroDieNo)->or_where("KEYMARK LIKE '" . $keymarksearch . "'");
//            $line2 = $this->db->get()->result();
//            print_r($query);
//            echo json_encode($line2).'<hr>';
            $insertdata = array
            (
                'Date' => $obj->ShipD,
                'PO' => $obj->PO,
                'Tag_No' => ((int)$obj->Barcode) + 70590,
                'Projectid' => $obj->NBP,
                'AstroDieNo' => $obj->AstroDieNo,
                'KeymarkDieNo' => $obj->KeymarkDieNo,
                'NorexID' => $obj->NorexID,
                'Description' => $obj->Part_Description,
                'Finish' => $obj->Finish,
                'OrderLength' => $obj->Length,
                'Qty' => $obj->Pcs,
                'WeightxFeet' => $obj->Ft,
                'TotalLbs' => $obj->NetWt,
                'Model' => $obj->Model,
                'Barcode' => $obj->Barcode,
                'Location' => $obj->Location,
                'LocOnSite' => $obj->LocOnSite,
                'pname' => $obj->pname
            );
            array_push($printingData, $insertdata);
            $this->db->insert('inventorystorage', $insertdata);
        }
        $this->db->empty_table('menifest');
        $this->db->trans_complete();
        $data['tags'] = $tags = json_decode(json_encode($printingData));
        $this->load->view('printingTags', $data);
    }

    function manifestReaderAstro($data)
    {
        $this->db->trans_begin();
        $data = json_encode($data);
        $data = explode('\r\n', $data);
        $data = array_slice($data, 1, count($data) - 3);
        foreach ($data as $obj) {
            $f = 0;//flag for rollback
            $obj = explode(',', $obj);
            $PoPid = explode('\/ID # ', $obj[1]);

            $query = $this->db->select('NOREX,MODEL,LOCATION,DESCRIPTION,LBFT')->from('rawvalues')->where('ASTRO', $obj['7']);
            $line2 = $this->db->get();
            if ($line2->num_rows() > 0) {
                $line2 = $line2->result();
            } else {
                echo '<script>alert("NorexID for Astro Die ' . $obj['7'] . ' is not available");</script>';
                $this->db->trans_rollback();
                return null;
            }

            $query2 = $this->db->select('pname')->from('projects')->where('pid', $PoPid['1']);
            $projectname = $this->db->get();
            if ($projectname->num_rows() > 0) {
                $projectname = $projectname->result();
            } else {
                echo '<script>alert("Project ID ' . $PoPid['1'] . ' is not available");</script>';
                $this->db->trans_rollback();
                return null;
            }

            //echo json_encode($projectname['0']);
            $insertdata = array
            (
                'ShipD' => str_replace('\\', "", $obj['0']),
                'PO' => $PoPid['0'],
                'NBP' => $PoPid['1'],
                'BL' => $obj['2'],
                'Manifest' => $obj['3'],
                'Ticket' => $obj['4'],
                'SO' => $obj['5'],
                'Item' => $obj['6'],
                'AstroDieNo' => $obj['7'],
                'Part_Description' => $line2[0]->DESCRIPTION,
                'Finish' => $obj['9'],
                'Length' => $obj['10'],
                'Pcs' => $obj['11'],
                'Ft' => $line2[0]->LBFT,
                'NetWt' => $obj['13'],
                'NorexID' => $line2[0]->NOREX,
                'Model' => $line2[0]->MODEL,
                'Location' => $line2[0]->LOCATION,
                'LocOnSite' => 'NA',
                'pname' => $projectname[0]->pname
            );
            $this->db->insert('menifest', $insertdata);
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }

        return null;
    }

    function manifestReaderKeymark($data)
    {
        $this->db->trans_begin();
        $data = json_encode($data);
        $data = explode('\r\n', $data);
        $data = array_slice($data, 1, count($data) - 2);

        foreach ($data as $obj) {
            $obj = explode(',', $obj);
            $keymark = $obj['8'][0] . '-' . substr($obj['8'], 1);
            $query = $this->db->select('NOREX,MODEL,LOCATION,DESCRIPTION,LBFT')->from('rawvalues')->where('KEYMARK', $keymark);
            $line2 = $this->db->get();
            if ($line2->num_rows() > 0) {
                $line2 = $line2->result();
            } else {
                echo '<script>alert("NorexID for Keymark Die ' . $obj['8'] . ' is not available");</script>';
                $this->db->trans_rollback();
                return null;
            }

            $query2 = $this->db->select('pname')->from('projects')->where('pid', $obj['2']);
            $projectname = $this->db->get();
            if ($projectname->num_rows() > 0) {
                $projectname = $projectname->result();
            } else {
                echo '<script>alert("Project ID' . $obj['2'] . ' is not available");</script>';
                $this->db->trans_rollback();
                return null;
            }

            $insertdata = array
            (
                'ShipD' => str_replace('\\', "", $obj['0']),
                'PO' => $obj['1'],
                'NBP' => $obj['2'],
                'BL' => $obj['3'],
                'Manifest' => $obj['4'],
                'Ticket' => $obj['5'],
                'SO' => $obj['6'],
                'Item' => $obj['7'],
                'KeymarkDieNo' => $keymark,
                'Part_Description' => $line2[0]->DESCRIPTION,
                'Finish' => $obj['10'],
                'Length' => $obj['11'],
                'Pcs' => $obj['12'],
                'Ft' => $line2[0]->LBFT,
                'NetWt' => $obj['13'],
                'NorexID' => $line2[0]->NOREX,
                'Model' => $line2[0]->MODEL,
                'Location' => $line2[0]->LOCATION,
                'LocOnSite' => 'NA',
                'pname' => $projectname[0]->pname
            );
            $this->db->insert('menifest', $insertdata);
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
        return null;
    }

    //retrive all data of manifest
    function retriveManifest()
    {
        $this->db->select('*')->from('menifest');
        $display = $this->db->get();
        if ($display->num_rows() > 0) {
            $display = $display->result();
            return $display;
        }
        return array();

    }

    //update manifest table
    public function editTuple($data)
    {
        $this->db->trans_start();
        $query = $this->db->select('NOREX,MODEL,LOCATION,DESCRIPTION,LBFT')->from('rawvalues')->where('ASTRO', $data['AstroDieNo']);
        $line2 = $this->db->get()->result();
        $insertdata = array
        (
            'ShipD' => $data['ShipD'],
            'KeymarkDieNo' => "",
            'AstroDieNo' => "",
            'Part_Description' => $line2[0]->DESCRIPTION,
            'Finish' => $data['Finish'],
            'Length' => $data['Length'],
            'Pcs' => $data['Qty'],
            'Ft' => $line2[0]->LBFT,
            'NorexID' => $line2[0]->NOREX,
            'Model' => $line2[0]->MODEL,
            'Location' => $line2[0]->LOCATION,
            'LocOnSite' => $data['LocOnSite'],
            'NetWt' => (($data['Length'] * $data['Qty'] * $line2[0]->LBFT) / 12)
        );
        if ($data['AstroDieNo'] == null) {
            $insertdata['KeymarkDieNo'] = $data['KeymarkDieNo'];
        } else {
            $insertdata['AstroDieNo'] = $data['AstroDieNo'];
        }
        if ($data['ShipD'] == null) {
            unset($insertdata['ShipD']);
        }
        $this->db->where('Barcode', $data['Barcode']);
        $this->db->update('menifest', $insertdata);
        $this->db->trans_complete();

    }

    public function clearManifest($data)
    {
        $this->db->trans_start();
        $this->db->select('*')->from('menifest');
        $display = $this->db->get()->result();
        $this->db->empty_table('menifest');
        $val = $display[0]->Barcode;
        $sql = "ALTER TABLE menifest AUTO_INCREMENT = $val";
        $query = $this->db->query($sql);
        $this->db->trans_complete();
    }
}