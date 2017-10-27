<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.js"></script>
<script src="<?php echo base_url(); ?>assets/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>assets/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>assets/input-mask/jquery.inputmask.extensions.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#birthday").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
     $("[data-mask]").inputmask();
  });
</script>
<section class="main-content-lt container-fluid container-1">

    <section class="col-sm-6">
        <section>
            <?php echo $lang == "en" ? '<a class="btn" style="background: purple; border-radius: 0;color: #fff; text-transform: uppercase;font-weight: bold;">Practive</a>' :'<img width="172px" height="32px" src="img/traihe.png" />';?>
        </section>

        <section class="col-sm-10 main-content-right clearfix">
            <ul>
		<li style="list-style:none;<?=$total_question_monthly <=0 ? 'background: #ccc;padding: 3px;':'';?>"><img width="35px" height="35px;" src="img/tt.png" /><a <?=$total_question_monthly <=0 ? 'onclick="return false;" style="text-decoration: none;cursor: not-allowed;"':'';?> href="<?php echo base_url() . 'competition_month' ?>"><?php echo $lang=="en" ? 'June exam' : 'Bài thi tháng 6';?></a><?=$total_question_monthly <=0 ? ' <i>(coming soon)</i>':'';?></li>
                 <li style="margin-left:35px;"><a href="<?php echo base_url() . 'competition_month/rank' ?>"><?php echo $lang=="en" ? 'See rankings in January exams' : 'Xem bảng xếp hạng kỳ thi tháng';?></a></li>
                <li style="margin-left:35px;<?=$total_question_week <=0 ? 'background: #ccc;padding: 3px;':'';?>"><a <?=$total_question_week <=0 ? 'onclick="return false;" style="text-decoration: none;cursor: not-allowed;"':'';?> href="<?php echo base_url() . 'summer/choose' ?>"><?php echo $lang=="en" ? 'Weekly Challenge' : 'Thử thách hàng tuần';?></a><?=$total_question_week <=0 ? ' <i>(coming soon)</i>':'';?></li>
                <li style="margin-left:35px;<?=$total_question_optional <=0 ? 'background: #ccc;padding: 3px;':'';?>"><a <?=$total_question_optional <=0 ? 'onclick="return false;" style="text-decoration: none;cursor: not-allowed;"':'';?> href="<?php //echo base_url(); ?>ikmc_practice"><?php echo $lang=="en" ? 'Optional exam' : 'Bài thi tự chọn';?></a><?=$total_question_optional <=0 ? ' <i>(coming soon)</i>':'';?></li>
               <!-- <li style="margin-left:35px;"><a class="unregistered_lecture_item">Bài thi tự chọn (coming soon)</a></li> -->
                <li style="margin-left:35px;<?=$total_question_year <=0 ? 'background: #ccc;padding: 3px;':'';?>"><a <?=$total_question_year <=0 ? 'onclick="return false;" style="text-decoration: none;cursor: not-allowed;"':'';?> href="<?php base_url() . 'ikmc_practice' ?>passedpapers"><?php echo $lang=="en" ? 'The test of the year' : 'Bài thi các năm';?></a><?=$total_question_year <=0 ? ' <i>(coming soon)</i>':'';?></li>
                 
                 

            </ul>
        </section>
    </section><!--End content-main-right-->

    <section class="col-sm-6">
        <section class="col-sm-10 img-member">
            <section class="col-sm-3">
                <!-- <img width="70px" height="70px" class="img-circle text-center" src="img/untitled.png" /> -->
            </section>
            <section class="col-sm-9">
                <div class="form-group">
                    <label for="usr"><?php echo $lang=="en" ? 'Full name' : 'Họ Và Tên';?></label>
                    <div class="form-control" id="usr"><?php echo $user_information['fullname']; ?></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="pwd"><?php echo $lang=="en" ? 'Birthday' : 'Ngày Sinh';?></label>
                        <div  class="form-control" id="pwd"><?php echo $user_information['birthday']; ?></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="level"><?php echo $lang=="en" ? 'Grade' : 'Lớp';?></label>
                        <div  class="form-control" id="level"><?=$user_information['level']==1 ? "1-2" : ($user_information['level']==2 ? "3-4" : ($user_information['level']==3 ? "5-6" : ($user_information['level']==4 ? "7-8" : ($user_information['level']))))?></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="pwd"><?php echo $lang=="en" ? 'Cumulative score' : 'Điểm tích lũy';?></label>
                        <div class="form-control" id="scorese"><?php echo $total_score;?></div>
                    </div>
                    <div class="col-sm-6">
                        <label for="pwd"><?php echo $lang=="en" ? 'Score of the day' : 'Điểm trong ngày';?></label>
                        <div class="form-control" id="scores_day"><?php echo $score_by_day;?> </div>
                        <!-- $score_by_day.'/'.$max_score_by_day -->
                        
                    </div>
                </div>
            </section>
            <button type="button" style="padding: 5px;margin: 10px;margin-left: 135px;" class="btn-lg btn-md btn-sm btn-xs col-lg-6 col-xs-6 col-sm-6  col-md-6" id="btn_change_infor" data-toggle='modal' data-target="#change_infor"><b><?php echo $lang=="en" ? 'Change information' : 'Thay đổi thông tin cá nhân';?></b></button>
            <?php if($user_information['status']!=1){ ?>
             <button type="button" style="padding: 5px;margin: 0px;margin-left: 135px;" class="btn-lg btn-danger btn-md btn-sm btn-xs col-lg-6 col-xs-6 col-sm-6  col-md-6" id="btn_one_notification" data-toggle="modal" data-target="#demo"><b><?php echo $lang=="en" ? 'Upgrade account' : 'Nâng cấp tài khoản';?></b></button>
              <?php  } ?>
           

        </section>
    </section><!--End content-main-left-->
</section><!--End luyen thi-->

<section style="margin-bottom:235px;" class="main-content-lt container-fluid container-1">
    <section class="col-sm-6">
        <section>
            <?php echo $lang == "en" ? '<a class="btn" style="background: purple; border-radius: 0;color: #fff; text-transform: uppercase;font-weight: bold;">Lectures</a>' :'<img width="172px" height="32px" src="img/baigiang.png" />';?>
        </section>
        <section class="col-sm-10 main-content-right clearfix">
            <ul>
                <?php foreach ($list_class as $item): ?>
                    <li style="<?=$total_lecture[$item['id']] <=0 ? "background: #ccc;    padding: 3px;" : "";?>"><a href="<?=$total_lecture[$item['id']] >0 ? base_url() . 'summer/lecture/' . $item['id'] :'';?>" <?=$total_lecture[$item['id']] <=0 ? 'onclick="return false;" style="text-decoration: none;cursor: not-allowed;"':'';?>><?php echo $lang == "en" ? ($item['id'] == 1 ? "Grade 1-2" : ($item['id'] == 4 ? "Grade 3-4" : ($item['id'] == 5 ? "Grade 5-6" : ($item['id'] == 6 ? "Grade 7-8" : $item['name'])))): $item['name']; ?></a> <?=$total_lecture[$item['id']] <=0 ? "<i>(coming soon)</i>" : "";?></li>
                <?php endforeach; ?>

            </ul>
        </section>
    </section><!--End content-main-right-->

    <section class="col-sm-6">
        <section class="col-sm-12 img-member bieudo">
            <section  class="col-sm-12 text-center img-member-title">
                <h4><?php echo $lang=="en" ? 'CHART OF SCORE 7 DAYS' : 'BIỂU ĐỒ ĐIỂM 7 NGÀY GẦN NHẤT';?></h4>
            </section>
            <section id="chart" class="col-sm-12">

            </section>
        </section>
        <script>
             $(document).ready(function(index){
               chart();
               
            });
            function chart() {                    
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>summer/chart_line_all",
                            data: {},
                            cache: false,
                            success: function(html) {
                                //console.log(html);
                                $("#chart").html(html);

                            }

                        });
                    }
        </script>

    </section><!--End content-main-left-->
    <section class="col-sm-6 col-sm-offset-6" style="margin-top: 20px;">
        <section class="col-sm-12 img-member bieudo">
            <section  class="col-sm-12 text-center img-member-title">
                <h4><?php echo $lang=="en" ? 'STANDINGS GRADE' : 'BẢNG XẾP HẠNG LỚP';?> <?=$user_information['level']==1 ? "1-2" : ($user_information['level']==2 ? "3-4" : ($user_information['level']==3 ? "5-6" : ($user_information['level']==4 ? "7-8" : ($user_information['level']))))?></h4>
            </section>
            <section class="col-sm-12" style="font-size: 12pt;">
                <ol>
                    <?php
                   // $i = 0;
                    if(isset($arr_rank) && count($arr_rank) > 0){
                        foreach ($arr_rank as $key => $val_member) {
                            //$i++;
                    ?>
                        <li>
                            <?=($val_member->fullname ) ;?><i> (<?=($val_member->province_name ) ;?>)</i><b style="float: right; padding-right: 30px;"><?=($val_member->current_total_score ) ;?></b></li>

                    <?php       
                        }
                    }else{
                    ?>
                        <center style="font-size: 12pt; color: #eee;"><?php echo $lang=="en" ? "No data" :'Chưa có dữ liệu bảng xếp hạng';?></center>
                    <?php
                    }
                    ?>

                </ol>
            </section>
        </section>
    </section>
</section>
<!-- <section style="margin-bottom:50px;" class="main-content-lt container-fluid container-1">

    <?php //$this->load->view("ikmc/commons/col_news", isset($add_data['user'])) ? $add_data['user'] : NULL; ?>
</section> -->
<!--Bang xep hang-->

<!--End rank -->






<!-- <section hidden class="main-content-lt container-fluid container-1">
    <section class="col-sm-6">
        <section>
            <img width="172px" height="32px" src="img/traihe.png" />
        </section>
        <section class="col-sm-10 main-content-right clearfix">
            <ul>
                <li><a href="#">Tư vấn chọn bài thi</a></li>
                <li><a href="#">Tư vấn cách làm bài online</a></li>
                <li><a href="#">Hotline: 0909 0909 09</a></li>
            </ul>
        </section>
    </section>
    <section class="col-sm-6">
        <section class="col-sm-12 img-member bieudo">
            <section  class="col-sm-12 text-center img-member-title">
                <h4>BẢNG XẾP HẠNG</h4>
            </section>
            <section class="col-sm-12">
                <ol>
                    <li><a href="#">Nguyễn Minh Hoàng</a></li>
                    <li><a href="#">Nguyễn Minh Hoàng</a></li>
                    <li><a href="#">Nguyễn Minh Hoàng</a></li>
                    <li><a href="#">Nguyễn Minh Hoàng</a></li>
                    <li><a href="#">Nguyễn Minh Hoàng</a></li>

                </ol>
            </section>
        </section>
    </section>--><!--End content-main-left-->
<!--</section> -->
<!-- <section hidden class="main-content-lt container-fluid container-1">
    <section class="col-sm-6">
        <section>
            <img width="172px" height="32px" src="img/traihe.png" />
        </section>
        <section class="col-sm-10 main-content-right clearfix">
            <ul>
                <li><a href="#">Tạo ra một sân chơi trí tuệ nhắm kích thích , ươm mầm tài năng và đam mê Toán học của các em học sinh</a></li>
                <li><a href="#">-Giup các em có cơ hội luyện tập Toán mọi lúc , mọi nơi</a></li>
                <li><a href="#">-Tạo thêm sân chơi, có thêm nhiều cơ hội luyện tập Toán và tiếp cận với phương pháp học tiên tiến</a></li>
            </ul>
        </section>
    </section>
    <section class="col-sm-6">

    </section>--><!--End content-main-left-->
<!--</section> -->
<?php //$this->load->view("ikmc/commons/col_news",isset($add_data['user'])) ? $add_data['user'] : NULL; ?>
<div class="modal fade" id="change_infor" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change personal information</h4>
            </div>
            <div class="modal-body">
                <p id="content_change_infor">
                <form role="form" method="POST" name="frm_login" id="frm_login" action="<?php echo base_url(); ?>summer/change_infor_user">
                    <p id = "erorr" style="color: red; font-size: 11pt;"></p>
                    <div class="form-group">
                        <label for="change_name">Name</label>
                        <input type="text" class="form-control" id="change_name" name="change_name" value="<?php echo $user_information['fullname']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="current_pwd">Current Password</label>
                        <input type="password" class="form-control" id="current_pwd" name="current_pwd" value="">
                    </div>
                    <div class="form-group">
                        <label for="new_pwd">New Password</label>
                        <input type="password" class="form-control" name="new_pwd" id="new_pwd" value="">
                    </div>
                    <div class="form-group">
                                  <label for="sel"><?php echo $lang == "vi" ? "Cấp độ" : "Level"?></label>
                                  <select name="level" class="form-control" id="level">
                                    <option value="1" <?php if($user_information
                                    ['level']==1){ echo 'selected';} ?>><?php echo $lang == "vi" ? "Lớp 1 - 2" : "Grade 1 - 2"?></option>
                                    <option value="2" <?php if($user_information
                                    ['level']==2){ echo 'selected';} ?>><?php echo $lang == "vi" ? "Lớp 3 - 4" : "Grade 3 - 4"?></option>
                                    <option value="3" <?php if($user_information
                                    ['level']==3){ echo 'selected';} ?>><?php echo $lang == "vi" ? "Lớp 5 - 6" : "Grade 5 - 6"?></option>
                                    <option value="4" <?php if($user_information
                                    ['level']==4){ echo 'selected';} ?>><?php echo $lang == "vi" ? "Lớp 7 - 8" : "Grade 7 - 8"?></option>
                                  </select>
                                </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user_information['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input type="text" class="form-control" name="birthday" id="birthday" value="<?php echo $user_information['birthday']; ?>" data-mask>
                    </div>
                    <div class="form-group">

                        <label for="gender">Gender</label>
                        <select class="form-control" name = "gender" id="gender">
                            <option value="1" <?php $user_information['gender'] == 1 ? 'selected' : '' ?>>Nam</option>
                            <option value="2" <?php $user_information['gender'] == 2 ? 'selected' : '' ?>>Nữ</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="parentsname">Parentsname</label>
                        <input type="text" class="form-control" id="parentsname" name="parentsname" value="<?php echo $user_information['parentsname']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone number</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user_information['phone']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $user_information['address']; ?>">
                    </div>
                    <button type="button" class="btn btn-default" style="width: 49%;" id = "btn_submit" onclick="change_infor_user();">Submit</button>
                </form>

                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="one_notification" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thông báo gần nhất</h4>
            </div>
            <div class="modal-body">
                <div id="content_one_notification" style="font-size: 11pt; overflow-y: auto; min-height: 200px; max-height: 500px;">
                    <?php
                    if (count($list_notif) > 0) {
                        echo $list_notif[0]['content'] . "<br/>";
                    } else {
                        echo "<i>Hiện tại chưa có thông báo nào</i>";
                    }
                    ?>

                </div>
                <button type="button" style="padding: 5px;margin-top: 30px;" class="btn-lg btn-md btn-sm btn-xs col-lg-4 col-xs-4 col-sm-4  col-md-4" id="btn_more_notification" data-toggle='modal' data-target="#more_notification"><b>Xem tất cả thông báo...</b></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="more_notification" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Danh sách Thông báo</h4>
            </div>
            <div class="modal-body">
                <div id="content_more_notification" style="overflow-y: auto; min-height: 200px; max-height: 500px; font-size: 11pt; ">
                    <?php
                    if (count($list_notif) > 0) {
                        $i = 0;
                        foreach ($list_notif as $value) {
                            $i++;
                            echo "<b>Thông báo số " . $i . ": </b>" . $value['content'] . "<br/>";
                        }
                    } else {
                        echo "<i>Hiện tại chưa có thông báo nào</i>";
                    }
                    ?>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script>
// line chart data



                    webshims.setOptions('forms-ext', {types: 'date'});
                    webshims.polyfill('forms forms-ext');
                    webshims.formcfg = {
                        en: {
                            dFormat: '/',
                            dateSigns: '/',
                            patterns: {
                                d: "dd/mm/yy"
                            }
                        }
                    };

                    webshims.activeLang('en');
                    function validateEmail(email) {
                        var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        return re.test(email);
                    }
                    function change_infor_user() {
                        var email = document.getElementById("email").value;
                        var change_name = document.getElementById("change_name").value;
                        var current_pwd = document.getElementById("current_pwd").value;
                        var new_pwd = document.getElementById("new_pwd").value;
                        var phone = document.getElementById("phone").value;
                        var check = true;
                        var erorr = "";
                        if (change_name == "" || change_name == null)
                        {
                            check = false;
                            erorr += "<i>Name</i> không được để trống.</br>";
                        }
                        if (change_name.lastIndexOf("<") != -1 || change_name.lastIndexOf('>') != -1) {
                            erorr = "<i>Name</i> không chứa những giá trị đặc biệt.</br>";
                            check = false;
                        }
                        if (validateEmail(email) == false && email != "") {
                            erorr += "Sai định danh Email.</br>";
                            check = false;
                        }
                        if ((new_pwd != "") && (current_pwd == "")) {
                            check = false;
                            erorr += "Vui lòng nhập <i>Current Password</i> nếu bạn muốn đổi mật khẩu mới. </br>";
                        }
                        if (!phone.match(/^[0-9]+$/) && phone != "") {
                            check = false;
                            erorr += "<i>Phone number</i> chỉ được nhập số.</br>";
                        }
                        if ((phone.length > 12 || phone.length < 9) && phone != "") {
                            check = false;
                            erorr += "<i>Phone number</i> chỉ được nhập từ 9 đến 12 chữ số.</br>";
                        }
                        if (check == true) {
                            document.getElementById('frm_login').submit();
                        } else {
                            document.getElementById('erorr').innerHTML = erorr;
                            window.scrollTo(0, 0);
                            //alert(erorr);
                        }


                    }
</script>
