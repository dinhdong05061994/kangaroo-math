var arr_question = [];
var time_test = 9000;
var arr_text = ["(A)", "(B)", "(C)", "(D)", "(E)" ];

function demNguocLamBai(time){
	
	var myTime = setInterval(function(){
		time --;
		if (time == 0 && time_test > 0) {
			submit_form();
			clearInterval(myTime);
		}
		var min = parseInt(time / 60);
		var sec = time % 60;
		var strTime=min+":";
		if(min < 10) strTime = "0" + strTime;
		if(sec < 10) strTime = strTime + "0";
		strTime+=sec;
		document.getElementById("txtTime").innerHTML = strTime;
		
		
	}, 1000); 
}
function demNguocCho(time, timeLoadQuestion){
	
	var myTime = setInterval(function(){
		time --;
		if(time == timeLoadQuestion) loadQuestion();
		if(time == 0){
			 showQuestion();
			 clearInterval(myTime);
		}
		var hour = parseInt(time / 3600);
		var min = parseInt((time % 3600) / 60);
		var sec = time % 60;
		
		if(hour < 10) hour = "0" + hour;
		if(min < 10) min = "0" + min;
		if(sec < 10) sec = "0" + sec;
		var strTime = hour + ":" + min + ":" + sec;
		document.getElementById("time_wait").innerHTML = strTime;
	}, 1000);  
		
}
function loadTime(){
	
 	time_test = parseInt($("#time_test").val());	
 	var current_time = $("#current_time").val();
 	var start_time = $("#start_time").val();
 	checkTime(current_time, start_time);
 	lang = $("#lang").val();
 	$("#contents").html(lang == "en"? "Loading..." : "Đang tải câu hỏi...");
}
function checkTime(current_time, start_time){

	//lay thoi gian hien tai
	var cd = new Date(current_time);
	var current_time = cd.getTime();
	//dat thoi gian bat dau lam bai
	var sd = new Date(start_time);
	var stime = sd.getTime();
	//tinh xem con bao nhieu giay nua de lam bai
	var timeCheck = parseInt((stime - current_time)/1000);
	//lay gia tri thoi gian load cau hoi cua user
	var timeLoadQuestion = current_time % 90 + 30;
	//console.log(timeLoadQuestion + "-" + timeCheck);
	//console.log(timeLoadQuestion);
	//trừ thoi gian lam bai muon
	//if(timeCheck < 0) time_test =  time_test + timeCheck;
	loadQuestion();
	showQuestion();
	if(1==0) if(time_test < 60){ //neu muon qua thoi gian khong cho lam bai
		getOut();
	}
	else{
		if(timeCheck <= timeLoadQuestion){ //neu thoi gian hien tai qua thoi gian load cau hoi thi load ngay
			loadQuestion();
		}
		if(timeCheck > 0){ //neu chua den thoi gian lam bai thi chay dong ho
			demNguocCho(timeCheck, timeLoadQuestion);
		}
		else{ //sai thi hien cau hoi
			showQuestion();
		}
	}
}
function getOut(){
	lang = $("#lang").val();
	document.getElementById("time_wait").innerHTML = (lang == "en" ?"Time out." : "Đã hết thời gian làm bài.");
}
function loadQuestion(){
	
	$.ajax({
        type: "POST",
        url: "http://kangaroo-math.vn/competition_month/loadquestion",
        data: "",
        cache: false,
        success: function(html){
        	
            readDataQuestion(html);
			if($(document).height() - 100 > screen.height) {
	
				$('.submit_form').css({
				  "position": "fixed",
				  "bottom": "0px",
				  "width": $("form").width(),
				});

			}
			
        }
    });
}
function showQuestion(){
	$("#box_wait").hide();
	$("#contents").show();
	$("#submit_form").show();
	demNguocLamBai(time_test);
	insertHistory();
}
function insertHistory(){
	$.ajax({
        type: "POST",
        url: "http://kangaroo-math.vn/competition_month/set_begin_doing",
        data: "",
        cache: false,
        success: function(html){
            console.log("insert_history");
        }
    });
}
function readDataQuestion(txt){
	
	arr_threads = $.parseJSON(txt);
	arr_question = $.parseJSON(arr_threads['properties']);
	var content = arr_threads['threads'];
	
	$("#contents").html(content);

	//mathjax
	MathJax.Hub.Config({
	tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
	});
	MathJax.Hub.Queue(["Typeset",MathJax.Hub]);

}
function submit_form(){
	var arr_result = [];
	var score = arr_question.length;
	var sub_score = 0; //diem am
	var num_right_ans = 0; num_wrong_ans = 0; num_empty_ans = 0;
	var jump_max_length = 0; jump_temp_length = 0; //buoc nhay
	for (var i = 0; i < arr_question.length; i++) {
		var question = arr_question[i];
		var text_name = "ans_" + question['id']; 
		var arr_radio = $('input[name='+text_name+']');
		var selectedIndex = arr_radio.index(arr_radio.filter(':checked'));
		var question_result = {id_question:question['id'], result:"0"};	
		if (question['order_right_ans'] - 1 == selectedIndex) {
			question_result['result'] = "1";
			score += parseInt(question['mark']);
			num_right_ans++;
			//de tinh buoc nhay
			jump_temp_length++;
			jump_max_length = jump_max_length > jump_temp_length ? jump_max_length : jump_temp_length;  
			$("#order_view_"+question['id']).css("background", "#00c800");
		}
		else if(selectedIndex == -1){
			num_empty_ans++;
			jump_temp_length = 0;
			$("#order_view_"+question['id']).css("background", "#ffa700");
		}
		else{
			sub_score += parseInt(question['mark']);
			num_wrong_ans++;
			jump_temp_length = 0;
			$("#order_view_"+question['id']).css("background", "#fa0000");
			
		}
		$("#right_check_" + question['id']).show();
		arr_result.push(question_result);

	}
	score -= (sub_score / 4); 
	var strJson = JSON.stringify(arr_result);
	
	$("#mark_test").html(score);
	$("#num_right_ans").html(num_right_ans);
	$("#num_wrong_ans").html(num_wrong_ans);
	$("#num_empty_ans").html(num_empty_ans);
	$("#jump_max_length").html(jump_max_length);
	saveHistory(score, jump_max_length, strJson);
	time_test = 0;

}
function review(){
	//var current_time = $("#current_time").val();
 	//var start_time = $("#start_time").val();
	//lay thoi gian hien tai
	//var cd = new Date(current_time);
	//var current_time = cd.getTime();
	//dat thoi gian bat dau lam bai
	//var sd = new Date(start_time);
	//var stime = sd.getTime();
	//tinh xem con bao nhieu giay nua de lam bai
	//var timeCheck = parseInt((stime - current_time)/1000);
	//alert(timeCheck);
	//if (timeCheck >= 450) {
	//	alert(timeCheck);
		$("#action_after").hide();
		$("#contents").show();
	//} else {
	//	alert("Bạn phải đợi hết thời gian làm bài mới có thể xem kết quả");	
	//}
}
function saveHistory(score, jump_max_length, str){
	var str_string = 'score=' + score + '&jump=' + jump_max_length + '&strjson=' + str;
	console.log(str_string);
	$.ajax({
        type: "POST",
        url: "http://kangaroo-math.vn/competition_month/savehistory",
        data: str_string,
        cache: false,
        success: function(html){
        	$("#result_test").show();
			$("#action_after").show();
			$("#action_to_rank_after").show();
			
			$("#contents").hide();
			$("#submit_form").hide();
			$("#form input").prop("disabled", true);
        }
    });
}
$(document).ready(function() { 
	
	
	
    $(window).scroll(function(){
       	var f_width = $("form").width();
        if ($(window).scrollTop() < $(document).height() - screen.height - 290){
        $('.submit_form').css({"position":"fixed","width":f_width});
         

        } else {
            $('.submit_form').css({"position":"relative","width":"100%"});
            
        }
    });
    
    

});
