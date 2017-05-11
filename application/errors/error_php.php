<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo lang("slogan"); ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
</head>
<body>
	<div class="container" style="margin-top: 40px; margin-bottom: -50px;">
		<div class="col-md-8 col-md-offset-2" style="padding: 20px;">
		<h6 style="margin: 0px; font-size: 30px; font-weight: 200; line-height: 3; text-shadow: 0 1px 2px rgba(0,0,0,.2); color:white; text-align: center;">
			A PHP Error was encountered :(
		</h6>
		<h4></h4>
		<pre style="color:white; background:none;">
			<p>Severity: <?php echo $severity; ?></p>
			<p>Message:  <?php echo $message; ?></p>
			<p>Filename: <?php echo $filepath; ?></p>
			<p>Line Number: <?php echo $line; ?></p>
		</pre>
		</div>
	</div>
</body>
</html>