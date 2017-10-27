                            <?php
                            $count =1;
                                foreach($list_year as $year)
                                {
                                    if($year['year'] !="" || $year['year'] != null){
                            ?>
                                
                                      
                                    <?php
                                     // if($usertype == "0" && $count>1 &&$userschool!="grade2dtdschool"){ ?>
                                       <!-- <div class="test-unregistered-item col-sm-4" onclick="showUnregisteredMessage();"> -->
                                    <!-- <h2><?php //echo $year['year'];?></h2> -->
                                     <!-- </div> -->
                                    <?php //}else
                                     // if($usertype=="0" && $userschool=="grade2dtdschool"&&$grade==1){ ?>
                                       <!-- <div class="test-item col-sm-4" onclick="go_doing(<?php //echo $year['year'];?>);">
                                       
                                         <h2><?php //echo $year['year'];?></h2>
                                          </div> -->
                                  <?php  //}else{ ?>

                                    
                               <div class="test-item col-sm-4" onclick="go_doing(<?php echo $year['year'];?>);">
                                       
                                         <h2><?php echo $year['year'];?></h2>
                                          </div>
                            <?php
                            //}
                                
                                 $count++;  }

                                }
                            ?>
