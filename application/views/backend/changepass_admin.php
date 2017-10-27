
<html xmlns="https://www.w3.org./1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset = utf-8" />
    <meta http-equiv="Content-Language" content="vi" />
    <link href="<?php echo base_url();?>css/admin/changepass.css" rel="stylesheet" type="text/css"/>
   
    
    <script>
		function change(){
			//alert(document.getElementById("newpass").value);
			if(checkpass()==true) document.forms['frm_changepass'].submit();
			
		}	
		function checkpass(){
			var new_pass = document.getElementById('newpass').value;
			var re_new_pass = document.getElementById('re_newpass').value;
			var check = true;
			var er_re_password ="";
			var er_password ="";
			if(new_pass == ""){
				er_password +="Bạn chưa nhập mật khẩu!";
				check = false;
			}
			else if(re_new_pass == ""){
				er_re_password +="Bạn chưa nhập mật khẩu!";
				check = false;
			} else
			if(new_pass != re_new_pass){
				er_re_password += "Mật khẩu nhắc lại phải trùng với mật khẩu mới!";
				check = false;
			}
			document.getElementById('er_pass').innerHTML = er_password;
			document.getElementById('er_re_pass').innerHTML = er_re_password;
			return check;
		}
	</script>
    
</head>
<body>
    <div class="wrapper">
    <div id="login-container" class="login-container">
        <div id="login-top" class="login-top">
            Đổi mật khẩu
        </div>
        <div id="login-content" class="login-content">
            <form method="POST" name="frm_login" id="frm_changepass" action="<?php echo base_url();?>index.php/admin/save_new_pass/">
                <div class="a_line">
                    <div style="font-size:14pt;padding-bottom:0px;" class="left_line">Email:</div>
                    <div class="right_line">
                        <input id="email" name="email" type="text" value = "<?php echo $user['admin']['email']?>" title = "<?php echo $user['admin']['email']?>" disabled></input>
						
                    </div>
					
                </div>
                <div class="a_line">
                    <div style=" font-size:14pt;padding-bottom:0px;" class="left_line">Mật khẩu mới:</div>
                    <div class="right_line">
                        <input id="newpass" name="newpass" type="password"></input>
						
                    </div>
					<div class="right_line" style="color:#B90202; text-align: left;font-size:12pt; margin-top:5px;margin-bottom:0; margin-left:0px;" id="er_pass"></div>
                </div>
                <div class="a_line">
                    <div style="font-size:14pt" class="left_line"> Nhắc lại :</div>
                    <div class="right_line">
                        <input id="re_newpass" name="re_newpass" type="password"/>
                    </div>
					<div class="right_line" style="color:#B90202; text-align: left;font-size:12pt; margin-top:5px;margin-bottom:0; margin-left:0px;" id="er_re_pass"></div>
                </div>
                
                <div style="padding-left: 41px;"class="a_line">
                    <div class = "button" onclick="change();" type="button"> Ghi nhận</div>
                    
                </div>

            </form>
        </div>
    </div>
    </div>
</body>
</html>