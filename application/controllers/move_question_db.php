<?php
class Move_question_db extends CI_Controller
{
    
    //Ham dung
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('move_question_model','ikmc_model'));
        $this->load->library('session');
    }
    
    
    
    public function index() {
        $add_data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['arg'] = $this->ikmc_model->load_system_argument();
        $add_data['list_notice'] = $this->ikmc_model->load_list_notice();
        $add_data['user'] = $this->session->all_userdata();
        $this->load->view('backend/view_move_question', $add_data);
            
    }
    public function month() {
        $result = $this->move_question_model->month();
        echo $result >= 0 ? "Đã chuyển {$result} câu hỏi thành công!" : "Thao tác không thành công!";
            
    }
    public function year() {
        $result = $this->move_question_model->year();
        echo $result >= 0 ? "Đã chuyển {$result} câu hỏi thành công!" : "Thao tác không thành công!";
            
    }
    public function week() {
        $result = $this->move_question_model->week();
        echo $result >= 0 ? "Đã chuyển {$result} câu hỏi thành công!" : "Thao tác không thành công!";
            
    }

    
    
}

?>