
    <table class="table ">
        <tr>
            <th class="text-center">STT</th>
            <th class="text-center">ID</th>
            <th class="text-center">Họ và tên</th>
            <th class="text-center">Level</th>
            <th class="text-center">Điểm</th>
            <th class="text-center">Bước nhảy</th>
            <th class="text-center">Thời gian bắt đầu</th>
            <th class="text-center">Thời gian kết thúc</th>
        </tr>
        
        <?php for($index = 0;  $index < count($historys); $index++):?>
            <?php $obj = $historys[$index];?>
            <tr>
                <td><?php echo $index + 1;?></td>
                <td><?php echo $obj->iduser;?></td>
                <td><?php echo $obj->fullname;?></td>
                <td><?php echo $obj->level;?></td>
                <td><?php echo $obj->score;?></td>
                <td><?php echo $obj->jump_length;?></td>
                <td><?php echo $obj->time_begin;?></td>
                <td><?php echo $obj->time_end;?></td>
            </tr>
        <?php endfor;?>
        
    </table>
