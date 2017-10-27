<?php
class Violympic extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model(array('violympic_model','ikmc_model', 'accumulated_model'));    
    }
   
    function config_test($grade = 0) {
        $user = $this->session->all_userdata();
        if(!isset($user['id'] ) || $user['id'] == null ) redirect(base_url()."summer/ikmc_detail_user");
       //$add_data['lang'] = "vi";
        $this->load->model('statistics_model');
        $add_data['lang'] = (isset($user['lang']) ? $user['lang'] : "vi");
        $add_data['arg'] = $this->ikmc_model->load_system_argument();
        $add_data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $add_data['list_donors'] = $this->ikmc_model->load_list_donors();
        $add_data['list_notice'] = $this->ikmc_model->load_list_notice();    
        $add_data['list_grade'] = $this->violympic_model->get_all_grade();
        //if($grade == 0) $grade = $add_data['list_grade'][0]['id'];
        if($grade == 0) $grade = $user['level'];
        $add_data['grade_select'] = $grade;       
        $add_data['list_topic'] = $this->violympic_model->get_all_topic();//list topic
        foreach ($add_data['list_grade'] as $grade) {
            $add_data['total_question'][$grade['id']] = $this->statistics_model->get_total_question_optional_by_level($grade['id'],$add_data['lang']);
            // if($grade['id'] == $add_data['grade_select']){
            //     foreach ( $add_data['list_topic'] as $topic) {
            //         $add_data['total_question_topic'][$grade['id']][$topic['id']] = $this->statistics_model->get_total_question_optional_by_topic($grade['id'],$add_data['lang'],$topic['id']);
            //     }
            // }
        }

        $this->load->view('frontend/violympic/test_config', $add_data);
    }
	
    public function test()
    {
        $user = $this->session->all_userdata();
        //$user['user'] = 1;

        if($user['id'] == null || !isset($user['id']))
        { 
            redirect(base_url()."summer/ikmc_detail_user");

        }
        else{
            if( $user['id'] != 3446){
                $num_optional_day = $this->accumulated_model->get_num_accumulated($user['id'], "num_optional_day");
                if ($num_optional_day >= 70) {
                    redirect('notification/limit_violympic');
                }
            }
            
             $this->load->helper('url');
            $question_num = $_POST['question_num'];//số topic
            $num = 0; 
            $num_quetions_require = 0;
            $dataPost['question_test'][$num] = 0 ;

            $data['lang'] = isset($user['lang']) ? $user['lang'] :((isset($_POST['lang']) && $_POST['lang'] != "")? $_POST['lang']: "vi");
            for($i = 1; $i <= $question_num; $i++)
            {   
                if (isset($_POST['checkbox_'.$i])){
                    $num++;
                    $dataPost['question_test'][$num]['topic_id'] = $_POST['checkbox_'.$i]; 
                    $dataPost['question_test'][$num]['level0_num'] = $_POST['level0_num_'.$i];
                    $dataPost['question_test'][$num]['level1_num'] = $_POST['level1_num_'.$i];
                    $dataPost['question_test'][$num]['level2_num'] = $_POST['level2_num_'.$i];
                    $num_quetions_require += $_POST['level0_num_'.$i] + $_POST['level1_num_'.$i] + $_POST['level2_num_'.$i];
                    $data['question_point'][$_POST['checkbox_'.$i]][0] = $_POST['basic_grade_'.$i];
                    $data['question_point'][$_POST['checkbox_'.$i]][1] = $_POST['intermediate_grade_'.$i];
                }
                
            }
            $data['arrayQuestion'] = $this->violympic_model->getListQuestion($dataPost['question_test'], $_POST['course_select'],$data['lang'],$user['id']);//$_POST['course_select']: là chọn lớp(cấp độ)
            $num_quetions_real = count($data['arrayQuestion']);
            // echo $num_quetions_require;die;
            if($num_quetions_real < (int)$num_quetions_require && $num_quetions_real > 0){
               $data['message_num_quetions']= ($data['lang']  == "vi" ? 'Xin lỗi bạn, cơ sở dữ liệu câu hỏi không đủ '.$num_quetions_require.' câu hỏi bạn yêu cầu!<br> Vui lòng làm bài thi với '.$num_quetions_real.' câu hỏi nhé. Xin cảm ơn. ' : "Sorry, the database questions is not enough ".$num_quetions_require." questions you require !<br> Please do tests with ".$num_quetions_real." questions.");
            }
          
            $data['arrayQuestion'] = $this->replace_p($data['arrayQuestion']);
            $data['time_test'] = $_POST['time_test'];//mặc định
            $time=0;
            foreach ($data['arrayQuestion'] as $question) {
                $time += (int)$question['time_test'];
            }
            $data['time_test'] = $time !=0 ? $time: $data['time_test'];
            $data['course_id'] = $_POST['course_select'];// lớp(cấp độ)
            $this->load->view("frontend/violympic/list_question", $data);
        }
       
    }
    function replace_p($list_code_question){
        
        for($i = 0; $i < count($list_code_question); $i++ ){
            
            $list_code_question[$i]['right_ans'] = $this->convertP($list_code_question[$i]['right_ans']);
            $list_code_question[$i]['wrong_ans_3'] = $this->convertP($list_code_question[$i]['wrong_ans_3']);
            $list_code_question[$i]['wrong_ans_2'] = $this->convertP($list_code_question[$i]['wrong_ans_2']);
            $list_code_question[$i]['wrong_ans_1'] = $this->convertP($list_code_question[$i]['wrong_ans_1']);
            $list_code_question[$i]['wrong_ans_4'] = $this->convertP($list_code_question[$i]['wrong_ans_4']);
        }
        return $list_code_question;
    
    }
    
    function convertP($s){
        // $s = str_replace("<p>", "", $s);    
        // $s = str_replace("</p>", "", $s); 
         $s = strip_tags ($s,'<img>');
        return $s;
    }

    function insert_record_test()
    {
        $user = $this->session->all_userdata();
        if(!isset($user['id']) || $user['id'] == null)
        { 
            echo "<script> alert('Không thể lưu dữ liệu. Kiểm tra việc đăng nhập làm bài thi của bạn. Xin cảm ơn!');</script>";

        }else{
            $this->accumulated_model->update_num_accumulated($user['id'], "num_optional_day");
            $lang ="";
            $result = "";
            $total_scores = 0;
            
            $list_right_ans ="";
            $lang = $_POST['lang'];
            $result = $_POST['result'];
            $list_right_ans = substr(trim($_POST['list_right_ans']),-1) == "," ? substr(trim($_POST['list_right_ans']),0,strlen($_POST['list_right_ans'])-1): trim($_POST['list_right_ans']);
          

            $arr_result = explode(";", $result);
            //chay lan luot voi tung topic
            for ($i=0; $i < count($arr_result) - 1; $i++){ 
                $one_topic = explode(",", $arr_result[$i]);
                $this->violympic_model->insert_record_user_topic($user['id'], $one_topic[0],$lang);
                $record = $this->violympic_model->get_record_user_topic($user['id'], $one_topic[0]);
                $record['total_scores'] += $one_topic[5]; //cong thanh tich
                $total_scores += $one_topic[5];
                
                
                if($lang == "vi"){
                    if( strpos($record['result'], date("Y-m-d")) !== false){ //neu da co bai thi trong ngay
                        $arr_result_db = explode(";", $record['result']);
                        $arr_today_record = explode(",", $arr_result_db[count($arr_result_db) - 2]);
                        $arr_today_record[1] += $one_topic[9]; //cong diem cua hoc sinh trong ngay phan cau de
                        $arr_today_record[2] += $one_topic[10]; //cong tong diem co the trong ngay  phan cau de (diem toi da)
                        $arr_today_record[3] += $one_topic[11]; //cong diem cua hoc sinh trong ngay  phan cau trung binh
                        $arr_today_record[4] += $one_topic[12]; //cong tong diem co the trong ngay  phan cau trung binh
                        $arr_today_record[5] += $one_topic[13]; //cong diem cua hoc sinh trong ngay  phan cau khó
                        $arr_today_record[6] += $one_topic[14]; //cong tong diem co the trong ngay  phan cau khó

                        $record['result'] = "";
                        for ($j=0; $j < count($arr_result_db) - 2; $j++) { 
                            $record['result'] .= $arr_result_db[$j].";";
                        }
                        $record['result'] .= $arr_today_record[0].",".$arr_today_record[1].",".$arr_today_record[2].",".$arr_today_record[3].",".$arr_today_record[4].",".$arr_today_record[5].",".$arr_today_record[6] .";"; 
                    } 
                    else{
                        $record['result'] .= date("Y-m-d").",".$one_topic[9].",".$one_topic[10].",".$one_topic[11].",".$one_topic[12].",".$one_topic[13].",".$one_topic[14].";"; 
                    }
                }else if($lang == "en"){
                    if( strpos($record['result_en'], date("Y-m-d")) !== false){ //neu da co bai thi trong ngay
                        $arr_result_db = explode(";", $record['result_en']);
                        $arr_today_record = explode(",", $arr_result_db[count($arr_result_db) - 2]);
                        $arr_today_record[1] += $one_topic[9]; //cong diem cua hoc sinh trong ngay phan cau de
                        $arr_today_record[2] += $one_topic[10]; //cong tong diem co the trong ngay  phan cau de (diem toi da)
                        $arr_today_record[3] += $one_topic[11]; //cong diem cua hoc sinh trong ngay  phan cau trung binh
                        $arr_today_record[4] += $one_topic[12]; //cong tong diem co the trong ngay  phan cau trung binh
                        $arr_today_record[5] += $one_topic[13]; //cong diem cua hoc sinh trong ngay  phan cau khó
                        $arr_today_record[6] += $one_topic[14]; //cong tong diem co the trong ngay  phan cau khó
                        $record['result_en'] = "";
                        for ($j=0; $j < count($arr_result_db) - 2; $j++) { 
                            $record['result_en'] .= $arr_result_db[$j].";";
                        }
                        $record['result_en'] .= $arr_today_record[0].",".$arr_today_record[1].",".$arr_today_record[2].",".$arr_today_record[3].",".$arr_today_record[4].",".$arr_today_record[5].",".$arr_today_record[6] .";";
                    } 
                    else{
                        $record['result_en'] .= date("Y-m-d").",".$one_topic[9].",".$one_topic[10].",".$one_topic[11].",".$one_topic[12].",".$one_topic[13].",".$one_topic[14].";";
                    }
                }  
                
                // var_dump($record);die;
                $this->violympic_model->update_record_user_topic($record,$lang);
            }
            // $arr_scores = [
            //     'score'=> $total_scores,
            //     'list_right_ans' => $list_right_ans
            // ];
           $arr_scores = array('score'=> $total_scores,'list_right_ans' => $list_right_ans);
            //luu diem vao bang tich luy chung
            $arr_total_scores = $this->violympic_model->get_accumulated_points($user['id']);
            if(count($arr_total_scores) > 0){
                $arr['score'] = ($lang == "vi"? $arr_total_scores['total_score_vi'] : $arr_total_scores['total_score_en']);
                $arr_scores['score'] = (float)$arr['score'] + (float)$arr_scores['score'] ;
                $this->violympic_model->update_accumulated_points($arr_total_scores['id'],$arr_scores,$lang);            
            }else{
                $this->violympic_model->insert_accumulated_points($user['id'],$arr_scores,$lang);
            }
            //end luu diem tich luy chung
        }
    }
    
}
?>