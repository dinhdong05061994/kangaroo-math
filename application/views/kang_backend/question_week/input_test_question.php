<!DOCTYPE HTML>

<meta http-equiv="content-type" content="text/html"  charset="utf-8"/>

<head>

	<meta http-equiv="content-type" content="text/html" />

	<title>Vietnam Math Kangaroo Contest</title>

    <!--CSS-->    


	<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css"/>


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

<!--     <script type="text/javascript" src="<?php echo base_url(); ?>/asset/ckfinder/ckfinder.js"></script> -->

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

                

                var wrong_ans_db = document.getElementById("wrong_ans_db");

                var wrong_ans_test = document.getElementById("wrong_ans_test");

                var wrong_ans_1 = document.getElementById("wrong_ans_1");

                var wrong_ans_2 = document.getElementById("wrong_ans_2");

                var wrong_ans_3 = document.getElementById("wrong_ans_3");

                var wrong_ans_4 = document.getElementById("wrong_ans_4");

               

                

                for(i = 0; i < type.length; i++) {

                    currentType = type[i];

                    if (currentType.checked && i == 0) {

                        

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

                       

                    } else if (currentType.checked && i == 1) {

                        

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

                                              

                    }

                }

            }

            function update_wrong_ans() {

                var wrong_ans_db = document.getElementById("wrong_ans_db").value;

                var i = 0;

                // for (i = 6; i > parseInt(wrong_ans_db); i--) {

                //     var name = "wrong_ans_" + i;

                //     var img = "wa_file_"+i;

                //     var wrong_ans = document.getElementById(name);

                //     var wa_file = document.getElementById(img);

                //     wrong_ans.disabled = true;

                //     wa_file.disabled = true;

                //     wrong_ans.style.backgroundColor = "yellow";

                // }

                // for (i = 1; i <= parseInt(wrong_ans_db); i++) {

                //     var name = "wrong_ans_" + i;

                //     var img = "wa_file_"+i;

                //     var wrong_ans = document.getElementById(name);

                //      var wa_file = document.getElementById(img);

                //     wrong_ans.disabled = false;

                //     wa_file.disabled = false;

                //     wrong_ans.style.backgroundColor = "#FFF";

                // }

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
                
                var lang_select = document.getElementById("lang_select").value;
                var mark_select = document.getElementById("mark_select").value;
                var time_test = document.getElementById("time_test").value;
                var str_error = "";
                var check = true;;
                if (content == "" && content_img == "") {
                    str_error += "Nội dung câu hỏi không được để trống! <br>";
                    check = false;
                }
                if(code_select == "" || code_select == null){
                     str_error += "Vui lòng chọn Cấp độ (Lớp)!<br>";
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
                
                if(lang_select == ""){
                     str_error += "Vui lòng chọn ngôn ngữ!<br>";
                    check = false;
                }
                if(mark_select == ""){
                     str_error += "Vui lòng chọn điểm câu hỏi!<br>";
                    check = false;
                }
                if(mark_select == "0"){
                     str_error += "Vui lòng chọn điểm câu hỏi lớn hơn 0!<br>";
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
                if(check == true){
                    //alert(topic_select);
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
            $("#submit_add-week").click(function(e){
                e.preventDefault();
                validate();
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

    <div style = "width:60px; height: 30px; border-radius: 3px; border: 1px solid#888;box-shadow: 2px 2px 1px #ccc; 

                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">

        <a style = "text-decoration: none;" href = "<?php echo base_url()?>index.php/kang_admin/logoutadmin">

        Logout</a>

    </div>

    

    <div style = "width:180px; height: 30px; border-radius: 3px; border: 1px solid#888;box-shadow: 2px 2px 1px #ccc; 

                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">

        <a tyle = "text-decoration: none;" href = "<?php echo base_url()?>index.php/kang_admin_week/view_test_question_table/">

            Quay Về Trang Chủ</a>

    </div>

<body>





<div id="check_input">

    <header>Xem lại nội dung<hr/></header>

    <div id="content_input"></div>

</div>





<div id="wrapper">

        <?php if($success == "yes") {?>

         <div style="width:60%; margin-left: 50px;">

            <p class="alert alert-success">Câu hỏi đã được thêm vào cơ sở dữ liệu thành công</p>

        </div>

    <?php }?>
    <div style="position: fixed; top:25%;width: 83.5%;z-index: 1;">
        <div class="header_block_success" id="show_errors" style="background:none; border: none;width: 100%;z-index: 1;">
            
        </div>
        <div id="close_show_box"style="display:none;position: absolute;right: 0; color: brown;font-family: sans-serif;cursor: pointer;">&Chi;</div>
    </div>


    <div class="header_block">
                Nhập câu hỏi cho Tuần
		

    </div>

    <div class="center_block">

    <form method="post" action="<?php echo base_url();?>index.php/kang_admin_week/add_test_question_complete/" id="add_test_question_frm" name="add_test_question_frm" enctype="multipart/form-data">
        
        <fieldset>

	    <label>

                Chọn Tuần Học*

            </label>

            <select id="week_select" name="level">
                <?php
                    for($i = 1; $i <= 25; $i++):
                ?>
                <option value="<?php echo $i;?>"><?php echo "Tuần ".$i;?></option>
                    <?php endfor;?>
            </select>
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

                Chọn Cấp Độ (Lớp)*

            </label>
                 <select id="code_select" name="course">
                 <option value="" disabled="" selected="">Chọn lớp</option>
                <?php
                    foreach($level as $item):
                ?>
                <option value="<?php echo $item['id'];?>"><?php echo $item['name'];?></option>
                    <?php endforeach;?>
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
            <label>

                Nhập nội dung câu hỏi*

            </label>


            <textarea rows="5" cols="65" name="q_content" id="q_content" onInput="check_input(this.value);" onfocus="check_input(this.value);" ></textarea>

            

            <label>

                Chọn ảnh kèm câu hỏi

            </label>

            <input type="file" name="q_file" id="content_img" class="file"/>

            

            <div class="block_two">

            <label>

                Nhập đáp án đúng*

            </label>

            <input type="text" size=30 name="right_ans" id="right_ans"  onInput="check_input(this.value);" onfocus="check_input(this.value);">

            <label>

                Chọn ảnh kèm đáp án đúng

            </label>

            <input type="file" name="ra_file" id="ra_img" class="file"/>

            </div>

            

            <label hidden="">

                Nhập STT câu đúng*

            </label>

            <input hidden="" type="text" size=4 name="order_right_ans" id="order_right_ans">

	    

            <label>

                Nhập gợi ý câu trả lời

            </label>

            <textarea rows="5" cols="65" name="hint" id="hint" onInput="check_input(this.value);" onfocus="check_input(this.value);"></textarea>

            

            <label>

                Chọn ảnh kèm gợi ý

            </label>

            <input type="file" name="hint_file" class="file"/>

            

            <label hidden="">

                Chọn số đáp án sai trong cơ sở dữ liệu*

            </label>

            <input hidden="" type="text" size=5 name="wrong_ans_db" id="wrong_ans_db" value="4" maxlength="1" onInput="update_wrong_ans();" onfocus="update_wrong_ans();"/>

            

            <label hidden="">

                Chọn số đáp án sai khi làm bài*

            </label>

            <input hidden="" type="text" size=5 name="wrong_ans_test" id="wrong_ans_test"   maxlength="1" value="4"/>

            

            <div class="block_two">

            <label>

                Đáp án sai thứ nhất*

            </label>

            <input  type="text" size=30 name="wrong_ans_1" id="wrong_ans_1" onInput="check_input(this.value);" onfocus="check_input(this.value);">            

            <label>

                Chọn ảnh kèm đáp án sai thứ nhất

            </label>

            <input type="file" name="wa_file_1" id ="wa_file_1" class="file"/>

            </div>

            

            <div class="block_two">

            <label>

                Đáp án sai thứ hai

            </label>

            <input  type="text" size=30 name="wrong_ans_2" id="wrong_ans_2" onInput="check_input(this.value);" onfocus="check_input(this.value);">

            <label>

                Chọn ảnh kèm đáp án sai thứ hai

            </label>

            <input type="file" name="wa_file_2" id ="wa_file_2" class="file"/>

            </div>

            

            <div class="block_two">

            <label>

                Đáp án sai thứ ba

            </label>

            <input  type="text" size=30 name="wrong_ans_3" id="wrong_ans_3" onInput="check_input(this.value);" onfocus="check_input(this.value);">

            <label>

                Chọn ảnh kèm đáp án sai thứ ba

            </label>

            <input type="file" name="wa_file_3" id ="wa_file_3" class="file"/>

            </div>

            

            <div class="block_two">

            <label>

                Đáp án sai thứ tư

            </label>

            <input type="text" size=30 name="wrong_ans_4" id="wrong_ans_4" onInput="check_input(this.value);" onfocus="check_input(this.value);">

            <label>

                Chọn ảnh kèm đáp án sai thứ tư

            </label>

            <input type="file" name="wa_file_4" id ="wa_file_4" class="file"/>

            </div>

            

            <button type="button" id="submit_add-week">Ghi nhận</button>

	    <button type="submit" formaction="<?php echo base_url();?>index.php/kang_admin_week/view_test_question_table/">Xem bảng câu hỏi</button>

        </fieldset>

    </form>

    

    </div>

    

</div>



<div class="immense_line">

    <hr>

</div>


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





    
