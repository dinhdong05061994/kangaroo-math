
<!DOCTYPE HTML>
<meta http-equiv="content-type" content="text/html"  charset="utf-8"/>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<title>Vietnam Math Kangaroo Contest</title>
    <!--CSS-->    
	
	
    <link href="<?php echo base_url();?>css/manageValidateCode.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>css/multiple-select.css" rel="stylesheet"/>
                    
    <style type="text/css">
	#check_input #content_input .latex{
		clear: none;		
		float: none;		
		display: inline;
		position: relative;
	}
	
	#check_input #content_input .latex_newline{
		clear: both;		
		float: none;
		text-align: center;
		position: relative;
	}
    .ms-choice{
        height: 31px;
        margin-left:0;
        margin-bottom:0;
        
    }
    .ms-choice > div,.ms-choice > span,.ms-choice > span.placeholder{
        margin-top: 15px;
        font-size: 13pt;
        color: #444;
    }
    .ms-drop ul > li label{
        margin-top: 20px!important;
        text-align: left!important;
        
    }
    .ms-drop ul > li label input{
        margin: 5px!important;
    }
    .ms-parent{
       /* width: 771px!important;*/
           width: 70% !important;;
    }
    </style>
 	<!-- JS -->	

    <script type="text/javascript" src="<?php echo base_url(); ?>/asset/ckeditor/ckeditor.js"></script>
    <!--<script type="text/javascript" src="<?php //echo base_url(); ?>/asset/ckfinder/ckfinder.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.jslatex.js"></script>
    <script type="text/javascript" src="http://latex.codecogs.com/latexit.js"></script>
    <script src="<?php echo base_url(); ?>js/multiple-select.js"></script>
    <script type="text/javascript">
        LatexIT.add('p',true);
    </script>
	<!-- Load phan title-->
        
	<!--Het phan title-->
        <script type="text/javascript">
            function update_type() {
                var type = document.getElementsByName("type");
                var order_right_ans = document.getElementById('order_right_ans');
                var wrong_ans_db = document.getElementById("wrong_ans_db");
                var wrong_ans_test = document.getElementById("wrong_ans_test");
                var wrong_ans_1 = document.getElementById("wrong_ans_1");
                var wrong_ans_2 = document.getElementById("wrong_ans_2");
                var wrong_ans_3 = document.getElementById("wrong_ans_3");
                var wrong_ans_4 = document.getElementById("wrong_ans_4");
                var wrong_ans_5 = document.getElementById("wrong_ans_5");
                var wrong_ans_6 = document.getElementById("wrong_ans_6");
                
                for(i = 0; i < type.length; i++) {
                    currentType = type[i];
                    if (currentType.checked && i == 0) {
                        order_right_ans.disabled = true;
                        order_right_ans.style.backgroundColor = "yellow";
                        wrong_ans_db.disabled = true;
                        wrong_ans_db.style.backgroundColor = "yellow";
                        wrong_ans_test.disabled = true;
                        wrong_ans_test.style.backgroundColor = "yellow";
                        wrong_ans_1.disabled = true;
                        wrong_ans_1.style.backgroundColor = "yellow";
                        wrong_ans_2.disabled = true;
                        wrong_ans_2.style.backgroundColor = "yellow";
                        wrong_ans_3.disabled = true;
                        wrong_ans_3.style.backgroundColor = "yellow";
                        wrong_ans_4.disabled = true;
                        wrong_ans_4.style.backgroundColor = "yellow";
                        wrong_ans_5.disabled = true;
                        wrong_ans_5.style.backgroundColor = "yellow";
                        wrong_ans_6.disabled = true;
                        wrong_ans_6.style.backgroundColor = "yellow";
                    } else if (currentType.checked && i == 1) {
                        order_right_ans.disabled = false;
                        order_right_ans.style.backgroundColor = "#FFF";
                        wrong_ans_db.disabled = false;
                        wrong_ans_db.style.backgroundColor = "#FFF";
                        wrong_ans_test.disabled = false;
                        wrong_ans_test.style.backgroundColor = "#FFF";
                        wrong_ans_1.disabled = false;
                        wrong_ans_1.style.backgroundColor = "#FFF";
                        wrong_ans_2.disabled = false;
                        wrong_ans_2.style.backgroundColor = "#FFF";
                        wrong_ans_3.disabled = false;
                        wrong_ans_3.style.backgroundColor = "#FFF";
                        wrong_ans_4.disabled = false;
                        wrong_ans_4.style.backgroundColor = "#FFF";
                        wrong_ans_5.disabled = false;
                        wrong_ans_5.style.backgroundColor = "#FFF";                                    
                        wrong_ans_6.disabled = false;
                        wrong_ans_6.style.backgroundColor = "#FFF";                        
                    }
                }
            }
            function update_wrong_ans() {
                var wrong_ans_db = document.getElementById("wrong_ans_db").value;
                var i = 0;
                for (i = 6; i > parseInt(wrong_ans_db); i--) {
                    var name = "wrong_ans_" + i;
                    var img = "wa_file_"+i;
                    var wrong_ans = document.getElementById(name);
                    var wa_file = document.getElementById(img);
                    wrong_ans.disabled = true;
                    wa_file.disabled = true;
                    wrong_ans.style.backgroundColor = "yellow";
                }
                for (i = 1; i <= parseInt(wrong_ans_db); i++) {
                    var name = "wrong_ans_" + i;
                    var img = "wa_file_"+i;
                    var wrong_ans = document.getElementById(name);
                     var wa_file = document.getElementById(img);
                    wrong_ans.disabled = false;
                    wa_file.disabled = false;
                    wrong_ans.style.backgroundColor = "#FFF";
                }
            }
            
            function check_input(value) {
                var check = document.getElementById("content_input");
		var value_transform = "";
		var count_parity = false;
		for (i = 0; i < value.length; i++) {
			if (value.charAt(i) == '$')  {
				if (i < value.length - 1 && value.charAt(i + 1) == '$') {
					if (count_parity == false) {
						count_parity = true;
						value_transform += "<div class=\'latex_newline\'>";
					} else {
						count_parity = false;
						value_transform += "</div>";
					}
					i++;
					
				} else {
					if (count_parity == false) {
						count_parity = true;
						value_transform += "<div class=\'latex\'>";
					} else {
						count_parity = false;
						value_transform += "</div>";
					}
				}
				
			} else {
				value_transform += value.charAt(i);
			}
		}
                check.innerHTML = "" + value_transform;
                $(".latex").latex();
		$(".latex_newline").latex();
		//$("#content_input").latex();
            }
            
            //var input = document.querySelector("wrong_ans_db");
            //input.addEventListener("wrong_ans_db", function() {
            //    alert(input.value);
            //});
            function validate() {
                var integerExp = /[1-6]/;
                var wrong_ans_db = document.getElementById("wrong_ans_db").value;
                var wrong_ans_test = document.getElementById("wrong_ans_test").value;
                var right_ans = document.getElementById("right_ans").value;
                var ra_img = document.getElementById("ra_img").value;

                var content = document.getElementById("q_content").value;
                var content_img = document.getElementById("content_img").value;

                var code_select = document.getElementById("code_select").value;
                var topic_select = document.getElementById("topic_select").value;
                var part_select = document.getElementById("part_select").value;
                var order_select = document.getElementById("order_select").value;
                var lang_select = document.getElementById("lang_select").value;
                var mark_select = document.getElementById("mark_select").value;
                var time_test = document.getElementById("time_test").value;
                var order_right_ans = document.getElementById("order_right_ans").value;
                var str_error = "";
                var check = true;;
                if (content == "" && content_img == "") {
                    str_error += "Nội dung câu hỏi không được để trống! <br>";
                    check = false;
                }
                if(code_select == ""){
                     str_error += "Vui lòng chọn lớp!<br>";
                    check = false;
                }
                if(topic_select == ""|| topic_select == null){
                     str_error += "Vui lòng chọn Chủ đề (Chuyên đề)!<br>";
                    check = false;
                }
                if(part_select == ""){
                     str_error += "Vui lòng chọn Phần!<br>";
                    check = false;
                }
                if(order_select == ""|| order_select == "0"){
                     str_error += "Vui lòng chọn số thứ tự câu hỏi!<br>";
                    check = false;
                }
                if(lang_select == ""){
                     str_error += "Vui lòng chọn ngôn ngữ!<br>";
                    check = false;
                }
                if(mark_select == ""){
                     str_error += "Vui lòng chọn điểm câu hỏi!<br>";
                    check = false;
                }
                if(time_test == ""){
                     str_error +="Vui lòng nhập thời gian làm câu hỏi (giây) !<br>";
                    check = false;
                }
                if ((right_ans == null) || (right_ans == "") && ra_img== "") {
                     str_error += "Nội dung câu trả lời đúng không được để trống!<br>";
                    check = false;
                }
                if (wrong_ans_db == "") {
                     str_error += "Vui lòng nhập số câu trả lời sai trong cơ sở dữ liệu!<br>";
                    check = false;
                }
                if (wrong_ans_test == "") {
                     str_error +="Vui lòng nhập số câu trả lời sai khi làm bài kiểm tra<br>";
                    check = false;
                }   
                if (order_right_ans == "") {
                     str_error +="Vui lòng nhập vị trí đáp án đúng<br>";
                    check = false;
                }                
                //alert(wrong_ans_test);
                if (!(wrong_ans_db.match(integerExp))) {
                     str_error +="Nhập sai số câu trả lời trong csdl<br>";
                    check = false;
                }
                if (!(wrong_ans_test.match(integerExp))) {
                     str_error += "Nhập sai số câu trả lời trong bài kiểm tra<br>";
                    check = false;
                }
                wrong_ans_db = parseInt(wrong_ans_db);
                wrong_ans_test = parseInt(wrong_ans_test);
                if (wrong_ans_test > wrong_ans_db) {
                     str_error += "Số câu trả lời trong bài kiểm tra không được lớn hơn số câu trả lời sai trong csdl<br>";
                    check = false;
                }
                if (order_right_ans < 1 || order_right_ans > wrong_ans_test + 1) {
                     str_error +="Vị trí đáp án đúng phải nằm từ 1 đến " + (wrong_ans_test + 1) + "<br>";
                    check = false;
                }   
                var wrong_ans_error = "";
                for (var i = 1; i <= wrong_ans_db; i++) {
                    var wrong_ans = document.getElementById("wrong_ans_" + i).value;
                    //var img_wrong_ans = $("#wa_file_" + i).files[0].size;
                    var img_wrong_ans = (document.getElementById("wa_file_" + i).value);
                    
                    if (wrong_ans == "" && img_wrong_ans == "" ) {
                        wrong_ans_error =  "Vui lòng nhập đủ " + wrong_ans_db + " đáp án sai.<br>";
                        check = false;
                    }
                }
                str_error += wrong_ans_error;
                if(check == true){
                    //alert(topic_select);
                    console.log("a");
                    $("#add_test_question_frm").submit();
                    $("#show_errors").html("");
                    $("#show_errors").css("background","none");
                    $("#show_errors").css("border"," none");
                    $("#close_show_box").hide();
                     
                }else{
                    $("#show_errors").html(str_error);
                    $("#show_errors").css("background","#fbd1d1");
                    $("#show_errors").css("border"," 1px solid #ec9494");
                    $("#show_errors").css("padding"," 10px ");
                    $("#show_errors").css("color"," brown ");
                    $("#close_show_box").show();
                    
                }
                
            }
            
            //To type latex
            onload = function() {
               
                $(".latex").latex();
                $("#check_input").Change (function() {
                    $(".latex").latex();
		    $(".latex_newline").latex();
                });
                return update_wrong_ans();
            }
            
            ready = function() {
                $(".latex").latex();                
            }
            window.onload = function(){
                 update_wrong_ans();
            }
            
            
         $(document).ready(function(){
            $("#submit_add").click(function(e){
                e.preventDefault();
                validate();
                console.log("a");
            });
            $("#close_show_box").click(function(){
                $("#show_errors").html("");
                $("#show_errors").css("background","none");
                $("#show_errors").css("border"," none");
                $("#close_show_box").hide();
            });
         });
        </script>


</head>
<div style='height:20px;'></div>  
    <div style = "width:60px; height: 20px; border-radius: 3px; border: 1px solid#888;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a style = "text-decoration: none;" href = "<?php echo base_url()?>index.php/admin/logoutadmin">
        Logout</a>
    </div>
    <div style = "width:180px; height: 20px; border-radius: 3px; border: 1px solid#888;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a tyle = "text-decoration: none;" href = "<?php echo base_url()?>index.php/admin/choose_year_question">
            Hệ thống quản lý câu hỏi</a>
    </div>
      <div style = "width:100px; height: 20px; border-radius: 3px; border: 1px solid#888;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a tyle = "text-decoration: none;" href = "<?php echo base_url()?>index.php/admin/img_slide">
            Ảnh Slide</a>
    </div>
    <div style = "width:180px; height: 20px; border-radius: 3px; border: 1px solid#888;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a tyle = "text-decoration: none;" href = "<?php echo base_url()?>index.php/admin/system_argument_management">
            Quản lý tham số hệ thống </a>
    </div>
<body>

<!--THANH TIEU DE-->
<!--<div class="latex">
    \int_{0}^{\pi}\frac{x^{4}\left(1-x\right)^{4}}{1+x^{2}}dx =\frac{22}{7}-\pi
</div>-->

<div id="check_input">
    <header>Xem lại nội dung<hr/></header>
    <div id="content_input"></div>
</div>


<div id="wrapper">
    <?php if($success == "yes") {?>
        <div class="header_block_success">
            <!-- <div class="v_tick_img"><img src="<?php echo base_url();?>images/question/admin/white-icon-tick.png" height="30" width="30"/></div> -->
            <p>Câu hỏi đã được thêm vào cơ sở dữ liệu thành công</p>
        </div>
    <?php }?>
    <div style="position: fixed; top:25%;width: 83.5%;z-index: 1;">
        <div class="header_block_success" id="show_errors" style="background:none; border: none;width: 100%;z-index: 1;">
            
        </div>
        <div id="close_show_box"style="display:none;position: absolute;right: 0; margin-right: -20px; margin-top: 10px; color: brown;font-family: sans-serif;cursor: pointer;">&Chi;</div>
    </div>
    <div class="header_block">
                Nhập câu hỏi cho năm học <?php echo $year;?>
		<?php ?>
    </div>
    <div class="center_block">
    <form method="post" action="<?php echo base_url();?>admin/add_test_question_complete/<?php echo $year;?>" id="add_test_question_frm" name="add_test_question_frm" enctype="multipart/form-data">
        <fieldset>
        <label>
                Chọn chủ đề* 
            </label>
            <select id="topic_select" multiple="multiple" name="topic_select[]" data-placeholder="Chọn Chuyên đề">
                 
                <?php $i = 0; while(isset($topic[$i])) {?>                    
                    <?php
                        if (isset($current_selected['topic_id']) && (strcmp(''.$topic[$i]['id'],''.$current_selected['topic_id'])==0)) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        }
                    ?>
                    <option value="<?php echo $topic[$i]['id']?>" <?php echo $selected;?>>
                                        <?php echo $topic[$i]['name'];?></option>
                <?php $i++;}?>
            </select>
	    <label>
                Chọn Lớp*
            </label>
            <select id="code_select" name="code_select">
                <option value="" disabled="" selected="">Chọn lớp</option>
                <?php for($i = 0; isset($code[$i]); $i++) {?>
                    <option value="<?php echo $code[$i]['id'];?>"><?php echo $code[$i]['title'];?></option>
                <?php }?>

            </select>
	    
            
	        <label>
                Thuộc phần* 
            </label>
            <select id="part_select" name="part_select">
                
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
            </select>
	    <label>
                Chọn số thứ tự trong đề*
            </label>
            <select id="order_select" name="order_select">
                <option value="0" disabled="" selected="">Chọn STT trong đề</option>
		<?php for ($i = 1; $i <= 40; $i++) {?>
                <option value="<?php echo $i;?>">
                        <?php echo $i;?></option>
		<?php }?>
                
            </select>
	    
	    <label>
                Chọn ngôn ngữ*
            </label>
            <select id="lang_select" name="lang_select">
                <option value="en">English</option>
		<option value="vi">Tiếng Việt</option>                
            </select>
	    
	    <label>
                Chọn điểm số*
            </label>
            <select id="mark_select" name="mark_select" >
                <?php for($i = 0; $i <= 7; $i++) {?>
			<option value="<?php echo $i;?>"><?php echo $i;?></option>
		<?php }?>
            </select>
        <label>
            Thời gian làm câu hỏi (giây)*
        </label>
        <input type="number" oninput="maxLengthCheck(this)" min = "1" max="999" name="time_test" id="time_test" onkeypress="return isNumeric(event)" style="padding: 3px;">
           
            <label hidden>
                Chọn mức độ câu hỏi*
            </label>
          <!--   <?php
                if (isset($current_selected['level']) && $current_selected['level'] == 0) {
                    $level_check_cb = true;
                    $level_check_nc = false;
                } else {
                    $level_check_cb = false;
                    $level_check_nc = true; 
                }                
            ?> -->
            <p class="p_radio" hidden><input type="radio" name="level" id="radio_level" value="0" hidden checked=<?php echo $level_check_cb;?> /> Dễ</p>
            <p class="p_radio" hidden><input type="radio" name="level" id="radio_level" value="1" hidden checked=<?php echo $level_check_nc;?> /> Trung bình</p>
            <p class="p_radio" hidden><input type="radio" name="level" id="radio_level" value="2" hidden checked=<?php echo $level_check_nc;?> /> Nâng cao</p>
            
            <label hidden>
                Chọn loại câu hỏi*
            </label>
            <p class="p_radio" hidden><input type="radio" hidden name="type" id="radio_type" value="0" checked="checked" onclick="update_type();" /> Điền đáp án</p>
            <p class="p_radio" hidden><input type="radio" hidden name="type" id="radio_type" value="1" checked="unchecked" onclick="update_type();" /> Trắc nghiệm</p>
            
            <label>
                Nhập nội dung câu hỏi*
            </label>
            <!--<div class="ckeditor_content">                    
                    <?php //$this->load->view('commons/show_ckeditor');?>
            </div>-->
            <textarea rows="5" cols="65" name="q_content" id="q_content" onInput="check_input(this.value);" onfocus="check_input(this.value);" ></textarea>
            
            <label>
                Chọn ảnh kèm câu hỏi
            </label>
            <input type="file" name="q_file" id="content_img"  class="file"/>
            
            <div class="block_two">
            <label>
                Nhập đáp án đúng*
            </label>
            <input type="text" size=30 name="right_ans" id="right_ans" onInput="check_input(this.value);" onfocus="check_input(this.value);">
            <label>
                Chọn ảnh kèm đáp án đúng
            </label>
            <input type="file" id = "ra_img" name="ra_file" class="file"/>
            </div>
            
	    <label>
                Nhập STT câu đúng*
            </label>
            <input type="text" size=4 name="order_right_ans" id="order_right_ans">
	    
            <label>
                Nhập gợi ý câu trả lời
            </label>
            <textarea rows="5" cols="65" name="hint" id="hint" onInput="check_input(this.value);" onfocus="check_input(this.value);"></textarea>
            
            <label>
                Chọn ảnh kèm gợi ý
            </label>
            <input type="file" name="hint_file" class="file"/>
            
            <label>
                Chọn số đáp án sai trong cơ sở dữ liệu*
            </label>
            <input type="text" size=5 name="wrong_ans_db" id="wrong_ans_db" value="4" maxlength="1" onInput="update_wrong_ans();" onfocus="update_wrong_ans();"/>
            
            <label>
                Chọn số đáp án sai khi làm bài*
            </label>
            <input type="text" size=5 name="wrong_ans_test" id="wrong_ans_test"   maxlength="1" value="4"/>
            
            <div class="block_two">
            <label>
                Đáp án sai thứ nhất*
            </label>
            <input type="text" size=30 name="wrong_ans_1" id="wrong_ans_1" onInput="check_input(this.value);" onfocus="check_input(this.value);">            
            <label>
                Chọn ảnh kèm đáp án sai thứ nhất
            </label>
            <input type="file" name="wa_file_1" id ="wa_file_1" class="file"/>
            </div>
            
            <div class="block_two">
            <label>
                Đáp án sai thứ hai*
            </label>
            <input type="text" size=30 name="wrong_ans_2" id="wrong_ans_2" onInput="check_input(this.value);" onfocus="check_input(this.value);">
            <label>
                Chọn ảnh kèm đáp án sai thứ hai
            </label>
            <input type="file" name="wa_file_2" id ="wa_file_2" class="file"/>
            </div>
            
            <div class="block_two">
            <label>
                Đáp án sai thứ ba*
            </label>
            <input type="text" size=30 name="wrong_ans_3" id="wrong_ans_3" onInput="check_input(this.value);" onfocus="check_input(this.value);">
            <label>
                Chọn ảnh kèm đáp án sai thứ ba
            </label>
            <input type="file" name="wa_file_3" id ="wa_file_3" class="file"/>
            </div>
            
            <div class="block_two">
            <label>
                Đáp án sai thứ tư*
            </label>
            <input type="text" size=30 name="wrong_ans_4" id="wrong_ans_4" onInput="check_input(this.value);" onfocus="check_input(this.value);">
            <label>
                Chọn ảnh kèm đáp án sai thứ tư
            </label>
            <input type="file" name="wa_file_4" id ="wa_file_4" class="file"/>
            </div>
            
            <div class="block_two">
            <label>
                Đáp án sai thứ năm
            </label>
            <input type="text" size=30 name="wrong_ans_5" id="wrong_ans_5" onInput="check_input(this.value);" onfocus="check_input(this.value);">
            <label>
                Chọn ảnh kèm đáp án sai thứ năm
            </label>
            <input type="file" name="wa_file_5" id ="wa_file_5" class="file"/>
            </div>
            
            <div class="block_two">
            <label>
                Đáp án sai thứ sáu
            </label>
            <input type="text" size=30 name="wrong_ans_6" id="wrong_ans_6" onInput="check_input(this.value);" onfocus="check_input(this.value);">
            <label>
                Chọn ảnh kèm đáp án sai thứ sáu
            </label>
            <input type="file" name="wa_file_6" id ="wa_file_6" class="file"/>
            </div>
            
            <button type="button" id="submit_add">Ghi nhận</button>
	    <button type="button"><a href="<?php echo base_url();?>index.php/admin/view_test_question_table/"">Xem bảng câu hỏi</a> </button>
        </fieldset>
    </form>
    
    </div>
    
</div>

<div class="immense_line">
    <hr>
</div>

<!--PHAN FOOTER CUA TRANG WEB-->

   
</body>
<script>
    $("#topic_select").multipleSelect({
        filter: true,
   
    });
    function maxLengthCheck(object) {
    if (object.value.length > object.max.length)
      object.value = object.value.slice(0, object.max.length)
    }
    
    function isNumeric (evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode (key);
        var regex = /[0-9]|\./;
        if ( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>
</html>


    