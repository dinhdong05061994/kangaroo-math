<?php
class Comingsoon extends CI_Controller
{
    
	//Ham dung
	public function __construct() {
        parent::__construct();
        $this->load->model(array('home_model'));
        
    }
	
	
	
	public function index() {
	   $this->load->view("frontend/comingsoon");
	}
    
}

?>