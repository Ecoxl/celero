<?php //print_r($component); ?>
	<div class="col-md-6 col-md-offset-3">
		<?php echo form_open_multipart('edit_component/'.$companyID.'/'.$component['id']); ?>
			<p class="lead"><?php echo lang("editcomponent"); ?></p>
			<div class="form-group">
			    <label for="component_name"><?php echo lang("componentname"); ?> <span style="color:red;">*</span></label>
			   	<input class="form-control" id="component_name" name="component_name" placeholder="<?php echo lang("componentname"); ?>" value="<?php echo set_value('component_name',$component['component_name']); ?>">
		 	</div>

		 	<div class="form-group">
			  <label for="component_type"><?php echo lang("componenttype"); ?></label>
				<select id="component_type" class="info select-block" name="component_type">
					<option value="0"><?php echo lang("pleaseselect"); ?></option>
					<?php foreach ($ctypes as $ctype): ?>
						<?php if($component['type_name']==$ctype['name']) {$deger = TRUE;}else{$deger=False;} ?>
						<option value="<?php echo $ctype['id']; ?>" <?php echo set_select('component_type', $ctype['id'], $deger); ?>><?php echo $ctype['name']; ?></option>
					<?php endforeach ?>
				</select>
		 	</div>

			<div class="form-group">
				<label for="description"><?php echo lang("description"); ?></label>
				<input class="form-control" id="description" name="description" placeholder="<?php echo lang("description"); ?>" value="<?php echo set_value('description',$component['description']); ?>">
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-8">
						<label for="quantity"><?php echo lang("quantity"); ?> (<?php echo lang("annual"); ?>)</label>
						<input class="form-control" id="quantity" name="quantity" placeholder="<?php echo lang("quantity"); ?>" value="<?php echo set_value('quantity',$component['qntty']); ?>">
					</div>
					<div class="col-md-4">
						<label for="quantity"><?php echo lang("quantityunit"); ?></label>
						<select id="quantityUnit" class="info select-block" name="quantityUnit">
							<?php foreach ($units as $unit): ?>
								<?php if($component['qntty_unit_id']==$unit['id']) {$deger = TRUE;}else{$deger=False;} ?>
								<option value="<?php echo $unit['id']; ?>" <?php echo set_select('quantityUnit', $unit['id'], $deger); ?>><?php echo $unit['name']; ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-8">
						<label for="cost"><?php echo lang("supplycost"); ?> (<?php echo lang("annual"); ?>)</label>
						<input class="form-control" id="cost" name="cost" placeholder="Supply Cost of flow (number)" value="<?php echo set_value('cost',$component['supply_cost']); ?>">
					</div>
					<div class="col-md-4">
						<label for="cost"><?php echo lang("supplycostunit"); ?></label>
						<select id="costUnit" class="info select-block" name="costUnit">
							<?php $edeger = FALSE; ?>
							<?php $ddeger = FALSE; ?>
							<?php $tdeger = FALSE; ?>
							<?php $cdeger = FALSE; ?>
							<?php if($component['supply_cost_unit']=="Euro") {$edeger = TRUE;} ?>
							<?php if($component['supply_cost_unit']=="Dollar") {$ddeger = TRUE;} ?>
							<?php if($component['supply_cost_unit']=="TL") {$tdeger = TRUE;} ?>
							<?php if($component['supply_cost_unit']=="CHF") {$cdeger = TRUE;} ?>
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
						<label for="ocost"><?php echo lang("outputcost"); ?> (<?php echo lang("annual"); ?>)</label>
						<input class="form-control" id="ocost" name="ocost" placeholder="Output Cost of flow (number)" value="<?php echo set_value('ocost',$component['output_cost']); ?>">
					</div>
					<div class="col-md-4">
						<label for="ocostunit"><?php echo lang("outputcostunit"); ?></label>
						<select id="ocostunit" class="info select-block" name="ocostunit">
							<?php $edeger = FALSE; ?>
							<?php $ddeger = FALSE; ?>
							<?php $tdeger = FALSE; ?>
							<?php $cdeger = FALSE; ?>
							<?php if($component['output_cost_unit']=="Euro") {$edeger = TRUE;} ?>
							<?php if($component['output_cost_unit']=="Dollar") {$ddeger = TRUE;} ?>
							<?php if($component['output_cost_unit']=="TL") {$tdeger = TRUE;} ?>
							<?php if($component['output_cost_unit']=="CHF") {$cdeger = TRUE;} ?>
							<option value="Euro" <?php echo set_select('ocostunit', 'Euro', $edeger); ?>>Euro</option>
							<option value="Dollar" <?php echo set_select('ocostunit', 'Dollar', $ddeger); ?>>Dollar</option>
							<option value="TL" <?php echo set_select('ocostunit', 'TL', $tdeger); ?>>TL</option>
							<option value="CHF" <?php echo set_select('ocostunit', 'CHF', $cdeger); ?>>CHF</option>
						</select>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="quality"><?php echo lang("quality"); ?></label>
				<input class="form-control" id="quality" name="quality" placeholder="<?php echo lang("quality"); ?>" value="<?php echo set_value('quality',$component['data_quality']); ?>">
			</div>

			<div class="form-group">
				<label for="spot"><?php echo lang("substitute_potential"); ?></label>
				<input class="form-control" id="spot" name="spot" placeholder="<?php echo lang("substitute_potential"); ?>" value="<?php echo set_value('substitute_potential',$component['substitute_potential']); ?>">
			</div>
		  
		  <div class="form-group">
				<label for="comment"><?php echo lang("comments"); ?></label>
				<input class="form-control" id="comment" name="comment" placeholder="<?php echo lang("comments"); ?>" value="<?php echo set_value('comment',$component['comment']); ?>">
			</div>
		  
		  <button type="submit" class="btn btn-info"><?php echo lang("savedata"); ?></button>
		</form>
		<span class="label label-default"><span style="color:red;">*</span> <?php echo lang("labelarereq"); ?>.</span>

</div>
