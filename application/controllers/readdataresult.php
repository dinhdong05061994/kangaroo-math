<meta charset="UTF-8" />
<?php
class Readdataresult extends CI_Controller
{
	
	
	public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model(array('ikmc_model'));
		$this->load->library('session');
        
    }
    function readdata_excel($name){
        
    	 require_once './application/libraries/PHPExcel/Classes/PHPExcel.php';
        $filename = 'C:/Users/tuyen/Desktop/'.trim($name);
        if(!file_exists('C:/Users/tuyen/Desktop/')){
        	mkdir('C:/Users/tuyen/Desktop/', 0777, true);
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
         //echo $numberrow;
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
            $add_data[$i]['fullname'] = $data[$i+$numberhead][1];
            $add_data[$i]['code'] = $data[$i+$numberhead][2];
            $add_data[$i]['point']['q1'] = $data[$i+$numberhead][3];
            $add_data[$i]['point']['q2'] = $data[$i+$numberhead][4];
            $add_data[$i]['point']['q3'] = $data[$i+$numberhead][5];
            $add_data[$i]['point']['q4'] = $data[$i+$numberhead][6];
            $add_data[$i]['point']['q5'] = $data[$i+$numberhead][7];
            $add_data[$i]['point']['q6'] = $data[$i+$numberhead][8];
            $add_data[$i]['point']['q7'] = $data[$i+$numberhead][9];
            $add_data[$i]['point']['q8'] = $data[$i+$numberhead][10];
            $add_data[$i]['point']['q9'] = $data[$i+$numberhead][11];
            $add_data[$i]['point']['q10'] = $data[$i+$numberhead][12];
            $add_data[$i]['point']['q11'] = $data[$i+$numberhead][13];
            $add_data[$i]['point']['q12'] = $data[$i+$numberhead][14];
            $add_data[$i]['point']['q13'] = $data[$i+$numberhead][15];
            $add_data[$i]['point']['q14'] = $data[$i+$numberhead][16];
            $add_data[$i]['point']['q15'] = $data[$i+$numberhead][17];
            $add_data[$i]['point']['q16'] = $data[$i+$numberhead][18];
            $add_data[$i]['point']['q17'] = $data[$i+$numberhead][19];
            $add_data[$i]['point']['q18'] = $data[$i+$numberhead][20];
            $add_data[$i]['point']['q19'] = $data[$i+$numberhead][21];
            $add_data[$i]['point']['q20'] = $data[$i+$numberhead][22];
            $add_data[$i]['point']['q21'] = $data[$i+$numberhead][23];
            $add_data[$i]['point']['q22'] = $data[$i+$numberhead][24];
            $add_data[$i]['point']['q23'] = $data[$i+$numberhead][25];
            $add_data[$i]['point']['q24'] = $data[$i+$numberhead][26];
            $add_data[$i]['point']['q25'] = $data[$i+$numberhead][27];
            $add_data[$i]['point']['q26'] = $data[$i+$numberhead][28];
            $add_data[$i]['point']['q27'] = $data[$i+$numberhead][29];
            $add_data[$i]['point']['q28'] = $data[$i+$numberhead][30];
            $add_data[$i]['point']['q29'] = $data[$i+$numberhead][31];
            $add_data[$i]['point']['q30'] = $data[$i+$numberhead][32];
           
            
         }
         //var_dump($add_data);
         //$this->ikmc_model->information_contestants($add_data);
         echo '<pre>';
         print_r(($add_data));
         echo '</pre>';
         $data_result = array();
         //echo count($add_data);
         for($m =0 ; $m < count($add_data); $m++){
            $data_result[$m]['fullname'] =   $add_data[$m]['fullname'];
            $data_result[$m]['code'] = $add_data[$m]['code'];
            $data_result[$m]['point'] = $this->compute_points($add_data[$m]);
            $data_result[$m]['longeststring_correct_answers'] = $this->longeststring_correct_answers($add_data[$m]);
         }
         echo '<pre>';
         print_r(($data_result));
         echo '</pre>';die;
    }
    function compute_points($data){
        $point_per_question_a = 3;
        $number_a= $data['code'] == 'Grade 1-2'? 6 :($data['code'] == 'Grade 3-4' ? 7 : 8) ;
        $point_per_question_b = 4;
        $number_b= $data['code'] == 'Grade 1-2'? 7 :($data['code'] == 'Grade 3-4' ? 8 : 9) ;
        $point_per_question_c = 5;
        $number_c= $data['code'] == 'Grade 1-2'? 5 :($data['code'] == 'Grade 3-4' ? 9 : 5) ;
        $totalpoint = 0;
        $count = 0;
        for($j = 1 ; $j <= $number_a; $j++ ){
            if($data['point']['q'.$j] == 1){
                $count +=1;
            }
        }
        $totalpoint += ($count*$point_per_question_a);         
        $count = 0;
        for($j = ($number_a +1); $j <= ($number_a+$number_b); $j++ ){
          
            if($data['point']['q'.$j] == 1){

                $count +=1;
              
            }
        }       
        $totalpoint += ($count*$point_per_question_b);
        $count = 0;
        for($j = ($number_a+$number_b +1); $j <= ($number_a+$number_b+$number_c); $j++ ){
            if($data['point']['q'.$j] == 1){
                $count +=1;
            }
        }
        $totalpoint += ($count*$point_per_question_c);        
        return $totalpoint;
    }
    function longeststring_correct_answers($data){
        $temp= implode($data['point']);
        $temp = str_replace('0',',',$temp);
        $arr = explode(',', $temp);
        $str_point = array();
        $str_point['longest'] = "";
        $str_point['length'] = 0;
        for($i = 0 ; $i < sizeof($arr);$i++){
            if(strlen($arr[$i]) > strlen($str_point['longest'])){
                $str_point['longest'] = $arr[$i];
                $str_point['length'] = strlen($arr[$i]);
            }
        }
        return $str_point;
    }
}

?>