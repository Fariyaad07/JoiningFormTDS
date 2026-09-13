<!DOCTYPE html>
<html>
	<head>
		<title>SuperAdmin Login</title>
		
		<!-- Bootstrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- DataTables -->
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
		
		<!-- Buttons -->
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
		
		<style>
			body { background:#f5f5f5; }
			.card { border-radius:10px; }
			.sidebar{
            background: #a7a7a7;
			}
		</style>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
		
		<style>
			.sidebar {
			background: linear-gradient(180deg, #6c757d, #495057);
			min-height: 100vh;
			padding: 0;
			}
			
			.sidebar .logo-box {
			text-align: center;
			padding: 20px 10px;
			border-bottom: 1px solid rgba(255,255,255,0.2);
			}
			
			.sidebar .logo-box img {
			width: 100px;
			}
			
			.sidebar .logo-text {
			color: #fff;
			font-weight: bold;
			margin-top: 10px;
			font-size: 16px;
			}
			
			.sidebar-link {
			display: flex;
			align-items: center;
			color: #fff;
			padding: 12px 20px;
			font-size: 15px;
			transition: 0.3s;
			border-radius: 6px;
			margin: 5px 10px;
			text-decoration: none;
			}
			
			.sidebar-link i {
			width: 25px;
			}
			
			.sidebar-link:hover {
			background: #343a40;
			transform: translateX(5px);
			}
			
			.sidebar-link.active {
			background: #212529;
			}
		</style>
		
	</head>
	
	<body>
		
		
		<div class="row">
			
			<div class="col-2 sidebar d-flex flex-column">
				
				<!-- LOGO -->
				<div class="logo-box">
					<img src="<?= base_url();?>images/TDS-New-Logo-min.png">
					<div class="logo-text">TDS GROUP</div>
				</div>
				
				<!-- MENU -->
				<div class="mt-3">
					
					<a href="<?= base_url('index.php/application') ?>"
					class="sidebar-link <?= uri_string() == 'application' ? 'active' : '' ?>">
						<i class="fas fa-home"></i> On Boarding
					</a>
					
					<a href="<?= base_url('index.php/client') ?>"
					class="sidebar-link <?= uri_string() == 'client' ? 'active' : '' ?>">
						<i class="fas fa-users"></i> Client Management
					</a>
					
					<a href="<?= base_url('index.php/application/dashboard') ?>"
					class="sidebar-link <?= uri_string() == 'application/dashboard' ? 'active' : '' ?>">
						<i class="fas fa-chart-line"></i> Dashboard
					</a>
					
					<a href="<?= base_url('index.php/application/adminList') ?>"
					class="sidebar-link <?= uri_string() == 'application/adminList' ? 'active' : '' ?>">
						<i class="fas fa-chart-line"></i> Admin Management
					</a>
					
				</div>
				
			</div>
			
			
			
			<div class="col-10">
				
				<div class="col-12 bg-light">
					
					
					<nav class="navbar navbar-expand-lg bg-body-tertiary">
						<div class="container-fluid">
							
							<ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
								
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										<img src="<?= base_url();?>images/blank-person.png" class="rounded-circle" style="width: 30px;">
									</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="<?= site_url('application/logout') ?>"
											onclick="return confirm('Are you sure you want to logout?')">
												Logout
											</a></li>
									</li>
									
								</ul>
								
								
							</div>
						</nav>
						
						
					</div>
					<h3>Welcome Admin</h3>
					<a href="<?= base_url('application/addAdmin') ?>"	class="btn btn-primary mb-3" style="float: right">
						Add Admin
					</a>
					<div class="col-12 bg-light">
						
						
						
						<table class="table table-bordered">
							
							<tr>
								
								<th>ID</th>
								
								<th>Name</th>
								
								<th>Email</th>
								
								<th>Role</th>
								
								<th>Permissions</th>
								
								<th>Action</th>
								
							</tr>
							
							<?php foreach($admins as $row){ ?>
								<?php if($row['admin_role'] != 'Super Admin') { ?>
								<tr>
									
									<td><?= $row['admin_id']; ?></td>
									
									<td><?= $row['admin_name']; ?></td>
									
									<td><?= $row['admin_email']; ?></td>
									
									<td><?= $row['admin_role']; ?></td>
									
									<td><?= $row['permissions']; ?></td>
									
									<td>
										
										<a href="<?= base_url('application/editAdmin/'.$row['admin_id']) ?>"
										class="btn btn-warning btn-sm"> 
											
											Edit
											
										</a>
										
										<a href="<?= base_url('application/deleteAdmin/'.$row['admin_id']) ?>"
										class="btn btn-danger btn-sm"
										onclick="return confirm('Delete Admin ?')">
											
											Delete
											
										</a>
										
									</td>
									
								</tr>
								<?php } ?>
							<?php } ?>
							
						</table>
						
					</div>
					
				</div>
				
			</div>
			<?php $this->load->view('application/footer'); ?>
		</body>
	</html>					