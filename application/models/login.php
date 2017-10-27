<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <?php $this->load->view("ikmc/commons/header_tag");?>
      </head>
        <body>
    
        <section class="container">
            <?php $this->load->view("ikmc/commons/header_all");?>
            <section class="content" id="content">
                <section class="container-2 clearfix tracuu">
                    <section style="text-align:center" class="col-sm-12 title">
                        <h2><?php echo $lang == "vi" ? ($this->uri->segment(1) == 'summer' ? "ĐĂNG NHẬP VÀO CÂU LẠC BỘ" :"ĐĂNG NHẬP THI THỬ") : "SIGN IN"?></h2>
                    </section>
                   <div class="row">
                   <hr>
</br>
                   
                         <form role="form" action="" method="POST">
                                <div style="margin-bottom: 0px;" class="form-group">
                                   <label class="col-sm-3"><?php echo $lang == "vi" ? "Tên đăng nhập" : "Account"?></label>
                                   <input class="col-sm-9" name="nickname" type="text" class="form-control" placeholder="<?php echo $lang == "vi" ? "Tài khoản" : "Account"?>" >
                                </div>
                                
                                <div class="form-group col-sm-12" style="margin-top: 20px;">
                                   <label class="col-sm-3"><?php echo $lang == "vi" ? "Mật khẩu" : "Password"?></label>
                                   <input class="col-sm-9"  name="pass" type="password" class="form-control" placeholder="<?php echo $lang == "vi" ? "Mật khẩu" : "Password"?>" />
                                   
                                </div>
                                    
                                <div class="form-group col-sm-12" style="text-align:center;">
                                <button type="submit" class="btn btn-default clearfix">
                                    <?php echo $lang == "vi" ? "ĐĂNG NHẬP" : "SIGN IN"?>
                                </button>
                                 <a href="ikmc_practice/signup" style="font-style:italic; margin-left:-120px; text-decoration:underline; font-size:13px;" class="clearfix"><h6><?php echo $lang == "vi" ? "Đăng ký tài khoản" : "Sign up"?></h6></a></label> 
                                </div>
                                
                            </form> 
                   </div>
               </section>
                <?php $this->load->view("ikmc/commons/organizers");?>
                <?php $this->load->view("ikmc/commons/footer_all");?>
            </section>
        </section>
                   
            <?php $this->load->view("ikmc/register");?>
           
       
    </body>
   
</html>
