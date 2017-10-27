<?php
class ikmcstatistics_controller extends CI_Controller
{
	
	
	public function __construct() {
        parent::__construct();
        $this->load->library('ciqrcode');
       
         $this->load->helper('download');
         $this->load->model('studentcard2017_model');
    }
    public function getDataFromAPI(){
        $url = "https://ieg.dinosys.vn/api/student_attendance";
        $dataRaw = file_get_contents($url);
        $data = json_decode($dataRaw);
        foreach ($data as $key => &$student) {
            $student =  (array)$student;
            $school  = $this->studentcard2017_model->getSchoolname($student['school_id']);
            $venue   = $this->studentcard2017_model->getVenueName($student['venue_id']);
            $student['room'] = str_pad($student['room'], 2, '0', STR_PAD_LEFT);
            if($school!=null){
                 $student['school_name'] = $school['name'];
             }else{
                $student['school_name'] = "N/A";
             }
             if($venue!=null){
                 $student['venue_name'] = $venue['name'];
             }else{
                $student['venue_name'] = "N/A";
             }
           if($student['attendance_time']!==null){
             $student['attendance_time'] = substr($student['attendance_time'], 11,8);
         }
           
            $student = (object)$student;
            // var_dump($student);
            // break;
           }
         echo json_encode($data);
    }
    public function view(){
        $data['venues'] = $this->studentcard2017_model->get_all_venues();
        $this->load->view('ikmc2017/backend/dataTable', $data);
    }
}