<?php
class Practice extends CI_Controller
{
    
	//Ham dung
	public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('practice_model','home_model', 'accumulated_model'));
        $this->load->library('session');
    }
	
	
	
	public function index() {
		
		$this->choose();        
	}
    public function load_year($code, $lang) {
        
        $data['list_year'] = $this->practice_model->get_list_year_by_code_language($code, $lang);
        $this->load->view("frontend/practice/show_list_year", $data);        
    }
    public function choose() {
        $add_data['user'] = $this->session->all_userdata();
        if(isset($add_data['user']['id'] )) {
            $data['list_img_slide'] = $this->home_model->load_img_slide();
            $data['list_code'] = $this->practice_model->load_list_code();
            $data['arg'] = $this->home_model->load_system_argument();
            $this->load->view("frontend/practice_choose", $data);  
         } 
         else{
            redirect("");
         }     
    }
    public function doing($year, $id_code, $language) {
        
        $add_data['user'] = $this->session->all_userdata();
        $num_testyear_day = $this->accumulated_model->get_num_accumulated($add_data['user']['id'], "num_testyear_day");
        if ($num_testyear_day >= 1) {
            redirect('notification/limit_ikmc_practice');
        }
        if(isset($add_data['user']['id'] )) {
            $add_data['list_question'] = $this->practice_model->get_list_question_by_id_code_year($year, $id_code, $language);
            $add_data['time_test'] = 0;
            foreach($add_data['list_question'] as $question){
                $add_data['time_test'] += $question['time_test'];
            }
            $temp_data = $this->practice_model->get_code($id_code);
            $add_data['code_title'] = $temp_data[0]['title'];
            
            $add_data['list_question'] = $this->convertDivLatexAllList($add_data['list_question']);
            $add_data['title_order_ans'][1] = "(A) ";
            $add_data['title_order_ans'][2] = "(B) ";
            $add_data['title_order_ans'][3] = "(C) ";
            $add_data['title_order_ans'][4] = "(D) ";
            $add_data['title_order_ans'][5] = "(E) ";
            $add_data['title_order_ans'][6] = "(F) ";
            
            if($language == 'vi') {
                $add_data['arg']['action'] = "NỘP BÀI";
                $add_data['arg']['title'] = "ĐỀ BÀI";
                $add_data['arg']['choose_comment'] = "Chọn 1 câu trả lời đúng";
                $add_data['arg']['fill_comment'] = "Điền trả lời đúng";
                $add_data['arg']['right_ans'] = "Đáp án đúng là";
                $add_data['arg']['show_hint'] = "Xem gợi ý";
                $add_data['arg']['hide_hint'] = "Ẩn gợi ý";
                $add_data['arg']['full_key'] = "Xem đáp án";
                $add_data['arg']['hide_full_key'] = "Ẩn đáp án";
                $add_data['arg']['points'] = "Số điểm";
                $add_data['arg']['num_right'] = "Số đáp án đúng";
                $add_data['arg']['num_wrong'] = "Số đáp án sai";
                $add_data['arg']['time_test'] = "Tổng thời gian làm bài";
                $add_data['arg']['minutes'] = "phút";
                $add_data['arg']['second'] = "giây";
                $add_data['arg']['review'] = "Xem lại bài thi";
            }
            else{
                $add_data['arg']['action'] = "SUBMIT";
                $add_data['arg']['title'] = "Threads";
                $add_data['arg']['choose_comment'] = "Choose 1 correct answer";
                $add_data['arg']['fill_comment'] = "Fill the answer";
                $add_data['arg']['right_ans'] = "Right answer";
                $add_data['arg']['show_hint'] = "Show hint";
                $add_data['arg']['hide_hint'] = "Hide hint";
                $add_data['arg']['full_key'] = "Show solution";
                $add_data['arg']['hide_full_key'] = "Hide solution";
                $add_data['arg']['points'] = "Points";
                $add_data['arg']['num_right'] = "Right answers";
                $add_data['arg']['num_wrong'] = "Wrong answers";
                $add_data['arg']['time_test'] = "Total exam time";
                $add_data['arg']['minutes'] = "minutes";
                $add_data['arg']['second'] = "seconds";
                $add_data['arg']['review'] = "Review";
            }
            
            if(isset($add_data['list_question'])) $this->load->view('frontend/practice_doing', $add_data);
            else
            {
                $add_data['error_content'] = "KHÔNG CÓ CÂU HỎI NÀO.";
                echo $add_data['error_content'] ;
                //$this->load->view('Tournament_amc/Test/error', $add_data);
            }
        }   
        else
        {
            $add_data['error_content'] = "Bạn phải đăng nhập để làm bài thi.";   
             echo $add_data['error_content'] ;
             //$this->load->view('Tournament_amc/Test/error', $add_data);
        }
    }
    function save_result_test_user(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $user = $this->session->all_userdata();
        $year = $_POST['year'];
        $id_code = $_POST['id_code'];
        $points = $_POST['points'];
        $result_test_record = $_POST['result_test_record'];
        $final_result = "$year,$id_code,$points,$result_test_record".time().";";
        echo $final_result;
        //luu diem tich luy
         //$this->accumulated_model->update_total_score($user['id'], $language, $points);
         //cong so bai lam thi nam trong ngay
         $this->accumulated_model->update_num_accumulated($user['id'], "num_testyear_day");
        $this->practice_model->update_test_record_user($user['id'], $final_result);
    }
    function convertDivLatexAllList($list_question)
    {
        for($i = 0; $i < count($list_question); $i++ ){
            $list_question[$i]['content'] = $this->convertDivLatex($list_question[$i]['content']);
            $list_question[$i]['hint'] = $this->convertDivLatex($list_question[$i]['hint']);
            $list_question[$i]['full_key'] = $this->convertDivLatex($list_question[$i]['full_key']);
            $list_question[$i]['right_ans'] = $this->convertDivLatex($list_question[$i]['right_ans']);
            $list_question[$i]['wrong_ans_1'] = $this->convertDivLatex($list_question[$i]['wrong_ans_1']);
            $list_question[$i]['wrong_ans_2'] = $this->convertDivLatex($list_question[$i]['wrong_ans_2']);
            $list_question[$i]['wrong_ans_3'] = $this->convertDivLatex($list_question[$i]['wrong_ans_3']);
            $list_question[$i]['wrong_ans_4'] = $this->convertDivLatex($list_question[$i]['wrong_ans_4']);
            $list_question[$i]['wrong_ans_5'] = $this->convertDivLatex($list_question[$i]['wrong_ans_5']);
            $list_question[$i]['wrong_ans_6'] = $this->convertDivLatex($list_question[$i]['wrong_ans_6']);
        }
        return $list_question;
    }
    
    function convertDivLatex($s){
        $s = str_replace("\f", "\\f", $s);
        $s = str_replace("\t", "\\t", $s);        
        $s_convert = "";
        $count_parity = false;
        for($i = 0; $i < strlen($s); $i++)
        {   
            
            if($s[$i] == '$')
            {
                if($i < strlen($s) - 1 and $s[$i+1] == '$' )
                {
                    if($count_parity == false)
                    {
                        $count_parity = true;
                        $s_convert = $s_convert."<div class='latex_newline'>";
                    }
                    else{
                        $count_parity = false;
                        $s_convert = $s_convert."</div>";
                    }
                    $i++;
                }
                else{
                    if($count_parity == false)
                    {
                        
                        $count_parity = true;
                        $s_convert = $s_convert."<div class='latex'>";
                        
                    }
                    else{
                        $count_parity = false;
                        $s_convert = $s_convert."</div>";
                    }
                }
            }
            else{
                
                $s_convert = $s_convert.$s[$i];
            }
            
       }
        return $s_convert;
    }
    function login(){
        $data['list_img_slide'] = $this->home_model->load_img_slide();
        
        $data['arg'] = $this->home_model->load_system_argument();
        
        if(isset($_POST['nickname']) && $_POST['nickname']!="")
            {
                $nickname = $_POST['nickname']; 
                $password = $_POST['pass'];
                $check = $this->practice_model->checklogin($nickname, $password);
           
                if(count($check) > 0)
                {
                    
                    $data['practice']['id'] =  $check['id'];
                    
                    $data['practice']['email'] = $check['email'];
                    $data['practice']['fullname'] = $check['fullname'] ;
                    $data['practice']['nickname'] = $check['nickname'];
                    $data['practice']['school'] = $check['school'];
                    $data['practice']['phone'] = $check['phone'];
                    $data['practice']['gender'] = $check['gender'];                 
                    $this->session->set_userdata($data['practice']);
                   redirect(base_url()."practice");  

                }
                else {
                    //echo 'Tên đăng nhập hoặc mật khẩu không chính xác';
                    echo "<script>";
                    echo "alert('Tên đăng nhập hoặc mật khẩu không chính xác!');";
                    echo "</script>";

                     $this->load->view('frontend/practice/login',$data);
                }
                        
            }
            else
                $this->load->view('frontend/practice/login',$data);
    }
    function signup(){
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
        $this->load->view('frontend/practice/signup',$data);
    }
    public function savesignup()
    {   
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
        if(isset($_POST['email']) && $_POST['email']!="")
        {
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
            if($this->practice_model->check($nickname) == TRUE || count($this->practice_model->checklogin($nickname,$password))>0){
                echo  '<script> alert("Email hoặc username đã được sử dụng ");
                window.location.href="'.base_url().'practice/signup";</script>';
                //redirect("/index.php/imasusercontroller/savesignup");
                
             }   
            else   
            {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date('Y-m-d H:i:s');
                $data = array(
                    'fullname'      => $fullname,
                    'nickname'      => $nickname,
                    'gender'        => $gender,
                    'birthday'      => $birthday,
                    'email'         => $email,
                    'password'      => $sha1pass,
                    'school'        => $school,
                    'address'       => $address,
                    'phone'         => $phone,
                    'parentsname'        => $parent,
                );
                $this->practice_model->insertnewuser($data);
                
               // $user = $this->set_user_cache($email);
                //vardump($user);
                //$this->load->view("frontend/practice/login",$data);
                redirect("/practice/login");
                     
            }   
        }
        else{
            redirect("/practice/signup");
        }
    }
}

?>