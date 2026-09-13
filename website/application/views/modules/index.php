<!DOCTYPE html>
<html>
<head>
	<base href="<?=base_url('assets/');?>">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="INTELGC Solutions Pvt. Ltd." name="author" />
	<title>TDS Group</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body style="background-color: #2968a8">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-body" style="text-align: center; height: 60vh">
						<fieldset>
							<img src="<?php echo file_upload_base_url($SITE[0]['site_logo']);?>" style="width: 150px; padding-bottom: 75px">
							<a href="<?=front_base_url('login')?>" class="btn btn-primary btn-block btn-lg">Login</a><br>
							<a href="<?=front_base_url('validate')?>" class="btn btn-info btn-block btn-lg">Registration</a>
						</fieldset>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
