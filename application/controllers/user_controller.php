<?php
class User_controller extends CI_Controller
{
    
    //Ham dung
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array("user_model","ikmc_model","practice_model"));
        $this->load->library('session');
    }
    public function signup(){
	
    	 $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $data['list_donors'] = $this->ikmc_model->load_list_donors();
        $data['list_provinces'] = $this->user_model->getProvinces();
	//$this->load->view(base_url() . 'application/views/analyticstracking.php');
        $this->load->view('ikmc/practice/signup',$data);
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
            $provinceid = $_POST['province'];
            $districtid = $_POST['district'];           
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
                    'parentsname'   => $parent,
                    'province_id'   => $provinceid,
                    'district_id'   => $districtid,
                    'level'         => $level,
                );
                $this->user_model->insertnewuser($data);
            $this->login($nickname, $password);
                     
            
        }
        else{
            //echo "a";
            redirect("ikmc_practice/signup");
        }
    }
        function login($nickname, $password) {      
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $data['list_donors'] = $this->ikmc_model->load_list_donors();
        $lang = $data['lang'];
     
          
            $check = $this->user_model->checklogin($nickname, $password);
            if (count($check) > 0) {
                $data['practice']['id'] = $check['id'];
                $data['practice']['fullname'] = $check['fullname'];
                $data['practice']['birthday'] = $check['birthday'];
                $data['practice']['email'] = $check['email'];
                $data['practice']['level'] = $check['level'];
                $data['practice']['status'] = $check['status'];
                $data['practice']['phone'] = $check['phone'];
                $this->session->set_userdata($data['practice']);
                $this->session->set_flashdata('success','Bạn đã đăng kí thành công!');
		//$this->load->view(base_url() . 'application/views/analyticstracking.php');
                redirect(base_url() . "summer/ikmc_detail_user");
            } else {

                echo "<script>";
                
                echo "alert('Có lỗi trong quá trình đăng kí, vui lòng liên hệ BQT để được giải quyết!');";
               

                echo "</script>";

                $this->load->view('user_controller/signup', $data);
            }
     
    }
    function logout(){
    	 $this->session->sess_destroy();
    	 redirect(base_url() . "summer/login");
    }
    function loadAllUsers(){
        $data['list_users'] = $this->user_model->loadAllUsers();
        $this->load->view('admin/usertable', $data);

        }
    function resetPassword(){
        $id = $_POST['id'];
        $this->user_model->resetPassword($id);
        
        $response = array('state'=>true);
        header('Content-Type:application/json');
        echo json_encode($response);
    }
    function updateAccountState(){
        $id = $_POST['id'];
       
        $data = array(
            'status' => 1
            );
        $this->user_model->updateUserState($id, $data);
         $response = array('state'=>true);
        header('Content-Type:application/json');
        echo json_encode($response);
    }
    
    function deleteAccount($id){
        $id = $_POST['id'];
        $this->user_model->deleteUser($id);
        $response = array('state'=>true);
        header('Content-Type:application/json');
        echo json_encode($response);
    }
    function returnJsonUsers(){
        $users = $this->user_model->loadAllUsers();
        header('Content-Type:application/json');
        echo json_encode($users);
    }
    function createAccount($table){
             $users = $this->db->get($table)->result_array();
        $count = 0;
        foreach ($users as $user) {
            $data = array(
                'fullname' => $user['lastname']." ".$user['firstname'],
                'nickname' => $user['username'],
                'birthday' => $user['birthday'],
                'school'   => 'grade2dtdschool',
                'level'    => 1,
                'password' => sha1(trim(strtolower($user['password']))),
                'upgrade'  => '2017-02-15 14:04:00',
                 'logintime'  => '2017-02-15 14:04:00',
                 'exp_date'  => '2018-02-15 14:04:00'
                );
            $this->user_model->insertnewuser($data);
            $count++;
            if($count==26){
                break;
            }
            echo $user['firstname']." | ";
            echo $user['STT']." | ";
            echo $count."<br>";
        }
    }
}
