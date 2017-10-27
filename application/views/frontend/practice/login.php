<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url()?>img/kangaroo/logo.png" type="image/png" />
<title>Vietnam Math Kangaroo</title>
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/template.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/practice/login.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/bootstrap.min.js"></script>
</head>
 <script>
        function confirmlogin(){
            //alert(document.getElementById("newpass").value);
            if(check()==true) document.forms['frm_login'].submit();
            
        }   
        function check(){
            var nickname = document.getElementById('nickname').value;
            var pass = document.getElementById('pass').value;
            var check = true;
            var er_nickname ="";
            var er_password ="";
            if(pass == ""){
                er_password +="Vui lòng điền Mật khẩu!";
                check = false;
            }
            if(nickname == ""){
                er_nickname +="Vui lòng điền Tên đăng nhập!";
                check = false;
            } 
            document.getElementById('er_pass').innerHTML = er_password;
            document.getElementById('er_nickname').innerHTML = er_nickname;
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
                    <div class = "formlogin">
                       <div id="login-top" class="login-top">
                            Đăng nhập thi thử
                        </div>
                        <div id="login-content" class="login-content">
                            <form method="POST" name="frm_login" id="frm_login" action="<?php echo base_url();?>practice/login">
                                <div class="a_line">
                                    <div style="font-size:14pt;padding-bottom:5px;" class="left_line">Tên đăng nhập</div>
                                    <div class="right_line">
                                        <input id="nickname" name="nickname" type="text"placeholder="Tên đăng nhập" placeholder="Tên đăng nhập"></input>
                                        
                                    </div>
                                    <div class="right_line" style="color:#B90202; text-align: left;font-size:12pt; margin-top:5px;margin-bottom:0; margin-left:39%;" id="er_nickname"></div>
                                </div>
                                <div class="a_line">
                                    <div style=" font-size:14pt;padding-bottom:0px;" class="left_line">Mật khẩu</div>
                                    <div class="right_line">
                                        <input id="pass" name="pass" type="password" placeholder= "Mật khẩu"></input>
                                        
                                    </div>
                                    <div class="right_line" style="color:#B90202; text-align: left;font-size:12pt; margin-top:5px;margin-bottom:0; margin-left:39%;" id="er_pass"></div>
                                </div>  
                                <div class="a_line">
                                    <div class = "button" onclick="confirmlogin();" type="button"> Đăng nhập</div>
                                    
                                </div>

                            </form>
                        </div>
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