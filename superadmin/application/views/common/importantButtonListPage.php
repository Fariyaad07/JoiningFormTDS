				<?php if($this->router->fetch_method()=='index'){ ?> 
					<center>
						<div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                   <div class="btn-group">
                                       <a href="<?=current_url()?>/trash" id="sample_editable_2_new" class="btn sbold yellow"><i class="fa fa-folder"></i> View Trash 
                                       </a>
                                   </div>
                                   <div class="btn-group">
                                       <button type="button" name="move_trash_all" class="btn sbold dark" onClick="move_to_trash_multiple('<?=current_url()?>/moveToTrashMultiple')"><i class="fa fa-trash"></i> Move To Trash  Selected
                                       </button>
                                   </div>
                                </div>
                            </div>
                        </div>
					</center>
				<?php } ?>


				<?php if($this->router->fetch_method()=='trash'){ ?> 
					<center>
						<div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                   <div class="btn-group">
                                       <a href="<?=base_url(''.$view_controller)?>" id="sample_editable_2_new" class="btn sbold yellow"><i class="fa fa-eye"></i> View Active List 
                                       </a>
                                   </div>
                                   <div class="btn-group">
                                       <button type="button" id="restore_all" name="restore_all" class="btn sbold purple" onClick="restore_from_trash_multiple('<?=base_url(''.$view_controller)?>/restoreFromTrashMultiple')"><i class="fa fa-refresh"></i> Restore Selected 
                                       </button>
                                   </div>
                                </div>
                            </div>
                        </div>
					</center>
				<?php } ?>