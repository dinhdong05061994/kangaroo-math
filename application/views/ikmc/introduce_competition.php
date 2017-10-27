               <a href="#" name="ikmc"></a>
                <section class="clearfix intro vietnam">
                	<section class="container-1">
                    	<section  style="" class="intro-content col-sm-7">
                        	<img class="ikmc-vietnam" width="170px" height="30px;" src="img/<?php echo $lang?>_vietnam.png">
                            <img class="ikmc-quocte" width="170px" height="30px;" src="img/<?php echo $lang?>_quocte.png">
                          
                           <h3>1.<?php echo ($lang == "vi") ? "GIỚI THIỆU" : "INTRODUCE";?></h3>
                            <div style="height:400px; overflow:auto; overflow-x:hidden; margin-bottom: 30px;" class="parent">
                    			<div style="top:0px;" class="scrollbar"></div>
                            		<section class="scrollable">
                                    <div  style="text-align:justify; padding-left:15px; padding-right:45px; font-size: 12pt!important;" class="row">
                                        
                                        <?php echo $arg[$lang.'_introduce_competition'];?>
                                        
                                    </div>
                           </section>
                           </div>
                            
                        </section>
                    </section>
                </section><!--End .intro-->
                <script>
				
				
				
                	$(document).ready(function(e) {
                                    $('.ikmc-vietnam').click(function(e) {
                                        $('.vietnam').show();
										$('.quocte').hide();
                                    });
									$('.ikmc-quocte').click(function(e) {
                                        $('.quocte').show();
										$('.vietnam').hide();
                                    });
                                });
                </script>
                
                <section  hidden="" class="clearfix intro quocte">
                	<section class="container-1">
                    	<section  style="" class="intro-content col-sm-7">
                        	<img class="ikmc-vietnam" width="170px" height="30px;" src="img/<?php echo $lang?>_vietnam.png">
                            <img class="ikmc-quocte" width="170px" height="30px;" src="img/<?php echo $lang?>_quocte.png">
                          
                           <h3>1.<?php echo ($lang == "vi") ? "GIỚI THIỆU" : "INTRODUCE";?></h3>
                            	
                                    <section class="parent" style="overflow:auto; height:400px; width:90%; padding-bottom:50px;">
                                        <?php echo $arg[$lang.'_introduce_competition_international'];?>
                                    </section>
                                    
                          
                        </section>
                    </section>
                </section><!---End .intro--->