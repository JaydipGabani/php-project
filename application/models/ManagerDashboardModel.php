<?php



class ManagerDashboardModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor

        parent::__construct();

    }
    public function readFile()
    {
        $userFile="./uploads/BOM.xls";
        $this->load->library('excel');

        $objPHPExcel = PHPExcel_IOFactory::load($userFile);
        //$colNumber = PHPExcel_Cell::columnIndexFromString("J");
        //get only the Cell Collection
        $sheet = $objPHPExcel->getActiveSheet();
        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
        //$sheet = $objPHPExcel->getSheet(1);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        print($highestRow);
        print("<br>");
        print($highestColumn);

        /*for ($row = 9; $row <= $highestRow-4; ++$row) {
            for ($col = 2; $col <= $highestColumnIndex-6; ++$col) {
                $rows = $objWorksheet->getCellByColumnAndRow($col, $row)->getCalculatedValue();
                print($rows);
            }
        }*/
        //mysql_query("INSERT INTO your_table (col1,col2) VALUES ($rows[1],$rows[2])");

        //extract to a PHP readable array format
        foreach ($cell_collection as $cell) {
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getCalculatedValue();
            //header will/should be in row 1 only. of course this can be modified to suit your need.
            if ($row == 1) {
                echo $data_value;
            } else {
                echo $data_value;
            }
            print("<br>");
        }
        //echo $header . $arr_data;
        //echo $userFile;

    }
}
?>