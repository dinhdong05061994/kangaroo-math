 <!DOCTYPE html>
 <html>
  <head>
  <meta charset="UTF-8">
   <title>Viet Nam Kangaroo Math</title>
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
  <style type="text/css">
    #add-user{
      float: right; 
      border: 1px solid #ccc; 
      padding: 7px 15px 7px 0; 
      background: #ccc;

    }
    #add-user > a:hover{
      text-decoration: none;
    }
    #add-user:focus, 
    #add-user:hover{
        background: #cbc8c8;
        cursor: pointer;
        border: 1px solid#a2a1a1;
    }
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
   <div class="container">
    <div class="row">
     <div class="col-md-12">
     <div class="row">
    <?php //$this->load->view("backend/admin_menu");?>
    </div>
      <div class="row">       
        <ul class="breadcrumb">
          <li><h4>Quản trị người dùng</h4></li>  
          <li class="active">Danh sách người dùng</li>
          <li id="add-user"><a href="<?=base_url()?>mng_user/add-user">Thêm người dùng</a></li>
        </ul> 
        <?php if($this->session->flashdata('edit-user-success')){?> 
        <div class="row" id="notification">
            
              <div class="alert alert-success" style="text-align: center;">
                <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?=$this->session->flashdata('edit-user-success')?>
              </div>  
            
        </div>
        <?php } ?>   
        <div class="row col-md-12">
            Tổng số : <?=$total_rows;?> kết quả
        </div> 
       <table class="table table-striped table-bordered table-condensed">
        <tr>
          <td class="center"><strong>ID</strong></td>
          <td><strong>Họ và tên</strong></td>
          <td><strong>Tên đăng nhập</strong></td>
          <td><strong>Email</strong></td>
          <td class="center"><strong>Lớp (Cấp độ)</strong></td>
          <td class="center"><strong>Ngày sinh</strong></td>
          <td class="center"><strong>Giới tính</strong></td>
          <td colspan="2" class="center"><strong>Tác vụ</strong></td>
        </tr> 
        <?php 
        if(is_array($users) && count($users) ) {
         foreach($users as $user){     
        ?>
        <tr>
          <td class="center"><?=$user->id;?></td>
          <td><?=$user->fullname;?></td>
          <td><?=$user->nickname;?></td>
          <td><?=$user->email;?></td>
          <td class="center"><?=$user->level == "1" ? 'Lớp 1-2' :($user->level == "2" ? 'Lớp 3-4' : ($user->level == "3" ? 'Lớp 5-6' :($user->level == "4" ? 'Lớp 7-8' : '-')));?></td>
          <td class="center"><?=$user->birthday;?></td>
          <td class="center"><?=($user->gender == '1' ? 'Nam':(($user->gender == '2' || $user->gender == '0') ?"Nữ":"Khác"));?></td>
          <td class="center"><a href="<?=base_url()?>mng_user/edit-<?=$user->id;?>">Sửa</a></td>
          <td class="center"><a href="<?=base_url()?>mng_user/delete-<?=$user->id;?>" onclick="return confirm(' You really want to delete user?');">Xóa</a></td>
        </tr>   
           <?php 
         }        
        }?>  
       </table>            
      </div>
     </div>
    </div>
    <div class="row">
      <form  method="POST" action="<?= base_url()?>mng_user/search" accept-charset="UTF-8" class="navbar-form">
        <div class="input-group" >
            <input type="text" name="search_id" placeholder="ID" value="<?=isset($id) ? $id : ''?>"></input>
        </div>
        <div class="input-group">
            <input type="text" name="search_fullname" placeholder="Họ và tên" value="<?=isset($fullname) ? $fullname: ''?>"></input>
        </div>
        <div class="input-group">
            <input type="text" name="search_nickname" placeholder="Tên đăng nhập" value="<?=isset($nickname) ? $nickname:'' ?>"></input>
        </div>
        <div class="input-group">
            <input type="text" name="search_email" placeholder="Email" value="<?=isset($email) ? $email:''?>"></input>
        </div>
        <div class="input-group">
           	
            <select name="search_level" id="search_level" placeholder="Lớp" style="padding: 7px;">
            	<option value="" hidden="" selected="">Lớp</option>
            	<option value=""></option>
            	<option value="1" <?=(isset($level)&& $level=='1') ? 'selected':''?>>Lớp 1-2</option>
            	<option value="2" <?=(isset($level)&& $level=='2') ? 'selected':''?>>Lớp 3-4</option>
            	<option value="3" <?=(isset($level)&& $level=='3') ? 'selected':''?>>Lớp 5-6</option>
            	<option value="4" <?=(isset($level)&& $level=='4') ? 'selected':''?>>Lớp 7-8</option>
          </select>
        </div>
        
         <button id = "search" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button> 
      </form>       
    </div>
    <div class="row">
      <div class="col-md-12">
      <div class="row"><?php echo $this->pagination->create_links(); ?></div> 
     </div>
    </div>

   </div>    
  </body>
  <script type="text/javascript" src="<?php echo base_url();?>js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
    
    $(".close").click(function(){
        $("#notification").hide("slow");
    });
    if( $('#search_level').val() == ""){
      $('#search_level').css('color','#afabab');

    }else{
      $('#search_level').css('color','#333');
    }
    
    $('#search_level').children().css('color','black');
    $('#search_level').on('change', function (ev){
	    $(this).css('color','black');
	    $(this).children().css('color','black');
	    console.log("th2");  
	});
  });
  </script>
 </html> 