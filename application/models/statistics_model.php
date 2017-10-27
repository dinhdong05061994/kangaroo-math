<?php
class Statistics_model extends CI_Model {
     function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();  
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    function get_total_lecture($course_id){
        $this->db->select();
        $this->db->from('lecture');
        $this->db->where('course_id',$course_id);
        $query = $this->db->count_all_results();
        return $query;
    }
    function get_total_para_lecture($lecture_id){
        $this->db->select();
        $this->db->from('para_lecture');
        $this->db->where('id_lecture',$lecture_id);
        $query = $this->db->count_all_results();
        return $query;
    }
    function get_total_question_week(){
        $this->db->select();
        $this->db->from('question_test2');
        $query = $this->db->count_all_results();
        return $query;
    }
    function get_total_question_optional(){
        $this->db->select();
        $this->db->from('questions_optional');
        $query = $this->db->count_all_results();
        return $query;
    }
    function get_total_question_optional_by_level($level,$lang){
        $this->db->select();
        $this->db->where('lang',$lang);
        $this->db->where('level',$level);
        $this->db->from('questions_optional');
        $query = $this->db->count_all_results();
        return $query;
    }
    function get_total_question_optional_by_topic($level,$lang,$id_topic){
        $this->db->select();
        $this->db->where('lang',$lang);
        $this->db->where('level',$level);
        $this->db->where('id_topic',$id_topic);
        $this->db->from('questions_optional');
        $query = $this->db->count_all_results();
        return $query;
    }
    function get_total_question_year(){
        $this->db->select();
        $this->db->from('question_test');
        $query = $this->db->count_all_results();
        return $query;
    }
    function get_total_question_monthly($level){
        $this->db->select();
        $this->db->from('competition_month');
        $this->db->where('level',$level);
        $query = $this->db->count_all_results();
        return $query;
    }
}