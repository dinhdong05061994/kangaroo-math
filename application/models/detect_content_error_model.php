<?php
class Detect_content_error_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();  
    }
   /*
   function notAttachedFigureQuestionsOptional() { //Câu hỏi tự chọn
	$sql = "select id from questions_optional where (content like '%hình%' or content like '%Hình%') and content not like '%images%'";
   	$query = $this->db->query($sql);        
        $data=$query->result_array();
        return $data;
   }
   */
   function notAttachedFigureQuestionsTest() { //Câu hỏi thi năm
	$sql = "select id, year, lang from question_test where ((content like '%hình%' or content like '%Hình%') and (content not like '%images' and img is null))";
   	$query = $this->db->query($sql);        
        $data=$query->result_array();
        return $data;
   }

   function notAttachedFigureQuestionsTest2() { //Câu hỏi thi tuần
	$sql = "select id, year, lang from question_test2 where ((content like '%hình%' or content like '%Hình%') and (content not like '%images' and img is null))";
   	$query = $this->db->query($sql);        
        $data=$query->result_array();
        return $data;
   }

   function notAttachedFigureCompetitionMonth() { //Câu hỏi thi tháng
	$sql = "select id from competition_month where (content like '%hình%' or content like '%Hình%') and content not like '%images%'";
   	$query = $this->db->query($sql);        
        $data=$query->result_array();
        return $data;
   }

   /*
   function emptySelectionProblemQuestionOptional() { //Đáp án bị rỗng Câu hỏi tự chọn
	$sql = "select id from questions_optional where (right_ans is null or wrong_ans_1 is null or wrong_ans_2 is null or wrong_ans_3 is null or wrong_ans_4 is null)";
   	$query = $this->db->query($sql);        
        $data=$query->result_array();
        return $data;
   }
   */

   function emptySelectionProblemQuestionsTest() { //Đáp án bị rỗng Câu hỏi thi năm
	$sql = "select id, year, lang from question_test where ((right_ans is null and ra_img is null) or (wrong_ans_1 is null and wa_img_1 is null) or (wrong_ans_2 is null and wa_img_2 is null) or (wrong_ans_3 is null and wa_img_3 is null) or (wrong_ans_4 is null and wa_img_4 is null))";
   	$query = $this->db->query($sql);        
        $data=$query->result_array();
        return $data;
   }

   function emptySelectionProblemQuestionsTest2() { //Đáp án bị rỗng Câu hỏi thi tuần
	$sql = "select id, year, lang from question_test2 where ((right_ans is null and ra_img is null) or (wrong_ans_1 is null and wa_img_1 is null) or (wrong_ans_2 is null and wa_img_2 is null) or (wrong_ans_3 is null and wa_img_3 is null) or (wrong_ans_4 is null and wa_img_4 is null))";
   	$query = $this->db->query($sql);        
        $data=$query->result_array();
        return $data;
   }

   function emptySelectionProblemCompetitionMonth() { //Đáp án có vấn đề Câu hỏi thi tháng
	$sql = "select id from competition_month where (right_ans is null or wrong_ans_1 is null or wrong_ans_2 is null or wrong_ans_3 is null or wrong_ans_4 is null)";
   	$query = $this->db->query($sql);        
        $data=$query->result_array();
        return $data;
   }

   /*
   function similarSelectionProblemQuestionOptional() { //Đáp án giống nhau Câu hỏi tự chọn
	$sql = "select id from questions_optional where ((strcmp(trim(right_ans), trim(wrong_ans_1)) = 0) or (strcmp(trim(right_ans), trim(wrong_ans_2)) = 0) or (strcmp(trim(right_ans), trim(wrong_ans_3)) = 0) or (strcmp(trim(right_ans), trim(wrong_ans_4)) = 0) or (strcmp(trim(wrong_ans_1), trim(wrong_ans_2)) = 0) or (strcmp(trim(wrong_ans_1), trim(wrong_ans_3)) = 0) or (strcmp(trim(wrong_ans_1), trim(wrong_ans_4)) = 0) or (strcmp(trim(wrong_ans_2), trim(wrong_ans_3)) = 0) or (strcmp(trim(wrong_ans_2), trim(wrong_ans_4)) = 0) or (strcmp(trim(wrong_ans_3), trim(wrong_ans_4)) = 0))";
   	$query = $this->db->query($sql);        
        $data=$query->result_array();
        return $data;
   }
   */	
   function similarSelectionProblemQuestionsTest() { //Đáp án giống nhau Câu hỏi thi năm
	$sql = "select id, year, lang from question_test where ((strcmp(trim(right_ans), trim(wrong_ans_1)) = 0 and right_ans is not null) or (strcmp(trim(right_ans), trim(wrong_ans_2)) = 0 and right_ans is not null) or (strcmp(trim(right_ans), trim(wrong_ans_3)) = 0 and right_ans is not null) or (strcmp(trim(right_ans), trim(wrong_ans_4)) = 0 and right_ans is not null) or (strcmp(trim(wrong_ans_1), trim(wrong_ans_2)) = 0 and wrong_ans_1 is not null) or (strcmp(trim(wrong_ans_1), trim(wrong_ans_3)) = 0 and wrong_ans_1 is not null) or (strcmp(trim(wrong_ans_1), trim(wrong_ans_4)) = 0 and wrong_ans_1 is not null) or (strcmp(trim(wrong_ans_2), trim(wrong_ans_3)) = 0 and wrong_ans_2 is not null) or (strcmp(trim(wrong_ans_2), trim(wrong_ans_4)) = 0 and wrong_ans_2 is not null) or (strcmp(trim(wrong_ans_3), trim(wrong_ans_4)) = 0 and wrong_ans_3 is not null) or (strcmp(trim(ra_img), trim(wa_img_1)) = 0 and ra_img is not null) or (strcmp(trim(ra_img), trim(wa_img_2)) = 0 and ra_img is not null) or (strcmp(trim(ra_img), trim(wa_img_3)) = 0 and ra_img is not null) or (strcmp(trim(ra_img), trim(wa_img_4)) = 0 and ra_img is not null) or (strcmp(trim(wa_img_1), trim(wa_img_2)) = 0 and wa_img_1 is not null) or (strcmp(trim(wa_img_1), trim(wa_img_3)) = 0 and wa_img_1  is not null) or (strcmp(trim(wa_img_1), trim(wa_img_4)) = 0 and wa_img_1 is not null) or (strcmp(trim(wa_img_2), trim(wa_img_3)) = 0 and wa_img_2 is not null) or (strcmp(trim(wa_img_2), trim(wa_img_4)) = 0 and wa_img_2 is not null) or (strcmp(trim(wa_img_3), trim(wa_img_4)) = 0 and wa_img_3 is not null))";
   	$query = $this->db->query($sql);        
        $data=$query->result_array();
        return $data;
   }

   function similarSelectionProblemQuestionsTest2() { //Đáp án giống nhau Câu hỏi thi tuần
	$sql = "select id, year, lang from question_test2 where ((strcmp(trim(right_ans), trim(wrong_ans_1)) = 0 and right_ans is not null) or (strcmp(trim(right_ans), trim(wrong_ans_2)) = 0 and right_ans is not null) or (strcmp(trim(right_ans), trim(wrong_ans_3)) = 0 and right_ans is not null) or (strcmp(trim(right_ans), trim(wrong_ans_4)) = 0 and right_ans is not null) or (strcmp(trim(wrong_ans_1), trim(wrong_ans_2)) = 0 and wrong_ans_1 is not null) or (strcmp(trim(wrong_ans_1), trim(wrong_ans_3)) = 0 and wrong_ans_1 is not null) or (strcmp(trim(wrong_ans_1), trim(wrong_ans_4)) = 0 and wrong_ans_1 is not null) or (strcmp(trim(wrong_ans_2), trim(wrong_ans_3)) = 0 and wrong_ans_2 is not null) or (strcmp(trim(wrong_ans_2), trim(wrong_ans_4)) = 0 and wrong_ans_2 is not null) or (strcmp(trim(wrong_ans_3), trim(wrong_ans_4)) = 0 and wrong_ans_3 is not null) or (strcmp(trim(ra_img), trim(wa_img_1)) = 0 and ra_img is not null) or (strcmp(trim(ra_img), trim(wa_img_2)) = 0 and ra_img is not null) or (strcmp(trim(ra_img), trim(wa_img_3)) = 0 and ra_img is not null) or (strcmp(trim(ra_img), trim(wa_img_4)) = 0 and ra_img is not null) or (strcmp(trim(wa_img_1), trim(wa_img_2)) = 0 and wa_img_1 is not null) or (strcmp(trim(wa_img_1), trim(wa_img_3)) = 0 and wa_img_1  is not null) or (strcmp(trim(wa_img_1), trim(wa_img_4)) = 0 and wa_img_1 is not null) or (strcmp(trim(wa_img_2), trim(wa_img_3)) = 0 and wa_img_2 is not null) or (strcmp(trim(wa_img_2), trim(wa_img_4)) = 0 and wa_img_2 is not null) or (strcmp(trim(wa_img_3), trim(wa_img_4)) = 0 and wa_img_3 is not null))";
   	$query = $this->db->query($sql);        
        $data=$query->result_array();
        return $data;
   }

   function similarSelectionProblemCompetitionMonth() { //Đáp án giống nhau Câu hỏi thi tháng
	$sql = "select id from competition_month where ((strcmp(trim(right_ans), trim(wrong_ans_1)) = 0) or (strcmp(trim(right_ans), trim(wrong_ans_2)) = 0) or (strcmp(trim(right_ans), trim(wrong_ans_3)) = 0) or (strcmp(trim(right_ans), trim(wrong_ans_4)) = 0) or (strcmp(trim(wrong_ans_1), trim(wrong_ans_2)) = 0) or (strcmp(trim(wrong_ans_1), trim(wrong_ans_3)) = 0) or (strcmp(trim(wrong_ans_1), trim(wrong_ans_4)) = 0) or (strcmp(trim(wrong_ans_2), trim(wrong_ans_3)) = 0) or (strcmp(trim(wrong_ans_2), trim(wrong_ans_4)) = 0) or (strcmp(trim(wrong_ans_3), trim(wrong_ans_4)) = 0))";
   	$query = $this->db->query($sql);        
        $data=$query->result_array();
        return $data;
   }


}
?>
