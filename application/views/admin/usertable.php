<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Danh sách thành viên </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_plugin/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap-table.css">
  <!-- Font Awesome -->

  <!-- Ionicons -->

  <!-- DataTables -->

  <!-- Theme style -->

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<div class="container-fluid">
  <div class="row">
  <div class="panel panel-success">
    <div class="panel-heading">
      <h2>Danh sách thành viên</h2>
    </div>
    <div class="panel-body">
          <table class="table table-responsive table-hover" id="user_table" data-url="<?php echo base_url() ?>user_controller/returnJsonUsers" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"  data-show-export="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc"> 
      <thead>
              <tr>
                <th data-field="id" data-sortable="true">ID</th>
                <th data-field="fullname" data-sortable="true">Họ và tên</th>
                <th data-field="nickname" data-sortable="true">Tên đăng nhập</th>
                <th data-field="phone">SĐT</th>
                <th data-field="email">Email</th>
                <th data-field="birthday" data-sortable="true">Ngày sinh</th>
                <th data-field="status" data-formatter="operateUpgradeState" data-sortable="true">Upgrade</th>
                <th data-field="upgrade" data-sortable="true" data-visible="false">Ngày upgrade</th>
                <th data-field="create_date" data-sortable="true">Thời gian đăng ký</th>
                <th data-formatter="operateController" data-events="operateControllerEvents">Action</th>

              </tr>
            </thead>
    </table>
    </div>
  </div>

  </div>
</div>


<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() ?>admin_plugin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() ?>admin_plugin/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap-table.js"></script>
<!-- page script -->
<script type="text/javascript">
var ROOT = "<?php echo base_url() ?>";
var APP = {};
APP= {
  API:{
    updateAccountState: ROOT + 'user_controller/updateAccountState',
    resetPassword: ROOT + 'user_controller/resetPassword',
    deleteAccount: ROOT + 'user_controller/deleteAccount',
  }
}
var $user_table = $("#user_table");
  $("#user_table").bootstrapTable();
  function operateController(value, row, index){
    return [
          '<a class="resetpassword glyphicon glyphicon-repeat" title="Reset Password"></a> '+
          '<a class="upgrade glyphicon glyphicon-circle-arrow-up" title="Upgrade"></a>'
        ].join();
  }
  function operateUpgradeState(value, row, index){
    if(row.status==1){
      return '<a class="glyphicon glyphicon-ok success"></a>'
    }
  }
  window.operateControllerEvents = {
      'click .resetpassword': function(e, value, row, index){
        if(confirm("Are you sure to reset this account's password?")){
          $.ajax({
          url: APP.API.resetPassword,
          type: 'post',
          data:{
            'id': row.id
          },
          success: function(data){
            if(data.state){
              alert('Reset password success!');
            }
          }
        });
        }
      },
      'click .upgrade': function(e, value, row, index){
        if(confirm("Are you sure to upgrade this account?")){
          $.ajax({
          url: APP.API.updateAccountState,
          type: 'post',
          data: {
            'id': row.id
          },
          success: function(data){
            if(data.state){
              alert('Upgrade Success');
            }
          }
        });
        }

      }
  }
</script>
</body>
</html>
