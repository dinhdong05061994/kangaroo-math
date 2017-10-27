


function review(){
	$("#action_after").hide();
	$("#contents").show();
}

$(document).ready(function() { 
	
	MathJax.Hub.Config({
	tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
	});
	MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
    
	$("#form input").prop("disabled", true);

});