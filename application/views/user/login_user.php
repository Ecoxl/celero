<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 swissbox">
			<p class="lead"><?php echo lang("userlogin"); ?></p>

			<?php if(validation_errors() != NULL ): ?>
		    	<div class="alert">
		      		<button type="button" class="close" data-dismiss="alert">&times;</button>
		    		<?php echo validation_errors(); ?>
		    	</div>
		    <?php endif ?>
		    <?php echo form_open('login'); ?>
		    	<div class="form-group">
					<label for="username"><?php echo lang("username"); ?></label>
					<input type="text" class="form-control" id="username" value="<?php echo set_value('username'); ?>" placeholder="<?php echo lang("username"); ?>" name="username">
				</div>
				<div class="form-group">
					<label for="password"><?php echo lang("password"); ?></label>
					<input type="password" class="form-control" id="password" placeholder="<?php echo lang("password"); ?>" name="password">
				</div>

				<button type="submit" class="btn btn-primary"><?php echo lang("login"); ?></button>
				<hr>
				<a href="<?php echo base_url('new_password_email');?>"><?php echo lang("forgotyourpassword"); ?></a>
		    </form>
		</div>
	</div>
</div>