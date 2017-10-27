<?php

class lecturemodel extends CI_Model {

     function __construct() {

        // Call the Model constructor

        parent::__construct();

        $this->load->database();  

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->load->library('session');

    }

    

    function get_list_lecture() {

        $sql = "SELECT a.* , b.name as title

                FROM lecture a , course1 b WHERE a.course_id = b.id ORDER BY id ASC";

        $query = $this->db->query($sql);

        return $query->result_array();

    }
    function list_class() {

        $sql = "SELECT * 

                FROM course1";

        $query = $this->db->query($sql);

        return $query->result_array();

    }
    function get_list_para($id = 0) {

        $sql = "SELECT * 

                FROM para_lecture WHERE id_lecture = $id";

        $query = $this->db->query($sql);

        return $query->result_array();

    }
    function insert_lecture() {

        $this->db->insert('lecture', array(


            'name' => $this->input->post('name'),
            'course_id' => $this->input->post('class'),
            
            'order' => $this->input->post('order'),
            'avarta' => $this->input->post('avarta'),

          

        ));

        $flag = $this->db->affected_rows();

        if ($flag > 0) {

            return array('type' => 'seccess', 'message' => 'Thêm thành công ');

        } else {

            return array('type' => 'error', 'message' => 'Thêm thất bại');

        }

    }
    function insert_para() {
		$str = strpos($this->input->post('content'), 'https://www.youtube.com/');
          
            if(is_numeric($str)){
            $content = str_replace('https://www.youtube.com/', '<iframe width="560" height="400" src="https://www.youtube.com/', $this->input->post('content'));
            $content = str_replace('watch?v=', 'embed/', $content);
            $content = str_replace($content, $content.' "frameborder="0" allowfullscreen></iframe>', $content);
            }else{
                $content = $this->input->post('content');
            }
        $this->db->insert('para_lecture', array(

            //$content = str_replace('watch?v=', 'embed/', $content);
            'id_lecture' => $this->input->post('id_lecture'),
            'name' => $this->input->post('name'),
            'content' => $content,
            'order' => $this->input->post('order'),

          

        ));

        $flag = $this->db->affected_rows();

        if ($flag > 0) {

            return array('type' => 'seccess', 'message' => 'Thêm thành công ');

        } else {

            return array('type' => 'error', 'message' => 'Thêm thất bại');

        }

    }
    function edit_lecture($id = 0) {

        $this->db->where('id', $id)->update('lecture', array(

      
            'name' => $this->input->post('name'),
            'course_id' => $this->input->post('class'),
            'order' => $this->input->post('order'),
            'avarta' => $this->input->post('avarta'),


        ));

        $flat = $this->db->affected_rows();

        if ($flat > 0) {

            return array('type' => 'success', 'message' => 'cập nhật thông tin thành công');

        } else {

            return array('type' => 'error', 'message' => 'cập nhật thông tin thất bại');

        }

    }
    function edit_para($id = 0) {
           $str = strpos($this->input->post('content'), 'https://www.youtube.com/');
          
            if(is_numeric($str)){
            $content = str_replace('https://www.youtube.com/', '<iframe width="560" height="400" src="https://www.youtube.com/', $this->input->post('content'));
            $content = str_replace('watch?v=', 'embed/', $content);
            $content = str_replace($content, $content.' "frameborder="0" allowfullscreen></iframe>', $content);
            }else{
                $content = $this->input->post('content');
            }
            $this->db->where('id', $id)->update('para_lecture', array(

            'id_lecture' => $this->input->post('id_lecture'),
            'name' => $this->input->post('name'),
            'content' => $content,
            'order' => $this->input->post('order'),
           
        ));

        $flat = $this->db->affected_rows();

        if ($flat > 0) {

            return array('type' => 'success', 'message' => 'cập nhật thông tin thành công');

        } else {

            return array('type' => 'error', 'message' => 'cập nhật thông tin thất bại');

        }

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
    function get_item_lecture($id = 0) {

        $sql = "select * from lecture where id = $id";

        return $this->db->query($sql)->row_array();

    }
    function get_item_para($id = 0) {

        $sql = "select * from para_lecture where id = $id";

        return $this->db->query($sql)->row_array();

    }
    function load_donors() {

        $sql = "SELECT * 

                FROM organizers_donors";

        $query = $this->db->query($sql);

        return $query->result_array();

    }
	function address_competion() {

        $sql = "SELECT * 

                FROM address_competition";

        $query = $this->db->query($sql);

        return $query->result_array();

    }

    function load_news() {

        $sql = "SELECT * 

                FROM news ORDER BY id DESC";

        $query = $this->db->query($sql);

        return $query->result_array();

    }

    function name_code($id = 0) {

        $sql = "SELECT * 

                FROM code_question where id = $id";

        $query = $this->db->query($sql);

        return $query->row_array();

    }

    

    function insert_require_user($data) {

        $this->db->insert("require_user", $data);

    }

    function insert_register($data) {

        $this->db->insert("student_register_online", $data);

    }

    

    function getnamepdf_regulations_examination_room(){

        $sql = "SELECT `file_pdf` FROM `new_argument` ORDER BY `id` DESC";

        return $this->db->query($sql)->first_row('array');

    }

}
?>
