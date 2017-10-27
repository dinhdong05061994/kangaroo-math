<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url();?>"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $this->load->view("commons/title_all")?>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="css/template.css" />
<link type="text/css" rel="stylesheet" href="css/practice_choose.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Kangaroo, toan hoc kangaroo, khoa hoc , kangaroo viet nam" />
<meta name="description" content="Viet Nam math Kangaroo " />
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>
<script>
    var lang = "en";
    var code = 0;
    function set_lang(str_lang){
        lang = str_lang;
        if(code > 0) choose_grade(code);
    }
    function choose_grade(value){
        code = value;
        $.ajax({
            url: "<?php echo base_url();?>practice/load_year/" + code + "/" + lang,
            type: 'GET',
            cache: false,
            data: {
               
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
        window.location.href = "http://kangaroo-math.vn/practice/doing/" + year + "/" + code + "/" + lang;
    }
    function back_choose(){
        document.getElementById("show_year").style.display = "none";
        document.getElementById("show_grade").style.display = "block";
        document.getElementById("btn_back").style.display = "none";
        code = 0;
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
                <div class="col-sm-9 content">
             	<!----------Luyen thi-------------->
                
                
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a onclick="set_lang('en');" role="tab" data-toggle="tab">English</a></li>
                    <li role="presentation"><a onclick="set_lang('vi');" role="tab" data-toggle="tab">Tiếng Việt</a></li>
    
  				</ul>

  <div class="tab-content">
    
  </div>
                
    
               		<div class="row luyenthi">
                    	<h3>Chọn bài thi thử</h3>
                       	<div class="row lt">
                        	
                            <div class="row lt-item" id="show_grade">
                            <?php
                                foreach($list_code as $code)
                                {
                            ?>
                                <div class="col-sm-4" onclick="choose_grade(<?php echo $code['id'];?>);">
                                	<img src="img/kangaroo/sach.jpg" class="img-responsive" />
                                    <h4><?php echo $code['title'];?></h4>
                                </div><!--End bkt-item-->
                            <?php
                                }
                            ?>
                                
                            </div><!--End .bkt-->
                            <div class="row lt-item" id="show_year" style="display:none;">
                            </div><!--End .bkt-->
                            <div onclick="back_choose();" id="btn_back" style="display: none; width:60px; height:60px; background:url(<?php echo base_url().""?>img/kangaroo/back_3.png); background-repeat:no-repeat; background-size:100% 100%;">
                            	
                            </div>
                        </div>
                        
                    </div><!---End .ds bài thi-->
            	<!----------End Luyen thi-------------->
                
                
                
                
                <div style="margin-top:40px; margin-left:15px;" class="row">
                <h4 style="">Xem Thêm :</h4><span class="label label-success">Đăng ký dự thi</span><span class="label label-success">Tài liệu</span><span class="label label-success">Địa chỉ dự thi</span><span class="label label-success">Hướng dẫn đang ký</span>
                </div>
                <?php $this->load->view("commons/list_donors")?>
            </div><!--End .Content-->
            </div>
            </section>
        
        </div>
	
    
    <?php $this->load->view("commons/footer_all");?>
	
    
    </div>
    
</body>
</html>
