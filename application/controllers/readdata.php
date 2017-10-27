<meta charset="UTF-8" />
<?php
class Readdata extends CI_Controller
{
	
	
	public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model(array('ikmc_model'));
		$this->load->library('session');
        
    }
    function readdata_excel($name){
        echo "abc";
    	 require_once './application/libraries/PHPExcel/Classes/PHPExcel.php';
        $filename = 'uploadfile/thong-tin-thi-sinh/'.trim($name);
        if(!file_exists('uploadfile/thong-tin-thi-sinh/')){
        	mkdir('uploadfile/thong-tin-thi-sinh/', 0777, true);
        }
        $inputFileType = PHPExcel_IOFactory::identify($filename);
        
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        //echo $objReader;
         //if(isset($objReader)){
        $objReader->setReadDataOnly(true);
         
        /**  Load $inputFileName to a PHPExcel Object  **/
        
        $objPHPExcel = $objReader->load("$filename");
         
        $total_sheets=$objPHPExcel->getSheetCount();
         
        $allSheetName=$objPHPExcel->getSheetNames();
        $objWorksheet  = $objPHPExcel->setActiveSheetIndex(0);
        $highestRow    = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
        // $style = $objWorksheet->getRowDimensions(1)->setRowHeight(-1);
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
        $arraydata['view'] = array();
         // $objPHPExcel -> setActiveSheetIndex ( 0 )-> getStyle ( 'A' . $p_i )-> getAlignment ()-> setWrapText ( false ); 
        echo "abc";
        for ($row = 1; $row <= $highestRow;++$row)
        {
            for ($col = 0; $col <$highestColumnIndex;++$col)
            {
                $value=$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                
                $arraydata['view'][$row-1][$col]=$value;
               
            }
        }
        // hết phần lấy dl thừ file


        //lấy giá trị của công thức
        // for ($row = 1; $row <= $highestRow;++$row)
        // {
            
        //        $total = $objWorksheet -> getCell ( 'B' . $row )-> getValue (); 
        //         if ( strstr ( $total , '=' )== true ) 
        //         { 
        //         $total = $objWorksheet -> getCell ( 'B' . $row )-> getOldCalculatedValue (); 
        //         } 
        //         $arraydata['view'][$row-1][1]=$total;
            
        // }

        //xử lý dữ liệu
        $numberhead = 1;
        $numbercol = count($arraydata['view'][$numberhead]);
        $numberrow = count($arraydata['view']);
        $m =0;
        $data=array();
         echo $numberrow;
          for($i = 0; $i< $numberrow;$i++){ 
            $count = 0;
            for($j = 0; $j < $numbercol;$j++){

                if($arraydata['view'][$i][$j] == ""){
                    $count +=1;
                }
            }
            if($count < $numbercol -1){
                for($n = 0; $n < $numbercol; $n++){
                    $data[$m][$n] = $arraydata['view'][$i][$n];
                }
                $m +=1;
            }
         }
             
         $add_data= array();
         for($i = 0 ; $i < count($data)-$numberhead; $i++){
            $add_data[$i]['lastname_middlename'] = $data[$i+$numberhead][1];
            $add_data[$i]['firstname'] = $data[$i+$numberhead][2];
            $add_data[$i]['dateofbirth'] = $data[$i+$numberhead][3];
            $add_data[$i]['monthofbirth'] = $data[$i+$numberhead][4];
            $add_data[$i]['yearofbirth'] = $data[$i+$numberhead][5];
            $add_data[$i]['gender'] = $data[$i+$numberhead][6];
            $add_data[$i]['grade'] = $data[$i+$numberhead][7];
            $add_data[$i]['class'] = $data[$i+$numberhead][8];
            $add_data[$i]['school'] = $data[$i+$numberhead][9];
            $add_data[$i]['codenumber'] = $data[$i+$numberhead][10];
            $add_data[$i]['examinationroom'] = $data[$i+$numberhead][11];
            $add_data[$i]['examlocation'] = $data[$i+$numberhead][12];
            
         }
         //var_dump($add_data);
         $this->ikmc_model->information_contestants($add_data);
         // echo '<pre>';
         // print_r(($add_data));
         // echo '</pre>';die;
    }
}

?>