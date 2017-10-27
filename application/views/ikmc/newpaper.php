<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <?php $this->load->view("ikmc/commons/header_tag");?>
      </head>
        <body>
    
        <section class="container">
        	 <?php $this->load->view("ikmc/notice");?>      
            <?php $this->load->view("ikmc/commons/header_all");?>
            <section class="content" id="content">
                <?php $this->load->view("ikmc/commons/banner");?>
                
                
                
                <section class="news-amc clearfix">
					<section style="" class="container-1">
                    	<section class="col-sm-6 col-md-6 col-xs-12 newpaper">
                        	<section style="background:#FFF;" class="row">
                            	<h3 class="text-center">Góc báo chí</h3>
                                <?php
                                	if(isset($newpaper_max) && count($newpaper_max) > 0){
								?>
                                <div class="col-sm-12">
                                	<a href="<?php echo base_url().'ikmc/news_detail/'.$newpaper_max['id'];?>"><img style="margin:0 auto;" width="100%" height="370px" src="img/newspapers_information/<?php echo $newpaper_max['img']?>" class="img-responsive thumbnail" /></a>
                                    <div class="newspaper-intro">
                                        <a href="<?php echo base_url().'ikmc/news_detail/'.$newpaper_max['id'];?>"><span class="newspaper-title"><?php echo $lang == 'vi' ? $newpaper_max['vi_title'] : $newpaper_max['en_title'];?></span></a><br />
                                        <span><?php echo $lang == 'vi' ? $newpaper_max['vi_content_short'] : $newpaper_max['en_content_short'];?></span>
                                    </div>
                                </div>
                                <?php
									}else{
								?>
                                <h3>Bài viết đang cập nhật</h3>
                                <?php
                                	}
								?>
                            </section>
                            <section style="background:#fff;" class="row newpaper-listitem">
                            	
                                
                                <?php
                                	if(isset($list_newpaper) && count($list_newpaper) > 0){
										foreach($list_newpaper as $item){
								?>
                                
                                 <section class="newpaper-item col-sm-12">
                                	<section class="col-sm-4">
                                    	<a href="<?php echo base_url().'ikmc/news_detail/'.$item['id'];?>"><img src="img/newspapers_information/<?php echo $item['img'];?>" class="img-responsive"/></a>
                                    </section><!--item-img-->
                                    <section class="col-sm-8 item-content">
                                    	<a href="<?php echo base_url().'ikmc/news_detail/'.$item['id'];?>"><span class="newspaper-title"><?php echo $lang == 'vi' ? $item['vi_title'] : $item['en_title'];?></span></a><br />
                                        <span><?php echo $lang == 'vi' ? $item['vi_content_short'] : $item['en_content_short'];?></span>
                                    </section>
                                </section><!--End newpaper-item-->
                                <?php
										}
										}else{
								?>
                                	<h2>Bài viết đang cập nhật</h2>
                                <?php
									}
								?>
                            </section>
                        </section><!--End goc bao tri-->
                        <section class="col-sm-6 col-md-6 col-xs-12 newpaper">
                        	<section style="background:#FFF;" class="row">
                            	<h3 class="text-center">Góc tin tức IKMC</h3>
                                <?php
                                	if(isset($news_max) && count($news_max) > 0){
								?>
                                <div class="col-sm-12">
                                	<a href="<?php echo base_url().'ikmc/news_detail/'.$news_max['id'];?>"><img style="margin:0 auto;" width="100%" height="370px" src="img/newspapers_information/<?php echo $news_max['img']?>"/></a>
                                    <div class="newspaper-intro">
                                        <a href="<?php echo base_url().'ikmc/news_detail/'.$news_max['id'];?>"><span class="newspaper-title"><?php echo $lang == 'vi' ? $news_max['vi_title'] : $news_max['en_title'];?></span></a><br />
                                        <span><?php echo $lang == 'vi' ? $news_max['vi_content_short'] : $news_max['en_content_short'];?></span>
                                    </div>
                                </div>
                                <?php
									}else{
								?>
                                <h3>Bài viết đang cập nhật</h3>
                                <?php
                                	}
								?>
                            </section>
                            <section style="background:#fff;" class="row newpaper-listitem">
                            	
                                
                               <?php
                                	if(isset($list_news) && count($list_news) > 0){
										foreach($list_news as $item){
								?>
                                
                                 <section class="newpaper-item col-sm-12">
                                	<section class="col-sm-4">
                                    	<a href="<?php echo base_url().'ikmc/news_detail/'.$item['id'];?>"><img src="img/newspapers_information/<?php echo $item['img'];?>" class="img-responsive"/></a>
                                    </section><!--item-img-->
                                    <section class="col-sm-8 item-content">
                                    	<a href="<?php echo base_url().'ikmc/news_detail/'.$item['id'];?>"><span class="newspaper-title"><?php echo $lang == 'vi' ? $item['vi_title'] : $item['en_title'];?></span></a><br />
                                        <span><?php echo $lang == 'vi' ? $item['vi_content_short'] : $item['en_content_short'];?></span>
                                    </section>
                                </section><!--End newpaper-item-->
                                <?php
										}
										}else{
								?>
                                	<h2>Bài viết đang cập nhật</h2>
                                <?php
									}
								?>
                                
                                
                                
                                
                            </section>
                        </section><!--End goc Tin tuc-->
                    </section>
				</section><!--End TinTuc-Amc-->
				
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <?php $this->load->view("ikmc/competition_address");?>
                <?php $this->load->view("ikmc/commons/organizers");?>
                <?php $this->load->view("ikmc/commons/footer_all");?>
            </section>
        </section>
           
            <?php $this->load->view("ikmc/register");?>
            
           
       
    </body>
   
</html>
