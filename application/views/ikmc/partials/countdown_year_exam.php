 
 <script type="text/javascript">
(function (e) {
  e.fn.countdown = function (t, n) {
  function i() {
    eventDate = Date.parse(r.date) / 1e3;
    currentDate = Math.floor(e.now() / 1e3);
    if (eventDate <= currentDate) {
      n.call(this);
      clearInterval(interval)
    }
    seconds = eventDate - currentDate;
    days = Math.floor(seconds / 86400);
    seconds -= days * 60 * 60 * 24;
    hours = Math.floor(seconds / 3600);
    seconds -= hours * 60 * 60;
    minutes = Math.floor(seconds / 60);
    seconds -= minutes * 60;
    // days == 1 ? thisEl.find(".timeRefDays").text("day") : thisEl.find(".timeRefDays").text("days");
    // hours == 1 ? thisEl.find(".timeRefHours").text("hour") : thisEl.find(".timeRefHours").text("hours");
    // minutes == 1 ? thisEl.find(".timeRefMinutes").text("minute") : thisEl.find(".timeRefMinutes").text("minutes");
    // seconds == 1 ? thisEl.find(".timeRefSeconds").text("second") : thisEl.find(".timeRefSeconds").text("seconds");
    if (r["format"] == "on") {
      days = String(days).length >= 2 ? days : "0" + days;
      hours = String(hours).length >= 2 ? hours : "0" + hours;
      minutes = String(minutes).length >= 2 ? minutes : "0" + minutes;
      seconds = String(seconds).length >= 2 ? seconds : "0" + seconds
    }
    if (!isNaN(eventDate)) {
      thisEl.find(".days").text(days);
      thisEl.find(".hours").text(hours);
      thisEl.find(".minutes").text(minutes);
      thisEl.find(".seconds").text(seconds)
    } else {
      alert("Invalid date. Example: 30 Tuesday 2013 15:50:00");
      clearInterval(interval)
    }
  }
  var thisEl = e(this);
  var r = {
    date: null,
    format: null
  };
  t && e.extend(r, t);
  i();
  interval = setInterval(i, 1e3)
  }
  })(jQuery);
  $(document).ready(function () {
  function e() {
    var e = new Date;
    e.setDate(e.getDate() + 60);
    dd = e.getDate();
    mm = e.getMonth() + 1;
    y = e.getFullYear();
    futureFormattedDate = mm + "/" + dd + "/" + y;
    return futureFormattedDate
  }
  $("#countdown").countdown({
    date: "14 January 2017 19:15:00", // Change this to your desired date to countdown to
    format: "on"
  });
});
  jQuery(document).ready(function($) {
    $(".top-link").click(function(event) {
        /* Act on the event */
        var target = $(this).attr('href');
        $('html, body').animate({
                    scrollTop: $(target).offset().top-60
                }, 2000);
    });
  });
</script>
 <section class="kmoc_year_exam_countdown">
                	       <div class="container" id="countdown">
        <h1 style="color:#fff;">Kỳ thi Kangaroo Math Online Club - KMOC năm 2016 - 2017</h1>
        <h1 style="color:#FFA500;"> Sẽ tổ chức vào ngày 14 - 15 tháng 1 năm 2017</h1>
        <h2 style="color:#fff;">Cuộc thi sẽ bắt đầu sau:</h2>
        <span class="countdown-row">
        <span class="countdown-section">
            <span class="countdown-amount days">11</span>
            <span class="countdown-period">Ngày</span>
        </span>

        <span class="countdown-section">

            <span class="countdown-amount hours">11</span>
            <span class="countdown-period">Giờ</span>
        </span>
        <span class="countdown-section">
        
            <span class="countdown-amount minutes">11</span>
            <span class="countdown-period">Phút</span>
        </span>
        <span class="countdown-section">
        
            <span class="countdown-amount seconds">11</span>
            <span class="countdown-period">Giây</span>
        </span>
        </span>
        <br>
        <h3 style="color: #fff;">Click tại <a href="http://kangaroo-math.vn/user/signup">đây</a> để đăng kí tham gia kì thi MIỄN PHÍ ngay từ hôm nay!</h3>


    </div>
    
                </section><!--End .intro-->