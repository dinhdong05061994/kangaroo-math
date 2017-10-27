<?php
class Notification extends CI_Controller
{
    
	//Ham dung
	public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('ikmc_model','home_model', 'accumulated_model'));
        $this->load->library('session');
    }
	public function index(){
        $this->limit_ikmc_practice();
    }
	
	//thong bao gioi han bai thi nam
	public function limit_ikmc_practice() {
        $add_data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['arg'] = $this->ikmc_model->load_system_argument();
        $add_data['user'] = $this->session->all_userdata();
        $add_data['content'] = $add_data['lang'] == "en" ? 'A day you are only allowed to do one test of the year. Please come back tomorrow.':"Mỗi ngày bạn chỉ được phép làm 1 bài thi năm. Bạn vui lòng quay lại vào ngày mai.";
        $add_data['back'] = "summer/ikmc_detail_user";
		$this->load->view("frontend/notification", $add_data);
		   
	}
    //thong bao gioi han bai thi thu thach
    public function limit_challenge() {
        $add_data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['arg'] = $this->ikmc_model->load_system_argument();
        $add_data['user'] = $this->session->all_userdata();
        $add_data['content'] =$add_data['lang'] == "en" ? 'A day you are only allowed to do two test challenge. Please come back tomorrow.':"Mỗi ngày bạn chỉ được phép làm 2 bài thi thử thách. Bạn vui lòng quay lại vào ngày mai.";
        $add_data['back'] = "summer/ikmc_detail_user";
        $this->load->view("frontend/notification", $add_data);
           
    }
    //thong bao gioi han bai thi tu chon
    public function limit_violympic() {
        $add_data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['arg'] = $this->ikmc_model->load_system_argument();
        $add_data['user'] = $this->session->all_userdata();
        $add_data['content'] = $add_data['lang'] == "en" ? 'A day you are only allowed to do 70 test optional. Please come back tomorrow.': "Mỗi ngày bạn chỉ được phép làm 70 bài thi tự chọn. Bạn vui lòng quay lại vào ngày mai.";
        $add_data['back'] = "summer/ikmc_detail_user";
        $this->load->view("frontend/notification", $add_data);
           
    }
    //thong bao chi duoc lam 1 bai thi tháng
    public function limit_competition_month() {
        $add_data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['arg'] = $this->ikmc_model->load_system_argument();
        $add_data['user'] = $this->session->all_userdata();
        $add_data['content'] = $add_data['lang'] == "en" ? 'You are only allowed to make only one time for the test this month.':"Bạn chỉ được phép làm duy nhất 1 lần với bài thi tháng này.";
        $add_data['back'] = "summer/ikmc_detail_user";
        $this->load->view("frontend/notification", $add_data);
           
    }
    
}

?>