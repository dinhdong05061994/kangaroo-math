<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <?php $this->load->view("ikmc/commons/header_tag");?>

      </head>
        <body>
    
        <section class="container">
            <?php $this->load->view("ikmc/commons/header_all");?>
            <script src="<?php echo base_url(); ?>assets/input-mask/jquery.inputmask.js"></script>
            <script src="<?php echo base_url(); ?>assets/input-mask/jquery.inputmask.date.extensions.js"></script>
            <script src="<?php echo base_url(); ?>assets/input-mask/jquery.inputmask.extensions.js"></script>
            <script type="text/javascript">
  $(document).ready(function(){
    $("#birthday").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
     $("[data-mask]").inputmask();
  });
</script>
            <section class="content" id="content">
                <section class="container-2 clearfix tracuu">
                    <section style="text-align:center" class="col-sm-12 title">
                        <h2>ĐĂNG KÝ TÀI KHOẢN</h2>

                    </section>
                   <div style="margin-left:-30px;" class="row">
                         <form id="frm_signup" role="form" action="user_controller/savesignup" method="POST">
                          <div class="form-group col-sm-12">
                          <label class="col-sm-4"></label>
                           <p style="color:blue;" class="col-sm-8">Những trường có dấu <span style="color:red;">(*)</span> là bắt buộc. Vui lòng điền thông tin bằng Tiếng Việt có dấu.</p>
                           </div>
                                    <div class="form-group col-sm-12">
                                   <label class="col-sm-4"><?php echo $lang == "vi" ? "Tên đăng nhập" : "User name"?><span style="color:red;">(*)</span></label>
                                   <input class="col-sm-8" name="nickname" type="text" id="nickname" class="form-control" placeholder="<?php echo $lang == "vi" ? "Tên đăng nhập" : "User"?>" />
                                   
                                   <p class="help-block" id="nickname_err" style="color:blue;">Tên đăng nhập tối thiểu gồm 6 kí tự, tối đa 16 kí tự, không được có khoảng trắng</p>
                                </div>
                                <div class="form-group col-sm-12">
                                   <label class="col-sm-4"><?php echo $lang == "vi" ? "Mật khẩu" : "Password"?><span style="color:red;">(*)</span></label>
                                   <input class="col-sm-8" name="password" id="password" type="password" class="form-control" placeholder="<?php echo $lang == "vi" ? "Mật khẩu" : "Password"?>" />
                                
                                   <p class="help-block" id="password_err" style="color:blue;">Mật khẩu yêu cầu tối thiểu có 6 kí tự, nên đặt bao gồm chữ, số và kí tự đặc biệt</p>
                                   
                                </div>
                                <div class="form-group col-sm-12">
                                   <label class="col-sm-4"><?php echo $lang == "vi" ? "Xác nhận mật khẩu" : "Confirm password"?><span style="color:red;">(*)</span></label>
                                   <input class="col-sm-8" id="re_password" type="password" class="form-control" placeholder="<?php echo $lang == "vi" ? "Xác nhận mật khẩu" : "Confirm password"?>" />
                                    <p class="help-block" id="repassword_err" style="color:red;"></p>
                                   
                                </div>
                                 <div class="form-group col-sm-12">
                                   <label class="col-sm-4">Email<span style="color:red;">(*)</span></label>
                                   <input class="col-sm-8" name="email" type="email" id="email" class="form-control" placeholder="Email" />
                                    <p class="help-block" id="email_err" style="color:red;"></p>
                                   
                                </div>
                                <div style="margin-left:0px;" class="form-group">

                                   <label class="col-sm-4"><?php echo $lang == "vi" ? "Họ và tên học sinh" : "Full name"?><span style="color:red;">(*)</span></label>
                                   <input class="col-sm-8" name="fullname" id="fullname" type="text" class="form-control" placeholder="<?php echo $lang == "vi" ? "Họ và tên" : "Full name"?>" >
                                   <p class="help-block" id="fullname_err" style="color:red;"></p>
                                </div>
                                <div style="margin-top:15px;" class="form-group col-sm-12">
                                  <label class="col-sm-4" for="sel"><?php echo $lang == "vi" ? "Giới tính" : "Gender"?></label>
                                  <select style="height:45px;" name="gender" class="col-sm-3" class="form-control" id="sel">
                                    <option value="1"><?php echo $lang == "vi" ? "Nam" : "Male"?></option>
                                    <option value="2"><?php echo $lang == "vi" ? "Nữ" : "Female"?></option>
                                  </select>
                                </div>
                                
                                <div class="form-group col-sm-12">
                                   <label class="col-sm-4"><?php echo $lang == "vi" ? "Ngày sinh" : "Birthday"?> <span style="color:red;">(*)</span></label>
                                   <input class="col-sm-8"  name="birthday" id="birthday" type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                   
                                </div>

                                <div style="margin-top:15px;" class="form-group col-sm-12">
                                  <label class="col-sm-4" for="sel"><?php echo $lang == "vi" ? "Cấp độ" : "Level"?></label>
                                  <select style="height:45px;" name="level" class="col-sm-3" class="form-control" id="level">
                                    <option value="1"><?php echo $lang == "vi" ? "Lớp 1 - 2" : "Grade 1 - 2"?></option>
                                    <option value="2"><?php echo $lang == "vi" ? "Lớp 3 - 4" : "Grade 3 - 4"?></option>
                                    <option value="3"><?php echo $lang == "vi" ? "Lớp 5 - 6" : "Grade 5 - 6"?></option>
                                    <option value="4"><?php echo $lang == "vi" ? "Lớp 7 - 8" : "Grade 7 - 8"?></option>
                                  </select>
                                </div>
                                
                                <div class="form-group col-sm-12">
                                   <label class="col-sm-4"><?php echo $lang == "vi" ? "Trường học" : "School"?><span style="color:red;">(*)</span></label>
                                   <input class="col-sm-8" name="school" type="text" id="school" class="form-control" placeholder="<?php echo $lang == "vi" ? "Trường học" : "School"?>" />
                                    <p class="help-block" id="school_err" style="color:red;"></p>
                                   
                                </div>
                                <div style="margin-top:15px;" class="form-group col-sm-12">
                                  <label class="col-sm-4" for="province">Tỉnh/thành</label>
                                  <select class="col-sm-3" name="province" style="height:45px;" id="province" class="form-control">
                                  <option value="0">Tỉnh/thành</option>
                                    <?php foreach ($list_provinces as $key => $province) { ?>
                                      <option value="<?php echo $province['provinceid'] ?> "> <?php echo $province['name'] ?></option>
                                 <?php   } ?>
                                  </select>
                                </div>
                                <div style="margin-top:15px" class="form-group col-sm-12">
                                  <label class="col-sm-4" for="district">Quận/huyện</label>
                                  <select class="col-sm-3" name="district" style="height:45px;" id="district" class="form-control">
                                    <option value="0">Quận/huyện</option>
                                  </select>
                                </div>
                               
                                <div class="form-group col-sm-12">
                                   <label class="col-sm-4"><?php echo $lang == "vi" ? "Số điện thoại di động" : "Phone number"?><span style="color:red;">(*)</span></label>
                                   <input class="col-sm-8" name="phone" type="number" id="phonenumber" class="form-control" placeholder="<?php echo $lang == "vi" ? "Số điện thoại" : "Phone number"?>" />
                                   <p class="help-block" id="phonenumber_err" style="color:red;"></p>
                                </div>
                                <div class="form-group col-sm-12">
                                   <label class="col-sm-4"><?php echo $lang == "vi" ? "Họ tên phụ huynh" : "Parent name"?><span style="color:red;">(*)</span></label>
                                   <input class="col-sm-8" name="parent" type="text" id="parentname" class="form-control" placeholder="<?php echo $lang == "vi" ? "Họ tên phụ huynh" : "Parent name"?>" />
                                    <p class="help-block" id="parent_err" style="color:red;"></p>
                                   
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
                   
        
      <script type="text/javascript">
      function validateSignupForm(){
        $('.help-block').html("");
    var fullname = $('#fullname').val();
    var nickname = $('#nickname').val();
    var email = $('#email').val();
    var phonenumber = $("#phonenumber").val();
    var parentname = $('#parentname').val();
    var pass = $("#password").val();
    var re_password = $("#re_password").val();
    var school = $("#school").val();
    var check = true;
    if(fullname === "" || fullname === null){
      $("#fullname_err").html("Vui lòng nhập họ và tên");
      check = false;
    }
    if(nickname === ""  || nickname === null || nickname.length < 6 || nickname.length >16 || nickname.indexOf(' ') >= 0){
      $("#nickname_err").css("color","red").html("Tên đăng nhập cần tối thiểu 6 kí tự, tối đa 16 kí tự, không được chứa khoảng trắng");
      check = false;
    }
    if(email === "" || email === null){
      $("#email_err").html("Vui lòng nhập địa chỉ email");
      check = false;
    }
    if(school === "" || school === null){
      $("#school_err").html("Vui lòng nhập tên trường");
      check = false;
    }
    if(parentname === "" || parentname === null){
      $("#parent_err").html("Vui lòng nhập họ và tên phụ huynh");
      check = false;
    }
    if(phonenumber === "" || phonenumber === null){
      $("#phonenumber_err").html("Vui lòng nhập số điện thoại");
      check = false;
    }
    if(pass === "" || pass.length < 6){
      $("#password_err").css("color","red").html("Mật khẩu cần tối thiểu 6 kí tự");
      check = false;
    }
    if(pass !== re_password){
      $("#repassword_err").html("Mật khẩu nhập lại chưa chính xác");
      check = false;
    }
    if(check){
      $.ajax({
        url: "user_controller/checkNickname",
        type: "POST",
        
        cache: false,
        data: {
          nickname: nickname,
        },
        success: function(data){
          if(data!=="ok"){
            $("#nickname_err").css('color','red').html("Tên đăng nhập đã tồn tại");
            check = false;
          }else{
            document.getElementById("frm_signup").submit();
          }
        }

      });
    }
    
  }
  $("#province").change(function(){
    var provinceid = $("#province").val();
    
    $.ajax({
      url: "user_controller/ajaxGetDistrict",
      type: "POST",
      cache:false,
      data:{ 
        provinceid: provinceid,
      },
      success: function(data){
        data = jQuery.parseJSON(data);
         $("#district").empty();
         $("#district").append($("<option>").text("Quận/huyện").attr("value",0));
         $.each(data, function(i, district){
          $("#district").append($("<option>").text(district.name).attr("value", district.districtid));
         });

    }
  });
  })
   $(document).ready(function(){
            $("#btn_signup").click(function(){

               validateSignupForm();
                
               
            });
        });
   </script>
   </script>
           
       
    </body>

</html>
