<?php
class Adminmodel extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();  
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    function checklogin($email, $password){
    	$sha1 = sha1($password);
    	$sql = "SELECT * FROM `user_admin` WHERE `email` = '$email' AND `password` = '$sha1'";
    	return $this->db->query($sql)->first_row('array');
    }

     function get_all_topic() {
          $sql = "SELECT * FROM topic";
          return $this->db->query($sql)->result_array();
    }
    //them ngay 031016
    function get_more_topic($list_topic_id) {
          $sql = "SELECT * FROM `topic` WHERE `id` in ($list_topic_id)";
          return $this->db->query($sql)->result_array();
    }
    //end
    function get_all_code() {
          $sql = "SELECT * FROM code_question";
          return $this->db->query($sql)->result_array();
    }

    function get_code($id) {
          $sql = "SELECT * FROM code_question WHERE id='$id'";
          $query = $this->db->query($sql);
          foreach($query->result() as $row) {
               $title = $row->title;
          }
          return $title;
    }
    
    function add_test_question_complete($add_data) {        
        $table_name = "question_test";
        $this->db->insert($table_name, $add_data);
    }
    function changepass($email, $new_pass){
       // $sha1pass = sha1($new_pass);
        $sql = "UPDATE user_admin
                SET password = '$new_pass'
                WHERE email = '$email'";
        $this->db->query($sql);
    }
    function getinfopractice(){
          $sql = "SELECT id,fullname,nickname, email, `history_practice` FROM `user`";
          return $this->db->query($sql)->result_array();
    }
}
?>