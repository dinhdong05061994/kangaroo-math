<?php



class Adminmodel2 extends CI_Model {



    function __construct() {

        parent::__construct();

        $this->load->database();

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->load->library('session');

    }



    function get_all_news() {



        $sql = "SELECT * FROM topic ORDER BY id DESC";

        return $this->db->query($sql)->result_array();

    }
    function get_all_course() {



        $sql = "SELECT * FROM course1 ORDER BY id DESC";

        return $this->db->query($sql)->result_array();

    }
    function get_course_item($id = 0) {



        $sql = "SELECT * FROM topic Where id = $id";

        return $this->db->query($sql)->row_array();

    }
    function get_item_course($id = 0) {



        $sql = "SELECT * FROM course1 Where id = $id";

        return $this->db->query($sql)->row_array();

    }
   

    function get_all_course1() {

        $sql = "SELECT * FROM course1";
        return $this->db->query($sql)->result_array();
    }
    function get_all_question() {

        $sql = "SELECT * FROM question_test2";

        return $this->db->query($sql)->result_array();

    }

    function get_all_required_user() {



        $sql = "SELECT * FROM require_user";

        return $this->db->query($sql)->result_array();

    }



    function get_item_system_argument($id = 0) {

        $sql = "select * from system_argument where id = $id";

        return $this->db->query($sql)->row_array();

    }



    function get_item_news($id = 0) {

        $sql = "select * from topic where id = $id";

        return $this->db->query($sql)->row_array();

    }



    public function delete($table = '', $id = 0) {

        $this->db->where('id', (int) $id)->delete($table);

        $flag = $this->db->affected_rows();

        if ($flag > 0) {

            return array('type' => 'success', 'message' => 'Xoá bản ghi thành công !');

        }

        else

            return array('type' => 'error', 'message' => 'Xoá bản ghi thất bại !');

    }



    function insert_news() {

        $this->db->insert('topic', array(

          

            'name' => $this->input->post('name'),

          

        ));

        $flag = $this->db->affected_rows();

        if ($flag > 0) {

            return array('type' => 'seccess', 'message' => 'Thêm thành công ');

        } else {

            return array('type' => 'error', 'message' => 'Thêm thất bại');

        }

    }
    function insert_course() {

        $this->db->insert('course1', array(

          

            'name' => $this->input->post('name'),

          

        ));

        $flag = $this->db->affected_rows();

        if ($flag > 0) {

            return array('type' => 'seccess', 'message' => 'Thêm thành công ');

        } else {

            return array('type' => 'error', 'message' => 'Thêm thất bại');

        }

    }



    function edit_news($id = 0) {

        $this->db->where('id', $id)->update('topic', array(

      
            'name' => $this->input->post('name'),


        ));

        $flat = $this->db->affected_rows();

        if ($flat > 0) {

            return array('type' => 'success', 'message' => 'cập nhật thông tin thành công');

        } else {

            return array('type' => 'error', 'message' => 'cập nhật thông tin thất bại');

        }

    }
    function edit_course($id = 0) {

        $this->db->where('id', $id)->update('course1', array(

      
            'name' => $this->input->post('name'),


        ));

        $flat = $this->db->affected_rows();

        if ($flat > 0) {

            return array('type' => 'success', 'message' => 'cập nhật thông tin thành công');

        } else {

            return array('type' => 'error', 'message' => 'cập nhật thông tin thất bại');

        }

    }



    function update_argument($id = 0) {

        $this->db->where('id', $id)->update('system_argument', array(

            'intro' => $this->input->post('intro'),

            'intro_tt' => $this->input->post('intro_tt'),
			'thele' => $this->input->post('thele'),
			'hd_dangky' => $this->input->post('hd_dangky'),

            'phone_contact' => $this->input->post('phone_contact'),

            'email' => $this->input->post('email'),

            'logo' => $this->input->post('logo'),

            'video' => $this->input->post('video'),

            'logo_title' => $this->input->post('logo_title'),

            'tong_bien_tap' => $this->input->post('tong_bien_tap'),

            'address' => $this->input->post('address'),

            'copyright' => $this->input->post('copyright'),

            'banner' => $this->input->post('banner'),

        ));

        $flat = $this->db->affected_rows();

        if ($flat > 0) {

            return array('type' => 'success', 'message' => 'cập nhật thông tin thành công');

        } else {

            return array('type' => 'error', 'message' => 'cập nhật thông tin thất bại');

        }

    }



    function checklogin($email, $password) {

        $sha1 = sha1($password);

        $sql = "SELECT * FROM `user_admin` WHERE `email` = '$email' AND `password` = '$sha1'";

        return $this->db->query($sql)->first_row('array');

    }



    function get_all_topic() {

        $sql = "SELECT * FROM topic";

        return $this->db->query($sql)->result_array();

    }



    function get_all_code() {

        $sql = "SELECT * FROM topic";

        return $this->db->query($sql)->result_array();

    }



    function get_code($id) {

        $sql = "SELECT * FROM code_question WHERE id='$id'";

        $query = $this->db->query($sql);

        foreach ($query->result() as $row) {

            $title = $row->title;

        }

        return $title;

    }



    function add_test_question_complete($add_data) {

        $table_name = "question_test2";

        $this->db->insert($table_name, $add_data);

    }



    function changepass($email, $new_pass) {

        // $sha1pass = sha1($new_pass);

        $sql = "UPDATE user_admin

                SET password = '$new_pass'

                WHERE email = '$email'";

        $this->db->query($sql);

    }



    function getinfopractice() {

        $sql = "SELECT id,fullname,nickname, email, `history_practice` FROM `user`";

        return $this->db->query($sql)->result_array();

    }



}



?>