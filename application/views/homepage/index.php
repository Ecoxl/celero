<div class="homemain" style="margin-top: -30px;">
	<div class="container text-center">
		<div style="color: white;font-size: 28px;padding: 10px;margin-top: 60px;"><?php echo lang('slogan'); ?></div>
		<?php if ($this->session->userdata('user_in') == FALSE): ?>
			<div style="margin-top:150px;">
				<a class="btn btn-lg btn-success" href="<?php echo base_url('register'); ?>"><?php echo lang("register"); ?></a>
				<a class="btn btn-lg btn-success" href="<?php echo base_url('login'); ?>"><?php echo lang('login'); ?></a>
			</div>
		<?php endif ?>
	</div>
</div>