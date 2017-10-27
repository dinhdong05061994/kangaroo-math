<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <?php $this->load->view("ikmc/commons/header_tag");?>
      </head>
        <body>
    
        <section class="container">
            <?php $this->load->view("ikmc/commons/header_all");?>
             <script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.js"></script>
            <section class="content" id="content">
                <!------Grade------>
                <section style="background:#fff;" class="row">
                    <section class="container-3">
                        <div class="tag">                 
                              
                            
                           
                        </div>
                        <h1><i><?php echo $lang == "vi" ? "Chọn bài thi" : "Choose practice tests"?></i></h1>
                        <section class="grade" id="show_grade">
                            <?php
                             $userdata = $this->session->all_userdata(); 
                            if(isset($list_week) && count($list_week) > 0){
                                $n = count($list_week);

                            }else $n = 1;
                                for($i = 1; $i <= $n ; $i++)
                                {
                                   if(isset($list_week) && count($list_week) > 0){
                                        $week = $list_week[$i-1]['level'];
                                    }else $week = $i;
                                   if($userdata['status']<1 && $week>2){
                                    ?>
                                     <div class="grade col-sm-4" onclick="showUnregisteredMessage();">
                                    <a class="unregistered_link"><img src="img/kangaroo/sach_bw.jpg" class="img-responsive" />
                                    <h4 style="text-align: center;"><?php echo ($lang == "en" ? "The test " :"Bài thi ").$week;?></h4>
                                </div><!--End bkt-item-->
                               <?php 
                                   }else{
                            ?>

                                <div class="grade col-sm-4" onclick="choose_grade();">
                                    <a href="<?php echo base_url().'summer/doing/'.$week.'/'.$id_course;?>"><img src="img/kangaroo/sach.jpg" class="img-responsive" />
                                    <h4 style="text-align: center;"><?php echo ($lang == "en" ? "The test " :"Bài thi ").$week;?></h4>
                                </div><!--End bkt-item-->
                            <?php
                                }
                            }
                            ?>
                            
                        </section>
                        <section class="test" id="show_year" style="display: none">
                        </section>
                        
                        <section class="col-sm-12 clearfix" onclick="back_choose();" id="btn_back" style="display: none;" >
                            <img src="img/back.jpg">
                        </section>
                    </section>
                </section><!---End .Grade-->
                    
                <?php $this->load->view("ikmc/commons/organizers");?>
                <?php $this->load->view("ikmc/commons/footer_all");?>
                
            <?php $this->load->view("ikmc/register");?>   
         
            </section>
        </section>
             <?php $this->load->view("ikmc/register");?>       
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <div id="showmessage" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?=$lang == "en" ? "Notification" : "Thông báo";?></h4>
      </div>
      <div class="modal-body">
        <p><?=$lang == "en" ? 'This content is only for Full Member. Please upgrade your account to access':'Nội dùng này chỉ dành cho Full Member. Vui lòng nâng cấp tài khoản để truy cập';?></p>
      </div>
      <div class="modal-footer">
       <button type="button" style="padding: 5px;margin: 0px;margin-left: 135px;" class="btn btn-danger" data-toggle="modal" data-target="#demo" id="upgrade_account" data-dismiss="modal"><b><?=$lang == "en" ? "Upgrade account" : 'Nâng cấp tài khoản';?></b></button><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
           
       
    </body>
   
</html>

