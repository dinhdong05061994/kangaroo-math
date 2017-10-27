<?php
class practice_model extends CI_Model {
     function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();  
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    function get_list_question_by_id_code_year($year, $id_code, $language){
        $sql = "select * from question_test where id_code = $id_code  AND year = $year AND lang = '$language' ORDER BY part, question_order";
        return $this->db->query($sql)->result_array(); 
     }
    function get_list_year_by_code_language($id_code, $language) {
        $sql = "SELECT DISTINCT year FROM question_test WHERE id_code = $id_code AND lang = '$language'  ORDER BY year" ;
        return $this->db->query($sql)->result_array(); 
          
          
     }
    function get_list_question_week($week = 0, $id = 0,$lang=""){
        $sql = "select * from question_test2 where level = $week  AND id_topic = $id";
        if($lang !=""){
          $sql .=" AND lang = '{$lang}'";
        }
        return $this->db->query($sql)->result_array(); 
     }
     function get_list_week(){
      $sql = " SELECT distinct `level` FROM `question_test2` order by `level` ASC";
        return $this->db->query($sql)->result_array(); 
      }
     function get_list_week_of_a_course($id_course) {
       $sql = " SELECT distinct `level` FROM `question_test2` where `id_topic`=$id_course order by `level` ASC";
        return $this->db->query($sql)->result_array(); 
     }
     function load_list_code() {
        $sql = "SELECT * FROM code_question";
        return $this->db->query($sql)->result_array(); 
          
          
     }
     function load_list_class() {
        $sql = "SELECT * FROM course1";
        return $this->db->query($sql)->result_array(); 
          
          
     }
     function get_list_course() {
        $sql = "SELECT * FROM course1" ;
        return $this->db->query($sql)->result_array();    
          
     }
     function get_code($id_code) {
        $sql = "SELECT * FROM code_question WHERE id = $id_code";
        return $this->db->query($sql)->result_array(); 
          
          
     }
     function update_test_record_user($userid, $final_result) {
        $sql = "UPDATE user SET history_practice = CONCAT(history_practice,'$final_result') WHERE id = $userid";
        $this->db->query($sql);
          
          
     }
      function checklogin($nickname, $password){
        $sha1 = sha1($password);
        $sql = "SELECT * FROM `user` WHERE `email` = '$nickname' AND `password` = '$sha1'";
        return $this->db->query($sql)->first_row('array');
    }
    function checklogin1($nickname, $password){
        $sha1 = sha1($password);
        $sql = "SELECT * FROM `user_registration` WHERE `nickname`='$nickname' AND `password`='$sha1'";
        return $this->db->query($sql)->first_row('array');
    }
    function checklogin_latest($nickname, $password){
        $sha1 = sha1($password);
        $sql = "SELECT * FROM `list_registration` WHERE `email` = '$nickname' AND `password` = '$sha1'";
        return $this->db->query($sql)->first_row('array');
    }
    function checkNickname($nickname)//check for signup
    {
        $query=$this->db->get("user");
        foreach ($query->result() as $row)
        {
            if($row->nickname == $nickname)
            {
               return TRUE; 
            }
        }
        return FALSE;
    }
    
     function insertnewuser($data)
    {
        $this->db->insert("user", $data);
    }
    function getuser($id){
      
        $sql = "SELECT * FROM `user_registration` WHERE `id` = '$id'";
        return $this->db->query($sql)->first_row('array');
    }
    function updateuser($id, $user){      
      $this->db->where('id', $id);
      $this->db->update('user_registration', $user);
    }
    function get_notification(){
        return $this->db->query("SELECT * FROM  `notification` WHERE status = 1 ORDER BY  `create_date` DESC ")->result_array();
        
    }
    function get_news(){
        return $this->db->query("SELECT * FROM `news` WHERE `hide` = 1 order by DATE_FORMAT(`create_date`,'%d-%m-%Y') DESC, `status` ASC ")->result_array();
        
    }
     function get_one_news($id){
        return $this->db->query("SELECT * FROM `news` WHERE `id` = '$id' ")->first_row('array');
        
    }
} 
?>
