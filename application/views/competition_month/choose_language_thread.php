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
                            <?php
                            if(!$this->session->userdata('no-question') || $user['level'] ==17 || $user['level'] == -1){
                            ?>
                           	<!--End .Nav-->
                                <form name="form" id="form" style="padding: 50px; text-align: center;" >
                                    <h3><?=$lang=='en'?'Please choose the language of the test':'Vui lòng chọn ngôn ngữ bài thi'?></h3>
                                    <div class="btn btn-success" id="btn-choose-vi" ><?= $lang=='en' ? 'Vietnamese':'Tiếng Việt'?></div>
                                    <div class="btn btn-success" id="btn-choose-en"><?= $lang=='en' ? 'English':'Tiếng Anh'?></div>
                                   
                                    
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
                                
                             <?php
                            }else{
                            ?>
                            <h3 style="padding: 100px; text-align: center;" >Hệ thống đang cập nhật dữ liệu bài thi. Vui lòng quay lại sau</h3>
                            <?php
                            }
                            ?>       
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
        var language = "<?=$lang;?>";
        $("#btn-choose-vi").click(function(){
            var msg_vi = language=='vi'?"Are you sure to choose Vietnamese language?" : "Bạn có chắc chắn muốn chọn ngôn ngữ là tiếng Việt?";
            if(confirm(msg_vi)) {
                window.location.href = "do_competition_month-vi"
            }
        });
        $("#btn-choose-en").click(function(){
            var msg_en = language=='en'?"Are you sure to choose English language?" : "Bạn có chắc chắn muốn chọn ngôn ngữ là tiếng Anh?";
            if(confirm(msg_en)){
                window.location.href = "do_competition_month-en";
            }
        });
        
    });
    
</script>

</html>
