<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo lang("slogan"); ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- Loading Bootstrap -->
  <link href="<?php echo asset_url('bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">

  <!-- Loading Flat UI -->
  <link href="<?php echo asset_url('css/flat-ui.css'); ?>" rel="stylesheet">
  <link href="<?php echo asset_url('css/custom.css'); ?>" rel="stylesheet">
  <link href="<?php echo asset_url('css/selectize.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo asset_url('css/font-awesome.min.css'); ?>">
  <script src="<?php echo asset_url('js/jquery-1.10.2.min.js'); ?>"></script>
  <script src="<?php echo asset_url('js/bootstrap.min.js'); ?>"></script>
  <style type="text/css">
		body{
			background-color: #2d6b6a;
		}
  </style>
</head>
<body>
	<div style="text-align: center;">
		<a style="color:white; font-weight: bold; font-size:30px; line-height: 12px; padding: 20px; padding-bottom: 10px; margin-top:40px; display: block;"  href="<?php echo base_url(); ?>" style="color:white;">
			ECOMAN<span style="color:#f0f0f0; font-size:12px;"><br>Go homepage</span>
		</a>
	</div>
	<div class="container" style="margin-top: 40px; margin-bottom: -50px;">
		<div class="col-md-8 col-md-offset-2" style="padding: 20px;">
		<h6 style="margin: 0px;
font-size: 30px;
font-weight: 200;
line-height: 3;
text-shadow: 0 1px 2px rgba(0,0,0,.2); color:white; text-align: center;"><?php echo $heading; ?> :(</h6>
		<h3 style="color:white; background:none; text-align: center;"><?php echo $message; ?></h3>
		</div>
	</div>
</body>
</html>