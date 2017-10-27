<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_view_question_optinonal extends CI_Controller {

	public function construct()
    {
       parent::__construct();
       $this->load->library('form_validation');

    }
    function view($from,$to){
    	$this->load->model('violympic_model');
    	// $from = $this->input->post("form");
    	// $to = $this->input->post("to");
        $data['lang'] = "vi";

    	$msg = "";
    	if($from <=0 || $to <= 0){
    		$this->session->set_flashdata('danger', 'Vui lòng chọn mã câu hỏi là số dương');
            redirect(base_url() . "admin/management_questions_optional");
    	}else if((int)$from > (int)$to ){
            $this->session->set_flashdata('danger', 'Vui lòng chọn mã câu hỏi bắt đầu nhỏ hơn mã câu hỏi kết thúc');
            redirect(base_url() . "admin/management_questions_optional");
        }
        else{
    		$data['arrayQuestion']=$this->violympic_model->search_form_to($from,$to);
            $this->load->view("frontend/violympic/admin_view_list_question", $data);
    	}
    }
}
?>
