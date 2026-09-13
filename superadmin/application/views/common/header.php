<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD --><head>
        <meta charset="utf-8" />
        <title><?=$SITE[0]['site_name'];?> | <?=$title;?> <?=$view;?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="<?=$SITE[0]['site_name'];?> - <?=$title;?> - <?=$heading;?> - <?=$description;?> | <?=$SITE[0]['site_meta_description'];?>" name="description" />
        <meta content="<?=$SITE[0]['site_meta_keyword'];?>,INTELGC,intelgc" name="keywords" />
        <meta content="INTELGC Solutions Pvt. Ltd." name="author" />
		<!--FAVICON-->
		<link rel="icon" href="<?=file_upload_base_url($SITE[0]['site_fav_icon']);?>" type="image/png"> 
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
	
		<?php if($view_controller=="menu"){?>
        <link href="<?=base_url()?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
        <link href="<?=base_url()?>assets/global/plugins/bootstrap-menu-builder/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css" rel="stylesheet" type="text/css">
		<?php }else{ ?>
        <link href="<?=base_url()?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<?php } ?>
	
        <link href="<?=base_url()?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?=base_url()?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/codemirror/lib/codemirror.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/codemirror/theme/ambiance.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
	
	
	
		
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=base_url()?>assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url()?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?=base_url()?>assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
	
	
	
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?=base_url()?>assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?=base_url()?>assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
	</head>
    <!-- END HEAD -->
	<body class="page-header-fixed page-footer-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?=base_url('dashboard');?>">
                            <img src="<?=file_upload_base_url($SITE[0]['site_logo']);?>" alt="<?=$SITE[0]['site_name'];?> Logo" class="logo-default" style="background-color: #fff;" /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after "dropdown-extended" to change the dropdown styte -->
                            <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                            <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                            
							
							<!--
							<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
								<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<i class="icon-bell"></i>
								<span class="badge badge-default"> 7 </span>
								</a>
								<ul class="dropdown-menu">
									<li class="external">
										<h3>
											<span class="bold">12 pending</span> notifications
										</h3>
										<a href="page_user_profile_1.html">view all</a>
									</li>
									<li>
										<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
											<li>
												<a href="javascript:;">
												<span class="time">just now</span>
												<span class="details">
												<span class="label label-sm label-icon label-success">
												<i class="fa fa-plus"></i>
												</span> New user registered. </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="time">3 mins</span>
												<span class="details">
												<span class="label label-sm label-icon label-danger">
												<i class="fa fa-bolt"></i>
												</span> Server #12 overloaded. </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="time">10 mins</span>
												<span class="details">
												<span class="label label-sm label-icon label-warning">
												<i class="fa fa-bell-o"></i>
												</span> Server #2 not responding. </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="time">14 hrs</span>
												<span class="details">
												<span class="label label-sm label-icon label-info">
												<i class="fa fa-bullhorn"></i>
												</span> Application error. </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="time">2 days</span>
												<span class="details">
												<span class="label label-sm label-icon label-danger">
												<i class="fa fa-bolt"></i>
												</span> Database overloaded 68%. </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="time">3 days</span>
												<span class="details">
												<span class="label label-sm label-icon label-danger">
												<i class="fa fa-bolt"></i>
												</span> A user IP blocked. </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="time">4 days</span>
												<span class="details">
												<span class="label label-sm label-icon label-warning">
												<i class="fa fa-bell-o"></i>
												</span> Storage Server #4 not responding dfdfdfd. </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="time">5 days</span>
												<span class="details">
												<span class="label label-sm label-icon label-info">
												<i class="fa fa-bullhorn"></i>
												</span> System Error. </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="time">9 days</span>
												<span class="details">
												<span class="label label-sm label-icon label-danger">
												<i class="fa fa-bolt"></i>
												</span> Storage server failed. </span>
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							-->
							
							
							
                            <!-- END NOTIFICATION DROPDOWN -->
                            <!-- BEGIN Page Back -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-hover="dropdown" data-close-others="true" onClick="window.history.back();" title="Back To Previous Page">
                                    <i class="fa fa-arrow-left" style="color: red"></i>
                                </a>
                                <ul class="dropdown-menu extended tasks">
                                </ul>
                            </li>
                            <!-- END Page Back -->
                            <!-- BEGIN Page Reload -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-hover="dropdown" data-close-others="true" onClick="location.reload();" title="Reload Page">
                                    <i class="icon-refresh" style="color: green"></i>
                                </a>
                                <ul class="dropdown-menu extended tasks">
                                </ul>
                            </li>
                            <!-- END Page Reload -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="<?=file_upload_base_url($this->session->userdata('admin_session_image'));?>" />
                                    <span class="username username-hide-on-mobile"> <?=$this->session->userdata('admin_session_name');?> </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="<?=base_url('myProfile/details');?>">
                                            <i class="icon-user"></i> My Profile </a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url('site/details');?>">
                                            <i class="icon-settings"></i> Settings </a>
                                    </li>
                                    <!--<li>
                                        <a href="app_calendar.html">
                                            <i class="icon-calendar"></i> My Calendar </a>
                                    </li>
                                    <li>
                                        <a href="app_inbox.html">
                                            <i class="icon-envelope-open"></i> My Inbox
                                            <span class="badge badge-danger"> 3 </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="app_todo.html">
                                            <i class="icon-rocket"></i> My Tasks
                                            <span class="badge badge-success"> 7 </span>
                                        </a>
                                    </li>-->
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="<?=base_url('authenticate/lockProfileLockedSubmitted');?>">
                                            <i class="icon-lock"></i> Lock Screen </a>
                                    </li>
                                    <li>
										<a href="<?=base_url('authenticate/logout');?>"><i class="icon-key"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>