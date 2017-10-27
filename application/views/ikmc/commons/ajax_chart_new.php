<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
<style type="text/css">
  /**/
</style>
 <script type="text/javascript">
  var num_null = parseInt('<?php echo $check; ?>');
  var num_topic = parseInt('<?php echo $count_topic; ?>');
  var total = 7 * num_topic;
  $(document).ready(function(){
    if(num_null == total){
      
      $("#curve_chart").html('<center style="font-size:13pt;color:#eee;padding:5%;">Không có dữ liệu biểu đồ. Có thể bạn chưa tích lũy điểm.</center>');
      $("#curve_chart").css("height","100px");

    }else{
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
    }
  });
  
  function drawChart() {
    var data_chart = [];   
      <?php
          $i = 0;
          
          if(isset($chart)){
              $js_array = json_encode($chart);
              echo "data_chart = ". $js_array . ";\n";
          }
      ?>
      var lang = "<?php echo $lang == "en" ? 'Scores': 'Điểm tích lũy';?>";
      

       var data = google.visualization.arrayToDataTable(data_chart);
       //đường thẳng
       var options = {
        title: lang,
        
      };
      // đường cong
      // var options = {
      //   title: lang,
      //   curveType: 'function',
      //   legend: { position: 'bottom' }
      // };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);
    
  }
</script>            
<div id="curve_chart" class="col-sm-12" style="height: 300px"></div>