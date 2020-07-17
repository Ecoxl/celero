	<?php //print_r($flow); ?>
	<div class="col-md-6 col-md-offset-3">
	<?php if(validation_errors() != NULL ): ?>
	    <div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	      	<div class="popover-content">
	      		<?php echo validation_errors(); ?>
	      	</div>
	    </div>
	<?php endif ?>
		<?php echo form_open_multipart('edit_flow/'.$companyID.'/'.$flow['flow_id'].'/'.$flow['flow_type_id']); ?>
			<p class="lead"><?php echo lang("editflow"); ?></p>
			<div class="well">
				<div><?php echo lang("flowname"); ?>: <?php echo $flow['flowname']; ?></div>
				<div><?php echo lang("flowtype"); ?>: <?php echo $flow['flowtype']; ?></div>
				<div><?php echo lang("flowfamily"); ?>: <?php echo $flow['flowfamily']; ?></div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-8">
						<label for="quantity"><?php echo lang("quantity"); ?> (<?php echo lang("annual"); ?>) 
							<span style="color:red;">*
								<small><?php echo lang("mandatory"); ?></small>
							</span>
						</label>
						<input class="form-control" id="quantity" name="quantity" placeholder="<?php echo lang("quantity"); ?>" value="<?php echo set_value('quantity',$flow['qntty']); ?>">
					</div>
					<div class="col-md-4">
						<label for="quantityUnit"><?php echo lang("quantity"); ?> <?php echo lang("unit"); ?> <span style="color:red;">*</span></label>
					    <select id="selectize-units" class="info select-block" name="quantityUnit"> 
		                    <option value="" disabled selected><?php echo lang("pleaseselect"); ?></option>
		                    <?php foreach ($units as $unit): ?>
		                    	<!-- sets the "qntty unit" in the dropdown by setting set_flow_unit to TRUE if id equals -->
		                    	<?php 
		                    		$set_flow_unit = FALSE;
		                    		if ($flow['qntty_unit_id'] == $unit['id']) {
		                    			$set_flow_unit = TRUE;
		                    		}
		                    	?>
		                        <option value="<?php echo $unit['id']; ?>" <?php echo set_select('quantityUnit', $unit['id'], $set_flow_unit); ?>><?php echo $unit['name']; ?></option>
		                    <?php endforeach ?>
		                </select>
					</div>
				</div>
			</div>
		  	<div class="form-group">
		    	<div class="row">
						<div class="col-md-8">
							<label for="cost"><?php echo lang("cost"); ?> (<?php echo lang("annual"); ?>) <span style="color:red;">*</span></label>
		    			<input class="form-control" id="cost" name="cost" placeholder="<?php echo lang("cost"); ?>" value="<?php echo set_value('cost',$flow['cost']); ?>">
			    	</div>
						<div class="col-md-4">
							<label for="cost"><?php echo lang("costunit"); ?> <span style="color:red;">*</span></label>
							<select id="costUnit" class="info select-block" name="costUnit">
								<?php $edeger = FALSE; ?>
								<?php $ddeger = FALSE; ?>
								<?php $tdeger = FALSE; ?>
								<?php $cdeger = FALSE; ?>
								<?php if($flow['cost_unit_id']=="Euro") {$edeger = TRUE;} ?>
								<?php if($flow['cost_unit_id']=="Dollar") {$ddeger = TRUE;} ?>
								<?php if($flow['cost_unit_id']=="TL") {$tdeger = TRUE;} ?>
								<?php if($flow['cost_unit_id']=="CHF") {$cdeger = TRUE;} ?>
								<option value="Euro" <?php echo set_select('costUnit', 'Euro', $edeger); ?>>Euro</option>
								<option value="Dollar" <?php echo set_select('costUnit', 'Dollar', $ddeger); ?>>Dollar</option>
								<option value="TL" <?php echo set_select('costUnit', 'TL', $tdeger); ?>>TL</option>
								<option value="CHF" <?php echo set_select('costUnit', 'CHF', $cdeger); ?>>CHF</option>
							</select>
						</div>
		  		</div>
		  	</div>
		  	<div class="form-group">
		  		<div class="row">
						<div class="col-md-8">
				  		<label for="ep">EP (<?php echo lang("annual"); ?>)</label>
				    	<input class="form-control" id="ep" name="ep" placeholder="EP" value="<?php echo set_value('ep',$flow['ep']); ?>">
				    </div>
						<div class="col-md-4">
							<label for="epUnit"><?php echo lang("epunit"); ?></label>
							<input type="text" class="form-control" id="epUnit" value="EP" name="epUnit" readonly>
						</div>
		  		</div>
		  	</div>	  	

			<!--hidden placeholder input (set to "true") for deactivated "availability" selection -->
			<div class="form-group">
				<input class="form-control" id="availability" name="availability" type="hidden" value="<?php echo set_value('availability', 'true'); ?>">
			</div>					

			<div class="form-group">
				<label for="state"><?php echo lang("state"); ?></label>
				<select id="state" class="info select-block" name="state">
					<?php $x = FALSE; ?>
					<?php $y = FALSE; ?>
					<?php $z = FALSE; ?>
					<?php $w = FALSE; ?>
					<?php if($flow['state_id']=="1") {$x = TRUE;} ?>
					<?php if($flow['state_id']=="2") {$y = TRUE;} ?>
					<?php if($flow['state_id']=="3") {$z = TRUE;} ?>
					<?php if($flow['state_id']=="4") {$w = TRUE;} ?>
					<option value="1" <?php echo set_select('state', '1', $x); ?>>Solid</option>
					<option value="2" <?php echo set_select('state', '2', $y); ?>>Liquid</option>
					<option value="3" <?php echo set_select('state', '3', $z); ?>>Gas</option>
					<option value="4" <?php echo set_select('state', '4', $w); ?>>n/a</option>				
				</select>
			</div>

			<div class="form-group">
				<label for="desc"><?php echo lang("description"); ?></label>
					<textarea class="form-control" rows="5" id="desc" name="desc" placeholder="<?php echo lang("description"); ?>"><?php echo set_value('description',$flow['description']); ?></textarea>
			</div>

		  	<button type="submit" class="btn btn-info"><?php echo lang("savedata"); ?></button>
		</form>
		<span class="label label-default"><span style="color:red;">*</span> <?php echo lang("labelarereq"); ?>.</span>
		</div>
<script type="text/javascript">
    $('#selectize-units').selectize({
        create: false
    });
</script>
