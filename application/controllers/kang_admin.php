<meta charset="UTF-8" />

<?php

class Kang_admin extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->model('adminmodel1');

        $this->load->library('grocery_CRUD');

        $this->load->helper("url");

        $this->load->library('session');
    }

    public function system_argument_management($id = 0) {





        if ($this->input->post('submit')) {

            $flag = $this->adminmodel1->update_argument($id);

            $this->session->set_flashdata('alert', $flag);

            redirect(base_url() . 'kang_admin/system_argument_management/' . $id);
        }

        $data['detail'] = $this->adminmodel1->get_item_system_argument($id);

        $data['output'] = 'kang_backend/article/add_system_argument';

        $this->load->view('kang_backend/admin_2', isset($data) ? $data : NULL);
    }

    public function add_news() {

        if ($this->input->post('submit')) {

            $flag = $this->adminmodel1->insert_news();

            $this->session->set_flashdata('alert', $flag);

            redirect(base_url() . 'kang_admin/list_news/' . $id);
        }





        $data['output'] = 'kang_backend/article/add_news';

        $this->load->view('kang_backend/admin_2', isset($data) ? $data : NULL);
    }
    public function add_course() {

        if ($this->input->post('submit')) {

            $flag = $this->adminmodel1->insert_course();

            $this->session->set_flashdata('alert', $flag);

            redirect(base_url() . 'kang_admin/list_course/');
        }





        $data['output'] = 'kang_backend/article1/add_news';

        $this->load->view('kang_backend/admin_2', isset($data) ? $data : NULL);
    }

    public function edit_course($id = 0) {

        if ($this->input->post('submit')) {

            $flag = $this->adminmodel1->edit_course($id);

            $this->session->set_flashdata('alert', $flag);

            redirect(base_url() . 'kang_admin/list_course/');
        }

        $data['detail'] = $this->adminmodel1->get_item_course($id);

        $data['output'] = 'kang_backend/article1/edit_news';

        $this->load->view('kang_backend/admin_2', isset($data) ? $data : NULL);
    }
    public function edit_news($id = 0) {

        if ($this->input->post('submit')) {

            $flag = $this->adminmodel1->edit_news($id);

            $this->session->set_flashdata('alert', $flag);

            redirect(base_url() . 'kang_admin/list_news/');
        }

        $data['detail'] = $this->adminmodel1->get_item_news($id);

        $data['output'] = 'kang_backend/article/edit_news';

        $this->load->view('kang_backend/admin_2', isset($data) ? $data : NULL);
    }

    public function del_news($id = 0) {

        $flag = $this->adminmodel1->delete('topic', $id);

        $this->session->set_flashdata('error', $flag);

        redirect(base_url() . 'kang_admin/list_news');
    }
    public function del_course($id = 0) {

        $flag = $this->adminmodel1->delete('course1', $id);

        $this->session->set_flashdata('error', $flag);

        redirect(base_url() . 'kang_admin/list_course');
    }

    public function list_news() {



        $data['detail'] = $this->adminmodel1->get_all_news();

        $data['output'] = 'kang_backend/article/list_news';

        $this->load->view('kang_backend/admin_2', isset($data) ? $data : NULL);
    }
    public function list_course() {



        $data['detail'] = $this->adminmodel1->get_all_course();

        $data['output'] = 'kang_backend/article1/list_news';

        $this->load->view('kang_backend/admin_2', isset($data) ? $data : NULL);
    }

    function checksession() {

        $add_data['user'] = $this->session->all_userdata();

        if (count($add_data['user']) > 0 && isset($add_data['user']['admin'])) {

            return true;
        } else {

            redirect("kang_admin/loginadmin");
        }
    }

    public function index() {

        //$this->system_argument_management();      

        $this->loginadmin();
    }

    function _example_output($output = null) {

        $this->load->view('kang_backend/admin', $output);
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

                redirect("lecture/list_lecture");
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

    function choose_year_question() {

        $this->load->library('session');

        $this->load->model("adminmodel1");

        $add_data['user'] = $this->session->all_userdata();



        if (isset($add_data['user']['admin']) && isset($add_data['user']['admin']['id_user'])) {

            $this->load->helper("url");
            $add_data['list_course'] = $this->adminmodel1->get_all_news();//get_all_news(): hàm lấy tất cả chuyên đề (topic)
            //print_r($add_data);die();
            $this->load->view('kang_backend/question/choose_year_test_question', $add_data);
        } else {

            redirect("/index.php/kang_admin/loginadmin");
        }
    }

    function add_test_question() {

        $this->load->model("adminmodel1");

        $add_data['user'] = $this->session->all_userdata();
        
        if (isset($add_data['user']['admin']) && isset($add_data['user']['admin']['id_user'])) {

            //$data['year'] = $_POST['year_select'];
            $data['year'] = $this->adminmodel1->get_course_item($_POST['year_select']);
            $data['success'] = "no";

            $data['topic'] = $this->adminmodel1->get_all_topic();

            $data['code'] = $this->adminmodel1->get_all_code();
            $data['level'] = $this->adminmodel1->get_all_course1();

            $this->session->set_userdata($data);

            $this->load->view('kang_backend/question/input_test_question', $data);
        } else {

            redirect("/index.php/kang_admin/loginadmin");
        }
    }

    function add_test_question_complete($year) {

        $this->load->library('session');

        $user = $this->session->all_userdata();

        $add_data['id_admin'] = $user['admin']['id_user'];
        
        $add_data['year'] = $_POST['year_select'];
        
        $add_data['id_topic'] = 1;

        $add_data['part'] = $_POST['code_select'];
        $add_data['level'] = $_POST['level'];

        $add_data['id_code'] = $_POST['code_select'];

        $add_data['type'] = 1;

        $add_data['content'] = $_POST['q_content'];





        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $add_data['time'] = date('Y-m-d H:i:s');



        $save_directory = "images/test_question/";



        if (isset($_FILES["q_file"]))
            $add_data['img'] = $this->save_image($_FILES["q_file"], $save_directory);

        if (isset($_FILES["hint_file"]))
            $add_data['hint_img'] = $this->save_image($_FILES["hint_file"], $save_directory);

        if (isset($_FILES["ra_file"]))
            $add_data['ra_img'] = $this->save_image($_FILES["ra_file"], $save_directory);

        if (isset($_FILES["wa_file_1"]))
            $add_data['wa_img_1'] = $this->save_image($_FILES["wa_file_1"], $save_directory);

        if (isset($_FILES["wa_file_2"]))
            $add_data['wa_img_2'] = $this->save_image($_FILES["wa_file_2"], $save_directory);

        if (isset($_FILES["wa_file_3"]))
            $add_data['wa_img_3'] = $this->save_image($_FILES["wa_file_3"], $save_directory);

        if (isset($_FILES["wa_file_4"]))
            $add_data['wa_img_4'] = $this->save_image($_FILES["wa_file_4"], $save_directory);



        //Return back to the course view page       

        if (isset($_POST['right_ans']))
            $add_data['right_ans'] = $_POST['right_ans'];
        else
            $add_data['right_ans'] = "";



        if (isset($_POST['hint']))
            $add_data['hint'] = "<" . "p" . ">" . $_POST['hint'] . "<" . "/" . "p" . ">";
        else
            $add_data['hint'] = "";



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







        $this->adminmodel1->add_test_question_complete($add_data);



        $data['success'] = "yes";

        //$data['year'] = $year;


        $data['year'] = $this->adminmodel1->get_course_item($year);
        $data['topic'] = $this->adminmodel1->get_all_topic();

        $data['title_code'] = $this->session->userdata('title_code');

        $data['code'] = $this->adminmodel1->get_all_code();
        $data['level'] = $this->adminmodel1->get_all_course1();
        $data['current_selected'] = $add_data;

        $this->session->set_userdata($data);

        $this->load->view('kang_backend/question/input_test_question', $data);
    }

    function save_image($file_name, $save_directory) {

        $allowedExts = array("gif", "jpeg", "jpg", "png", "zip", "rar", "pdf", "doc", "docx", ".deb");

        $temp = explode(".", $file_name["name"]);

        $extension = end($temp);

        //Tuong ung giua duoi file ho tro va dang khai bao trong php
        //.deb application/octet-stream     

        if ((($file_name["type"] == "image/gif") || ($file_name["type"] == "image/jpeg") || ($file_name["type"] == "image/jpg") || ($file_name["type"] == "image/pjpeg") || ($file_name["type"] == "image/x-png") || ($file_name["type"] == "image/png") || ($file_name["type"] == "application/x-rar-compressed") || ($file_name["type"] == "application/x-zip-compressed") || ($file_name["type"] == "application/pdf") || ($file_name["type"] == "application/msword") || ($file_name["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") || ($file_name["type"] == "application/octet-stream")) && ($file_name["size"] < 7340033) || ($file_name["type"] == "image/png")) {

            if ($file_name["error"] > 0) {

                $get_data['message']['error'] = "Return Code: " . $file_name["error"] . "<br>";
            } else {

                if (file_exists($save_directory . $file_name["name"])) {

                    $get_data['message']['success'] = "Tệp " . $file_name["name"] . " đã tồn tại";

                    //alert("Tep da ton tai!");
                } else {

                    if (!file_exists($save_directory)) {

                        mkdir($save_directory, 0777, true);
                    }

                    move_uploaded_file($file_name["tmp_name"], $save_directory . $file_name["name"]);

                    $get_data['message']['success'] = "Đã lưu thành công tệp /" . $file_name["name"];
                }

                return $file_name["name"];
            }
        } else {

            $get_data['message']['error'] = "Không hỗ trợ tải lên tệp định dạng " . $file_name["type"] . "";
        }

        return null;
    }

    public function view_test_question_table() {

        $add_data['user'] = $this->session->all_userdata();

        if (isset($add_data['user']['admin']['id_user'])) {

            $this->load->library('grocery_CRUD');

            try {

                $crud = new grocery_CRUD();

                $crud->set_theme('datatables');

                $table_name = "question_test1";

                $crud->set_table($table_name);

                $crud->set_subject(" Quan lý bảng câu hỏi");

                $crud->required_fields('id');
                $crud->unset_add();
                $crud->columns(
                        'id', 'year', 'id_code', 'level', 'type', 'content', 'img', 'right_ans', 'ra_img', 'wrong_ans_1', 'wa_img_1', 'wrong_ans_2', 'wa_img_2', 'wrong_ans_3', 'wa_img_3', 'wrong_ans_4', 'wa_img_4', 'hint', 'hint_img'
                );

                $crud->edit_fields(
                        'id', 'id_code', 'level', 'year', 'id_topic', 'part', 'type', 'content', 'img', 'right_ans', 'ra_img', 'wrong_ans_1', 'wa_img_1', 'wrong_ans_2', 'wa_img_2', 'wrong_ans_3', 'wa_img_3', 'wrong_ans_4', 'wa_img_4', 'hint', 'hint_img', 'time'
                );

                $crud->add_fields(
                        'id', 'id_code', 'year', 'id_topic', 'part', 'type', 'content', 'img', 'right_ans', 'ra_img', 'wrong_ans_1', 'wa_img_1', 'wrong_ans_2', 'wa_img_2', 'wrong_ans_3', 'wa_img_3', 'wrong_ans_4', 'wa_img_4', 'hint', 'hint_img', 'time'
                );

                $crud->
                        display_as('id', 'mã CH')->
                        display_as('id_code', 'mức độ')->
                        display_as('year', 'chuyên đề')->
                        display_as('id_topic', 'chuyên đề')->
                        display_as('part', 'Phần')->
                        display_as('type', 'loại')->
                        display_as('content', 'nội dung câu hỏi')->
                        display_as('img', 'ảnh CH')->
                        display_as('right_ans', 'đáp án đúng')->
                        display_as('ra_img', 'ảnh ĐA')->
                        display_as('wrong_ans_1', 'đas 1')->
                        display_as('wa_img_1', 'ảnh đas 1')->
                        display_as('wrong_ans_2', 'đas 2')->
                        display_as('wa_img_2', 'ảnh đas 2')->
                        display_as('wrong_ans_3', 'đas 3')->
                        display_as('wa_img_3', 'ảnh đas 3')->
                        display_as('wrong_ans_4', 'đas 4')->
                        display_as('wa_img_4', 'ảnh đas 4')->
                        display_as('hint', 'gợi ý')->
                        display_as('hint_img', 'ảnh gợi ý')->
                        display_as('time', 'thời gian thêm');

                //callback

                $crud->set_field_upload('img', 'images/test_question/');

                $crud->set_field_upload('ra_img', 'images/test_question/');

                $crud->set_field_upload('hint_img', 'images/test_question/');

                $crud->set_field_upload('wa_img_1', 'images/test_question/');

                $crud->set_field_upload('wa_img_2', 'images/test_question/');

                $crud->set_field_upload('wa_img_3', 'images/test_question/');

                $crud->set_field_upload('wa_img_4', 'images/test_question/');



                //$crud->field_type('level', 'dropdown', array('', '0' => 'dễ', '1' => 'năng cao'));

                $crud->field_type('type', 'dropdown', array('', '0' => 'nhập đáp án', '1' => 'trắc nghiệm'));
                $crud->field_type('id_code', 'dropdown', array('', '1' => 'Dễ', '2' => 'Trung Bình','3'=>'Khó'));
                
                
                $topic_test = $this->adminmodel1->get_all_news();

                $array = null;

                for ($i = 0; $i < sizeof($topic_test); $i++) {

                    $array[$topic_test[$i]['id']] = $topic_test[$i]['name'];
                }

                $crud->field_type('year', 'dropdown', $array);

                $crud->field_type('part', 'dropdown', array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8',
                    '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', '5' => '5', '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30'));

                $code_test = $this->adminmodel1->get_all_code();

                $array_1 = null;

                for ($i = 0; $i < sizeof($code_test); $i++) {

                    $array_1[$code_test[$i]['id']] = $code_test[$i]['name'];
                }
                $level = $this->adminmodel1->get_all_course1();

                $array_2 = null;

                for ($i = 0; $i < sizeof($level); $i++) {

                    $array_2[$level[$i]['id']] = $level[$i]['name'];
                }

                $crud->field_type('level', 'dropdown', $array_2);



                $output = $crud->render();

                $this->_example_output($output);
            } catch (Exception $e) {

                show_error(
                        $e->getMessage() .
                        ' --- ' .
                        $e->getTraceAsString());
            }
        } else {

            redirect(base_url() . 'kang_admin/loginadmin');
        }
    }
    function student_management(){
         $add_data['user'] = $this->session->all_userdata();

        if (isset($add_data['user']['admin']['id_user'])) {

            $this->load->library('grocery_CRUD');

            try {

                $crud = new grocery_CRUD();

                $crud->set_theme('datatables');

                $table_name = "user_registration";

                $crud->set_table($table_name);

                $crud->set_subject("Học sinh");

                $crud->required_fields('id');
               // $crud->unset_add();
                $crud->columns(
                        'id', 'fullname', 'birthday', 'email', 'gender', 'parentsname', 'phone', 'address', 'create_date'
                );

                $crud->edit_fields(
                        'fullname', 'birthday', 'email', 'gender', 'parentsname', 'phone', 'address'
                );

            //    $crud->add_fields(
            //            'fullname', 'birthday', 'email', 'gender', 'parentsname', 'phone', 'address', 'create_date'
             //   );
  $crud->add_fields(
                        'fullname',  'address'
                );
                $crud->
                        display_as('id', 'Mã học sinh')->
                        display_as('fullname', 'Họ và tên')->
                        display_as('birthday', 'Ngày sinh')->
                        display_as('email', 'Email')->
                        display_as('gender', 'Giới tính')->
                        display_as('parentsname', 'Phụ huynh')->
                        display_as('phone', 'SĐT')->
                        display_as('address', 'Địa chỉ')->
                        display_as('create_date', 'Ngày đăng kí');
                        // display_as('ra_img', 'ảnh ĐA')->
                        // display_as('wrong_ans_1', 'đas 1')->
                        // display_as('wa_img_1', 'ảnh đas 1')->
                        // display_as('wrong_ans_2', 'đas 2')->
                        // display_as('wa_img_2', 'ảnh đas 2')->
                        // display_as('wrong_ans_3', 'đas 3')->
                        // display_as('wa_img_3', 'ảnh đas 3')->
                        // display_as('wrong_ans_4', 'đas 4')->
                        // display_as('wa_img_4', 'ảnh đas 4')->
                        // display_as('hint', 'gợi ý')->
                        // display_as('hint_img', 'ảnh gợi ý')->
                        // display_as('time', 'thời gian thêm');

                //callback

                // $crud->set_field_upload('img', 'images/test_question/');

                // $crud->set_field_upload('ra_img', 'images/test_question/');

                // $crud->set_field_upload('hint_img', 'images/test_question/');

                // $crud->set_field_upload('wa_img_1', 'images/test_question/');

                // $crud->set_field_upload('wa_img_2', 'images/test_question/');

                // $crud->set_field_upload('wa_img_3', 'images/test_question/');

                // $crud->set_field_upload('wa_img_4', 'images/test_question/');



                //$crud->field_type('level', 'dropdown', array('', '0' => 'dễ', '1' => 'năng cao'));

                $crud->field_type('gender', 'dropdown', array(0,1 => 'nam', 2 => 'nữ'));
                // $crud->field_type('id_code', 'dropdown', array('', '1' => 'Dễ', '2' => 'Trung Bình','3'=>'Khó'));
                
                
                // $topic_test = $this->adminmodel1->get_all_news();

                // $array = null;

                // for ($i = 0; $i < sizeof($topic_test); $i++) {

                //     $array[$topic_test[$i]['id']] = $topic_test[$i]['name'];
                // }

                // $crud->field_type('year', 'dropdown', $array);

                // $crud->field_type('part', 'dropdown', array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8',
                //     '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', '5' => '5', '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30'));

                // $code_test = $this->adminmodel1->get_all_code();

                // $array_1 = null;

                // for ($i = 0; $i < sizeof($code_test); $i++) {

                //     $array_1[$code_test[$i]['id']] = $code_test[$i]['name'];
                // }
                // $level = $this->adminmodel1->get_all_course1();

                // $array_2 = null;

                // for ($i = 0; $i < sizeof($level); $i++) {

                //     $array_2[$level[$i]['id']] = $level[$i]['name'];
                // }

                // $crud->field_type('level', 'dropdown', $array_2);



                $output = $crud->render();

                $this->_example_output($output);
            } catch (Exception $e) {

                show_error(
                        $e->getMessage() .
                        ' --- ' .
                        $e->getTraceAsString());
            }
        } else {

            redirect(base_url() . 'kang_admin/loginadmin');
        }
    }
    function change_pass() {

        $this->load->library('session');

        $this->load->model('adminmodel1');

        $user['user'] = $this->session->all_userdata();

        //echo $user['user']['email'];

        if (isset($user['user']['admin']['id_user'])) {

            $this->load->view("kang_backend/changepass_admin", $user);
        }
        else
            redirect("/index.php/kang_admin/loginadmin");
    }

    function save_new_pass() {

        $this->load->library('session');

        $this->load->model('adminmodel1');

        $user['user'] = $this->session->all_userdata();

        if (isset($user['user']['admin']['id_user'])) {

            $data['email'] = $user['user']['admin']['email'];

            $data['new_pass'] = $_POST['newpass'];

            $new_pass = sha1($data['new_pass']);

            $this->adminmodel1->changepass($data['email'], $new_pass);

            redirect("index.php/kang_admin/view_test_question_table");
        }
        else
            redirect("/index.php/kang_admin/loginadmin");
    }

    function show_practice_results() {



        $this->load->library('session');

        $this->load->model('adminmodel1');

        $user['user'] = $this->session->all_userdata();

        if (isset($user['user']['admin']['id_user'])) {

            $data = $this->getinfopractice();

            for ($i = 0; $i < sizeof($data); $i++) {

                $array['user'][$i]['fullname'] = $data[$i]['fullname'];

                $array['user'][$i]['nickname'] = $data[$i]['nickname'];

                $array['user'][$i]['email'] = $data[$i]['email'];

                $array['user'][$i]['times'] = $data[$i]['times'];

                $array['user'][$i]['point'] = $data[$i]['point_average'];

                $array['user'][$i]['5_recent_results'] = $data[$i]['point_average'] == 0 ? '0' : implode(',', $data[$i]['points']);
            }

            $this->load->view("kang_backend/practiceresult", $array);
        }
        else
            redirect("/index.php/kang_admin/loginadmin");
    }

    function getinfopractice() {



        $this->load->library('session');

        $this->load->model('adminmodel1');

        $user['user'] = $this->session->all_userdata();



        if (isset($user['user']['admin']['id_user'])) {

            $data = $this->adminmodel1->getinfopractice();



            for ($i = 0; $i < sizeof($data); $i++) {

                $j = 0;

                $k = 0;

                $temp = null;

                $point = 0;

                $times = 0;

                if ($data[$i]['history_practice'] != null && isset($data[$i]['history_practice'])) {

                    $arr[$i] = explode(';', $data[$i]['history_practice']);



                    for ($j = 0; $j < sizeof($arr[$i]) - 1; $j++) {

                        $temp[$j] = explode(',', $arr[$i][$j]);
                    }



                    for ($k = 0; $k < sizeof($temp); $k++) {

                        $arr[$i]['point'][$k] = isset($temp[$k][2]) ? $temp[$k][2] : 0;

                        $point += $arr[$i]['point'][$k];

                        $times += 1;
                    }

                    $m = sizeof($temp) - 1;

                    $a = ($m < 4) ? $m : 4;

                    for ($n = $a; $n >= 0; $n--) {

                        $arr[$i]['points'][$n] = $arr[$i]['point'][$m];

                        $m -= 1;
                    }



                    $arr[$i]['times'] = $times;
                } else {



                    $arr[$i]['point'] = 0;

                    $point += $arr[$i]['point'];

                    $arr[$i]['times'] = 0;
                }



                $arr[$i]['point_average'] = $arr[$i]['times'] != 0 ? round($point / $arr[$i]['times'], 2) : 0;

                $arr[$i]['fullname'] = $data[$i]['fullname'];

                $arr[$i]['nickname'] = $data[$i]['nickname'];

                $arr[$i]['email'] = $data[$i]['email'];
            }



            return $arr;
        }
        else
            redirect("/index.php/kang_admin/loginadmin");
    }

// lưu yêu cầu từ người dùng

    function require_user() {

        $this->load->library('session');

        $this->load->model('adminmodel1');

        $user['user'] = $this->session->all_userdata();

        if (isset($user['user']['admin']['id_user'])) {

            try {

                $crud = new grocery_CRUD();

                $crud->set_theme('datatables');

                $crud->set_table('require_user');

                $crud->set_subject("Bảng yêu cầu từ người dùng");

                $crud->required_fields('id');

                $crud->unset_edit();

                $crud->unset_delete();

                $crud->unset_add();



                $crud->columns('fullname', 'email', 'phone', 'content', 'times_send');



                $crud->display_as('fullname', 'Người gửi yêu cầu')
                        ->display_as('email', 'Email')
                        ->display_as('phone', 'Số ĐT')
                        ->display_as('content', 'Nội dung')
                        ->display_as('times_send', 'Thời gian gửi');



                $output = $crud->render();

                $this->_example_output($output);
            } catch (Exception $e) {

                show_error(
                        $e->getMessage() .
                        ' --- ' .
                        $e->getTraceAsString());
            }
        }
        else
            redirect("/index.php/kang_admin/loginadmin");
    }

// bảng luu các nhà tài trợ

    function organizers_donors() {

        $this->load->library('session');

        $this->load->model('adminmodel1');

        $user['user'] = $this->session->all_userdata();

        if (isset($user['user']['admin']['id_user'])) {

            try {

                $crud = new grocery_CRUD();

                $crud->set_theme('datatables');

                $crud->set_table('organizers_donors');

                $crud->set_subject("Ban tổ chức/tài trợ");

                $crud->required_fields('id');

                $crud->columns('type', 'logo');

                $crud->display_as('type', 'Đơn vị')
                        ->display_as('logo', 'Logo');

                if (!file_exists('img/organizers_donors/')) {

                    mkdir('img/organizers_donors/', 0777, true);
                }

                $crud->set_field_upload('logo', 'img/organizers_donors/');

                $crud->field_type('type', 'dropdown', array('1' => 'Tổ chức', '2' => 'Tài trợ'));

                $output = $crud->render();

                $this->_example_output($output);
            } catch (Exception $e) {

                show_error(
                        $e->getMessage() .
                        ' --- ' .
                        $e->getTraceAsString());
            }
        }
        else
            redirect("/index.php/kang_admin/loginadmin");
    }
    function notification(){
        $this->load->library('session');

        $this->load->model('adminmodel1');

        $user['user'] = $this->session->all_userdata();

        if (isset($user['user']['admin']['id_user'])) {

            try {

                $crud = new grocery_CRUD();

                $crud->set_theme('datatables');

                $crud->set_table('notification');

                $crud->set_subject("Thông báo");

                $crud->required_fields('id');

                $crud->columns('content','status');
                $crud->fields('content','status');

                $crud->display_as('content', 'Nội dung thông báo')
                        ->display_as('status', 'Trạng thái');

                

                

                $crud->field_type('status', 'dropdown', array('1' => 'Hiện', '2' => 'Ẩn'));
                
                $output = $crud->render();

                $this->_example_output($output);
            } catch (Exception $e) {

                show_error(
                        $e->getMessage() .
                        ' --- ' .
                        $e->getTraceAsString());
            }
        }
        else
            redirect("/index.php/kang_admin/loginadmin");
    }
    function news(){
        $this->load->library('session');

        $this->load->model('adminmodel1');

        $user['user'] = $this->session->all_userdata();

        if (isset($user['user']['admin']['id_user'])) {

            try {

                $crud = new grocery_CRUD();

                $crud->set_theme('datatables');

                $crud->set_table('news');

                $crud->set_subject("Tin tức");

                $crud->required_fields('id');

                $crud->columns('title', 'avartar', 'content_short', 'content_full', 'status', 'hide');
                $crud->fields('title',  'avartar','content_short', 'content_full', 'status', 'hide');

                $crud->display_as('title', 'Tiêu đề')
                        ->display_as('content_full', 'Nội dung ')
                        ->display_as('content_short', 'Nội dung tóm tắt')
                        ->display_as('avartar', 'Ảnh đại diện')
                        ->display_as('hide', 'Trạng thái')
                        ->display_as('status', 'Tin nổi bật');
                $crud->field_type('status', 'dropdown', array('1' => 'Nổi bật', '2' => 'Bình thường'));
                $crud->field_type('hide', 'dropdown', array('1' => 'Hiện', '2' => 'Ẩn'));
                if (!file_exists('img/news/')) {

                    mkdir('img/news/', 0777, true);
                }

                $crud->set_field_upload('avartar', 'img/news/');
                $output = $crud->render();

                $this->_example_output($output);
            } catch (Exception $e) {

                show_error(
                        $e->getMessage() .
                        ' --- ' .
                        $e->getTraceAsString());
            }
        }
        else
            redirect("/index.php/kang_admin/loginadmin");
    }
}
?>