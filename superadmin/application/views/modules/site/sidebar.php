								<div class="profile-sidebar">
                                    <!-- PORTLET MAIN -->
                                    <div class="portlet light profile-sidebar-portlet ">
                                        <!-- SIDEBAR USERPIC -->
                                        <div class="profile-userpic">
                                            <img src="<?=file_upload_base_url($SITE[0]['site_logo']);?>" class="img-responsive" alt="<?=$SITE[0]['site_name'];?> Logo"> </div>
                                        <!-- END SIDEBAR USERPIC -->
                                        <!-- SIDEBAR USER TITLE -->
                                        <div class="profile-usertitle">
                                            <div class="profile-usertitle-name"><?=$SITE[0]['site_name'];?></div>
                                            <div class="profile-usertitle-job"><?=$SITE[0]['site_moto'];?></div>
                                        </div>
                                        <!-- END SIDEBAR USER TITLE -->
                                        <!-- SIDEBAR BUTTONS -->
                                        <!--<div class="profile-userbuttons">
                                            <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                                            <button type="button" class="btn btn-circle red btn-sm">Message</button>
                                        </div>-->
                                        <!-- END SIDEBAR BUTTONS -->
                                        <!-- SIDEBAR MENU -->
                                        <div class="profile-usermenu">
                                            <ul class="nav">
                                                <li>
                                                    <a href="<?=site_url($view_controller.'/details/');?>">
                                                        <i class="icon-home"></i> Overview </a>
                                                </li>
                                                <li>
                                                    <a href="<?=site_url($view_controller.'/edit/');?>">
                                                        <i class="icon-settings"></i> Site Settings </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- END MENU -->
                                    </div>
                                    <!-- END PORTLET MAIN -->
                                    <!-- PORTLET MAIN -->
                                    <div class="portlet light ">
                                        <!-- STAT -->
                                        <!--<div class="row list-separated profile-stat">
                                            <div class="col-md-4 col-sm-4 col-xs-6">
                                                <div class="uppercase profile-stat-title"> 37 </div>
                                                <div class="uppercase profile-stat-text"> Projects </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-6">
                                                <div class="uppercase profile-stat-title"> 51 </div>
                                                <div class="uppercase profile-stat-text"> Tasks </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-6">
                                                <div class="uppercase profile-stat-title"> 61 </div>
                                                <div class="uppercase profile-stat-text"> Uploads </div>
                                            </div>
                                        </div>-->
                                        <!-- END STAT -->
                                        <div>
                                            <h4 class="profile-desc-title">About <?=$SITE[0]['site_name'];?></h4>
                                            <span class="profile-desc-text"> <?=$SITE[0]['site_about'];?> </span>
                                            <div class="margin-top-20 profile-desc-link">
                                                <i class="fa fa-globe"></i>
                                                <a href="<?=$SITE[0]['site_url'];?> "><?=$SITE[0]['site_url'];?> </a>
                                            </div>
                                            <div class="margin-top-20 profile-desc-link">
                                                <i class="fa fa-twitter"></i>
                                                <a href="<?=$SITE[0]['site_twitter'];?> "><?=$SITE[0]['site_twitter'];?> </a>
                                            </div>
                                            <div class="margin-top-20 profile-desc-link">
                                                <i class="fa fa-facebook"></i>
                                                <a href="<?=$SITE[0]['site_facebook'];?> "><?=$SITE[0]['site_facebook'];?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PORTLET MAIN -->
                                </div>