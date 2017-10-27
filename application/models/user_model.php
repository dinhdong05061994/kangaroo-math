<?php
class User_model extends CI_Model {
     function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();  
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    function checkNickname($nickname){
   		$query = $this->db->where('nickname', $nickname)->get('user_registration')->first_row("array");
   		if(count($query) > 0){
   			return false;
   		}else{
   			return true;
   		}
    }
    function insertnewuser($data)
    {
        $this->db->insert("user_registration", $data);
    }
    function getProvinces(){
    	return $this->db->get('province')->result_array();
    }
    function getDistricts($provinceid)
    {
    	return $this->db->where('provinceid',$provinceid)->get('district')->result_array();
    }
    function checklogin($nickname, $password){
        $sha1 = sha1($password);
        $sql = "SELECT * FROM `user_registration` WHERE `nickname` = '$nickname' AND `password` = '$sha1'";
        return $this->db->query($sql)->first_row('array');
    }
    function loadAllUsers(){
        $this->db->select('*');
        $this->db->from('user_registration');
        return $this->db->get()->result_array();
    }
    function deleteUser($id){
        $this->db->where('id',$id);
        $this->db->delete('user_registration');
    }
    function updateUserState($id, $data){
        $this->db->where('id', $id);
        $this->db->update('user_registration', $data);
    }
    function resetPassword($id){
        $data = array(
            'password' => '7c222fb2927d828af22f592134e8932480637c0d'
            );
        $this->db->where('id', $id);
        $this->db->update('user_registration', $data);
    }
}