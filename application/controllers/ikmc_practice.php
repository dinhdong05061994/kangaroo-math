<?php
class Ikmc_practice extends CI_Controller
{
    
    //Ham dung
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('practice_model','ikmc_model','user_model', 'accumulated_model'));
        $this->load->library('session');
    }
    
    
    
    public function index() {
        
        $this->choose();        
    }
    public function load_year() {
        if(isset($_POST)){
            $code = $_POST['code'];
            $userid = $_POST['userid'];
            $lang = $_POST['lang'];
            $user = $this->practice_model->getuser($userid);
            $data['list_year'] = $this->practice_model->get_list_year_by_code_language($code, $lang);
            //var_dump($data['list_year']);
            $data['usertype'] = $user['status'];
            $data['userschool'] = $user['school'];
            $data['grade'] = $code;
            $this->load->view("ikmc/practice/show_list_year", $data);   
        }
          
    }
    public function choose() {
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['user'] = $this->session->all_userdata();
        if(isset($add_data['user']['id'] )) {
            $data['list_code'] = $this->practice_model->load_list_code();
            $data['arg'] = $this->ikmc_model->load_system_argument();
            $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
            $data['list_donors'] = $this->ikmc_model->load_list_donors();
            $data['list_notice'] = $this->ikmc_model->load_list_notice();
            $this->load->view("ikmc/practice/choose", $data);  
         } 
         else{
            redirect("");
         }     
    }
    public function chung(){
        $this->load->view('ikmc/practice/chung');
    }
    public function doing($year, $id_code, $language) {
        $add_data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $add_data['arg'] = $this->ikmc_model->load_system_argument();
        $add_data['list_notice'] = $this->ikmc_model->load_list_notice();
        $add_data['user'] = $this->session->all_userdata();

        // 15/02/2017 : bỏ do anh hải yêu cau, - tuyen, bỏ lại làm 2 do có người ghi đè code
        // if($add_data['user']['id'] != 3446){
        //     $num_testyear_day = $this->accumulated_model->get_num_accumulated($add_data['user']['id'], "num_testyear_day");
        //     if ($num_testyear_day >= 1) {
        //         redirect('notification/limit_ikmc_practice');
        //     }
        // }
        
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
             $add_data['lang'] = $language;
            
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
            
            if(isset($add_data['list_question'])) $this->load->view('ikmc/practice/doing', $add_data);
            else
            {
                $add_data['error_content'] = ($language == "vi" ? "KHÔNG CÓ CÂU HỎI NÀO." : "No question!");
                echo $add_data['error_content'] ;
                //$this->load->view('Tournament_amc/Test/error', $add_data);
            }
        }   
        else
        {
                $add_data['error_content'] = ($language == "vi" ? "<meta charset= 'UTF-8'/> Bạn phải đăng nhập để làm bài thi":"You must log in to do the test, please"). ". Click link: <a href='http://kangaroo-math.vn/summer/login'>http://kangaroo-math.vn/summer</a>";
            // var_dump($this->session->all_userdata());   
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
        redirect("summer/login");
        // $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        // $data['arg'] = $this->ikmc_model->load_system_argument();
        // $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        // $data['list_donors'] = $this->ikmc_model->load_list_donors();
        // $lang = $data['lang'];
        // if(isset($_POST['nickname']) && $_POST['nickname']!="")
        //     {
        //         $nickname = $_POST['nickname']; 
        //         $password = $_POST['pass'];
        //         $check = $this->practice_model->checklogin($nickname, $password);
        //         if(count($check) > 0)
        //         {
                    
        //             $data['practice']['id'] =  $check['id'];
                    
        //             $data['practice']['email'] = $check['email'];
        //             $data['practice']['fullname'] = $check['fullname'] ;
        //             $data['practice']['nickname'] = $check['nickname'];
        //             $data['practice']['school'] = $check['school'];
        //             $data['practice']['phone'] = $check['phone'];
        //             $data['practice']['gender'] = $check['gender'];                 
        //             $this->session->set_userdata($data['practice']);
        //            redirect(base_url()."ikmc_practice");  

        //         }
        //         else {
        //             //echo 'Tên đăng nhập hoặc mật khẩu không chính xác';
                    
        //             echo "<script>";
        //             if($lang =='vi'){
        //                 echo "alert('Tên đăng nhập hoặc mật khẩu không chính xác!');";
        //             }else{
        //                 echo "alert('User name or password is incorrect!');";
        //             }
                   
        //             echo "</script>";

        //              $this->load->view('ikmc/practice/login',$data);
        //         }
                        
        //     }
        //     else
        //         $this->load->view('ikmc/practice/login',$data);
    }
    function signup(){
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $data['list_donors'] = $this->ikmc_model->load_list_donors();
        $this->load->view('ikmc/practice/signup',$data);
    }
    public function savesignup()
    {   $data= $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        
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
                if($data == "vi"){
                    echo  '<script> alert("Email hoặc username đã được sử dụng ");
                window.location.href="'.base_url().'ikmc_practice/signup";</script>';
                }else{
                    echo  '<script> alert("Email or username already in use");
                    window.location.href="'.base_url().'ikmc_practice/signup";</script>';
                //redirect("/index.php/imasusercontroller/savesignup");
                }
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
                redirect("ikmc_practice/login");
                     
            }   
        }
        else{
            //echo "a";
            redirect("ikmc_practice/signup");
        }
    }
}

?>