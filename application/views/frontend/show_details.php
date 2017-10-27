<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url();?>"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $this->load->view("commons/title_all")?>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="css/template.css" />
<link type="text/css" rel="stylesheet" href="css/detail.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Kangaroo, toan hoc kangaroo, khoa hoc , kangaroo viet nam" />
<meta name="description" content="Viet Nam math Kangaroo " />
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script>
												$(document).ready(function(e) {
													$('.xemthem').click(function(e) {
														$(".promo1").animate({width: '176px'}, 2000);
														$(".promo2").animate({width: '176px'}, 3000);
														$(".promo3").animate({width: '176px'},4000);
                                                    });
                                                    
                                                });
                                                            
															</script>  
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
             	<div class="row">
            		<h2 class="col-sm-12"><span class="pull-left"><?php echo $title_view[$current_view];?></span><span class="pull-right">Xem Thêm </span></h2>
                    <div class="col-sm-9 hd-detail">
                    	<?php echo $arg[$current_view];?>
                    </div><!--End hd-detail-->
                    <div class="col-sm-3 content-right">
       	                <?php
                            foreach($arr_title as $title)
                            {
                                if($title != $current_view)
                                {
                        ?>
                                                	<div class="col-sm-12 hd-item">
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
                            }
                          ?>                
                              
                        </div>
                                                
                </div>
                <div style="margin-top:40px; margin-left:15px;" class="row">
                <h4 style="">Xem Thêm :</h4><span class="label label-success">Đăng ký dự thi</span><span class="label label-success">Tài liệu</span><span class="label label-success">Địa chỉ dự thi</span><span class="label label-success">Hướng dẫn đang ký</span>
                </div>
                <?php $this->load->view("commons/list_donors")?>
            </div><!--End .Content-->
            </div>
            </section>
        
        </div>
	
    
    <?php $this->load->view("commons/footer_all");?>
	
    
    </div>
    
</body>
</html>
