	<div class="col-md-4 borderli">
		<?php echo form_open_multipart('new_component/'.$companyID); ?>
			<p class="lead"><?php echo lang("addcomponent"); ?></p>
			<div class="form-group">
			    <label for="component_name"><?php echo lang("componentname"); ?> <span style="color:red;">*</span></label>
			   	<input class="form-control" id="component_name" name="component_name" placeholder="<?php echo lang("componentname"); ?>">
		 	</div>

			<div class="form-group">
				<label for="component_name"><?php echo lang("connectedflow"); ?> <span style="color:red;">*</span></label>
				<select id="flowtype" class="info select-block" name="flowtype">
					<?php foreach ($flow_and_flow_type as $flows): ?>
					<option value="<?php echo $flows['value_id']; ?>"><?php echo $flows['flow_name'].'('.$flows['flow_type_name'].')'; ?></option>
					<?php endforeach ?>
				</select>
			</div>

		 	<div class="form-group">
			  <label for="component_type"><?php echo lang("componenttype"); ?></label>
				<select id="component_type" class="info select-block" name="component_type">
					<option value="0"><?php echo lang("pleaseselect"); ?></option>
					<?php foreach ($ctypes as $ctype): ?>
						<option value="<?php echo $ctype['id']; ?>"><?php echo $ctype['name']; ?></option>
					<?php endforeach ?>
				</select>
		 	</div>

			<div class="form-group">
				<label for="description"><?php echo lang("description"); ?></label>
				<input class="form-control" id="description" name="description" placeholder="<?php echo lang("description"); ?>">
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-8">
						<label for="quantity"><?php echo lang("quantity"); ?> (<?php echo lang("annual"); ?>)</label>
						<input class="form-control" id="quantity" name="quantity" placeholder="<?php echo lang("quantity"); ?>">
					</div>
					<div class="col-md-4">
						<label for="quantity"><?php echo lang("quantityunit"); ?></label>
						<select id="quantityUnit" class="info select-block" name="quantityUnit">
							<option value=""><?php echo lang("pleaseselect"); ?></option>
							<?php foreach ($units as $unit): ?>
								<option value="<?php echo $unit['id']; ?>"><?php echo $unit['name']; ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-8">
						<label for="cost"><?php echo lang("supplycost"); ?> (<?php echo lang("annual"); ?>)</label>
						<input class="form-control" id="cost" name="cost" placeholder="<?php echo lang("supplycost"); ?>">
					</div>
					<div class="col-md-4">
						<label for="cost"><?php echo lang("supplycostunit"); ?></label>
						<select id="costUnit" class="info select-block" name="costUnit">
							<option value="TL">TL</option>
							<option value="Euro">Euro</option>
							<option value="Dollar">Dollar</option>
							<option value="CHF">CHF</option>
						</select>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-8">
						<label for="ocost"><?php echo lang("outputcost"); ?> (<?php echo lang("annual"); ?>)</label>
						<input class="form-control" id="ocost" name="ocost" placeholder="<?php echo lang("outputcost"); ?>">
					</div>
					<div class="col-md-4">
						<label for="ocostunit"><?php echo lang("outputcostunit"); ?></label>
						<select id="ocostunit" class="info select-block" name="ocostunit">
							<option value="TL">TL</option>
							<option value="Euro">Euro</option>
							<option value="Dollar">Dollar</option>
							<option value="Dollar">CHF</option>
						</select>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="quality"><?php echo lang("quality"); ?></label>
				<input class="form-control" id="quality" name="quality" placeholder="<?php echo lang("quality"); ?>">
			</div>

			<div class="form-group">
				<label for="spot"><?php echo lang("substitute_potential"); ?></label>
				<input class="form-control" id="spot" name="spot" placeholder="<?php echo lang("substitute_potential"); ?>">
			</div>
		  
		  <div class="form-group">
				<label for="comment"><?php echo lang("comments"); ?></label>
				<input class="form-control" id="comment" name="comment" placeholder="<?php echo lang("comments"); ?>">
			</div>
		  
		  <button type="submit" class="btn btn-info"><?php echo lang("addcomponent"); ?></button>
		</form>
		<span class="label label-default"><span style="color:red;">*</span> <?php echo lang("labelarereq"); ?>.</span>

		</div>
		<div class="col-md-8">
		<p class="lead"><?php echo lang("companycomponents"); ?></p>
		<table class="table table-striped table-bordered">
			<tr>
				<th><?php echo lang("flowname"); ?></th>
				<th><?php echo lang("componentname"); ?></th>
				<th><?php echo lang("componenttype"); ?></th>
				<th><?php echo lang("description"); ?></th>
				<th><?php echo lang("quantity"); ?></th>
				<th><?php echo lang("supplycost"); ?></th>
				<th><?php echo lang("outputcost"); ?></th>
				<th><?php echo lang("quality"); ?></th>
				<th><?php echo lang("substitute_potential"); ?></th>
				<th><?php echo lang("comments"); ?></th>
				<th style="width:100px;"><?php echo lang("manage"); ?></th>
			</tr>
			<?php foreach ($component_name as $component): ?>
				<tr>
					<td><?php echo $component['flow_name']; ?> (<?php echo $component['flow_type_name']; ?>)</td>
					<td><?php echo $component['component_name']; ?></td>
					<td><?php echo $component['type_name']; ?></td>
					<td><?php echo $component['description']; ?></td>
					<td><?php echo $component['qntty']; ?> <?php echo $component['qntty_name']; ?></td>
					<td><?php echo $component['supply_cost']; ?> <?php echo $component['supply_cost_unit']; ?></td>
					<td><?php echo $component['output_cost']; ?> <?php echo $component['output_cost_unit']; ?></td>
					<td><?php echo $component['data_quality']; ?></td>
					<td><?php echo $component['substitute_potential']; ?></td>
					<td><?php echo $component['comment']; ?></td>
					<td>
						<a href="<?php echo base_url('edit_component/'.$companyID.'/'.$component['id']);?>" class="label label-warning" value="<?php echo $component['id']; ?>"><span class="fa fa-edit"></span> <?php echo lang("edit"); ?></a>
						<a href="<?php echo base_url('delete_component/'.$companyID.'/'.$component['id']);?>" class="label label-danger" value="<?php echo $component['id']; ?>"><span class="fa fa-times"></span> <?php echo lang("delete"); ?></a>
					</td>
			
				</tr>
			<?php endforeach ?>
		</table>
		</div>