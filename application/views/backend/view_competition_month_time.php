<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
	<title>Quản lý thời gian thi - Cuộc thi hàng tháng</title>
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
	<style type="text/css">
    .center{
      text-align: center;
      vertical-align: middle;
    }
    .menu > div,.logout{
      height: 25px!important;
    }
    .input-group > input{
      padding: 5px;
    }
  </style>
</head>
<body>
	 
	<div style="height: 30px;margin-top: 70px;"></div>

	 <div class="container" >
	 	<h3>Quản lý thời gian thi - Bài thi hàng tháng</h3>
		<div class="row">  
			<table class="table table-striped table-bordered table-condensed">
	        <tr>
	          <td><strong>Level(Lớp)</strong></td>
	          <td><strong>Thời gian bắt đầu làm bài</strong></td>
	          <td><strong>Tổng thời gian làm bài thi</strong></td>
	          <td class="center"><strong>Trạng thái</strong></td>
	          <td colspan="2" class="center"><strong>Tác vụ</strong></td>
	        </tr> 
	        <?php 
	        if(is_array($all_row) && count($all_row) ) {
	         foreach($all_row as $row){ 
	         	//if($row->level_user != 17){
	        ?>
	        <tr>
	          <td class="center"><?=$row->level_user == "1" ? 'Lớp 1-2' :($row->level_user == "2" ? 'Lớp 3-4' : ($row->level_user == "3" ? 'Lớp 5-6' :($row->level_user == "4" ? 'Lớp 7-8' : $row->level_user)));?></td>
	          <td><?=date_format(date_create($row->begin_time),'d/m/Y H:i:s');?></td>
	          <td><?=($row->duration)/60;?></td>
	          <td><?=$row->active_that_moment == 1 ? "Đặt giờ" :($row->active_that_moment == 2 ? "Cho phép làm bất cứ thời gian nào" :"Không xác định");?></td>
	          
	          <td class="center"><a href="<?=base_url()?>admin_competition/view_edit/<?=$row->id;?>">Sửa</a></td>
	        </tr>   
	           <?php 
	       		
	         }        
	        }?>  
	       </table>      
		</div>
	</div>
</body>

</html>