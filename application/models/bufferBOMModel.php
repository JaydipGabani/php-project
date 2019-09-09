<?php
class bufferBOMModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
    parent::__construct();
    }

    function moveToBOM()
    {
        $date=date('Y-m-d');
        $time = time();
        $query = $this->db->get('bufferbom');
        foreach ($query->result() as $row) {
            $row->Date=$date;
            $row->Time=$time;
            $row->RQty=$row->Qty;
            $this->db->insert('bom',$row);
        }
        $this->db->truncate('bufferbom');
    }

    function deleteBufferBOM($del){
        $this->db->where('No',$del['No']);
        $this->db->delete('bufferbom');

    }

    function retriveBufferBOM()
    {
        $this->db->select('*')->from('bufferbom');
        $display=$this->db->get();
        if($display->num_rows()>0){
            $display=$display->result();
            return $display;
        }
        return array();
    }

    function ChangeBufferBOM($data)
    {
        //echo json_encode($data);
        $this->db->select('Projectid,Qty,AstroDieNo,KeymarkDieNo,Finish,WeightxFeet,OrderLength,TotalLbs,NorexID,No')->from('bufferbom')->where('No',$data['No']);
        $buf=$this->db->get();
        $buf=$buf->result_array();
        $buf[0]['Projectid']=$data['Projectid'];
        $buf[0]['NorexID']=$data['NorexID'];
        $buf[0]['Finish']=$data['Finish'];
        $buf[0]['Qty']=$data['Qty'];
        $buf[0]['OrderLength']=$data['OrderLength'];
        //echo json_encode($buf);
        $this->db->where('No',$data['No']);
        $this->db->update('bufferbom',$buf[0]);
    }

    function BOMExcelData($data)
    {
        $x = json_encode ($this->input->post('excelData'));
        $y= json_decode($x,true);
        echo strlen($y);
        $a = strpos($y, "Client");
        echo "Client :";
        for ($i = $a + 7; $y[$i] != ','; $i++) {
            echo $y[$i];
        }
        echo "<br>";
        $a = strpos($y, "Proj. ID #:");
        echo "Proj. ID #: ";
        $s='';
        for ($i = $a + 12; $y[$i] != ','; $i++) {
            $s=$s.$y[$i];
        }
        echo "<br>";

        $a = 566;
        echo $a . "<br>";
        $c = 154;

       ;
        $i=$a;

        $r=0;


        while ($c< 722) {
            echo "<br>";
            $bomdata = array(
                '0' => $s,
                '1' => '',
                '2' => '',
                '3' => '',
                '4' => '',
                '5' => '',
                '6' => '',
                '7' => '',
                '8' => '',
            );

            $d = $c + 8;
            $j = 1;
            for ($i = $a; $c < $d; $i++) {
                if ($y[$i] != ',') {
                    $bomdata[$j] .= $y[$i];
                    //    echo $y[$i];
                }
                // echo $y[$i];
                if ($y[$i] == ',') {
                    $c++;
                    $j++;
                }
                $a = $i;
            }
            $lbs=(float)$bomdata['1']*(float)$bomdata['7']*(float)$bomdata['6']/12;
            if ($bomdata['1'] != 0) {
                $insertdata = array('Projectid' => $bomdata['0'],
                    'Qty' => $bomdata['1'],
                    'Description' => $bomdata['2'],
                    'AstroDieNo' => $bomdata['3'],
                    'KeymarkDieNo' => $bomdata['4'],
                    'Finish' => $bomdata['5'],
                    'WeightxFeet' => $bomdata['6'],
                    'OrderLength' => $bomdata['7'],
                    'TotalLbs' => $lbs,
                    'NorexID'=>'11221'
                );
                $this->db->insert('bufferbom', $insertdata);
            }
            $d = $c + 12;
            for (; $c < $d; $a++) {

                if ($y[$a] == ',') {
                    $c++;
                }
            }
        }

    }
}
