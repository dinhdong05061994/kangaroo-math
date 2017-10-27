<?php
class Competition_login extends CI_Controller
{
    
    //Ham dung
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('competition_model','ikmc_model'));
        $this->load->library('session');
    }
    
    
   
    function login(){
        $data['lang'] = $this->session->userdata('lang') == "" ? "vi" : $this->session->userdata('lang');
        $data['arg'] = $this->ikmc_model->load_system_argument();
        $data['list_organizers'] = $this->ikmc_model->load_list_organizers();
        $data['list_donors'] = $this->ikmc_model->load_list_donors();
        $lang = $data['lang'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if(isset($_POST['nickname']) && $_POST['nickname']!="")
            {
                $nickname = $_POST['nickname']; 
                $password = $_POST['pass'];
                $check = $this->competition_model->checkuser($nickname, $password);
                if(count($check) > 0)
                {
                    $data['competition']['id'] =  rand().".".$check['id'];
                    $data['competition']['email'] = $check['email'];
                    $data['competition']['logintime'] = (strtotime(date('Y-m-d H:i:s'))%90)+30;
                    $data['competition']['fullname'] = $check['fullname'] ;
                    $data['competition']['nickname'] = $check['nickname'];
                    $data['competition']['birthday']= $check['birthday'];
                    $data['competition']['gender'] = $check['gender'] == '1' ? "Nam" : ($check['gender'] == '2' ? "Nữ" : "Khác");  
                    $this->session->set_userdata($data);
                    // var_dump($this->session->userdata('competition'));
                    // var_dump(strtotime(date('Y-m-d H:i:s')));die;
                   redirect(base_url()."ikmc_practice");  

                }
                else {
                    //echo 'Tên đăng nhập hoặc mật khẩu không chính xác';
                    
                    
                    if($lang =='vi'){
                        $this->session->set_flashdata('flash_error','Tên đăng nhập hoặc mật khẩu không chính xác!');
                        
                    }else{
                        $this->session->set_flashdata('flash_error','User name or password is incorrect!');
                    }
                    redirect(base_url()."competition_login/login");
                }
                        
            }
            else
                $this->load->view('competition_month/login',$data);
    }
    
}

?>