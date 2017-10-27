<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php $this->load->view("commons/title_all");?>
    <base href="<?php echo base_url();?>"></base>
    
    <script type="text/javascript" src="<?php echo base_url();?>js/lms-main_vendor.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/ikmc.js"></script>
     <link href="<?php echo base_url();?>css/practice_doing.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/ikmc.css" />
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.jslatex.forTest.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/competition-month.js"></script> 
    <script type="text/javascript" async
      src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML">
    </script>   
    
</head>
<script type="text/javascript">
   history.replaceState( {} , '', 'competition_month' );
</script>

<body>
    <input type="hidden" value="<?=$lang;?>" id="lang"></input>
    	<section style="width:100%;" class="container">
        	<?php $this->load->view("ikmc/commons/header_all");?>
            <section class="content">
            	
            	<section class="baithithu">
                	
                    <div style="width:80%; margin:0px auto;">
                    	<div class="row">
                			<section class="row ct">
                           	<!--End .Nav-->
                                <form name="form" id="form">
                                    <div class="result_test" id="box_wait" style="margin-top: 45px;" >
                                        
                                        <div class="info_line text-center" style="font-size: 60pt;" id="time_wait">
                                            00:00:00
                                        </div>
                                        
                                    </div>
                                    <div class="result_test" id="result_test" hidden="" style="margin-top: 45px;" >
                                        <div class="info_line">
                                            <?=($lang == "en" ? 'Score:':'Điểm:')?> 
                                            
                                        </div>
                                        <div class="info_line">
                                            <span class="mark_test" id="mark_test">0</span>
                                        </div>
                                        <div class="info_line">
                                            <?=($lang == "en" ? 'Correct:':'Số câu làm đúng:')?>  <span id="num_right_ans" class="num_right_ans">0</span>
                                        </div>
                                        <div class="info_line">
                                            <?=($lang == "en" ? 'Wrong:':'Số câu làm sai: ')?><span class="num_wrong_ans" id="num_wrong_ans">0</span>
                                        </div>
                                        <div class="info_line">
                                            <?=($lang == "en" ? 'Not done:':'Số câu không làm:')?><span class="num_empty_ans" id="num_empty_ans">0</span>
                                        </div>
                                        <div class="info_line">
                                            <?=($lang == "en" ? 'Jump length:':'Bước nhảy dài nhất:')?><span class="num_empty_ans" id="jump_max_length">0</span>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="action_after" id="action_after" onclick="review();" hidden="">
                                            <?=($lang == "en" ? 'Review':'Xem lại bài làm')?> 
                                        </div>
                                    <div class="action_after" id="action_to_rank_after" hidden="">
                                        <a href="<?php echo base_url() . 'competition_month/rank'?>" target="_blank">
                                            <?=($lang == "en" ? 'View the Month competition month rank':'Xem bảng xếp hạng kỳ thi tháng')?> </a>
                                    </div>
                                        
                                    <div class="contents" id="contents" hidden="">
                                        <input id="current_time" value="<?php echo $current_time;?>">
                                        <input id="start_time" value = "<?php echo $start_time;?>">
                                        <input id="time_test" value="<?php echo $time_test;?>">
                                    </div>
                                    
                                    
                                    
                                </form>
                                <div class="submit_form" id="submit_form" hidden="">
                                    <img src="<?php echo base_url();?>img/kangaroo/dong_ho.png"/>
                                    <b id="txtTime" class="time_test">00:00</b>
                                    <div class="end_test" onclick="submit_form();"><?=($lang == "en" ? 'Submit:':'Nộp bài:')?></div>
                                    
                                </div>
                                    
                            </section>

                        </div>
                	</div>
                    
                </section>
            </section><!--End .baithithu-->
        </section>
    <?php $this->load->view("ikmc/commons/footer_all");?>
    
                
               
               
                
                           
</body>
   
<script type="text/javascript">
    loadTime();
</script>

</html>
