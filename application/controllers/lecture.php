<meta charset="UTF-8" />

<?php

class Lecture extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->model('lecturemodel');

        $this->load->helper("url");

        $this->load->library('session');
    }

    

    public function add_lecture() {
		
        if ($this->input->post('submit')) {
            $flag = $this->lecturemodel->insert_lecture();
            $this->session->set_flashdata('alert', $flag);
            redirect(base_url() . 'lecture/list_lecture/');
        }
        
        $data['detail'] = $this->lecturemodel->list_class();
        $data['output'] = 'kang_backend/lecture/add_lecture';

        $this->load->view('kang_backend/admin_2', isset($data) ? $data : NULL);
    }
    
    public function add_para() {
        $id_lecture = $this->uri->segment(3);
        if ($this->input->post('submit')) {
            $flag = $this->lecturemodel->insert_para();
            $this->session->set_flashdata('alert', $flag);
            redirect(base_url() . 'lecture/list_para/'.$id_lecture);
        }


        $data['output'] = 'kang_backend/para/add_para';

        $this->load->view('kang_backend/admin_2', isset($data) ? $data : NULL);
    }

    public function edit_para($id = 0) {
        $id_lecture = $this->uri->segment(4);
        if ($this->input->post('submit')) {

            $flag = $this->lecturemodel->edit_para($id);

            $this->session->set_flashdata('alert', $flag);

            redirect(base_url() . 'lecture/list_para/'.$id_lecture);
        }

        $data['detail'] = $this->lecturemodel->get_item_para($id);
        $data['output'] = 'kang_backend/para/edit_para';
        $this->load->view('kang_backend/admin_2', isset($data) ? $data : NULL);
    }
    public function edit_lecture($id = 0) {

        if ($this->input->post('submit')) {

            $flag = $this->lecturemodel->edit_lecture($id);

            $this->session->set_flashdata('alert', $flag);

            redirect(base_url() . 'lecture/list_lecture/');
        }
        $data['detail1'] = $this->lecturemodel->list_class();
        $data['detail'] = $this->lecturemodel->get_item_lecture($id);
        $data['output'] = 'kang_backend/lecture/edit_lecture';
        $this->load->view('kang_backend/admin_2', isset($data) ? $data : NULL);
    }

    public function del_lecture($id = 0) {

        $flag = $this->lecturemodel->delete('lecture', $id);

        $this->session->set_flashdata('error', $flag);

        redirect(base_url() . 'lecture/list_lecture');
    }
    public function del_para($id = 0) {
$id_lecture = $this->uri->segment(3);
        $flag = $this->lecturemodel->delete('para_lecture', $id);

        $this->session->set_flashdata('error', $flag);

        redirect(base_url() . 'lecture/list_lecture/'.$id_lecture);
    }

    public function list_lecture() {



        $data['detail'] = $this->lecturemodel->get_list_lecture();

        $data['output'] = 'kang_backend/lecture/lecture';

        $this->load->view('kang_backend/admin_2', isset($data) ? $data : NULL);
    }
    public function list_para($id = 0) {



        $data['detail'] = $this->lecturemodel->get_list_para($id);

        $data['output'] = 'kang_backend/para/para';

        $this->load->view('kang_backend/admin_2', isset($data) ? $data : NULL);
    }

   
    public function index() {

        $this->loginadmin();
    }

   
    function loginadmin() {



        if (isset($_POST['email']) && $_POST['email'] != "") {

            $email = $_POST['email'];

            $password = $_POST['password'];

            $check = $this->adminmodel1->checklogin($email, $password);



            if (count($check) > 0) {

                $data['admin']['id_user'] = $check['id_user'];

                $data['admin']['email'] = $check['email'];

                $data['admin']['fullname'] = $check['fullname'];

                $data['admin']['phone'] = $check['phone'];

                $data['admin']['question_test'] = count($this->adminmodel1->get_all_question());

                $data['admin']['required_user'] = count($this->adminmodel1->get_all_required_user());

                $this->session->set_userdata($data);

                redirect("index.php/kang_admin/view_test_question_table/");
            } else {

                //echo 'Tên đăng nhập hoặc mật khẩu không chính xác';

                echo "<script>";

                echo "alert('Tên đăng nhập hoặc mật khẩu không chính xác');";

                echo "</script>";

                $this->load->view('kang_backend/view_admin_login');
            }
        }
        else
            $this->load->view('kang_backend/view_admin_login');
    }

    function logoutadmin() {

        $this->session->unset_userdata('admin');

        $this->load->view('kang_backend/view_admin_login');
    }

   

}
?>