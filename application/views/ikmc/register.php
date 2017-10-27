
                            <div class="modal fade" id="demo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" id="btn_close_register" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h3 class="modal-title text-center"><?php echo $lang == "vi" ? "HƯỚNG DẪN NÂNG CẤP TÀI KHOẢN" : "SELECT A SUITABLE REGISTRATION"?></h3>
                                        </div>
                                        <div class="modal-body" style="height: 600px">
                                            <div class="row">
                                            <div class="modal-title">
                                            	<div style="background:url(img/dangky-hover1.png) no-repeat;
			background-size:100% 100%; cursor: pointer;" id="dangkiduthi" class="col-sm-4">
                                                	<h4><?php echo $lang == "vi" ? "CHUYỂN KHOẢN" : "REGISTER ONLINE"?></h4>
                                                </div>
                                               <!--  <div style="background:url(img/dangkyhover2.png) no-repeat;
			background-size:100% 100%;" id="dkonline" class="col-sm-4">
                                                	<h5><?php echo $lang == "vi" ? "ĐĂNG KÝ QUA TRƯỜNG" : "REGISTER WITH SCHOOL"?></h5>
                                                </div> -->
                                                <div style="background:url(img/dangkyhover2.png) no-repeat;
			background-size:100% 100%; cursor: pointer;" id="dkquatruong" class="col-sm-4">
                                                	<h4><?php echo $lang == "vi" ? "NỘP TIỀN MẶT" : "REGISTER IEG"?></h4>
                                                </div>
                                                        </div>                
                                                        
                                                       
                                                                                                                            
                                            </div>
                                            <div class="row form dkduthi" style="height: 600px">
                                            <div class="dkduthi-content col-sm-12" style="height: 600px">
                                                    <h4><?php echo $lang == "vi" ? "CHUYỂN KHOẢN" : "REGISTER ONLINE" ?></h4>
                                                    
                                                    <div class="dkduthi-main" style="font-size:16px; height: 600px">        
                                                      <p>  Phụ huynh Chuyển khoản vào TK sau:<br>     

1, CTK: Nguyễn Chí Trung<br>
 
    Số TK: 0021000679101<br>
 
    Ngân hàng TMCP Ngoại thương Việt Nam (Vietcombank)- Hà Nội<br>
    
    Nội dung chuyển khoản ghi rõ: KMOC – Tên học sinh – Tên &#273;&#259;ng nh&#7853;p – Ngày /tháng/ năm sinh  <br>

    Số tiền: 500.000VNĐ<br>
 
Hoặc<br>
 
2, CTK: Nguyễn Chí Trung<br>
 
    STK: 12510000760738<br>
 
    Ngân hàng TMCP Đầu tư và phát triển Việt Nam (BIDV) - Chi nhánh Đông Đô, Hà Nội<br>
 
    Nội dung chuyển khoản ghi rõ: KMOC – Tên học sinh – Ten dang nhap Ngày /tháng/ năm sinh <br>

    Số tiền: 500.000VNĐ<br>


Bước 4: Xác nhận thanh toán thành công<br>

Trong vòng 5 ngày, kể từ khi giao dịch được thanh toán thành công, Quý Phụ huynh sẽ nhận được email phản hồi từ ban quản trị, tài khoản sẽ được nâng cấp lên từ Trial Member thành Full Member</p>
                                                      </div>
                                                      </div>
                              

                               <!--                <form role = "registerform">
                                                <div class="col-sm-6">
                                                    
                                                        <div class="form-group">
                                                           <label for="text" ><?php echo $lang == "vi" ? "Họ và tên phụ huynh" : "Parent name"?></label>
                                                           <input type="text"  id="parent_name" class="form-control" tabindex="1">
                                                           <p style = "color:red" id="er_parentname"></p>
                                                        </div>
                                                        <div class="form-group">
                                                           <label for="text"><?php echo $lang == "vi" ? "Địa chỉ nhà riêng" : "Address"?></label>
                                                           <input type="text" id="address" class="form-control" tabindex="3">
                                                           <p style = "color:red" id="er_address"></p>
                                                        </div>
                                                        <div class="form-group">
                                                           <label for="text"><?php echo $lang == "vi" ? "Số điện thoại" : "Phone"?></label>
                                                           <input type="text" id="phone_register" class="form-control" tabindex="5">
                                                           <p style = "color:red" id="er_phone"></p>
                                                        </div>
                                                        <button style="margin-left:157px;" type="button" id="btn_register_online" class="btn btn-default">
                                                            <?php echo $lang == "vi" ? "Đăng ký" : "Submit"?>
                                                        </button>
                                                   
                                                </div>
                                                <div class="col-sm-6">
                                                
                                                    <div class="form-group">
                                                           <label for="text"><?php echo $lang == "vi" ? "Họ và tên thí sinh" : "Full name"?></label>
                                                           <input type="text" id="student_name" class="form-control" tabindex="2">
                                                           <p style = "color:red" id="er_student_name"></p>
                                                        </div>
                                                    <div class="form-group">
                                                           <label for="text"><?php echo $lang == "vi" ? "Đang học tại (Trường và lớp)" : "Studying at (School and class)"?></label>
                                                           <input type="text" id="school_name" class="form-control" tabindex="4">
                                                           <p style = "color:red" id="er_school_name"></p>
                                                        </div>
                                                     <div class="form-group">
                                                           <label for="email">Email</label>
                                                           <input type="email" id="email_register" class="form-control" tabindex="6">
                                                           <p style = "color:red" id="er_email"></p>
                                                        </div>
                                                    <button style="margin-left:-10px;" type="reset" class="btn btn-default">
                                                        <?php echo $lang == "vi" ? "Soạn lại" : "Reset form"?>
                                                    </button>

                                                </div>
                                                </form> -->
                                            </div><!---End modal dang ky-->
                                       <!--     <div hidden="" class="row form dkonline">
                                                <div class="dkonline-content col-sm-12">
                                                    <h4><?php echo $lang == "vi" ? "ĐĂNG KÝ QUA TRƯỜNG" : "REGISTER WITH SCHOOL"?></h4>
                                                    <div class="dkonline-main">
                                                            <?php echo $arg[$lang.'_register_school'];?>
                                                    </div>
                                                </div>
                                                
                                            </div> --><!---End modal dang ky online-->
                                            
                                            <div hidden="" class="row form dkquatruong"  style="height: 300px">
                                                <div class="dkquatruong-content col-sm-12"  style="height: 300px">
                                                    <h4><?php echo $lang == "vi" ? "NỘP TIỀN MẶT" : "REGISTER IEG"?></h4>
                                                    
                                                    <div class="dkquatruong-main" style="height:300px">
                                                         <p style="font-size:16px"> Phụ huynh cũng có thể đăng kí trực tiếp tại địa chỉ:<br>

♦ Học viện Phát triển Tư duy và Kỹ năng IEG <br>

♦ 128 Nguyễn Thái Học, Phường Điện Biên, Quận Ba Đình, Tp. Hà Nội <br>

♦ Số điện thoại: 0916688208 – (04) 71091099 – (04) 62901146 <br>

♦ Email: kangaroomath@ieg.vn</p>
                                                      </div>
                                      
                                                </div>
                                                
                                            </div><!---End modal dang ky online-->
                                        </div>
                                    </div>                                    
                                </div>
                            </div><!---End .Modal-->