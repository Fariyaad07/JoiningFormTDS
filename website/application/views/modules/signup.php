<!DOCTYPE html>
<html>
	<head>
		<title>Sign Up</title>
		
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<style>
			
			body {
			background: linear-gradient(135deg, #5f9cff, #6dd5ed);
			height: 100vh;
			display: flex;
			align-items: center;
			font-family: 'Segoe UI', sans-serif;
			}
			
			/* Card */
			.register-card {
			border-radius: 20px;
			overflow: hidden;
			width: 100%;
			}
			
			/* Left */
			.left-box {
			background: linear-gradient(135deg, #3a7bd5, #00d2ff);
			color: white;
			text-align: center;
			height: 100%;
			}
			
			.left-box img {
			max-width: 140px;
			}
			
			.left-box h3 {
			margin-top: 20px;
			}
			
			/* Right */
			.right-box {
			background: #fff;
			padding: 50px 40px !important;
			}
			
			/* Inputs */
			.form-group {
			position: relative;
			}
			
			.form-control {
			border-radius: 10px;
			height: 45px;
			padding-left: 40px;
			}
			
			.form-icon {
			position: absolute;
			top: 12px;
			left: 12px;
			color: #777;
			}
			
			.toggle-password {
			position: absolute;
			top: 12px;
			right: 12px;
			cursor: pointer;
			}
			
			/* Button */
			.btn-register {
			width: 100%;
			border-radius: 25px;
			height: 45px;
			font-weight: 600;
			}
			
			/* Mobile */
			@media(max-width:768px){
			.left-box {
			display: none;
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
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					
					<div class="register-card shadow-lg">
						<div class="row no-gutters">
							
							<!-- LEFT -->
							<div class="col-md-6 left-box">
								<img src="<?= base_url()?>images/TDS-group-logo-New.jpg">
								<h3>Create Account</h3>
								<p>Join us and get started</p>
								
								<img src="<?= base_url()?>images/signup-image.png" style="max-width: 80%;" class="mt-4">
							</div>
							
							<!-- RIGHT -->
							<div class="col-md-6 right-box">
								
								<h3 class="mb-4">Sign Up</h3>
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
								<form method="post" action="<?php echo base_url('page/register'); ?>">
									
									<div class="form-group">
										<i class="fa fa-user form-icon"></i>
										<input type="text" name="first_name" class="form-control" placeholder="First Name" required>
									</div>
									
									<div class="form-group">
										<i class="fa fa-user form-icon"></i>
										<input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
									</div>
									
									<div class="form-group">
										<i class="fa fa-envelope form-icon"></i>
										<input type="email" name="email" class="form-control" placeholder="Email" required>
									</div>
									
									<div class="form-group">
										<i class="fa fa-phone form-icon"></i>
										
										<input 
										type="text" 
										name="contact" 
										class="form-control" 
										placeholder="Phone Number"
										maxlength="10"
										pattern="[0-9]{10}"
										oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,10);"
										required
										>
									</div>
									
									<div class="form-group">
										<i class="fa fa-lock form-icon"></i>
										<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
										<i class="fa fa-eye toggle-password" onclick="togglePassword()"></i>
									</div>
									
									<button class="btn btn-primary btn-register mt-3">Create Account</button>
									
								</form>
								
								<div class="mt-3 text-center">
									<a href="signin">Already have an account? Sign In</a>
								</div>
								
								<div>
									<span id="lbl_msg" class="text-danger"></span>
								</div>
								
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<script>
			function togglePassword() {
				var input = document.getElementById("password");
				input.type = input.type === "password" ? "text" : "password";
			}
		</script>
		
	</body>
</html>