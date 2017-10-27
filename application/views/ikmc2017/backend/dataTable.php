<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IKMC 2017 | Danh sách thí sinh </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_plugin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_plugin/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_plugin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_plugin/dist/css/skins/_all-skins.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>ikmc2017_assets/sweetalert/dist/sweetalert.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>ikmc2017_assets/css/backend.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
     
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>IKMC</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
     
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <!-- <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
<!--     <section class="sidebar">
   
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    
      sidebar menu: : style can be found in sidebar.less
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url() ?>studentcard_controller/loadallreports">
            <i class="fa fa-calendar"></i> <span>Error Reports</span>
           
          </a>
        </li>
        <li>
          <a href="<?php echo base_url() ?>studentcard_controller/getallstudents">
            <i class="fa fa-calendar"></i> <span>Danh sách thí sinh</span>
           
          </a>
        </li>
       </ul>
    </section>

  </aside> -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!--  <h1>
        Data Tables
        <small>advanced tables</small>
      </h1> -->
     <!--  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <!--   <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
    
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h2 class="box-title">Danh sách thí sinh</h2>
              <div class="row">
              <div class="container">
              
              <form class="form-inline">
              <div class="form-group">
              <label>   </label>
                <select class="form-control col-md-2" id="venueSelect">
            <option value="No"> Điểm thi: all</option>
               <?php foreach($venues as $venue){ ?>
              <option value="<?php echo $venue['id'] ?>"><?php echo $venue['name'] ?></option>
               <?php } ?> 
            </select>
            </div>
            <div class="form-group">
            <label></label>
            <select class="form-control col-md-2" id="roomSelect">
            <option value="No">Phòng thi: all</option>
              <?php for($i=1;$i<60;$i++){ ?>
              <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php } ?>
            </select>
            </div>
            </form>
            
              </div>
                  
              </div>
         
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="myTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>SBD</th>
                  <th>Họ và tên</th>
                  <th>Ngày sinh</th>
                  <th>Giới tính</th>
                  <th>Lớp</th>
                  <th>Trường</th>
                  <th>Phòng</th>
                
                  <th>Điểm thi</th>
                 
                  <th>Time</th>
                  <th>Check in?</th>
                </tr>
                <tr id="filter">
                	<th>STT</th>
                  <th>SBD</th>
                  <th>Họ và tên</th>
                  <th>Ngày sinh</th>
                  <th>Giới tính</th>
                  <th>Lớp</th>
                  <th>Trường</th>
                  <th>Phòng</th>
                
                  <th>Điểm thi</th>
                  <th>Time</th>
                  <th>Check in?</th>
                </tr>
                </thead>
               
           
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2016-2017 <a href="http://ieg.vn">IEG</a>.</strong> Design by: Nam Nguyen
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<!-- Modal -->

<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() ?>admin_plugin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() ?>admin_plugin/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>admin_plugin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>admin_plugin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>admin_plugin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>admin_plugin/plugins/fastclick/fastclick.js"></script>


 
 
 
 
  
<!-- AdminLTE App -->

<!-- page script -->

           
<script>
    $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var venue_id =parseInt($("#venueSelect").val());
        var room = parseInt($("#roomSelect").val());
        var venuePosition = parseInt(data[8]);
        var roomPosition = parseInt(data[7]);// use data for the age column
        if ((isNaN(venue_id)&&isNaN(room))||(isNaN(venue_id)&&room===roomPosition)
            || (isNaN(room)&&venue_id===venuePosition) || (venue_id===venuePosition && room===roomPosition)
          ){
            return true;
        }
        return false;
    }
);
  $(document).ready(function () {

$.fn.dataTable.ext.type.order['checkin-state-pre'] = function ( d ) {
    switch ( d ) {
        case '<span class="label label-success"><i class="fa fa-check"></i></span>':    return 1;
        case '<span class="label label-danger"><i class="fa fa-times"></i></span>': return 2;
      
    }
    return 0;
};

  $('#myTable thead tr#filter th').each( function () {
        var title = $(this).text();
        if(title!=="STT"||title!=="Time"||title!=="Check in?"){
        	 $(this).html( '<input type="text" placeholder="Search" style="width:100%"/>' );
        }
       
    } );
var table =$('#myTable').DataTable( {
	  "orderCellsTop": true,
	"serverSide":false,
	 "processing":true,
    "ajax": {
        url: "http://"+window.location.host+"/ikmcstatistics_controller/getDataFromAPI",
        dataSrc: '',
        error: function(){
        $(".myTable-error").html("");
							$("#myTable").append('<tbody class="myTable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#loader").css("display","none");
								
        },

    }
    ,	
   
    oLanguage: {sProcessing: "<img src='https://www.wordbee.com/Content/Wordbee/Images/loading1.gif'>"},
    "columns": [
            { data: "id" },
            { data: "sbd" },
            { data: "fullname" },
            { data: "birthday" },
             { data: "gender" },
            { data: "clazz" },
            
            { data: "school_name"},
            { data: "room"},
           
            {data: "venue_id"},
            { data: "attendance_time"},
            { data: "attendance_time"}
        ],
         "dom": 'Bfrtip',
        "buttons": [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
    "columnDefs": [ {
    	"type":"checkin=state",
    "targets": -1,
    "data": "attendance_time",
    "render": function ( data) {
      if(data!=null){
      	return '<span class="label label-success"><i class="fa fa-check"></i></span>';
      }else{
      	return '<span class="label label-danger"><i class="fa fa-times"></i></span>';
      }
    }
  }, 


   ],
   
} );
$("#myTable thead input").on( 'keyup change', function () {
        table
            .column( $(this).parent().index()+':visible' )
            .search( this.value )
            .draw();
    } );

$('#venueSelect, #roomSelect').change( function() {
        table.draw();
    } )
  });
</script>
</body>
</html>
