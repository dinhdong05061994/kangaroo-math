<?php
	/**
	* 
	*/
	class studentcard2017_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function get_all_students(){
			$sql ='SELECT ikmc_students.*, ikmc_schools.name as school_name, ikmc_venues.name as venue_name, ikmc_venues.address as venue_address from ikmc_students left JOIN ikmc_schools on ikmc_students.school_id = ikmc_schools.id LEFT JOIN ikmc_venues on ikmc_students.venue_id = ikmc_venues.id';
			return $this->db->query($sql)->result_array(); 

		}
			public function get_student($fullname, $birthday){
			$sql ='SELECT ikmc_students.*, ikmc_schools.name as school_name, ikmc_venues.name as venue_name, ikmc_venues.address as venue_address from ikmc_students left JOIN ikmc_schools on ikmc_students.school_id = ikmc_schools.id LEFT JOIN ikmc_venues on ikmc_students.venue_id = ikmc_venues.id WHERE fullname like "%'.$fullname.'%" and birthday="'.$birthday.'"';
			return $this->db->query($sql)->result_array(); 

		}
		public function get_student_by_id($id){
			return $this->db->where('id', $id)->get('ikmc_students')->first_row('array');
		}
		public function get_student_venue($venue_id){
			return $this->db->where('id',$venue_id)->get('ikmc_venues')->first_row('array');
		}
		// public function get_all_students(){
		// 	return $this->db->get('ikmc_students')->result_array();
		// }
		public function get_all_schools(){
			return $this->db->get('ikmc_schools')->result_array();
		}
		public function get_all_students_by_venue_id($venue_id, $level){
			return $this->db->where('venue_id', $venue_id)->where('level', $level)->order_by('class')->get('ikmc_students')->result_array();
		}
		public function get_all_venues(){
			return $this->db->where('id',10)->get('ikmc_venues')->result_array();
		}
		public function saveErrorReport($data){
			$this->db->insert('ikmc_error_report', $data);
		}
		public function get_all_reports(){
			return $this->db->query('SELECT ikmc_error_report.*, `ikmc_schools`.name as schoolname FROM `ikmc_error_report` JOIN ikmc_schools on ikmc_error_report.student_school_id=ikmc_schools.id ')->result_array();
		}
		public function delete_report($id){
			$this->db->where('id', $id)->delete('ikmc_error_report');
		}
		public function update_report_state($id, $state){
			$data = array(
				'state' => $state,
				);
			$this->db->where('id', $id)->update('ikmc_error_report', $data);

		}
		public function get_all_students_by_school($school_id){
				return $this->db->where('school_id', $school_id)->order_by('class')->get('ikmc_students')->result_array();
		}
		public function updateStudent($id,$data){
			$this->db->where('id',$id)->update('ikmc_students',$data);
		}
		public function updateReport($id, $data){
			$this->db->where('id', $id)->update('ikmc_error_report', $data);
		}
		public function deleteReport($id){
			$this->db->delete('ikmc_error_report',array('id'=>$id));
		}

	}
?>