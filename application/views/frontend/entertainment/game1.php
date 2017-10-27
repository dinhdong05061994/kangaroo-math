		
<style>

    *, *:before, *:after {
		box-sizing: border-box;
	}



	#body_game pre {
		text-align: center;
		color: rgba(74, 147, 170, 1);
	}

	#body_game .content {
		max-width: 500px;
		margin: 20px auto;
	}

	#body_game .app__input, .app__end {
		text-align: center;
	}

	#body_game .app__end {
		margin-top: 40px;
	
	}
	#body_game input {
		outline: none;
		border: none;
		margin: 0 0 20px 3px;
		padding: 8px 5px 0px 0;
		background: transparent;
		color: rgb(91, 152, 32);
		font-size: 20px;
		border-bottom: 1px dotted rgba(91,114,127,1);
	}

	#body_game button {
		margin-bottom: 100px;
		background: transparent;
		border: 1px dashed rgb(173, 56, 37);
		outline: none;
		cursor: pointer;
		color: rgb(42, 42, 122);
		padding: 8px 30px 9px;
		font-size: 14px;
		text-transform: uppercase;
		text-align: center;
	}

	#body_game .app__gen-number {
		text-align: center;
	}

	#body_game .app__divider {
		color: rgba(91,114,127,1);
		margin: 20px 0;
	}

	#body_game .app__number {
		font-size: 36px;
		color: rgba(244, 89, 87, 1);
	}

	#body_game .app__info:before,
	#body_game .app__info:after {
		content: ' ';
		display: table;
	}

	#body_game .app__info:after {
		clear: both;
	}

	#body_game .app__info {
		margin: 20px 0;
	}

	#body_game .app__level {
		float: left;
		color: rgb(41, 17, 90);;
	}

	#body_game .app__wrong {
		float: right;
		color: rgb(165, 8, 6);
	}

	#body_game .app__author {
		font-family: Helvetica, Arial;
		position: fixed;
		bottom: 20px;
		right: 30px;
		color: rgba(33, 150, 243, 1);
		text-decoration: none;
	}
	#body_game form{
		    color: green;
	}
	#body_game{
		margin: 0;
		padding: 0;
		font-family: 'Fira Mono', monospace;
		font-size: 16px;
		background: rgba(33, 46, 59, 1);
		color: rgba(250,250,255,1);
		line-height: 1;
	}
@media screen and (min-width: 320px){
	#body_game {
		
		background-image: url('./images/entertainment/phone.svg');
		background-size: 100%;
		background-repeat: no-repeat;
    	background-position: left top;
    	line-height: 2;
	}
	#body_game img{
		width: 650px;
    	margin-left: -70px;
	}
	#body_game .content {
		max-width: 800px;
		font-size: 25pt;
	}
	#body_game #app{
		margin-top: 150px;
	}
	#body_game button{
		font-size: 25pt;
	}
}
/*@media screen and (min-width: 768px) {
	body{

		background-image: url('../phone1.svg');
		background-position:  left bottom 85%;
	}
}*/
@media screen and (min-width: 1024px) {
	#body_game{

		background-image: url('./images/entertainment/nengame1.svg');
		background-repeat:   no-repeat;
		background-position:  left bottom 45%;
		line-height: 1;
	}
	#body_game img{
		width: 350px;
		margin-left: 0;
	}
	
	#body_game .content {
		font-size: 16px;
		max-width: 500px;

	}
	#body_game #app{
		margin-top: 50px;
	}
	#body_game button{
		font-size: 12pt;
	}
}
	
</style>
<div id="body_game">
	<link href="./css/entertainment/css.css" rel="stylesheet"> 

<div class="content">
<center>
	<img src="http:./images/entertainment/anhgame.png" width="350px">
</center>
		<div id="app"><div data-reactroot="" class="main__app"><div class="app__gen-number"><div class="app__info"><p class="app__level"><!-- react-text: 5 -->Level: <!-- /react-text --><!-- react-text: 6 -->1<!-- /react-text --><!-- react-text: 7 --> - <!-- /react-text --><!-- react-text: 8 -->1<!-- /react-text --></p><p class="app__wrong"><!-- react-text: 10 -->Wrong: <!-- /react-text --><!-- react-text: 11 -->0<!-- /react-text --><!-- react-text: 12 -->/3<!-- /react-text --></p></div><p class="app__divider">############################</p><p class="app__number" id="number">··</p><p class="app__divider">############################</p></div><div class="app__input"><form><!-- react-text: 18 -->Number is:<!-- /react-text --><input type="text" pattern="[0-9]+" required="" autocomplete="off" id="input_number"><br><br></form><button>Restart</button></div></div></div>
	</div> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>

$(document).ready(function(){
	
	var coefficient_grade = <?=$choose_level?>;//hệ số lớp học: 1 - lớp 1-2; 2 - lớp 3-4; 3 - lớp 5-6 
	var level_main = 1;
	var level_sub = 1;
	var wrong = 0;
	var current_number = 0;
	var digit = coefficient_grade;//số chữ số của số hiện ra, khởi tạo là hệ số của lớp học tg ứng
	current_number =  getCurrentNumber(coefficient_grade);
	$("#number").text(current_number);
	init_time_hide_number();
	$("#body_game button").click(function(){
		level_main = 1;
		level_sub = 1;
		wrong = 0;
		$(".app__wrong").text("Wrong: "+wrong+"/3");
	 	$(".app__level").text("Level: "+level_main+"-"+level_sub);
		current_number = getCurrentNumber(coefficient_grade);
		$("#number").text(current_number);
		time_hide_number();
		$("#body_game form").html('Number is: <input type="text" pattern="[0-9]+" required="" autocomplete="off" id="input_number"><br><br>');
 		$(".app__end").addClass("app__input");
 		$(".app__end").removeClass("app__end");
	});
	$("#body_game form").submit(function(e){
		e.preventDefault();
	});
	$(document).on('keyup','#body_game #input_number',function(event){

		var keycode = (event.keyCode ? event.keyCode : event.which);
	    if(keycode == '13'){
	        var number_answer = $("#body_game input").val();	
	        if(number_answer != "" && number_answer.match(/[0-9]+/)){
	        	if(number_answer == current_number){
					if(level_sub < 3){
						level_sub++;
					}else if(level_sub == 3){
						level_main++;
						level_sub = 1;
					}
					digit = level_main + coefficient_grade;
					current_number = getCurrentNumber(digit);
					$("#number").text(current_number);
					time_hide_number();
				}else{
					wrong++;
					if(wrong >= 3){
						$("#number").text("????");
				 		$("#body_game form").html('<div>Better luck next time (✧ω✧)</div><br><br>');
				 		$(".app__input").addClass("app__end");
				 		$(".app__input").removeClass("app__input");
					}else{
						digit = level_main + coefficient_grade;
						current_number = getCurrentNumber(digit);
						$("#number").text(current_number);
						time_hide_number();
					}
				}
				$("#body_game input").val("");
				$(".app__wrong").text("Wrong: "+wrong+"/3");
			 	$(".app__level").text("Level: "+level_main+"-"+level_sub);
	        } 
	    }
	});
	function getCurrentNumber(digit){
	var max = Math.pow(10, digit) - 1,
		min = Math.pow(10, digit - 1);
		return Math.floor(Math.random() * (max - min + 1)) + min;
		//Math.random():[0...1)
	}
	function time_hide_number(){	
			var time = undefined,
		    digit = undefined;
			// increase showing time depend on level
			digit = level_main + coefficient_grade;
			time = 100 * Math.min(digit, 5) + 400 * Math.max(digit - 5, 0);

			var number = document.getElementById('number');
			setTimeout(function () {
				number.innerHTML = number.innerHTML.replace(/\w/gi, '&#183;');
			}, time);	
	}
	function init_time_hide_number(){
		var number = document.getElementById('number');
		setTimeout(function () {
			number.innerHTML = number.innerHTML.replace(/\w/gi, '&#183;');
		}, 1200);	
	}
});
</script>
</div>
