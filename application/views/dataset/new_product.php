<div class="col-md-4 borderli">
			<p class="lead"><?php echo lang("addproduct"); ?></p>
			<?php echo form_open_multipart('new_product/'.$companyID); ?>
				<div class="form-group">
						<label for="product"><?php echo lang("productname"); ?> <span style="color:red;">*</span></label>
						<input class="form-control" id="product" name="product" placeholder="<?php echo lang("productname"); ?>">
				</div>				
				<div class="form-group">
					<div class="row">
							<div class="col-md-8">
								<label for="quantities"><?php echo lang("quantities"); ?></label>
								<input class="form-control" id="quantities" name="quantities" placeholder="<?php echo lang("quantities"); ?>">
							</div>
							<div class="col-md-4">
								<label for="qunit"><?php echo lang("quantitiesunit"); ?></label>
								<select id="qunit" class="info select-block" name="qunit">
									<option value=""><?php echo lang("pleaseselect"); ?></option>
									<?php foreach ($units as $unit): ?>
										<option value="<?php echo $unit['name']; ?>"><?php echo $unit['name']; ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>				
				<div class="form-group">
					<div class="row">
						<div class="col-md-8">
							<label for="ucost"><?php echo lang("unitcost"); ?></label>
							<input class="form-control" id="ucost" name="ucost" placeholder="<?php echo lang("unitcost"); ?>">
						</div>
						<div class="col-md-4">
							<label for="ucostu"><?php echo lang("unitcostunit"); ?></label>
							<select id="ucostu" class="info select-block" name="ucostu">
								<option value=""><?php echo lang("pleaseselect"); ?></option>
								<option value="TL">TL</option>
								<option value="Euro">Euro</option>
								<option value="Dollar">Dollar</option>
								<option value="CHF">CHF</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="tper"><?php echo lang("timeperiod"); ?></label>
					<select id="tper" class="info select-block" name="tper">
						<option value=""><?php echo lang("pleaseselect"); ?></option>
						<option value="Daily"><?php echo lang("daily"); ?></option>
						<option value="Weekly"><?php echo lang("weekly"); ?></option>
						<option value="Monthly"><?php echo lang("monthly"); ?></option>
						<option value="Annually"><?php echo lang("annually"); ?></option>
					</select>
				</div>
				<button type="submit" class="btn btn-info"><?php echo lang("addproduct"); ?></button>
			</form>
			<span class="label label-default"><span style="color:red;">*</span> <?php echo lang("labelarereq"); ?>.</span>

			
			</div>
			<div class="col-md-8">
			<p class="lead"><?php echo lang("companyproducts"); ?></p>
			<table class="table table-striped table-bordered">
			<tr>
				<th><?php echo lang("product"); ?></th>
				<th><?php echo lang("quantities"); ?></th>
				<th><?php echo lang("unitcost"); ?></th>
				<th><?php echo lang("timeperiod"); ?></th>
				<th style="width:100px;"><?php echo lang("manage"); ?></th>
			</tr>
			<?php foreach ($product as $pro): ?>
			<tr>	
				<td><?php echo $pro['name']; ?></td>
				<td><?php if(empty($pro['quantities']) or $pro['quantities'] == 0){echo "";} else {echo $pro['quantities'].' '.$pro['qunit']; } ?></td>
				<td><?php if(empty($pro['ucost']) or $pro['ucost'] == 0){echo "";} else {echo $pro['ucost'].' '.$pro['ucostu']; } ?></td>
				<td><?php echo $pro['tper']; ?></td>
				<td>
				<a href="<?php echo base_url('edit_product/'.$companyID.'/'.$pro['id']);?>" class="label label-warning"><span class="fa fa-edit"></span> <?php echo lang("edit"); ?></button>
				<a href="<?php echo base_url('delete_product/'.$companyID.'/'.$pro['id']);?>" class="label label-danger"><span class="fa fa-times"></span> <?php echo lang("delete"); ?></button></td>
			</tr>
			<?php endforeach ?>

			</table>
		</div>
