<style type="text/css">
    .header-content .nav .navbar-collapse ul a {
        line-height: 18px;
        color: #5c2161;
        font-size: 12pt;
    }
    .header-content .nav .navbar-collapse ul li{
        font-size: 12pt;
    }
    .header-content .nav .navbar-collapse ul li:hover{
        background: #ecebec;
        font-size: 10pt;
    }
    body{
        background: none;
    }
</style> 
            <header class="header">
            <section class="container" style="background: #5c2161;">
                <section style="width:100%" class="row">
                    <section style="margin-right:170px; width: 100%;" class="header-top col-sm-8 pull-right">
                    	<section class="col-sm-11">
                    	<div class=" pull-right">      
                        <a href="<?php echo base_url().'ikmc/faqs';?>"><span style="color: white;">FAQs</span></a>
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
                <center>
                    <a href="http://kangaroo-math.vn/ikmc"><img src="images/entertainment/logo_white.jpg" width="230px"></a>
                </center>   
               
                <section class="header-content" style="background: #fff;border-bottom: 2px solid #5c2161;    height: 50px;">
                    <section class="container">
                    <nav class="nav navbar navbar-default clearfix col-sm-10 pull-right" >
                        <div class="container-fluid">
						
                        <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav nav-item">
                        		<li class="dropdown">
                                    <a href="<?php echo base_url().'ikmc'?>#ikmc" role="button" >IKMC</a>

                                </li>

                               
                            </ul>
                            <ul style="margin-left:20px;" class="nav navbar-nav nav-item">
                                
                                <li class="dropdown">
                                    <a href="<?php echo base_url().'summer/ikmc_detail_user'?>"><?php echo $lang == "vi" ? "CÂU LẠC BỘ KMOC" : "SUMMER CAMP"?></a>
                                    
                                </li>
                            </ul>


                            <ul style="margin-left:20px;" class="nav navbar-nav nav-item">

                                <li class="dropdown">
                                    <a href="<?php echo base_url().'ikmc'?>#bantochuc"><?php echo $lang == "vi" ? "BAN TỔ CHỨC" : "
ORGANIZERS"?></a>
                                </li>
                            </ul>
                            <ul hidden="" class="nav navbar-nav nav-item">

                                <li class="dropdown">
                                    <a href="<?php echo base_url().'ikmc/newpaper'?>"><?php echo $lang == "vi" ? "TIN TỨC IKMC" : "NEWS IKMC"?></a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav nav-item account">
                            <?php 
                            $userdata = $this->session->all_userdata();   
                            if(isset($userdata['id'])){                
                            if($userdata['id'] === null || $userdata['id'] === ""){  ?>
                                <li>
                                    <a href="<?php echo base_url().'summer/login'?>"><?php echo $lang == "vi" ? "ĐĂNG NHẬP / ĐĂNG KÝ" : "LOG IN / SIGNUP";?></a>
                                </li>
                               <?php }else{ ?>
                                 <li>
                                    <a><?php echo $userdata['fullname']?></a>
                                </li>

                               <?php } ?>
                                
                            </ul>	
                            <?php if($userdata['id'] !== null || $userdata['id'] !== ""){  ?>
                            <ul class="nav navbar-nav nav-item account">
                                 <li>
                                    <a href="<?php echo base_url(); ?>user_controller/logout">Logout</a>
                                </li>
                            </ul>
                             <?php }}else{ ?>
                                 <ul class="nav navbar-nav nav-item account">
                                     <li>
                                    <a href="<?php echo base_url().'summer/login'?>"><?php echo $lang == "vi" ? "ĐĂNG NHẬP / ĐĂNG KÝ" : "LOG IN"?></a>
                                </li>
                                </ul>
                              <?php  }  ?>

                        </div>
                    </div>
                </nav>
                </section>
                </section>
                <input hidden="" id="language" value="<?php echo $lang;?>"/>

            </header><!---End .Header-->
