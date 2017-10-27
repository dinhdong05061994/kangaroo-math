<?php
class Ikmc2017result_controller extends CI_Controller
{
	
	
	public function __construct() {
        parent::__construct();
         $this->load->model('ikmc2017_model');
    }
    public function read_student_data(){
      $data = $this->readresult();
      var_dump($data);
    }
 	function update_data(){
 		$results = $this->ikmc2017_model->get_all_result();
 		$students = $this->ikmc2017_model->get_all_students();
 		foreach ($students as $student) {
 			foreach ($results as $result) {
 				if($result['sbd']===$student['sbd']){
          if($result['state']=="Vắng"){
            $state = 0;
          }else{
            $state=1;
          }
 					$data = array(
 						'fullname' => $result['fullname'],
 						'birthday' => $result['birthday'],
 						'score' => $result['score'],
 						'prize' => $result['prize'],
 						'status'=> $state
 						);
 					$this->ikmc2017_model->update_students_result($student['sbd'],$data);
 					break;
 				}
 			}
 		}
 	}
 	function searchresult(){
      if(isset($_POST['fullname'])){
        $fullname = $_POST['fullname'];
        $birthday = $_POST['birthday'];
        $newformat = date('Y-m-d',strtotime(str_replace('/', '-', $birthday)));
   

           
        $data['student'] = $this->ikmc2017_model->get_student($fullname,$newformat);
          $this->load->view('ikmc2017/searchresult', $data);
      }else{
          $this->load->view('ikmc2017/searchresult');
      }
       
       
 	
  
 	}
}
?>