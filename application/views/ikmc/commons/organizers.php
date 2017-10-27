<!--                 <a href="#" name="bantochuc"></a>
                <section style="background:#FFF;" class="bantochuc container">
                
                    <section class="container-1">
                        <section class="col-sm-6 pull-right">
                        <h4><?php echo $lang == "vi" ? "ĐƠN VỊ TÀI TRỢ" : "DONORS"?></h4>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                        <?php
                                            foreach($list_donors as $donors)
                                            {
                                        ?>
                                            <th><img src="img/organizers_donors/<?php echo $donors['logo'];?>"></th>
                                        <?php
                                            }
                                        ?>
                                        </tr>
                                    </tbody>
                                </table>
                        </section>
                        <section class="col-sm-6 pull-left">
                        <h4 class="pull-right"><?php echo $lang == "vi" ? "ĐƠN VỊ TỔ CHỨC" : "ORGANIZERS"?></h4>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                        <?php
                                            foreach($list_organizers as $organizers)
                                            {
                                        ?>
                                            <th><img src="img/organizers_donors/<?php echo $organizers['logo'];?>"></th>
                                        <?php
                                            }
                                        ?>
                                        </tr>
                                    </tbody>
                                </table>
                        </section>
                    </section>
                </section>--><!--End .bantochuc--> 
