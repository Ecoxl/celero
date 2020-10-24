<?php echo $map['js']; ?>
<div class="container">
	<p class="lead"><?php echo lang("createcompany"); ?></p>

	<?php if(validation_errors() != NULL ): ?>
    <div class="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4>Form couldn't be saved</h4>
      	<p>
      		<?php echo validation_errors(); ?>
      	</p>
    </div>
  	<?php endif ?>

	<?php echo form_open_multipart('newcompany'); ?>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
	  				<div class="fileinput fileinput-new" data-provides="fileinput">
	    				<div class="fileinput-new thumbnail" style="width: 100%; height: 200px;">
	      					<img data-src="holder.js/100%x100%" alt="..." style="width: 100%; ">
	    				</div>
	    				<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
	    				<div>
	    					<small><? echo lang("imageinfo"); ?></small><br>
	      					<span class="btn btn-primary btn-block btn-file">
						        <span class="fileinput-new"><span class="fui-image"></span>  <?php echo lang("selectimage"); ?></span>
						        <span class="fileinput-exists"><span class="fui-gear"></span>  <?php echo lang("change"); ?></span>
						        <input type="file" name="userfile">
	      					</span>
	      					<a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput"><span class="fui-trash"></span>  <?php echo lang("remove"); ?></a>
	    				</div>
	  				</div>
				</div>
				<div class="alert"><?php echo lang("createcompanyinfo2"); ?></div>
			</div>
			<div class="col-md-8">
				<div class="form-group">
	    			<label for="companyName"><?php echo lang("companyname"); ?></label>
	    			<input type="text" class="form-control" id="companyName" placeholder="<?php echo lang("companyname"); ?>" value="<?php echo set_value('companyName'); ?>" name="companyName">
	 			</div>

	 			<div class="form-group">
	 				<label for="naceCode"><?php echo lang("nacecode"); ?></label>
	    			<button type="button" data-toggle="modal" data-target="#myModalNACE" class="btn btn-block btn-primary" id="nacecode-button"><?php echo lang("selectnace"); ?></button><br>
	    			<div class="row">
		    			<div class="col-md-12">
		    				<input type="text" class="form-control" placeholder="NACE Code" id="naceCode" name="naceCode" style="color:#333333;" value="<?php echo set_value('naceCode'); ?>" readonly/>
		    			</div>
		    		</div>
	 			</div>

                            
                <div class="form-group">
                    <label for="country">Country</label>
					<select id="selectize" name="country">
						<option value="" disabled selected><?php echo lang("pleaseselect"); ?></option>
						<?php foreach ($countries as $anc): ?>
							<option value="<?php echo $anc['id']; ?>"><?php echo $anc['country_name']; ?> </option>
						<?php endforeach?>
					</select>
					<small></small>
	 			</div>      
				<div class="form-group">
	    			<label for="email"><?php echo lang("email"); ?></label>
	    			<input type="text" class="form-control" id="email" placeholder="<?php echo lang("email"); ?>" value="<?php echo set_value('email'); ?>"  name="email">
	 			</div>
	 			<div class="form-group">
	    			<label for="workPhone"><?php echo lang("workphone"); ?></label>
	    			<input type="text" class="form-control" id="workPhone" placeholder="<?php echo lang("workphone"); ?>" value="<?php echo set_value('workPhone'); ?>" name="workPhone">
	 			</div>
	 			<div class="form-group">
	    			<label for="fax"><?php echo lang("faxnumber"); ?></label>
	    			<input type="text" class="form-control" id="fax" placeholder="<?php echo lang("faxnumber"); ?>" value="<?php echo set_value('fax'); ?>" name="fax">
	 			</div>
				<div class="form-group">
	    			<label for="coordinates"><?php echo lang("coordinates"); ?></label>
	    			<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-block btn-primary" id="coordinates" ><?php echo lang("selectonmap"); ?></button><br>
	    			<div class="row">
		    			<div class="col-md-6">
		    				<input type="text" class="form-control" id="lat" placeholder="<?php echo lang("lat"); ?>" name="lat" style="color:#333333;" value="<?php echo set_value('lat'); ?>" readonly/>
		    			</div>
		    			<div class="col-md-6">
		    				<input type="text" class="form-control" id="long" placeholder="<?php echo lang("long"); ?>" name="long" style="color:#333333;" value="<?php echo set_value('long'); ?>" readonly/>
		    			</div>
	    			</div>
	 			</div>
	 			<div class="form-group">
	    			<label for="address"><?php echo lang("address"); ?></label>
	    			<textarea class="form-control" rows="3" name="address" id="address" placeholder="<?php echo lang("address"); ?>"><?php echo set_value('address'); ?></textarea>
	 			</div>
	 			<div class="form-group">
	    			<label for="companyDescription"><?php echo lang("companydescription"); ?></label>
	    			<textarea class="form-control" rows="3" name="companyDescription" id="companyDescription" placeholder="<?php echo lang("companydescription"); ?>"><?php echo set_value('companyDescription'); ?></textarea>
	 			</div>
				 <div class="form-group">
	    			<label for="users"><?php echo lang("assignconsultant"); ?></label>
	    			<select multiple="multiple"  title="Choose at least one" class="select-block" id="users" name="users[]">
						<?php foreach ($users as $consultant): ?>
							<?php if (in_array($consultant['id'], $_POST['users'])) { ?>
								<option value="<?php echo $consultant['id']; ?>" selected><?php echo $consultant['name'].' '.$consultant['surname'].' ('.$consultant['user_name'].')'; ?></option>
							<?php } else { ?>
								<option value="<?php echo $consultant['id']; ?>"><?php echo $consultant['name'].' '.$consultant['surname'].' ('.$consultant['user_name'].')'; ?></option>
							<?php } ?>
						<?php endforeach ?>
					</select>
	 			</div>
	 			<button type="submit" class="btn btn-primary btn-block"><?php echo lang("createcompany"); ?></button>
			</div>
		</div>
	</form>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" 
		rendered="<?php echo $map['js']; ?>">
		<div class="modal-dialog">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title" id="myModalLabel">Click Map</h4>
			        <hr>
			        <div class="row">
			        	<div class="col-md-6">
			        		<input type="text" class="form-control" id="latId" name="lat" style="color:#333333;" readonly/>
			        	</div>
			        	<div class="col-md-6">
			        		<input type="text" class="form-control" id="longId" name="long"  style="color:#333333;" readonly/>
			        	</div>
			        </div>
			    </div>
			    <div class="modal-body">
			      	<?php echo $map['html']; ?>
			      	<br>
		      		<button type="button" data-dismiss="modal" class="btn btn-info btn-block" aria-hidden="true"><?php echo lang("done"); ?></button>
			    </div>
			    <div class="modal-footer"></div>
		    </div>
	 	</div>
	</div>
	<div class="modal fade" id="myModalNACE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog-nace">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title" id="myModalLabel"><?php echo lang("selectlevel4nace"); ?></h4>
			        <hr>
			        <div class="row">
			        	<div class="col-md-12">
			        		<input type="text" class="form-control" id="naceCode" name="nace-code" style="color:#333333;" readonly/>
			        	</div>
			  
			        </div>
			    </div>
			    <div class="modal-body">
			    	<!-- Miller column NACE Code selector -->
					<div id="miller_col"></div>
			      	<br>
		      		<button type="button" data-dismiss="modal" class="btn btn-info btn-block" aria-hidden="true"><?php echo lang("done"); ?></button>
			    </div>
			    <div class="modal-footer"></div>
		    </div>
	 	</div>
	</div>
</div>



<script type="text/javascript">
	$('#selectize').selectize({
		create: false
	});

	//js function for miller-coloumn NACE-code selector
	miller_column_nace();

</script>
