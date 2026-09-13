
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN PROFILE SIDEBAR -->
                                <?php $this->load->view('modules/'.$view_controller.'/sidebar'); ?>
                                <!-- END BEGIN PROFILE SIDEBAR -->
                                <!-- BEGIN PROFILE CONTENT -->
                                <div class="profile-content">
                                    <div class="row">
										<div class="col-md-6">
                                            <!-- BEGIN PORTLET -->
                                            <div class="portlet light ">
                                                <div class="portlet-title">
                                                    <div class="caption caption-md">
                                                        <i class="icon-bar-chart theme-font hide"></i>
                                                        <span class="caption-subject font-blue-madison bold uppercase">Contact Info</span>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="table-scrollable table-scrollable-borderless">
                                                        <table class="table table-hover table-light">
                                                            <tr>
                                                                <td> Email </td>
                                                                <td> <?=$SITE[0]['site_email'];?> </td>
                                                            </tr>
                                                            <tr>
                                                                <td> Contact Number </td>
                                                                <td> <?=$SITE[0]['site_contact'];?> </td>
                                                            </tr>
                                                            <tr>
                                                                <td> Address </td>
                                                                <td> <?=$SITE[0]['site_address'];?> </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
											<div class="portlet light ">
                                                <table class="table table-hover table-light">
                                                  <tr>
                                                     <td> Active From : </td>
                                                     <td> <?=$SITE[0]['site_activation_date'];?> </td>
                                                  </tr>
                                                </table>
                                            </div>
                                            <!-- END PORTLET -->
                                        </div>
                                        <div class="col-md-6">
                                            <!-- BEGIN PORTLET -->
                                            <div class="portlet light ">
                                                <div class="portlet-title">
                                                    <div class="caption caption-md">
                                                        <i class="icon-bar-chart theme-font hide"></i>
                                                        <span class="caption-subject font-blue-madison bold uppercase">Metadata</span>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="table-scrollable table-scrollable-borderless">
                                                        <table class="table table-hover table-light">
                                                            <tr>
                                                                <td> Description </td>
                                                                <td> <?=$SITE[0]['site_meta_description'];?> </td>
                                                            </tr>
                                                            <tr>
                                                                <td> Keyword </td>
                                                                <td> <?=$SITE[0]['site_meta_keyword'];?> </td>
                                                            </tr>
                                                            <tr>
                                                                <td> Author </td>
                                                                <td> <?=$SITE[0]['site_meta_author'];?> </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END PORTLET -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- BEGIN PORTLET -->
                                            <div class="portlet light ">
                                                <div class="portlet-title">
                                                    <div class="caption caption-md">
                                                        <i class="icon-bar-chart theme-font hide"></i>
                                                        <span class="caption-subject font-blue-madison bold uppercase">Social Links</span>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="table-scrollable table-scrollable-borderless">
                                                        <table class="table table-hover table-light">
                                                            <tr>
                                                                <td> Fecebook </td>
                                                                <td> <?=$SITE[0]['site_facebook'];?> </td>
                                                            </tr>
                                                            <tr>
                                                                <td> Twitter </td>
                                                                <td> <?=$SITE[0]['site_twitter'];?> </td>
                                                            </tr>
                                                            <tr>
                                                                <td> Instagram </td>
                                                                <td> <?=$SITE[0]['site_instagram'];?> </td>
                                                            </tr>
                                                            <tr>
                                                                <td> LinkedIN </td>
                                                                <td> <?=$SITE[0]['site_linkedin'];?> </td>
                                                            </tr>
                                                            <tr>
                                                                <td> YOUTUBE </td>
                                                                <td> <?=$SITE[0]['site_youtube'];?> </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END PORTLET -->
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-12">
                                            <!-- BEGIN PORTLET -->
                                            <div class="portlet light ">
                                                <div class="portlet-title">
                                                    <div class="caption caption-md">
                                                        <i class="icon-bar-chart theme-font hide"></i>
                                                        <span class="caption-subject font-blue-madison bold uppercase">Location Map</span>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="table-scrollable table-scrollable-borderless">
                                                        <?=$SITE[0]['site_location_map'];?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END PORTLET -->
                                        </div>
                                    </div>
                                </div>
                                <!-- END PROFILE CONTENT -->
                            </div>
                        </div>