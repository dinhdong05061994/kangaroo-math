<?php
class Entertainmentcorner extends CI_Controller
{
    
    //Ham dung
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('ikmc_model'));  
        $this->load->library('session');
    }
    function checkexitsession(){
        $add_data['user'] = $this->session->all_userdata();
        if(count($add_data['user']) > 0 && isset($add_data['user']['id'])){
            return true;
        }else {
            redirect("./summer/login");
        }
    }
    function index(){
        $user['lang'] = $this->session->userdata('lang');
        $add_data['lang'] = isset($user['lang']) ? $user['lang'] : "vi";
        $add_data['arg'] = $this->ikmc_model->load_system_argument();
        $add_data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $add_data['list_donors'] = $this->ikmc_model->load_list_donors();
        $add_data['list_notice'] = $this->ikmc_model->load_list_notice();   
        $add_data['user']['level'] =  $this->session->userdata('level');
        if($this->session->userdata('choose_level') != null){
            $add_data['user']['choose_level'] =  $this->session->userdata('choose_level');
        }
        $this->load->view("frontend/entertainment/view_home", $add_data);
    }
    function set_choose_level_game($level){
        $this->session->set_userdata('choose_level',$level);
    }
    function unset_choose_level_game(){
        $this->session->unset_userdata('choose_level');
    }
    function show_games(){
        $user['lang'] = $this->session->userdata('lang');
        $add_data['lang'] = isset($user['lang']) ? $user['lang'] : "vi";
        $add_data['choose_level']= (isset($_POST['level']))? ($_POST['level'] == "1-2" ? 1 :($_POST['level'] == "5-6" ? 3: 2 )): 2;
        $this->set_choose_level_game($add_data['choose_level']);
        $this->load->view("frontend/entertainment/show_games", $add_data);
    }
    function remember_number(){
        $user['lang'] = $this->session->userdata('lang');
        $add_data['lang'] = isset($user['lang']) ? $user['lang'] : "vi";
         $add_data['choose_level']= ($this->session->userdata('choose_level'))? $this->session->userdata('choose_level') : 2;
        $add_data['arg'] = $this->ikmc_model->load_system_argument();
        $add_data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $add_data['list_donors'] = $this->ikmc_model->load_list_donors();
        $add_data['list_notice'] = $this->ikmc_model->load_list_notice();   
        $this->load->view("frontend/entertainment/game_remember_number", $add_data);
    }

}