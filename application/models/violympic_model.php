<?php
class Violympic_model extends CI_Model {
     function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();  
        // $this->load->helper(array('form', 'url'));
    }
    function get_all_courses() {
        $sql = "SELECT DISTINCT a.* FROM course1 a ORDER BY name ASC";
        $query = $this->db->query($sql); 
        return $query->result_array();
    }
     function get_all_grade(){
        $sql = "SELECT DISTINCT a.* FROM code_question a ORDER BY title ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_all_lectures() {
        $sql = "SELECT DISTINCT a.* 
                FROM topic a
                ORDER BY name ASC";
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
    function get_all_topic() {
        $sql = "SELECT DISTINCT a.* 
                FROM topic a
                ORDER BY name ASC";
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
    function count_question_topic($id_topic) {
        $sql = "SELECT count(id) as num_question FROM `questions_optional` WHERE `id_topic` in($id_topic)";
        $query = $this->db->query($sql);
        
        return $query->first_row('array');
    }
    //13/10/16 : ham lay cau hoi moi tương ung voi bang dl moi
    public function getListQuestion($question_test,$grade,$lang,$iduser)
    {   
       // $grade = 1;
        $sql = "";
        $id_show="0";
        $check = false;
       // $grade = $grade=='4' ? '2':($grade ==5 ? "3" : ($grade ==6 ? "4" : $grade));
        $list_id_quetion_right_ans =array();
        //list câu hỏi đã làm đúng. => sd để hạn chế không hiện lại câu đã làm đúng
        //$list_id_quetion_right_ans = $this->db->query("SELECT `list_id_question` FROM `accumulated_points` WHERE `iduser` = {$iduser}")->first_row('array');

        $id_show .= (count($list_id_quetion_right_ans) > 0 && (trim($list_id_quetion_right_ans['list_id_question']) !="" || trim($list_id_quetion_right_ans['list_id_question'] != NUll))) ? ",".$list_id_quetion_right_ans['list_id_question']:'';
        $arr_list_question = array();
        $index = 0;
        for($i = 1; $i < count($question_test); $i++)
        {   
            $topic_id = $question_test[$i]['topic_id'];
            $question_level0_num = (int)$question_test[$i]['level0_num'];
            $question_level1_num = (int)$question_test[$i]['level1_num'];
            $question_level2_num = (int)$question_test[$i]['level2_num'];
            $tableName = "questions_optional";
            $arr_temp = array();
             $sql =($question_level0_num > 0 ? " (SELECT  *, '$topic_id' as topic FROM ".$tableName." WHERE (id_topic = '$topic_id' OR id_topic like '".$topic_id.",%' OR id_topic like '%,".$topic_id."' OR id_topic like '%,".$topic_id.",%') AND level ='".$grade."' AND lang = '".$lang."'AND part = 'A' AND id not in ($id_show) ORDER BY RAND( ) LIMIT ".$question_level0_num." ) " : "");   
             //var_dump($sql)   ;
            $arr_temp = $sql != "" ? $this->db->query($sql)->result_array() : array();
            if(count($arr_temp) > 0){
                foreach ($arr_temp as $key => $value) {
                    $arr_list_question[$index] = $arr_temp[$key];
                    $index++;
                }
                //$arr_list_question = array_merge($arr_list_question,$arr_temp);
                //lấy id câu đã lấy trước
                foreach ($arr_temp as $value) {
                    $id_show .= $id_show == "" ?  $value['id'] : ','.$value['id'];
                } //end láy id
            }    
            $arr_temp = array();
            $sql = "";
            //thêm trung bình
            $sql = ($question_level1_num > 0 ?"(SELECT  *,'$topic_id' as topic FROM ".$tableName." WHERE (id_topic = '$topic_id' OR id_topic like '".$topic_id.",%' OR id_topic like '%,".$topic_id."' OR id_topic like '%,".$topic_id.",%')  AND level ='".$grade."' AND lang = '".$lang."' AND part = 'B' AND id not in ($id_show) ORDER BY RAND() LIMIT ".$question_level1_num." )":"");
            
            $arr_temp = $sql != "" ? $this->db->query($sql)->result_array() : array();
            
            if(count($arr_temp) > 0){
                foreach ($arr_temp as $key => $value) {
                    $arr_list_question[$index] = $arr_temp[$key];
                    $index++;
                }
                //$arr_list_question = array_merge($arr_list_question,$arr_temp);
                 //lấy id câu đã lấy trước
                foreach ($arr_temp as $value) {
                    $id_show .= $id_show == "" ?  $value['id'] : ','.$value['id'];
                } //end láy id
            } 
            $arr_temp = array();
            $sql = "";
            //end
            $sql = ($question_level2_num > 0 ?"(SELECT  *,'$topic_id' as topic FROM ".$tableName." WHERE (id_topic = '$topic_id' OR id_topic like '".$topic_id.",%' OR id_topic like '%,".$topic_id."' OR id_topic like '%,".$topic_id.",%')  AND level ='".$grade."' AND lang = '".$lang."' AND part = 'C' AND id not in ($id_show) ORDER BY RAND( ) LIMIT ".$question_level2_num." )":"");
            
            $arr_temp = $sql != "" ? $this->db->query($sql)->result_array() : array();
            
            if(count($arr_temp) > 0){
                foreach ($arr_temp as $key => $value) {
                    $arr_list_question[$index] = $arr_temp[$key];
                    $index++;
                }
                //$arr_list_question = array_merge($arr_list_question,$arr_temp);
                 //lấy id câu đã lấy trước
                foreach ($arr_temp as $value) {
                    $id_show .= $id_show == "" ?  $value['id'] : ','.$value['id'];
                } //end láy id
            } 
            $arr_temp = array();
            $sql = "";
        }
      
        return $arr_list_question; 
    }
    //end
    public function get_record_user_topic($user_id,$topic_id)
    {   
       
        $sql = "SELECT * FROM record_user_topic WHERE `user_id` = $user_id AND   `topic_id` = $topic_id";
        
        return $this->db->query($sql)->first_row("array");
    }
    public function insert_record_user_topic($user_id,$topic_id,$lang)
    {   
       
        $sql = "INSERT INTO record_user_topic(`user_id`, `topic_id`, `result`, `result_en`, `total_scores`) (SELECT * FROM (SELECT $user_id as user_id, $topic_id as topic_id, '' as result,'' as result_en, 0 as total_scores) as temp WHERE  NOT EXISTS (SELECT * FROM record_user_topic WHERE `user_id` = $user_id AND `topic_id` = $topic_id))";
        //var_dump($sql);
        return $this->db->query($sql); 
    }
    public function update_record_user_topic($record,$lang)
    {   
        $user_id = $record['user_id'];
        $topic_id = $record['topic_id'];
        $result = $lang == "vi" ? $record['result'] : $record['result_en'];

        $total_scores = $record['total_scores'];
        $sql = "UPDATE record_user_topic SET ".($lang == 'vi' ? "`result`" : "`result_en`")." = '$result', `total_scores` = $total_scores WHERE `user_id` = $user_id AND   `topic_id` = $topic_id";
        //var_dump($sql);
        return $this->db->query($sql); 
    }
    //luu diem cua bai thi tu chon vao diem tich luy chung
    function get_accumulated_points($id_user){//lay diem tich luy chung user
        $id_user= (int)(string)$id_user;
        $sql = "SELECT `id`, `iduser`, `total_score_vi`, `total_score_en`, `list_id_question` FROM `accumulated_points` WHERE `iduser` = $id_user";
         return $this->db->query($sql)->first_row("array");
    }
    function insert_accumulated_points($id_user,$str_score,$lang)
    {
        $score_vi = $lang == "vi" ? $str_score["score"]:0;
        $score_en = $lang == "en" ?  $str_score["score"]:0;
        
        $list_right_ans = $str_score['list_right_ans'];
        $sql = "INSERT INTO `accumulated_points`(`id`, `iduser`, `total_score_vi`, `total_score_en`, `list_id_question`, `num_challenges_day`, `level_challenge`, `num_optional_day`, `num_testyear_day`) (SELECT * FROM (SELECT '' as id,{$id_user} as `iduser` ,{$score_vi} as `total_score_vi`,{$score_en} as `total_score_en`,'{$list_right_ans}' as `list_id_question`,0 as `num_challenges_day`,1 as `level_challenge`,0 as `num_optional_day`,0 as `num_testyear_day`) as new_data WHERE NOT EXISTS (SELECT * FROM accumulated_points WHERE `iduser` = {$id_user} ))";
        
        return $this->db->query($sql); 
       // var_dump($sql);die;
        
    }
    function update_accumulated_points($id,$str_score,$lang){
        $score=$str_score["score"];
        $field_score = ($lang == "vi" ? "`total_score_vi`" : "`total_score_en`");
        $list_right_ans = trim($str_score['list_right_ans']);
        $sql = "UPDATE `accumulated_points` SET {$field_score} = {$score},`list_id_question`= CONCAT(`list_id_question`,if(TRIM(`list_id_question`) != '',if('{$list_right_ans}' !='',',',''),'' ),'{$list_right_ans}') WHERE `id` = {$id}";
        $this->db->query($sql); 
        //var_dump($sql);die;
    }
    //end luu diem tich luy chung
    //view cau hoi admin 15/02
    function search_form_to($from, $to){
        $this->db->select();
        $this->db->from('questions_optional');
        $this->db->where('id BETWEEN "'. $from. '" and "'. $to.'"');
        $query = $this->db->get();
        $this->db->order_by("id");
        return $query->result_array();
    }
} 
?>