<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
	<title>Change time test</title>
	<base href="<?php echo base_url();?>"/>
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

	<style type="text/css">
		.ui-datepicker {
	    	width: 25% !important;
	    
		}
	</style>
  <script type="text/javascript" src="<?php echo base_url();?>js/jquery-2.1.4.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script>
  function getTime()
	{
	    var date_obj = new Date();
	    var date_obj_hours = ('0'+date_obj.getHours()).slice(-2);
	    var date_obj_mins = ('0'+date_obj.getMinutes()).slice(-2);
	     var date_obj_second = date_obj.getSeconds();

	    var date_obj_time = "'"+date_obj_hours+":"+date_obj_mins+"'";
	    // var date_obj_second = date_obj.getSeconds();

	    // var date_obj_time = "'"+date_obj_hours+":"+date_obj_mins+":"+date_obj_second+"'";
	    return date_obj_time;
	}
  $( function() {
  	$("#close-msg").click(function(){
        $("#d_msg").hide("slow");
        $("#msg").removeClass("alert-success");
        $("#msg").removeClass("alert-danger");
      });
    $( "#input_begin_time" ).datepicker({
        
        dateFormat: "dd/mm/yy "+getTime(),  
        
        changeYear: true,
        monthNamesShort: [ "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12" ],
        changeMonth: true
      
    });
   	
  });
  function limit(element, max) {    
    var max_chars = max;
    if(element.value < 0){
    	element.value = 1;
    }
    if(element.value.length > max_chars) {
        element.value = element.value.substr(0, max_chars);
    } 
}
  </script>



</head>
<body style="background: #eee;">
	
	<div class="container" style="margin:100px auto";>
		<div class="col-sm-6 col-sm-offset-3 row" id="re_q" style="display: none;">
			<div class="alert alert-warning" id="re_msg">
				<a class="close" id = "close-re" data-dismiss="alert" aria-label="close">&times;</a>
				<center></center>
				<hr>
				<button id = "btn-sure" class="btn btn-default" >Chắc chắn</button>
				<button id = "btn-cancel" class="btn btn-default" >Hủy</button>
			</div>
		</div>
		<div class="col-sm-6 col-sm-offset-3 row" id="re_set_time" style="display: none;">
			<div class="alert alert-warning" id="re_msg_set_time">
				<a class="close" id = "close-re-set-time" data-dismiss="alert" aria-label="close">&times;</a>
				<center></center>
				<hr>
				<button id = "btn-sure-set-time" class="btn btn-default" >Chắc chắn</button>
				<button id = "btn-cancel-set-time" class="btn btn-default" >Hủy</button>
			</div>
		</div>
		<?php if(isset($row) && count($row) >0){?>
			<div id="choose_way" class="col-sm-8 col-sm-offset-2">
				<h2 style="color: blue;">Chọn cách thức:</h2>
				<div class="tag">                            
		              <ul class="nav nav-tabs" role="tablist">		              
		                <li role="presentation"  id="set_time"><a aria-controls="home" role="tab" data-toggle="tab">Đặt lại thời gian làm bài</a></li>
		                <li role="presentation" id="no_set_time"><a aria-controls="profile" role="tab" data-toggle="tab">Cho phép làm bài bất cứ lúc nào</a></li>	                
		              </ul>
		        </div>
				
			</div>
			<div id="choose_time" class="col-sm-8 col-sm-offset-2" style="display: none;">
				<h4 style="color: #505088;">Thay đổi thời gian thi các level</h4>
				<label for="input_duration">Thời gian làm bài (phút)</label>
				<div class="form-group" style="margin-bottom: 30px;">
					<input class="form-control" type="number" min="1" max = "999" onkeydown="limit(this, 3);" onkeyup="limit(this, 3);" maxlength="3" id="input_duration" name="input_duration" style="float:left;width: 90%; margin-right: 20px;" value="<?=($row->duration)/60?>"></input><span>  (phút)</span>
				</div>
				<label>Thời gian bắt đầu làm bài (d/m/Y H:i:s)</label>
				<div class="form-group">
					<input class="form-control" type="" id="input_begin_time" style="width: 90%" value="<?=date_format(date_create($row->begin_time),'d/m/Y H:i:s');?>"></input>
				</div>
				<button class = "btn btn-default" style="background: #c3f3c3;" id="sbm-choose">Đặt lại</button>
			</div>
			<div class="col-sm-6 col-sm-offset-3 row" id="d_msg" style="display: none; clear: both;color:seagreen;">
				<div class="alert" id="msg">
					<a class="close" id="close-msg" data-dismiss="alert" aria-label="close">&times;</a>
					<center></center>
					<a href="admin_competition/competition_month_time"><button class="btn btn-block">Quay lại danh sách thời gian</button></a>
				</div>
			</div>

			<input type="hidden" id="row" value="<?=$row->id;?>"></input>
		<?php }else{?>
			<h3>Không có dữ liệu.</h3>
		<?php }
			?>
	</div>


  <script type="text/javascript">
$(document).ready(function(){
	$("#set_time").click(function(){
		$("#close-msg").click();
		$("#set_time").addClass("active");
		$("#choose_time").show("slow");
		$("#no_set_time").removeClass("active");
		
		$("#close-re").click();
	});
	$("#no_set_time").click(function(){
		$("#close-re-set-time").click();
		$("#close-msg").click();
		$("#choose_time").hide("slow");
		$("#no_set_time").addClass("active");
		$("#set_time").removeClass("active");
		$("#re_q").show();
		
		$("#re_msg center").text('Bạn chắc chắn cho phép làm bài bất cứ lúc nào?');
	});
	$("#btn-cancel").click(function(){
		$("#re_q").hide();
		$("#re_msg center").text("");
	});
	$("#close-re").click(function(){
		$("#re_q").hide();
		$("#re_msg center").text("");
	});
	$("#btn-sure").click(function(){
		$("#close-re").click();
		var id = $("#row").val();
		$.ajax({
			url: "admin_competition/update_competition_month_time/"+id,
		    type: "POST",
		    cache:false,
		    data:{ 
		    	active: 2
		    },
		    success: function(data){
		    	
		    	if(data>=1){
		    		$("#d_msg").show();
		    		$("#msg center").text('Cập nhật thành công');
		    	}else{
		    		$("#d_msg").show();
		    		
		    		$("#msg center").text('Không có dữ liệu nào được cập nhật');
		    	}
		    	//window.location.href="admin_competition/competition_month_time";
		    }
		});
	});
	$("#close-re-set-time").click(function(){
		$("#re_set_time").hide();
		$("#re_msg_set_time center").text("");
	});
	$("#sbm-choose").click(function(){
		$("#re_set_time").show();
		$("#re_msg_set_time center").html('Bạn chắc chắn đặt lại thời gian làm bài thi vào '+$("#input_begin_time").val()+',<br> với tổng thời gian: '+$("#input_duration").val()+'phút ?');
	});
	$("#btn-cancel-set-time").click(function(){
		$("#close-re-set-time").click();
	});
	$("#btn-sure-set-time").click(function(){
		$("#close-re-set-time").click();
		var duration = $("#input_duration").val();
		var begin_time = $("#input_begin_time").val();
		var id = $("#row").val();
		// 07/04/2016 9:34
		begin_time = begin_time.substring(6,10)+"-"+ begin_time.substring(3,5)+"-"+begin_time.substring(0,2)+begin_time.substring(10,begin_time.length);
		$.ajax({
			url: "admin_competition/update_competition_month_time/"+id,
		    type: "POST",
		    cache:false,
		    data:{ 
		    	duration: duration,
		    	begin_time:begin_time,
		    	active: 1
		    },
		    success: function(data){
		    	//alert(data);
		    	//console.log(data);
		    	if(data>=1){
		    		$("#d_msg").show();
		    		// $("#msg").removeClass("alert-danger");
		    		// $("#msg").addClass("alert-success");
		    		$("#msg center").text('Cập nhật thành công');
		    	}else {
		    		$("#d_msg").show();
		    		// $("#msg").removeClass("alert-success");
		    		// $("#msg").addClass("alert-danger");

		    		$("#msg center").text('Không có dữ liệu được cập nhật');
		    	}
		    	//window.location.href="admin_competition/competition_month_time";
		    }
		});
	});
	
});
</script>
</body>
</html>
