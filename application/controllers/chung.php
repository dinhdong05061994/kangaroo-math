<?php
class Chung extends CI_Controller
{
    
    //Ham dung
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('chung_model'));
        $this->load->library('session');
    }
    
    
    
    
    public function index() {
        
        $add_data['historys'] = $this->chung_model->get_history();
        $this->load->view('competition_month/chung', $add_data);
            
    }
    public function update_time_begin($iduser) {
        
        $this->chung_model->update_time_begin($iduser);
        echo "ok";
            
    }
    
    
    
}

?>