<!DOCTYPE html>
<html lang="en"> 
    <!-- BEGIN HEAD -->
    <head>
        <base href="<?php echo base_url(); ?>">
        <meta charset="UTF-8" />
        <title>Kangaroo | ADMIN</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/theme.css" />
        <link rel="stylesheet" href="css/MoneAdmin.css" />
        <script src="plugins/jquery-2.0.3.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <link href="css/layout2.css" rel="stylesheet" />
        <link href="plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />		
        <script type="text/javascript" src="plugins/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
        <script type="text/javascript">


            tinyMCE.init({
                // General options
                forced_root_block: "",
                force_br_newlines: true,
                force_p_newlines: false,
                //mode : "textareas",
                theme: "advanced",
                mode: "specific_textareas",
                //editor_selector : "abc",
                plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
                // Theme options
                theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
                theme_advanced_toolbar_location: "top",
                theme_advanced_toolbar_align: "left",
                theme_advanced_statusbar_location: "bottom",
                theme_advanced_resizing: true,
                // Example content CSS (should be your site CSS)
                content_css: "css/content.css",
                // Drop lists for link/image/media/template dialogs
                template_external_list_url: "lists/template_list.js",
                external_link_list_url: "lists/link_list.js",
                external_image_list_url: "lists/image_list.js",
                media_external_list_url: "lists/media_list.js",
                file_browser_callback: 'openKCFinder',
                template_replace_values: {
                    username: "Some User",
                    staffid: "991234"
                },
                relative_urls: 0,
                remove_script_host: 0,
            });
            function openKCFinder(field_name, url, type, win) {
                tinyMCE.activeEditor.windowManager.open({
                    file: '<?php echo base_url(); ?>plugins/kcfinder/browse.php?opener=tinymce&lang=vi&type=' + type,
                    title: 'KCFinder',
                    width: 700,
                    height: 500,
                    resizable: true,
                    inline: true,
                    close_previous: false,
                    popup_css: false
                }, {
                    window: win,
                    input: field_name
                });
                return false;
            }
            function browseKCFinder(field, type) {
                window.KCFinder = {
                    callBack: function(url) {
                        field.value = url;
                        window.KCFinder = null;
                    }
                };
                window.open('<?php echo base_url(); ?>plugins/kcfinder/browse.php?type=' + type + '&lang=vi', 'kcfinder_textbox',
                        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
                        'resizable=1, scrollbars=0, width=800, height=600'
                        );
            }

        </script>
        <!-- /TinyMCE -->
    </head>


    <body class="padTop53 " >


        <div id="wrap" >

            <div id="top">

                <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                    <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                        <i class="icon-align-justify"></i>
                    </a>

                    <header class="navbar-header">

                        <a href="index.html" class="navbar-brand">
                            <h3 style="color: blue; margin-top: 10px; font-weight: bold;">Administrator</h3>
                        </a>
                    </header>

                    <ul class="nav navbar-top-links navbar-right">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon-user "></i>&nbsp; <i class="glyphicon glyphicon-chevron-down"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-user">

                               
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url() ?>kang_admin/logoutadmin"><i class="icon-signout"></i> Logout </a>
                                </li>
                            </ul>

                        </li>

                    </ul>

                </nav>

            </div>

            <div id="left" >
                <div class="media user-media well-small">
                    <a class="user-link" href="#">
                        <img width="200px" height="200px;" class="media-object img-thumbnail user-img" alt="User Picture" src="img/logo.png" />
                    </a>
                    <br />
                    <div class="media-body">
                        <?php $session_id = $this->session->userdata('admin');
                        
                    ?>
                        <h5 class="media-heading"><?php echo $session_id['email']?></h5>
                        <ul class="list-unstyled user-info">  
                            <li>
                                <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                            </li> 
                        </ul>
                    </div>
                    <br />
                </div>

                <ul id="menu" class="collapse">


                    <li class="panel active">
                        <a>
                            <i class="icon-table"></i> Trang Chủ

                        </a>                   
                    </li>

                    <li class="panel " style="display: none;">
                        <a href="<?php echo base_url() ?>kang_admin/choose_year_question" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                            <i class="icon-tasks"> </i> Quản lý câu hỏi

                            <span class="pull-right">
                                <i class="icon-angle-left"></i>
                            </span>
                            &nbsp; <span class="label label-danger"><?php echo $session_id['question_test'];?></span>&nbsp;
                        </a>

                    </li>
                   
                  
                    <li class="panel">
                        <a href = "<?php echo base_url() ?>kang_admin/list_news" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav">
                            <i class=" icon-sitemap"></i> Quản lý chuyên đề
                            <span class="pull-right">
                                <i class="icon-angle-left"></i>
                            </span>
                        </a>

                    </li>
                    <li class="panel">
                        <a href = "<?php echo base_url() ?>kang_admin/list_course" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav">
                            <i class=" icon-sitemap"></i> Quản lý Lớp ( lever )
                            <span class="pull-right">
                                <i class="icon-angle-left"></i>
                            </span>
                        </a>

                    </li>
                    <li class="panel">
                        <a href = "<?php echo base_url() ?>lecture/list_lecture" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav">
                            <i class=" icon-sitemap"></i> Quản lý bài giảng
                            <span class="pull-right">
                                <i class="icon-angle-left"></i>
                            </span>
                        </a>

                    </li>
                   <li class="panel">
                    <!-- <a href = "<?php echo base_url()?>kang_admin_week/add_test_question" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav"> -->
                    <a href = "<?php echo base_url()?>kang_admin_week/view_test_question_table" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav">
                        <i class=" icon-sitemap"></i> Câu hỏi theo tuần
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    
                </li>
                </ul>

            </div>

            <div style="padding-top:30px;" id="content">

<?php
$this->load->view($output, isset($data) ? $data : NULL);
?>


            </div>


        </div>

        <div id="footer">
            <p>Admin kangaroo &nbsp;2016 &nbsp;</p>
        </div>


        <script src="plugins/dataTables/jquery.dataTables.js"></script>
        <script src="plugins/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
        </script>

    </body>


</html>
