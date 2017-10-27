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
    <script type="text/javascript" src="<?php echo base_url(); ?>js/competition-month-rank.js"></script> 
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
                                    
                                    <div class="contents text-center" id="contents">
                                        <input id="current_time" value="<?php echo $current_time;?>" hidden>
                                        <input id="view_time" value = "<?php echo $view_time;?>" hidden>
                                        <div style="font-size: 36pt; background: #a4d3e2; border-radius: 10px; padding: 50px 10px;"><?=$lang == "en" ? "Wait" : 'Bạn vui lòng chờ';?><span class="my_clock"> 00:00 </span> <?=$lang == "en" ? "to view rankings" : 'để xem bảng xếp hạng';?></div>
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
   
<style type="text/css">
    .myself{
        background: #ff8300;
        font-size: 18pt;
        font-weight: bold;
    }
    #info-send{
        display: none;
    }
    .my_clock{
        color: #ff4900;
        font-weight: bold;
    }
</style>

</html>