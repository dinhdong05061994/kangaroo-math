<?php
class accumulated_model extends CI_Model {
     function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();  
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    
    // cap nhat tong diem tich luy
    function update_total_score($id_user, $language, $score_change){
        $field = "total_score_{$language}";
        $sql = "UPDATE `accumulated_points` SET `{$field}` = `$field` + {$score_change} WHERE  `iduser` = {$id_user}";
        return $this->db->query($sql);
    }
    //update gioi han lam bai
    function update_num_accumulated($id_user, $field){
        $sql = "UPDATE `accumulated_points` SET `{$field}` = `{$field}` + 1 WHERE  `iduser` = {$id_user}";
        return $this->db->query($sql);
    }
    //lay gia tri gioi han bai thi voi truong tuong ung
    function get_num_accumulated($iduser, $field){
        $sql = "SELECT `{$field}` as result FROM `accumulated_points` WHERE  `iduser` = {$iduser}";
       
        $result =  $this->db->query($sql)->first_row("array");
        $result_field = count($result) > 0 ? $result['result'] : "";
        return $result_field;
    }
    function count_accumulated($iduser){
        $sql = "SELECT count(1) as is_exit FROM `accumulated_points` WHERE  `iduser` = {$iduser}";
        $result =  $this->db->query($sql)->first_row("array");
        return $result;
    }
    // dat lai cac gia tri gioi han lam bai trong ngay
    function reset_values_status_day($id_user){
        $sql = "UPDATE `accumulated_points` SET `num_challenges_day` = 0, `num_optional_day` = 0, `num_testyear_day` = 0 WHERE  `iduser` = {$id_user}";
        return $this->db->query($sql);
    }
    function new_record($iduser){
        $sql = "INSERT INTO `accumulated_points`( `iduser`, `total_score_vi`, `total_score_en`, `list_id_question`, `num_challenges_day`, `level_challenge`, `num_optional_day`, `num_testyear_day`) (SELECT * from ( select {$iduser} as iduser, 0 as `total_score_vi` ,0 as `total_score_en`,'' as `list_id_question`,0 as `num_challenges_day`,1 as `level_challene`,0 as `num_optional_day`,0 as `num_testyear_day`) as temp WHERE NOT EXISTS (SELECT * FROM accumulated_points WHERE `iduser` = {$iduser}))";
        return $this->db->query($sql);
    }
  
} 
?>