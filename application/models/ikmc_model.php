<?php
class ikmc_model extends CI_Model {
     function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();  
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    
    function load_system_argument() {
        $sql = "SELECT * 
                FROM new_argument";
        $query = $this->db->query($sql);
        
        return $query->first_row("array");
    }
    function load_address_competition() {
        $sql = "SELECT * 
                FROM address_competition ORDER BY province";
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
    function load_list_chuyende() {
        $sql = "SELECT * 
                FROM topic";
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
	
	
	
	function load_list_news($perpage = '',$index = '') {
        $sql = "SELECT * 
                FROM newspapers_information WHERE type = 2 AND status = 1 ORDER BY newspapers_information.order DESC LIMIT $perpage,$index";
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
	function count_news() {
        $sql = "SELECT * 
                FROM newspapers_information WHERE type = 2";
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
	function count_newpaper() {
        $sql = "SELECT * 
                FROM newspapers_information WHERE type = 1";
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
	function load_list_newpaper($perpage = '',$index = '') {
        $sql = "SELECT * 
                FROM newspapers_information WHERE type = 1 AND status = 1 ORDER BY newspapers_information.order DESC Limit $perpage,$index";
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
	function load_newpaper_max() {
        $sql = "SELECT * 
                FROM newspapers_information WHERE type = 1 AND status = 1 ORDER BY newspapers_information.order DESC Limit 0,1";
        $query = $this->db->query($sql);
        
        return $query->row_array();
    }
	function load_news_max() {
        $sql = "SELECT * 
                FROM newspapers_information WHERE type = 2 AND status = 1 ORDER BY newspapers_information.order DESC Limit 0,1";
        $query = $this->db->query($sql);
        
        return $query->row_array();
    }
	function news_item($id = 0) {
        $sql = "SELECT * 
                FROM newspapers_information WHERE id = $id";
        $query = $this->db->query($sql);
        
        return $query->row_array();
    }
	function load_list_lecture($id = 0) {
        $sql = "SELECT * 
                FROM lecture WHERE course_id = $id ORDER BY lecture.order ASC";
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
	function get_list_para($id = 0) {
        $sql = "SELECT *
                FROM para_lecture WHERE id_lecture = $id ORDER BY para_lecture.order ASC";
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
	function item_lecture($id = 0) {
        $sql = "SELECT * 
                FROM course1 WHERE id = $id";
        $query = $this->db->query($sql);
        
        return $query->row_array();
    }
	function get_math_user($user_id = 0,$id = 0) {
        $sql = "SELECT * 
                FROM record_user_topic WHERE user_id = $user_id AND topic_id = $id";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    //13/10/16: tuyen thêm
    function get_all_score_user($user_id = 0) {
        $sql = "SELECT * 
                FROM record_user_topic WHERE user_id = $user_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	//end
	
	
	
	
	
	
	
	
	
	
    function load_list_organizers() {
        $sql = "SELECT * 
                FROM organizers_donors WHERE type = 1";
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
    function load_list_donors() {
        $sql = "SELECT * 
                FROM organizers_donors WHERE type = 2";
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
    function load_list_notice() {
        $sql = "SELECT * 
                FROM notice_boards WHERE status = 1";
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
    function insert_require_user($data) {
        $this->db->insert("require_user", $data);
    }
    function insert_register($data) {
        $this->db->insert("student_register_online", $data);
    }
    
    function getnamepdf_regulations_examination_room(){
        $sql = "SELECT `file_pdf` FROM `new_argument` ORDER BY `id` DESC";
        return $this->db->query($sql)->first_row('array');
    }
    
    function information_contestants($data){
        for($i =0 ; $i< sizeof($data);$i++){
            $lastname_middlename = trim($data[$i]['lastname_middlename']);
            $firstname = trim($data[$i]['firstname']);
            $dateofbirth = trim($data[$i]['dateofbirth']);
            $monthofbirth = trim($data[$i]['monthofbirth']);
            $yearofbirth = trim($data[$i]['yearofbirth']);
            $gender = strtolower(trim($data[$i]['gender'])) =='nam' ? 1 :2; 
            $grade = trim($data[$i]['grade']);
            $class = trim($data[$i]['class']);
            $school = trim($data[$i]['school']);
            $codenumber = trim($data[$i]['codenumber']);
            $examinationroom = trim($data[$i]['examinationroom']);
            $examlocation = trim($data[$i]['examlocation']);
            $sql = "INSERT INTO `information_contestants`(`id`, `lastname_middlename`, `firstname`, `dateofbirth`, `monthofbirth`, 
                `yearofbirth`, `gender`, `grade`, `class`, `school`, `codenumber`, `examinationroom`, `examlocation`) 
                VALUES ('','$lastname_middlename','$firstname','$dateofbirth','$monthofbirth','$yearofbirth','$gender','$grade',
                '$class','$school','$codenumber','$examinationroom','$examlocation')";
            $this->db->query($sql);
        }
    }
    function read_information_contestants($data){
        $name  = $data['name'];
        $date = $data['date'];
        $month = $data['month'];
        $year = $data['year'];
        $sql = "SELECT * FROM `information_contestants` WHERE  
             LOWER(CONCAT(REPLACE(TRIM(`lastname_middlename`),' ',''),REPLACE(TRIM(`firstname`),' ',''))) =  LOWER(REPLACE(TRIM(N'$name'),' ','')) 
             AND (REPLACE(trim(`dateofbirth`),' ','') =  REPLACE(trim('$date'),' ','') OR REPLACE(trim(`dateofbirth`),' ','') =   REPLACE(REPLACE(trim('$date'),' ',''),'0',''))AND 
             (REPLACE(trim(`monthofbirth`),' ','') =  REPLACE(REPLACE(trim('$month'),' ',''),'0','') OR REPLACE(trim(`monthofbirth`),' ','') =  REPLACE(trim('$month'),' ',''))AND 
            REPLACE(trim(`yearofbirth`),' ','') =  REPLACE(trim('$year'),' ','')";
        return $this->db->query($sql)->result_array();

    }
    function read_result_ikmc($data){
        //$name  = trim($data['name']);
        $name  = str_replace(" ","",trim($data['name']));
        $date = (int)trim($data['date']);
        $month = (int)trim($data['month']);
        $year = (int)trim($data['year']);

        $d = trim($data['date']);
        $m = trim($data['month']);
        $y= trim($data['year']);
        $d1 = '0'.$date.$month.$year;
        $d2 = $date.'0'.$month.$year;
        $d3 = '0'.$date.'0'.$month.$year;
        //echo $date.$month;die;
        // OR REPLACE(trim(`birthday`),'/','') =  '".( ($date < 10 && $month <10) ? $d3  : $date.$month.$year)."'
        $sql = "SELECT * FROM `resultikmc2016` WHERE (LOWER(REPLACE(trim(`name`),' ','')) = LOWER(REPLACE(trim('$name'),' ',''))  AND (REPLACE(trim(`birthday`),'/','') =  '".$date.$month.$year."' OR REPLACE(trim(`birthday`),'/','') =  '".($date < 10 ? $d1 : $date.$month.$year)."'  OR REPLACE(trim(`birthday`),'/','') =  '".( $month <10 ? $d2  : $date.$month.$year)."' OR REPLACE(trim(`birthday`),'/','') =  '".( ($date < 10 && $month <10) ? $d3  : $date.$month.$year)."' OR REPLACE(trim(`birthday`),'/','') =  '".$d.$m.$y."' OR REPLACE(trim(`birthday`),'/','') =  '".($date < 10 ? str_replace("0","", $date) : $date).( $month <10 ? str_replace("0","", $month) : $month).$year."'  OR REPLACE(trim(`birthday`),'/','') =  '".($date < 10 ? str_replace("0","", $date) : $date).$month.$year."'  OR REPLACE(trim(`birthday`),'/','') =  '".$date.( $month <10 ? str_replace("0","", $month) : $month).$year."'  )) OR (`name` LIKE '%".strtolower( trim($data['name']))."%' AND (`birthday` =  '".$date."/".$month."/".$year."' OR `birthday` =  '".($date < 10 ? str_replace("0","", $date) : $date)."/".( $month <10 ? str_replace("0","", $month) : $month)."/".$year."'  OR `birthday` =  '".($date < 10 ? str_replace("0","", $date) : $date)."/".$month."/".$year."'  OR `birthday` =  '".$date."/".( $month <10 ? str_replace("0","", $month) : $month)."/".$year."') )";
        // $sql = "SELECT * FROM `resultikmc2016` WHERE trim(LOWER(`name`)) = LOWER(trim('$name')) AND (REPLACE(trim(`birthday`),'/','') =  '".$date.$month.$year."' OR REPLACE(trim(`birthday`),'/','') =  '".($date <10 ? str_replace("0","", $date) : $date).( $month <10 ? str_replace("0","", $month) : $month).$year."')";
        return $this->db->query($sql)->result_array();
    }
} 
?>