<?php
class Challenge extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model(array('violympic_model','ikmc_model', 'challenge_model'));    
    }
   
    function index() {
        $user = $this->session->all_userdata();
        if(!isset($user['id'] ) || $user['id'] == null ) redirect(base_url()."summer/ikmc_detail_user");
       //$add_data['lang'] = "vi";
        $add_data['lang'] = (isset($user['lang']) ? $user['lang'] : "vi");
        $add_data['arg'] = $this->ikmc_model->load_system_argument();
        $add_data['list_level'] = $this->challenge_model->get_list_level($user['level']);
        
        $add_data['user_level'] =   $this->challenge_model->get_user_level($user['id']);     
        
        $this->load->view('frontend/challenge/choose_level', $add_data);
    }
    public function level($level, $lang){
        $user = $this->session->all_userdata();
        if(!isset($user['id'] ) || $user['id'] == null ) redirect(base_url()."summer/ikmc_detail_user");
        if($user['id'] != 3446){
            $num_challenge_day = $this->challenge_model->get_num_challenge_day($user['id']);
            if($num_challenge_day >= 2){
                redirect('notification/limit_challenge');
            }
        }
        
        $data_level = $this->challenge_model->get_data_level($user['level'], $level);
        if(count($data_level) == 0) redirect("challenge");


        //set session level_challegen
        $this->session->set_userdata("level_challegen", $level);


        $data['arrayQuestion'] = $this->challenge_model->get_list_question_level($user['id'], $user['level'], $lang, $data_level->num_easy, $data_level->num_medium, $data_level->num_hard);
        $data['arrayQuestion'] = $this->replace_p($data['arrayQuestion']);

        $data['time_test']=0;
        foreach ($data['arrayQuestion'] as $question) {
            $data['time_test'] += (int)$question['time_test'];
        }
        $data['course_id'] = $user['level'];
        $data['lang'] = $lang;
        $this->load->view("frontend/challenge/list_question", $data);
        //var_dump($data['arrayQuestion']);
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
        $s = str_replace("<p>", "", $s);    
        $s = str_replace("</p>", "", $s); 
        return $s;
    }

    function insert_record_test()
    {
        $user = $this->session->all_userdata();
        if(!isset($user['id']) || $user['id'] == null)
        { 
            echo "<script> alert('Không thể lưu dữ liệu. Kiểm tra việc đăng nhập làm bài thi của bạn. Xin cảm ơn!');</script>";

        }else{
            $this->challenge_model->next_num_challenge_day($user['id']);
            $lang ="";
            $result = "";
            $total_scores = 0;
            $max_scores = 0; //khac biet

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
                $max_scores += $one_topic[6]; //khac biet
                
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

            //next level thu thach
            if($total_scores * 100 / 70 > $max_scores){
                $this->challenge_model->next_user_level($user['id'], $user['level_challegen']);
            }
            //end next level thu thach
        }
    }
    
}
?>