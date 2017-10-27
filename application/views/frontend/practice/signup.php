<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url()?>img/kangaroo/logo.png" type="image/png" />
<title>Vietnam Math Kangaroo</title>
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/template.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/practice/signup.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/bootstrap.min.js"></script>
</head>
 <script>
         webshims.setOptions('forms-ext', {types: 'date'});
        webshims.polyfill('forms forms-ext');
        $.webshims.formcfg = {
        en: {
            dFormat: '/',
            dateSigns: '/',
            patterns: {
                d: "dd/mm/yy"
            }
        }
     };

    $.webshims.activeLang('en');
        $(document).ready(function() {
            $("#phone").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                     // Allow: Ctrl+A, Command+A
                    (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
                     // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                         // let it happen, dont do anything
                         return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        });
    </script>
    <script type="text/javascript" >
    function clicksubmit(){
        
        if(check_value_form()) document.forms['form'].submit();
    }
    
    function validateEmail(email) {
        var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        return re.test(email);
    }
    function check_value_form(){
        var fullname = document.getElementById('fullname').value;
        var nickname = document.getElementById('nickname').value;
        var gender = document.getElementById('gender').value;
        var birthday = document.getElementById('birthday').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var re_password = document.getElementById('re_password').value;
        var school = document.getElementById('school').value;
        var address = document.getElementById('address').value;
        var phone = document.getElementById('phone').value;
        var parent = document.getElementById('parent').value;
        var er_fullname = "";
        var er_nickname = "";
        var er_gender = "";
        var er_birthday = "";
        var er_email = "";
        var er_password = "";
        var er_re_password = "";
        var er_school = "";
        var er_address = "";
        var er_phone = "";
        var er_parent = "";
        //check nay
        var check = true;
        if(fullname == "") {
            er_fullname += "Bạn chưa điền đầy đủ họ và tên!";
            check = false;
        }
      /*  if(nickname == "") {
            er_nickname += "Bạn chưa điền nickname!";
            check = false;
        }*/
        if(password ==""){
            er_password += "Bạn chưa điền mật khẩu!";
            check = false;
        }
        if(re_password ==""){
            er_re_password += "Bạn chưa xác nhận mật khẩu!";
            check = false;
        }else if(password != re_password){
            er_re_password += "Mật khẩu xác nhận không trùng khớp!";
            check = false;
        }
        if(birthday == "") {
            er_birthday += "Bạn chưa chọn ngày sinh!";
            check = false;
        }
        if(email == "") {
            er_email += "Bạn chưa điền email!";
            check = false;
        }
        if(nickname == "") {
            er_nickname += "Bạn chưa điền Tên đăng nhập!";
            check = false;
        }
        if(validateEmail(email) == false) {
            er_email += "Bạn chưa điền đúng định dạng email!";
            check = false;
        }
        if(school == "") {
            er_school += "Bạn chưa điền thông tin trường học!";
            check = false;
        }
        if(address == "") {
            er_address += "Bạn chưa điền địa chỉ nhà riêng!";
            check = false;
        }
        if(phone == "") {
            er_phone += "Bạn chưa điền số điện thoại cá nhân!";
            check = false;
        }
        if(parent ==""){
            er_parent+="Bạn chưa điền tên phụ huynh!";
            check = false;
        }
        document.getElementById('er_fullname').innerHTML = er_fullname;
        document.getElementById('er_nickname').innerHTML = er_nickname;
        document.getElementById('er_gender').innerHTML = er_gender;
        document.getElementById('er_birthday').innerHTML = er_birthday;
        document.getElementById('er_email').innerHTML = er_email;
        document.getElementById('er_password').innerHTML = er_password;
        document.getElementById('er_re_password').innerHTML = er_re_password;
        document.getElementById('er_school').innerHTML = er_school;
        document.getElementById('er_address').innerHTML = er_address;
        document.getElementById('er_phone').innerHTML = er_phone;
        document.getElementById('er_parent').innerHTML = er_parent;
        return check;
        
    }
        window.onload = function(){
            scrollTo(0,470);
        }
    </script>

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
                <div class="col-sm-9 content" style="background: aliceblue">
                    <div id="left_content" class="left_content">
                    <form name="form" id="form" method="POST" action="<?php echo base_url();?>practice/savesignup">
                        
                        <div id="table_name">Đăng kí tài khoản </div>
                        <div id="table_infor">
                            <div class="line_info">
                                <div class="left_line">
                                    Họ và tên 
                                </div>
                                <div class="right_line">
                                    <input type="text" id="fullname" name="fullname"/>
                                    <p id="er_fullname"></p>
                                </div>
                            </div>
                           <!-- <div class="line_info">
                                <div class="left_line">
                                    Nickname 
                                </div>
                                <div class="right_line">
                                    <input type="text" id="nickname" name="nickname" />
                                    <p id="er_nickname"></p>
                                </div>
                            </div> -->
                            
                            <div class="line_info">
                                <div class="left_line">
                                    Giới tính 
                                </div>
                                <div class="right_line">
                                    <select id="gender" name="gender">
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    </select>
                                    <p id="er_gender"></p>
                                </div>
                            </div>
                            <div class="line_info">
                                <div class="left_line">
                                    Ngày sinh 
                                </div>
                                <div class="right_line">
                                    <input type="date" id="birthday" name="birthday"/>
                                    <p id="er_birthday"></p>
                                </div>
                            </div>
                            
                            
                            <div class="line_info">
                                <div class="left_line">
                                    Trường học 
                                </div>
                                <div class="right_line">
                                    <input type="text" id="school" name="school"/>
                                    <p id="er_school"></p>
                                </div>
                            </div>
                            <div class="line_info">
                                <div class="left_line">
                                    Địa chỉ nhà riêng 
                                </div>
                                <div class="right_line">
                                    <input type="text" id="address" name="address"\/>
                                    <p id="er_address"></p>
                                </div>
                            </div>
                            <div class="line_info">
                                <div class="left_line">
                                    Số điện thoại 
                                </div>
                                <div class="right_line">
                                    <input type="text" id="phone" name="phone"\/>
                                    <p id="er_phone"></p>
                                </div>
                            </div>
                            <div class="line_info">
                                <div class="left_line">
                                    Họ tên phụ huynh
                                </div>
                                <div class="right_line">
                                    <input type="text" id="parent" name="parent"\/>
                                    <p id="er_parent"></p>
                                </div>
                            </div>
                            <div class="line_info">
                                <div class="left_line">
                                    Email
                                </div>
                                <div class="right_line">
                                    <input type="text" id="email" name="email"/>
                                    <p id="er_email"></p>
                                </div>
                            </div>
                            <div class="line_info">
                                <div class="left_line">
                                    Tên đăng nhập
                                </div>
                                <div class="right_line">
                                    <input type="text" id="nickname" name="nickname"/>
                                    <p id="er_nickname"></p>
                                </div>
                            </div>
                            <div class="line_info">
                                <div class="left_line">
                                    Mật khẩu
                                </div>
                                <div class="right_line">
                                    <input type="password" hidden=""/>
                                    <input type="password" id="password" name="password"/>
                                    <p id="er_password"></p>
                                </div>
                            </div>
                            <div class="line_info">
                                <div class="left_line">
                                    Xác nhận Mật khẩu
                                </div>
                                <div class="right_line">
                                    <input type="password" id="re_password" name="re_password"/>
                                    <p id="er_re_password"></p>
                                </div>
                            </div>
                            
                        </div>
                        <div onclick="clicksubmit();" id="submit_form">Ghi nhận</div>
                    </form>
                    </div>
                    <?php $this->load->view("commons/list_donors")?>
            </div><!--End .Content-->
            
            </div>
            </section>
        
        </div>
    
    
    <?php $this->load->view("commons/footer_all");?>
    
    </div>
    <!--Modal-->
    
</body>
</html>