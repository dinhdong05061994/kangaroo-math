<?php
class Move_question_model extends CI_Model {
     function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();  
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    function month(){
        $sql = "CALL move_competition_month";
                
        $query = $this->db->query($sql);
        
        return $this->db->affected_rows();
    }
    function year(){
        $sql = "CALL move_question_test";
                
        $query = $this->db->query($sql);
        
        return $this->db->affected_rows();
    }
    
    function week(){
        $sql = "CALL move_question_test2";
                
        $query = $this->db->query($sql);
        
        return $this->db->affected_rows();
    }
    
    
} 
?>