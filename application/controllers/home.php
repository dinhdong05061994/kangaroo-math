<!-- <?php
class Home extends CI_Controller
{
    
	//Ham dung
	public function __construct() {
        parent::__construct();
        $this->load->model(array('home_model'));
        
    }
	
	
	
	public function index() {
		
		
	   $data['list_img_slide'] = $this->home_model->load_img_slide();
		$data['arg'] = $this->home_model->load_system_argument();
        $data['arr_title'] = array('info_sign_up', 'test_schedule_address', 'regulation_competition', 'awards');
        $data['title_view'] = array(
            'introduce_competition' => 'Giới Thiệu Kỳ Thi',
            'info_sign_up' => 'Đăng Ký Dự Thi',
            'test_schedule_address' => 'Lịch - Địa điểm thi',
            'regulation_competition' => 'Thể Lệ Cuộc Thi',
            'awards' => 'Giải Thưởng',
            'organizers' => 'Ban Tổ Chức',
            'contact' => 'Liên Hệ'
        );
        $data['color_background'] = array(
            'introduce_competition' => '#FB8F0C',
            'info_sign_up' => '#09C',
            'test_schedule_address' => '#96C',
            'regulation_competition' => '#0CC',
            'awards' => '#FC0'
        );
		$this->load->view("frontend/home", $data);        
	}
    public function action($current_view) {
        $data['list_img_slide'] = $this->home_model->load_img_slide();
		$data['arg'] = $this->home_model->load_system_argument();
        $data['current_view'] = $current_view;
        $data['arr_title'] = array('introduce_competition','info_sign_up', 'test_schedule_address', 'regulation_competition', 'awards');
        $data['title_view'] = array(
            'introduce_competition' => 'Giới thiệu kỳ thi',
            'info_sign_up' => 'Đăng ký dự thi',
            'test_schedule_address' => 'Lịch - Địa điểm thi',
            'regulation_competition' => 'Thể lệ cuộc thi',
            'awards' => 'Giải thưởng',
            'organizers' => 'Ban tổ chức',
            'summer_camp' => 'Trại hè',
            'winners' => 'Người thắng giải'
        );
        $data['color_background'] = array(
            'introduce_competition' => '#FB8F0C',
            'info_sign_up' => '#09C',
            'test_schedule_address' => '#96C',
            'regulation_competition' => '#0CC',
            'awards' => '#FC0'
        );
		$this->load->view("frontend/show_details", $data);        
	}
}

?> -->