<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<?php
class Ikmc extends CI_Controller
{
    
	//Ham dung
	public function __construct() {
        parent::__construct();
        $this->load->model(array('ikmc_model'));
         date_default_timezone_set('Asia/Ho_Chi_Minh');
         $this->load->library('session');
        
    }
	
	
	
	// public function index() {
		
 //        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
	// 	$data['arg'] = $this->ikmc_model->load_system_argument();
 //        $data['arg'] = $this->convertVideoAllList($data['arg']);
 //        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
 //        $data['list_donors'] = $this->ikmc_model->load_list_donors();
 //        //$data['list_address'] = $this->ikmc_model->load_address_competition();
 //        $data['list_notice'] = $this->ikmc_model->load_list_notice();
	// 	$this->load->view("ikmc/home", $data);        
	// }
    function regulations_examination_room($namefile){
         $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $this->load->helper('url');
        // $name = $this->ikmc_model->getnamepdf_regulations_examination_room();
        // $namefile = $name['file_pdf'];
        try{
            $html = '<iframe src='.base_url().'uploadfile/'.$namefile.' style=" width:100%; height:100%" frameborder="0"></iframe>';
            if(file_exists('uploadfile/'.$namefile)){
                echo  $html;
            }else echo '<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> </head> <div style = "margin: 50px 0 0 50px;">'.($data['lang'] == "vi" ? 'Quy định phòng thi đang cập nhật! <a href="'.base_url().'ikmc">Quay lại</a>' : 'Examination room regulations are updating! <a href="'.base_url().'ikmc">Back to</a>').'</div></html>';
        }catch(Exception $e){
            show_error(
                $e->getMessage().
                ' --- '.
                $e->getTraceAsString());
        }

    }
    public function faqs() {
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['arg'] = $this->convertVideoAllList($data['arg']);
        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $data['list_donors'] = $this->ikmc_model->load_list_donors();
        $data['list_address'] = $this->ikmc_model->load_address_competition();
        $data['list_notice'] = $this->ikmc_model->load_list_notice();
        $this->load->view("ikmc/faqs", $data);  
          
    }
	public function newpaper() {
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['arg'] = $this->convertVideoAllList($data['arg']);
        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $data['list_donors'] = $this->ikmc_model->load_list_donors();
        $data['list_address'] = $this->ikmc_model->load_address_competition();
		$count_news = count($this->ikmc_model->count_news());
		$count_newpaper = count($this->ikmc_model->count_newpaper());
		
		$data['list_news'] = $this->ikmc_model->load_list_news(1,$count_news);
		$data['news_max'] = $this->ikmc_model->load_news_max();
		
		$data['list_newpaper'] = $this->ikmc_model->load_list_newpaper(1,$count_newpaper);
		$data['newpaper_max'] = $this->ikmc_model->load_newpaper_max();
		
        $data['list_notice'] = $this->ikmc_model->load_list_notice();
        $this->load->view("ikmc/newpaper", $data);  
          
    }
	public function news_detail($id = 0) {
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['arg'] = $this->convertVideoAllList($data['arg']);
        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $data['list_donors'] = $this->ikmc_model->load_list_donors();
        $data['list_address'] = $this->ikmc_model->load_address_competition();
		$data['news_detail'] = $this->ikmc_model->news_item($id);
		
        $data['list_notice'] = $this->ikmc_model->load_list_notice();
        $this->load->view("ikmc/news_detail", $data);  
          
    }
    //tra cứu không catcha:
	 public function search_from() {
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['arg'] = $this->convertVideoAllList($data['arg']);
        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $data['list_donors'] = $this->ikmc_model->load_list_donors();
        $data['list_address'] = $this->ikmc_model->load_address_competition();
        $data['list_notice'] = $this->ikmc_model->load_list_notice();
        $this->load->view("ikmc/searchfrom", $data);  
          
    }
     function read_information_contestants(){
          $arr['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
     
                
                if(isset($_POST['name'])){  
                $data['name'] = $_POST['name'];
                $data['date'] = $_POST['date'];
                $data['month'] = $_POST['month'];
                $data['year'] = $_POST['year'];
                $arr['info'] = $this->ikmc_model->read_information_contestants($data);
                $this->load->view("ikmc/showresultsearch",$arr);
                }else redirect('');
  
    }
    //end tra cứu
    // tra cứu có captcha:
    function search_infomation_contestants(){
         $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['arg'] = $this->convertVideoAllList($data['arg']);
        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $data['list_donors'] = $this->ikmc_model->load_list_donors();
        $data['list_address'] = $this->ikmc_model->load_address_competition();
        $data['list_notice'] = $this->ikmc_model->load_list_notice();
        //echo $_POST['fullname'];
        if(isset($_POST['fullname'])){
             $data['name'] = $_POST['fullname'];
                $data['date'] = $_POST['dateofbirth'];
                $data['month'] = $_POST['monthofbirth'];
                $data['year'] = $_POST['yearofbirth'];
                 $data['input']['name'] =  $data['name'];
                 $data['input']['date'] =  $data['date'];
                 $data['input']['month'] =  $data['month'];
                 $data['input']['year'] =  $data['year'];
            if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']){
           // var_dump($_POST);
            $privatekey = "6Ldv2hoTAAAAAKbM-O8MBr6wPG_T-GDaijxf_mr6";
            $ip=$_SERVER['REMOTE_ADDR'];
            $captcha=$_POST['g-recaptcha-response'];
            $rsp=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$privatekey&response=$captcha&remote=$ip");
            
            $arrdata = json_decode($rsp,TRUE);
            //var_dump($arrdata);
             if(!isset($arrdata['success']))
              { 
                
                if($data['lang'] == "vi"){
                echo "<script>alert('Vui lòng tích xác nhận!');</script>";
                }else{
                    echo "<script>alert('Please tick on the box below to confirm!');</script>"; 
                    
                }
                $this->load->view("ikmc/search_info", $data);
             }
              else if($arrdata['success'] == true)
              {
                
                
                // $data['name'] = $_POST['fullname'];
                // $data['date'] = $_POST['dateofbirth'];
                // $data['month'] = $_POST['monthofbirth'];
                // $data['year'] = $_POST['yearofbirth'];
                $arr['info'] = $this->ikmc_model->read_information_contestants($data);
                $arr['input']['name'] =  $data['name'];
                 $arr['input']['date'] =  $data['date'];
                 $arr['input']['month'] =  $data['month'];
                 $arr['input']['year'] =  $data['year'];
                 $arr['lang'] = $data['lang'];
                 $arr['arg'] =$data['arg'];
                 $arr['list_organizers'] = $data['list_organizers'];
                 $arr['list_donors'] = $data['list_donors'];
                 $arr['list_address'] = $data['list_address'];

                $this->load->view("ikmc/showresultsearchinfor",$arr);
             }
            else{ 

                if($data['lang'] == "vi"){
                echo "<script>alert('Vui lòng kiểm tra kết nối mạng hoặc thực hiện lại xác nhận.');</script>";
                }else{
                    echo "<script>alert('There's a problem! Please check the network connection or start again confirmed.');</script>"; 
                }
                $this->load->view("ikmc/search_info", $data);
            }
        }else{
            if($data['lang'] == "vi"){
                echo "<script>alert('Bạn chưa tích xác nhận!');</script>";
                }else{
                    echo "<script>alert('Please tick on the box below to confirm!');</script>"; 
                    
                }
            $this->load->view("ikmc/search_info", $data);
        }
        }else{
           // echo "<script>alert('a');</script>";
            $this->load->view("ikmc/search_info", $data);
        }
    }

    
    function insert_require_user(){
        $data['fullname'] = $_POST['fullname'];
        $data['email'] = $_POST['email'];
        $data['phone'] = $_POST['phone'];
        $data['content'] = $_POST['content_require'];
        $data['times_send'] = date("Y-m-d H:i:s", time());
        $this->ikmc_model->insert_require_user($data);
        
    }
    // gửi yeu cau nguoi dung bang email
    function send_require_user(){
        $lang = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $data['fullname'] = $_POST['fullname'];
        $data['email'] = $_POST['email'];
        $data['phone'] = $_POST['phone'];
        $data['content'] = $_POST['content_require'];
        $email = "kangaroomath.systems@gmail.com";

        $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' => $email, // change it to yours
          'smtp_pass' => 'eigcera2016', // change it to yours
          'mailtype' => 'html', //kieu text thi dung \n, html thì dung br de xuong dong
          'charset' => 'utf-8',
          'wordwrap' => TRUE,
          'newline' => "\r\n"
        );  
        $this->load->library('email', $config);
     
        $message = "<!DOCTYPE html>
                <html>
                <head>
                    <title></title>
                </head>
                <body>";
        $message .= "<p>- Người gửi: <i><b>".$data['fullname']." </b></i>(Email: ".$data['email']."; Số điện thoại: ".$data['phone'].")</p>";
        $message .= '<p>- Nội dung: "<b>'.$data['content'].'</b>"</p>';
        $message .= "</body>
                </html>";
       
        $headers = 'From: kangaroomath.systems@gmail.com' . "\r\n" .
                    'No reply this email.';
        
        
        //$this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");
        $this->email->from($email, 'kangaroo-math.vn'); // change it to yours
        $this->email->to("kangaroomath@ieg.vn");// change it to yours
        $this->email->subject("[Kangaroo Math]_Yêu cầu từ người dùng " . $data['fullname']);
        $this->email->message($message);
        
        if($this->email->send())
        {
            echo 'Email sent.';
            $this->session->set_flashdata('sendsuccess',$lang  == "vi" ? 'Yêu cầu của bạn đã được gửi thành công!' : "Sent require success!");
        }
        else
        {
            show_error($this->email->print_debugger());
            $this->session->set_flashdata('errormail', $lang  == "vi" ?'Gặp phải sự cố! Yêu cầu của bạn chưa được gửi! Vui lòng thử lại.' : "There's a problems! Your request has not been sent! Please try again.");
            echo "no";
        }
    }
    function insert_register_online_user(){
        $data['parent_name'] = $_POST['parent_name'];
        $data['student_name'] = $_POST['student_name'];
        $data['address'] = $_POST['address'];
        $data['school_name'] = $_POST['school_name'];
        $data['phone'] = $_POST['phone'];
        $data['email'] = $_POST['email'];
        $data['type_register'] = 1;
        $data['times_register'] = date("Y-m-d H:i:s", time());
        $this->ikmc_model->insert_register($data);
    }
    function insert_register_ieg(){
        $data['parent_name'] = $_POST['parent_name'];
        $data['student_name'] = $_POST['student_name'];
        $data['address'] = $_POST['address'];
        $data['school_name'] = $_POST['school_name'];
        $data['phone'] = $_POST['phone'];
        $data['email'] = $_POST['email'];
        $data['type_register'] = 2;
        $data['times_register'] = date("Y-m-d H:i:s", time());
        $this->ikmc_model->insert_register($data);
    }
    function setlanguage($lang){
        $this->session->set_userdata('lang', $lang);
    }
    function convertVideoAllList($argument)
    {
        
            $argument['vi_introduce_competition'] = $this->convertVideo($argument['vi_introduce_competition']);
            $argument['en_introduce_competition'] = $this->convertVideo($argument['en_introduce_competition']);
            $argument['vi_introduce_competition_international'] = $this->convertVideo($argument['vi_introduce_competition_international']);
            $argument['vi_introduce_competition_international'] = $this->convertVideo($argument['vi_introduce_competition_international']);
            $argument['vi_summer_camp'] = $this->convertVideo($argument['vi_summer_camp']);
            $argument['en_summer_camp'] = $this->convertVideo($argument['en_summer_camp']);
        
        return $argument;
    }
    
    function convertVideo($s){
        $s = str_replace("\f", "\\f", $s);
        $s = str_replace("watch?v=", "embed/", $s);        
        $s_convert = "";
        $count_parity = false;
        for($i = 0; $i < strlen($s); $i++)
        {   
            
            if($s[$i] == '$')
            {
                
                    if($count_parity == false)
                    {
                        
                        $count_parity = true;
                        $s_convert = $s_convert."<iframe class='col-sm-12' height='315' src='";
                        
                    }
                    else{
                        $count_parity = false;
                        $s_convert = $s_convert."' frameborder='0' allowfullscreen></iframe>";
                    }
                
            }
            else{
                
                $s_convert = $s_convert.$s[$i];
            }
            
       }
        return $s_convert;
    }
    function search_result_ikmc(){
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['arg'] = $this->convertVideoAllList($data['arg']);
        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $data['list_donors'] = $this->ikmc_model->load_list_donors();
        $data['list_address'] = $this->ikmc_model->load_address_competition();
        $data['list_notice'] = $this->ikmc_model->load_list_notice();
        //echo $_POST['fullname'];
        if(isset($_POST['fullname'])){
             $data['name'] = $_POST['fullname'];
                $data['date'] = $_POST['dateofbirth'];
                $data['month'] = $_POST['monthofbirth'];
                $data['year'] = $_POST['yearofbirth'];
                 $data['input']['name'] =  $data['name'];
                 $data['input']['date'] =  $data['date'];
                 $data['input']['month'] =  $data['month'];
                 $data['input']['year'] =  $data['year'];
            if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']){
           // var_dump($_POST);
            $privatekey = "6Ldv2hoTAAAAAKbM-O8MBr6wPG_T-GDaijxf_mr6";
            $ip=$_SERVER['REMOTE_ADDR'];
            $captcha=$_POST['g-recaptcha-response'];
            $rsp=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$privatekey&response=$captcha&remote=$ip");
            
            $arrdata = json_decode($rsp,TRUE);
            //var_dump($arrdata);
             if(!isset($arrdata['success']))
              { 
                
                if($data['lang'] == "vi"){
                echo "<script>alert('Vui lòng tích xác nhận!');</script>";
                }else{
                    echo "<script>alert('Please tick on the box below to confirm!');</script>"; 
                    
                }
                $this->load->view("ikmc/search_info", $data);
             }
              else if($arrdata['success'] == true)
              {
                
                $arr['info'] = $this->ikmc_model->read_result_ikmc($data);
                // echo '<pre>';
                // print_r($arr['info']);
                // echo '</pre>';
                // die;
                $arr['input']['name'] =  $data['name'];
                 $arr['input']['date'] =  $data['date'];
                 $arr['input']['month'] =  $data['month'];
                 $arr['input']['year'] =  $data['year'];
                 $arr['lang'] = $data['lang'];
                 $arr['arg'] =$data['arg'];
                 $arr['list_organizers'] = $data['list_organizers'];
                 $arr['list_donors'] = $data['list_donors'];
                 $arr['list_address'] = $data['list_address'];

                $this->load->view("ikmc/showresultsearchinfor",$arr);
             }
            else{ 

                if($data['lang'] == "vi"){
                echo "<script>alert('Vui lòng kiểm tra kết nối mạng hoặc thực hiện lại xác nhận.');</script>";
                }else{
                    echo "<script>alert('There's a problem! Please check the network connection or start again confirmed.');</script>"; 
                }
                $this->load->view("ikmc/search_info", $data);
            }
        }else{
            if($data['lang'] == "vi"){
                echo "<script>alert('Bạn chưa tích xác nhận!');</script>";
                }else{
                    echo "<script>alert('Please tick on the box below to confirm!');</script>"; 
                    
                }
            $this->load->view("ikmc/search_info", $data);
        }
        }else{
           // echo "<script>alert('a');</script>";
            $this->load->view("ikmc/search_info", $data);
        }
    }
}

?>