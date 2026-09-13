<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php echo $header;?>

            <!-- END HEADER & CONTENT DIVIDER -->

            <!-- BEGIN CONTAINER -->

            <div class="page-container">

                <!-- BEGIN SIDEBAR -->

                <?php echo $leftSidebar; ?>

                <!-- END SIDEBAR -->

                <!-- BEGIN CONTENT -->

                <div class="page-content-wrapper">

                    <!-- BEGIN CONTENT BODY -->

                    <div class="page-content" id="page-content">

                        <!-- BEGIN PAGE HEADER-->

                        <!-- BEGIN PAGE BAR & TITLE -->

                        <?php echo $pageBarTitle;?>

                        <!-- END PAGE BAR & TITLE-->

                        <!-- END PAGE HEADER-->

                        

						<!-- BEGIN Content Row-->

						<!-- BEGIN COMMON MESSAGE-->

						<?php echo $commonMSG; ?>

						<!-- END COMMON MESSAGE-->

						 <!-- BEGIN Important Button Row-->

						<?php echo $importantButton; ?>

                        <!-- BEGIN Important Button Row-->

						

						<?php echo $content;?>



                        <div class="clearfix"></div>

						<?php echo $extra; ?>

						<?php echo $mediaManager; ?>						

                    </div>

                    <!-- END CONTENT BODY -->

                </div>

                <!-- END CONTENT -->

            </div>

            <!-- END CONTAINER -->		

<?php echo $footer;?>