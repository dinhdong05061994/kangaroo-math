<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $this->load->view("commons/title_all");?>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="css/template.css" />
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>
	<div class="wapper">
	<?php 
        $this->load->view("commons/header_all");
        $this->load->view("commons/slide_header");
    ?>
    <div class="container">
    	
			<section class="row ct">
           	<!--End .Nav-->
            <div class="row">
            	<?php $this->load->view("commons/left_menu");?>
                <div class="col-sm-9 content">
            	<h3>Giới Thiệu Kỳ Thi  </h3>
                <div class="row content-title">
<div style="margin-left:15px; font-family:Tahoma, Geneva, sans-serif; padding-right:15px;; height:200px; overflow:hidden" class="row">               
<span>
                	<?php echo $arg['introduce_competition_short'];?>
</span>
</div>
 <span class="pull-right"><a href="<?php echo base_url();?>home/action/introduce_competition">Xem Thêm</a></span>
                </div>
                <h3>H&#432;&#7899;ng D&#7851;n D&#7921; Thi </h3>
                <div class="row">
                <?php
                    foreach($arr_title as $title){
                ?>
                	<div class="col-sm-3 hd-item">
                    	<div style="background:<?php echo $color_background[$title];?>; border:1px solid <?php echo $color_background[$title];?>;" class="alert1"><?php echo $title_view[$title];?></div>
                        <div class="row">
                            <span class="hd-item-title">
                                <?php echo $arg[$title."_short"];?>
                            </span>
                        </div>
                        <span data-toggle="modal" data-target="#demo" class="pull-right xemthem">
                        	<a href="<?php echo base_url();?><?php echo $title;?>">Xem thêm</a>
                        </span>
                    </div><!--End hd-item-->
                 <?php
                    }
                 ?>
                </div>
 <?php $this->load->view("commons/list_donors")?>
            </div><!--End .Content-->
            </div>
            </section>
       
        </div>
	
    
    <?php $this->load->view("commons/footer_all");?>
    
    </div>
    <!--Modal--->
    
</body>
</html>