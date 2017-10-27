<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php $this->load->view("commons/title_all");?>
    <base href="<?php echo base_url();?>"></base>
    
    <script type="text/javascript" src="<?php echo base_url();?>js/lms-main_vendor.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.1.min.js"></script>
    
     <link href="<?php echo base_url();?>css/practice_doing.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/ikmc.css" />
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.jslatex.forTest.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/competition-month-history.js"></script> 
    <script type="text/javascript" async
      src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML">
    </script>   
    
</head>


<body>
    	<section style="width:100%;" class="container">
        	<?php $this->load->view("ikmc/commons/header_all");?>
            <section class="content">
            	
            	<section class="baithithu">
                	
                    <div style="width:80%; margin:0px auto;">
                    	<div class="row">
                			<section class="row ct">
                           	<!--End .Nav-->
                                <form name="form" id="form">
                                    
                                    <div class="result_test" id="result_test"  style="margin-top: 45px;" >
                                        <div class="info_line">
                                            Điểm: 
                                            
                                        </div>
                                        <div class="info_line">
                                            <span class="mark_test" id="mark_test"><?php echo $obj_history['score'];?></span>
                                        </div>
                                        <div class="info_line">
                                            Giờ nộp bài: <span id="num_right_ans" class="num_right_ans"><?php echo $obj_history['time_end'];?></span>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    <div class="action_after" id="action_after" onclick="review();" >
                                            Xem lại bài làm
                                        </div>
                                    <div class="contents" id="contents" hidden="">
                                        <div class='list_question' id = 'list_question'>
                                        <?php
                                            $part = "0";
                                            $i = 0;
                                            foreach ($list_question as $question) {
                                                $i++;
                                                if($part != $question['part']){
                                                    $part = $question['part'];
                                                    echo "<div class='part'>Part " . $part . "</div>";
                                                }
                                        ?>
                                        
                                                <div class='one_question'>
                                                    <div class='question_header'>
                                                        <div class='question_order'>
                                                            <div class='order_view' style='background: <?php echo $question['result'] == 1 ? "#00c800" : "#fa0000"?>'>
                                                            <?php echo $i;?>
                                                            </div>
                                                        </div>
                                                        <div class='question_content'>
                                                            <?php echo $question['content'];?>
                                                        </div>
                                                    </div>
                                                    <div class='question_ans'>
                                                        <div class='ans_title'>Chọn đáp án đúng</div>
                                                        <div class='ans_content'>
                                                            <ul class='list-inline'>
                                        <?php
                                                            $offset = 0;
                                                            for ($j=1; $j <=5 ; $j++) { 
                                                                if($j == $question['order_right_ans']){
                                                                    $offset ++;
                                        ?>
                                                                    <li>
                                                                        <div class='ans_line'>
                                                                            <span class='right_check'></span>
                                                                            <input type='radio' />
                                                                            <?php echo $title_ans[$j].$question['right_ans'];?>
                                                                        </div>
                                                                    </li>
                                        <?php
                                                                }
                                                                else{
                                        ?>
                                                                    <li>
                                                                        <div class='ans_line'>
                                                                            <input type='radio' />
                                                                            <?php echo $title_ans[$j].$question['wrong_ans_'.($j-$offset)];?>
                                                                        </div>
                                                                    </li>
                                        <?php
                                                                }
                                                            }
                                        ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        ?>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                </form>
                                
                                    
                            </section>

                        </div>
                	</div>
                    
                </section>
            </section><!--End .baithithu-->
        </section>
    <?php $this->load->view("ikmc/commons/footer_all");?>
    
                
               
               
                
                           
</body>
   
<script type="text/javascript">
    
</script>

</html>