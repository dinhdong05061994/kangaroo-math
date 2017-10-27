
<!DOCTYPE html>
<html>
<head>
	<title>International Kangaroo Math Competition </title>
		 <meta charset="UTF-8">
  <meta name="description" content="Kì thi IKMC 2017">
  <meta name="keywords" content="IKMC 2017, kangaroomath, Kangaroo, Math, Toán, Toan, Toán quốc tế, Kì thi Toán, Kì thi Toán quốc tế 2017, Kì thi Toán quốc tế Kangaroo Math">
  <meta name="author" content="Nguyễn Duy Nam">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:800|Quicksand:700|Roboto" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>ikmc2017_assets/bootstrap-3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>ikmc2017_assets/font-awesome-4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>ikmc2017_assets/css/home.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>ikmc2017_assets/css/introduction.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>ikmc2017_assets/css/gallery.css">
</head>
<body>
<div id="fb-root"></div>
<!-- <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> -->
	<header>
<?php $this->load->view('ikmc2017/partial/menu') ?>
</header>

	<div class="container-fluid" id="smallslider">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
 

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    

    <div class="item active">
      <img src="<?php echo base_url(); ?>ikmc2017_assets/image/slideimage/smallbanner_nowhiteborder.png" alt="IKMC2017">
    </div>
  </div>

  <!-- Left and right controls -->

</div>
</div>

<div class="container-fluid mainpage">


<section class="information">
<h2 class="page-title">Tra cứu SBD Thí sinh</h2>
	<div class="container-fluid">
		<div class="clearfix"></div>
	<section class="form-container">
		<div class="container">
	
	
	
		<div class="col-sm-12 contactus-part">
		  <form action="<?php echo base_url(); ?>student/search/result" method="post" class="form-inline searchform col-sm-offset-2">
    <div class="form-group">
      <!-- <label for="fullname">Họ và tên</label> -->
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Họ và tên">
      <p class="help-block" style="color: #f44242;">Nhập đầy đủ họ tên bằng Tiếng Việt có dấu</p>
    </div>
    <div class="form-group">
<!--       <label for="birthday">Ngày sinh</label> -->
      <input type="text" class="form-control" id="birthday" name="birthday" placeholder="Ngày sinh">
      <p></p>
    </div>
<div class="form-group">
    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
    <p></p>
    </div>
  </form>
		</div>

	


		
		
		</div>
	</section>
	</div>
</section>

	<?php $this->load->view('ikmc2017/listcountries'); ?>

</div>
	<footer>
	<div class="container">
		<div class="col-sm-4 footer-part organizer-information">
			<p><span class="hostname">Ban tổ chức IKMC Việt Nam</span><p>
			<p><span class="companyname">Trung tâm Phát triển Tư duy và Kỹ năng IEG</span></p>
			<p class="address"><span class="bold">Địa chỉ:</span> 128 Nguyễn Thái Học, Ba Đình, Hà Nội</p>
			<p class="address"><span class="bold">Điện thoại:</span> (04) 7109 1099 / 0916 688 208 - 098 104 8228</p>
			<p class="address"><span class="bold">Email:</span> kangaroomath@ieg.vn</p>
			<p class="address"><span class="bold">Website:</span> <a href="http://kangaroo-math.vn">http://kangaroo-math.vn</a></p>
			<p class="address"><span class="bold">Fanpage:</span> <a href="https://www.facebook.com/IKMCVietNam">Vietnam Kangaroo Math Contest</a></p>
		</div>
		<div class="col-sm-4 footer-part shortcut">

			<p><span class="hostname">Liên kết nhanh</span></p>
			<p class="address"><a href="<?php echo base_url(); ?>">Trang chủ </a></p>
				<p class="address"><a href="<?php echo base_url(); ?>competition">Kỳ thi IKMC</a></p>
					<p class="address"><a href="http://kangaroo-math.vn/summer/login">CLB KMOC</a></p>
						<p class="address"><a href="<?php echo base_url(); ?>gallery">Hình ảnh</a></p>
							<p class="address"><a href="<?php echo base_url(); ?>contactus">Liên hệ</a></p>
		</div>
		<!-- <div class="col-sm-4 footer-part fanpage">
			<p><span class="hostname">FACEBOOK</span></p>
			<div class="fb-page" data-href="https://www.facebook.com/IKMCVietnam/" data-tabs="timeline" data-width="380" data-height="230" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/IKMCVietnam/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/IKMCVietnam/">VietNam Kangaroo Math Contest</a></blockquote></div>
		</div> -->
	</div>
	<div class="container-fluid container-nopadding">
	<div class="row copyright-footer">
		<span class="ieg-caption">Copyrights reserved IEG - <a href="http://ieg.vn">http://ieg.vn</a></span>
	</div>
	</div>
</footer>

</body>
	<script type="text/javascript" src="<?php echo base_url(); ?>ikmc2017_assets/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>ikmc2017_assets/bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>ikmc2017_assets/CarouFredSel/jquery.carouFredSel-6.2.1-packed.js"></script>

<!-- optionally include helper plugins -->
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>ikmc2017_assets/CarouFredSel/helper-plugins/jquery.mousewheel.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>ikmc2017_assets/CarouFredSel/helper-plugins/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>ikmc2017_assets/CarouFredSel/helper-plugins/jquery.transit.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>ikmc2017_assets/CarouFredSel/helper-plugins/jquery.ba-throttle-debounce.min.js"></script>
<script src="<?php echo base_url(); ?>assets/input-mask/jquery.inputmask.js"></script>
            <script src="<?php echo base_url(); ?>assets/input-mask/jquery.inputmask.date.extensions.js"></script>
            <script src="<?php echo base_url(); ?>assets/input-mask/jquery.inputmask.extensions.js"></script>
<script type="text/javascript" language="javascript">
		
			$(document).ready(function(){
					$(function() {

				//	Basic carousel, no options
				

				//	Basic carousel + timer, using CSS-transitions
				$('#foo1').carouFredSel({
					scroll: 1,
				}, {
					transition: true
				});
			});
				$(".menu-link").click(function(event) {
					var idsection = $(this).attr('data-toggle');

					$("#introduction-content .intro-content").hide();
					$("#"+idsection).fadeIn('slow');
				});
			});
			  $("#birthday").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
     $("[data-mask]").inputmask();
     $(".")
</script>
	<script type="text/javascript">
		$(document).ready(function(){
			
				$('.search-li').addClass('active');
		
		});
	</script>

</html>
