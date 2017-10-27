<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
         <?php $this->load->view("commons/title_all");?>
        
        
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="css/ikmc.css" />

        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="js/ikmc.js"></script>

      <style type="text/css">
          .tracuu .form-group label{
            font-size: 17px;
            font-weight: 100;
          }
          .row {
              margin-right: 0;
              margin-left: 0;
          }
          .tracuu .form-group input {
            font-size: 17px;
          }
      </style>
      </head>
        <body>
    
        <section class="container">
            <?php //$this->load->view("competition_month/commons/header_all");?>
              <?php $this->load->view("ikmc/commons/header_all");?>
            <section class="content" id="content">
                <section class="container-2 clearfix tracuu">
                    <section style="text-align:center" class="col-sm-12 title">
                        <h2 style="font-size: 26px;"><?php echo $lang == "vi" ? "ĐĂNG NHẬP THI THỬ CUỘC THI HÀNG THÁNG" : "LOGIN TEST COMPETITON MONTHLY"?></h2>
                    </section>
                   <div class="row">
                      <?php echo ($this->session->flashdata("flash_error") ?  '<div class="alert" style="margin-top: 65px; font-size:16px; text-align:center; color:red;">'.$this->session->flashdata("flash_error")."</div>" : "");?>
                         <form role="form" action="" method="POST">
                                <div style="margin-bottom: 0px;" class="form-group">
                                   <label class="col-sm-3"><?php echo $lang == "vi" ? "Tên đăng nhập" : "Username"?></label>
                                   <input class="col-sm-8" name="nickname" type="text" class="form-control" placeholder="<?php echo $lang == "vi" ? "Tên đăng nhập" : "Username"?>" >
                                </div>
                                
                                <div class="form-group col-sm-12" style="margin-top: 20px;">
                                   <label class="col-sm-3"><?php echo $lang == "vi" ? "Mật khẩu" : "Password"?></label>
                                   <input class="col-sm-8"  name="pass" type="password" class="form-control" placeholder="<?php echo $lang == "vi" ? "Mật khẩu" : "Password"?>" />
                                   
                                </div>
                                    
                                <div class="form-group col-sm-12" style="text-align:center;">
                                <button type="submit" class="btn btn-default clearfix">
                                    <?php echo $lang == "vi" ? "ĐĂNG NHẬP" : "LOGIN"?>
                                </button>
                                
                                </div>
                                
                            </form> 
                   </div>
               </section>
                <?php //$this->load->view("competition_month/commons/organizers");?>
                <?php $this->load->view("ikmc/commons/footer_all");?>
            </section>
        </section>
                   
           
           
       
    </body>
   
</html>
