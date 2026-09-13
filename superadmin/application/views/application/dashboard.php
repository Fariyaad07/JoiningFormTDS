<!DOCTYPE html>
<html>
	<head>
		<title>Admin Dashboard</title>
		
		<!-- Bootstrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		
		<style>
			body { background:#f5f5f5; }
			.card { border-radius:10px; }
			.sidebar { background: #a7a7a7; min-height:100vh; }
			.box { background:#fff; padding:15px; border-radius:8px; text-align:center; }
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
			
			<!-- SIDEBAR -->
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
			
			<!-- MAIN -->
			<div class="col-10">
				
				<!-- NAVBAR -->
				<nav class="navbar navbar-light bg-light">
					<div class="container-fluid justify-content-end">
						<div class="dropdown">
							<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
								<img src="<?= base_url();?>images/blank-person.png" width="30">
							</a>
							<ul class="dropdown-menu">
								<li>
									<a class="dropdown-item" href="<?= site_url('application/logout') ?>"
									onclick="return confirm('Logout?')">
										Logout
									</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				
				<div class="p-3">
					<h3>Welcome Admin</h3>
					
					<div class="row">
						
						<!-- LEFT: FILE UPLOAD -->
						<div class="col-md-6">
							<div class="card p-3">
								<h5 class="bg-dark text-white p-2">User Data Upload</h5>
								
								<!-- DOWNLOAD SAMPLE -->
								<a href="<?= site_url('application/downloadSampleCSV') ?>" class="btn btn-success mb-2">
									Download Sample CSV
								</a>
								
								<!-- UPLOAD FORM -->
								<form method="post" action="<?= site_url('application/uploadCSV') ?>" enctype="multipart/form-data">
									<input type="file" name="csv_file" class="form-control mb-2" required>
									<button class="btn btn-primary">Upload CSV</button>
								</form>
							</div>
						</div>
						
						<!-- RIGHT: STATS -->
						<div class="col-md-6">
							<div class="card p-3">
								<h5 class="bg-dark text-white p-2">User Information Details</h5>
								
								<div class="row text-center">
									
									<div class="col-md-6 mb-2">
										<div class="box">
											<h6>Total</h6>
											<h4><?= $total ?? 0 ?></h4>
										</div>
									</div>
									
									<div class="col-md-6 mb-2">
										<div class="box">
											<h6>Approved</h6>
											<h4><?= $approved ?? 0 ?></h4>
										</div>
									</div>
									
									<div class="col-md-6 mb-2">
										<div class="box">
											<h6>Rejected</h6>
											<h4><?= $rejected ?? 0 ?></h4>
										</div>
									</div>
									
									<div class="col-md-6 mb-2">
										<div class="box">
											<h6>Pending</h6>
											<h4><?= $pending ?? 0 ?></h4>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
		<?php $this->load->view('application/footer'); ?>
	</body>
</html>