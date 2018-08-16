<?php 		
	$this->load->view('template/header');
?>
<div class="container">
	<div class="well">
		<p><b>User Manual</b></p>
		<br>
		<a href="<?php echo asset_url('CELEROusermanual.pdf'); ?>"><div  style="background-color:#2D8B42; color:white; text-align: center;"><?php echo lang("dl-usermanual"); ?>
		<span class="glyphicon glyphicon-book"></span></div></a>
		<br>
		<br>
		<br>
		<br>
	</div>
</div>
<?php
	$this->load->view('template/footer'); 
?>