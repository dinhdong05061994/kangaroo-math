<?php
class Export_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();  
    }
    function jump($level){
        $sql = "SELECT b.`fullname` , b.`phone` , b.`email` , a.`score` , a.`time_end`,a.`time_begin`,REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE(`strjson` ,  '[',  '' ) ,  ']',  '' ) ,  '{',  '' ) ,  '}',  '' ) ,  '".
        '"id_question":"'."',  '' ) ,  '".'","result":'."',  '|' ) AS jump
            FROM  `competition_month_history` a
            INNER JOIN  `user_registration` b ON a.iduser = b.id
            WHERE b.level = '$level'";
        $query = $this->db->query($sql);        
        $data=$query->result_array();
        return $data;
    }
    function test_jump_new($level){
        $sql = "SELECT b.`fullname` , b.`phone` , b.`email` , a.`score` , a.`time_end`,a.`time_begin`,a.`jump_length`,REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE(`strjson` ,  '[',  '' ) ,  ']',  '' ) ,  '{',  '' ) ,  '}',  '' ) ,  '".
        '"id_question":"'."',  '' ) ,  '".'","result":'."',  '|' ) AS jump
            FROM  `competition_month_history` a
            INNER JOIN  `user_registration` b ON a.iduser = b.id
            WHERE b.level = '$level'";
        $query = $this->db->query($sql);        
        $data=$query->result_array();
        return $data;
    }
    
    function jumptop20($level){
        $sql = "SELECT a.`score` , a.`time_end`,a.`time_begin`, b.`fullname` , b.`nickname` , b.`school` , b.`birthday` , b.`level` , b.`email` , b.`phone` ,REPLACE( REPLACE( REPLACE( REPLACE( REPLACE( REPLACE(`strjson` ,  '[',  '' ) ,  ']',  '' ) ,  '{',  '' ) ,  '}',  '' ) ,  '".
        '"id_question":"'."',  '' ) ,  '".'","result":'."',  '|' ) AS jump
            FROM  `competition_month_history` a
            INNER JOIN  `user_registration` b ON a.iduser = b.id
            WHERE b.level ='$level'
            ORDER BY  `score` DESC ,  `time_end`,a.`time_begin`ASC
            limit 40";

        $query = $this->db->query($sql);        
        $data=$query->result_array();
        return $data;
    }

    function del_user_history($id){
        $sql = "DELETE FROM `competition_month_history` WHERE `iduser` = {$id}";
        $query = $this->db->query($sql);        
        
    }
    function view_user_history(){
        $sql = "SELECT * FROM `competition_month_history`";
        $query = $this->db->query($sql);        
        $data=$query->result_array();
        return $data; 
    }
    function view_theard($level,$lang){
        $sql = "SELECT * FROM `competition_month_threads` WHERE `level` = {$level} AND lang = '{$lang}'";
        $query = $this->db->query($sql);        
        $data=$query->result_array();
        return $data; 
    }
    function view_all_theard(){
        $sql = "SELECT * FROM `competition_month_threads`";
        $query = $this->db->query($sql);        
        $data=$query->result_array();
        return $data; 
    }
    function update_level_competion_time(){
        $sql = "UPDATE `competition_month_time` SET `level_user`=4 WHERE `id`= 4";
        $query = $this->db->query($sql); 
    }
    function add_level_competition_time(){
        $sql = "INSERT INTO `kangaroo9m_nmh`.`competition_month_time` (`id`, `level_user`, `begin_time`, `duration`, `active_that_moment`) VALUES (NULL, '17', '2016-11-02 00:00:00', '4500', '0');";
        $query = $this->db->query($sql);
    }
    function insert_thread($level,$lang){
        $sql="INSERT INTO `competition_month_threads`(`id`, `lang`, `level`, `properties`, `threads`) VALUES ('','{$lang}','{$level}','','')";
        $query = $this->db->query($sql);
    }
    function delete_thread(){
         $sql="DELETE FROM `competition_month_threads`";
        $query = $this->db->query($sql);
        
    }
}
?>
    