	function validateSignupForm(){
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
			$("#parent_err").html("Vui lòng nhập họ tên phụ huynh");
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
			$("#repassword_err").html("Mật khẩu bạn nhập chưa trùng khớp");
			check = false;
		}
		if(check){
			$.ajax({
				url: "http://kangaroo-math.vn/index.php/user_controller/checkNickname",
				type: "POST",
				
				cache: false,
				data: {
					nickname: nickname,
				},
				success: function(data){
					if(data!=="ok"){
						$("#nickname_err").css('color','red').html("Tên đăng nhập này đã tồn tại, vui lòng chọn tên khác");
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
			url: "http://kangaroo-math.vn/index.php/user_controller/ajaxGetDistrict",
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