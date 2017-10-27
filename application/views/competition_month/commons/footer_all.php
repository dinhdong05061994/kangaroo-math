                <section class="guiyeucau container">
                    <section class="container-1">
                        <section class="col-sm-6">
                            <h3><?php echo $lang == "vi" ? "GỬI YÊU CẦU VỀ BAN TỔ CHỨC" : "SEND YOUR REQUEST TO ORGANIZERS"?></h3>
                                 <form role="form">
                                <div class="form-group">
                                  
                                   <input id="fullname" type="text" class="form-control" placeholder="<?php echo $lang == "vi" ? "Họ và tên" : "Fullname"?>" >
                                   <p id = "er_fullname" style = "color: #eee;"></p>
                                </div>
                                
                                <div style="margin-left:-15px;" class="form-group col-sm-6">
                                   
                                   <input  id="email_require" type="email" class="form-control" placeholder="Email">
                                  <p id = "er_email_require" style = "color: #eee;"></p>
                                </div>
                                <div style="right:-30px;" class="form-group col-sm-6">
                                   
                                 <input id="phone_require" type="number" class="form-control" placeholder="<?php echo $lang == "vi" ? "Số điện thoại" : "Phone numbers"?>">
                                  <p id = "er_phone_require" style = "color: #eee;"></p>
                                </div>
                                 <div class="form-group">
                                 
                                  <textarea id="content_require" class="form-control" rows="5" placeholder="<?php echo $lang == "vi" ? "Nhập nội dung" : "Content"?>"></textarea>
                                  <p id = "er_content_require" style = "color: #eee;"></p>
                                </div>
                                <button id="button_send_require" type="button" class="btn btn-default">
                                    <?php echo $lang == "vi" ? "GỬI ĐI" : "SEND"?>
                                </button>
                                <button type="reset" id = "resetrequire" class="btn btn-default">
                                    <?php echo $lang == "vi" ? "SOẠN LẠI" : "RESET FORM"?>
                                </button>
                              </form>
                        </section>
                        <section class="col-sm-6">
                            <h3 class="tt-bantochuc"><?php echo $lang == "vi" ? "THÔNG TIN BAN TỔ CHỨC" : "ORGANIZERS IMFORMATION"?></h3>
                              <?php echo $arg['contact'];?>
                        </section>
                    </section>
                </section>
              