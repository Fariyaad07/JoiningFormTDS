
												
			<!--==========This section is for form validation Message (Instant - Error)=======-->	
                                                <div class="alert alert-danger display-hide">
                                                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
			<!--==========This section is for form validation Message (Instant - Success)=======-->	
                                                <div class="alert alert-success display-hide">
                                                    <button class="close" data-close="alert"></button> Your form validation is successful! </div>
			<!--==========This section is for form validation Message (After Submit - Error)=======-->
												<?php if(validation_errors()) { ?>
                                                <div class="alert alert-danger">
                                                    <button class="close" data-close="alert"></button> <?=validation_errors();?> </div>
												<?php } ?>
			<!--==========This section is for Form Submission Message (After Submit - Error)=======-->
												<?php if($this->session->flashdata('errorMSG')) { ?>
                                                <div class="alert alert-danger">
                                                    <button class="close" data-close="alert"></button> <?=$this->session->flashdata('errorMSG');?>  </div>
												<?php } ?>
			<!--==========This section is for Form Submission Message (After Submit - Success)=====-->
												<?php if($this->session->flashdata('successMSG')) { ?>
                                                <div class="alert alert-success">
                                                    <button class="close" data-close="alert"></button> <?=$this->session->flashdata('successMSG');?>  </div>
												<?php } ?>