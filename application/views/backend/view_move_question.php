<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php $this->load->view("commons/title_all");?>
    <base href="<?php echo base_url();?>"></base>
    
    <script type="text/javascript" src="<?php echo base_url();?>js/lms-main_vendor.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.1.min.js"></script>
    
     <link href="<?php echo base_url();?>css/practice_doing.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/ikmc.css" />
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
     
   
    
</head>
<style type="text/css">
    #form .btn{
        width: 50%;
        margin-top: 30px;
        font-size: 20pt;
    }
    .modal-text{
        padding: 0px 20px 30px 0px;
        font-size: 20pt;
        text-align: center;  
    }
</style>

<body>
    	<section style="width:100%;" class="container">
        	<?php $this->load->view("ikmc/commons/header_all");?>
            <section class="content">
            	
            	<section class="baithithu">
                	
                    <div style="width:80%; margin:0px auto;">
                    	<div class="row">
                			<section class="row ct">
                           	<!--End .Nav-->
                                <form name="form" id="form" style="padding: 50px; text-align: center;" >
                                    
                                    <div class="btn btn-success" id="btn-move-month" >Chuyển câu hỏi tháng</div>
                                    <div class="btn btn-success" id="btn-move-year">Chuyển câu hỏi năm</div>
                                    <div class="btn btn-success" id="btn-move-week">Chuyển câu hỏi thử thách tuần</div>
                                    
                                </form>
                                <div class="modal fade" id="modal-success" role="dialog">
                                    <div class="modal-dialog">
                                    
                                      <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              
                                            </div>
                                            <div class="modal-text" id="modal-text">
                                                
                                            </div>
                                            
                                        </div>
                                      
                                    </div>
                                </div>
                                
                                    
                            </section>

                        </div>
                	</div>
                    
                </section>
            </section><!--End .baithithu-->
        </section>
    <?php $this->load->view("ikmc/commons/footer_all");?>
    
                
               
               
                
                           
</body>
   
<script type="text/javascript">
    $(document).ready(function() { 
        $("#btn-move-month").click(function(){
            if(confirm("Bạn có chắc chắn muốn chuyển câu hỏi kiểm tra hàng tháng không?")) move_question_month();
        });
        $("#btn-move-year").click(function(){
            if(confirm("Bạn có chắc chắn muốn chuyển câu hỏi kiểm tra năm không?")) move_question_year();
        });
        $("#btn-move-week").click(function(){
            if(confirm("Bạn có chắc chắn muốn chuyển câu hỏi thử thách tuần không?")) move_question_week();
        });
    });
    function move_question_month(){
        $.ajax({
            type: "POST",
            url: "http://kangaroo-math.vn//move_question_db/month",
            data: "",
            cache: false,
            success: function(html){
                $("#modal-text").html(html);
                $("#modal-success").modal();
            }
        });
    }
    function move_question_year(){
        $.ajax({
            type: "POST",
            url: "http://kangaroo-math.vn//move_question_db/year",
            data: "",
            cache: false,
            success: function(html){
                $("#modal-text").html(html);
                $("#modal-success").modal();
            }
        });
    }
    function move_question_week(){
        $.ajax({
            type: "POST",
            url: "http://kangaroo-math.vn//move_question_db/week",
            data: "",
            cache: false,
            success: function(html){
                $("#modal-text").html(html);
                $("#modal-success").modal();
            }
        });
    }
</script>

</html>