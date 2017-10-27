<html xmlns="https://www.w3.org./1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset = utf-8" />
    <meta http-equiv="Content-Language" content="vi" />
    <?php $this->load->view("commons/title_all")?>
    <base href="<?php echo base_url();?>"/>
    <link href="<?php echo base_url();?>css/violympic/tracnghiem.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>css/violympic/style.css" rel="stylesheet" type="text/css"/>
     <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.jslatex.forTest.js"></script>    
    <script type="text/javascript" async
  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML">
</script>
<script type="text/x-mathjax-config">
    MathJax.Hub.Config({
      tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
    });
    MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
</script>
<script type="text/javascript">
</script>
   
</head>
<style>
    .latex{
        padding-bottom: 8px !important;
        font-weight: bold !important;
    }
    .q_done_button{
        width: 60% !important;
        padding-bottom: 15px !important;
    }
    #google_translate_element{
            
    }
    .alert-info {
        color: #31708f;
        background-color: #d9edf7;
        border-color: #bce8f1;
    }
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
</style>
<script>
    //To type latex
    onload = function() {
      
    }
      var lang = "<?php echo $lang;?>";
    
    
    $(document).ready(function(){
        $("#close_msg").click(function(){
            $("#msg_num_question").html("");
        });
    });
</script>


<body>  
<!-- Chống chuột phải -->
<!-- <body  onselectstart="return false" oncontextmenu="return false">   -->
    <?php //$this->load->view('commons/header_all')?>
    
    <div class="q_wrapper">
        
    <form name="form" id="form">
        <div class="q_header">
            <!--img src="<?php echo base_url();?>images/violympic/test_banner.png"/-->
        </div>
        
        <div class="q_content area_translate" >
            <div class="q_info" style="margin-top:0px;">
                <div id="infotest">
                    
                    <div id="q_line_info_time_test" class="q_line_info_time_test" style="/*line-height: 45px;*/
    color: yellow;
   /* height: 45px;*/
    text-align: center;
  /*   
    width: 88%;*/
    margin: 0;
    padding: 15px;
    padding-left: 105px;
    font-family: Arial, Helvetica, sans-serif;    background-color: #48075f!important;">
                        <center><p class="q_txt_time" style="color: yellow;">
                        Số câu hỏi: <?=count($arrayQuestion);?>
                        </p>
                        </center>
                    </div>
                </div>
                
                <div class="q_result_test" id="ketquatest" style="display: none;">
                    <div class="q_img_result_test"><img class="q_imgEmotion" id="imgEmotion" /></div>
                     
                </div>
                
            </div>
            
            <div class="q_list-question">      
                        

                    <?php
                    if(isset($arrayQuestion) && $arrayQuestion != null)
                    {
                        $i = 0;
                    ?>
                    
                        <input id="listquestion-num" type="hidden" value="<?php echo count($arrayQuestion)?>"/>
                        
                    <?php
                        foreach($arrayQuestion as $question)
                        {   
                            $i++;
                    ?>
                            <div class="q_question">
                                <div class="q_question_info">
                                    <div class="q_question_name" id="q_question_name_<?php echo $i; ?>" >
                                        <p id="q_question_name1_<?php echo $i; ?>" style="border: 1px solid green;
    color: #F60;
    word-spacing: 2px;
    padding: 8px;
    border-radius: 5px;
    font-size: 14px;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;">
                                        <?php 
                                            echo  $lang == 'vi' ? 'Câu hỏi mã '.$question['id'].' ' :"Question id ".$question['id']." ";
                                        ?> 
                                        </p>
                                    </div> 
                                    <input type="hidden" name="idCau<?php echo $i; ?>" id="idCau<?php echo $i; ?>" value="<?php echo $question['id']; ?>" />
                                    <input type="hidden" name="loaiCau<?php echo $i; ?>" id="loaiCau<?php echo $i; ?>" value="1" />

                                    <input type="hidden" name="levelCau<?php echo $i; ?>" id="levelCau<?php echo $i; ?>" value="<?php echo $question['part'] == 'A' ? '1' :($question['part'] == 'C' ? '3' : ($question['part'] == 'B' ? '2' : $question['part'])); ?>" />
                                    <input type="hidden" name="diemCau<?php echo $i; ?>" id="diemCau<?php echo $i; ?>" value="<?php echo  $question['mark'];//echo $question_point[$question['year']][$question['id_code']];?>" />
                                </div>
                                <div class="q_question_body">
                                    <div class="q_question_content">
                                    <?php
                                        if($question['content'] != null && trim($question['content']) != "")
                                        {
                                    ?>
                                            <div class="q_question_text" style="font-weight: bold;">
                                            <?php 
                                                echo $question['content']; 
                                            ?> 
                                           
                                            </div>
                                    
                                    <?php
                                        }
                                        
                                    ?>
                                    
                                    </div>
                                                                                                  
                                <?php
                                
                                    if(($question['hint'] != null && trim($question['hint'] != "<p></p>")) )
                                    {
                                ?>
                                    
                                    <div class="q_question_hint" id="question-hint-<?php echo $i?>">
                                    
                                            <div class="q_question_hint_text">
                                                <?php echo $lang == 'vi' ? 'Gợi ý: '. $question['hint'] : 'Solution: '.$question['hint'];?>
                                    
                                    </div>
                                <?php
                                        
                                    }
                                ?>
                                    <div class="col-sm-12 q_question_answer" style="float: left;">
                               
                                <?php   
                                        
                                    
                                  
                                        $wrong_ans_db = 4;
                                        $wrong_ans_test = 4;
                                        for($k = 1; $k <= $wrong_ans_db; $k++)
                                        {
                                             $arrayIndexAns[$k-1] = $k;
                                        }
                               
                                        if(isset($arrayIndexAns) && $arrayIndexAns != null) shuffle($arrayIndexAns); //trộn mảng
                                        $j = rand(0, $wrong_ans_test); //sinh ngẫu nhiên vị trí để đặt đáp án đúng
                                        for($k = $wrong_ans_test; $k >$j ; $k--) //lùi các giá trị từ j trở đi, ra sau 
                                        {   
                                            $arrayIndexAns[$k] = $arrayIndexAns[$k-1];
                                        }
                                
                                        $arrayIndexAns[$j] = 0; //chèn đáp án đúng vào vị trí j
                                
                                    
                                        for($k = 0; $k <= $wrong_ans_test; $k++)
                                        {
                                            if($arrayIndexAns[$k] == 0)
                                            {
                                                $ans_content = $question['right_ans'];
                                                // $ans_img = $question['ra_img'];
                                            }
                                            else
                                            {
                                                $ans_content = $question['wrong_ans_'.$arrayIndexAns[$k]];
                                                // $ans_img = $question['wa_img_'.$arrayIndexAns[$k]];
                                            }
                                ?>
                                            <div class=" q_answer_line" style="float: left!important; <?php echo empty($ans_content)? 'min-width: 0;':'';?>">
                                                <!--<div class="q_answer_radio">-->
                                                     
                                                <!--</div>-->
                                                
                                                <div class="q_answer_content" id="Cau<?php echo $i."-".$k; ?>">
                                        
                                                		<input type="radio" name="Cau<?php echo $i; ?>" id="Cau<?php echo $i."_".$k; ?>" value="<?php echo $k; ?>"     <?php echo $j == $k ? 'style="position: relation;"':'';?> <?php echo empty($ans_content)?'hidden' :'';?>/>
                                                		<?php echo $j == $k ? "<img id='dapandung_".$i."' src='".base_url()."images/test_question/dung.png' style='    width: 20px; margin-right: -20px; margin-top: -30px;position: absolute;float:left;display:none;'>":""?>  
                                                <?php
                                                    if($ans_content != null && trim($ans_content) != ""){
                                                ?>
                                                        <div class="q_answer_text">
                                                            
                                                            <?php echo $ans_content; ?>                                                      </div>
											
                                                <?php
                                                    }
                                                    
                                                ?>
                                               </div>
                                                
                                            </div>
                                
                                <?php
                                        }
                                        $arrayIndexAns = null;
                                ?>
                                
                                            <input type="hidden" name="DACau<?php echo $i; ?>" id="daCau<?php echo $i; ?>" value="<?php echo $j; ?>" />
                                
                                
                                    </div>
                                    
                                    <div style="float: none;">
                                        <h5><b style="color: blue;">Đáp án:</b> <?=$question['right_ans'];?></h5>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }else{
                        echo $lang =='vi'?"Không có câu hỏi nào!":"No question!";
                    }
                    ?>
            </div>
        </div>
        <div id="q_cat_skein" style="position: fixed;margin-right: 2em; width: 12em;margin-bottom: 2em;float: right; clear: none;">
                 
        </div>
        
    </form>
    
    
    </div>
    
    
<!-- <div class="timedownd" id="timedownd" style="
    width: 170px;
    background: #248AB2;
    float: right;
    position: fixed;
    bottom: 0px;
    right: 18px;
    font-size:25px;
    border: solid 1px #fff;
    border-radius: 1px;
"><center><span id="txtTime1" style="color:#fff;
    width: 67px;
    height: 72px;"></span></center></div> -->
<!--PHAN FOOTER CUA TRANG WEB-->

</body>

