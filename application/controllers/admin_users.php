<?php
class Admin_users extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    
    $this->load->model(array("Admin_users_model","user_model","ikmc_model","practice_model"));
    $this->load->library('pagination');
  }
  
  function checksession(){
      $add_data['user'] = $this->session->all_userdata();
      if(count($add_data['user']) > 0 && isset($add_data['user']['admin'])){
          return true;
      }else {
          redirect("admin/loginadmin");
      }
  }
 public function index($offset=0){
  // $this->checksession();
  $config['total_rows'] = $this->Admin_users_model->totalUser();
  
  $config['base_url'] = base_url()."mng_user";
  $config['per_page'] = 20;
  $config['uri_segment'] = '2';

  $config['full_tag_open'] = '<div class="pagination"><ul class="pagination">';
  $config['full_tag_close'] = '</ul></div>';

  $config['first_link'] = '« First';
  $config['first_tag_open'] = '<li class="prev page">';
  $config['first_tag_close'] = '</li>';

  $config['last_link'] = 'Last »';
  $config['last_tag_open'] = '<li class="next page">';
  $config['last_tag_close'] = '</li>';

  $config['next_link'] = 'Next →';
  $config['next_tag_open'] = '<li class="next page">';
  $config['next_tag_close'] = '</li>';

  $config['prev_link'] = '← Previous';
  $config['prev_tag_open'] = '<li class="prev page">';
  $config['prev_tag_close'] = '</li>';

  $config['cur_tag_open'] = '<li class="active"><a href="">';
  $config['cur_tag_close'] = '</a></li>';

  $config['num_tag_open'] = '<li class="page">';
  $config['num_tag_close'] = '</li>';


  $this->pagination->initialize($config);
   

  $query = $this->Admin_users_model->getUser(20,$this->uri->segment(2));
  
  $data['users'] = null;
  
  if($query){
   $data['users'] =  $query;
  }
  $data['total_rows'] = $config['total_rows'];
  $this->load->view('backend/admin_users', $data);
 }
  public function signup(){
     // $this->checksession();
     $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
      $data['list_provinces'] = $this->user_model->getProvinces();
      $this->load->view('backend/admin_users_signup',$data);
  }
    public function checkNickname(){

      if(isset($_POST['nickname'])){
        //echo $_POST['nickname'];

        $check = $this->user_model->checkNickname(strtolower(trim($_POST['nickname'])));
        if($check){
          echo "ok";
        }else{
          echo "failed";
        }
      }else{
        echo "not connected";
      }
    }

        public function ajaxGetDistrict(){
          if(isset($_POST['provinceid']))
          {
            $data = $this->user_model->getDistricts($_POST['provinceid']);
            echo json_encode($data);
            
          }
       }
    public function savesignup()
    {   
       // $this->checksession();
      $data= $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        
        if(isset($_POST['email']) && $_POST['email']!="")
        {
            $fullname = $_POST['fullname'];
            $password = $_POST['password'];
            $nickname = strtolower(trim($_POST['nickname']));
            $sha1pass = sha1(trim($password));
            $email = strtolower($_POST['email']); 
            $gender = $_POST['gender'];
            $birthday = $_POST['birthday'];
            $school = $_POST['school'];
            $level = $_POST['level'];
           // $address = $_POST['address'];
            $phone = $_POST['phone'];
            $parent = $_POST['parent'];
            $status = (int)((isset($_POST['status_user']) && ($_POST['status_user'] !="" || $_POST['status_user'] != null )) ? $_POST['status_user'] : 0);
            $provinceid = isset($_POST['province']) ? $_POST['province'] : 0;
            $districtid = isset($_POST['district']) ? $_POST['district'] : 0;
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
                // 'address'       => $address,
                'phone'         => $phone,
                'parentsname'   => $parent,
                'province_id'   => $provinceid,
                'district_id'   => $districtid,
                'level'         => $level
            );
           if($status != 0){
              $upgrade = $date;
              $data['upgrade'] = $upgrade;
              $data['exp_date'] = date('Y-m-d H:i:s',strtotime($data['upgrade'] . ' +1 year'));
            }
            $data['status'] = $status;
            $this->user_model->insertnewuser($data);
            $this->session->set_flashdata('add_user_success','Đăng ký người dùng thành công! User: '.$nickname.'. Password: '.$password );
                     
            redirect("mng_user/add-user");

        }
        else{
            //echo "a";
            redirect("mng_user/add-user");
        }
    }
    function show_box_change($id){
       // $this->checksession();
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $data['list_provinces'] = $this->user_model->getProvinces();
        $data['id'] = $id;
        $data['user_information'] = $this->practice_model->getuser($id);
       // var_dump($data['user_information']);
        $this->load->view('backend/admin_users_edit',$data);
    }
    function change_infor_user($id) {
       // $this->checksession();
        $user = $this->practice_model->getuser($id);
        $data = array();
        if($_POST['change_name'] != $user['fullname']){
             $data['fullname'] = $_POST['change_name'];
              
        }
        if($_POST['change_nickname'] != $user['nickname']){
             $data['nickname'] = $_POST['change_nickname'];
             
        }
        if(trim($_POST['new_pwd']) != "" && sha1(trim($_POST['new_pwd'])) != $user['password']){
             $data['password'] = sha1(trim($_POST['new_pwd']));
             
        }
        if($_POST['email'] != $user['email']){
             $data['email'] = $_POST['email'];
             
        }
        if($_POST['birthday'] != $user['birthday']){
             $data['birthday'] = $_POST['birthday'];
             
        }
        if($_POST['gender'] != $user['gender']){
             $data['gender'] = $_POST['gender'];
             
        }
        if($_POST['level'] != $user['level']){
             $data['level'] = $_POST['level'];
             
        }
        if($_POST['parentsname'] != $user['parentsname']){
             $data['parentsname'] = $_POST['parentsname'];
             
        }
        if($_POST['phone'] != $user['phone']){
             $data['phone'] = $_POST['phone'];
             
        }
        if($_POST['parentsname'] != $user['parentsname']){
             $data['parentsname'] = $_POST['parentsname'];
        }

        if(trim($_POST['district']) != $user['district_id'] || (int)trim($_POST['district']) != (int)$user['district_id']){
             $data['district_id'] = $_POST['district'];
             
        }
        if(trim($_POST['province']) != $user['province_id'] || (int)trim($_POST['province']) != (int)$user['province_id']){
             $data['province_id'] = $_POST['province'];
             
        }
        if((trim($_POST['status_user']) != $user['status'] || (int)trim($_POST['status_user']) != (int)$user['status'])){
        	$data['status'] = $_POST['status_user'];
        	
        	if((int)trim($_POST['status_user']) == 1){
        		date_default_timezone_set('Asia/Ho_Chi_Minh');
	            $date = date('Y-m-d H:i:s');
	            $data['upgrade'] = $date;
        		  $data['exp_date'] = date('Y-m-d H:i:s',strtotime($data['upgrade'] . ' +1 year'));
        	}else if((int)trim($_POST['status_user']) == 0){
            $data['exp_date'] = '0000-00-00 00:00:00';
          }
        }

        if($_POST['exp'] != $user['exp_date']){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            if($_POST['exp']!=""){
              $exp = explode("/", $_POST['exp']);
              $_POST['exp'] =  $exp[2].'-'.$exp[1].'-'.$exp[0];
            }
             $data['exp_date'] = $_POST['exp']=="" ? $user['exp_date'] : date_format(date_create($_POST['exp']),'Y-m-d H:i:s');
              //var_dump($_POST['exp']);die;
        }
        // var_dump($data);
       
        if(count($data) > 0){
            $this->practice_model->updateuser($id, $data);
        }
        $this->session->set_flashdata('edit-user-success','Bạn đã cập nhật thành công người dùng có ID = "'.$id.'"');
                redirect(base_url() . "mng_user");
    }
  function del_user($id){
     // $this->checksession();
    $result = $this->Admin_users_model->del_user($id);
    $this->session->set_flashdata('edit-user-success',$result == 'Y'?('Xóa thành công người dùng có ID = "'.$id.'"') : ('Xảy ra lỗi! Xóa người dùng có ID = "'.$id.'" thất bại. Vui lòng thực hiện lại.'));
     redirect(base_url() . "mng_user");
  }
  function search(){
     // $this->checksession();
      $id = $this->input->post("search_id");
      $fullname = $this->input->post("search_fullname");
      $nickname = $this->input->post("search_nickname");
      $level = $this->input->post("search_level");
      $email = $this->input->post("search_email");
      $data= array();
      if($id != ""){
        $data['id'] = $id;
      }
      if($fullname != ""){
        $data['fullname'] =  mysql_real_escape_string($fullname);
      }
      if($nickname != ""){
        $data['nickname'] =  mysql_real_escape_string($nickname);
      }
      if($level != ""){
        $data['level'] =  mysql_real_escape_string($level);
      }
      if($email != ""){
        $data['email'] =  mysql_real_escape_string($email);
      }
      if(count($data)>0){
        
        $config['total_rows'] = $this->Admin_users_model->countSearchUser($data);
        
        $config['base_url'] = base_url()."mng_user/search/";
        $config['per_page'] = $config['total_rows'];
        $config['uri_segment'] = '2';
        $this->pagination->initialize($config);
        $query = $this->Admin_users_model->searchUser($data);        
        $data['users'] = null;        
        if($query){
         $data['users'] =  $query;
        }
        $data['total_rows'] = $config['total_rows'];
        $this->load->view('backend/admin_users', $data);
      }else{
          $this->session->set_flashdata('edit-user-success','Vui lòng điền những giá trị bạn muốn tìm! ');
          redirect("mng_user");
      }
      
  }
  function getOneUser($id){
      $query = $this->Admin_users_model->getOneUser($id);  
      var_dump($query);
         
  }
  function getUser_1(){
      $query = $this->Admin_users_model->getUser_1();  
      echo "<pre>";
      var_dump($query);
      echo "</pre>";
         
  }
  function updaet_user_before_20_09(){
      $query = $this->Admin_users_model->updaet_user_before_20_09();  
      
         
  }
  
}
?>