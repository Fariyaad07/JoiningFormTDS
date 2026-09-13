<!DOCTYPE html>
<html>
	<head>
		<title>Forgot Password</title>
		
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<style>
			
			body {
			margin: 0;
			padding: 0;
			background: linear-gradient(135deg, #5f9cff, #6dd5ed);
			height: 100vh;
			font-family: 'Segoe UI', sans-serif;
			}
			
			/* Center container */
			.main-container {
			height: 100vh;
			display: flex;
			align-items: center;
			}
			
			/* Card */
			.login-card {
			width: 100%;
			border-radius: 20px;
			overflow: hidden;
			background: rgba(255, 255, 255, 0.95);
			}
			
			/* Left side */
			.left-section {
			background: linear-gradient(135deg, #3a7bd5, #00d2ff);
			color: white;
			text-align: center;
			height: 100%;
			}
			
			.left-section img {
			max-width: 150px;
			}
			
			/* Right side */
			.right-section {
			padding: 40px !important;
			}
			
			/* Inputs */
			.form-group {
			position: relative;
			}
			
			.form-control {
			border: none;
			border-bottom: 2px solid #ddd;
			border-radius: 0;
			padding-left: 35px;
			height: 45px;
			}
			
			.form-control:focus {
			box-shadow: none;
			border-color: #3a7bd5;
			}
			
			/* Icons */
			.form-icon {
			position: absolute;
			top: 12px;
			left: 5px;
			color: #888;
			}
			
			/* Toggle password */
			.toggle-password {
			position: absolute;
			top: 12px;
			right: 10px;
			cursor: pointer;
			color: #888;
			}
			
			/* Button */
			.btn-login {
			width: 100%;
			border-radius: 25px;
			height: 45px;
			}
			
			/* Links */
			.links a {
			display: block;
			font-size: 14px;
			}
			
			/* Admin box */
			.admin-box {
			background: #f1f6ff;
			border-radius: 10px;
			padding: 15px;
			margin-top: 20px;
			}
			
			/* Responsive */
			@media(max-width:768px){
			.left-section{
			display:none;
			}
			}
			
			body {
			margin: 0;
			height: 100vh;
			background: linear-gradient(135deg, #5f9cff, #6dd5ed);
			display: flex;
			align-items: center;
			justify-content: center;
			font-family: 'Segoe UI', sans-serif;
			overflow: hidden;
			}
			
			/* Bubble container */
			.bubbles {
			position: absolute;
			width: 100%;
			height: 100%;
			z-index: 0;
			overflow: hidden;
			}
			
			/* Each bubble */
			.bubbles span {
			position: absolute;
			bottom: -100px;
			width: 20px;
			height: 20px;
			background: rgba(255,255,255,0.3);
			border-radius: 50%;
			animation: rise 10s infinite ease-in;
			}
			
			/* Animation */
			@keyframes rise {
			0% {
			transform: translateY(0) scale(1);
			opacity: 0.5;
			}
			100% {
			transform: translateY(-110vh) scale(1.5);
			opacity: 0;
			}
			}
			
			/* Random positions */
			/* Bigger bubbles */
			.bubbles span {
			position: absolute;
			bottom: -150px;
			background: rgba(255,255,255,0.25);
			border-radius: 50%;
			animation: rise 12s infinite ease-in;
			}
			
			/* Different large sizes */
			.bubbles span:nth-child(1) {
			left: 10%;
			width: 80px;
			height: 80px;
			animation-duration: 10s;
			}
			
			.bubbles span:nth-child(2) {
			left: 20%;
			width: 120px;
			height: 120px;
			animation-duration: 14s;
			}
			
			.bubbles span:nth-child(3) {
			left: 35%;
			width: 60px;
			height: 60px;
			animation-duration: 9s;
			}
			
			.bubbles span:nth-child(4) {
			left: 50%;
			width: 150px;
			height: 150px;
			animation-duration: 16s;
			}
			
			.bubbles span:nth-child(5) {
			left: 65%;
			width: 90px;
			height: 90px;
			animation-duration: 11s;
			}
			
			.bubbles span:nth-child(6) {
			left: 80%;
			width: 130px;
			height: 130px;
			animation-duration: 13s;
			}
			
			.bubbles span:nth-child(7) {
			left: 90%;
			width: 70px;
			height: 70px;
			animation-duration: 12s;
			}
			
		</style>
	</head>
	
	<body>
		<div class="bubbles">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
		<div class="container main-container">
			<div class="row justify-content-center w-100">
				<div class="col-lg-10">
					
					<div class="login-card shadow">
						
						<div class="row no-gutters">
							
							<!-- LEFT -->
							<div class="col-md-6 left-section">
								<img src="<?= base_url()?>images/TDS-group-logo-New.jpg">
								<h3 class="mt-4">TDS Management Consultant PVT. LTD.</h3>
								<p>Please login to continue</p>
								
								<img src="<?= base_url()?>images/signin-image.png" style="max-width: 80%;" class="mt-4">
							</div>
							
							<!-- RIGHT -->
							<div class="col-md-6 right-section">
								
								<h3 class="mb-4">Sign In</h3>
								<?php if($this->session->flashdata('errorMSG')) { ?>
									<div class="alert bg-danger notify" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>
										<?=$this->session->flashdata('errorMSG');?><a href="javascript:void(0)" class="pull-right close_notify"><em class="fa fa-lg fa-close"></em></a>
									</div>
								<?php } ?>
								<?php if($this->session->flashdata('successMSG')) { ?>
									<div class="alert bg-428bca notify" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>
										<?=$this->session->flashdata('successMSG');?><a href="javascript:void(0)" class="pull-right close_notify"><em class="fa fa-lg fa-close"></em></a>
									</div>
								<?php } ?>
								<!-- Flash message -->
								<span id="lbl_msg" class="text-danger"></span>
								
								<form method="post" action="<?php echo base_url('page/resetCheck'); ?>">
									
									<div class="form-group">
										<i class="fa fa-lock form-icon"></i>
										<input 
										type="password" 
										name="password" 
										id="password" 
										class="form-control" 
										placeholder="New Password" 
										required
										>
										<i class="fa fa-eye toggle-password" onclick="togglePassword()"></i>
									</div>
									
									<button type="submit" class="btn btn-primary btn-login mt-3">Reset</button>
									
								</form>
								
								<div class="links mt-3">
									<a href="signin">Login</a>
									<a href="signup">Create New Account</a>
								</div>
								
								<!-- SUPER ADMIN -->
								<div class="admin-box text-center">
									<p class="mb-1 font-weight-bold">Login By Admin Only</p>
									<a href="/superadmin" class="btn btn-outline-primary btn-sm">
										Super Admin Login
									</a>
								</div>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
		
		<!-- JS -->
		<script>
			function togglePassword() {
				var input = document.getElementById("password");
				if (input.type === "password") {
					input.type = "text";
					} else {
					input.type = "password";
				}
			}
		</script>
		
	</body>
</html>