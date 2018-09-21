<?php 		
	$this->load->view('template/header');
?>
<div class="container">
	Your request has been completed.
	<br>
	<?php if(!isset($_SESSION['user_in'])): ?>
	     <a href="<?php echo base_url('login'); ?>"><i class="fa fa-sign-in"></i> <?php echo lang("login"); ?></a>
	<?php endif ?>
</div>
<?php
	$this->load->view('template/footer'); 
?>