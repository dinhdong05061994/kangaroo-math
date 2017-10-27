<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <script src='https://www.google.com/recaptcha/api.js?hl=<?php echo $lang?>'></script>
        <?php $this->load->view("ikmc/commons/header_tag");?>
      </head>

        <body>
        <!-- <input id  = "check" value = "<?php //echo $_POST['g-recaptcha-response'];?>"/> -->
        <section class="container">
            <?php $this->load->view("ikmc/commons/header_all");?>
            <section class="content" id="content">
                
                <section class="clearfix tracuuphongthi">
                   	
                        <section class="pull-right tracuuphongthi-content">
                            <section class="col-sm-12 title">
                                <img style="margin-bottom:15px; margin-left:170px;" src="img/<?php echo $lang;?>_tracuuphongthi.png" />
                            </section>
                            <section class="clearfix tracuuphongthi-main">
                            	<form role="form" method="POST" id = "ff" action = "">
                                    <div class="form-group">
                                       <label class="col-sm-4 pull-left"><?php echo $lang == "vi" ? "Họ và tên" : "Fullname"?></label>
                                       <input style="left:8px;" class="col-sm-8" type="text" class="form-control" id = "namet" placeholder="<?php echo $lang == "vi" ? "Họ và tên" : "Fullname"?>" >
                                    </div>
                                    
                                    <div class="form-group clearfix ngaysinh col-sm-12">
                                    	<div>
                                       <label class="col-sm-3 pull-left"><?php echo $lang == "vi" ? "Ngày sinh" : "Birthday"?></label>
                                       <input class="col-sm-2"  type="text" class="form-control" id = "datet" placeholder="<?php echo $lang == "vi" ? "Ngày" : "Date"?>" />
                                       <input class="col-sm-2"  type="text" class="form-control" id = "montht" placeholder="<?php echo $lang == "vi" ? "Tháng" : "Month"?>"/>
                                       <input class="col-sm-3"  type="text" class="form-control" id = "yeart" placeholder="<?php echo $lang == "vi" ? "Năm" : "Year"?>"/>
                                      	</div>
                                    </div>
                                    	<div style="margin-left:130px;" class="col-sm-12">
                                        	<h5 style="margin-left:15px;"><?php echo $lang == "vi" ? "Vui lòng tích vào ô bên dưới" : "Please, tick on the checkbox."?></h5>
                                           <div style = "padding-left:30px; width:100%;" class="g-recaptcha col-sm-12" data-sitekey="6Ldv2hoTAAAAAAOp1bU5rUo0VvG_dQH3sWbgI-yg"></div>
                                           <!--  <textarea style="width:70%; background:#999;"></textarea> -->
                                        </div>
                                    	
                                    <div class="form-group col-sm-12" style="text-align:center;">
                                    <div type="submit" class="btn btn-default clearfix" id = "test" name = "submit" >
                                        <?php echo $lang == "vi" ? "TRA CỨU" : "SEARCH"?>
                                    </div>
                                    
                                    </div>
                                    <div style = "width:1000px; margin: 0 auto;clear: both;">
                                      <div id = "errornullt" hidden style = "margin-bottom: 30px;"></div>
                                    </div>
                                </form>	
                            </section>
                            
                        </section>

                   </section>
                  <div style = "width:1000px; margin: 0 auto;">
                    <div id = "showresultt" hidden style = "margin-bottom: 30px;"></div>
                  </div>
                 <?php $this->load->view("ikmc/commons/organizers");?>
                <?php $this->load->view("ikmc/commons/footer_all");?>
            </section>
        </section>
                   
            <?php $this->load->view("ikmc/register");?>
           
       
    </body>
   
</html>
