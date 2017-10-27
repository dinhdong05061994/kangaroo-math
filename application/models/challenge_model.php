<?php
class Challenge_model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();  
        // $this->load->helper(array('form', 'url'));
    }
    function get_list_level($level_user){
        $sql = "SELECT `level_challenge` FROM `level_challenge` WHERE `level_user` = {$level_user} ORDER BY `level_challenge`";
        return $this->db->query($sql)->result();
    }
    function get_num_challenge_day($iduser){
        $sql = "SELECT `num_challenges_day` FROM `accumulated_points` WHERE `iduser` = {$iduser}";
        $result = $this->db->query($sql)->first_row("array");
        return $result['num_challenges_day'];
    }
    function next_num_challenge_day($iduser){
        $sql = "UPDATE `accumulated_points` SET `num_challenges_day` = `num_challenges_day` + 1 WHERE `iduser` = {$iduser}";
        return $this->db->query($sql);
        
    }
    function get_user_level($iduser){
        $sql = "SELECT `level_challenge` FROM `accumulated_points` WHERE `iduser` = {$iduser}";
        $result = $this->db->query($sql)->first_row("array");
        return $result['level_challenge'];
    }
    function next_user_level($iduser, $level_challenge){
        $sql = "UPDATE `accumulated_points` SET `level_challenge` = `level_challenge` + 1 WHERE `iduser` = {$iduser} AND `level_challenge` = {$level_challenge}";
        return $this->db->query($sql);
        
    }
    function get_data_level($level_user, $level_challenge){
        $sql = "SELECT * FROM `level_challenge` WHERE `level_challenge` = {$level_challenge} AND `level_user` = {$level_user}";
        return $this->db->query($sql)->first_row();
    }
    function get_list_question_level($iduser, $level_user, $language, $num_easy, $num_medium, $num_hard){
        $str = "SELECT `list_id_question` FROM `accumulated_points` WHERE `iduser` = {$iduser}";
        $list_id_question = $this->db->query($str)->first_row()->list_id_question;
        $list_id_question = $list_id_question == "" ? "0" : $list_id_question;
        $sql = "(SELECT *, LEFT(`id_topic`, 1) as `topic` FROM `questions_optional` WHERE `level` = {$level_user} AND `lang` = '{$language}' AND `part` = 'A' AND `id` NOT IN ({$list_id_question})  ORDER BY RAND( ) LIMIT {$num_easy})
                UNION 
                (SELECT *, LEFT(`id_topic`, 1) as `topic` FROM `questions_optional` WHERE `level` = {$level_user} AND `lang` = '{$language}' AND `part` = 'B' AND `id` NOT IN ({$list_id_question}) ORDER BY RAND( ) LIMIT {$num_medium})
                UNION 
                (SELECT *, LEFT(`id_topic`, 1) as `topic` FROM `questions_optional` WHERE `level` = {$level_user} AND `lang` = '{$language}' AND `part` = 'C' AND `id` NOT IN ({$list_id_question}) ORDER BY RAND( ) LIMIT {$num_hard})
                ";
        return $this->db->query($sql)->result_array();
    }
} 
?>