<?php

	class ConvertFullnameToNickname extends CI_Controller
	{
	
	
	public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper("url");
		$this->load->library('session');
        
    }
    function convertVietnameseString($str) {
// In thường
     $str = strtolower(trim($str));
     $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
     $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
     $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
     $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
     $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
     $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
     $str = preg_replace("/(đ)/", 'd', $str);    
// In đậm
     $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
     $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
     $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
     $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
     $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
     $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
     $str = preg_replace("/(Đ)/", 'D', $str);
     $str = preg_replace("/( )/","",$str);
     $str = strtolower(trim($str));
     return $str; // Trả về chuỗi đã chuyển
}  
	function testConvert(){
		echo $this->convertVietnameseString("   Nguyễn Hạnh Phúc   ");

	}
	function convertAllFullnameToNickname(){
		$allusers = $this->db->get('user_registration')->result_array();
		$count = 0;
		foreach($allusers as $user){
			$datestring = $user['create_date'];
			$date1 = explode(' ', $datestring);
			$date2 = "2016-09-20";
			
			if(strtotime($date1[0])<strtotime($date2)){
				//if($user['nickname'] === "" || $user['nickname'] === null){
					$user['nickname'] = $this->convertVietnameseString($user['fullname']);
				$this->db->where('id', $user['id']);
				$this->db->update('user_registration', $user);
				//}
				
			}else{
				
				$count++;
			}
			
		}
		echo $count;
		// $datestring = $usertest[0]['create_date'];
		// $date1 = explode(' ', $datestring);
		// $date2 = "2016-09-20";
		// if(strtotime($date1[0])>strtotime($date2)){
		// 	echo 'true';
		// }else{
		// 	echo 'false';
		// }
	}
	function changeUserBefore20SeptemberToRegisteredUser(){
		$allusers = $this->db->get('user_registration')->result_array();
		$count = 0;
		foreach($allusers as $user){
			$datestring = $user['create_date'];
			$date1 = explode(' ', $datestring);
			$date2 = "2016-09-20";
			
			if(strtotime($date1[0])<strtotime($date2)){
				//if($user['nickname'] === "" || $user['nickname'] === null){
					$user['status'] = 1;
				$this->db->where('id', $user['id']);
				$this->db->update('user_registration', $user);
				//}
				
			}else{
				
				$count++;
			}
			
		}
		echo $count;
	}
	function getLevel(){
    		$users = $this->db->where('level','<1')->get('user_registration')->result_array();
    		$count1 = 0;
    			$count2 = 0;
    			$count3 = 0;
    		foreach ($users as $key => $user) {
    			//var_dump($user);
    			//break;
    			$birthday = $user['birthday'];
    			
    			if($birthday !== NULL){
    				if(strpos($birthday, "-")!==false){
    					$year = substr($birthday, 0,4);
    					if(is_numeric($year)){
    						if($year >= 2009 && $year <= 2010){
    							$user['level'] = 1; 
    						}else if($year >= 2007 && $year <= 2008){
    							$user['level'] = 2;
    						}else if ($year >=2005 && $year <= 2006) {
    							$user['level'] = 3;
    						}else if ($year >=2003 && $year <=2004) {
    							$user['level'] = 4;
    						}
    						$this->db->where('id', $user['id']);
    						$this->db->update('user_registration', $user);
    					}
    				}elseif (strpos($birthday, "/")!==false) {
    					//$count2++;
    				
    					$year =  substr($birthday, -4,4);
    						if(is_numeric($year)){
    						if($year >= 2009 && $year <= 2010){
    							$user['level'] = 1; 
    						}else if($year >= 2007 && $year <= 2008){
    							$user['level'] = 2;
    						}else if ($year >=2005 && $year <= 2006) {
    							$user['level'] = 3;
    						}else if ($year >=2003 && $year <=2004) {
    							$user['level'] = 4;
    						}
    						$this->db->where('id', $user['id']);
    						$this->db->update('user_registration', $user);
    					}
    				}
    			}else{
    				$count3++;
    			}
    		}
    		//echo "birthday has - :".$count1."<br>";
    		//echo "birthday has / :".$count2."<br>";
    		//echo "birthday has null :".$count3."<br>";

    	}
}
?>