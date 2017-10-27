<?php

class Summer extends CI_Controller {

    //Ham dung
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('practice_model', 'ikmc_model'));
        $this->load->library('session');
    }

    public function index() {

        $this->choose();
    }

    public function ikmc_detail_user() {
        //$this->load->view('ikmc/ikmc_detail_user');
        $this->load->model( 'statistics_model');
        $add_data['user'] = $this->session->all_userdata();

        if (!isset($add_data['user']['id'])) {
            redirect(base_url() . "summer/login");
        }else if($add_data['user']['id'] < 0){
            redirect(base_url() . "user_controller/logout");
        }
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['user'] = $this->session->all_userdata();
//            $add_data['math_user'] = $this->ikmc_model->get_math_user($add_data['user']['id']);
//            $list_math = explode(';',$add_data['math_user']['result']);
//            $list_math_item = array();
//            $math = array();
//            
//            for($i = (count($list_math)-2) ; $i > count($list_math) - 9 ; $i--){
//                $list_math_item[] = $list_math[$i];
//            }
//            for($i = 0; $i < count($list_math_item) ; $i++){
//                $math[] = explode(',',$list_math_item[$i]);
//            }
//            for($i = 0; $i < count($math) ; $i++){
//                $data['day'][] = $math[$i][0];
//                $data['diem'][] = $math[$i][1]."/".$math[$i][2];
//                $data['diem_num'][] = $math[$i][1]/$math[$i][2]*100;
//            }
//            //print_r($data['diem']);die();
//      
        //13/10/16: tuyen them lay diem tich lũy theo ngay của user
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = (string)date('Y-m-d');
        $arr_scores = $this->ikmc_model->get_all_score_user($add_data['user']['id']);
        //var_dump($arr_scores);
        $all_scores= 0;
        $temp_arr = '';
        foreach ($arr_scores as $score) {
            if($data['lang'] == "en"){
                $temp_arr = $score['result_en'];
            }else{
                $temp_arr = $score['result'];
            }
        	if($temp_arr !="" || !empty($temp_arr)){
        		$temp = explode(';', $score['result']);
	            $score_day = explode(',', $temp[sizeof($temp)-2]);
	            $tempday = $score_day[0];
	            if($date == $tempday){
                    $all_scores += $score_day[1] + $score_day[3] + $score_day[5];
                    $data['max_score_by_day'] = $score_day[2]+$score_day[4]+$score_day[6];
                }
        	}
            $temp_arr = '';
        }
        $data['score_by_day'] = $all_scores;

        //end
        //22/10/2016: thêm lay diem tich luy chung
        $this->load->model(array('accumulated_model','rank_accumulated_points_model'));
        $arr_acc_point=array();
        $data['total_score']=0;
        if($data['lang'] == "en"){
            $arr_acc_point = $this->accumulated_model->get_num_accumulated($add_data['user']['id'],'total_score_en');
            $data['total_score'] =  $arr_acc_point;
        }else{
            $arr_acc_point = $this->accumulated_model->get_num_accumulated($add_data['user']['id'],'total_score_vi');
            $data['total_score'] =  $arr_acc_point;
        }
        //var_dump($arr_acc_point);
        //end
        $data['list_code'] = $this->practice_model->load_list_code();
        $data['list_chuyende'] = $this->ikmc_model->load_list_chuyende();
        $data['list_class'] = $this->practice_model->load_list_class();
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        //$data['list_lecture'] = $this->ikmc_model->load_list_lecture();
        $data['list_donors'] = $this->ikmc_model->load_list_donors();
        $data['list_notice'] = $this->ikmc_model->load_list_notice();
        $data['list_notif'] = $this->practice_model->get_notification();
        $data['news'] = $this->practice_model->get_news();
        $data['user_information'] = $this->practice_model->getuser($add_data['user']['id']);
        //kiểm tra số lượng dữ liệu 
        foreach ($data['list_class'] as $value) {
            $data['total_lecture'][$value['id']] = $this->statistics_model->get_total_lecture($value['id']);
        }
         
        $data['total_question_week'] = $this->statistics_model->get_total_question_week();
        $data['total_question_year'] = $this->statistics_model->get_total_question_year();
        $data['total_question_optional'] = $this->statistics_model->get_total_question_optional();
        $level_month=$add_data['user']['level'] == 17 ? 3:$add_data['user']['level'];
        $data['total_question_monthly'] = $this->statistics_model->get_total_question_monthly($level_month);
        if($data['total_question_monthly'] <=0){
            $this->session->set_userdata('no-question', 1);
        }
        //lay bang xep hang
        //var_dump($add_data['user']['level']);
        $data['arr_rank'] = ($this->rank_accumulated_points_model->getrank($add_data['user']['level'],$data['lang']) ) ? $this->rank_accumulated_points_model->getrank($add_data['user']['level'],$data['lang']) : array();
        $this->load->view('ikmc/ikmc_detail_user', isset($data) ? $data : null);
    }

    public function lecture($id = 0) {
        $this->load->model( 'statistics_model');
        $add_data['user'] = $this->session->all_userdata();
        if (!isset($add_data['user']['id'])) {
            redirect(base_url() . "summer/login");
        }
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['user'] = $this->session->all_userdata();
        $data['list_code'] = $this->practice_model->load_list_code();
        $data['list_class'] = $this->practice_model->load_list_class();
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $data['list_lecture'] = $this->ikmc_model->load_list_lecture($id);
	//đoạn code sau để tìm bài giảng có id nhỏ nhất
	$data['min_lecture'] = 10000;
	$data['lecture_id'] = $id;
        foreach ($data['list_lecture'] as $lecture) {
            $data['total_para'][$lecture['id']] = $this->statistics_model->get_total_para_lecture($lecture['id']);
	    if ($lecture['id'] < $data['min_lecture']) {
		$data['min_lecture'] = $lecture['id']; 
	    }
        }	
        $data['item_lecture'] = $this->ikmc_model->item_lecture($id);
        //print_r($data['list_lecture']);die();
        $data['list_donors'] = $this->ikmc_model->load_list_donors();
        $data['list_notice'] = $this->ikmc_model->load_list_notice();
        $data['list_notif'] = $this->practice_model->get_notification();
        $data['news'] = $this->practice_model->get_news();
        $data['check'] = $id;
        $data['size'] = '24px';
        $this->load->view('ikmc/ikmc_lecture', isset($data) ? $data : null);
    }

    public function lecture_detail() {
        $id = $this->input->post('id');
        $data['id'] = $id;
        $data['lecture_detail'] = $this->ikmc_model->get_list_para($id);
        $this->load->view('ikmc/commons/ajax_lecture', isset($data) ? $data : NULL);
    }

    public function chart() {


        $id = $this->input->post('id');
        $data['id'] = $id;

        $add_data['user'] = $this->session->all_userdata();
        $add_data['math_user'] = $this->ikmc_model->get_math_user($add_data['user']['id'], $id);
		if(count($add_data['math_user']) > 0){
        $list_math = explode(';', $add_data['math_user']['result']);
        $list_math_item = array();
        $math = array();
        if (count($list_math) >= 9) {
            for ($i = (count($list_math) - 2); $i > count($list_math) - 9; $i--) {
                $list_math_item[] = $list_math[$i];
            }
            for ($i = 0; $i < count($list_math_item); $i++) {
            $math[] = explode(',', $list_math_item[$i]);
            }
            for ($i = 0; $i < count($math); $i++) {
                $data['day'][] = $math[$i][0];
                $data['diem'][] = $math[$i][1] . "/" . $math[$i][2];
                $data['diem_num'][] = $math[$i][1] / $math[$i][2] * 100;
            }
        } else {
            if(count($list_math) > 0){
                for ($i = (count($list_math) - 2); $i >= 0; $i--) {
                    $list_math_item[] = $list_math[$i];
                }
                for ($i = 0; $i < count($list_math_item); $i++) {
                    $math[] = explode(',', $list_math_item[$i]);
                }
                for ($i = 0; $i < count($math); $i++) {
                    $data['day'][] = $math[$i][0];
                    $data['diem'][] = $math[$i][1] . "/" . $math[$i][2];
                    $data['diem_num'][] = $math[$i][1] / $math[$i][2] * 100;
                }
            }else{
                $list_math_item[] = null;
                $data['day'][] = null;
                $data['diem'][] = null;
                $data['diem_num'][] = null;

                }
            }
		}

        //$data['lecture_detail']=$this->ikmc_model->get_list_para($id);
        $this->load->view('ikmc/commons/ajax_chart', isset($data) ? $data : NULL);
    }
    //18/10/16: làm biểu đồ mới:
    function chart_line_all(){
        $user = $this->session->all_userdata();
       $lang = (isset($user['lang']) ? $user['lang'] : "vi");
        $list_topic = $this->ikmc_model->load_list_chuyende();
        $n_title = 0;
        $title[0] = $lang == "en" ? "Day" : "Ngày";
        foreach ($list_topic as $key => $topic) {
            $title[$topic['id']]= $topic['name'];
        }
      
        $data['chart'][0] = $title;
        
       $score_user = $this->ikmc_model->get_all_score_user($user['id']);
        //if($user['id'] == 135)var_dump($score_user);
        if(count($score_user) > 0){
            foreach ($score_user as $key => $by_topic) {
                $add_data['score'][$by_topic['topic_id']] = $lang == "en" ? explode(';', $by_topic['result_en']) : explode(';',$by_topic['result']);
            }
            foreach ($add_data['score'] as $key => $val_score) {
                $current_num = count($val_score);
                $n = 0;
                $num_row_new = 0;
                $arr_temp = array();
                if(count($val_score) < 8 && count($val_score) > 0){
                    $num_row_new = 8 - $current_num;
                    while ($n <= $num_row_new -1) {
                        $arr_temp[$n] = (string)($n +1).',0,0,0,0,0,0';
                        $n++ ;
                    }
                }
                $temp = array();
                for ($i=($current_num -2) ; $i >= $current_num -(8-$num_row_new) ; $i--) { 
                    array_push($temp,$val_score[$i]);
                }
                $add_data['score'][$key] = $arr_temp;
                for($i = count($temp)-1; $i >=0 ; $i--) {
                     $add_data['score'][$key][$n] = $temp[$i];
                     $n++;
                }

            }
            // echo '<pre>';
            // var_dump($add_data['score']);
            // echo '</pre>';
          
            $num_char = 0;
           for ($i=1; $i <=7 ; $i++) { 
            $m = 0;
            $content[$m] = ($lang == "en" ? "Day " : "Ngày ").$i;
                foreach ($title as $t_key => $t) {
                    foreach ($add_data['score'] as $key => $data_score) {
                        if($key == $t_key){
                            $m++;
                            $str_temp = explode(',', $data_score[$num_char]);
                            $content[$t_key] = (float)$str_temp[1]+ (float)$str_temp[3] +(float)$str_temp[5];
                            
                        }
                        
                    }
                }
                
                $data['chart'][$i] = $content;
                $num_char++;
            } 
        }
        $check = 0;
        for ($i=1; $i <=7 ; $i++) { 
            //$data['chart'][$i][0] = (string)$title[0].' '.$i;
            foreach ($list_topic as $key => $val_topic) {
            	# code...
                if( !isset($data['chart'][$i][$val_topic['id']])){
                    $data['chart'][$i][$val_topic['id']] = 0;
                    $check++;
                   
                }

            }
            ksort($data['chart'][$i]);
        }
        // echo '<pre>';
        // var_dump( $data['chart']);
        // echo '</pre>';
        $data['lang'] = $lang;
        $data['check'] = $check;
        $data['count_topic']= count($list_topic);
        $this->load->view('ikmc/commons/ajax_chart_new', $data);
    }

    //end chart
    public function show_news($id) {
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['user'] = $this->session->all_userdata();
        $data['list_code'] = $this->practice_model->load_list_code();
        $data['list_class'] = $this->practice_model->load_list_class();
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        //$data['list_lecture'] = $this->ikmc_model->load_list_lecture();
        $data['list_donors'] = $this->ikmc_model->load_list_donors();
        $data['list_notice'] = $this->ikmc_model->load_list_notice();
        $data['news'] = $this->practice_model->get_one_news($id);
        $this->load->view("ikmc/commons/show_news", $data);
    }

    //IGNORED OLD WEEK CHOOSE
    public function load_year($code) {
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['user'] = $this->session->all_userdata();
        $data['list_code'] = $this->practice_model->load_list_code();
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $data['list_donors'] = $this->ikmc_model->load_list_donors();
        $data['list_notice'] = $this->ikmc_model->load_list_notice();
        $data['list_course'] = $this->practice_model->get_list_course($code);
        $this->load->view("ikmc/practice1/show_list_year", $data);
    }
    public function choose() {
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['user'] = $this->session->all_userdata();
        if (isset($add_data['user']['id'])) {
            $data['list_code'] = $this->practice_model->load_list_code();
            $data['arg'] = $this->ikmc_model->load_system_argument();
            $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
            $data['list_donors'] = $this->ikmc_model->load_list_donors();
            $data['list_notice'] = $this->ikmc_model->load_list_notice();
            $data['list_week'] = $this->practice_model->get_list_week();
            $this->load->view("ikmc/practice1/choose", $data);
        } else {
            redirect("");
        }
    }
    //END OF IGNORED OLD WEEK CHOOSE
    //WEEK CHOOSE V2 (24.08.2017)
    public function load_level() {
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['user'] = $this->session->all_userdata();
        $data['list_code'] = $this->practice_model->load_list_code();
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $data['list_donors'] = $this->ikmc_model->load_list_donors();
        $data['list_notice'] = $this->ikmc_model->load_list_notice();
        $data['list_course'] = $this->practice_model->get_list_course();
        $this->load->view("ikmc/practice1/show_list_year", $data);
    }
    public function choose_week_number($id_course) {
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['user'] = $this->session->all_userdata();
        if (isset($add_data['user']['id'])) {
            $data['list_code'] = $this->practice_model->load_list_code();
            $data['arg'] = $this->ikmc_model->load_system_argument();
            $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
            $data['list_donors'] = $this->ikmc_model->load_list_donors();
            $data['list_notice'] = $this->ikmc_model->load_list_notice();
            $data['list_week'] = $this->practice_model->get_list_week_of_a_course($id_course);
	    $data['id_course'] = $id_course;
            $this->load->view("ikmc/practice1/choose", $data);
        } else {
            redirect("");
      	}
    }
    //END OF WEEK CHOOSE V2

    public function chung() {
        $this->load->view('ikmc/practice/chung');
    }

    public function doing($week = 0) {
        $id = $this->uri->segment(4);
        $add_data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['arg'] = $this->ikmc_model->load_system_argument();
        $add_data['list_notice'] = $this->ikmc_model->load_list_notice();
        $add_data['user'] = $this->session->all_userdata();
        if (isset($add_data['user']['id'])) {
            $add_data['list_question'] = $this->practice_model->get_list_question_week($week, $id,$add_data['lang']);
            //print_r($add_data['list_question']);die();
//            $add_data['time_test'] = 0;
//            foreach($add_data['list_question'] as $question){
//                $add_data['time_test'] += $question['time_test'];
//            }
            //$temp_data = $this->practice_model->get_code($id_code);
            // $add_data['code_title'] = $temp_data[0]['title'];

            $add_data['list_question'] = $this->convertDivLatexAllList($add_data['list_question']);
//            $add_data['title_order_ans'][1] = "(A) ";
//            $add_data['title_order_ans'][2] = "(B) ";
//            $add_data['title_order_ans'][3] = "(C) ";
//            $add_data['title_order_ans'][4] = "(D) ";
//            $add_data['title_order_ans'][5] = "(E) ";
//            $add_data['title_order_ans'][6] = "(F) ";



            if (isset($add_data['list_question']))
                $this->load->view('ikmc/practice1/doing', $add_data);
            else {
                $add_data['error_content'] = ($language == "vi" ? "KHÔNG CÓ CÂU HỎI NÀO." : "No question!");
                echo $add_data['error_content'];
                //$this->load->view('Tournament_amc/Test/error', $add_data);
            }
        } else {
            $add_data['error_content'] = ($language == "vi" ? "Bạn phải đăng nhập để làm bài thi." : "You must log in to do the test, please");
            echo $add_data['error_content'];
            //$this->load->view('Tournament_amc/Test/error', $add_data);
        }
    }

    function save_result_test_user() {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $user = $this->session->all_userdata();
        $year = $_POST['year'];
        $id_code = $_POST['id_code'];
        $points = $_POST['points'];
        $result_test_record = $_POST['result_test_record'];
        $final_result = "$year,$id_code,$points,$result_test_record" . time() . ";";
        echo $final_result;
        $this->practice_model->update_test_record_user($user['id'], $final_result);
    }

    function convertDivLatexAllList($list_question) {
        for ($i = 0; $i < count($list_question); $i++) {
            $list_question[$i]['content'] = $this->convertDivLatex($list_question[$i]['content']);
            $list_question[$i]['hint'] = $this->convertDivLatex($list_question[$i]['hint']);
            // $list_question[$i]['full_key'] = $this->convertDivLatex($list_question[$i]['full_key']);
            $list_question[$i]['right_ans'] = $this->convertDivLatex($list_question[$i]['right_ans']);
            $list_question[$i]['wrong_ans_1'] = $this->convertDivLatex($list_question[$i]['wrong_ans_1']);
            $list_question[$i]['wrong_ans_2'] = $this->convertDivLatex($list_question[$i]['wrong_ans_2']);
            $list_question[$i]['wrong_ans_3'] = $this->convertDivLatex($list_question[$i]['wrong_ans_3']);
            //$list_question[$i]['wrong_ans_4'] = $this->convertDivLatex($list_question[$i]['wrong_ans_4']);
//            $list_question[$i]['wrong_ans_5'] = $this->convertDivLatex($list_question[$i]['wrong_ans_5']);
//            $list_question[$i]['wrong_ans_6'] = $this->convertDivLatex($list_question[$i]['wrong_ans_6']);
        }
        return $list_question;
    }

    function convertDivLatex($s) {
        $s = str_replace("\f", "\\f", $s);
        $s = str_replace("\t", "\\t", $s);
        $s_convert = "";
        $count_parity = false;
        for ($i = 0; $i < strlen($s); $i++) {

            if ($s[$i] == '$') {
                if ($i < strlen($s) - 1 and $s[$i + 1] == '$') {
                    if ($count_parity == false) {
                        $count_parity = true;
                        $s_convert = $s_convert . "<div class='latex_newline'>";
                    } else {
                        $count_parity = false;
                        $s_convert = $s_convert . "</div>";
                    }
                    $i++;
                } else {
                    if ($count_parity == false) {

                        $count_parity = true;
                        $s_convert = $s_convert . "<div class='latex'>";
                    } else {
                        $count_parity = false;
                        $s_convert = $s_convert . "</div>";
                    }
                }
            } else {

                $s_convert = $s_convert . $s[$i];
            }
        }
        return $s_convert;
    }
    // 20/10/16: thêm reset thong tin so bai thi da làm trong ngày
    function reset_num_accumulated($iduser,$logintime_old){
        $this->load->model("accumulated_model");
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date_now = date('Y-m-d');
        $date=date_create($logintime_old);
        $logintime_old = date_format($date,'Y-m-d');
        $check='';
        if($date_now != $logintime_old){
            $check = $this->accumulated_model->count_accumulated($iduser);
            if(count($check) > 0 && isset($check['is_exit']) && $check['is_exit'] > 0){
                $reset=$this->accumulated_model->reset_values_status_day($iduser);
                // echo "<script>alert('".$check."');</script>";
            }else{
                $insert = $this->accumulated_model->new_record($iduser);
            }
            
        }
        $data['logintime'] = date("Y-m-d H:i:s");
        $this->practice_model->updateuser($iduser,$data);
        
    }
    //end

    function login() {      
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $data['list_donors'] = $this->ikmc_model->load_list_donors();
        $lang = $data['lang'];
        if (isset($_POST['nickname']) && $_POST['nickname'] != "") {
            $nickname = strtolower(trim($_POST['nickname']));
            $password = $_POST['pass'];
            $check = $this->practice_model->checklogin1($nickname, $password);
            if (count($check) > 0) {
                $data['practice']['id'] = $check['id'];
                $data['practice']['fullname'] = $check['fullname'];
                $data['practice']['level'] = $check['level'];
                $data['practice']['birthday'] = $check['birthday'];
                $data['practice']['email'] = $check['email'];
                $data['practice']['status'] = $check['status'];
                $data['practice']['phone'] = $check['phone'];
                $this->session->set_userdata($data['practice']);
                if($check['level'] == 0){
                    $this->session->set_userdata('no_level','Vui lòng chọn level của bạn!');
                }else{
                    $this->session->set_flashdata('success','Bạn đã đăng nhập thành công!');
                }
                // 20/10/16: thêm check thong tin so bai thi da làm trong ngày
                $this->reset_num_accumulated($check['id'],$check['logintime']);
                //end
                redirect(base_url() . "summer/ikmc_detail_user");
            } else {

                echo "<script>";
                if ($lang == 'vi') {
                    echo "alert('Tên đăng nhập hoặc mật khẩu không chính xác!');";
                } else {
                    echo "alert('User name or password is incorrect!');";
                }

                echo "</script>";

                $this->load->view('ikmc/practice/login', $data);
            }
        }
        else
            $this->load->view('ikmc/practice/login', $data);
    }
    function update_level(){
        $data['level'] = $_POST['level'];
        $add_data['user']['id'] = $this->session->userdata('id');
        $this->practice_model->updateuser($add_data['user']['id'], $data);
        $this->session->set_userdata('level',$data['level']);
        $this->session->unset_userdata('no_level');
    }
    function login_latest() {
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $data['list_donors'] = $this->ikmc_model->load_list_donors();
        $lang = $data['lang'];
        if (isset($_POST['nickname']) && $_POST['nickname'] != "") {
            $nickname = $_POST['nickname'];
            $password = $_POST['pass'];
            $check = $this->practice_model->checklogin_latest($nickname, $password);
            if (count($check) > 0) {

                $data['practice']['id'] = $check['id'];
                $data['practice']['name'] = $check['name'];
                $data['practice']['DOB'] = $check['DOB'];
                $data['practice']['email'] = $check['email'];
                $data['practice']['school'] = $check['school'];
                $data['practice']['phone'] = $check['phone'];

                $this->session->set_userdata($data['practice']);
                redirect(base_url() . "ikmc_practice/ikmc_detail_user", isset($data) ? $data : NULL);
            } else {

                echo "<script>";
                if ($lang == 'vi') {
                    echo "alert('Tên đăng nhập hoặc mật khẩu không chính xác!');";
                } else {
                    echo "alert('User name or password is incorrect!');";
                }

                echo "</script>";

                $this->load->view('ikmc/practice/login', $data);
            }
        }
        else
            $this->load->view('ikmc/practice/login', $data);
    }

    function signup() {
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $data['list_donors'] = $this->ikmc_model->load_list_donors();
        $this->load->view('ikmc/practice/signup', $data);
    }

    public function savesignup() {
        $data = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');

        if (isset($_POST['email']) && $_POST['email'] != "") {
            $fullname = $_POST['fullname'];
            $password = $_POST['password'];
            $nickname = $_POST['nickname'];
            $sha1pass = sha1($password);
            $email = strtolower($_POST['email']);
            $gender = $_POST['gender'];
            $birthday = $_POST['birthday'];
            $school = $_POST['school'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $parent = $_POST['parent'];
            //echo $gender;
            if ($this->practice_model->check($nickname) == TRUE || count($this->practice_model->checklogin($nickname, $password)) > 0) {
                if ($data == "vi") {
                    echo '<script> alert("Email hoặc username đã được sử dụng ");
                window.location.href="' . base_url() . 'ikmc_practice/signup";</script>';
                } else {
                    echo '<script> alert("Email or username already in use");
                    window.location.href="' . base_url() . 'ikmc_practice/signup";</script>';
                    //redirect("/index.php/imasusercontroller/savesignup");
                }
            } else {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date('Y-m-d H:i:s');
                $data = array(
                    'fullname' => $fullname,
                    'nickname' => $nickname,
                    'gender' => $gender,
                    'birthday' => $birthday,
                    'email' => $email,
                    'password' => $sha1pass,
                    'school' => $school,
                    'address' => $address,
                    'phone' => $phone,
                    'parentsname' => $parent,
                );
                $this->practice_model->insertnewuser($data);
               
                // $user = $this->set_user_cache($email);
                //vardump($user);
                //$this->load->view("frontend/practice/login",$data);
                redirect("ikmc_practice/login");
            }
        } else {
            //echo "a";
            redirect("ikmc_practice/signup");
        }
    }

    function change_infor_user() {
	$this->load->model( 'statistics_model');
        $add_data['user'] = $this->session->all_userdata();
        $user = $this->practice_model->getuser($add_data['user']['id']);
        if($_POST['current_pwd']!==null && $_POST['current_pwd']!=="" && $_POST['new_pwd']!==null && $_POST['new_pwd']!==""){
	     $this->session->set_flashdata('nickname', $user['nickname']);	
             if(count($this->practice_model->checklogin1($user['nickname'], $_POST['current_pwd']))>0){
            	$data['password'] = sha1($_POST['new_pwd']);
             } else {
            	$this->session->set_flashdata('success','Mật khẩu cũ không chính xác'.$user['nickname']."***".$add_data['user']['id']);
		echo $user['nickname'];
            	redirect(base_url() . "summer/ikmc_detail_user");
             }
        }
       
        $data['fullname'] = $_POST['change_name'];
        $data['email'] = $_POST['email'];
        $data['birthday'] = $_POST['birthday'];
        $data['gender'] = $_POST['gender'];
        $data['level'] = $_POST['level'];
        $data['parentsname'] = $_POST['parentsname'];
        $data['phone'] = $_POST['phone'];
        $data['address'] = $_POST['address'];
	
        $this->practice_model->updateuser($add_data['user']['id'], $data);
        $this->session->set_flashdata('success','Bạn đã cập nhật thành công!');
                redirect(base_url() . "summer/ikmc_detail_user");
    }

}

?>
