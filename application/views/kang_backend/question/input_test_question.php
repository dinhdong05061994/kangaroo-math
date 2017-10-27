<!DOCTYPE HTML>

<meta http-equiv="content-type" content="text/html"  charset="utf-8"/>

<head>

	<meta http-equiv="content-type" content="text/html" />

	<title>Vietnam Math Kangaroo Contest</title>

    <!--CSS-->    

	<link href="<?php echo base_url(); ?>public/css/home.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

	

    <link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo base_url();?>css/modal.css" rel="stylesheet" type="text/css"/>

    <link href="<?php echo base_url();?>css/manageValidateCode.css" rel="stylesheet" type="text/css"/>

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

    </style>

 	<!-- JS -->	



    <script type="text/javascript" src="<?php echo base_url(); ?>/asset/ckeditor/ckeditor.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>/asset/ckfinder/ckfinder.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-2.1.4.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.jslatex.js"></script>

    <script type="text/javascript" src="http://latex.codecogs.com/latexit.js"></script>

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

            

          

            function validate() {

                var integerExp = /[1-6]/;

                var wrong_ans_db = document.getElementById("wrong_ans_db").value;

                var wrong_ans_test = document.getElementById("wrong_ans_test").value;

              

                var right_ans = document.getElementById("right_ans");

               

                if ((right_ans == null) || (right_ans == "")) {

                    alert("Noi dung cau tra loi dung khong duoc rong!");

                    return false;

                }

                if (wrong_ans_db == null) {

                    alert("So cau tra loi sai trong csdl khong duoc rong")

                    return false;

                }

                if (wrong_ans_test == null) {

                    alert("So cau tra loi sai khi lam bai test khong duoc rong")

                    return false;

                }                

                //alert(wrong_ans_test);

                if (!(wrong_ans_db.match(integerExp))) {

                    alert("Nhap sai so cau tra loi sai trong csdl");

                    return false;

                }

                if (!(wrong_ans_test.match(integerExp))) {

                    alert("Nhap sai so cau tra loi sai trong bai kiem tra");

                    return false;

                }

                wrong_ans_db = parseInt(wrong_ans_db);

                wrong_ans_test = parseInt(wrong_ans_test);

                if (wrong_ans_test > wrong_ans_db) {

                    alert("So cau tra loi sai khi lam bai kiem tra khong duoc lon hon so cau tra loi sai trong csdl");

                    return false;

                }

                return true;

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

        <a tyle = "text-decoration: none;" href = "<?php echo base_url()?>index.php/kang_admin/view_test_question_table/">

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



    <div class="header_block">
                Nhập câu hỏi cho chuyên đề <span style="color:red;"><?php echo $year['name'];?></span>
		<?php ?>

    </div>

    <div class="center_block">

    <form method="post" action="<?php echo base_url();?>index.php/kang_admin/add_test_question_complete/<?php echo $year['id'];?>" id="add_test_question_frm" name="add_test_question_frm" enctype="multipart/form-data" onsubmit="return validate()">
        <input hidden="" type="text" name="year_select" value="<?php echo $year['id'];?>" />
        <fieldset>

	    <label>

                Chọn Level ( Lớp )

            </label>

            <select id="code_select" name="level">
                <?php
                    foreach($level as $item):
                ?>
                <option value="<?php echo $item['id'];?>"><?php echo $item['name'];?></option>
                    <?php endforeach;?>
            </select>
	    <label>

                Chọn Mức Độ

            </label>

            <select id="code_select" name="code_select">

                    <option value="1">Dễ ( A )</option>
                    <option value="2">Trung Bình ( B )</option>
                    <option value="3">Khó ( C )</option>


            </select>


            <label>

                Nhập nội dung câu hỏi*

            </label>


            <textarea rows="5" cols="65" name="q_content" id="q_content" onInput="check_input(this.value);" onfocus="check_input(this.value);" >1</textarea>

            

            <label>

                Chọn ảnh kèm câu hỏi

            </label>

            <input type="file" name="q_file" class="file"/>

            

            <div class="block_two">

            <label>

                Nhập đáp án đúng*

            </label>

            <input type="text" size=30 name="right_ans" id="right_ans" value="1" onInput="check_input(this.value);" onfocus="check_input(this.value);">

            <label>

                Chọn ảnh kèm đáp án đúng

            </label>

            <input type="file" name="ra_file" class="file"/>

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

            <input value="1" type="text" size=30 name="wrong_ans_1" id="wrong_ans_1" onInput="check_input(this.value);" onfocus="check_input(this.value);">            

            <label>

                Chọn ảnh kèm đáp án sai thứ nhất

            </label>

            <input type="file" name="wa_file_1" id ="wa_file_1" class="file"/>

            </div>

            

            <div class="block_two">

            <label>

                Đáp án sai thứ hai

            </label>

            <input value="1" type="text" size=30 name="wrong_ans_2" id="wrong_ans_2" onInput="check_input(this.value);" onfocus="check_input(this.value);">

            <label>

                Chọn ảnh kèm đáp án sai thứ hai

            </label>

            <input type="file" name="wa_file_2" id ="wa_file_2" class="file"/>

            </div>

            

            <div class="block_two">

            <label>

                Đáp án sai thứ ba

            </label>

            <input value="1" type="text" size=30 name="wrong_ans_3" id="wrong_ans_3" onInput="check_input(this.value);" onfocus="check_input(this.value);">

            <label>

                Chọn ảnh kèm đáp án sai thứ ba

            </label>

            <input type="file" name="wa_file_3" id ="wa_file_3" class="file"/>

            </div>

            

            <div class="block_two">

            <label>

                Đáp án sai thứ tư

            </label>

            <input value="1" type="text" size=30 name="wrong_ans_4" id="wrong_ans_4" onInput="check_input(this.value);" onfocus="check_input(this.value);">

            <label>

                Chọn ảnh kèm đáp án sai thứ tư

            </label>

            <input type="file" name="wa_file_4" id ="wa_file_4" class="file"/>

            </div>

            

            <button type="submit">Ghi nhận</button>

	    <button type="submit" formaction="<?php echo base_url();?>index.php/kang_admin/view_test_question_table/">Xem bảng câu hỏi</button>

        </fieldset>

    </form>

    

    </div>

    

</div>



<div class="immense_line">

    <hr>

</div>


</body>

</html>





    