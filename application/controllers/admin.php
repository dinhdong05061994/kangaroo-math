<meta charset="UTF-8" />
<?php
class Admin extends CI_Controller
{
	
	
	public function __construct() {
        parent::__construct();
        // kiem tra trang thia dang nhap
        //$this->load->model(array('home_model'));
        $this->load->library('grocery_CRUD'); 
        $this->load->helper("url");
		$this->load->library('session');
        
    }
	function checksession(){
        $add_data['user'] = $this->session->all_userdata();
        if(count($add_data['user']) > 0 && isset($add_data['user']['admin'])){
            return true;
        }else {
            redirect("admin/loginadmin");
        }
    }
	public function index() {
		 //$this->system_argument_management();      
        $this->loginadmin();   
	}
	function _example_output($output = null)
    {          
            $this->load->view('backend/admin',$output); 
    }
    function _example_output_optinal($output = null)
    {          
            $this->load->view('backend/admin_optinonal',$output); 
    }
    function loginadmin(){
        $this->load->model('adminmodel');
        if(isset($_POST['email']) && $_POST['email']!="")
            {
                $email = $_POST['email']; 
                $password = $_POST['password'];
                $check = $this->adminmodel->checklogin($email, $password);
           
                if(count($check) > 0)
                {
                    $data['admin']['id_user'] =  $check['id_user'];
                    $data['admin']['email'] = $check['email'];
                    $data['admin']['fullname'] = $check['fullname'] ;
                    $data['admin']['phone'] = $check['phone'];

                    $this->session->set_userdata($data);
                    redirect("index.php/admin/system_argument_management");  
                }
                else {
                    //echo 'Tên đăng nhập hoặc mật khẩu không chính xác';
                    echo "<script>";
                    echo "alert('Tên đăng nhập hoặc mật khẩu không chính xác');";
                    echo "</script>";
                     $this->load->view('backend/view_admin_login');
                }
                        
            }
            else
                $this->load->view('backend/view_admin_login');
    }
    function logoutadmin(){
        $this->session->unset_userdata('admin');
        $this->load->view('backend/view_admin_login');
    }
	public function system_argument_management(){
		try {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('system_argument');
            $crud->set_subject("Tham số hệ thống");
            $crud->required_fields('id');
            $crud->unset_add();
            $crud->unset_delete();
            $crud->edit_fields('number_phone_contact', 'email_contact', 'introduce_competition','introduce_competition_short', 'info_sign_up',
                                'info_sign_up_short', 'test_schedule_address','test_schedule_address_short', 'regulation_competition',
                                'regulation_competition_short','awards','awards_short','contact','contact_short','organizers', 'organizers_short',
                                'summer_camp', 'summer_camp_short', 'notification', 'notification_short', 'winners', 'winners_short');
            $crud->columns('number_phone_contact', 'email_contact', 'introduce_competition','introduce_competition_short', 'info_sign_up',
                                'info_sign_up_short', 'test_schedule_address','test_schedule_address_short', 'regulation_competition',
                                'regulation_competition_short','awards','awards_short','contact','contact_short','organizers', 'organizers_short',
                                'summer_camp', 'summer_camp_short', 'notification', 'notification_short', 'winners', 'winners_short');
            
            $crud->display_as('number_phone_contact', 'Số điện thoại liên hệ')
                ->display_as('email_contact', 'Email liên hệ')
                ->display_as('introduce_competition', 'Thông tin kỳ thi')
                ->display_as('introduce_competition_short','Thông tin kỳ thi tóm tắt')
                ->display_as('info_sign_up', 'Thông báo đăng ký')
                ->display_as('info_sign_up_short','Thông báo đăng ký tóm tắt')
                ->display_as('test_schedule_address', 'Thông báo lịch thi và địa điểm thi')
                ->display_as('test_schedule_address_short','Thông báo lịch thi và địa điểm thi tóm tắt')
                ->display_as('regulation_competition', 'Thể lệ thi')
                ->display_as('regulation_competition_short','Thể lệ thi tóm tắt')
                ->display_as('awards','Giải thưởng')
                ->display_as('awards_short','Giải thưởng tóm tắt')
                ->display_as('contact','Liên hệ')
                ->display_as('contact_short','Liên hệ tóm tắt')
                ->display_as('organizers','Ban Tổ chức')
                ->display_as('organizers_short','Ban Tổ chức tóm tắt')
                ->display_as('summer_camp','Trại hè')
                ->display_as('summer_camp_short','Trại hè tóm tắt')
                ->display_as('notification','Thông tin thông báo')
                ->display_as('notification_short','Thông tin thông báo tóm tắt')
                ->display_as('winners','Người thắng giải')
                ->display_as('winners_short','Người thắng giải tóm tắt');
      
            $output = $crud->render();
            $this->_example_output($output);
            
        } catch(Exception $e){
            show_error(
                $e->getMessage().
                ' --- '.
                $e->getTraceAsString());
        }

	}
    function choose_year_question() {
        $this->load->library('session');
        $this->load->model("adminmodel");
         $add_data['user'] = $this->session->all_userdata();
         
        if(isset($add_data['user']['admin']) && isset($add_data['user']['admin']['id_user']) ) {   
            $this->load->helper("url");        
            $this->load->view('backend/question/choose_year_test_question', $add_data);
        }
        else{
            redirect("admin/loginadmin");
        } 
    }   
    
    function add_test_question() {
        $this->load->model("adminmodel");
        $add_data['user'] = $this->session->all_userdata();
        if(isset($add_data['user']['admin']) && isset($add_data['user']['admin']['id_user']) ) {   
            $data['year'] = $_POST['year_select'];
            $data['success'] = "no";
            $this->load->library('session');
            $this->load->helper("url");
            
            $data['topic'] = $this->adminmodel->get_all_topic();

            $data['code'] = $this->adminmodel->get_all_code();
            $this->session->set_userdata($data);
            $this->load->view('backend/question/input_test_question', $data);
        }
        else{
            redirect("admin/loginadmin");
        }
    }
    
    function add_test_question_complete($year) {
        $this->load->library('session');
        $user = $this->session->all_userdata();
        $add_data['id_admin'] = $user['admin']['id_user'];
        
        $add_data['year'] = $year;
        $topic_temp = $_POST['topic_select']; 
        $add_data['id_topic'] = implode(",", $topic_temp); 

        $add_data['part'] = $_POST['part_select']; 
        $add_data['id_code'] = intval($_POST['code_select']);
        if($add_data['part'] == 'A'){
            $add_data['level'] = 0;
            //$add_data['mark'] = 3;
        }else if($add_data['part'] == 'B'){
            $add_data['level'] = 1;
            //$add_data['mark'] = 4;
        }else if($add_data['part'] == 'C'){
            $add_data['level'] = 2;
           // $add_data['mark'] = 5;
        }else{
            $add_data['level'] = 0;
           // $add_data['mark'] = 3;
        }
        // $add_data['level'] = $_POST['level'];
        // $add_data['type'] = $_POST['type'];
        $add_data['mark'] =$_POST['mark_select'] ;
        $add_data['time_test'] =$_POST['time_test'] ;
         $add_data['type'] = 1;
        $add_data['content'] = $_POST['q_content'];
        $add_data['question_order'] = $_POST['order_select'];
        $add_data['lang'] = $_POST['lang_select'];
        //$add_data['mark'] = $_POST['mark_select'];
        if(isset($_POST['order_right_ans'])){
            $add_data['order_right_ans'] = $_POST['order_right_ans'];    
        }else {
            $add_data['order_right_ans'] = 1;
        }
        
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $add_data['time'] = date('Y-m-d H:i:s');
       
        $save_directory = "images/test_question/";

        if(isset($_FILES["q_file"]))
                $add_data['img'] = $this->save_image($_FILES["q_file"], $save_directory);
        if(isset($_FILES["hint_file"]))
                $add_data['hint_img'] = $this->save_image($_FILES["hint_file"], $save_directory);
        if(isset($_FILES["ra_file"]))
                $add_data['ra_img'] = $this->save_image($_FILES["ra_file"], $save_directory);
        if(isset($_FILES["wa_file_1"]))
                $add_data['wa_img_1'] = $this->save_image($_FILES["wa_file_1"], $save_directory);
        if(isset($_FILES["wa_file_2"]))
                $add_data['wa_img_2'] = $this->save_image($_FILES["wa_file_2"], $save_directory);
        if(isset($_FILES["wa_file_3"]))
                $add_data['wa_img_3'] = $this->save_image($_FILES["wa_file_3"], $save_directory);
        if(isset($_FILES["wa_file_4"]))
                $add_data['wa_img_4'] = $this->save_image($_FILES["wa_file_4"], $save_directory);
        if(isset($_FILES["wa_file_5"]))
                $add_data['wa_img_5'] = $this->save_image($_FILES["wa_file_5"], $save_directory);
        if(isset($_FILES["wa_file_6"]))
                $add_data['wa_img_6'] = $this->save_image($_FILES["wa_file_6"], $save_directory);
        
        //Return back to the course view page       
        if (isset($_POST['right_ans']))
                $add_data['right_ans'] = $_POST['right_ans'];
        else
                $add_data['right_ans'] = "";
                
        if (isset($_POST['hint']))
                $add_data['hint'] = "<"."p".">".$_POST['hint']."<"."/"."p".">";
        else
                $add_data['hint'] = "";
                
        if (isset($_POST['wrong_ans_db']))
                $add_data['wrong_ans_db'] = $_POST['wrong_ans_db'];

        else
                $add_data['wrong_ans_db'] = 0;
                
        if (isset($_POST['wrong_ans_test']))
                $add_data['wrong_ans_test'] = $_POST['wrong_ans_test'];
        else
                $add_data['wrong_ans_test'] = 0;
                
        if (isset($_POST['wrong_ans_1']))
                $add_data['wrong_ans_1'] = $_POST['wrong_ans_1'];
        else
                $add_data['wrong_ans_1'] = "";
                
        if (isset($_POST['wrong_ans_2']))
                $add_data['wrong_ans_2'] = $_POST['wrong_ans_2'];
        else
                $add_data['wrong_ans_2'] = "";
                
        if (isset($_POST['wrong_ans_3']))
                $add_data['wrong_ans_3'] = $_POST['wrong_ans_3'];
        else
                $add_data['wrong_ans_3'] = "";
                
        if (isset($_POST['wrong_ans_4']))
                $add_data['wrong_ans_4'] = $_POST['wrong_ans_4'];
        else
                $add_data['wrong_ans_4'] = "";
                
        if (isset($_POST['wrong_ans_5']))
                $add_data['wrong_ans_5'] = $_POST['wrong_ans_5'];
        else
                $add_data['wrong_ans_5'] = "";
                
        if (isset($_POST['wrong_ans_6']))
                $add_data['wrong_ans_6'] = $_POST['wrong_ans_6'];
        else
                $add_data['wrong_ans_6'] = "";
                
        //var_dump($add_data);
        $this->load->model("adminmodel");
        $this->adminmodel->add_test_question_complete($add_data);
        
       // $this->load->model('course_model');
        $data['success'] = "yes";
        $data['year'] = $year ;
        //$this->load->model("adminmodel");
        $data['topic'] = $this->adminmodel->get_all_topic();
        $data['title_code'] = $this->session->userdata('title_code');
        $data['code'] = $this->adminmodel->get_all_code();
        $data['current_selected'] = $add_data;
        $this->session->set_userdata($data);        
        $this->load->view('backend/question/input_test_question', $data);        
    }
        
    function save_image($file_name, $save_directory) {                  
        $allowedExts = array("gif", "jpeg", "jpg", "png", "zip", "rar", "pdf", "doc", "docx", ".deb");
        $temp = explode(".", $file_name["name"]);
        $extension = end($temp);        
        //Tuong ung giua duoi file ho tro va dang khai bao trong php
        //.deb application/octet-stream     
        if ((($file_name["type"] == "image/gif")
            || ($file_name["type"] == "image/jpeg")
            || ($file_name["type"] == "image/jpg")
            || ($file_name["type"] == "image/pjpeg")
            || ($file_name["type"] == "image/x-png")
            || ($file_name["type"] == "image/png")
            || ($file_name["type"] == "application/x-rar-compressed")
            || ($file_name["type"] == "application/x-zip-compressed")
            || ($file_name["type"] == "application/pdf")
            || ($file_name["type"] == "application/msword")
            || ($file_name["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
            || ($file_name["type"] == "application/octet-stream"))                  
            && ($file_name["size"] < 7340033)
            || ($file_name["type"] == "image/png"))   
        {
            if ($file_name["error"] > 0)
            {
                $get_data['message']['error'] = "Return Code: " . $file_name["error"] . "<br>";
            }
            else
            {    
                if (file_exists($save_directory . $file_name["name"]))
                {
                    $get_data['message']['success'] = "Tệp " . $file_name["name"] . " đã tồn tại";
                    //alert("Tep da ton tai!");
                }
                else
                {       
                    if (!file_exists($save_directory)) {
                        mkdir($save_directory, 0777, true);
                    }               
                    move_uploaded_file($file_name["tmp_name"],
                    $save_directory . $file_name["name"]);
                    $get_data['message']['success'] = "Đã lưu thành công tệp /" . $file_name["name"];               
                }
                return $file_name["name"];
            }
                
        }
        else
        {
            $get_data['message']['error'] = "Không hỗ trợ tải lên tệp định dạng " .$file_name["type"] . "";         
        }
        return null;
    }
    function view_test_question_table() {
        $this->load->model('adminmodel');
        $add_data['user'] = $this->session->all_userdata();
        if(isset($add_data['user']['admin']['id_user'])) {       
                        $this->load->library('grocery_CRUD');   
            try{
                $crud = new grocery_CRUD(); 
                $crud->set_theme('datatables');
                $table_name = "question_test";
                $crud->set_table($table_name);              
                
                $crud->set_subject("Quản lý bảng câu hỏi");
                
                $crud->required_fields('id');
                //$crud->where('lecture_id', $lecture_id); //Limit the result with condition lecture_id = $lecture_id
                $crud->unset_add();
                $crud->columns(
                    'id',
                                        'id_code',
                                        'year',
                                        'lang',
                                        'id_topic',
                                        'part',
                                        'question_order',
                    'level',
                                        'mark',
                                        'time_test',
                    'type', 
                    'content',
                    'img',
                    // 'hint',
                    // 'hint_img',
                                        'order_right_ans',
                    'right_ans',
                    'ra_img',
                    'wrong_ans_db',
                    'wrong_ans_test',
                    'wrong_ans_1',
                    'wa_img_1',
                    'wrong_ans_2',
                    'wa_img_2',
                    'wrong_ans_3',
                    'wa_img_3',
                    'wrong_ans_4',
                    'wa_img_4',
                    'wrong_ans_5',
                    'wa_img_5',
                    'wrong_ans_6',
                    'wa_img_6',
                                        'hint',
                                        'hint_img',
                                        'full_key',
                                        'full_key_img',
                                        'time');
                $crud->fields(
                                        'id_code',
                                        'year',
                                        'lang',
                                        'id_topic',
                                        'part',
                                        'question_order',
                    'level',
                                        'mark','time_test',
                    'type', 
                    'content',
                    'img',
                    // 'hint',
                    // 'hint_img',
                                        'order_right_ans',
                    'right_ans',
                    'ra_img',
                    'wrong_ans_db',
                    'wrong_ans_test',
                    'wrong_ans_1',
                    'wa_img_1',
                    'wrong_ans_2',
                    'wa_img_2',
                    'wrong_ans_3',
                    'wa_img_3',
                    'wrong_ans_4',
                    'wa_img_4',
                    'wrong_ans_5',
                    'wa_img_5',
                    'wrong_ans_6',
                    'wa_img_6',
                                        'hint',
                                        'hint_img',
                                        'full_key',
                                        'full_key_img');
                $crud->
                    display_as('id', 'mã CH')->
                    display_as('id_code', 'Lớp')->
                                        display_as('year', 'năm thi')->
                                        display_as('lang', 'ngôn ngữ')->
                                        display_as('id_topic', 'chuyên đề')->
                                        display_as('part', 'Phần')->
                                        display_as('question_order', 'câu số')->
                    display_as('level', 'mức độ')->
                                        display_as('mark', 'số điểm')->
                                        display_as('time_test', 'Thời gian làm câu hỏi(giây)')->
                    display_as('type', 'loại')-> 
                    display_as('content', 'nội dung câu hỏi')->
                    display_as('img', 'ảnh CH')->
                    display_as('right_ans','đáp án đúng')->
                    display_as('ra_img', 'ảnh ĐA')->
                                        display_as('order_right_ans', 'TT &#272;A&#272;')->
                    // display_as('hint','gợi ý')->
                    // display_as('hint_img', 'ảnh GY')->
                    display_as('wrong_ans_db','sđas csdl')->
                    display_as('wrong_ans_test','sđas test')->
                    display_as('wrong_ans_1', 'đas 1')->
                    display_as('wa_img_1', 'ảnh đas 1')->
                    display_as('wrong_ans_2', 'đas 2')->
                    display_as('wa_img_2', 'ảnh đas 2')->
                    display_as('wrong_ans_3', 'đas 3')->
                    display_as('wa_img_3', 'ảnh đas 3')->
                    display_as('wrong_ans_4', 'đas 4')->
                    display_as('wa_img_4', 'ảnh đas 4')->
                    display_as('wrong_ans_5', 'đas 5')->
                    display_as('wa_img_5', 'ảnh đas 5')->
                    display_as('wrong_ans_6', 'đas 6')->
                    display_as('wa_img_6', 'ảnh đas 6')->
                                        display_as('hint', 'gợi ý')->
                                        display_as('hint_img', 'ảnh gợi ý')->
                                        display_as('full_key', 'đáp án đầy đủ')->
                                        display_as('full_key_img', 'ảnh đáp án đầy đủ')->
                                        display_as('time', 'thời gian thêm');         
                
                //callback
                $crud->set_field_upload('img','images/test_question/');
                $crud->set_field_upload('ra_img','images/test_question/');
                $crud->set_field_upload('hint_img','images/test_question/');
                $crud->set_field_upload('wa_img_1','images/test_question/');
                $crud->set_field_upload('wa_img_2','images/test_question/');
                $crud->set_field_upload('wa_img_3','images/test_question/');
                $crud->set_field_upload('wa_img_4','images/test_question/');
                $crud->set_field_upload('wa_img_5','images/test_question/');
                $crud->set_field_upload('wa_img_6','images/test_question/');
                $crud->field_type('level', 'dropdown', array('','0'=>'dễ', '1'=>'trung bình', '2'=>'nâng cao'));
                $crud->field_type('type', 'dropdown', array('','0'=>'nhập đáp án', '1'=>'trắc nghiệm'));               
                //them 041016
                $crud->field_type('lang', 'dropdown', array('','vi'=>'Tiếng Việt', 'en'=>'English'));                  
                //end-1
                 $crud->field_type('part', 'dropdown', array('A'=>'A','B'=>'B','C'=>'C'));
                 //them 041016
                $order=array();
                for ($i=1; $i<=40 ; $i++) { 
                    $order[$i] = $i;
                }
                 $crud->field_type('question_order', 'dropdown', $order);
                //end-2                
                                $code_test = $this->adminmodel->get_all_code();
                $array_1 = null;
                for ($i = 0; $i < sizeof($code_test); $i++) {
                    $array_1[$code_test[$i]['id']] = $code_test[$i]['title'];
                }
                $crud->field_type('id_code', 'dropdown', $array_1);
                //them ngay 041016
                $crud->callback_add_field('id_topic',array($this,'add_topic_field'));
                $crud->callback_edit_field('id_topic',array($this,'edit_topic_field'));
                //end-1
                //them ngay 041016
                $crud->callback_column('id_topic',array($this,'topic_show'));
                $crud->callback_before_insert(array($this,'set_topic'));
                $crud->callback_before_update(array($this,'set_topic'));
                //end-2
                $output = $crud->render();              
                $this->_example_output($output);
                
            }catch(Exception $e){
                show_error(
                    $e->getMessage().
                    ' --- '.
                    $e->getTraceAsString());
            }
        }
        else{
            redirect("admin/loginadmin");
        }
    }
    //them ngay 041016
     function set_topic($post_array){
        $temp = $post_array['id_topic'];
        $val_topic= implode(',', $temp);
        
        $post_array['id_topic'] = $val_topic;
        //var_dump($post_array);
        //$post_array['id_topic'] =$temp;
        return $post_array;
    }
    public function topic_show($value, $row)
    {
      $this->load->model('adminmodel');
      $topics = array();
      $m=0;
      $list_topic = $this->adminmodel->get_more_topic($value);
      foreach ($list_topic as $key => $val) {
         $topics[$m] = $val['name'];
         $m++;
      }
      $result = implode(",",$topics);
      return $result;
    }
    //end-3
    function add_topic_field(){
      $this->load->model('adminmodel');           
      $topic_test= $this->adminmodel->get_all_topic();
      //var_dump($topic_test_add);
        $textchange ='<link href="'.base_url().'css/multiple-select.css" rel="stylesheet"/>
        <script src="'.base_url().'js/multiple-select.js"></script>

        <select id="field-id_topic" multiple="multiple" name="id_topic[]" class="chosen-select chzn-done" data-placeholder="Chọn Chuyên đề">';
        foreach ($topic_test as $key => $topic) {
             $textchange .= '<option value="'.$topic['id'].'">'.$topic['name'].'</option>';
        }
        $textchange .='</select>'.
        '<script>
            $("#field-id_topic").multipleSelect({
                filter: true,
                
            });
        </script>
        <style>
        .ms-parent{
          min-width: 200px;
        }
        .ms-choice{
          font-size: 11pt;
          background-image: -webkit-linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
          background-image: -moz-linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
          background-image: -o-linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
          background-image: -ms-linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
          background-image: linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
        }
        </style>';
        return $textchange;
    }
    function edit_topic_field($value, $primary_key){
      $this->load->model('adminmodel'); 
      $topic_test = $this->adminmodel->get_all_topic();
      $list_topic = explode(",", $value);
      $textchange ='<link href="'.base_url().'css/multiple-select.css" rel="stylesheet"/>
      <script src="'.base_url().'js/multiple-select.js"></script>

      <select id="field-id_topic" multiple="multiple" name="id_topic[]" class="chosen-select chzn-done" data-placeholder="Chọn Chuyên đề">';
      foreach ($topic_test as $key => $topic) {
           $textchange .= '<option value="'.$topic['id'].'" '.(in_array($topic['id'] , $list_topic) ? 'selected="selected"':'').'>'.$topic['name'].'</option>';
      }
      $textchange .='</select>'.
      '<script>
          $("#field-id_topic").multipleSelect({
              filter: true,
              
          });
      </script>
      <style>
      .ms-parent{
        min-width: 200px;
      }
      .ms-choice{
        font-size: 11pt;
        background-image: -webkit-linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
        background-image: -moz-linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
        background-image: -o-linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
        background-image: -ms-linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
        background-image: linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
      }
      </style>';
      return $textchange;
  }
  //end-4
        function change_pass() {
        $this->load->library('session');
         $this->load->model('adminmodel');
        $user['user'] = $this->session->all_userdata();
        //echo $user['user']['email'];
        if(isset($user['user']['admin']['id_user'])){
            $this->load->view("backend/changepass_admin", $user);
        }else 
            redirect("admin/loginadmin");
        
        
    }
       function save_new_pass(){
        $this->load->library('session');
        $this->load->model('adminmodel');
        $user['user'] = $this->session->all_userdata();
        if(isset($user['user']['admin']['id_user'])){
            $data['email']= $user['user']['admin']['email'];
            $data['new_pass']= $_POST['newpass'];
            $new_pass= sha1($data['new_pass']);
            $this->adminmodel->changepass($data['email'],$new_pass);
            redirect("index.php/admin/system_argument_management");
        }else
            redirect("admin/loginadmin");

    }
    public function img_slide(){
        try {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('img_slide');
            $crud->set_subject("Ảnh Slide");
            $crud->required_fields('id');
            //$crud->unset_add();
            $crud->edit_fields('img_link','status');
            $crud->columns('img_link','status');
          
            $crud->display_as('img_link','Tên ảnh')
                ->display_as('status','Trạng thái');
            $crud->set_field_upload('img_link','img/run_slide');
            $crud->field_type('status', 'dropdown', array('0'=>'Hiện', '1'=>'Ẩn'));
            $output = $crud->render();
            $this->_example_output($output);
            
        } catch(Exception $e){
            show_error(
                $e->getMessage().
                ' --- '.
                $e->getTraceAsString());
        }

    }
     function show_practice_results(){

        $this->load->library('session');
        $this->load->model('adminmodel');
        $user['user'] = $this->session->all_userdata();
        if(isset($user['user']['admin']['id_user'])){
            $data = $this->getinfopractice();
            for($i = 0; $i < sizeof($data);$i++){
                $array['user'][$i]['fullname'] = $data[$i]['fullname'];
                $array['user'][$i]['nickname'] = $data[$i]['nickname'];
                $array['user'][$i]['email'] = $data[$i]['email'];
                $array['user'][$i]['times'] = $data[$i]['times'];
                $array['user'][$i]['point'] = $data[$i]['point_average'];
                $array['user'][$i]['5_recent_results'] =  $data[$i]['point_average'] == 0 ? '0' : implode(',', $data[$i]['points']);
                 
            }
            $this->load->view("backend/practiceresult",$array);
        }else
            redirect("admin/loginadmin");
    }
    function getinfopractice(){
        
        $this->load->library('session');
        $this->load->model('adminmodel');
        $user['user'] = $this->session->all_userdata();
        // $arr = new array();
        // $temp = new array();
        
        if(isset($user['user']['admin']['id_user'])){
           $data = $this->adminmodel->getinfopractice();
           //var_dump( sizeof($data));
           for($i = 0; $i < sizeof($data); $i++){
                $j = 0; $k = 0;
                $temp = null;
                $point = 0;
                $times = 0;
                if($data[$i]['history_practice'] != null && isset($data[$i]['history_practice'])){
                    $arr[$i] = explode(';',$data[$i]['history_practice']);
                   // if($i == 2488){
                   //       var_dump(sizeof($arr[$i]));
                   // }
                    for($j = 0 ; $j< sizeof($arr[$i])-1;$j++){
                        $temp[$j] = explode(',',$arr[$i][$j]);
                    }
                  // if($i == 2488){
                  //        var_dump($temp);
                  //  }
                    
                    for($k = 0 ; $k < sizeof($temp); $k++){
                         $arr[$i]['point'][$k] = isset($temp[$k][2]) ? $temp[$k][2] : 0;
                         $point += $arr[$i]['point'][$k];
                         $times += 1;
                    }
                    $m = sizeof($temp)-1;
                    $a = ($m < 4) ? $m : 4;
                    for($n = $a; $n >= 0; $n--){
                        $arr[$i]['points'][$n] = $arr[$i]['point'][$m];
                        $m -= 1;
                    }

                    $arr[$i]['times'] = $times;
                }else{
                     
                        $arr[$i]['point'] = 0;
                        $point += $arr[$i]['point'];
                        $arr[$i]['times'] = 0;
                    
                }

                $arr[$i]['point_average']  = $arr[$i]['times'] != 0 ? round($point/$arr[$i]['times'],2) : 0;
                $arr[$i]['fullname'] = $data[$i]['fullname'];
                $arr[$i]['nickname'] = $data[$i]['nickname'];
                $arr[$i]['email'] = $data[$i]['email'];

           }

           //var_dump($data[2488]['history_practice']);
           //var_dump($arr[2488]['points'] .'-'.$data[2488]['id'].'-'.$data[2488]['history_practice']);
           return $arr;
        }else
            redirect("admin/loginadmin");
    }
    function new_argument(){

        $this->load->library('session');
        $this->load->model('adminmodel');
        $user['user'] = $this->session->all_userdata();
        // $arr = new array();
        // $temp = new array();
        
        if(isset($user['user']['admin']['id_user'])){
        try {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('new_argument');
            $crud->set_subject("Quản lý tham số mới");
            $crud->required_fields('id');
            // $crud->unset_edit();
            $crud->unset_add();

             $crud->unset_delete();
           
            $crud->edit_fields('img_banner','vi_register_school', 'en_register_school', 'vi_register_ieg','en_register_ieg', 'vi_register_online',
                                'en_register_online','vi_introduce_competition','en_introduce_competition','vi_introduce_competition_international',
                                'en_introduce_competition_international', 'vi_summer_camp','en_summer_camp', 'file_pdf',
                                'vi_faqs','en_faqs','link_facebook','link_youtube');
            $crud->columns('img_banner','vi_register_school', 'en_register_school', 'vi_register_ieg','en_register_ieg', 'vi_register_online',
                                'en_register_online','vi_introduce_competition','en_introduce_competition','vi_introduce_competition_international',
                                'en_introduce_competition_international', 'vi_summer_camp','en_summer_camp', 'file_pdf',
                                'vi_faqs','en_faqs','link_facebook','link_youtube');
            
            $crud->display_as('img_banner','Image Banner')
                ->display_as('vi_register_school', 'Register School (Vietnamese)')
                ->display_as('en_register_school', 'Register School (English)')
                ->display_as('vi_register_ieg', 'Register ieg (Vietnamese)')
                ->display_as('en_register_ieg','Register ieg (English)')
                ->display_as('vi_register_online', 'Register online (Vietnamese)')
                ->display_as('en_register_online','Register online (English)')
                ->display_as('vi_introduce_competition', 'Introduce Competition(Vietnamese)')
                ->display_as('en_introduce_competition','Introduce Competition(English)')
                ->display_as('vi_introduce_competition_international', 'Introduce Competition International(Vietnamese)')
                ->display_as('en_introduce_competition_international','Introduce Competition International(English)')
                ->display_as('vi_summer_camp', 'Summer Camp (Vietnamese)')
                ->display_as('en_summer_camp','Summer Camp (English)')
                ->display_as('file_pdf', 'File quy định phòng thi')
                ->display_as('vi_faqs', 'FAQs(Vietnamese)')
                ->display_as('en_faqs', 'FAQs(English)')
                ->display_as('link_facebook', 'Link facebook đầu trang')
                ->display_as('link_youtube', 'Link youtube đầu trang');
            //$crud->field_type("contact", "text");
            $crud->set_field_upload('file_pdf','uploadfile/');
            $crud->set_field_upload('img_banner','img/');
            $output = $crud->render();
            $this->_example_output($output);
            
        } catch(Exception $e){
            show_error(
                $e->getMessage().
                ' --- '.
                $e->getTraceAsString());
        }
         }else
            redirect("admin/loginadmin");
    }

    
    function student_register_online(){
         $this->load->library('session');
        $this->load->model('adminmodel');
        $user['user'] = $this->session->all_userdata();
        // $arr = new array();
        // $temp = new array();
        
        if(isset($user['user']['admin']['id_user'])){
        try {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('student_register_online');
            $crud->set_subject("Danh sách đăng ký online");
            $crud->required_fields('id');
            $crud->where('type_register','1');
             $crud->unset_edit();
             $crud->unset_delete();
             $crud->unset_add();
           
            $crud->columns('parent_name', 'student_name', 'address','school_name', 'phone',
                                'email', 'times_register');
            
            $crud->display_as('parrent_name', 'Tên Phụ huynh')
                ->display_as('student_name', 'Tên Học sinh')
                ->display_as('address', 'Địa chỉ')
                ->display_as('school_name','Trường học')
                ->display_as('phone', 'Số ĐT')
                ->display_as('email','Email')
                ->display_as('times_register','Thời gian đăng ký');
                
                
          
            $output = $crud->render();
            $this->_example_output($output);
            
        } catch(Exception $e){
            show_error(
                $e->getMessage().
                ' --- '.
                $e->getTraceAsString());
        }
         }else
            redirect("admin/loginadmin");
    }
    function student_register_ieg(){
         $this->load->library('session');
        $this->load->model('adminmodel');
        $user['user'] = $this->session->all_userdata();
        // $arr = new array();
        // $temp = new array();
        
        if(isset($user['user']['admin']['id_user'])){
        try {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('student_register_online');
            $crud->set_subject("Danh sách đăng ký online");
            $crud->required_fields('id');
            $crud->where('type_register','2');
             $crud->unset_edit();
             $crud->unset_delete();
             $crud->unset_add();
           
            $crud->columns('parent_name', 'student_name', 'address','school_name', 'phone',
                                'email', 'times_register');
            
            $crud->display_as('parrent_name', 'Tên Phụ huynh')
                ->display_as('student_name', 'Tên Học sinh')
                ->display_as('address', 'Địa chỉ')
                ->display_as('school_name','Trường học')
                ->display_as('phone', 'Số ĐT')
                ->display_as('email','Email')
                ->display_as('times_register','Thời gian đăng ký');
                
                
          
            $output = $crud->render();
            $this->_example_output($output);
            
        } catch(Exception $e){
            show_error(
                $e->getMessage().
                ' --- '.
                $e->getTraceAsString());
        }
         }else
            redirect("admin/loginadmin");
    }
    function require_user(){
         $this->load->library('session');
        $this->load->model('adminmodel');
        $user['user'] = $this->session->all_userdata();
        // $arr = new array();
        // $temp = new array();
        
        if(isset($user['user']['admin']['id_user'])){
        try {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('require_user');
            $crud->set_subject("Bảng yêu cầu từ người dùng");
            $crud->required_fields('id');
             $crud->unset_edit();
             $crud->unset_delete();
             $crud->unset_add();
           
            $crud->columns('fullname', 'email', 'phone','content', 'times_send');
            
            $crud->display_as('fullname', 'Người gửi yêu cầu')
                ->display_as('email', 'Email')
                ->display_as('phone', 'Số ĐT')
                ->display_as('content','Nội dung')
                ->display_as('times_send','Thời gian gửi');
          
            $output = $crud->render();
            $this->_example_output($output);
            
        } catch(Exception $e){
            show_error(
                $e->getMessage().
                ' --- '.
                $e->getTraceAsString());
        }
         }else
            redirect("admin/loginadmin");
    }
    function organizers_donors(){
         $this->load->library('session');
        $this->load->model('adminmodel');
        $user['user'] = $this->session->all_userdata();
        // $arr = new array();
        // $temp = new array();
        
        if(isset($user['user']['admin']['id_user'])){
        try {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('organizers_donors');
            $crud->set_subject("Ban tổ chức/tài trợ");
            $crud->required_fields('id');
           
            $crud->columns('type', 'logo');
            
            $crud->display_as('type', 'Đơn vị')
                ->display_as('logo', 'Logo');
            if(!file_exists('img/organizers_donors/')){
                mkdir('img/organizers_donors/', 0777, true);
            }
            $crud->set_field_upload('logo','img/organizers_donors/');
            $crud->field_type('type', 'dropdown',array('1'=>'Tổ chức','2'=>'Tài trợ'));
            $output = $crud->render();
            $this->_example_output($output);
            
        } catch(Exception $e){
            show_error(
                $e->getMessage().
                ' --- '.
                $e->getTraceAsString());
        }
         }else
            redirect("admin/loginadmin");
    }
    function notice_boards(){
        $this->load->library('session');
        $this->load->model('adminmodel');
        $user['user'] = $this->session->all_userdata();
        // $arr = new array();
        // $temp = new array();
        if(isset($user['user']['admin']['id_user'])){
        try {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('notice_boards');
            $crud->set_subject("Thông báo");
            $crud->required_fields('id');
            $crud->edit_fields('vi_title', 'en_title', 'vi_content_short', 'vi_content_full', 'en_content_short', 'en_content_full', 'status');
            $crud->add_fields('vi_title', 'en_title', 'vi_content_short', 'vi_content_full', 'en_content_short', 'en_content_full', 'status');
            $crud->columns('vi_title', 'en_title', 'vi_content_short', 'vi_content_full', 'en_content_short', 'en_content_full', 'status');
            $crud->display_as('vi_title', 'Tiêu đề (Tiếng Việt)')
                ->display_as('en_title', 'Tiêu đề (Tiếng Anh)')
                ->display_as('vi_content_short', 'Nội dung tóm tắt (Tiếng Việt)' )
                ->display_as('en_content_short','Nội dung tóm tắt (Tiếng Anh)')
                ->display_as('vi_content_full','Nội dung đầy đủ (Tiếng Việt)')
                ->display_as('en_content_full','Nội dung đầy đủ (Tiếng Anh)')
                ->display_as('status','Trạng thái');
            $crud->field_type('status', 'dropdown',array('1'=>'Hiện','2'=>'Ẩn'));   
            $output = $crud->render();
            $this->_example_output($output);
            
        } catch(Exception $e){
            show_error(
                $e->getMessage().
                ' --- '.
                $e->getTraceAsString());
        }
         }else
            redirect("admin/loginadmin");
    }
    function news_management(){
        $this->load->library('session');
        $this->load->model('adminmodel');
        $user['user'] = $this->session->all_userdata();
        // $arr = new array();
        // $temp = new array();
        if(isset($user['user']['admin']['id_user'])){
        try {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('newspapers_information');
            $crud->set_subject("Góc báo chí - tin tức");
            $crud->required_fields('id', 'vi_title', 'en_title', 'img', 'vi_content_short', 'en_content_short', 'vi_content', 'en_content', 'order', 'status', 'type');
            $crud->edit_fields('vi_title', 'en_title', 'img', 'vi_content_short', 'en_content_short', 'vi_content', 'en_content', 'order', 'status', 'type');
            $crud->add_fields('vi_title', 'en_title', 'img', 'vi_content_short', 'en_content_short', 'vi_content', 'en_content', 'order', 'status', 'type');
            $crud->columns('vi_title', 'en_title', 'img', 'vi_content_short', 'en_content_short', 'vi_content', 'en_content', 'order', 'status', 'type');
            $crud->display_as('vi_title', 'Tiêu đề (Tiếng Việt)')
                ->display_as('en_title', 'Tiêu đề (Tiếng Anh)')
                ->display_as('img', 'Ảnh đại diện bài viết')
                ->display_as('vi_content_short', 'Nội dung tóm tắt (Tiếng Việt)' )
                ->display_as('en_content_short','Nội dung tóm tắt (Tiếng Anh)')
                ->display_as('vi_content','Nội dung đầy đủ (Tiếng Việt)')
                ->display_as('en_content','Nội dung đầy đủ (Tiếng Anh)')
                ->display_as('order','Thứ tự ưu tiên')
                ->display_as('status','Trạng thái')
                ->display_as('type','Loại tin bài');
            $crud->field_type('status', 'dropdown',array('1'=>'Hiện','2'=>'Ẩn'));   
            $crud->field_type('type', 'dropdown',array('1'=>'Góc báo chí','2'=>'Góc tin tức'));   
            $crud->set_field_upload('img','img/newspapers_information/');
            $output = $crud->render();
            $this->_example_output($output);
            
        } catch(Exception $e){
            show_error(
                $e->getMessage().
                ' --- '.
                $e->getTraceAsString());
        }
         }else
            redirect("admin/loginadmin");
    }
    //05/10/16: Quản lý các level của thử thách
    function management_level_challenge(){
        $this->load->library('session');
        $this->load->model('adminmodel');
        $user['user'] = $this->session->all_userdata();
        // $arr = new array();
        // $temp = new array();
        if(isset($user['user']['admin']['id_user'])){
        try {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('level_challenge');
            $crud->set_subject("Quản lý level của thử thách");
            $crud->required_fields('id', 'level_user','level_challenge', 'num_easy', 'num_medium', 'num_hard');
            $crud->edit_fields( 'level_user','level_challenge', 'num_easy', 'num_medium', 'num_hard');
            $crud->add_fields( 'level_user','level_challenge', 'num_easy', 'num_medium', 'num_hard');
            $crud->columns('id', 'level_user','level_challenge', 'num_easy', 'num_medium', 'num_hard');

            $crud->display_as('id', 'Mã level')
                ->display_as('level_user', 'Khối lớp')
                ->display_as('level_challenge', 'Level')
                ->display_as('num_easy', 'Số câu dễ')
                ->display_as('num_medium', 'Số câu trung bình' )
                ->display_as('num_hard','Số câu  khó');
            $crud->field_type('level_user', 'dropdown', array('1'=>'Lớp 1-2', '2'=>'Lớp 3-4','3'=> 'Lớp 5-6'));
            $output = $crud->render();
            $this->_example_output($output);
            
        } catch(Exception $e){
            show_error(
                $e->getMessage().
                ' --- '.
                $e->getTraceAsString());
        }
         }else
            redirect("admin/loginadmin");
    }
    //end 051016
    //12/10/16: Quản lý câu hỏi bài thi tự chọn
    
    function management_questions_optional(){
        $this->load->model(array('competition_model','adminmodel'));
        $add_data['user'] = $this->session->all_userdata();
        if(isset($add_data['user']['admin']['id_user'])) {       
            $this->load->library('grocery_CRUD');   
            try{
                $crud = new grocery_CRUD();
                $crud->set_theme('datatables');
                $crud->set_table('questions_optional');
                $crud->set_subject("Quản lý câu hỏi bài thi tự chọn");
                $crud->required_fields('id','lang','id_topic','level','part','mark','time_test','content','right_ans','wrong_ans_1','wrong_ans_2','wrong_ans_3','wrong_ans_4');
                $crud->edit_fields('lang','id_topic','level','part','mark','time_test','content','right_ans','wrong_ans_1','wrong_ans_2','wrong_ans_3','wrong_ans_4','hint');
                $crud->add_fields('lang','id_topic','level','part','mark','time_test','content','right_ans','wrong_ans_1','wrong_ans_2','wrong_ans_3','wrong_ans_4','hint');
                $crud->columns('id','lang','id_topic','level','part','mark','time_test','content','right_ans','wrong_ans_1','wrong_ans_2','wrong_ans_3','wrong_ans_4','hint','time');
                $crud->
                    display_as('id', 'Mã câu hỏi')->
                    display_as('lang', 'Ngôn ngữ')->
                    display_as('id_topic', 'Chuyên đề')->
                    display_as('part', 'Phần')->
                    display_as('level', 'Khối lớp')->
                    display_as('mark', 'Số điểm')->
                    display_as('time_test', 'Thời gian làm của câu hỏi(giây)')->
                    display_as('content', 'Nội dung câu hỏi')->
                    display_as('right_ans','Đáp án đúng')->
                    display_as('wrong_ans_1', 'ĐA sai 1')->
                    display_as('wrong_ans_2', 'ĐA sai 2')->
                    display_as('wrong_ans_3', 'ĐA sai 3')->
                    display_as('wrong_ans_4', 'ĐA sai 4')->
                    display_as('hint', 'Gợi ý')->
                    display_as('time', 'Thời gian thêm câu hỏi');         
                
                //callback
                
                $crud->field_type('level', 'dropdown', array('1'=>'Lớp 1-2', '2'=>'Lớp 3-4','3'=> 'Lớp 5-6','4'=> 'Lớp 7-8'));
                $crud->field_type('part', 'dropdown', array('A'=>'A','B'=>'B','C'=>'C'));
                $crud->field_type('lang', 'dropdown', array('vi'=>'Tiếng Việt','en'=>'English'));
                $crud->field_type('order_right_ans', 'dropdown', array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5')); 
                //thay doi ngay 031016            
                $crud->callback_add_field('id_topic',array($this,'add_topic_field'));
                $crud->callback_edit_field('id_topic',array($this,'edit_topic_field'));
                //end-1
                $crud->callback_add_field('mark',array($this,'change_mark_add'));
                $crud->callback_edit_field('mark',array($this,'change_mark_edit'));
                //them ngay 031016
                $crud->callback_column('id_topic',array($this,'topic_show'));
                $crud->callback_before_insert(array($this,'set_topic'));
                $crud->callback_before_update(array($this,'set_topic'));
                //end-2
                $output = $crud->render();              
                $this->_example_output_optinal($output);
                
            }catch(Exception $e){
                show_error(
                    $e->getMessage().
                    ' --- '.
                    $e->getTraceAsString());
            }
        }
        else{
            redirect("admin/loginadmin");
        }
    }
    function change_mark_add(){
        $str = $this->str_change_mark_field();
        return  $str.'<input id="field-mark" name="mark" type="text" value="3" class="numeric" maxlength="3">';
    }
    function change_mark_edit($value, $primary_key){
        $str = $this->str_change_mark_field();
        return  $str.'<input id="field-mark" name="mark" type="text" value="'.$value.'" class="numeric" maxlength="3">';
    }
    function str_change_mark_field(){
        $str='<style type="text/css">
                #check_input #content_input .latex{
                      clear: none;        
                      float: none;        
                      display: inline;
                      position: relative;
                  }
                  
                  #check_input #content_input .latex_newline{
                      clear: both;        
                      float: none;
                      text-align: center;
                      position: relative;

                  }
                  #check_input {
                      width: 23%;
                      height: 20em;
                      float: right;
                      position: fixed;
                      border-radius: 5px;
                      bottom: 0;
                      right:0;
                      padding: 1em;
                      background: #dfdfea;
                      opacity: 0.8;
                      z-index: 1100;
                     
                      color: #000;
                      font-weight: 650;
                      font-family: "Open Sans",Verdana,Geneva,sans-serif;
                      font-size: 11pt;
                  }

                  #check_input:hover {
                      opacity: 1.0;
                  }

                  #check_input header {
                      background: none;
                      width: 100%;
                      height: 1.5em;
                      margin-bottom: 0.8em;
                      margin-top: 0em;
                      padding: none;
                      border: none;
                      text-align: center;
                      text-shadow: 0px 1px rgba(255, 255, 255, 0.4);
                      color: #333;
                      font-weight: 850;
                      font-family: Georgia,Cambria,"Times New Roman",Times,serif;
                      font-size: 1.3em;
                  }

                  </style>
        <script type="text/javascript">
            function check_input(value) {
                var check = document.getElementById("content_input");
                value = value.replace("<pre>","").replace("</pre>","");
                value = value.replace("&lt;","\<").replace("&gt;","\>");
                check.innerHTML = "" + value;
                MathJax.Hub.Queue(["Typeset",MathJax.Hub,"content_input"]);
           }'."
           $(document).ready(function(){                        
               CKEDITOR.instances['field-content'].on('change', function () {
                 check_input(CKEDITOR.instances['field-content'].getData());
                });
                CKEDITOR.instances['field-content'].on('focus', function () {
                  check_input(CKEDITOR.instances['field-content'].getData());
                });
                 CKEDITOR.instances['field-right_ans'].on('change', function () {
                  check_input(CKEDITOR.instances['field-right_ans'].getData());
                });
                CKEDITOR.instances['field-right_ans'].on('focus', function () {
                  check_input(CKEDITOR.instances['field-right_ans'].getData());
                });
                //wrong_ans_1
                CKEDITOR.instances['field-wrong_ans_1'].on('change', function () {
                  check_input(CKEDITOR.instances['field-wrong_ans_1'].getData());
                });
                CKEDITOR.instances['field-wrong_ans_1'].on('focus', function () {
                  check_input(CKEDITOR.instances['field-wrong_ans_1'].getData());
                });
                //wrong_ans_2
                CKEDITOR.instances['field-wrong_ans_2'].on('change', function () {
                  check_input(CKEDITOR.instances['field-wrong_ans_2'].getData());
                });
                CKEDITOR.instances['field-wrong_ans_2'].on('focus', function () {
                  check_input(CKEDITOR.instances['field-wrong_ans_2'].getData());
                });
                //wrong_ans_3
                CKEDITOR.instances['field-wrong_ans_3'].on('change', function () {
                  check_input(CKEDITOR.instances['field-wrong_ans_3'].getData());
                });
                CKEDITOR.instances['field-wrong_ans_3'].on('focus', function () {
                  check_input(CKEDITOR.instances['field-wrong_ans_3'].getData());
                });
                //wrong_ans_4
                CKEDITOR.instances['field-wrong_ans_4'].on('change', function () {
                  check_input(CKEDITOR.instances['field-wrong_ans_4'].getData());
                });
                CKEDITOR.instances['field-wrong_ans_4'].on('focus', function () {
                  check_input(CKEDITOR.instances['field-wrong_ans_4'].getData());
                });
            });
        </script>".'
       <div id="check_input">
          <header id = "head_show">Xem lại nội dung<hr/></header>
          <div id="content_input" style="padding-top: 20px; overflow-y:auto; max-height: 220px; ">
           
          </div>
        </div>';
         return $str;               
    }
    //end
}

?>
