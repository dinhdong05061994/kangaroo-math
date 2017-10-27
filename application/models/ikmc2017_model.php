<?php
	/**
	* 
	*/
	class Ikmc2017_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		function get_all_students(){
			return $this->db->get('ikmc_students_result')->result_array();
		}
		function get_student_by_sbd($sbd){
			return $this->db->select('prize')->where('sbd',$sbd)->get('ikmc_students_result')->first_row('array');
		}
		function get_all_result(){
			return $this->db->get('ikmc_result_v4')->result_array();
		}
		function update_students_result($sbd,$data){
			$this->db->where('sbd',$sbd);
			$this->db->update('ikmc_students_result',$data);
		}
		public function get_student($fullname, $birthday){
			$sql ='SELECT ikmc_students_result.*, ikmc_schools.name as school_name, ikmc_venues.name as venue_name, ikmc_venues.address as venue_address from ikmc_students_result left JOIN ikmc_schools on ikmc_students_result.school_id = ikmc_schools.id LEFT JOIN ikmc_venues on ikmc_students_result.venue_id = ikmc_venues.id WHERE fullname = "'.$fullname.'" and birthday="'.$birthday.'" and status!=0';
			return $this->db->query($sql)->first_row('array'); 

		}
		public function get_all_high_distinction(){
			return $this->db->select("sbd")->like('prize',"High Distinction")->get("ikmc_students_result")->result_array();
		}
	}
	?>	