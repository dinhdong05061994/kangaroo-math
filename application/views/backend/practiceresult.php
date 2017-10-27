<html xmlns="https://www.w3.org./1999/xhtml"/>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset = utf-8" />
    <meta http-equiv="Content-Language" content="vi" />
    <!--<link href="<?php echo base_url();?>css/amc/tt_index.css" rel="stylesheet" type="text/css"/>-->
    <link href="<?php echo base_url();?>css/admin/practiceresult.css" rel="stylesheet" type="text/css"/>
 <!--<script type="text/javascript" src="<?php // echo base_url();?>js/lms-main_vendor.js" charset="utf-8"></script> -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-2.1.4.min.js"></script>
    <!--<script type="text/javascript" src="<?php //echo base_url(); ?>js/jquery.jslatex.forTest.js"></script>    
     <script type="text/javascript" src="<?php //echo base_url(); ?>js/jquery.form.js"></script> -->
    
<title>Quản trị</title>
<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
     
<script type="text/javascript">
 webshims.setOptions('forms-ext', {types: 'date'});
        webshims.polyfill('forms forms-ext');
        webshims.formcfg = {
        en: {
            dFormat: '/',
            dateSigns: '/',
            patterns: {
                d: "dd/mm/yy"
            }
        }
     };
         webshims.activeLang('en');

     function back_page(){
        window.history.back();
    }
 function convertString(str){
        str= str.trim()+"";
        str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
        str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
        str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
        str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
        str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
        str= str.toLowerCase();
        return str;
    }

    function filterTable(num_table_row, arr_valuesearch, arr_columnname){
        for (var i = 1; i <=num_table_row; i++) {
            
            document.getElementById('line_' + i).style.display = "block";
            for (var j = 0; j < arr_columnname.length; j++) {
                var element_filter = convertString(document.getElementById(arr_columnname[j].toString() + '_' + i).innerHTML);
                if(element_filter.indexOf(arr_valuesearch[j].toString()) < 0){
                   
                        document.getElementById('line_' + i).style.display = "none";
                }
            };
            
                    
                   
        };
    }
    $(document).ready(function() {
        var arr_element = ["fullname", "nickname","email"];
        $("input").keyup(function (e) {
            var arr_valuesearch = new Array();
            var arr_columnname = new Array();
            
            for (var i = 0; i < arr_element.length; i++) {
                var element_search = convertString(document.getElementById(arr_element[i].toString() + '_search').value);
                if(element_search != ""){
                    arr_valuesearch.push(element_search);
                    arr_columnname.push(arr_element[i].toString());
                }
            };
   
            filterTable(<?php echo count($user);?>, arr_valuesearch, arr_columnname);
    
        });
        
    });

    
   
 function closeaction(id){
    document.getElementById(''+id).style.display="none";
 }


</script>
</head>
<body>	
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
    
    <div id = "wrapper" class = "wrapper" >
        <div class = "title">Bảng kết quả người dùng luyện tập</div>
    	
        <div class = "content">
    		<div class ="headline">
                        <div class = "order" id ="horder" title= "Số thứ tự">STT</div>
                        
                        <div class = "fullname" id ="hfullname" title= "Tên người dùng">Tên người dùng</div>
                        <div class = "nickname" id = "hnickname" title = "Tên đăng nhập">Tên đăng nhập</div>
                        
                        <div class = "email" id = "hemail" title = "Email">Email</div>
                        <div class = "times" id = "htimes" title = "Số lần làm bài">Số lần làm bài</div>
                        <div class = "point" id = "hpoint" title = "Điểm TB làm bài">Điểm TB làm bài</div>
                        <!-- <div class = "nation" id = "hnation">Quốc gia</div> -->
                        <div class = "hresults" id = "hresults" title = "5 KQLT gần nhất">5 KQLT gần nhất</div>
                   
             </div>
             <form name="id_user" method="post" action="">
    		<div class = "table" id = "tbuser">    				    		
    			<div class = "contenttable" id ="contentuser">                    
    				<?php for($i = 0 ; $i < count($user); $i++) {?>
    				<div class = "oneline" id = "line_<?php echo $i+1;?>" style = "display:block;">
                        <div class = "order" title= "Số thứ tự"><?php echo $i+1;?></div> 
                           
    					<div class = "fullname" name = "fullname" id ="fullname_<?php echo $i+1;?>"  title = "<?php echo $user[$i]['fullname'];?>"><?php echo $user[$i]['fullname'];?>
                        </div>
	    				
	    				<div class = "nickname" name = "nickname" id = "nickname_<?php echo $i+1;?>" title = "<?php echo $user[$i]['nickname'];?>"><?php echo $user[$i]['nickname'];?></div>
	    				
	    				
	    				<div class = "email" name = "email" id = "email_<?php echo $i+1;?>" title = "<?php echo $user[$i]['email'];?>"><?php echo $user[$i]['email'];?>
                        </div>
	    				<div class = "times" name = "times" id = "times_<?php echo $i+1;?>" title = "<?php echo $user[$i]['times'];?>"><?php echo $user[$i]['times'];?></div>
	    				<div class = "point" name = "point" id = "point_<?php echo $i+1;?>" title = "<?php echo $user[$i]['point'];?>"><?php echo $user[$i]['point'];?></div>
	    				<div class = "results" id = "results" title = "<?php echo $user[$i]['5_recent_results'];?>"><?php echo $user[$i]['5_recent_results'];?>
                        </div>    
                               
                    </div>

                    <?php 
                        }
                    ?>                     
    			</div>                 
    		</div>
            </form>
    		 <div id="search">
                    <div class="sfullname">
                         <input type="search" title = "Nhập tên học sinh cần tìm kiếm" class="input_search" name="fullname_search" id="fullname_search"  placeholder="Nhập Tên người dùng...">
                    </div>
                    <div class="snickname">
                        <input type="search" title = "Nhập tên đăng nhập bạn muốn lọc" class="input_search" name="nickname_search" id="nickname_search"  placeholder="Nhập Tên đăng nhập...">
                    </div>
                   
                    <div class="semail">
                        <input type="search" title = "Nhập email cần tìm kiếm" class="input_search" name="email_search" id="email_search"  placeholder="Nhập email cần tìm...">
                    </div>
                    
                </div>	    	</div>
      
   </div>
	

</body>