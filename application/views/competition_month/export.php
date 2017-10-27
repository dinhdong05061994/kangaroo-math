<?php
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=data.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
<head>
<meta charset="utf-8" />
</head>
    
<body>
<p>Tổng: <?php echo count($lists);?></p>
 <table border=1>

    
        <?php foreach ($lists as $row){ 

            ?>
        <tr>
        
           <?php foreach ($row as $one){
           
            ?>
            <td>
                <?php echo $one;?>
            </td>
           <?php } ?>
        </tr>
        <?php } ?>
     
</table>   
</body>
 