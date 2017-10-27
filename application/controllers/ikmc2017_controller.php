<?php
class ikmc2017_controller extends CI_Controller
{
    
	//Ham dung
	public function __construct() {
        parent::__construct();    
         date_default_timezone_set('Asia/Ho_Chi_Minh');
         $this->load->helper('url');
         $this->load->helper('file');
        
    }
    public function index(){
    
   		$this->load->view('ikmc2017/home');
    }
    public function introduction(){
    	$this->load->view('ikmc2017/introduction');
    }
    public function gallery(){
    	$this->load->view('ikmc2017/gallery');
    }
    public function contactus(){
    	$this->load->view('ikmc2017/contactus');
    }
    public function register(){
        $this->load->view('ikmc2017/register');
    }
}
?>