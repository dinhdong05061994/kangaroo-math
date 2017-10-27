<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <script src='https://www.google.com/recaptcha/api.js?hl=<?php echo $lang?>'></script>
        <?php $this->load->view("ikmc/commons/header_tag");?>
      </head>
 <style type="text/css">
.parent::-webkit-scrollbar-thumb {
   -webkit-border-radius: 10px;
    border-radius: 10px;
    background: #fff!important;
  }
  b{
      color: #F9BCD9;
      
  }
 </style>
        <body>
    
        <section class="container">
            <?php $this->load->view("ikmc/commons/header_all");?>
            <section class="content" id="content">
                
                <section class="clearfix tracuuphongthi">
                   	
                        <section class="pull-right tracuudiem tracuuphongthi-content" style=" margin-bottom: 0!important;">
                            <section class="col-sm-12 title">
                                <img style="margin-bottom:15px; margin-left:170px;" src="img/kangaroo/<?php echo $lang;?>_tracuudiemthi1.png" />
                            </section>
                            <section class="clearfix tracuuphongthi-main">
                            	<form role="form" method="POST" id = "searchf" action = "<?php echo base_url();?>ikmc/search_result_ikmc">
                                    <div style="margin-left:0px;" class="form-group">
                                       <label class="col-sm-4"><?php echo $lang == "vi" ? "Họ và tên" : "Fullname"?></label>
                                       <input class="col-sm-8" type="text" class="form-control" name = "fullname" id = "fullname" placeholder="<?php echo $lang == "vi" ? "Họ và tên" : "Fullname"?>" value = "<?php echo isset($input) ? $input['name']: ''; ?>">
                                    </div>
                                    
                                    <div class="form-group clearfix ngaysinh col-sm-12">
                                      <div style="margin-left:0px;">
                                       <label class="col-sm-3"><?php echo $lang == "vi" ? "Ngày sinh" : "Birthday"?></label>
                                       <input class="col-sm-2"  type="text" class="form-control" id = "dateofbirth" name = "dateofbirth" placeholder="<?php echo $lang == "vi" ? "Ngày" : "Date"?>" value = "<?php echo isset($input) ? $input['date'] : ''; ?>"/>
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
                                    <div style="margin-bottom:0!important; " class="btn btn-default clearfix" id = "search_info_submit" name = "submit" onclick = "searchinforcontestants();">
                                        <?php echo $lang == "vi" ? "TRA CỨU" : "SEARCH"?>
                                    </div>
                                    
                                    </div>
                                    <div style = "width:1000px; margin: 0 auto;clear: both;">
                                      <div id = "errornull" hidden style = "margin-bottom: 0px;"></div>
                                    </div>
                                    <!-- <div class="form-group col-sm-12" style="text-align:center; border:  3px double red; width: 350px;margin-left: 140px;">
                                        <a href="<?php base_url();?>uploadfile/thong-tin-thi-sinh/IKMC2016_SBD_Upweb_Ver2_160316.xlsx" style= "font-size:14pt; font-weight: bold; text-decoration: none;">Tải danh sách thí sinh IKMC 2016</a>
                                     </div> -->
                                     <!-- <div class="form-group col-sm-12" style="font-weight: bolder; font-size: 12pt; text-align:center; width: 450px;margin-left: 90px;">
                                        Thí sinh tập trung tại điểm thi vào 7h30 sáng ngày 20/03/2016
                                     </div> -->
                                </form> 
                            </section>
                            
                        </section>
						</section><!--End tracuuphongthi-->

           <div style="background: #eecac5;width:100%;padding: 30px;">
            <div style="height:400px;width: 70%; overflow:auto; overflow-x:hidden; margin: 0 auto; margin-bottom: 30px; border-radius: 5px;" class="parent">

             <div style="top:0px;" class="scrollbar"></div>
                  <section class="scrollable">
                      <div  style="text-align:justify; padding-left:35px; padding-right:35px; font-size: 12pt!important;  background: #854c83; color: #fff; " class="row">
                          
                        <div style="margin:30px;"><b>TIẾP NỐI BƯỚC NHẢY DÀI TRÊN CON ĐƯỜNG TOÁN HỌC - THE KANGRAROO MATH ONLINE CLUB </b><br/>
                      <div style="padding-left:30px;">
                      - Tạo ra một sân chơi trí tuệ nhằm kích thích, ươm mầm tài năng và đam mê Toán học của các em học sinh <br/>
                      - Giúp các em có cơ hội luyện tập Toán mọi lúc, mọi nơi;<br/>
                      - Tạo thêm sân chơi, có thêm nhiều cơ hội luyện tập Toán và tiếp cận với phương pháp học tiên tiến như được áp dụng tại các kỳ thi Toán quốc tế;<br/>
                      - Tích lũy, chuẩn bị hành trang cho các em học sinh hội nhập môi trường học tập quốc tế.<br/>
                      </div>
                      Đặc biệt, đến với THE KANGAROO MATH ONLINE CLUB các em học sinh sẽ được:<br/>
                      <div style="padding-left:30px;">
                      - Làm bài thi thử - hướng tới kì thi Kangaroo: 4-6 tuần môt lần, có xếp hạng, nhận xét từng chủ đề và gợi ý các chuyên đề học sinh còn yếu.<br/>
                      - Làm bài luyện tập từ ngân hàng câu hỏi;<br/>
                      - Bài học theo tuần, kiểm tra bằng bài trắc nghiệm;<br/>
                      - Diễn đàn để thảo luận các câu hỏi.<br/>
                     </div>
                      Đây hứa hẹn sẽ là một cơ hội tốt cho tất cả các em học sinh trải nghiệm thêm các dạng bài Toán hay theo chuẩn quốc tế. Là giai đoạn ôn tập giúp các em có bệ phóng vững chắc, tự tin hơn khi tham dự các kỳ thi Toán quốc tế được tổ chức trong các năm học tới.<br/>
                      Thông tin về nội quy thành viên THE KANGAROO MATH ONLINE CLUB:<br/>
                      1.  Đối tượng tham gia: Mọi học sinh yêu thích Toán trên cả nước.<br/>
                      2.  Học phí: 500.000vnđ/12 tháng (Thời gian được tính từ ngày hoàn thiện thanh toán và kích hoạt tài khoản<br/>
                      <b>Học phí chỉ còn 300.000vnđ/ 12 tháng khi hoàn thành việc thanh toán trước ngày 1/6/2016</b><br/>
                      3.  Đăng ký tham gia<br/>
                      
                      Đăng ký online tại: <a href="http://bit.ly/thekangaroomathonlineclub" style=" color: #F7F212; font-style: italic;">http://bit.ly/thekangaroomathonlineclub</a><br/>
                      Học phí thanh toán bằng tiền mặt hoặc chuyển khoản đến:<br/>
                      <i>Chủ tài khoản:</i> Nguyễn Chí Trung<br/>
                      <i>Số tài khoản:</i> 00021000679101<br/>
                      <i>Ngân hàng:</i> Ngân hàng TMCP Ngoại thương Việt Nam (Vietcombank)- Hà Nội<br/>
                      Hoặc:<br/>
                     <i>Chủ tài khoản:</i> Nguyễn Chí Trung<br/>
                     <i>Số tài khoản:</i> 12510000760738<br/>
                     <i> Ngân hàng:</i> Ngân hàng TMCP Đầu tư và phát triển Việt Nam (BIDV) - Chi nhánh Đông Đô, Hà Nội<br/>
                      <b>Nội dung chuyển khoản ghi rõ:</b> <br/>
                      Kangaroo Online Club – Tên học sinh – Lớp – Trường –Quận/huyện – Tỉnh/thành - SĐT liên hệ <br/>
                      <u><b>Ghi chú:</b></u> Học viện IEG sẽ gửi xác nhận bằng tin nhắn theo SĐT liên hệ.<br/>
                      <b>Đăng ký trực tiếp tại:</b> <br/>
                      Học viện Phát triển tư duy và Kỹ năng IEG, 128 Nguyễn Thái Học, Ba Đình, Hà Nội<br/>
                      SĐT: 0916688208 – (04) 71091099 – (04) 62901146<br/>
                      <i>Mọi thông tin về quy định, thể lệ sẽ được Ban tổ chức công bố trước ngày 1/6/2016.</i><br/>
                  </div>
                          
                      </div>
                  </section>
               </div>           
             </div> 
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                   
                   
                  <div style = "width:1000px; margin: 0 auto;">
                    <div id = "showresult" hidden style = "margin-bottom: 30px;"></div>
                  </div>
                 <?php $this->load->view("ikmc/commons/organizers");?>
                <?php $this->load->view("ikmc/commons/footer_all");?>
            </section>
        </section>
                   
            <?php $this->load->view("ikmc/register");?>
           
       
    </body>
   
</html>
