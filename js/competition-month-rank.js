
function demNguocHienThi(time){
	
	var myTime = setInterval(function(){
		time --;
		if (time == 0) {
			show_rank();
			clearInterval(myTime);
		}
		var min = parseInt(time / 60);
		var sec = time % 60;
		var strTime=min+":";
		if(min < 10) strTime = "0" + strTime;
		if(sec < 10) strTime = strTime + "0";
		strTime+=sec;
		$(".my_clock").html(strTime);
		
		
	}, 1000); 
}

function loadTime(){
	
 	var current_time = $("#current_time").val();
 	var view_time = $("#view_time").val();
 	checkTime(current_time, view_time);
 	
}
function checkTime(current_time, view_time){
	//lay thoi gian hien tai
	var cd = new Date(current_time);
	var current_time = cd.getTime();
	//dat thoi gian bat dau lam bai
	var sd = new Date(view_time);
	var stime = sd.getTime();
	//tinh xem con bao nhieu giay nua de xem bang xep hang
	var timeCheck = parseInt((stime - current_time)/1000);
	
	
	
	
	
	if(timeCheck < 0){ //neu den gio
		show_rank();
	}
	else{
		demNguocHienThi(timeCheck);
	}
}

function show_rank(){
	$.ajax({
        type: "POST",
        url: "http://kangaroo-math.vn/competition_month/get_rank",
        data: "",
        cache: false,
        success: function(html){
            $("#contents").html(html);
        }
    });
}

$(document).ready(function() { 
	loadTime();
	
	
    

});