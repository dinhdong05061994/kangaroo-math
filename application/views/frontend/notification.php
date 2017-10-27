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
     
   
    
</head>
<style type="text/css">
    #form .btn{
        width: 50%;
        margin-top: 30px;
        font-size: 20pt;
    }
    .modal-text{
        padding: 0px 20px 30px 0px;
        font-size: 20pt;
        text-align: center;  
    }
</style>

<body>
    	<section style="width:100%;" class="container">
        	<?php $this->load->view("ikmc/commons/header_all");?>
            <section class="content">
            	
            	<section class="baithithu">
                	
                    <div style="width:80%; margin:0px auto;">
                    	<div class="row">
                			<section class="row ct">
                           	<!--End .Nav-->
                                <div style="margin: 50px; padding: 10px; background: #e8dcdc; border: solid 1px; border-radius: 5px; font-size: 14pt;">
                                    <p style="font-size: 28pt;"><?php echo $content;?></p>
                                    <?=$lang == "en"? 'Click <a href="<?php echo $back;?>">Back</a>' : 'Chọn <a href="<?php echo $back;?>">quay lại</a>  để trở về trang cá nhân.';?> 
                                </div>
                                
                                
                                    
                            </section>

                        </div>
                	</div>
                    
                </section>
            </section><!--End .baithithu-->
        </section>
    <?php $this->load->view("ikmc/commons/footer_all");?>
    
                
               
               
                
                           
</body>
   


</html>