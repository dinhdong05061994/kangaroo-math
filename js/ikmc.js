var base_url = "http://kangaroo-math.vn/";
var lang = "";
		$(document).ready(function () {
			lang = document.getElementById("language").value;
		});
		
        function initialize() {
            set_map(1);
            
        }
        
        function set_map(index) {
            var longitude = document.getElementById("longitude_" + index).value;
            var latitude = document.getElementById("latitude_" + index).value;
            var myLatlng = new google.maps.LatLng(longitude, latitude);
            var mapOptions = {
                zoom: 13,
                center: myLatlng
            };
 
            var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
 
            var contentString = "<table><tr><th>Vietnam Math Kangaroo</td></tr></table>";
 
            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
 
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: 'Vietnam Math Kangaroo'
            });
            infowindow.open(map, marker);
        }
        $(document).ready(function(e) {
            $('#school_1').click(function(e) {
                set_map(1);
            });
            $('#school_2').click(function(e) {
                set_map(2);
            });
            $('#school_3').click(function(e) {
                set_map(3);
            });
            $('#school_4').click(function(e) {
                set_map(4);
            });
			$('#school_5').click(function(e) {
                set_map(5);
            });
        });
		$(document).ready(function(e) {
            $('#vi').click(function(e) {
                $.ajax({
					url: base_url + "ikmc/setlanguage/vi",
					type: 'GET',
					cache: false,
					data: {
					   
					},
					success: function(data){
						location.reload();
					}
				});
            });
            $('#en').click(function(e) {
                $.ajax({
					url: base_url + "ikmc/setlanguage/en",
					type: 'GET',
					cache: false,
					data: {
					   
					},
					success: function(data){
						location.reload();
					}
				});
            });
            
        });
        google.maps.event.addDomListener(window, 'load', initialize);
        
 
 
            	$(document).ready(function(e) {
                    $('#dangkiduthi').click(function(e) {
                        $('.dkduthi').slideDown();
						$('.dkonline').slideUp();
						$('.dkquatruong').slideUp();
                    });
					$('#dkonline').click(function(e) {
                        $('.dkduthi').slideUp();
						$('.dkonline').slideDown();
						$('.dkquatruong').slideUp();
                    });
					$('#dkquatruong').click(function(e) {
                        $('.dkduthi').slideUp();
						$('.dkonline').slideUp();
						$('.dkquatruong').slideDown();
                    });
                });
				$(document).ready(function(e) {
									 
                        $('#dangkiduthi').click(function(e) {
                            $('#dangkiduthi').css({"background": "url(img/dangky-hover1.png)","background-repeat":"no-repeat","background-size":"100% 100%"});
							$('#dkonline').css({"background": "url(img/dangkyhover2.png)","background-repeat":"no-repeat","background-size":"100% 100%"});
							$('#dkquatruong').css({"background": "url(img/dangkyhover2.png)","background-repeat":"no-repeat","background-size":"100% 100%"});
                        });
						$('#dkonline').click(function(e) {
                            $('#dangkiduthi').css({"background": "url(img/dangkyhover2.png)","background-repeat":"no-repeat","background-size":"100% 100%"});
							$('#dkonline').css({"background": "url(img/dangky-hover1.png)","background-repeat":"no-repeat","background-size":"100% 100%"});
							$('#dkquatruong').css({"background": "url(img/dangkyhover2.png)","background-repeat":"no-repeat","background-size":"100% 100%"});
                        });
						$('#dkquatruong').click(function(e) {
                            $('#dangkiduthi').css({"background": "url(img/dangkyhover2.png)","background-repeat":"no-repeat","background-size":"100% 100%"});
							$('#dkonline').css({"background": "url(img/dangkyhover2.png)","background-repeat":"no-repeat","background-size":"100% 100%"});
							$('#dkquatruong').css({"background": "url(img/dangky-hover1.png)","background-repeat":"no-repeat","background-size":"100% 100%"});
                        });
                    });
               

        function checknullrequire(){
        var fullname = document.getElementById('fullname').value;
        var email = document.getElementById('email_require').value;
        var phone = document.getElementById('phone_require').value;
        var content_require = document.getElementById('content_require').value;
        
        var er_fullname = "";
        var er_content_require = "";
        var er_phone = "";
        var er_email = "";
        var check = true;
        if(fullname == ""){
            er_fullname = lang == "vi" ? "Vui lòng điền Họ tên của bạn!" : "Fill your full name!";
            check = false;
        }
        if(content_require == ""){
            er_content_require = lang == "vi" ? "Vui lòng điền Nội dung yêu cầu!" : "Fill content!";
            check = false;
        }
        if(phone == ""){
            er_phone = lang == "vi" ? "Vui lòng điền Số điện thoại!" : "Fill your phone number!";
            check = false;
        }
        if(!phone.match(/^[0-9]+$/)){
            er_phone = lang == "vi" ? "Vui lòng điền Số điện thoại bao gồm chữ số!" : "Fill phone number including digits!";
            check = false;
        }
        if(phone.length < 10 || phone.length > 12){
            er_phone = lang == "vi" ? "Vui lòng điền Số điện thoại tối thiểu 10 chữ số và tối đa 12 chữ số!" : "The phone number complete a minimum of 10 digits and a maximum of 12 digits!";
            check = false;
        }
        if(email == ""){
         er_email = lang == "vi" ? "Vui lòng điền Email!" : "Fill your email!";
            check = false;
        }
        if(validateEmail(email) == false){
        	 er_email = lang == "vi" ? "Sai định dạng Email! Vui lòng nhập một địa chỉ mail có thật" : "Email wrong format! Please enter a real email address";
            check = false;
        }
        document.getElementById('er_email_require').innerHTML = er_email;
        document.getElementById('er_content_require').innerHTML = er_content_require;
        document.getElementById('er_phone_require').innerHTML = er_phone;
        document.getElementById('er_fullname').innerHTML = er_fullname;
    return check;
    
    }
       $(document).ready(function(){
       		$("#info-send").hide();
            $("#button_send_require").click(function(){
                var fullname = document.getElementById("fullname").value;
                var email = document.getElementById("email_require").value;
                var phone = document.getElementById("phone_require").value;
                var content_require = document.getElementById("content_require").value;
                var value = checknullrequire();
                if(value == true){
                	$("#info-send").show();
                    var url = "" //$("#url").val();
                    var str_string = 'fullname=' + fullname + "&email=" + email + "&phone=" + phone + "&content_require=" + content_require ;
                    $.ajax({
                    type: "POST",
                    //url: "ikmc/insert_require_user", // cu truoc 30092016
                    url: "ikmc/send_require_user",// mơi 30092016
                    data: str_string,
                    cache: false,
                   success: function(html){
                       //alert(lang == "vi" ? 'Bạn đã gửi yêu cầu thành công' : 'Success');
                        $("#html").html(html);
                        $("#resetrequire").click();
                        $("#info-send").hide();
                        $("#info-send").html("");
                       	location.reload();

                    }
                    });
          
                }
    
            });
            $("#close-alert").click(function(){
            	$("#show-message-email").hide();
            	$(".alert").html("");
            });
        });
    function validateEmail(email) {
        var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        return re.test(email);
    }
    function checknullregister(){
        var parentname = document.getElementById('parent_name').value;
        var address = document.getElementById('address').value;
        var phone = document.getElementById('phone_register').value;
        var student_name = document.getElementById('student_name').value;
        var school_name = document.getElementById('school_name').value;
        var email = document.getElementById('email_register').value;
        var er_parentname = "";
        var er_address = "";
        var er_phone = "";
        var er_student_name = "";
        var er_school_name= "";
        var er_email = "";
        var check = true;
        if(parentname == ""){
            er_parentname = lang == "vi" ? "Vui lòng điền Tên phụ huynh!" : "Fill parent name";
            check = false;
        }
        if(address == ""){
            er_address = lang == "vi" ? "Vui lòng điền Địa chỉ!" : "Fill address!";
            check = false;
        }
        if(phone == ""){
            er_phone = lang == "vi" ? "Vui lòng điền Số điện thoại!" : "Fill phone number!";
            check = false;
        }
        if(!phone.match(/^[0-9]+$/)){
            er_phone = lang == "vi" ? "Vui lòng điền Số điện thoại bao gồm chữ số!" : "Fill phone number including digits!";
            check = false;
        }
        if(phone.length < 10 || phone.length > 12){
            er_phone = lang == "vi" ? "Vui lòng điền Số điện thoại tối thiểu 10 chữ số và tối đa 12 chữ số!" : "The phone number complete a minimum of 10 digits and a maximum of 12 digits!";
            check = false;
        }
        if(student_name == ""){
            er_student_name = lang == "vi" ? "Vui lòng điền Tên thí sinh!" : "Fill full name!";
            check = false;
        }
        if(school_name == ""){
            er_school_name = lang == "vi" ? "Vui lòng điền Tên trường học!" : "Fill school name!";
            check = false;
        }
        if(email == ""){
            er_email = lang == "vi" ? "Vui lòng điền Email!" : "Fill email!";
            check = false;
        }
        if(validateEmail(email) == false){
        	 er_email = lang == "vi" ? "Sai định dạng Email! Vui lòng nhập một địa chỉ mail có thật" : "Email wrong format! Please enter a real email address";
            check = false;
        }
        document.getElementById('er_email').innerHTML = er_email;
        document.getElementById('er_school_name').innerHTML = er_school_name;
        document.getElementById('er_student_name').innerHTML = er_student_name;
        document.getElementById('er_address').innerHTML = er_address;
        document.getElementById('er_phone').innerHTML = er_phone;
        document.getElementById('er_parentname').innerHTML = er_parentname;
    return check;
    
    }
       $(document).ready(function(){
            $("#btn_register_online").click(function(){
                var parent_name = document.getElementById("parent_name").value;
                var student_name = document.getElementById("student_name").value;
                var address = document.getElementById("address").value;
                var school_name = document.getElementById("school_name").value;
                var phone = document.getElementById("phone_register").value;
                var email = document.getElementById("email_register").value;
                var vali = checknullregister();
               
                if(vali ==true){

                    var url = "" //$("#url").val();
                    var str_string = 'parent_name=' + parent_name + "&student_name=" + student_name + "&address=" + address + "&school_name=" + school_name + "&phone=" + phone + "&email=" + email ;
                    $.ajax({
                    type: "POST",
                    url: "ikmc/insert_register_online_user",
                    data: str_string,
                    cache: false,
                   success: function(html){
                       alert(lang == "vi" ? 'Chúc mừng bạn đã đăng ký thành công. Chúng tôi sẽ liên lạc với bạn sớm nhất' : 'Success');
                       $("#btn_close_register").click();
                        $("#html").html(html);
                    }
                    });
          
    
                }
    
            });
        });
		function checknullregister_ieg(){
        var parentname = document.getElementById('parent_name_ieg').value;
        var address = document.getElementById('address_ieg').value;
        var phone = document.getElementById('phone_ieg').value;
        var student_name = document.getElementById('student_name_ieg').value;
        var school_name = document.getElementById('school_name_ieg').value;
        var email = document.getElementById('email_ieg').value;
        var er_parentname = "";
        var er_address = "";
        var er_phone = "";
        var er_student_name = "";
        var er_school_name= "";
        var er_email = "";
        var check = true;
        if(parentname == ""){
            er_parentname = lang == "vi" ? "Vui lòng điền Tên phụ huynh!" : "Fill parent name!";
            check = false;
        }
        if(address == ""){
            er_address = lang == "vi" ? "Vui lòng điền Địa chỉ!" : "Fill address!";
            check = false;
        }
        if(phone == ""){
            er_phone = lang == "vi" ? "Vui lòng điền Số điện thoại!" : "Fill phone number!";
            check = false;
        }
        if(student_name == ""){
            er_student_name = lang == "vi" ? "Vui lòng điền Tên thí sinh!" : "Fill full name!";
            check = false;
        }
        if(school_name == ""){
            er_school_name = lang == "vi" ? "Vui lòng điền Tên trường học!" : "Fill school name";
            check = false;
        }
        if(email == ""){
            er_email = lang == "vi" ? "Vui lòng điền Email!" : "Fill email!";
            check = false;
        }
        
        document.getElementById('er_email_ieg').innerHTML = er_email;
        document.getElementById('er_school_name_ieg').innerHTML = er_school_name;
        document.getElementById('er_student_name_ieg').innerHTML = er_student_name;
        document.getElementById('er_address_ieg').innerHTML = er_address;
        document.getElementById('er_phone_ieg').innerHTML = er_phone;
        document.getElementById('er_parent_name_ieg').innerHTML = er_parentname;
    return check;
    
    }
       $(document).ready(function(){
            $("#btn_register_ieg").click(function(){
                var parent_name = document.getElementById("parent_name_ieg").value;
                var student_name = document.getElementById("student_name_ieg").value;
                var address = document.getElementById("address_ieg").value;
                var school_name = document.getElementById("school_name_ieg").value;
                var phone = document.getElementById("phone_ieg").value;
                var email = document.getElementById("email_ieg").value;
                var vali = checknullregister_ieg();
               
                if(vali ==true){

                    var url = "" //$("#url").val();
                    var str_string = 'parent_name=' + parent_name + "&student_name=" + student_name + "&address=" + address + "&school_name=" + school_name + "&phone=" + phone + "&email=" + email ;
                    $.ajax({
                    type: "POST",
                    url: "ikmc/insert_register_ieg",
                    data: str_string,
                    cache: false,
                   success: function(html){
                       alert(lang == "vi" ? 'Chúc mừng bạn đã đăng ký thành công. Chúng tôi sẽ liên lạc với bạn sớm nhất' : 'Success');
                       $("#btn_close_register").click();
                        $("#html").html(html);
                    }
                    });
          
    
                }
    
            });
        });
       // $(document).ready(function(){
       //      $("#btn_signup").click(function(){
       //          if(document.getElementById("pass").value == document.getElementById("re_pass").value)
       //          {
       //              document.getElementById("frm_signup").submit();
       //          }
       //          else
       //          {
       //              alert(lang == "vi" ? "Bạn nhập mật khẩu xác nhận chưa đúng." : "New password and confirm password not match.");
       //          }
       //      });
       //  });
       $(document).ready(function(){
            $("#home").click(function(){
                window.location.href = "ikmc";
            });
            if($("#chosen_lang").val() == 'vi'){
                grade1 =  $("div.grade")[0];
                $("#show_grade").find(grade1).find("h4").text('Lớp 1-2');
                grade2 =  $("div.grade")[1];
                $("#show_grade").find(grade2).find("h4").text('Lớp 3-4');
                grade3 =  $("div.grade")[2];
                $("#show_grade").find(grade3).find("h4").text('Lớp 5-6');
                grade4 =  $("div.grade")[3];
                $("#show_grade").find(grade4).find("h4").text('Lớp 7-8');
            }
            //chon ngon ngu bai kiemr tra nam
            $("#choose_lang_en").click(function(){
                $("#chosen_lang").val("en");
                $("#choose_lang_vi > a").text("Vietnamese");
                $("#choose_lang_en > a").text("English");
                $("#practice_title").text("Choose practice tests");
                grade1 =  $("div.grade")[0];
                $("#show_grade").find(grade1).find("h4").text('Grade 1-2');
                grade2 =  $("div.grade")[1];
                $("#show_grade").find(grade2).find("h4").text('Grade 3-4');
                grade3 =  $("div.grade")[2];
                $("#show_grade").find(grade3).find("h4").text('Grade 5-6');
                 grade4 =  $("div.grade")[3];
                $("#show_grade").find(grade4).find("h4").text('Grade 7-8');

            });
            $("#choose_lang_vi").click(function(){
                $("#chosen_lang").val("vi");
                $("#practice_title").text("Chọn cấp độ");
                $("#choose_lang_vi > a").text("Tiếng Việt");
                $("#choose_lang_en > a").text("Tiếng Anh");
                grade1 =  $("div.grade")[0];
                $("#show_grade").find(grade1).find("h4").text('Lớp 1-2');
                grade2 =  $("div.grade")[1];
                $("#show_grade").find(grade2).find("h4").text('Lớp 3-4');
                grade3 =  $("div.grade")[2];
                $("#show_grade").find(grade3).find("h4").text('Lớp 5-6');
                grade4 =  $("div.grade")[3];
                $("#show_grade").find(grade4).find("h4").text('Lớp 7-8');
            });
             //end chon ngon ngu bai kiemr tra nam
        });
    //TRA CỨU THÔNG TIN THÍ SINH không captcha:

        $(document).ready(function(){
        $("#search_info").click(function(){
            var name = document.getElementById('name').value;
            var date = document.getElementById('date').value;
            var month = document.getElementById('month').value;
            var year = document.getElementById('year').value;
                    
            var check = true;
           
                if(name == "" || date == "" || month == "" || year=="" ){
                    check = false;
                }
                if(check == false){
                    document.getElementById("errornull").innerHTML = '<span style = "font-size: 12pt; color: red; margin-top:0; margin-left:150px;">' + (lang == "vi" ? 'Vui lòng nhập đầy đủ thông tin thí sinh!' : 'Please enter complete information.') +'</span>';
                    document.getElementById("errornull").hidden = "false";
                    document.getElementById("errornull").style.display = "block";
                    document.getElementById("showresult").hidden = "true";
                            document.getElementById("showresult").style.display = "none";
                }else{
                    


                    var str_string = 'name=' + name + "&date="+date+"&month= "+month+"&year=" +year;
                    $.ajax({
                        url: "ikmc/search_result_ikmc",
                        type: 'POST',
                        cache: false,
                        data: str_string,
                        success: function(data){ 
                            //alert(data);
                            if(data == "There is a problem"){
                                document.getElementById("errornull").innerHTML = '<span style = "font-size: 12pt; color: red; margin-top:0; margin-left:150px;">' + (lang == "vi" ? 'Xảy ra sự cố!' : 'There is a problem!') +'</span>';
                                document.getElementById("errornull").hidden = "false";
                                document.getElementById("errornull").style.display = "block";
                                document.getElementById("showresult").hidden = "true";
                                document.getElementById("showresult").style.display = "none";
                            }else if(data == "Please tick on the box below to confirm!"){
                                 document.getElementById("errornull").innerHTML = '<span style = "font-size: 12pt; color: red; margin-top:0; margin-left:150px;">' + (lang == "vi" ? 'Vui lòng tích xác nhận!' : 'Please tick on the box below to confirm!') +'</span>';
                                document.getElementById("errornull").hidden = "false";
                                document.getElementById("errornull").style.display = "block";
                                document.getElementById("showresult").hidden = "true";
                                document.getElementById("showresult").style.display = "none";
                            }else{
                                scrollTo(0,150);
                                document.getElementById("showresult").innerHTML = data;
                                document.getElementById("showresult").hidden = "false";
                                document.getElementById("showresult").style.display = "block";
                                document.getElementById("errornull").hidden = "true";
                                document.getElementById("errornull").style.display = "none";
                            }
                        }
                    });
                     
                }
     
         });    
    });
    //TRA CỨU THÔNG TIN THÍ SINH có captcha:
    function searchinforcontestants(){
        var name = document.getElementById('fullname').value;
            var date = document.getElementById('dateofbirth').value;
            var month = document.getElementById('monthofbirth').value;
            var year = document.getElementById('yearofbirth').value;
                    
            var check = true;
           
            if(name == "" || date == "" || month == "" || year=="" ){
                check = false;
            }
            if(check == false){
                document.getElementById("errornull").innerHTML = '<span style = "font-size: 12pt; color: red; margin-top:0; margin-left:150px;">' + (lang == "vi" ? 'Vui lòng nhập đầy đủ thông tin thí sinh!' : 'Please enter complete information.') +'</span>';
                document.getElementById("errornull").hidden = "false";
                document.getElementById("errornull").style.display = "block";
                document.getElementById("showresult").hidden = "true";
                        document.getElementById("showresult").style.display = "none";
            }else{
                document.forms['searchf'].submit();
                
            }
    }
    

    var lang = "en";
    var code = 0;
    function set_lang(str_lang){
        lang = str_lang;
        if(code > 0) choose_grade(code);
    }
    function choose_grade(value,userid){
        code = value;
        var chose_lang = '';
        chose_lang = $("#chosen_lang").val();
        $.ajax({
            url: "index.php/ikmc_practice/load_year/",
            type: 'POST',
            cache: false,
            data: {
               code:value,
               userid:userid,
               lang: (chose_lang !='' ? chose_lang:"vi"),
            },
            success: function(data){
                document.getElementById("show_year").innerHTML = data;
                if(data == "") {
                    document.getElementById("show_year").style.display = "none";
                }
                else {
                    document.getElementById("show_year").style.display = "block";
                    document.getElementById("show_grade").style.display = "none";
                    document.getElementById("btn_back").style.display = "block";
                }
                
            }
        });
    }
    function go_doing(year){
        var chose_lang = '';
        chose_lang = $("#chosen_lang").val();
        window.location.href = base_url + "ikmc_practice/doing/" + year + "/" + code + "/" + chose_lang;
    }
    function back_choose(){
        document.getElementById("show_year").style.display = "none";
        document.getElementById("show_grade").style.display = "block";
        document.getElementById("btn_back").style.display = "none";
        code = 0;
    }
    function showUnregisteredMessage(){
        $("#showmessage").modal('show');
       
       
    }
    $("#upgrade_account").click(function(){
        $("#showmessage").modal('hide');
        $("#demo").modal('show');
    })
