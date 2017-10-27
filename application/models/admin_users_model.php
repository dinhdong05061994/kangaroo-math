<?php
class Admin_users_model extends CI_Model {

 public function __construct()
{
   parent::__construct();
   $this->load->database();
}

	 function getUser($limit=null,$offset=NULL){
	  $this->db->select();
	  $this->db->from('user_registration');
	  $this->db->limit($limit, $offset);
	  $query = $this->db->get();
	  return $query->result();
	 }
	 function getOneUser($id){
	  $this->db->select();
	  $this->db->from('user_registration');
	  $this->db->where('id',$id);
	  $query = $this->db->get();
	  return $query->first_row();
	 }
	function getUser_1(){
	  $this->db->select();
	  $this->db->from('user_registration');
	  $this->db->where('status',1);
	  $this->db->where('upgrade','0000-00-00 00:00:00');
	  $query = $this->db->get();
	  return $query->result();
	 }
 	function searchUser($data){
		$this->db->select();
		$this->db->from('user_registration');
		$this->db->like($data); 
		
		$query = $this->db->get();
		return $query->result();
	}
	function countSearchUser($data){
		$this->db->select();
		$this->db->from('user_registration');
		$this->db->like($data); 
		$query = $this->db->count_all_results();
		return $query;
	}
	 function totalUser(){
	  return $this->db->count_all_results('user_registration');
	 }
	 function del_user($id){
        $sql="SELECT * FROM `user_registration` WHERE `id` = '$id'";
        $data=$this->db->query($sql)->first_row('array');
        $data['iduser'] = $data['id'];
        $data['id'] = '';
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data['del_date'] = date('Y-m-d H:i:s');
        if(count($data) > 0){
            if($this->db->insert("user_registration_del", $data)){
                $this->db->where('id', $id);
                $this->db->delete('user_registration');
                return "Y";
            }
        }else{
            return "N";
        }
    }
    function user_before_2009(){
    	$sql = "SELECT * FROM `user_registration` WHERE `create_date` >= '2016-09-20' AND status = 1 ORDER BY `create_date` DESC";
    	$query = $this->db->query($sql);
		return $query->result();
    }
    function updaet_user_before_20_09(){
    	$sql = "UPDATE `user_registration` SET `exp_date`= '2017-06-20' WHERE `create_date` < '2016-09-20' AND status = 1";
    	$query = $this->db->query($sql);
		return $query->result();
    }
}
?>