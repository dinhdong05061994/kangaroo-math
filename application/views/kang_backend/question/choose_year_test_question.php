<!DOCTYPE HTML>
<meta http-equiv="content-type" content="text/html"  charset="utf-8"/>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="abcde" />
        <title>Vietnam Math Kangaroo Contest</title>
	<link href="<?php echo base_url(); ?>public/css/home.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>css/modal.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>css/manageValidateCode.css" rel="stylesheet" type="text/css"/>
		
 	<!-- JS -->	

        
        <script type="text/javascript" >
            var show_button_select_con = false;
            
            onload = function() {
                show_button_select_con = false;
            }
            
            function show_button_select_con_func(){
                //alert("view");
                button_select_con_1 = document.getElementById("button_select_con_1");
                //alert(button_select_con_1.innerHTML);
                button_select_con_2 = document.getElementById("button_select_con_2");
                if (show_button_select_con == false) {
                    //alert("hi");
                    show_button_select_con = true;
                    button_select_con_1.style.display = "block";
                    button_select_con_2.style.display = "block";
                } else {
                    show_button_select_con = false;
                    button_select_con_1.style.display = "none";
                    button_select_con_2.style.display = "none";
                }
            }
            
        </script> 
	<!-- Load phan title-->
        
	<!--Het phan title-->
</head>

<body> 
<!--
<!--THANH TIEU DE-->
<div class="tilte_menu" id="tilte_menu">
	<div class="content">
	<div class="title_left"> 
            <div><span hidden="" class="title">Hệ thống quản lý câu hỏi</span></div>
	</div>
	<div class="title_right">
		<ul class= "name_user">
			<li class="name" style = "color:#4F5DA7; background: #fff; box-shadow: 2px 2px 1px #ccc; font-size: 12pt;">
			<?php $session_id = $this->session->userdata('admin');
                        echo $session_id['email'];
                    ?>
    			<ul class="choose" style = "width:130px; margin:5px 0;">
                    <li><a href = "<?php echo base_url();?>index.php/kang_admin/change_pass">Đổi mật khẩu</a></li>
                    <!-- <li><a href = "<?php echo base_url()?>index.php/kang_admin/choose_year_question">Hệ thống quản lý câu hỏi</a></li> -->
                    <br/>
                    <li><a href = "<?php echo base_url();?>index.php/kang_admin/view_test_question_table">Trang Chủ</a></li>
                </ul>
			</li>
		      <li class="name" style = "color:#eee!important; margin-left: 10px;background: #fff; box-shadow: 2px 2px 1px #ccc;"><a style="color:#4F5DA7!important;font-size: 12pt;" href = "<?php echo base_url()?>index.php/kang_admin/logoutadmin">Logout</a></li>
			
		</ul>
		
	</div>
	
	</div> 
	<div class="immense_line">
		<hr>
	</div>
</div> 

<div id="wrapper" class="wrapper">  
	
    <div class="header_block">
                Quản lý bảng câu hỏi
    </div>
    <div class="center_block">
    <form method="post" action="<?php echo base_url();?>index.php/kang_admin/add_test_question/" id="add_test_question_frm">
        <fieldset>
            <label style="line-height: 40px;">
                Chọn năm học
            </label>
            <select id="year_select" name="year_select">
		<?php
                    foreach($list_course as $item):
                ?>
                <option value="<?php echo $item['id'];?>"><?php echo $item['name'];?></option>
                   
                <?php endforeach;?>
            </select>
            <button type="submit" class="btn btn-default">Nhập câu hỏi</button>
            <button type="submit" class="btn btn-default" formaction="<?php echo base_url();?>index.php/kang_admin/view_test_question_table/">Xem bảng câu hỏi</button>
        </fieldset>
    </form>
    </div>
    
    
    
    
</div>



<div class="immense_line">
    <hr>
</div>

<!--PHAN FOOTER CUA TRANG WEB-->



	
</body>
</html>


    