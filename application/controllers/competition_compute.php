<?php
class Competition_compute extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper("url");
        
    }
    function check_ver_php(){
      phpinfo (); 
    }
    function jumptop20($level){
      
       $this->load->library('session');
        $this->load->model("export_model");
       $data['lists']=$this->export_model->jumptop20($level);
       //var_dump($data['lists']);

       foreach ($data['lists'] as $key=>$value) {
           $temp = explode(',', $value["jump"]);
           $str = "'";
           if(sizeof($temp) >=1){
                
               foreach ($temp as $v) {
                    $strtemp = explode("|", $v);
                    $str .= sizeof($strtemp) > 1 ? str_replace('"', '', $strtemp[1]) :'';
                 //var_dump($str);
               }
               $str .="'";
                $data['lists'][$key]["jump"] = $str;
                
           }
        $long = "";
       $num_long = 0;
       foreach ($data['lists'] as $key => $val) {
          $long = "";
          $num_long = 0;
           $temp_longjump = explode("0",$val["jump"]);
           //var_dump($temp_longjump);die;
           //if($key == 12 ){ var_dump($val["jump"]);var_dump($temp_longjump);die;}
           foreach ($temp_longjump as $jump) {
                if(strlen($jump) > $num_long){
                    $num_long = strlen(str_replace("'", '', $jump));
                    $long = $jump;                   
                }
           
            }
             $data['lists'][$key]["longjump"] = $num_long;
       }
       }
         //var_dump($data['lists']);
       $this->load->view("competition_month/export",$data);
    }
    function jump($level){
        $this->load->library('session');
        $this->load->model("export_model");
       $data['lists']=$this->export_model->jump($level);
       //var_dump($data['lists']);

       foreach ($data['lists'] as $key=>$value) {
           $temp = explode(',', $value["jump"]);
           $str = "'";
           if(sizeof($temp) >=1){
                
               foreach ($temp as $v) {
                    $strtemp = explode("|", $v);
                    $str .= sizeof($strtemp) > 1 ? str_replace('"', '', $strtemp[1]) :'';
                 //var_dump($str);
               }
               $str .="'";
                $data['lists'][$key]["jump"] = $str;
           }
          
       }
         //var_dump($data['lists']);
       $this->load->view("competition_month/export",$data);
    }
    function longest_jump(){// lấy ra 1 người có bước nhảy dài nhất, tiêu chí loại trừ khi trùng là : đầu tiên là điểm cao nhất, sau đó nếu trùng tiếp sẽ là  thời gian là bài ngắn nhất
      $this->load->library('session');
      $this->load->model("export_model");
      $levels = array("1"=>1, '2'=>2,'3'=>3);
      $result = array();
      foreach ($levels as $key_level => $level) {
        $data['lists']=array();
        $data['lists']=$this->export_model->jump($level);
     
        
       foreach ($data['lists'] as $one_key=>$value) {
          $temp = explode(',', $value["jump"]);
          $str = "'";
          if(sizeof($temp) >=1){
                
               foreach ($temp as $v) {
                    $strtemp = explode("|", $v);
                    $str .= sizeof($strtemp) > 1 ? str_replace('"', '', $strtemp[1]) :'';
                 //var_dump($str);
               }
                   $str .= "'";
                  $data['lists'][$one_key]["jump"] = $str;
             }
            
         }

         $long = "";
         $num_long = 0;
         $time = "";
         $score = 0;
         $arr['lists'] = array();
         $arr['lists'][0]=array();
         $m=1;
         foreach ($data['lists'] as $key => $val) {
             $temp_longjump = explode("0",str_replace("'","",$val["jump"]));
             
             $temp_time = (strtotime($data['lists'][$key]['time_end']) - strtotime($data['lists'][$key]['time_begin']));
              $temp_score = $val["score"];
              $jump = "";//bước nhảy lớn nhất của 1 người dùng
              $num_long_jump_member = 0;
             foreach ($temp_longjump as $jump_row) {
                if(strlen($jump_row) > $num_long){
                  $num_long_jump_member = strlen($jump_row);
                  $jump = $jump_row;
                }
              }
              if($num_long_jump_member > $num_long){
                  $num_long = $num_long_jump_member;
                  $time = $temp_time;
                  $score = $temp_score;
                  $long = $jump;
                  $arr['lists'] = array();
                  $arr['lists'][0] = $data['lists'][$key];

              }else
              if($num_long_jump_member == $num_long){
                if($temp_score > $score){
                  $time = $temp_time;
                  $score = $temp_score;
                  $long = $jump;
                  $arr['lists'] = array();
                  $arr['lists'][0] = $data['lists'][$key];
                }else if($temp_score == $score){
                  if($temp_time < $time){
                    $time = $temp_time;
                    $long = $jump;
                    $arr['lists'] = array();
                    $arr['lists'][0] = $data['lists'][$key];
                  }else if($temp_time == $time){
                    $arr['lists'][$m] = $data['lists'][$key];
                    $m++;
                  }
                }
                 
              }
         }
         $result[$key_level] = $arr['lists'][0];
         $arr['lists'] = array();
      }
      $result = json_encode($result);
       //  echo $long."-".$num_long;
       // echo '<pre>';
       //  var_dump($result);//mảng kết quả
       //  echo '</pre>';die;

        return $result;
       //$this->load->view("competition_month/export",$arr);//xuất excel
    }
    function test_jump_new($level){
        $this->load->model("export_model");
        $data['lists']=$this->export_model->test_jump_new($level);
        var_dump($data);
    }
    function del_user_history($id){
        $this->load->model("export_model");
        $this->export_model->del_user_history($id);
    }
    function insert_thread(){
      $this->load->model("export_model");
      $languages = array (1 => "vi", 2=> "en");
      for($i = 1; $i < 3; $i++) {
        $language = $languages[$i];
        for ($leveluser = 1; $leveluser < 5 ; $leveluser++) { 
          $this->export_model->insert_thread($leveluser,$language);
        }
        $this->export_model->insert_thread(17,$language);
      }

    }
    function delete_thread(){
      $this->load->model("export_model");
      $this->export_model->delete_thread();
    }
     function view_theard($level,$lang){
        $this->load->model("export_model");
        $data['lists']=$this->export_model->view_theard($level,$lang);
        var_dump($data);
    }
    
    function view_all_theard(){
        $this->load->model("export_model");
        $data['lists']=$this->export_model->view_all_theard();
        echo "<pre>";
        var_dump($data['lists']);
        echo "</pre>";
    }
    function view_user_history(){
        $this->load->model("export_model");
        $data['lists']=$this->export_model->view_user_history();
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }
    function update_level_competion_time(){
      $this->load->model("export_model");
       $this->export_model->update_level_competion_time();
    }
    function add_level_competition_time(){
      $this->load->model("export_model");
       $this->export_model->add_level_competition_time();
    }
    function all_topic(){
      $this->load->model("ikmc_model");
      var_dump($this->ikmc_model->load_list_chuyende());
    }
}
?>