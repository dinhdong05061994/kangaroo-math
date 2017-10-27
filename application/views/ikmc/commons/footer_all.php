
 <a href="#" name="bantochuc"></a>
<script type="text/javascript">
   $(document).ready(function(){
      $("#info-send").hide();
   });
</script>
 <div id="show-message-email" >
  <div id = "info-send" class="alert alert-info" style="font-size:16px; text-align:center;width: 100%; "> Đang gửi yêu cầu...</div>
 <?php echo ($this->session->flashdata("sendsuccess") ?  '<div class="alert alert-success" style=" font-size:16px; text-align:center;position: fixed;top: 10%;    width: 100%;"> <div id="close-alert" style="position: absolute; right: 0;  margin-top: -20px;  font-size: 10pt;">Close</div>'.$this->session->flashdata("sendsuccess")."</div>" : ($this->session->flashdata("errormail") ?  '<div class="alert alert-danger" style=" font-size:16px; text-align:center; position: fixed;top: 10%;    width: 100%;"> <div id="close-alert" style="position: absolute; right: 0; margin-top: -20px; font-size: 10pt;">Close</div>'.$this->session->flashdata("errormail")."</div>" : ""));?>
 </div>
                <section class="guiyeucau container-fluid">
                    <section class="container-1">
                        <section class="col-sm-6">
                            <h3><?php echo $lang == "vi" ? "GỬI YÊU CẦU VỀ BAN TỔ CHỨC" : "SEND YOUR REQUEST TO ORGANIZERS"?></h3>
                                 <form role="form">
                                <div class="form-group">
                                  
                                   <input id="fullname" type="text" class="form-control" placeholder="<?php echo $lang == "vi" ? "Họ và tên" : "Fullname"?>" >
                                   <p id = "er_fullname" style = "color: #eee;"></p>
                                </div>
                                
                                <div style="margin-left:-15px;" class="form-group col-sm-6">
                                   
                                   <input  id="email_require" type="email" class="form-control" placeholder="Email">
                                  <p id = "er_email_require" style = "color: #eee;"></p>
                                </div>
                                <div style="right:-30px;" class="form-group col-sm-6">
                                   
                                 <input id="phone_require" type="number" class="form-control" placeholder="<?php echo $lang == "vi" ? "Số điện thoại" : "Phone numbers"?>">
                                  <p id = "er_phone_require" style = "color: #eee;"></p>
                                </div>
                                 <div class="form-group">
                                 
                                  <textarea id="content_require" class="form-control" rows="5" placeholder="<?php echo $lang == "vi" ? "Nhập nội dung" : "Content"?>"></textarea>
                                  <p id = "er_content_require" style = "color: #eee;"></p>
                                </div>
                                <button id="button_send_require" type="button" class="btn btn-default">
                                    <?php echo $lang == "vi" ? "GỬI ĐI" : "SEND"?>
                                </button>
                                <button type="reset" id = "resetrequire" class="btn btn-default">
                                    <?php echo $lang == "vi" ? "SOẠN LẠI" : "RESET FORM"?>
                                </button>
                              </form>
                        </section>
                        <section class="col-sm-6">
                            <h3 class="tt-bantochuc"><?php echo $lang == "vi" ? "THÔNG TIN BAN TỔ CHỨC" : "ORGANIZERS IMFORMATION"?></h3>
                              <?php echo $lang == "vi" ? $arg['contact'] : '<span style="font-size:14px"><b> <i class="glyphicon glyphicon-map-marker"></i> Kangaroo Viet Nam</b></span><br />
                                <span class="phone">128 Nguyen Thai Hoc, Ba Đinh, Hanoi</span><br />
                                <span><i class="glyphicon glyphicon-phone"></i> ĐT: 0916 688208 - 04.7109.1099 <i class="glyphicon glyphicon-globe"></i><a href="http://www.kangaroo-math.vn"></a></span><p></p>';?>
                        </section>
                    </section>
                </section>
<div class="row" style="text-align: center;font-size: 13px; padding: 10px;background: #ccc;"><?= $lang == "en" ? '2016 IKMC VIETNAM, All Right Reserved' : 'Bản quyền thuộc về IKMC VIỆT NAM';?></div>
              
