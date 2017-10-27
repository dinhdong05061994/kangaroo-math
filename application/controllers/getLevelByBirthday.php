<?php 
	class GetLevelByBirthday extends CI_Controller{
		public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper("url");
        
    }
    	function GetLevelByBirthday(){
    		$users = $this->db->get('user_registration');
    		foreach ($users as $key => $user) {
    			$birthday = $user['birthday'];
    			$count1 = 0;
    			$count2 = 0;
    			$count3 = 0;
    			if($birthday !== NULL){
    				if(strpos($birthday, "-")!==false){
    					$count1++;
    				}elseif (strpos($birthday, "/")!==false) {
    					$count2++;
    				}
    			}else{
    				$count3++;
    			}
    		}
    		echo "birthday has - :".$count1."<br>";
    		echo "birthday has / :".$count2."<br>";
    		echo "birthday has null :".$count3."<br>";

    	}
	}
 ?>