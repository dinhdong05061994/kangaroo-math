<?php
class home_model extends CI_Model {
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
                FROM system_argument";
        $query = $this->db->query($sql);
        
        return $query->first_row("array");
    }
    function load_img_slide() {
        $sql = "SELECT * 
                FROM img_slide WHERE status = 0";
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
    
    
    
    
} 
?>