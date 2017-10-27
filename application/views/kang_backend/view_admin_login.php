<meta charset="UTF-8" />
<title>Vietnam Math Contest</title>
<style type="text/css">
    .login_wapper{
        height: 140px;
        width: 310px; 
        margin: auto;
        color: #fff;
        font-size: 12pt;

    }
    .formlogin{
        height: 170px;
        width: 350px;
        background: seagreen;
         margin: 20% auto;
          padding: 20px 10px 5px 10px;
          border-radius: 5px;
             font-size: 12pt;
    }
    input{
        float: right;
        margin-right: 10px;
        padding-left: 10px;
        width: 220px;
        font-size: 11pt;
    }
    .submit{
        width: 100px !important;
           font-size: 11pt;
    }
</style>
<div class = "formlogin">
<form class="cmxform" id="loginForm" method="post" name="login" action="<?php echo base_url();?>index.php/kang_admin/loginadmin" onsubmit="return validateForm()">
    <fieldset class="login_wapper">
        <legend >Đăng nhập Admin</legend>
        <p>
            <label for="cusername">Email<em>*</em></label>
            <input id="cemail" name="email" size="25" />
        </p>
        <p>
            <label for="cpass">Password<em>*</em></label>
            <input type="password" id="cpass" name="password" size="25"/>
        </p>
        <p>
            <input class="submit" type="submit" value="Đăng nhập" />
        </p>
    </fieldset>
</form>
</div>
<script>
function validateForm()
    {
        var x=document.forms["login"]["email"].value;
        var y=document.forms["login"]["password"].value;
        var atpos=x.indexOf("@");
        var dotpos=x.lastIndexOf(".");
        if(x == null || x == "")
        {
            alert("Bạn chưa nhập tên đăng nhập");
            return false;
        }
        if (y == null || y == "")
        {
            alert("Bạn chưa nhập mật khẩu");
            return false;
        }
    }
</script>