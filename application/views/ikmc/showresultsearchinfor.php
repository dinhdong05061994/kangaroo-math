<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <script src='https://www.google.com/recaptcha/api.js?hl=<?php echo $lang?>'></script>
        <?php $this->load->view("ikmc/commons/header_tag");?>
        <script type="text/javascript">
          // window.onload = function(){
          //   scrollTo(0,150);
            
          // } 

        </script>
      </head>
 
        <body>
    
        <section class="container">
            <?php $this->load->view("ikmc/commons/header_all");?>
            <section class="content" id="content">
                
                <section class="clearfix tracuuphongthi">
                    
                        <section class="pull-right tracuudiem tracuuphongthi-content">
                            <section class="col-sm-12 title">
                                <img style="margin-bottom:15px; margin-left:170px;" src="img/kangaroo/<?php echo $lang;?>_tracuudiemthi1.png" />
                            </section>
                            <section class="clearfix tracuuphongthi-main">
                              <form role="form" method="POST" id = "searchf" action = "<?php echo base_url();?>ikmc/search_result_ikmc">
                                    <div style="margin-left:0px;" class="form-group">
                                       <label class="col-sm-4"><?php echo $lang == "vi" ? "Họ và tên" : "Fullname"?></label>
                                       <input class="col-sm-8" type="text" class="form-control" id = "fullname" name = "fullname" placeholder="<?php echo $lang == "vi" ? "Họ và tên" : "Fullname"?>" value = "<?php echo isset($input) ? $input['name']: ''; ?>">
                                    </div>
                                    
                                    <div class="form-group clearfix ngaysinh col-sm-12">
                                      <div style="margin-left:0px;">
                                       <label class="col-sm-3"><?php echo $lang == "vi" ? "Ngày sinh" : "Birthday"?></label>
                                       <input class="col-sm-2"  type="text" class="form-control" id = "dateofbirth"  name = "dateofbirth" placeholder="<?php echo $lang == "vi" ? "Ngày" : "Date"?>" value = "<?php echo isset($input) ? $input['date'] : ''; ?>"/>
                                       <input class="col-sm-2"  type="text" class="form-control" id = "monthofbirth" name = "monthofbirth" placeholder="<?php echo $lang == "vi" ? "Tháng" : "Month"?>" value = "<?php echo isset($input) ? $input['month'] :'';?>"/>
                                       <input class="col-sm-3"  type="text" class="form-control" id = "yearofbirth" name = "yearofbirth" placeholder="<?php echo $lang == "vi" ? "Năm" : "Year"?>" value = "<?php echo isset($input) ? $input['year'] :''; ?>"/>
                                        </div>
                                    </div>
                                      <div style="margin-left:147px;" class="col-sm-12">
                                          <h5><?php echo $lang == "vi" ? "Vui lòng tích vào ô bên dưới" : "Please, tick on the checkbox."?></h5>
                                           <div style = "padding-left:14px;" class="g-recaptcha" data-sitekey="6Ldv2hoTAAAAAAOp1bU5rUo0VvG_dQH3sWbgI-yg"></div>
                                           <!--  <textarea style="width:70%; background:#999;"></textarea> -->
                                        </div>
                                      
                                    <div class="form-group col-sm-12" style="text-align:center;">
                                    <div class="btn btn-default clearfix" id = "search_info_submit" name = "submit" onclick = "searchinforcontestants();">
                                        <?php echo $lang == "vi" ? "TRA CỨU" : "SEARCH"?>
                                    </div>
                                   
                                    </div>
                                    <div style = "width:1000px; margin: 0 auto;clear: both;">
                                      <div id = "errornull" hidden style = "margin-bottom: 30px;"></div>
                                    </div>
                                </form> 
                            </section>
                            
                        </section>

                   </section>
                  <section  style="width:700px; margin:0px auto;" class="clearfix">
                        <section hidden="" style="width:700px;  margin:0 auto;" class="pull-right ketquatracuu tracuuphongthi-content clearfix">
                            <section class="col-sm-12 title">
                                
                            </section>
                            <section class="clearfix tracuuphongthi-main">
                              <table class="table">
                                    <thead>
                                       <tr><img style="margin-bottom:15px; margin-left:270px;" src="img/kangaroo/<?php echo $lang;?>_ketquathi1.png" /></tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if(isset($info) && count($info) > 0){
                                          foreach ($info as $value){
                                          ?>
                                        <tr>
                                            <td class="styl"><?php echo $lang == "vi" ? "Họ Tên: " : "Fullname: "?></td>
                                            <td><?php echo strtoupper($value['name']);?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="styl"><?php echo $lang == "vi" ? "Ngày sinh: " : "Birthday: "?></td>
                                            <td><?php echo $value['birthday']?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="styl"><?php echo $lang == "vi" ? "Trường: " : "School: "?></td>
                                            <td><?php echo $value['schoolname']?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="styl"><?php echo $lang == "vi" ? "Lớp: " : "Class: "?></td>
                                            <td><?php echo $value['class']?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="styl"><?php echo $lang == "vi" ? "Điểm: " : "Marks: "?> </td>
                                            <td><?php echo $value['totalscore']?>/<?php echo $value['level'] == 1 ? '90' : ($value['level'] == 2 ? '120' : '150');?></td>
                                            
                                        </tr>
                                         <tr>
                                            <td class="styl"><?php echo $lang == "vi" ? "Percentile: " : "Percentile: "?> </td>
                                            <td><?php echo 100 * $value['pgrade']?> (<?php echo $lang == "vi" ? 'theo khối lớp' :'by grade'?>)</td>
                                            <td><?php echo 100 *$value['plevel']?> (<?php echo $lang == "vi" ? 'theo cấp độ ':'by level'?>)</td>
                                            
                                        </tr>
                                        
                                        <tr>

                                                  <td colspan="3" style="text-align: left; padding-left: 100px; font-size: 11pt;">Percentile là dữ liệu thống kê thể hiện thành tích của thí sinh so với những thí sinh khác cùng dự thi. Percentile khối lớp là <b><?php echo $value['pgrade'] * 100;?></b> có nghĩa thành tích của bạn cao hơn <b><?php echo $value['pgrade']*100;?>%</b> thí sinh cùng khối lớp <?php echo $value['grade']?> với bạn. Percentile cấp độ là <b><?php echo $value['plevel']*100; ?></b> có nghĩa thành tích của bạn cao hơn <b><?php echo $value['plevel']*100; ?>%</b> thí sinh dự thi cùng cấp độ <?php echo $value['level']?> với bạn.
                                                  </td>
                                                
    

                                            </tr>

                                       <tr>

                                                  <td colspan="3" style="text-align: left; padding-left: 100px; font-size: 14pt; color :#854c83; font-weight: bold;">
                                                  <?php echo ($value['award'] != '')? ' Chúc mừng bạn đã hoàn xuất sắc hoàn thành và chính thức đạt giải kỳ thi International Kangaroo Math Contest - IKMC 2016! Bạn được mời tham dự Lễ Trao Giải IKMC 2016 dự kiến sẽ được tổ chức ngày 15 tháng 5 năm 2016 tại Hà Nội. ':'Chúc mừng bạn đã hoàn thành kỳ thi International Kangaroo Math Contest - IKMC 2016. Hẹn gặp lại bạn trong kỳ thi IKMC 2017!';?>
                                                  </td>
                                                
    

                                            </tr>
                                           
                                        <!-- <tr>
                                            <td class="styl"><?php //echo $lang == "vi" ? "Giải Thưởng " : "Prize "?></td>
                                            <td>Hiện tại chưa xếp hạng</td>
                                            
                                        </tr> -->
                                        <!-- <tr>
                                            <td class="styl"><?php //echo $lang == "vi" ? "Bài Thi " : "Test"?></td>
                                            <td>
                                              <?php 
                                              $result = "";
                                              $number = $value['level'] == 1 ? 18 : ($value['level'] == 2 ? 24 : 30);
                                                for($i = 1; $i <= $number; $i++){
                                                  
                                                    $result .= $i."-".$value['ans'.$i]."; ";
                                                }
                                                //echo $result;
                                              ?>

                                            </td>
                                            
                                        </tr> -->
                                        <?php
                                            }?>
                                            
                                          <?php
                                          }else {?>
                                              <br/><span style = "font-size:11pt;margin-left:250px;"><?php echo $lang == "vi" ? "Không tìm thấy thông tin thí sinh! Vui lòng kiểm tra lại thông tin đã nhập." : "Contestant information not found! Please check the entered information."?></span>
                                          <?php
                                          }
                                          ?>
                                        <tr>
                                           
                                            <td id="back_search">
                                              <img width="50px" height="50px" src="img/kangaroo/back_3.png" />
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </section>
                            
                        </section>
                        
                        <script>
                          $(document).ready(function(e) {
         //                        $('#search_info_submit').click(function(e) {
         //                            $('.tracuudiem').slideUp(1000);
                                    // $('.ketquatracuu').slideDown(1000);
                           //                        });
                                  $('.tracuudiem').slideUp(1000);
                                  $('.ketquatracuu').slideDown(1000);
                                  $('#back_search').click(function(e) {
                                    $('.tracuudiem').slideDown(1000);
                                    $('.ketquatracuu').slideUp(1000);
                                });
                            });
                        </script>
                        </section>
                 <?php $this->load->view("ikmc/commons/organizers");?>
                <?php $this->load->view("ikmc/commons/footer_all");?>
            </section>
        </section>
                   
            <?php $this->load->view("ikmc/register");?>
           
       
    </body>
   
</html>
