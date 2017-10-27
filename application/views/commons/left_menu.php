
            	<div class="col-sm-3 left-sidebar">
                	<div style="border-left:4px solid #03C;" class="col-sm-12 sidebar-item" >
                        <h4 style="color:green;">Làm bài thi thử</h4>
                        <span style="color:blue;" <?php echo isset($practice['id']) ? 'hidden' : ''?>><a href = "<?php echo base_url();?>practice/login">Đăng nhập</a></span><br />
                        <span style="color:blue;"><a href = "<?php echo base_url();?>practice/signup">Đăng ký</a></span>
                        <!-- <span style="color:blue;">Đang hoàn thiện</span><br /> -->
                    </div><!--End sidebar-item-->
                    
                    <div style="border-left:4px solid green;" class="col-sm-12 sidebar-item" >
                        <h4 style="color:red;">Dành cho giáo viên</h4>

                        <span style="color:#F96;" hidden>Đăng nhập</span><br />
                        <span style="color:#F96;" hidden>Đăng ký tài khoản</span>
                        <span style="color:#F96;">Đang hoàn thiện</span><br />
                    </div><!--End sidebar-item-->
                    <div style="border-left:4px solid red;" class="col-sm-12 sidebar-item" >
                    	
                        <h4 style="color:#03C;">Thông tin liên hệ</h4>

                        <span style="color:green;"><?php echo  $arg['number_phone_contact'];?></span><br />

                        <span style="color:green;"><?php echo  $arg['email_contact'];?></span>
                    </div><!--End sidebar-item-->
                    <div style="border-left:4px solid #C3C;" class="col-sm-12 sidebar-item" >
                    	
                        <h4 style="color:#90C;">Trò chơi trí tuệ</h4>
                        <span style="color:#93C;" hidden>Đăng nhập</span><br />
                        <span style="color:#93C;" hidden>Đăng ký</span>
                        <span style="color:#93C;">Đang hoàn thiện</span>
                    </div><!--End sidebar-item-->
<div style="border:none; height:auto; overflow:hidden; margin-left:-15px;" class="col-sm-12 sidebar-item" >
<a href="https://www.facebook.com/iegtoancau">
                    	<img src="<?php echo base_url();?>img/kangaroo/images.png" class="img-responsive">
</a>
</div><!--End sidebar-item-->


<div style="border-left:4px solid #906;; color:#000;" class="col-sm-12 sidebar-item" >
                        <h4 style="color:red;">Thông tin chuyển khoản</h4>

                        <span><img src="<?php echo base_url();?>img/kangaroo/right.png"><b>STK:</b> 0021000352005</span><p>
                        <span><img src="<?php echo base_url();?>img/kangaroo/right.png"><b>Chủ tài khoản:</b><br /> Công ty Cổ phần IEG Toàn Cầu </b></span><br /><p>
                        <span><img src="<?php echo base_url();?>img/kangaroo/right.png"><b>Ngân hàng:</b><br /> Ngân hàng TMCP Ngoại thương Việt Nam (Vietcombank) - Chi nhánh Hà Nội</span><p>
                        <span><img src="<?php echo base_url();?>img/kangaroo/right.png"><b>Nội dung chuyển khoản:</b><br />IKMC 2016 –Trường –Quận/huyện – Tỉnh/thành –SĐT liên hệ - Tổng số học sinh đăng kí</span><br />
                    </div><!--End sidebar-item-->

                </div><!---End .Sidebar-left-->
                