
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php $this->load->view("commons/title_all");?>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-2.1.4.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
	<style type="text/css">
        #add-user{
          float: right; 
          border: 1px solid #ccc; 
          padding: 7px 15px 7px 0; 
          background: #ccc;

        }
        #add-user > a:hover{
          text-decoration: none;
        }
        #add-user:focus, 
        #add-user:hover{
            background: #cbc8c8;
            cursor: pointer;
            border: 1px solid#a2a1a1;
        }
    </style>
</head>
<body>
	<ul class="breadcrumb" style="font-size: 12pt;">
      <li><h4>Quản trị người dùng</h4></li>  
      <li class="active">Thay đổi thông tin người dùng</li>
      <li id="add-user"><a href="<?=base_url()?>mng_user">Danh sách người dùng</a></li>
    </ul> 
	<div class="col-sm-8 col-sm-offset-2" style="margin-bottom: 30px;">
		<form role="form" method="POST" name="frm_login" id="frm_login" action="<?php echo base_url(); ?>mng_user/edit-user-<?=$id?>">
	        <p id = "erorr" style="color: red; font-size: 11pt;"></p>
	        <div class="form-group">
	            <label for="change_name">Name</label>
	            <input type="text" class="form-control" id="change_name" name="change_name" value="<?php echo $user_information['fullname']; ?>">
	        </div>
	        <div class="form-group">
               <label for="change_nickname"><?php echo $lang == "en" ?  "User name" : "Tên đăng nhập" ?></label>
               <input name="change_nickname" type="text" id="change_nickname" class="form-control" placeholder="<?php echo $lang == "vi" ? "Tên đăng nhập" : "Nickname"?>" value="<?=$user_information
	                        ['nickname'];?>"/>
               
               <p class="help-block" id="nickname_err" style="color:blue;">Tên đăng nhập tối thiểu gồm 6 kí tự, tối đa 16 kí tự, không được có khoảng trắng</p>
            </div>
	        <div class="form-group">
	            <label for="new_pwd">New Password</label>
	            <input type="password" class="form-control" name="new_pwd" id="new_pwd" value="">
	        </div>
	        <div class="form-group">
              <label for="level"><?php echo $lang == "vi" ? "Cấp độ" : "Level"?></label>
              <select name="level" class="form-control" id="level">
                <option value="<?=$user_information
                ['level']?>" disable hidden><?=$user_information
                ['level']?></option>
               <!--  <option value="17" <?php if($user_information
                ['level']==1){ echo 'selected';} ?>><?php echo $lang == "vi" ? "17" : "17"?></option> -->
                <option value="1" <?php if($user_information
                ['level']==1){ echo 'selected';} ?>><?php echo $lang == "vi" ? "Lớp 1 - 2" : "Grade 1 - 2"?></option>
                <option value="2" <?php if($user_information
                ['level']==2){ echo 'selected';} ?>><?php echo $lang == "vi" ? "Lớp 3 - 4" : "Grade 3 - 4"?></option>
                <option value="3" <?php if($user_information
                ['level']==3){ echo 'selected';} ?>><?php echo $lang == "vi" ? "Lớp 5 - 6" : "Grade 5 - 6"?></option>
                <option value="4" <?php if($user_information
                ['level']==4){ echo 'selected';} ?>><?php echo $lang == "vi" ? "Lớp 7 - 8" : "Grade 7 - 8"?></option>
              </select>
            </div>
	        <div class="form-group">
	            <label for="email">Email</label>
	            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user_information['email']; ?>">
	        </div>
	        <div class="form-group">
	            <label for="birthday">Birthday</label>
	            <input type="text" class="form-control" name="birthday" id="birthday" value="<?php echo $user_information['birthday']; ?>" data-mask>
	        </div>
	        <div class="form-group">

	            <label for="gender">Gender</label>
	            <select class="form-control" name = "gender" id="gender">
	                <option value="1" <?= $user_information['gender'] == '1' ? 'selected' : '' ?>>Nam</option>
	                <option value="2" <?=($user_information['gender'] == '2' || $user_information['gender'] == '0') ? 'selected' : ''; ?>>Nữ</option>
	            </select>
	        </div>
	        <div class="form-group">
	            <label for="parentsname">Parentsname</label>
	            <input type="text" class="form-control" id="parentsname" name="parentsname" value="<?php echo $user_information['parentsname']; ?>">
	        </div>
	        <div class="form-group">
	            <label for="phone">Phone number</label>
	            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user_information['phone']; ?>">
	        </div>
	        <div class="form-group">
              <label  for="province">Tỉnh/thành</label>
              <select class="form-control" name="province" style="height:45px;" id="province" class="form-control">
              <option value="0">Tỉnh/thành</option>
                <?php foreach ($list_provinces as $key => $province) { ?>
                  <option value="<?php echo $province['provinceid'] ?> " <?=(($province['provinceid'] == $user_information['province_id']) ? 'selected':'')?>> <?php echo $province['name'] ?></option>
             <?php   } ?>
              </select>
            </div>
            <div class="form-group">
              <label  for="district">Quận/huyện</label>
              <select class="form-control" name="district" style="height:45px;" id="district" class="form-control">
                <option value="0">Quận/huyện</option>
              </select>
            </div>
            <div class="form-group">
               <label for="status_user"><?php echo $lang == "vi" ? "Trạng thái" : "Status"?></label>
               <select name="status_user" style="height:45px;" id="status_user" class="form-control">
                <option value="0" <?php echo $user_information['status'] == 0 ? 'selected' : '';?>><?php echo $lang == "en" ? "Free account" : "Tài khoản miễn phí"?></option>
                <option value="1" <?php echo $user_information['status'] == 1 ? 'selected' : '';?>><?php echo $lang == "en" ? "Fee account" : "Tài khoản trả phí"?></option>
              </select>
            </div>
            <div class="form-group">
              <label for="exp">Ngày hết hạn</label>
              <input type="text" class="form-control" name="exp" id="exp" value="<?php echo $user_information['exp_date'] == '0000-00-00 00:00:00' ? '0000-00-00 00:00:00':date_format(date_create($user_information['exp_date']),'d/m/Y'); ?>" data-mask>
          </div>
	        <button type="button" class="btn btn-default" style="width: 49%; background: #d5d5d6;" id = "btn_submit" onclick="change_infor_user();">Submit</button>
	    </form>
    </div>

</body>
<script type="text/javascript">
	function validateEmail(email) {
        var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        return re.test(email);
    }
    function change_infor_user() {
        var email = document.getElementById("email").value;
        var change_name = document.getElementById("change_name").value;
        var new_pwd = document.getElementById("new_pwd").value;
        var phone = document.getElementById("phone").value;
        var nickname = document.getElementById("change_nickname").value;
        var check = true;
        var erorr = "";
        if((nickname !== ""  || nickname !== null) && (nickname.length < 6 || nickname.length >16 || nickname.indexOf(' ') >= 0)){
		      $("#nickname_err").css("color","red").html("Tên đăng nhập cần tối thiểu 6 kí tự, tối đa 16 kí tự, không được chứa khoảng trắng");
		      check = false;
		}
        if (change_name == "" || change_name == null)
        {
            check = false;
            erorr += "<i>Name</i> không được để trống.</br>";
        }
        if (change_name.lastIndexOf("<") != -1 || change_name.lastIndexOf('>') != -1) {
            erorr = "<i>Name</i> không chứa những giá trị đặc biệt.</br>";
            check = false;
        }
        if (validateEmail(email) == false && email != "") {
            erorr += "Sai định danh Email.</br>";
            check = false;
        }
        
        if (!phone.match(/^[0-9]+$/) && phone != "") {
            check = false;
            erorr += "<i>Phone number</i> chỉ được nhập số.</br>";
        }
        if ((phone.length > 12 || phone.length < 10) && phone != "") {
            check = false;
            erorr += "<i>Phone number</i> chỉ được nhập từ 10 đến 12 chữ số.</br>";
        }
        if(new_pwd != "" && new_pwd.length < 6){
	      erorr += "<i>Mật khẩu mới</i> cần tối thiểu 6 kí tự.</br>";
	      check = false;
	    }
        if (check == true) {
            document.getElementById('frm_login').submit();
        } else {
            document.getElementById('erorr').innerHTML = erorr;
            window.scrollTo(0, 0);
            //alert(erorr);
        }


    }

    $("#province").change(function(){
    var provinceid = $("#province").val();
    // alert(province);
    var districtid_user = "<?= $user_information['district_id']?>";

    $.ajax({
      url: "admin_users/ajaxGetDistrict",
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
         	if(districtid_user == district.districtid || parseInt(districtid_user) == parseInt(district.districtid)){
         		$("#district").append($("<option selected>").text(district.name).attr("value", district.districtid));
         	}else{
         		$("#district").append($("<option>").text(district.name).attr("value", district.districtid));
         	}
          
         });

    }

  });
  })
    $(document).ready(function(){
    	$("#province").change();
    });
</script>
 <script src="<?php echo base_url(); ?>assets/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo base_url(); ?>assets/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?php echo base_url(); ?>assets/input-mask/jquery.inputmask.extensions.js"></script>
    <script type="text/javascript">
  $(document).ready(function(){
    $("#birthday").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
     $("#exp").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    $("[data-mask]").inputmask();
    $(".close").click(function(){
        $("#notification").hide("slow");
    });
  });
</script>
</html>
