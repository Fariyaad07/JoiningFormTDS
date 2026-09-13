<div class="page-sidebar-wrapper">
					<!-- BEGIN SIDEBAR -->
					<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
					<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
					<div class="page-sidebar navbar-collapse collapse">
						<!-- BEGIN SIDEBAR MENU -->
						<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
						<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
						<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
						<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
						<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
						<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
						<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
							<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
							<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
							<li class="sidebar-toggler-wrapper hide">
								<div class="sidebar-toggler">
									<span></span>
								</div>
							</li>
							<!-- END SIDEBAR TOGGLER BUTTON -->
							<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
							<!--<li class="sidebar-search-wrapper">
								<form class="sidebar-search  " action="page_general_search_3.html" method="POST">
								<a href="javascript:;" class="remove">
								<i class="icon-close"></i>
								</a>
								<div class="input-group">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="input-group-btn">
								<a href="javascript:;" class="btn submit">
								<i class="icon-magnifier"></i>
								</a>
								</span>
								</div>
								</form>
								</li>-->
							<li class="nav-item">
								<a href="<?=base_url('dashboard');?>" class="nav-link nav-toggle">
								<i class="icon-home" style='color:lawngreen'></i>
								<span class="title">Dashboard</span>
								</a>
							</li>
							<li class="nav-item  ">
								<a href="<?=site_url('employee');?>" class="nav-link nav-toggle">
								<i class="fa fa-users" style='color:yellow'></i>
								<span class="title">Employee</span>
								</a>
							</li>
							<li class="nav-item  ">
								<a href="<?=site_url('notification');?>" class="nav-link nav-toggle">
								<i class="fa fa-users" style='color:yellow'></i>
								<span class="title">Notification</span>
								</a>
							</li>
							<li class="nav-item  ">
								<a href="<?=site_url('Client');?>" class="nav-link nav-toggle">
								<i class="fa fa-users" style='color:yellow'></i>
								<span class="title">Client List</span>
								</a>
							</li>
							<li class="nav-item  ">
								<a href="<?=site_url('Client/add');?>" class="nav-link nav-toggle">
								<i class="fa fa-users" style='color:yellow'></i>
								<span class="title">Client Add</span>
								</a>
							</li>
						</ul>
						<!-- END SIDEBAR MENU -->
						<!-- END SIDEBAR MENU -->
					</div>
					<!-- END SIDEBAR -->
				</div>