                <section class="diadiem clearfix">
                    <section class="container-1 diadiem-content">
                        <section>
                            <img width="170px" height="30px;" src="img/<?php echo $lang;?>_diadiemthi.png">
                        </section>
                        <section class="clearfix">
                            <section class="col-sm-4">
                                <h4><?php echo $lang == "vi" ? "HÀ NỘI" : "HANOI"?></h4>
                                <?php
                                    for($i = 0; $i < count($list_address); $i++)
                                    {
                                        if($list_address[$i]['province'] == 1){
                                ?>
                                <i class="glyphicon glyphicon-map-marker"></i><?php echo $list_address[$i][$lang.'_name_address'];?> <a id="school_<?php echo $i+1;?>">(<?php echo $lang == "vi" ? "Chỉ đường" : "Move"?>)</a><br />
                                <input hidden="" id="longitude_<?php echo $i+1;?>" value="<?php echo $list_address[$i]['longitude'];?>"></input>
                                <input hidden="" id="latitude_<?php echo $i+1;?>" value="<?php echo $list_address[$i]['latitude'];?>"></input>
                                <span><?php echo $lang == "vi" ? "Địa chỉ: " : "Address:"?><?php echo $list_address[$i][$lang.'_address'];?> </span><br />
                                <?php
                                        }
                                    }
                                ?>
                                <h4><?php echo $lang == "vi" ? "TP.HỒ CHÍ MINH" : "HO CHI MINH"?></h4>
                               <?php
                                    for($i = 0; $i < count($list_address); $i++)
                                    {
                                        if($list_address[$i]['province'] == 2){
                                ?>
                                <i class="glyphicon glyphicon-map-marker"></i><?php echo $list_address[$i][$lang.'_name_address'];?> <a id="school_<?php echo $i+1;?>">(<?php echo $lang == "vi" ? "Chỉ đường" : "Move"?>)</a><br />
                                <input hidden="" id="longitude_<?php echo $i+1;?>" value="<?php echo $list_address[$i]['longitude'];?>"></input>
                                <input hidden="" id="latitude_<?php echo $i+1;?>" value="<?php echo $list_address[$i]['latitude'];?>"></input>
                                <span><?php echo $lang == "vi" ? "Địa chỉ" : "Address"?>: <?php echo $list_address[$i][$lang.'_address'];?> </span><br />
                                <?php
                                        }
                                    }
                                ?>

                                <hr width="80%" style="text-align:center;" />
                                <h4>Hotline: 0916 688208</h4>
                            </section>
                            <section class="col-sm-8">
                                <div id="map_canvas"></div>
                            </section>
                        </section>
                    </section>
                </section><!---End .diadiem-->