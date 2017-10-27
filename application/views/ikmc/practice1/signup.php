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
                        <h2>REGISTER NEW ACCOUNT</h2>
                    </section>
                   <div style="margin-left:-30px;" class="row">
                         <form id="frm_signup" role="form" action="ikmc_practice/savesignup" method="POST">
                                <div style="margin-left:0px;" class="form-group">
                                   <label class="col-sm-4"><?php echo $lang == "vi" ? "Họ và tên" : "Full name"?></label>
                                   <input class="col-sm-8" name="fullname" type="text" class="form-control" placeholder="<?php echo $lang == "vi" ? "Họ và tên" : "Full name"?>" >
                                </div>
                                <div style="margin-top:15px;" class="form-group col-sm-12">
                                  <label class="col-sm-4" for="sel"><?php echo $lang == "vi" ? "Giới tính" : "Gender"?></label>
                                  <select style="height:45px;" name="gender" class="col-sm-3" class="form-control" id="sel">
                                    <option value="1"><?php echo $lang == "vi" ? "Nam" : "Male"?></option>
                                    <option value="0"><?php echo $lang == "vi" ? "Nữ" : "Female"?></option>
                                  </select>
                                </div>
                                
                                <div class="form-group col-sm-12">
                                   <label class="col-sm-4"><?php echo $lang == "vi" ? "Ngày sinh" : "Birthday"?></label>
                                   <input class="col-sm-8"  name="birthday" type="date" class="form-control" placeholder="dd/mm/yy" />
                                   
                                </div>
                                <div class="form-group col-sm-12">
                                   <label class="col-sm-4"><?php echo $lang == "vi" ? "Trường học" : "School"?></label>
                                   <input class="col-sm-8" name="school" type="text" class="form-control" placeholder="<?php echo $lang == "vi" ? "Trường học" : "School"?>" />
                                   
                                </div>
                                <div class="form-group col-sm-12">
                                   <label class="col-sm-4"><?php echo $lang == "vi" ? "Địa chỉ nhà riêng" : "Address"?></label>
                                   <input class="col-sm-8" name="address" type="text" class="form-control" placeholder="<?php echo $lang == "vi" ? "Địa chỉ nhà riêng" : "Address"?>" />
                                   
                                </div>
                                <div class="form-group col-sm-12">
                                   <label class="col-sm-4"><?php echo $lang == "vi" ? "Số điện thoại" : "Phone number"?></label>
                                   <input class="col-sm-8" name="phone" type="number" class="form-control" placeholder="<?php echo $lang == "vi" ? "Số điện thoại" : "Phone number"?>" />
                                   
                                </div>
                                <div class="form-group col-sm-12">
                                   <label class="col-sm-4"><?php echo $lang == "vi" ? "Họ tên phụ huynh" : "Parent name"?></label>
                                   <input class="col-sm-8" name="parent" type="text" class="form-control" placeholder="<?php echo $lang == "vi" ? "Họ tên phụ huynh" : "Parent name"?>" />
                                   
                                </div>
                                <div class="form-group col-sm-12">
                                   <label class="col-sm-4">Email</label>
                                   <input class="col-sm-8" name="email" type="email" class="form-control" placeholder="Email" />
                                   
                                </div>
                                <div class="form-group col-sm-12">
                                   <label class="col-sm-4"><?php echo $lang == "vi" ? "Tên đăng nhập" : "User name"?></label>
                                   <input class="col-sm-8" name="nickname" type="text" class="form-control" placeholder="<?php echo $lang == "vi" ? "Tên đăng nhập" : "User"?>" />
                                   
                                </div>
                                <div class="form-group col-sm-12">
                                   <label class="col-sm-4"><?php echo $lang == "vi" ? "Mật khẩu" : "Password"?></label>
                                   <input class="col-sm-8" name="password" id="pass" type="password" class="form-control" placeholder="<?php echo $lang == "vi" ? "Mật khẩu" : "Password"?>" />
                                   
                                </div>
                                <div class="form-group col-sm-12">
                                   <label class="col-sm-4"><?php echo $lang == "vi" ? "Xác nhận mật khẩu" : "Confirm password"?></label>
                                   <input class="col-sm-8" id="re_pass" type="password" class="form-control" placeholder="<?php echo $lang == "vi" ? "Xác nhận mật khẩu" : "Confirm password"?>" />
                                   
                                </div>
                                    
                                <div style="left:215px;" class="form-group col-sm-12" style="text-align:center;">
                                <button type="button" id="btn_signup" class="btn btn-default clearfix">
                                    <?php echo $lang == "vi" ? "ĐĂNG KÝ" : "SUBMIT"?>
                                </button>
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
