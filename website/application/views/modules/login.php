<!DOCTYPE html>
<html>
<head>
	<base href="<?=base_url('assets/');?>">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TDS Group</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	
		<style>
	    .bg-428bca{
	        background:#428bca;
	        color:#fff;
	    }
	</style>
	
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
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
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" method="post" action="<?=base_url('Page/loginSubmit');?>">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="employee_email" type="text" autofocus="" value="<?=get_cookie('employee_email');?>" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="employee_password" type="password"  value="<?=get_cookie('employee_password');?>" required>
							</div>
							<div class="checkbox">
								<label style="display:none;">
									<input name="remember" type="checkbox" value="Remember Me" <?php if(get_cookie('remember')) echo "checked"; ?>>Remember Me
								</label>
							
								
									<label>
									<a href="https://payslip.tdsgroup.co.in/forgot-pass/reset-pass.php">Forgot Password?</a>
								</label>
								
							</div>
							<button type="submit" class="btn btn-success">Login</button>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
