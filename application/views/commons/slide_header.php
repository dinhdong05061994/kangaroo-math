<div class="container">
	 
    	 <section class="slider row col-sm-9">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <!--
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            -->
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php
                                foreach($list_img_slide as $img_slide)
                                {
                                    $i = 1;
                            ?>
                            <div style="max-height:335px;" style="text-align:center" class="item <?php echo $i == 1 ?  "active" : "" ?>">
                                <img width="100%;" class="img-responsive" src="<?php echo base_url();?>img/run_slide/<?php echo $img_slide['img_link'];?>" alt="...">
                                    <div class="carousel-caption">
                                        
                                    </div>
                            </div>
                            <?php
                                    $i++;
                                }
                            ?>
                            <?php
                                if(count($list_img_slide) == 1)
                                {
                            ?>
                            <div style="max-height:335px;" style="text-align:center" class="item">
                                <img width="100%;" class="img-responsive" src="<?php echo base_url();?>img/run_slide/<?php echo $list_img_slide[0]['img_link'];?>" alt="...">
                                    <div class="carousel-caption">
                                        
                                    </div>
                            </div>
                            <?php
                                }
                            ?>
                             <?php
                                if(count($list_img_slide) == 0)
                                {
                            ?>
                            <div style="max-height:335px;" style="text-align:center" class="item active">
                                <img width="100%;" class="img-responsive" src="<?php echo base_url();?>img/kangaroo/3.jpg" alt="...">
                                    <div class="carousel-caption">
                                        ...
                                    </div>
                            </div>
                            <div style="max-height:335px;" class="item">
                                <img width="100%;" class="img-responsive" src="<?php echo base_url();?>img/kangaroo/3.jpg" alt="...">
                                    <div class="carousel-caption">
                                        ...
                                    </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

            </section><!--End .Slider-->
			
                <div style="height:335px; background:#060; color:#fff; width:328px; position:absolute; margin-left:825px; text-align:center;" class="col-sm-3">
                	<h3>Thông Báo</h3><br />
                    <h4>
                    	<?php echo $arg['notification'];?>
                    </h4>
                </div><!--End .thongbao-->
 </div>