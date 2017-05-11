<div class="container">

	<?php if(validation_errors() != NULL ): ?>
    <div class="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <?php echo validation_errors(); ?>
    </div>
    <?php endif ?>
    <?php //print_r($this->recaptcha->getError()); ?>

	<?php echo form_open_multipart('register'); ?>
		<div class="row">

			<div class="col-md-6 col-md-offset-3 swissbox">
			<p class="lead"><?php echo lang("userregister"); ?></p>

				<div class="form-group">
						<label for="username"><?php echo lang("username"); ?></label>
						<input type="text" class="form-control" id="username" value="<?php echo set_value('username'); ?>" placeholder="<?php echo lang("username"); ?>" name="username">
				</div>
				<div class="form-group">
						<label for="password"><?php echo lang("password"); ?></label>
						<input type="password" class="form-control" id="password" placeholder="<?php echo lang("password"); ?>" name="password">
				</div>
				<div class="form-group">
					<div class="fileinput fileinput-new" data-provides="fileinput">
						<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
								<img data-src="holder.js/100%x100%" alt="...">
						</div>
						<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
						<div>
								<span class="btn btn-default btn-file">
									<span class="fileinput-new"><span class="fui-image"></span>  <?php echo lang("selectimage"); ?></span>
									<span class="fileinput-exists"><span class="fui-gear"></span>  <?php echo lang("change"); ?></span>
									<input type="file" name="userfile">
								</span>
								<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput"><span class="fui-trash"></span>  <?php echo lang("remove"); ?></a>
						</div>
					</div>
				</div>
				<div class="form-group">
	    			<label for="email"><?php echo lang("email"); ?></label>
	    			<input type="text" class="form-control" id="email" placeholder="<?php echo lang("email"); ?>" value="<?php echo set_value('email'); ?>"  name="email">
	 			</div>
	 			<div class="form-group">
	    			<label for="cellPhone"><?php echo lang("cellphone"); ?></label>
	    			<input type="text" class="form-control" id="cellPhone" value="<?php echo set_value('cellPhone'); ?>" placeholder="<?php echo lang("cellphone"); ?>" name="cellPhone">
	 			</div>
	 			<div class="form-group">
	    			<label for="workPhone"><?php echo lang("workphone"); ?></label>
	    			<input type="text" class="form-control" id="workPhone" value="<?php echo set_value('workPhone'); ?>" placeholder="<?php echo lang("workphone"); ?>" name="workPhone">
	 			</div>
	 			<div class="form-group">
	    			<label for="fax"><?php echo lang("faxnumber"); ?></label>
	    			<input type="text" class="form-control" id="fax" value="<?php echo set_value('fax'); ?>" placeholder="<?php echo lang("faxnumber"); ?>" name="fax">
	 			</div>
				<div class="form-group">
						<label for="name"><?php echo lang("name"); ?></label>
						<input type="text" class="form-control" id="name" placeholder="<?php echo lang("name"); ?>" value="<?php echo set_value('name'); ?>" name="name">
				</div>
				<div class="form-group">
						<label for="surname"><?php echo lang("surname"); ?></label>
						<input type="text" class="form-control" id="surname" placeholder="<?php echo lang("surname"); ?>" value="<?php echo set_value('surname'); ?>"  name="surname">
				</div>
				<div class="form-group">
						<label for="jobTitle"><?php echo lang("job"); ?></label>
						<input type="text" class="form-control" id="jobTitle" value="<?php echo set_value('jobTitle'); ?>" placeholder="<?php echo lang("job"); ?>" name="jobTitle">
				</div>
				<div class="form-group">
						<label for="jobDescription"><?php echo lang("description"); ?></label>
						<textarea class="form-control" rows="3" name="description" value="<?php echo set_value('description'); ?>" id="description" placeholder="<?php echo lang("description"); ?>"></textarea>
				</div>
   		 	<?php echo $recaptcha_html; ?>
		  	<?php
/*					echo 'Lütfen aşağıda gördüğünüz kodu giriniz. <br>';
					echo $image;
					echo '<br><br><input class="form-control" type="text" name="captcha" value="" placeholder="kod alanı"/>';*/
				?>
				<hr>
				<button type="submit" class="btn btn-info"><?php echo lang("register"); ?></button>
			</div>
		</div>
	</form>
</div>
