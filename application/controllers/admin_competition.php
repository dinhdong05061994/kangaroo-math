
<?php
class Admin_competition extends CI_Controller
{
	public function __construct() {
        parent::__construct();
        // kiem tra trang thia dang nhap
        //$this->load->model(array('home_model'));
        $this->load->library('grocery_CRUD'); 
        $this->load->helper("url");
		$this->load->library('session');
    }
	function _example_output($output = null)
    {          
            $this->load->view('backend/admin',$output); 
    }
    function competition_monthly_question() {
        $this->load->model(array('competition_model','adminmodel'));
        $add_data['user'] = $this->session->all_userdata();
        if(isset($add_data['user']['admin']['id_user'])) {       
            $this->load->library('grocery_CRUD');   
            try{
                $crud = new grocery_CRUD(); 
                $crud->set_theme('datatables');
                $table_name = "competition_month";
                $crud->set_table($table_name);              
                
                $crud->set_subject("Quản lý bảng câu hỏi cuộc thi hàng tháng");
                
                $crud->required_fields('id','lang','part','id_topic','question_order','mark','time_test','level','content','right_ans','order_right_ans','wrong_ans_1','wrong_ans_2','wrong_ans_3','wrong_ans_4');
                //$crud->where('lecture_id', $lecture_id); //Limit the result with condition lecture_id = $lecture_id
                $crud->fields('lang', 'id_topic', 'part', 
                    'question_order', 'level','mark','time_test','content',
                    'order_right_ans','right_ans','wrong_ans_1',
                    'wrong_ans_2','wrong_ans_3','wrong_ans_4');
                $crud->columns(
                    'id', 'lang', 'id_topic', 'part', 
                    'question_order', 'level','mark','time_test','content',
                    'order_right_ans','right_ans','wrong_ans_1',
                    'wrong_ans_2','wrong_ans_3','wrong_ans_4');
                $crud->
                    display_as('id', 'Mã câu hỏi')->
                    display_as('lang', 'Ngôn ngữ')->
                    display_as('id_topic', 'Chuyên đề')->
                    display_as('part', 'Phần')->
                    display_as('question_order', 'Số thứ thự trong đề')->
                    display_as('level', 'Khối lớp')->
                    display_as('mark', 'Số điểm')->
                    display_as('time_test', 'Thời gian làm của câu hỏi(giây)')->
                    display_as('content', 'Nội dung câu hỏi')->
                    display_as('right_ans','Đáp án đúng')->
                    display_as('order_right_ans', 'Vị trí ĐA đúng trong 5 đáp án')->
                    display_as('wrong_ans_1', 'ĐA sai 1')->
                    display_as('wrong_ans_2', 'ĐA sai 2')->
                    display_as('wrong_ans_3', 'ĐA sai 3')->
                    display_as('wrong_ans_4', 'ĐA sai 4');         
                
                //callback
                
                $crud->field_type('level', 'dropdown', array('1'=>'Lớp 1-2', '2'=>'Lớp 3-4','3'=> 'Lớp 5-6', '4'=>'Lớp 7-8'));
                 $crud->field_type('part', 'dropdown', array('A'=>'A','B'=>'B','C'=>'C'));
                 $crud->field_type('lang', 'dropdown', array('vi'=>'Tiếng Việt','en'=>'English'));
                $crud->field_type('order_right_ans', 'dropdown', array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5')); 
                //thay doi ngay 031016            
                $crud->callback_add_field('id_topic',array($this,'add_topic_field'));
                $crud->callback_edit_field('id_topic',array($this,'edit_topic_field'));
                //end-1
                $crud->callback_add_field('mark',function(){
                $str='<style type="text/css">
                            #check_input #content_input .latex{
                                  clear: none;        
                                  float: none;        
                                  display: inline;
                                  position: relative;
                              }
                              
                              #check_input #content_input .latex_newline{
                                  clear: both;        
                                  float: none;
                                  text-align: center;
                                  position: relative;

                              }
                              #check_input {
                                  width: 23%;
                                  height: 20em;
                                  float: right;
                                  position: fixed;
                                  border-radius: 5px;
                                  bottom: 0;
                                  right:0;
                                  padding: 1em;
                                  background: #dfdfea;
                                  opacity: 0.8;
                                  z-index: 1100;
                                 
                                  color: #000;
                                  font-weight: 650;
                                  font-family: "Open Sans",Verdana,Geneva,sans-serif;
                                  font-size: 11pt;
                              }

                              #check_input:hover {
                                  opacity: 1.0;
                              }

                              #check_input header {
                                  background: none;
                                  width: 100%;
                                  height: 1.5em;
                                  margin-bottom: 0.8em;
                                  margin-top: 0em;
                                  padding: none;
                                  border: none;
                                  text-align: center;
                                  text-shadow: 0px 1px rgba(255, 255, 255, 0.4);
                                  color: #333;
                                  font-weight: 850;
                                  font-family: Georgia,Cambria,"Times New Roman",Times,serif;
                                  font-size: 1.3em;
                              }

                              </style>
                    <script type="text/javascript">
                        function check_input(value) {
                            var check = document.getElementById("content_input");
                            value = value.replace("<pre>","").replace("</pre>","");
                            value = value.replace("&lt;","\<").replace("&gt;","\>");
                            check.innerHTML = "" + value;
                            MathJax.Hub.Queue(["Typeset",MathJax.Hub,"content_input"]);
                       }'."
                       $(document).ready(function(){                
                            CKEDITOR.instances['field-content'].on('change', function () {
                                 check_input(CKEDITOR.instances['field-content'].getData());
                            });
                            CKEDITOR.instances['field-content'].on('focus', function () {
                              check_input(CKEDITOR.instances['field-content'].getData());
                            });
                             CKEDITOR.instances['field-right_ans'].on('change', function () {
                              check_input(CKEDITOR.instances['field-right_ans'].getData());
                            });
                            CKEDITOR.instances['field-right_ans'].on('focus', function () {
                              check_input(CKEDITOR.instances['field-right_ans'].getData());
                            });
                            //wrong_ans_1
                            CKEDITOR.instances['field-wrong_ans_1'].on('change', function () {
                              check_input(CKEDITOR.instances['field-wrong_ans_1'].getData());
                            });
                            CKEDITOR.instances['field-wrong_ans_1'].on('focus', function () {
                              check_input(CKEDITOR.instances['field-wrong_ans_1'].getData());
                            });
                            //wrong_ans_2
                            CKEDITOR.instances['field-wrong_ans_2'].on('change', function () {
                              check_input(CKEDITOR.instances['field-wrong_ans_2'].getData());
                            });
                            CKEDITOR.instances['field-wrong_ans_2'].on('focus', function () {
                              check_input(CKEDITOR.instances['field-wrong_ans_2'].getData());
                            });
                            //wrong_ans_3
                            CKEDITOR.instances['field-wrong_ans_3'].on('change', function () {
                              check_input(CKEDITOR.instances['field-wrong_ans_3'].getData());
                            });
                            CKEDITOR.instances['field-wrong_ans_3'].on('focus', function () {
                              check_input(CKEDITOR.instances['field-wrong_ans_3'].getData());
                            });
                            //wrong_ans_4
                            CKEDITOR.instances['field-wrong_ans_4'].on('change', function () {
                              check_input(CKEDITOR.instances['field-wrong_ans_4'].getData());
                            });
                            CKEDITOR.instances['field-wrong_ans_4'].on('focus', function () {
                              check_input(CKEDITOR.instances['field-wrong_ans_4'].getData());
                            });
                        });
                    </script>".'
                   <div id="check_input">
                      <header id = "head_show">Xem lại nội dung<hr/></header>
                      <div id="content_input" style="padding-top: 20px; overflow-y:auto; max-height: 220px; ">
                       
                      </div>
                    </div>';
                return  $str.'<input id="field-mark" name="mark" type="text" value="" class="numeric" maxlength="3">';
                });
                $crud->callback_edit_field('mark',function($value, $primary_key){
                    $str='<style type="text/css">
                                #check_input #content_input .latex{
                                      clear: none;        
                                      float: none;        
                                      display: inline;
                                      position: relative;
                                  }
                                  
                                  #check_input #content_input .latex_newline{
                                      clear: both;        
                                      float: none;
                                      text-align: center;
                                      position: relative;

                                  }
                                  #check_input {
                                      width: 23%;
                                      height: 20em;
                                      float: right;
                                      position: fixed;
                                      border-radius: 5px;
                                      bottom: 0;
                                      right:0;
                                      padding: 1em;
                                      background: #dfdfea;
                                      opacity: 0.8;
                                      z-index: 1100;
                                     
                                      color: #000;
                                      font-weight: 650;
                                      font-family: "Open Sans",Verdana,Geneva,sans-serif;
                                      font-size: 11pt;
                                  }

                                  #check_input:hover {
                                      opacity: 1.0;
                                  }

                                  #check_input header {
                                      background: none;
                                      width: 100%;
                                      height: 1.5em;
                                      margin-bottom: 0.8em;
                                      margin-top: 0em;
                                      padding: none;
                                      border: none;
                                      text-align: center;
                                      text-shadow: 0px 1px rgba(255, 255, 255, 0.4);
                                      color: #333;
                                      font-weight: 850;
                                      font-family: Georgia,Cambria,"Times New Roman",Times,serif;
                                      font-size: 1.3em;
                                  }

                                  </style>
                        <script type="text/javascript">
                            function check_input(value) {
                                var check = document.getElementById("content_input");
                                value = value.replace("<pre>","").replace("</pre>","");
                                value = value.replace("&lt;","\<").replace("&gt;","\>");
                                check.innerHTML = "" + value;
                                MathJax.Hub.Queue(["Typeset",MathJax.Hub,"content_input"]);
                           }'."
                           $(document).ready(function(){                        
                               CKEDITOR.instances['field-content'].on('change', function () {
                                 check_input(CKEDITOR.instances['field-content'].getData());
                                });
                                CKEDITOR.instances['field-content'].on('focus', function () {
                                  check_input(CKEDITOR.instances['field-content'].getData());
                                });
                                 CKEDITOR.instances['field-right_ans'].on('change', function () {
                                  check_input(CKEDITOR.instances['field-right_ans'].getData());
                                });
                                CKEDITOR.instances['field-right_ans'].on('focus', function () {
                                  check_input(CKEDITOR.instances['field-right_ans'].getData());
                                });
                                //wrong_ans_1
                                CKEDITOR.instances['field-wrong_ans_1'].on('change', function () {
                                  check_input(CKEDITOR.instances['field-wrong_ans_1'].getData());
                                });
                                CKEDITOR.instances['field-wrong_ans_1'].on('focus', function () {
                                  check_input(CKEDITOR.instances['field-wrong_ans_1'].getData());
                                });
                                //wrong_ans_2
                                CKEDITOR.instances['field-wrong_ans_2'].on('change', function () {
                                  check_input(CKEDITOR.instances['field-wrong_ans_2'].getData());
                                });
                                CKEDITOR.instances['field-wrong_ans_2'].on('focus', function () {
                                  check_input(CKEDITOR.instances['field-wrong_ans_2'].getData());
                                });
                                //wrong_ans_3
                                CKEDITOR.instances['field-wrong_ans_3'].on('change', function () {
                                  check_input(CKEDITOR.instances['field-wrong_ans_3'].getData());
                                });
                                CKEDITOR.instances['field-wrong_ans_3'].on('focus', function () {
                                  check_input(CKEDITOR.instances['field-wrong_ans_3'].getData());
                                });
                                //wrong_ans_4
                                CKEDITOR.instances['field-wrong_ans_4'].on('change', function () {
                                  check_input(CKEDITOR.instances['field-wrong_ans_4'].getData());
                                });
                                CKEDITOR.instances['field-wrong_ans_4'].on('focus', function () {
                                  check_input(CKEDITOR.instances['field-wrong_ans_4'].getData());
                                });
                            });
                        </script>".'
                       <div id="check_input">
                          <header id = "head_show">Xem lại nội dung<hr/></header>
                          <div id="content_input" style="padding-top: 20px; overflow-y:auto; max-height: 220px; ">
                           
                          </div>
                        </div>';
                    return  $str.'<input id="field-mark" name="mark" type="text" value="'.$value.'" class="numeric" maxlength="3">';
                });
                //them ngay 031016
                $crud->callback_column('id_topic',array($this,'topic_show'));
                $crud->callback_before_insert(array($this,'set_topic'));
                $crud->callback_before_update(array($this,'set_topic'));
                //end-2
                $output = $crud->render();              
                $this->_example_output($output);
                
            }catch(Exception $e){
                show_error(
                    $e->getMessage().
                    ' --- '.
                    $e->getTraceAsString());
            }
        }
        else{
            redirect("/index.php/admin/loginadmin");
        }
    }
    //them ngay 031016
     function set_topic($post_array){
        $temp = $post_array['id_topic'];
        $val_topic= implode(',', $temp);
        
        $post_array['id_topic'] = $val_topic;
        //var_dump($post_array);
        //$post_array['id_topic'] =$temp;
        return $post_array;
    }
    public function topic_show($value, $row)
    {
      $this->load->model('adminmodel');
      $topics = array();
      $m=0;
      $list_topic = $this->adminmodel->get_more_topic($value);
      foreach ($list_topic as $key => $val) {
         $topics[$m] = $val['name'];
         $m++;
      }
      $result = implode(",",$topics);
      return $result;
    }
    //end-3
    //them 05/10/16
    function add_topic_field(){
      $this->load->model('adminmodel');           
      $topic_test= $this->adminmodel->get_all_topic();
      //var_dump($topic_test_add);
        $textchange ='<link href="'.base_url().'css/multiple-select.css" rel="stylesheet"/>
        <script src="'.base_url().'js/multiple-select.js"></script>

        <select id="field-id_topic" multiple="multiple" name="id_topic[]" class="chosen-select chzn-done" data-placeholder="Chọn Chuyên đề">';
        foreach ($topic_test as $key => $topic) {
             $textchange .= '<option value="'.$topic['id'].'">'.$topic['name'].'</option>';
        }
        $textchange .='</select>'.
        '<script>
            $("#field-id_topic").multipleSelect({
                filter: true,
                
            });
        </script>
        <style>
        .ms-parent{
          min-width: 200px;
        }
        .ms-choice{
          font-size: 11pt;
          background-image: -webkit-linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
          background-image: -moz-linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
          background-image: -o-linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
          background-image: -ms-linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
          background-image: linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
        }
        </style>';
        return $textchange;
    }
    function edit_topic_field($value, $primary_key){
      $this->load->model('adminmodel'); 
      $topic_test = $this->adminmodel->get_all_topic();
      $list_topic = explode(",", $value);
      $textchange ='<link href="'.base_url().'css/multiple-select.css" rel="stylesheet"/>
      <script src="'.base_url().'js/multiple-select.js"></script>

      <select id="field-id_topic" multiple="multiple" name="id_topic[]" class="chosen-select chzn-done" data-placeholder="Chọn Chuyên đề">';
      foreach ($topic_test as $key => $topic) {
           $textchange .= '<option value="'.$topic['id'].'" '.(in_array($topic['id'] , $list_topic) ? 'selected="selected"':'').'>'.$topic['name'].'</option>';
      }
      $textchange .='</select>'.
      '<script>
          $("#field-id_topic").multipleSelect({
              filter: true,
              
          });
      </script>
      <style>
      .ms-parent{
        min-width: 200px;
      }
      .ms-choice{
        font-size: 11pt;
        background-image: -webkit-linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
        background-image: -moz-linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
        background-image: -o-linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
        background-image: -ms-linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
        background-image: linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
      }
      </style>';
      return $textchange;
  }
  //competition_month_time
  function competition_month_time(){
    $this->load->model(array('competition_model'));
    $data['all_row'] = $this->competition_model->getAllCompetition_month_time();
    $this->load->view("backend/view_competition_month_time", $data);
  }
  function view_edit($id){
    $this->load->model(array('competition_model'));
    $data['row'] = $this->competition_model->getCompetition_month_time($id);
    $this->load->view("backend/competition_month_time",$data);
  }
  function update_competition_month_time($id){
    $this->load->model(array('competition_model'));
    $data=array();
    if(isset($_POST['duration']) && $_POST['duration'] !=""){
      $data['duration'] = $_POST['duration']*60;
    }
    if(isset($_POST['begin_time']) && $_POST['begin_time'] !=""){
      $data['begin_time'] = $_POST['begin_time'];
    }
    if(isset($_POST['active']) && $_POST['active'] !=""){
      $data['active_that_moment'] = $_POST['active'];
    }
    //var_dump($data);
     $result =0;
    if(count($data) > 0){
      $result=$this->competition_model->updateCompetition_month_time($id,$data);
      //$result = 1;
    }
    echo $result;
    
  }
  //end competition_month_time
}

?>