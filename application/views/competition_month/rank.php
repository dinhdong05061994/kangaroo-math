<div style="background: #642e67; border-radius: 10px; font-size: 14pt; color: white; padding: 10px;" >
    <h1><?=$lang=="en" ? "Top 10 longest jump grade ":"Top 10 bạn có bước nhảy dài nhất lớp ";?> <?=$level==1 ? "1-2" :($level==2 ? "3-4" :($level==3 ? "5-6" :($level==4 ? "7-8" :$level)))?></h1>
    <table class="table ">
        <tr>
            <th class="text-center"><?=$lang=="en" ? "Order": 'STT';?></th>
            <th class="text-center"><?=$lang=="en" ? "Full name" : "Họ và tên";?></th>
            <th class="text-center"><?=$lang=="en" ? "Province" : "Tỉnh/Thành phố";?></th>
            <th class="text-center"><?=$lang=="en" ?'Length of jump':'Độ dài bước nhảy';?></th>
        </tr>
        
        <?php for($index = 0; $index < 10 && $index < count($top_jump); $index++):?>
            <?php $obj = $top_jump[$index];?>
            <tr <?php echo $obj->iduser == $iduser ? "class='myself'":""?>>
                <td><?php echo $obj->position;?></td>
                <td><?php echo $obj->fullname;?></td>
                <td><?php echo $obj->province_name;?></td>
                <td><?php echo $obj->jump_length;?></td>
                
            </tr>
        <?php endfor;?>
        
    </table>
    
</div>
<div style="margin-top: 20px; background: #642e67; border-radius: 10px; font-size: 14pt; color: white; padding: 10px;">
    <h1><?=$lang=="en" ? "Top 50 highest scores grade ":'Top 50 bạn điểm cao nhất lớp ';?><?=$level==1 ? "1-2" :($level==2 ? "3-4" :($level==3 ? "5-6" :($level==4 ? "7-8" :$level)))?></h1>
    <table class="table ">
        <tr>
            <th class="text-center"><?=$lang=="en" ? "Order": 'STT';?></th>
            <th class="text-center"><?=$lang=="en" ? "Full name" : "Họ và tên";?></th>
            <th class="text-center"><?=$lang=="en" ? "Province" : "Tỉnh/Thành phố";?></th>
            <th class="text-center"><?=$lang=="en" ? "Score" : 'Điểm';?></th>
            <th class="text-center"><?=$lang=="en" ? 'Total time' :'Tổng thời gian làm bài';?></th>
        </tr>
        
        <?php for($index = 0; $index < 50 && $index < count($ranks); $index++):?>
            <?php $obj = $ranks[$index];?>
            <tr <?php echo $obj->iduser == $iduser ? "class='myself'":""?>>
                <td><?php echo $obj->position;?></td>
                <td><?php echo $obj->fullname;?></td>
                 <td><?php echo $obj->province_name;?></td>
                <td><?php echo $obj->score;?></td>
                <td><?php echo $obj->sub_time;?></td>
            </tr>
        <?php endfor;?>
        <?php for($index = 50; $index < count($ranks); $index++):?>
            <?php $obj = $ranks[$index];?>
            <?php if($obj->iduser == $iduser):?>
                <tr class='myself'>
                    <td><?php echo $obj->position;?></td>
                    <td><?php echo $obj->fullname;?></td>
                     <td><?php echo $obj->province_name;?></td>
                    <td><?php echo $obj->score;?></td>
                    <td><?php echo $obj->sub_time;?></td>
                </tr>
            <?php endif;?>
        <?php endfor;?>
    </table>
</div>