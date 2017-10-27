<?php
class Competition_model extends CI_Model {
     function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();  
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    
    function checkuser($nickname, $password){
        $sha1 = sha1($password);
        $sql = "SELECT * FROM `user_registration` WHERE `nickname` = '$nickname' AND `password` = '$sha1'";
        return $this->db->query($sql)->first_row('array');
    }
    function getListQuestion($language, $level){
        $sql = "SELECT * FROM `competition_month` WHERE `lang` = '$language' AND `level` = '$level' ORDER BY  `part`, `question_order`";
        return $this->db->query($sql)->result_array();
    }

    function getListQuestionHistory($listidquestion){
        $sql = "SELECT * FROM `competition_month` WHERE `id` IN ($listidquestion) ORDER BY  `part`, `question_order`";
        return $this->db->query($sql)->result_array();
    }
    function getHistory($iduser){
        $sql = "SELECT *, MAX(`score`) FROM `competition_month_history` WHERE `iduser` = $iduser";
        return $this->db->query($sql)->first_row('array');
    }
    function insertHistory($iduser, $time_begin){
        $sql = "INSERT INTO `competition_month_history` VALUES (0, {$iduser}, 0, 0, '', '{$time_begin}', '') ON DUPLICATE KEY UPDATE `iduser` = {$iduser}";
        return $this->db->query($sql);
    }
    function updateHistory($iduser, $score, $jump_length, $strjson, $time_end){
        $sql = "UPDATE `competition_month_history` SET `score` = {$score}, `jump_length` = {$jump_length}, `strjson` = '{$strjson}', `time_end` = '{$time_end}' WHERE `iduser` = {$iduser}";
        return $this->db->query($sql);
    }
    function create_threads($views, $properties_question, $level, $lang){
        $sql = "UPDATE `competition_month_threads` SET `threads` = '{$views}', `properties` = '{$properties_question}' WHERE `level` = {$level} AND `lang`='{$lang}'";
        return $this->db->query($sql);
    }
    function get_threads($level, $language){
        $sql = "SELECT * FROM `competition_month_threads` WHERE `level` = {$level} AND `lang` = '{$language}'";
        $result = $this->db->query($sql)->first_row("array");
        return $result;
    }
    function get_ranks($level){
        //$sql = "SELECT a.`iduser`, b.`fullname`,p.`name`as province_name, a.`score` , TIMEDIFF(  `time_end` ,  `time_begin` ) AS  `sub_time`, @rownum := @rownum + 1 AS position FROM  `competition_month_history` a INNER JOIN  `user_registration` b ON a.`iduser` = b.`id` LEFT JOIN province  p ON b.`province_id` = p.`provinceid` JOIN (SELECT @rownum := 0) r WHERE b.`level` = {$level} AND TIMEDIFF(  `time_end` ,  `time_begin` ) > 0 ORDER BY a.`score` DESC ,  `sub_time`";
        $sql = "SELECT
    @rownum := @rownum + 1 AS position,
    T1.*
FROM
(
    SELECT
        a.`iduser`, b.`fullname`,p.`name`as province_name, a.`jump_length`, a.`score` , TIMEDIFF(  `time_end` ,  `time_begin` ) AS  `sub_time`
    FROM  `competition_month_history` a INNER JOIN  `user_registration` b ON a.`iduser` = b.`id` LEFT JOIN province  p ON b.`province_id` = p.`provinceid` WHERE b.`level` = {$level} AND TIMEDIFF(  `time_end` ,  `time_begin` ) > 0) AS T1, (SELECT @rownum := 0) AS r
ORDER BY `score` DESC ,  `sub_time`";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    function get_top_jump($level){
        //$sql = "SELECT a.`iduser`, b.`fullname`,p.`name`as province_name, a.`jump_length` , TIMEDIFF(  `time_end` ,  `time_begin` ) AS  `sub_time`, @rownum := @rownum + 1 AS position FROM  `competition_month_history` a INNER JOIN  `user_registration` b ON a.`iduser` = b.`id` LEFT JOIN province  p ON b.`province_id` = p.`provinceid` JOIN (SELECT @rownum := 0) r WHERE b.`level` = {$level} AND TIMEDIFF(  `time_end` ,  `time_begin` ) > 0 ORDER BY a.`jump_length` DESC ,  `sub_time`";
        $sql = "SELECT
    @rownum := @rownum + 1 AS position,
    T1.*
FROM
(
    SELECT
        a.`iduser`, b.`fullname`,p.`name`as province_name, a.`jump_length` , TIMEDIFF(  `time_end` ,  `time_begin` ) AS  `sub_time`
    FROM  `competition_month_history` a INNER JOIN  `user_registration` b ON a.`iduser` = b.`id` LEFT JOIN province  p ON b.`province_id` = p.`provinceid` WHERE b.`level` = {$level} AND TIMEDIFF(  `time_end` ,  `time_begin` ) > 0
) AS T1, (SELECT @rownum := 0) AS r
ORDER BY `jump_length` DESC ,  `sub_time`";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    function getAllCompetition_month_time(){
        $sql = "SELECT `id`, `level_user`, `begin_time`, `duration`, `active_that_moment` FROM `competition_month_time`";
        return $this->db->query($sql)->result();
    }
    function getCompetition_month_time($id){
        $sql = "SELECT `id`, `level_user`, `begin_time`, `duration`, `active_that_moment` FROM `competition_month_time` WHERE `id` = {$id}";
        return $this->db->query($sql)->row();
    }
    function updateCompetition_month_time($id,$data){
        $this->db->where('id', $id);
        $this->db->update('competition_month_time', $data);
        return $this->db->affected_rows();
    }
} 
?>
