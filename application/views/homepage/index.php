<div class="homemain" style="margin-top: -30px;">
	<div class="container text-center">
		<br>
		<div style="color: black;font-size: 28px;padding: 10px;margin-top: -30px; width: 1000px;" ><?php echo lang('slogan'); ?></div>
		<?php if ($this->session->userdata('user_in') == FALSE): ?>
			<div style="margin-top:450px;">
				<a class="btn btn-lg btn-success" style="font-size: 15px;padding: 10px 40px;" href="<?php echo base_url('register'); ?>"><?php echo lang("startusing"); ?></a>
			</div>
		<?php endif ?>
	</div>
</div>