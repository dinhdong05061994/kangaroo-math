<?php
class Competition_month_admin extends CI_Controller
{
    
    //Ham dung
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('competition_model','ikmc_model'));
        $this->load->library('session');
    }
    
    // function is_logged(){
    //     $session = $this->session->userdata('id');
    //     if(isset($session)){
    //         return true;
    //     }else{
    //         redirect(base_url()."competition_month/login"); 
    //     }
    // }
    
    
    public function view($level) {
        //$this->is_logged();
        $add_data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['arg'] = $this->ikmc_model->load_system_argument();
        $add_data['list_notice'] = $this->ikmc_model->load_list_notice();
        $add_data['user'] = $this->session->all_userdata();
        $add_data['level'] = $level;
        $this->load->view('competition_month/main_admin', $add_data);
            
    }
    public function view_threads($leveluser) {
        $add_data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['arg'] = $this->ikmc_model->load_system_argument();
        $add_data['list_notice'] = $this->ikmc_model->load_list_notice();
        $add_data['user'] = $this->session->all_userdata();

        
        
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        
        $arr_time_test = array('1'=>2700, '2'=>3600, '3'=>4500, '4'=>4500, '17'=>4500);
        $this->session->set_userdata('level', $leveluser);
        $this->session->set_userdata('id', -1);
        $this->session->set_userdata('fullname', "admin");
        $add_data['current_time'] = date("Y-m-d H:i:s",time());

        $add_data['start_time'] = date("Y-m-d H:i:s",time());
        $add_data['time_test'] = $arr_time_test[$leveluser];

        $this->load->view('competition_month/main', $add_data);
            
    }
    public function loadquestion($level) {
        //$this->is_logged();
        $language = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $leveluser = $level;
        $list_question = $this->competition_model->getListQuestion($language, $leveluser);
        $str_json = json_encode($list_question);
        echo $str_json;
    
    }

    public function create_threads(){
        $languages = array (1 => "vi", 2=> "en");
	for($i = 1; $i < 3; $i++) {
		$language = $languages[$i];
		for ($leveluser = 1; $leveluser < 5 ; $leveluser++) { 
		    $data['list_question'] = $this->competition_model->getListQuestion($language, $leveluser);
		    $data['lang']=$language;
		    //$properties_question = $this->competition_model->get_properties($language, $leveluser);
		    $views = $this->load->view('competition_month/create_threads', $data, true);
		    $views = mysql_real_escape_string($views);
		    
		    //$properties_question = $this->competition_model->getListQuestion($language, $leveluser);
		    $properties_question = array();
		    foreach ($data['list_question'] as $question) {
		        $question_temp['id'] = $question['id']; 
		        $question_temp['lang'] = $question['lang'];
		        $question_temp['id_topic'] = $question['id_topic'];
		        $question_temp['part'] = $question['part'];
		        $question_temp['question_order'] = $question['question_order'];
		        $question_temp['level'] = $question['level'];
		        $question_temp['mark'] = $question['mark'];
		        $question_temp['time_test'] = $question['time_test'];
		        $question_temp['order_right_ans'] = $question['order_right_ans'];
		        array_push($properties_question, $question_temp);
		    }
		    $str_json_properties = json_encode($properties_question);
		   
		    $this->competition_model->create_threads($views, $str_json_properties, $leveluser, $language);
		}
	}
        echo "<h1>OK!</h1>";
    }
    public function create_threads_level_admin($level){
        $languages = array (1 => "vi", 2=> "en");
        for($i = 1; $i < 3; $i++) {
        $language = $languages[$i];
        $leveluser = 17;
            $data['list_question'] = $this->competition_model->getListQuestion($language,$level);
            $data['lang']=$language;
            //$properties_question = $this->competition_model->get_properties($language, $leveluser);
            $views = $this->load->view('competition_month/create_threads', $data, true);
            $views = mysql_real_escape_string($views);
            
            //$properties_question = $this->competition_model->getListQuestion($language, $leveluser);
            $properties_question = array();
            foreach ($data['list_question'] as $question) {
                $question_temp['id'] = $question['id']; 
                $question_temp['lang'] = $question['lang'];
                $question_temp['id_topic'] = $question['id_topic'];
                $question_temp['part'] = $question['part'];
                $question_temp['question_order'] = $question['question_order'];
                $question_temp['level'] = $question['level'];
                $question_temp['mark'] = $question['mark'];
                $question_temp['time_test'] = $question['time_test'];
                $question_temp['order_right_ans'] = $question['order_right_ans'];
                array_push($properties_question, $question_temp);
            }
            $str_json_properties = json_encode($properties_question);
           
            $this->competition_model->create_threads($views, $str_json_properties, $leveluser, $language);
        
        }
        echo "<h1>OK!</h1>";
    }
    function chung($level){
        $list_question = $this->competition_model->get_threads($level);
        echo $list_question;
        
    }
    
    
}

?>
