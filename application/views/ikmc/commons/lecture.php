<div id="min_lecture"><?php echo $min_lecture?></div>
<section style="margin-bottom: 35px;" class="main-content-lt container-fluid container-1">

    <section class="col-sm-3">
        <section class="col-sm-12 img-member bieudo">
            <section style="background: #5C2161; color: #fff;"  class="col-sm-12 text-center img-member-title">
                <h4><a href="<?php echo base_url().'summer/ikmc_detail_user'?>"><img width="35px" height="35px;" src="img/back_lecture.png"></a> Bài Giảng - <span id="scan"><?php echo $item_lecture['name']; ?></span></h4>
            </section>
            <section style="min-height: 300px; overflow: none;" class="col-sm-12 main-content-right clearfix">
                <ol>

                    <?php 
                    $userdata = $this->session->all_userdata();
                    foreach ($list_lecture as $lecture): 
                        if($userdata['status']<1 && $lecture['status']>0){ ?>


                       

                        <li onclick="showUnregisteredMessage();"><a class="unregistered_lecture_item"><?php echo $lecture['name']; ?></a></li>
                    <?php    }else{    ?>
                    <li <?=(isset($total_para) && $total_para[$lecture['id']] <=0) ? 'style="background: #ccc;padding: 3px;" onclick="return false;"' : 'style="" onclick="get_para('.$lecture["id"].');"';?> ><a <?=(isset($total_para) && $total_para[$lecture['id']] <=0) ? 'style="text-decoration: none; cursor: not-allowed;"':'';?> class="lecture_item"><?php echo $lecture['name']; ?></a><?=(isset($total_para) && $total_para[$lecture['id']] <=0) ? ' <i>(coming soon)</i>':'';?></li>
                   <?php }
                    endforeach; ?>

                </ol>
            </section>
            <script>
                    $(document).ready(function() {
			var min_lecture = document.getElementById("min_lecture").innerHTML;
                        get_para(min_lecture);
                        $(".lecture_item").click(function() {
                            $(this).css({'color': '#014B15'});

                        });
			
                    });
            </script>
        </section>
    </section><!--End content-main-left-->
    <section id="html" class="col-sm-9">


    </section>
</section>

         <div id="showmessage" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thông báo</h4>
      </div>
      <div class="modal-body">
        <p>Nội dùng này chỉ dành cho Full Member. Vui lòng nâng cấp tài khoản để truy cập</p>
      </div>
      <div class="modal-footer">
       <button type="button" style="padding: 5px;margin: 0px;margin-left: 135px;" class="btn btn-danger" data-toggle="modal" data-target="#demo" id="upgrade_account" data-dismiss="modal"><b>Nâng cấp tài khoản</b></button><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--Bang xep hang-->
<script>
    function get_para(id) {

        var url = "";

        var str_string = 'id=' + id;

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/summer/lecture_detail",
            data: str_string,
            cache: false,
            success: function(html) {

                //alert('thanhcong');

                $("#html").html(html);

            }

        });

    }
</script>







<script>
    // line chart data
    var buyerData = {
        labels: ["January", "February", "March", "April", "May", "June"],
        datasets: [
            {
                fillColor: "rgba(172,194,132,0.4)",
                strokeColor: "#ACC26D",
                pointColor: "#fff",
                pointStrokeColor: "#9DB86D",
                data: [203, 156, 99, 251, 305, 247]
            }
        ]
    }

    // get line chart canvas
    //var buyers = document.getElementById('buyers').getContext('2d');//cmt vì loi do  id buyers hidden, 150616


    // draw line chart
    //new Chart(buyers).Line(buyerData);//cmt vì loi do  id buyers hidden, 150616

    // pie chart data
    var pieData = [
        {
            value: 20,
            color: "#878BB6"
        },
        {
            value: 40,
            color: "#4ACAB4"
        },
        {
            value: 10,
            color: "#FF8153"
        },
        {
            value: 30,
            color: "#FFEA88"
        }
    ];

    // pie chart options
    var pieOptions = {
        segmentShowStroke: false,
        animateScale: true
    }

    // get pie chart canvas
    //var countries= document.getElementById("countries").getContext("2d");
    //cmt 150616 do bi loi
    // draw pie chart
    //new Chart(countries).Pie(pieData, pieOptions);
    //cmt 150616 do bi loi
    // bar chart data
    var barData = {
        labels: ["January", "February", "March", "April", "May", "June"],
        datasets: [
            {
                fillColor: "#48A497",
                strokeColor: "#48A4D1",
                data: [456, 479, 324, 569, 702, 600]
            },
            {
                fillColor: "rgba(73,188,170,0.4)",
                strokeColor: "rgba(72,174,209,0.4)",
                data: [364, 504, 605, 400, 345, 320]
            }
        ]
    }

    // get bar chart canvas
    //var income = document.getElementById("income").getContext("2d");//cmt 150616 do bi loi

    //new Chart(income).Bar(barData);//cmt 150616 do bi loi


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
        if ((phone.length > 12 || phone.length < 10) && phone != "") {
            check = false;
            erorr += "<i>Phone number</i> chỉ được nhập từ 10 đến 12 chữ số.</br>";
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
