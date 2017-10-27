                            <?php
                                foreach($list_year as $year)
                                {
                                    
                            ?>
                                <div style="background:url(<?php echo base_url().""?>img/kangaroo/photo.jpg); background-repeat:no-repeat; background-size:100% 100%; height:224px;" class="col-sm-4" onclick="go_doing(<?php echo $year['year'];?>);">
                                	
                                    <h2 style="line-height:224px; font-family:Arial, Helvetica, sans-serif; color:#F09;"><?php echo $year['year'];?></h2>
                                </div><!--End bkt-item-->
                            <?php
                                }
                            ?>