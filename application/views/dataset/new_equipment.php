	<div class="col-md-4 borderli">
		<div class="lead"><?php echo lang("addequipment"); ?></div>
			<?php echo form_open_multipart('new_equipment/'.$companyID); ?>
			<div class="form-group">
					<label for="status"><?php echo lang("equipmentname"); ?> <span style="color:red;">*</span></label>
					<div>	    			
				  	<select class="info select-block" name="equipment" id="equipment">
			  			<option value=""><?php echo lang("pleaseselect"); ?></option>
						<?php foreach ($equipmentName as $eqpmntName): ?>
						<option value="<?php echo $eqpmntName['id']; ?>"><?php echo $eqpmntName['name']; ?></option>
					<?php endforeach ?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label for="status"><?php echo lang("equipmenttype"); ?> <span style="color:red;">*</span></label>
					<div>	    			
			  		<select  class="select-block" id="equipmentTypeName" name="equipmentTypeName">
							<option value=""><?php echo lang("pleaseselect"); ?></option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="status"><?php echo lang("equipmentattname"); ?> <span style="color:red;">*</span></label>
					<div>	    			
			  		<select  class="select-block" id="equipmentAttributeName" name="equipmentAttributeName">
							<option value=""><?php echo lang("pleaseselect"); ?></option>
						</select>
					</div>
				</div>
				<div class="form-group">
				<div class="row">
					<div class="col-md-8">
						<label for="eqpmnt_attrbt_val"><?php echo lang("equipmentattvalue"); ?> <span style="color:red;">*</span></label>
						<input class="form-control" id="eqpmnt_attrbt_val" name="eqpmnt_attrbt_val" placeholder="<?php echo lang("equipmentattvalue"); ?>">
					</div>
					<div class="col-md-4">
						<label for="eqpmnt_attrbt_unit"><?php echo lang("equipmentattunit"); ?> <span style="color:red;">*</span></label>
						<select id="eqpmnt_attrbt_unit" class="info select-block" name="eqpmnt_attrbt_unit">
							<option value=""><?php echo lang("pleaseselect"); ?></option>
							<?php foreach ($units as $unit): ?>
								<option value="<?php echo $unit['id']; ?>"><?php echo $unit['name']; ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
			</div>
				<div class="form-group">
			  	<label for="description"><?php echo lang("usedprocess"); ?> <span style="color:red;">*</span></label>
			  	<select class="select-block" id="usedprocess" name="usedprocess">
			    	<?php foreach ($process as $prcss): ?>
						<option value="<?php echo $prcss['processid']; ?>"><?php echo $prcss['prcessname']; ?></option>
					<?php endforeach ?>
				</select>
				</div>
			  <button type="submit" class="btn btn-info"><?php echo lang("addequipment"); ?></button>
			</form>
			<span class="label label-default"><span style="color:red;">*</span> <?php echo lang("labelarereq"); ?>.</span>

		</div>
		<div class="col-md-8">
			<div class="lead"><?php echo lang("companyequipment"); ?></div>
			<table class="table table-striped table-bordered">
				<tr>
					<th><?php echo lang("equipmentname"); ?></th>
					<th><?php echo lang("equipmenttype"); ?></th>
					<th><?php echo lang("equipmentattname"); ?></th>
					<th><?php echo lang("equipmentattvalue"); ?></th>
					<th><?php echo lang("usedprocess"); ?></th>
					<th><?php echo lang("manage"); ?></th>
				</tr>
				<?php foreach ($informations as $info): ?>
				<tr>	
						<td><?php echo $info['eqpmnt_name']; ?></td>
						<td><?php echo $info['eqpmnt_type_name']; ?></td>
						<td><?php echo $info['eqpmnt_type_attrbt_name']; ?></td>
						<td><?php echo $info['eqpmnt_attrbt_val']; ?> <?php echo $info['unit']; ?></td>
						<td><?php echo $info['prcss_name']; ?></td>
						<td><a href="<?php echo base_url('ecotracking/'.$companyID.'/'.$info['cmpny_eqpmnt_id']);?>" class="label label-info"> Tracking Data</a>
						<a href="<?php echo base_url('delete_equipment/'.$companyID.'/'.$info['cmpny_eqpmnt_id']);?>" class="label label-danger" value="<?php echo $info['cmpny_eqpmnt_id']; ?>"><span class="fa fa-times"></span> <?php echo lang("delete"); ?></a></td>
				</tr>
				<?php endforeach ?>
			</table>
		</div>

	