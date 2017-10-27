$("#city").on('click',function(){
    $("#code").hide();
});

$('#phonemanager input').on('click', function (action) {
    var clicked = action.target;
    if (clicked.checked) {
        $('#phonemanager input').each(function () {
            $(this).attr('disabled', true);
        });
        $(clicked).attr('disabled', false);
    } else {
        $('#phonemanager input').each(function () {
            $(this).attr('disabled', false);
        });
    }
});

$("#registered").on('click', function(){
    if (confirm('Bạn có thật sự muốn số điện thoại vào mục đã đăng ký?')) {
        var registered = document.getElementById('registered').value;
        var id = document.getElementById('id').value;
        $.get("<?php echo base_url();?>index.php/phone_controller/update_status_phone", {registered: registered, id: id}, function(data) {
            window.location.href = "<?php echo base_url();?>index.php/phone_controller/index";
        });
    }
    return false;
});

$("#no").on('click', function(){
    if (confirm('Bạn có thật sự muốn số điện thoại vào mục đã đăng ký?')) {
        var no = document.getElementById('no').value;
        var id = document.getElementById('id').value;
        $.get("<?php echo base_url();?>index.php/phone_controller/update_status_phone", {no: no, id: id}, function(data) {
            window.location.href = "<?php echo base_url();?>index.php/phone_controller/index";
        });
    }
    return false;
});

$("#contactother").on('click', function(){
    if (confirm('Bạn có thật sự muốn số điện thoại vào mục liên lạc lại?')) {
        var contactother = document.getElementById('contactother').value;
        var id = document.getElementById('id').value;
        $.get("<?php echo base_url();?>index.php/phone_controller/update_status_phone", {contactother: contactother, id: id}, function(data) {
            window.location.href = "<?php echo base_url();?>index.php/phone_controller/index";
        });
    }
    return false;
});

$("#nocontact").on('click', function(){
    if (confirm('Bạn có thật sự muốn số điện thoại vào mục chưa liên lạc?')) {
        var nocontact = document.getElementById('nocontact').value;
        var id = document.getElementById('id').value;
        $.get("<?php echo base_url();?>index.php/phone_controller/update_status_phone", {nocontact: nocontact, id: id}, function(data) {
            window.location.href = "<?php echo base_url();?>index.php/phone_controller/index";
        });
    }
    return false;
});