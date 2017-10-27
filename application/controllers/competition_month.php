<?php
class Competition_month extends CI_Controller
{
    
    //Ham dung
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('competition_model','ikmc_model', 'accumulated_model'));
        $this->load->library('session');
    }
    
    function is_logged(){
        $session = $this->session->userdata('id');
        if(!empty($session)){
            return true;

        }else{
            redirect(base_url()."competition_month/login"); 
        }
    }
    
    
    // public function index() {
    //     $this->is_logged();
    //     $add_data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
    //     $add_data['arg'] = $this->ikmc_model->load_system_argument();
    //     $add_data['list_notice'] = $this->ikmc_model->load_list_notice();
    //     $add_data['user'] = $this->session->all_userdata();

    //     $obj_history = $this->competition_model->getHistory($add_data['user']['id']);

    //     if(isset($obj_history['time_end']) && $obj_history['time_end'] != "0000-00-00 00:00:00"){
    //         redirect("notification/limit_competition_month");
    //     }

    //     date_default_timezone_set('Asia/Ho_Chi_Minh');
    //     $arr_time_competition = array('1'=>'2016-10-28 16:35:00', '2'=>'2016-10-25 20:00:00', '3'=>'2016-10-29 19:30:00', '17'=>'2016-10-29 14:05:00');//date("Y-m-d H:i:s",time())
    //     $arr_time_test = array('1'=>2700, '2'=>3600, '3'=>4500, '17'=>4500);
    //     $leveluser = $this->session->userdata('level');
        
    //     $add_data['current_time'] = date("Y-m-d H:i:s",time());

    //     $add_data['start_time'] = $arr_time_competition[$leveluser];
    //     $add_data['time_test'] = $arr_time_test[$leveluser];

    //     $this->load->view('competition_month/main', $add_data);
            
    // }
    public function index() {
        $this->is_logged();
        $this->load->model( 'statistics_model');
        $add_data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['arg'] = $this->ikmc_model->load_system_argument();
        $add_data['list_notice'] = $this->ikmc_model->load_list_notice();
        $add_data['user'] = $this->session->all_userdata();
        $level_month=$add_data['user']['level'] == 17 ? 3:$add_data['user']['level'];
         $total_question_monthly = $this->statistics_model->get_total_question_monthly($level_month);
        if($total_question_monthly <=0){
            $this->session->set_userdata('no-question', 1);
        }
        
        $obj_history = $this->competition_model->getHistory($add_data['user']['id']);
        //if(isset($obj_history['time_end']) && $obj_history['time_end'] != "0000-00-00 00:00:00"){
        //    redirect("notification/limit_competition_month");
        //}
        $arr_time_competition = date("Y-m-d H:i:s",time());//array('1'=>'2017-08-27 07:00:00', '2'=>'2017-08-27 07:00:00', '3'=>'2017-08-27 07:00:00', '4'=>'2017-08-27 07:00:00', '17'=>'2017-05-28 07:00:00'); //Dong nay cho phep vao lam vo toi va
        $arr_time_test = array('1'=>2700, '2'=>3600, '3'=>4500,'4'=>4500, '17'=>4500);
        $leveluser = $this->session->userdata('level');
        
        $add_data['current_time'] = date("Y-m-d H:i:s",time());

        $add_data['start_time'] = $arr_time_competition;//$arr_time_competition[$leveluser]; //Dong nay cho phep vao lam vo toi va
        $add_data['time_test'] = $arr_time_test[$leveluser];
        //var_dump($this->session->all_userdata());
        $this->load->view('competition_month/choose_language_thread', $add_data);
            
    }
    public function do_test($lang){
        $this->is_logged();
        
        if($lang){
            $this->session->set_userdata('lang', $lang);
        }
        $this->is_logged();
        $add_data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['arg'] = $this->ikmc_model->load_system_argument();
        $add_data['list_notice'] = $this->ikmc_model->load_list_notice();
        $add_data['user'] = $this->session->all_userdata();
        
        $obj_history = $this->competition_model->getHistory($add_data['user']['id']);
        
        if(isset($obj_history['time_end']) && $obj_history['time_end'] != "0000-00-00 00:00:00"){
            redirect("notification/limit_competition_month");
        }

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $arr_time_competition = array('1'=>'2017-08-27 07:00:00', '2'=>'2017-08-27 07:00:00', '3'=>'2017-08-27 07:00:00', '4'=>'2017-08-27 07:00:00', '17'=>'2017-08-27 07:00:00');//date("Y-m-d H:i:s",time())
        $arr_time_test = array('1'=>2700, '2'=>3600, '3'=>4500,'4'=>4500, '17'=>4500);
        $leveluser = $this->session->userdata('level');
        
        $add_data['current_time'] = date("Y-m-d H:i:s",time());

        $add_data['start_time'] = $arr_time_competition[$leveluser];
        $add_data['time_test'] = $arr_time_test[$leveluser];

        $this->load->view('competition_month/main', $add_data);
    }
    public function loadquestion() {
        $this->is_logged();
        $language = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        //$leveluser = 1;
        $leveluser = $this->session->userdata('level');
        // $list_question = $this->competition_model->getListQuestion($language, $leveluser);
        // $str_json = json_encode($list_question);
        // echo $str_json;
        $data = $this->competition_model->get_threads($leveluser,$language);
        if(count($data) == 0 or $data['properties'] == "[]"){
            $data['threads']= $language=='en' ? 'No question!' : "Không có câu hỏi nào!";
            $data['properties']= "[]";
        }
        $str_json = json_encode($data);
        echo $str_json;

    }
    public function set_begin_doing(){
        $this->is_logged();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $add_data['user'] = $this->session->all_userdata();
        $this->competition_model->insertHistory($add_data['user']['id'], date("Y-m-d H:i:s",time()));
    }
    
    public function viewhistory(){
        $this->is_logged();
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['list_notice'] = $this->ikmc_model->load_list_notice();
        $data['user'] = $this->session->all_userdata();
        $iduser = $this->session->userdata('id');
        $leveluser = $this->session->userdata('level');
        $data['obj_history'] = $this->competition_model->getHistory($iduser);
        $data['arr_history'] = json_decode($data['obj_history']['strjson']);
        if(count($data['arr_history']) == 0) redirect("summer/ikmc_detail_user");
        $listidquestion = "0";
        $arr_result = array();
        foreach ($data['arr_history'] as $obj_history) {
            $listidquestion .= ",".$obj_history->id_question;
            $arr_result[$obj_history->id_question] = $obj_history->result;
        }
        $data['list_question'] = $this->competition_model->getListQuestionHistory($listidquestion);
        
        for($i = 0; $i < count($data['list_question']); $i++) {
            $data['list_question'][$i]['result'] = $arr_result[$data['list_question'][$i]['id']];
        }
        $data['title_ans'] = array('1'=>"(A)", '2'=>"(B)", '3'=>"(C)", '4'=>"(D)", '5'=>"(E)");
        $this->load->view('competition_month/viewhistory', $data);
    }
    public function savehistory() {
        $this->is_logged();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $user = $this->session->all_userdata();
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        //$iduser = 1; //tuyen sua giup to
        //tuyen sua:
        $iduser = $this->session->userdata('id');
        $score = $_POST['score'];
        $jump_max_length = $_POST['jump'];
        $strjson = $_POST['strjson'];
        $this->accumulated_model->update_total_score($iduser, $data['lang'], $score);
        $this->competition_model->updateHistory($iduser, $score, $jump_max_length, $strjson, date("Y-m-d H:i:s",time()));
    }
    public function rank() {
        $this->is_logged();

        $add_data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['arg'] = $this->ikmc_model->load_system_argument();
        $add_data['list_notice'] = $this->ikmc_model->load_list_notice();
        $add_data['user'] = $this->session->all_userdata();

        
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $arr_time_view = array('1'=>'2017-05-28 07:30:00', '2'=>'2017-05-28 07:45:00', '3'=>'2017-05-28 08:00:00', '4'=>'2017-05-28 08:00:00', '17'=>'2017-02-19 18:25:00');
        
        $leveluser = $this->session->userdata('level');
        
        $add_data['current_time'] = date("Y-m-d H:i:s",time());

        $add_data['view_time'] = $arr_time_view[$leveluser];
        
        //var_dump($add_data);
        $this->load->view('competition_month/rank_main', $add_data);
    }
    public function get_rank() {
        $this->is_logged();

        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $data['level'] = $this->session->userdata('level');
        $leveluser = $this->session->userdata('level');
        $data['iduser'] = $this->session->userdata('id');
        $data['ranks'] = $this->competition_model->get_ranks($leveluser);
         $data['top_jump'] = $this->competition_model->get_top_jump($leveluser);
        $this->load->view('competition_month/rank', $data);
    }
    function login(){
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $data['list_donors'] = $this->ikmc_model->load_list_donors();
        $lang = $data['lang'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if(isset($_POST['nickname']) && $_POST['nickname']!="")
            {
                $nickname = $_POST['nickname']; 
                $password = $_POST['pass'];
                $check = $this->competition_model->checkuser($nickname, $password);
                if(count($check) > 0)
                {
                    $data['competition']['id'] =  $check['id'];
                    $data['competition']['email'] = $check['email'];
                    $data['competition']['level'] = $check['level'] ;
                    $data['competition']['fullname'] = $check['fullname'] ;
                    $data['competition']['nickname'] = $check['nickname'];
                    $data['competition']['birthday']= $check['birthday'];
                    $data['competition']['gender'] = $check['gender'] == '1' ? "Nam" : ($check['gender'] == '2' ? "Nữ" : "Khác");  
                    $this->session->set_userdata($data['competition']);
                    // var_dump($this->session->userdata('competition'));
                    // var_dump(strtotime(date('Y-m-d H:i:s')));die;
                    if($check['level'] == 0){
                        $this->session->set_userdata('no_level','Vui lòng chọn level của bạn!');
                        redirect(base_url() . "summer/ikmc_detail_user");
                    }else{
                        redirect(base_url()."competition_month"); 
                    }
                    

                }
                else {
                    //echo 'Tên đăng nhập hoặc mật khẩu không chính xác';
                    
                    
                    if($lang =='vi'){
                        $this->session->set_flashdata('flash_error','Tên đăng nhập hoặc mật khẩu không chính xác!');
                        
                    }else{
                        $this->session->set_flashdata('flash_error','User name or password is incorrect!');
                    }
                    redirect(base_url()."competition_month/login");
                }
                        
            }
            else
                $this->load->view('competition_month/login',$data);
    }
    
    
}

?>
