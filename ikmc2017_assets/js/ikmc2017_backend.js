var ROOT = 'http://'+window.location.host;
$(document).ready(function(){
$(".report-state").click(function(){
		var reportid = $(this).attr('report-id');
		var currentstate= $(this).attr('current-state');
		var stateSpanElement = $(this);
		swal({
  title: "Are you sure?",
  text: "Bạn muốn cập nhật thông tin report này?",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, do it!",
  closeOnConfirm: false
},
function(){
	$.ajax({
    		url: ROOT+'/backend/report/updatestate',
    		type: 'post',
    		dataType: 'json',
    		data: {id: reportid, state:currentstate},
    		success: function(data){
    			swal("Updated!", "Report đã được cập nhật", "success");
    			if(currentstate==1){
    				stateSpanElement.removeClass('label-success');
    				stateSpanElement.addClass('label-warning');
    				stateSpanElement.attr('current-state', '0');
    				stateSpanElement.html('Chưa xử lý');

    			}else{
    				stateSpanElement.removeClass('label-warning');
    				stateSpanElement.addClass('label-success');
    				stateSpanElement.attr('current-state', '1');
    				stateSpanElement.html('Đã xử lý');
    			}
    		}
    	})
  
});
	});
$(".btnDelReport").click(function(){
		var reportid = $(this).attr('data-report-id');
		var btn = $(this);
		swal({
  title: "Are you sure?",
  text: "Bạn muốn xóa report này?",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, do it!",
  closeOnConfirm: false
},
function(){
	$.ajax({
    		url: ROOT+'/studentcard_controller/deleteReport',
    		type: 'post',
    		dataType: 'json',
    		data: {id: reportid},
    		success: function(data){
    			swal("Updated!", "Report đã bị xóa khỏi hệ thống", "success");
    			btn.closest('tr').remove();
    		}
    	})
  
});
	});
$(".updatestudent").click(function(event) {
	var studentid = $(this).attr('student-id');
	$.ajax({
		url: ROOT+'/studentcard_controller/ajaxGetStudent',
		type: 'POST',
		dataType: 'json',
		data: {studentid: studentid},
		success: function(data){
			$("#sbd").val(data.sbd);
			$("#fullname").val(data.fullname);
			var date = converDateFormat(data.birthday);
			$("#birthday").val(date);
			$("#studentid").val(data.id);
			$("#gender").val(data.gender);
			$("#myModal").modal();
		}
	});

	/* Act on the event */
	
});
	$("#submitUpdate").click(function(event) {
		
		$.ajax({
			url: ROOT+'/studentcard_controller/updateStudentData',
			type: 'POST',
			dataType: 'json',
			data: {studentid: $("#studentid").val(),
					fullname : $("#fullname").val(),
					birthday: $("#birthday").val(),
					gender: $("#gender").val()
					},
			success: function(){
				var btnElement = $("[student-id="+$("#studentid").val()+"]");
				btnElement.closest('tr').children('td.fullname-td').text($("#fullname").val());
				btnElement.closest('tr').children('td.birthday-td').text($("#birthday").val());
				btnElement.closest('tr').children('td.gender-td').text($("#gender").val());
				swal("Updated!", "Thông tin đã được cập nhật", "success");
				$("#myModal").modal('hide');
		}
    			
			
		});
	
		
	});
	$(".btnNote").click(function(event) {
		$("#note_content").val($(this).closest('tr').find('td.note-td').text());
		$("#reportid").val($(this).attr("data-id"));
		$("#myModal").modal();
	});
		$("#submitNote").click(function(event) {
		
		$.ajax({
			url: ROOT+'/studentcard_controller/updateNoteReport',
			type: 'POST',
			dataType: 'json',
			data: {reportid: $("#reportid").val(),
					note : $("#note_content").val(),
					
					},
			success: function(){
				var btnElement = $("[data-id="+$("#reportid").val()+"]");
				btnElement.closest('tr').children('td.note-td').text($("#note_content").val());
				$("#myModal").modal('hide');
				swal("Updated!", "Thông tin đã được cập nhật", "success");
    			
			}
		})
	
		
	});
});
function converDateFormat(date){
	var splitDate = date.split('-');

	return splitDate[2]+'/'+splitDate[1]+'/'+splitDate[0]; 
}
