          
            <header class="header">
            <section class="container-1">
                <section style="width:100%" class="row">
                    <section style="margin-right:170px; width: 100%;" class="header-top col-sm-8 pull-right">
                    	<section class="col-sm-11">
                    	<div class=" pull-right">
                        
                        <a href="<?php echo base_url().'ikmc/regulations_examination_room/'.$arg['file_pdf'];?>"><span><?php echo $lang == "vi" ? "HƯỚNG DẪN DỰ THI" : "
EXAMINATION GUIDELINES"?> </span>
                        <img src="img/pdf.png"></a>
                        <a href="<?php echo base_url().'ikmc/faqs';?>"><span>FAQs</span></a>
                        <a href="<?php echo $arg['link_facebook']?>"><img width="25px" height="20px" src="img/facebook.png" /></a>
                        <a href="<?php echo $arg['link_youtube']?>"><img width="25px" height="20px" src="img/youtube.png" /></a>
                        
                        </div>
                        </section>
                        <div class="col-sm-1">
                        	<div style="margin-top:5px; margin-left:-25px;" class="pull-left">
                        	<img src="img/Anh.png" style="margin-bottom: 1px;" id="en"><br />
                            <img src="img/vn.png" id="vi">
                            </div>
                        </div>
                    </section>
                 </section>   
                 </section>
                
                
                <section class="header-content">
                    <section class="container-1">
                    <figure style="margin-top:-1px; left:100px;" class="col-sm-2">
                        <a href="http://kangaroo-math.vn/ikmc"><img src="img/logo.png"></a>
                    
                    </figure><!--End logo-->
                
                   
                    
                    <nav class="nav navbar navbar-default clearfix col-sm-9 pull-right">
                        <div class="container-fluid">
						<img data-toggle="modal" data-target="#demo" style="z-index: 10000;position:fixed; right:0px; bottom:0px;" src="img/<?php echo $lang;?>_dangkyduthi.png">
                        <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav nav-item">
                        		<li class="dropdown" >
                                    <a href="<?php echo base_url().'ikmc'?>#ikmc" role="button" >IKMC</a>

                                </li>

                                <li class="dropdown" >
                                    <a href="<?php echo base_url().'ikmc_practice/login'?>" role="button" ><?php echo $lang == "vi" ? "LÀM BÀI THI THỬ" : "PRACTICE"?></a>

                                </li>
                            </ul>
                            <ul class="nav navbar-nav nav-item">
                                
                                <li class="dropdown">
                                    <a href="<?php echo base_url().'ikmc'?>#traihe"><?php echo $lang == "vi" ? "TRẠI HÈ TOÁN HỌC" : "SUMMER CAMP"?></a>
                                    
                                </li>
                            </ul>

                            <ul class="nav navbar-nav nav-item">

                                <li class="dropdown">
                                    <a href="<?php echo base_url().'ikmc/search_infomation_contestants'?>"><?php echo $lang == "vi" ? "TRA CỨU PHÒNG THI" : "
SEARCH EXAMINATION ROOM"?></span></a>
                                    
                                </li>
                            </ul>

                            <ul class="nav navbar-nav nav-item">

                                <li class="dropdown">
                                    <a href="<?php echo base_url().'ikmc'?>#bantochuc"><?php echo $lang == "vi" ? "BAN TỔ CHỨC" : "
ORGANIZERS"?></a>
                                </li>
                            </ul>	


                        </div>
                    </div>
                </nav>
                </section>
                </section>
                <input hidden="" id="language" value="<?php echo $lang;?>"/>
            </header><!---End .Header-->