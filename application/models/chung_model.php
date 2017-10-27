<?php
class Chung_model extends CI_Model {
     function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();  
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    
    function get_history(){
        $sql = "SELECT * FROM `competition_month_history` a INNER JOIN `user_registration` b ON b.`id` = a.`iduser`";
        return $this->db->query($sql)->result();
    }
    function update_time_begin($iduser){
        $sql = "UPDATE `competition_month_history` SET  `time_begin` = '2016-10-30 20:00:00' WHERE `iduser` = {$iduser}";
        return $this->db->query($sql);
    }
    
} 
?>