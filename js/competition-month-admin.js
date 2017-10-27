var arr_question = [];
var arr_text = ["(A)", "(B)", "(C)", "(D)", "(E)" ];


function loadQuestion(){
	var level = $("#level").val();
	$.ajax({
        type: "POST",
        url: "http://kangaroo-math.vn/competition_month_admin/loadquestion/" + level,
        data: "",
        cache: false,
        success: function(html){
            readDataQuestion(html);
        }
    });
}
function showQuestion(){
	$("#box_wait").hide();
	$("#contents").show();
	$("#submit_form").show();
}
function readDataQuestion(txt){
	arr_question = $.parseJSON(txt);
	var str_show = "";
	str_show += "<div class='list_question' id = 'list_question'>";
	var part = "0";
	for (var i = 0; i < arr_question.length; i++) {
		var question = arr_question[i];
		if(part != question['part']){
			part = question['part'];
			str_show += "<div class='part'>Part " + part + "</div>";
		}
		str_show += "<div class='one_question'>";
			str_show += "<div class='question_header'>";
				str_show += "<div class='question_order'>";
					str_show += "<div class='order_view' id='order_view_" + question['id'] + "'>";
						str_show += (i + 1);
					str_show += "</div>";
				str_show += "</div>";
				str_show += "<div class='question_content'>";
					str_show += question['content'];
				str_show += "</div>";
			str_show += "</div>";
			str_show += "<div class='question_ans'>";
				str_show += "<div class='ans_title'>Chọn đáp án đúng</div>";
				str_show += "<div class='ans_content'>";
					str_show += "<ul class='list-inline'>";
						var index_text = 0;
						for (var j = 1; j <= 4; j++) {
							if(j == question['order_right_ans']){
								str_show += "<li>";
								str_show += "<div class='ans_line'>";
									str_show += "<span class='right_check' id='right_check_" + question['id'] + "' hidden></span>";
									str_show += "<input type='radio' name='ans_" + question['id'] + "'/>";
									str_show += arr_text[index_text++] + question['right_ans'];
								str_show += "</div>";
								str_show += "</li>";
							}
							str_show += "<li>";
								str_show += "<div class='ans_line'>";
									str_show += "<input type='radio' name='ans_" + question['id'] + "'/>";
									str_show += arr_text[index_text++] + question['wrong_ans_' + j];
								str_show += "</div>";
							str_show += "</li>";
						}
						if(5 == question['order_right_ans']){
							str_show += "<li>";
							str_show += "<div class='ans_line'>";
								str_show += "<span class='right_check' id='right_check_" + question['id'] + "' hidden></span>";
								str_show += "<input type='radio' name='ans_" + question['id'] + "'/>";
								str_show += arr_text[index_text++] + question['right_ans'];
							str_show += "</div>";
							str_show += "</li>";
						}
					str_show += "</ul>";
				str_show += "</div>";
			str_show += "</div>";
		str_show += "</div>";
	}
	str_show += "</div>";
	$("#contents").html(str_show);
	//mathjax
	MathJax.Hub.Config({
	tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
	});
	MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
	
	showQuestion();
}
function submit_form(){
	var arr_result = [];
	var score = arr_question.length;
	var num_right_ans = 0; num_wrong_ans = 0;
	for (var i = 0; i < arr_question.length; i++) {
		var question = arr_question[i];
		var text_name = "ans_" + question['id']; 
		var arr_radio = $('input[name='+text_name+']');
		var selectedIndex = arr_radio.index(arr_radio.filter(':checked'));
		var question_result = {id_question:question['id'], result:"0"};	
		if (arr_radio[question['order_right_ans'] - 1].checked) {
			question_result['result'] = "1";
			score += parseInt(question['mark']);
			num_right_ans++;
			$("#order_view_"+question['id']).css("background", "#00c800");
		}
		else{
			num_wrong_ans++;
			$("#order_view_"+question['id']).css("background", "#fa0000");
			
		}
		$("#right_check_" + question['id']).show();
		arr_result.push(question_result);

	}
	var strJson = JSON.stringify(arr_result);
	
	$("#mark_test").html(score);
	$("#num_right_ans").html(num_right_ans);
	$("#num_wrong_ans").html(num_wrong_ans);
	
	$("#result_test").show();
	$("#action_after").show();
	$("#contents").hide();
	$("#submit_form").hide();
	$("#form input").prop("disabled", true);

}
function review(){
	$("#action_after").hide();
	$("#contents").show();
}

  
$(document).ready(function() { 
	loadQuestion();
	
	if($(document).height() - 100 > screen.height) {
	
		$('.submit_form').css({
	      "position": "fixed",
	      "bottom": "0px",
	      "width": $("form").width(),
	    });

	}
    $(window).scroll(function(){
       	var f_width = $("form").width();
        if ($(window).scrollTop() < $(document).height() - screen.height - 290){
        $('.submit_form').css({"position":"fixed","width":f_width});
         

        } else {
            $('.submit_form').css({"position":"relative","width":"100%"});
            
        }
    });


});
