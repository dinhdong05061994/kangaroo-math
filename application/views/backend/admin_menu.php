  <style type='text/css'>
body
{
    font-family: Arial;
    font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
    text-decoration: underline;
}

.menu{
    clear: both;
}
</style>
  <div style='height:20px;'></div>  
    <div class = "logout" style = "width:60px; height: 20px; border-radius: 3px; border: 1px solid#888 ;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a style = "text-decoration: none;" href = "<?php echo base_url()?>admin/logoutadmin">
        Logout</a>
    </div>
<div class = "menu">
    <div style = "width:180px; height: 20px; border-radius: 3px; /*border: 1px solid#888 */;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a tyle = "text-decoration: none;" href = "<?php echo base_url()?>admin/choose_year_question">
            Quản lý câu hỏi bài thi năm</a>
    </div>
    <div style = "width:170px; height: 20px; border-radius: 3px; /*border: 1px solid#888 */;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a tyle = "text-decoration: none;" href = "<?php echo base_url()?>admin/show_practice_results">
            Quản lý KQ luyện tập</a>
    </div>
     <!-- <div style = "width:230px; height: 20px; border-radius: 3px; /*border: 1px solid#888 */;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a tyle = "text-decoration: none;" href = "<?php //echo base_url()?>admin/require_user">
            Danh sách yêu cầu từ người dùng</a>
    </div> -->
     <div style = "width:180px; height: 20px; border-radius: 3px; /*border: 1px solid#888 */;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a tyle = "text-decoration: none;" href = "<?php echo base_url()?>admin/student_register_online">
            Danh sách đăng ký online</a>
    </div>
    <div style = "width:180px; height: 20px; border-radius: 3px; /*border: 1px solid#888 */;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a tyle = "text-decoration: none;" href = "<?php echo base_url()?>admin/student_register_ieg">
            Danh sách đăng ký tại IEG</a>
    </div>
     <div style = "width:80px; height: 20px; border-radius: 3px; /*border: 1px solid#888 */;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a tyle = "text-decoration: none;" href = "<?php echo base_url()?>admin/notice_boards">
            Thông báo</a>
    </div>
    
    
    <div style = "width:80px; height: 20px; border-radius: 3px; /*border: 1px solid#888 */;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a tyle = "text-decoration: none;" href = "<?php echo base_url()?>admin/img_slide">
            Ảnh Slide</a>
    </div>
    <div style = "width:140px; height: 20px; border-radius: 3px; /*border: 1px solid#888 */;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a tyle = "text-decoration: none;" href = "<?php echo base_url()?>admin/organizers_donors">
            Ban tổ chức/tài trợ</a>
    </div>
     <div style = "width:160px; height: 20px; border-radius: 3px; /*border: 1px solid#888 */;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a tyle = "text-decoration: none;" href = "<?php echo base_url()?>admin/new_argument">
            Quản lý tham số mới 1</a>
    </div>
    <div style = "width:180px; height: 20px; border-radius: 3px; /*border: 1px solid#888 */;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a tyle = "text-decoration: none;" href = "<?php echo base_url()?>admin/system_argument_management">
            Quản lý tham số hệ thống</a>
    </div>
    <div style = "width:200px; height: 20px; border-radius: 3px; /*border: 1px solid#888 */;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a tyle = "text-decoration: none;" href = "<?php echo base_url()?>admin/news_management">
            Quản lý góc báo chí - tin tức</a>
    </div>
    <div style = "width:220px; height: 20px; border-radius: 3px; /*border: 1px solid#888 */;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a tyle = "text-decoration: none;" href = "<?php echo base_url()?>admin_competition/competition_monthly_question">
            Quản lý câu hỏi Kỳ thi hàng tháng</a>
    </div>
    <div style = "width:200px; height: 20px; border-radius: 3px; /*border: 1px solid#888 */;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a tyle = "text-decoration: none;" href = "<?php echo base_url()?>admin/management_level_challenge">
            Quản lý level của thử thách</a>
    </div>
    <div style = "width:200px; height: 20px; border-radius: 3px; /*border: 1px solid#888 */;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a tyle = "text-decoration: none;" href = "<?php echo base_url()?>admin/management_questions_optional">
            Quản lý câu hỏi bài thi tự chọn</a>
    </div>
    <!-- <div style = "width:200px; height: 20px; border-radius: 3px; /*border: 1px solid#888 */;box-shadow: 2px 2px 1px #ccc; 
                float: right; padding: 3px; margin-bottom: 10px; margin-right: 5px; text-align: center; text-decoration: none;">
        <a tyle = "text-decoration: none;" href = "<?php //echo base_url()?>mng_user">
            Quản lý người dùng</a>
    </div> -->
</div>
<div style='height:30px;'></div> 