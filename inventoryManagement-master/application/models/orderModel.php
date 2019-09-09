<?php
/**
 * Created by PhpStorm.
 * User: HIT
 * Date: 14-11-2016
 * Time: 18:23
 */
class orderModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function allocate($dataToSave)
    {
        $insertData = array(
            'Norex' => $dataToSave['Norex'],
            'Color' => $dataToSave['Color'],
            'ProjId' => $dataToSave['Pid'],
            'Location' => $dataToSave['Location'],
            'LocOnSite' => $dataToSave['LocOnSite'],
            'Qty' => $dataToSave['Qty']
        );
        $rec=$dataToSave['Rqty'];
        $Qty=$insertData['Qty'];
        $this->db->select('Qty')->from('inventorystorage')->where('Norex',$insertData['Norex'])->where('Color',$insertData['Color'])->where('ProjId',$insertData['ProjId'])->where('Location',$insertData['Location'])->where('LocOnSite',$insertData['LocOnSite']);
        $data=$this->db->get();
        if($data->num_rows()>0)
        {
            $data=$data->result();
            $q=$data[0]->Qty;
            $q=$q+$rec;
            $d=array('Qty'=>$q);
            $this->db->where('Norex',$insertData['Norex'])->where('Color',$insertData['Color'])->where('ProjId',$insertData['ProjId'])->where('Location',$insertData['Location'])->where('LocOnSite',$insertData['LocOnSite']);
            $this->db->update('inventorystorage',$d);
        }
        else
        {
            $insertData['Qty']=$rec;
            $this->db->insert('inventorystorage', $insertData);
        }
        $insertData['ProjId']=0;
        if(($Qty-$rec)==0)
        {
            $this->db->where('Norex',$insertData['Norex'])->where('Color',$insertData['Color'])->where('ProjId',$insertData['ProjId'])->where('Location',$insertData['Location'])->where('LocOnSite',$insertData['LocOnSite']);
            $this->db->delete('inventorystorage');
        }
        else{
            $insertData['Qty']=$Qty-$rec;
            $this->db->where('Norex',$insertData['Norex'])->where('Color',$insertData['Color'])->where('ProjId',$insertData['ProjId'])->where('Location',$insertData['Location'])->where('LocOnSite',$insertData['LocOnSite']);
            $this->db->update('inventorystorage',$insertData);
        }
    }

    function Order($dataToSave){
        $insertData = array(
            'Norex' => $dataToSave['norexId'],
            //'Date' =>  date('Y-m-d'),
            'Color' => $dataToSave['color'],
            'ProjId' => $dataToSave['pid'],
            'Qty' => $dataToSave['Qty']
        );
        $this->db->select('*')->from('order')->where('Norex',$insertData['Norex'])->where('Color',$insertData['Color'])->where('ProjId',$insertData['ProjId']);
        $data=$this->db->get();
        if($data->num_rows()>0)
        {
            $data=$data->result();
            $q=$data[0]->Qty;
            $q=$q+$insertData['Qty'];
            $d=array('Qty'=>$q);
            $this->db->where('Norex',$insertData['Norex'])->where('Color',$insertData['Color'])->where('ProjId',$insertData['ProjId']);
            $this->db->update('order',$d);
        }
        else
            $this->db->insert('order', $insertData);

        return null;
    }
    function OrderToStock($Norex,$Color,$pid,$Qty,$loc,$los,$rec){


        //$this->db->select('Qty')->from('order')->where('Norex',$Norex)->where('Color',$Color)->where('ProjId',$pid);
        //$data=$this->db->get();
        if(($Qty-$rec)>0)
        {
            $sub=$Qty-$rec;
            $this->db->where('Norex',$Norex)->where('Color',$Color)->where('ProjId',$pid);
            $this->db->update('order',array('Qty'=>$sub ));
        }
        else
        {
            $this->db->where('Norex',$Norex)->where('Color',$Color)->where('ProjId',$pid);
            $this->db->delete('order');
        }

        $this->db->select('*')->from('inventorystorage')->where('Norex',$Norex)->where('Color',$Color)->where('ProjId',$pid)->where('Location',$loc)->where('LocOnSite',$los);
        $data=$this->db->get();
        if($data->num_rows()>0)
        {
            $data=$data->result();
            $q=$data[0]->Qty;
            $q=$q+$rec;
            $d=array('Qty'=>$q);
            $this->db->where('Norex',$Norex)->where('Color',$Color)->where('ProjId',$pid);
            $this->db->update('inventorystorage',$d);
        }
        else
        {

            $this->db->insert('inventorystorage',array('Norex'=>$Norex,'Color'=>$Color,'Location'=>$loc,'LocOnSite'=>$los,'Qty'=>$rec,'ProjId'=>$pid));
        }
        //$this->db->where('Norex',$Norex)->where('Color',$Color)->where('ProjId',$pid);
        //$this->db->delete("order");
    }
    function retriveOrder(){
        //$this->db->select('*')->from('order');
        $this->db->select('*')->from('order');
        $display=$this->db->get();
        if($display->num_rows()>0){
            $display=$display->result();
            return $display;
        }
            return array();

    }

    function retriveBom(){
        $this->db->select('Projectid,Qty,RQty,AstroDieNo,KeymarkDieNo,Finish,WeightxFeet,OrderLength,TotalLbs,NorexID')->from('bom');
        $display=$this->db->get();
        if($display->num_rows()>0){
            $display=$display->result();
           //echo $display[0]->Projectid;
          return $display;
        }
        return array();
    }

    function retrivePendingOrder(){
        $this->db->select('*')->from('pendingorder');
        $display=$this->db->get();
        if($display->num_rows()>0){
            $display=$display->result();
            //echo $display[0]->Projectid;
            return $display;
        }
        return array();
    }

    function retriveStock(){
        $this->db->select('*')->from('inventorystorage')->where('Projectid','0');
        $display=$this->db->get();
        if($display->num_rows()>0){
            $display=$display->result();
            return $display;
        }
        return array();
    }

    function DeleteBom($Norex,$Color,$pid)
    {
        $this->db->where('NorexID',$Norex)->where('Color',$Color)->where('Projectid',$pid);
        $this->db->delete("bom");
    }

    // pending orders

    function PlaceOrder($buforder)
    {
        $this->db->select('RQty','Qty')->from('bom')->where('Projectid',$buforder['Projectid'])->where('Finish',$buforder['Finish'])->where('AstroDieNo',$buforder['AstroDieNo'])->where('KeymarkDieNo',$buforder['KeymarkDieNo']);
        $data=$this->db->get();
        $Qty=$buforder['RQty'];
        if($data->num_rows()>0){
            $data=$data->result();
            echo $data[0]->RQty;
        }
        if($data[0]->RQty<=$buforder['RQty'])
        {
            $buforder->flag=2;
            $buforder['RQty']=0;
        }
        else
        {
            $buforder->flag=1;
            $buforder['RQty']=$data[0]->RQty-$buforder['RQty'];
        }
        $this->db->where('Projectid',$buforder['Projectid'])->where('Finish',$buforder['Finish'])->where('AstroDieNo',$buforder['AstroDieNo'])->where('KeymarkDieNo',$buforder['KeymarkDieNo']);
        $this->db->update('bom',$buforder);
        unset($buforder['RQty']);
        unset($buforder['flag']);
        $buforder['Qty']=$Qty;
        $this->db->insert('pendingorder',$buforder);
    }

    //place all order
    function placeAllOrder($po){
        $this->db->trans_start();
        echo json_encode($po);
        $data = explode(',',$po['checkedOrderList']);
        $die = $po['extruder'];
        foreach($data as $row)
        {
                $data2=explode('|',$row);
                $this->db->select('*')->from('pendingorder')->where('No',$data2[0]);
                $query=$this->db->get()->result();
                if($query[0]->Qty==$data2[1])
                {
                    unset($query[0]->No);
                    $query[0]->PO=$po['POnum'];
                    //echo '<br>'.json_encode($query[0]);
                    $this->db->insert('order',$query[0]);
                    $this->db->where('No',$data2[0]);
                    $this->db->delete("pendingorder");
                }
                else {
                    $query[0]->Qty -= $data2[1];
                    $this->db->where('No', $data2[0]);
                    $this->db->update('pendingorder', array('Qty' => $query[0]->Qty));
                    unset($query[0]->No);
                    $query[0]->PO = $po['POnum'];
                    $query[0]->Qty = $data2[1];
                    //echo '<br>'.json_encode($query[0]);
                    $this->db->insert('order', $query[0]);

                }
        }
        $this->db->trans_complete();
        if($die=='astro'){
            $this->db->select('ProjectId,Qty,AstroDieNo,Description,Finish,OrderLength,TotalLbs')->from('order')->where('PO',$po['POnum']);
            $data['printingPO']=$this->db->get();
            $this->load->view('printingPO');
        }
        else{
            $this->db->select('ProjectId,Qty,KeymarkDieNo,Description,Finish,OrderLength,TotalLbs')->from('order')->where('PO',$po['POnum']);
            $data['printingPO']=$this->db->get();
            $this->load->view('printingPO');
        }
    }

    function ChangeOrder($buforder)
    {
        unset($buforder['submit']);
        $this->db->where('Projectid',$buforder['Projectid'])->where('Finish',$buforder['Finish']);//->where('AstroDieNo',$buforder['AstroDieNo'])->where('KeymarkDieNo',$buforder['KeymarkDieNo']);
        $this->db->update('pendingorder',$buforder);

    }

    public function deleteOrder($data)
    {
       echo json_encode($data);
    }





}
?>