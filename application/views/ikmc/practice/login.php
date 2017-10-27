<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->load->view("ikmc/commons/header_tag");?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>ikmc2017_assets/bootstrap-3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:800|Quicksand:700|Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>ikmc2017_assets/font-awesome-4.6.3/css/font-awesome.min.css"> 
</head>
<body>
    
    	<?php $this->load->view("ikmc/commons/header_all");?>
    	<section class="content" id="content">
		<section class="container clearfix tracuu">
			<div class="col-md-4 dangnhap-frame">
		            	<section style="text-align:center" class="col-md-12 title">
		                	<h6><?php echo $lang == "vi" ? ($this->uri->segment(1) == 'summer' ? "ĐĂNG NHẬP VÀO CÂU LẠC BỘ" :"ĐĂNG NHẬP THI THỬ") : "SIGN IN"?></h6>
		            	</section>
                 		<div class="row">			
				        <form role="form" action="" method="POST">
				        	<div style="margin-bottom: 0px;" class="form-group">
				                   	<label class="col-md-5"><?php echo $lang == "vi" ? "Tên đăng nhập" : "Account"?></label>
				                   	<input class="col-md-7" name="nickname" type="text" class="form-control" placeholder="<?php echo $lang == "vi" ? "Tài khoản" : "Account"?>" />
				                </div>
				                
				                <div class="form-group col-md-12" style="margin-top: 10px;">
				                	<label class="col-md-5"><?php echo $lang == "vi" ? "Mật khẩu" : "Password"?></label>
				                	<input class="col-md-7"  name="pass" type="password" class="form-control" placeholder="<?php echo $lang == "vi" ? "Mật khẩu" : "Password"?>" />
				                </div>
						<div class="form-group col-md-12" style="margin-top: 5px;text-align: center;">
				<!-- 			<label class="col-md-12" style="margin:0px; text-align:center; line-height: 15px;"><?php echo $lang == "vi" ? "(Nếu bạn không thể đăng nhập hãy sử dụng mật khẩu 12345678)" : "(If you cannot login, please try the password 12345678)"?></label> -->
						</div>
						<div class="form-group col-md-12" style="margin-top: 5px;text-align: left;">
            <div class="alert alert-danger">
  <strong>Thông báo!</strong> Nếu bạn không đăng nhập được với mật khẩu thông thường, hãy thử sử dụng mật khẩu 12345678.<br>
BTC xin chân thành xin lỗi về sự bất tiện này.<br>
</div>
						<!--  <label class="col-md-12" style="margin:0px; tẽt-align:center; line-height: 15px;"><?php echo $lang == "vi" ? "Do hệ thống bị quá tải nên ngày thi sẽ được rời sang ngày mai Chủ nhật 12.3 <br>
BTC xin chân thành xin lỗi về sự bất tiện này.<br>

" : ""?></label> -->
						</div>
				                    
				                <div class="form-group col-md-12" style="text-align:center;">
				                	<button type="submit" class="btn btn-default btn-xs clearfix">
				                    		<?php echo $lang == "vi" ? "ĐĂNG NHẬP" : "SIGN IN"?>
				                	</button>
				                 	<a href="user/signup" class="clearfix" id="signuplink"><?php echo $lang == "vi" ? "Đăng ký tài khoản" : "Sign up"?></a> 
				                </div>                                
				     	</form>
				</div> <!--end of row-->
				<div class="row">
					<div class="col-sm-12 col-xs-12">
						<ul class="introduction-menu">
							<li class="introduction-categories"><a class="menu-link" data-target="#overview" class="menu-link">KMOC là gì?</a></li>

							<li class="introduction-categories"><a class="menu-link" href="http://kangaroo-math.vn/summer/login/#meanings">Ý nghĩa của KMOC</a></li>

							<li class="introduction-categories"><a class="menu-link" href="http://kangaroo-math.vn/summer/login/#objects">Đối tượng tham gia</a></li>

							<li class="introduction-categories"><a class="menu-link" href="http://kangaroo-math.vn/summer/login/#interests">Những tiện ích nổi bật</a></li>

							<li class="introduction-categories"><a class="menu-link" href="http://kangaroo-math.vn/summer/login/#fees">Phí tham dự</a></li>

							<li class="introduction-categories"><a class="menu-link" href="http://kangaroo-math.vn/summer/login/#registration">Cách thức đăng ký KMOC</a></li>		
						</ul>
					</div>
				</div> <!-- end of row-->
			
			</div> <!--end of div .col-md-4-->
			<div class="col-md-8">
				<!--KMOC là gì-->	
				<div class="col-sm-12 col-xs-12 intro-content" id="overview">
					<p class="introduction-para">
						<h3 class="bold para-title">KMOC là gì?</h3>
						KMOC (Kangaroo Math Online Club – CLB Toán Kangaroo Online) là ứng dụng học toán TRỰC TUYẾN thuộc website chính thức của cuộc thi Toán quốc tế Kangaroo Math http://kangaroo-math.vn/ tại Việt Nam. Ứng dụng cung cấp một phương pháp học thân thiện, dễ tiếp cận cho tất cả các em học sinh từ lớp 1 tới lớp 8 cũng như các bậc phụ huynh và các thầy cô giáo nhằm ôn luyện cho kỳ thi IKMC nói riêng cũng như rèn luyện, nâng cao khả năng trong môn Toán tư duy nói chung. KMOC thường xuyên tổ chức các kỳ thi thử trực tuyến hàng tháng với cấu trúc đề thi và cách chấm điểm theo chuẩn kỳ thi IKMC chính thức.<br><br>
Chúng tôi đã hợp tác với các chuyên gia, các nhà giáo hàng đầu về Toán học cả trong và ngoài nước để xây dựng hệ thống bài giảng, bài tập chất lượng nhất; không chỉ tạo động lực giúp các em học sinh nâng cao tinh thần và khả năng học tập, mà còn kích thích sự phát triển tư duy toàn diện.<br><br>
Giao diện KMOC thân thiện, có khả năng ghi lại quá trình học tập, tiến bộ qua từng giai đoạn của học sinh, giúp các em không chỉ chuẩn bị tốt cho kỳ thi IKMC chính thức tổ chức vào tháng 3 hàng năm mà còn góp phần định ra lộ trình học tập và rèn luyện phù hợp để phát triển khả năng Toán tư duy.
					</p>
				</div>
				<!--end of KMOC là gì-->
				<!--Ý nghĩa của KMOC-->
				<div class="col-sm-12 col-xs-12 intro-content" id="meanings"  >
					<p class="introduction-para">
						<h3 class="bold para-title first-title">Ý nghĩa của KMOC</h3>
						<i class="fa fa-check" aria-hidden="true"></i>
  						Kích thích tư duy, ươm mầm tài năng và đam mê Toán học của học sinh.<br>
						<i class="fa fa-check" aria-hidden="true"></i>
						Tạo điều kiện để học sinh có thể luyện tập Toán mọi lúc, mọi nơi theo hình thức mới mẻ, hấp dẫn.<br>
						<i class="fa fa-check" aria-hidden="true"></i>
						Ôn luyện cho kỳ thi IKMC chính thức, Mở ra cơ hội tiếp cận với phương pháp học và thi tiên tiến được áp dụng tại các kỳ thi Toán quốc tế.<br>
						<i class="fa fa-check" aria-hidden="true"></i>
						Tích lũy, chuẩn bị hành trang cho các em học sinh hội nhập môi trường học tập quốc tế.<br>
					</p>
				</div>
				<!--end of Ý nghĩa của KMOC-->
				<!--Đối tượng tham gia-->
				<div class="col-sm-12 col-xs-12 intro-content" id="objects" >			
					<p class="introduction-para">
						<h3 class="bold para-title">Đối tượng tham gia</h3>
						Tất cả các học sinh yêu thích Toán trên cả nước đang theo học lớp 1 – lớp 8.
					</p>
				</div>
				<!--end of Đối tượng tham gia-->

				<!--Những tiện ích nổi bật của KMOC-->
				<div class="col-sm-12 col-xs-12 intro-content" id="interests" >
					<p class="introduction-para">
						<h3 class="bold para-title">Những tiện ích nổi bật của KMOC</h3>
						<i class="fa fa-circle"></i><span class="bold"> Bài thi tháng và năm:</span> Rèn luyện cùng bài thi thử TRỰC TUYẾN - với cấu trúc đề và cách chấm điểm mô phòng kỳ thi IKMC quốc tế được tổ chức mỗi tháng một lần. Học sinh có thể xem điểm bài thi của mình và bảng xếp hạng các thành viên cùng cấp độ ngay sau khi làm bài.<br>
						<i class="fa fa-circle"></i><span class="bold"> Bài thi các năm:</span> Thử sức với đề thi chính thức IKMC các năm trước.<br>
						<i class="fa fa-circle"></i><span class="bold"> Bài giảng:</span> Học tập với bài học theo tuần và theo chủ để, kiểm tra bằng bài trắc nghiệm.<br>
						<i class="fa fa-circle"></i><span class="bold"> Thử thách hàng tuần và Bài thi tự chọn:</span> Làm bài luyện tập thường xuyên từ ngân hàng câu hỏi phong phú.<br>
						<i class="fa fa-circle"></i><span class="bold"> Biểu đồ điểm 7 ngày gần nhất và Bảng xếp hạng theo cấp độ:</span> Theo dõi điểm rèn luyện trong 7 ngày gần nhất cũng như bảng xếp hạng các thành viên có điểm rèn luyện cao nhất của mỗi cấp độ.<br>
					</p>
				</div>
				<!--end of Những tiện ích nổi bật của KMOC-->

				<!--Phí tham dự KMOC-->
				<div class="col-sm-12 col-xs-12 intro-content" id="interests" >
					<p class="introduction-para">
						<h3 class="bold para-title">Thành viên KMOC</h3>
						Để có thể sử dụng các tiện ích của KMOC, các em học sinh cần đăng ký tài khoản KMOC (miễn phí).<br>
						KMOC có 02 loại thành viên.<br>
						- Trial Member: Là các thành viên đã đăng ký tài khoản KMOC, được truy cập và sử dụng một số tiện ích của Thư viện KMOC cũng như tham gia thi thử miễn phí.<br>
						- Thành viên Full Member: Là các thành viên có quyền truy cập tất cả các bài giảng và bài luyện tập cùng nhiều tiện ích phong phú của Thư viện KMOC. (Phí nâng cấp: 500.000 VND/năm)<br>
					</p>
				</div>
				<!--end of Phí tham dự KMOC-->

				<!--Cách thức đăng ký-->
				<div class="col-sm-12 col-xs-12 intro-content" id="registration" >
					<p class="introduction-para">
						<h3 class="bold para-title first-title">Cách thức đăng ký</h3>
						<i class="fa fa-circle"></i><span class="bold"> Cách 1:</span> Đăng ký online miễn phí tại: http://kangaroo-math.vn/user/signup.<br>
						<i class="fa fa-circle"></i><span class="italic"> Chủ tài khoản:</span> Nguyễn Chí Trung<br>
						<i class="fa fa-circle"></i><span class="italic"> Số tài khoản:</span> 00021000679101<br>
						<i class="fa fa-circle"></i><span class="italic"> Ngân hàng:</span> Ngân hàng TMCP Ngoại thương Việt Nam (Vietcombank)- Hà Nội<br>
Hoặc<br>
						<i class="fa fa-circle"></i><span class="italic"> Chủ tài khoản:</span> Nguyễn Chí Trung<br>
						<i class="fa fa-circle"></i><span class="italic"> Số tài khoản:</span> 12510000760738<br>
						<i class="fa fa-circle"></i><span class="italic"> Ngân hàng:</span> Ngân hàng TMCP Đầu tư và phát triển Việt Nam (BIDV) - Chi nhánh Đông Đô, Hà Nội<br>
Nội dung chuyển khoản ghi rõ: <br>
						Kangaroo Online Club – Tên học sinh – Lớp – Trường –Quận/huyện – Tỉnh/thành - SĐT liên hệ <br>
						Ghi chú: Học viện IEG sẽ gửi xác nhận bằng tin nhắn theo SĐT liên hệ.<br>
						<i class="fa fa-circle"></i><span class="bold"> Cách 2:</span> Đăng ký và nộp học phí trực tiếp:<br>
						Học viện Phát triển tư duy và Kỹ năng IEG, 128 Nguyễn Thái Học, Ba Đình, Hà Nội<br>
						SĐT: 0916688208 – (04) 71091099 – (04) 62901146<br>
						(Lưu ý: Thời hạn thành viên được tính từ ngày hoàn thiện thanh toán và kích hoạt tài khoản).<br>
					</p>
				</div>
				<!--end of Cách thức đăng ký-->
		

			</div> <!--end of div .col-md-8-->                            
             	</div>
               	</section>                    
      </section>
      <?php $this->load->view("ikmc/commons/footer_all");?>             
      <?php $this->load->view("ikmc/register");?>
           
       
</body>
   
</html>
