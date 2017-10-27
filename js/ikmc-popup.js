
$(document).ready(function(e) {
    $('.alert-title-1').click(function(e) {
        $('.alert-1').animate({height: '80%'}, "slow");
		$('.alert-2').animate({height: '50px'}, "slow");
		$('.alert-3').animate({height: '50px'}, "slow");
		
		$('.alert-content-3').fadeOut();
		$('.alert-content-2').fadeOut();
		$('.alert-content-1').fadeIn();
    });
	$('.alert-title-2').click(function(e) {
        $('.alert-2').animate({height: '80%'}, "slow");
		$('.alert-1').animate({height: '50px'}, "slow");
		$('.alert-3').animate({height: '50px'}, "slow");
		$('.alert-content-3').fadeOut();
		$('.alert-content-1').fadeOut();
		$('.alert-content-2').fadeIn();
    });
	$('.alert-title-3').click(function(e) {
        $('.alert-3').animate({height: '80%'}, "slow");
		$('.alert-1').animate({height: '50px'}, "slow");
		$('.alert-2').animate({height: '50px'}, "slow");
		$('.alert-content-2').fadeOut();
		$('.alert-content-1').fadeOut();
		$('.alert-content-3').fadeIn();
    });
});


   
$(document).ready(function(e) {
    
	$('h3 span').click(function(){
		
		$('#popup1').fadeOut(1000);
		$('#popup1-full').fadeOut(1000);
		$('#popup1 #main').animate({fontSize: '15px'}, "slow");
	});
	$('#popup1-full').click(function(){
		$('#popup1').slideUp(1000);
		$('#popup1-full').fadeOut(1000);
		$('.alert-thongbao').fadeIn();
	});
	$('.alert-thongbao').click(function(e) {
        $('#popup1').slideDown(1000);
		$('#popup1-full').fadeIn(1000);
		$('.alert-thongbao').fadeOut(1000);
    });
	$('.alert-close').click(function(e) {
        $('#popup1').slideUp();
		$('#popup1-full').fadeOut();
		$('.alert-thongbao').fadeIn();
    });
	
});

			