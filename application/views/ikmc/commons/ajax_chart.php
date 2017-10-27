<canvas id="buyers" width="500px" height="200px"></canvas>

<?php
            if(isset($day) && count($day) > 0){
                $data1 = "";
                for($i = (count($day) - 1); $i >= 0 ; $i--){
                    $len_day = strlen($day[$i]);
                    $day[$i] = substr($day[$i],5,$len_day-1);
                    $data1 .= '"'.$day[$i].'"'.',';
                }
                $len = strlen($data1);
                $data1 = substr($data1,0,$len-1);
                
                $data = "";
                for($i = (count($diem_num) - 1); $i >= 0 ; $i--){
                    $data .= $diem_num[$i].',';
                }
        	$len_num = strlen($data);
                $data = substr($data,0,$len_num - 1);
            }else{
                $data =null;
                $data1 = null;
            }
                //echo $data;die();
		?>
        <script>
           
            var buyerData = {
					
                    labels : [<?php if(isset($data1)){ echo $data1;}?>],
                    datasets : [
                    		{
                                    fillColor : "rgba(172,194,132,0.4)",
                                    strokeColor : "#ACC26D",
                                    pointColor : "#fff",
                                    pointStrokeColor : "#9DB86D",
                                    data : [<?php if(isset($data)){ echo $data;} ?>]
                            }
                    ]
            }
            var buyers = document.getElementById('buyers').getContext('2d');
            new Chart(buyers).Line(buyerData);

        </script>
        
                

