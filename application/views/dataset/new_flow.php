	<script type="text/javascript">
		function getFlowId(){
		    var id = $('.selectize-input .item').html();
		    var isnum = /^\d+$/.test(id);
		    //alert(isnum);
		    if(isnum){
		    	alert("You can't enter only numerical characters as a flow name!");
		    	$("select[id=selectize] option").remove();
		    }
		    //console.log(id);
		    var newid = $('select[name=flowname]').val();
				var newisnum = /^\d+$/.test(newid);
				if(!newisnum && newid !=""){
					$('#flow-family').show("slow");
				}
		}
	</script>

	<div class="col-md-4 borderli" <?php if(validation_errors() == NULL ){echo "id='gizle'";} ?>>
		<?php echo form_open_multipart('new_flow/'.$companyID); ?>
			<p class="lead"><?php echo lang("addflow"); ?></p>
			<div class="form-group">
				<label for="selectize"><?php echo lang("flowname"); ?> <span style="color:red;">*</span></label>
				<select id="selectize" onchange="getFlowId()" class="info select-block" name="flowname">
					<option value=""><?php echo lang("pleaseselect"); ?></option>
					<?php foreach ($flownames as $flowname): ?>
						<option value="<?php echo $flowname['id']; ?>" <?php echo set_select('flowname', $flowname['id']); ?>><?php echo $flowname['name']; ?></option>
					<?php endforeach ?>
				</select>
		 	</div>
			<div class="form-group">
				<label for="flowtype"><?php echo lang("flowtype"); ?> <span style="color:red;">*</span></label>
				<select id="flowtype" class="info select-block" name="flowtype">
					<?php foreach ($flowtypes as $flowtype): ?>
						<option value="<?php echo $flowtype['id']; ?>" <?php echo set_select('flowtype', $flowtype['id']); ?>><?php echo $flowtype['name']; ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group" id="flow-family" style="display:none;">
				<label for="flowfamily"><?php echo lang("flowfamily"); ?> <span style="color:red;">*</span></label>
				<select id="flowfamily" class="info select-block" name="flowfamily">
					<option value="">Nothing Selected</option>
					<?php foreach ($flowfamilys as $flowfamily): ?>
						<option value="<?php echo $flowfamily['id']; ?>" <?php echo set_select('flowfamily', $flowfamily['id']); ?>><?php echo $flowfamily['name']; ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label for="charactertype"><?php echo lang("charactertype"); ?></label>
				<select id="charactertype" class="info select-block" name="charactertype">
						<option value="" <?php echo set_select('charactertype', ''); ?>><?php echo lang("pleaseselect"); ?></option>
						<option value="Recycling" <?php echo set_select('charactertype', 'Recycling'); ?>><?php echo lang("recycling"); ?></option>
						<option value="Emission" <?php echo set_select('charactertype', 'Emission'); ?>><?php echo lang("emission"); ?></option>
						<option value="Waste" <?php echo set_select('charactertype', 'Waste'); ?>><?php echo lang("waste"); ?></option>
				</select>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-8">
						<label for="quantity"><?php echo lang("quantity"); ?> (<?php echo lang("annual"); ?>) <span style="color:red;">*</span></label>
						<input class="form-control" id="quantity" name="quantity" placeholder="<?php echo lang("quantity"); ?>" value="<?php echo set_value('quantity'); ?>">
					</div>
					<div class="col-md-4">
						<label for="quantity"><?php echo lang("quantity"); ?> <?php echo lang("unit"); ?> <span style="color:red;">*</span></label>
						<select id="quantityUnit" class="info select-block" name="quantityUnit">
							<option value=""><?php echo lang("pleaseselect"); ?></option>
							<?php foreach ($units as $unit): ?>
								<option value="<?php echo $unit['id']; ?>" <?php echo set_select('quantityUnit', $unit['id']); ?>><?php echo $unit['name']; ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
			</div>
		  	<div class="form-group">
		    	<div class="row">
						<div class="col-md-8">
							<label for="cost"><?php echo lang("cost"); ?> (<?php echo lang("annual"); ?>) <span style="color:red;">*</span></label>
		    			<input class="form-control" id="cost" name="cost" placeholder="<?php echo lang("cost"); ?>" value="<?php echo set_value('cost'); ?>">
			    	</div>
						<div class="col-md-4">
							<label for="cost"><?php echo lang("costunit"); ?> <span style="color:red;">*</span></label>
							<select id="costUnit" class="info select-block" name="costUnit">
								<option value="TL" <?php echo set_select('costUnit', 'TL'); ?>>TL</option>
								<option value="Euro" <?php echo set_select('costUnit', 'Euro'); ?>>Euro</option>
								<option value="Dollar" <?php echo set_select('costUnit', 'Dollar'); ?>>Dollar</option>
								<option value="CHF" <?php echo set_select('costUnit', 'CHF'); ?>>CHF</option>
							</select>
						</div>
		  		</div>
		  	</div>
		  	<div class="form-group">
		  		<div class="row">
						<div class="col-md-8">
				  		<label for="ep">EP (<?php echo lang("annual"); ?>)</label>
				    	<input class="form-control" id="ep" name="ep" placeholder="EP (<?php echo lang("annual"); ?>) " value="<?php echo set_value('ep'); ?>">
				    </div>
						<div class="col-md-4">
							<label for="epUnit"><?php echo lang("epunit"); ?></label>
							<input type="text" class="form-control" id="epUnit" value="EP" name="epUnit" readonly>
						</div>
		  		</div>
		  	</div>

		  	<div class="form-group">
				  <label for="cf"><?php echo lang("chemicalformula"); ?></label>
				  <input class="form-control" id="cf" name="cf" placeholder="<?php echo lang("chemicalformula"); ?>" value="<?php echo set_value('cf'); ?>">
		  	</div>

				<div class="form-group">
					<label for="availability"><?php echo lang("availability"); ?></label>
					<select id="availability" class="info select-block" name="availability">
						<option value="true" <?php echo set_select('availability', 'true'); ?>><?php echo lang("available"); ?></option>
						<option value="false" <?php echo set_select('availability', 'false'); ?>><?php echo lang("notavailable"); ?></option>
					</select>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-8">
							<label for="conc"><?php echo lang("concentration"); ?></label>
							<input class="form-control" id="conc" name="conc" placeholder="<?php echo lang("concentration"); ?>" value="<?php echo set_value('conc'); ?>">
						</div>
						<div class="col-md-4">
							<label for="concunit"><?php echo lang("concentration"); ?> <?php echo lang("unit"); ?></label>
							<select id="concunit" class="info select-block" name="concunit">
								<option value="" <?php echo set_select('concunit', ''); ?>><?php echo lang("pleaseselect"); ?></option>
								<option value="%" <?php echo set_select('concunit', '%'); ?>>%</option>
								<option value="kg/m3" <?php echo set_select('concunit', 'kg/m3'); ?>>kg/m3</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-8">
							<label for="pres"><?php echo lang("pressure"); ?></label>
							<input class="form-control" id="pres" name="pres" placeholder="<?php echo lang("pressure"); ?>" value="<?php echo set_value('pres'); ?>">
						</div>
						<div class="col-md-4">
							<label for="presunit"><?php echo lang("presure"); ?> <?php echo lang("unit"); ?></label>
							<select id="presunit" class="info select-block" name="presunit">
								<option value=""><?php echo lang("pleaseselect"); ?></option>
								<option value="Pascal (Pa)" <?php echo set_select('presunit', 'Pascal (Pa)'); ?>>Pascal (Pa)</option>
								<option value="bar (Bar)" <?php echo set_select('presunit', 'bar (Bar)'); ?>>bar (Bar)</option>
								<option value="Standard atmosphere (atm)"  <?php echo set_select('presunit', 'Standard atmosphere (atm)'); ?>>Standard atmosphere (atm)</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="ph"><?php echo lang("ph"); ?></label>
					<input class="form-control" id="ph" name="ph" placeholder="<?php echo lang("ph"); ?>" value="<?php echo set_value('ph'); ?>">
				</div>

				<div class="form-group">
					<label for="state"><?php echo lang("state"); ?></label>
					<select id="state" class="info select-block" name="state">
						<option value="1" <?php echo set_select('state', '1'); ?>>Solid</option>
						<option value="2" <?php echo set_select('state', '2'); ?>>Liquid</option>
						<option value="3" <?php echo set_select('state', '3'); ?>>Gas</option>
					</select>
				</div>

				<div class="form-group">
					<label for="quality"><?php echo lang("quality"); ?></label>
					<input class="form-control" id="quality" name="quality" placeholder="<?php echo lang("quality"); ?>" value="<?php echo set_value('quality'); ?>">
				</div>

				<div class="form-group">
					<label for="oloc"><?php echo lang("outputlocation"); ?></label>
					<input class="form-control" id="oloc" name="oloc" placeholder="<?php echo lang("outputlocation"); ?>" value="<?php echo set_value('oloc'); ?>">
				</div>

<!--					<div class="form-group">
					<label for="odis">Output distance</label>
					<input class="form-control" id="odis" name="odis" placeholder="Output distance">
				</div>

				<div class="form-group">
					<label for="otrasmean">Output transport mean</label>
					<input class="form-control" id="otrasmean" name="otrasmean" placeholder="Output transport mean">
				</div>

				<div class="form-group">
					<label for="sdis">Supply distance</label>
					<input class="form-control" id="sdis" name="sdis" placeholder="Supply distance">
				</div>

				<div class="form-group">
					<label for="strasmean">Supply transport mean</label>
					<input class="form-control" id="strasmean" name="strasmean" placeholder="Supply transport mean">
				</div>

 				<div class="form-group">
					<label for="rtech">Recycling technology</label>
					<input class="form-control" id="rtech" name="rtech" placeholder="Recycling technology">
				</div> -->

				<div class="form-group">
					<label for="spot"><?php echo lang("substitute_potential"); ?></label>
					<input class="form-control" id="spot" name="spot" value="<?php echo set_value('spot'); ?>" placeholder="<?php echo lang("substitute_potential"); ?>">
				</div>

				<div class="form-group">
					<label for="desc"><?php echo lang("description"); ?></label>
					<input class="form-control" id="desc" name="desc" value="<?php echo set_value('desc'); ?>" placeholder="<?php echo lang("description"); ?>">
				</div>

				<div class="form-group">
					<label for="comment"><?php echo lang("comments"); ?></label>
					<input class="form-control" id="comment" name="comment" value="<?php echo set_value('comment'); ?>" placeholder="<?php echo lang("comments"); ?>">
				</div>

		  	<button type="submit" class="btn btn-info"><?php echo lang("addflow"); ?></button>
		</form>
		<span class="label label-default"><span style="color:red;">*</span> <?php echo lang("labelarereq"); ?></span>
		</div>
		<?php if(validation_errors() == NULL ): ?>
			<div class="col-md-12" id="buyukbas">
		<?php else: ?>
			<div class="col-md-8" id="buyukbas">
		<?php endif ?>
		<p class="lead pull-left"><?php echo lang("companyflows"); ?></p>
		<?php if(validation_errors() == NULL ): ?>
		<button id="ac" class="btn btn-warning" style="margin-left: 20px;"><?php echo lang("addflow"); ?></button>
		<?php endif ?>
		<table class="table table-bordered" style="font-size:12px;">
			<tr>
				<th><?php echo lang("flowname"); ?></th>
				<th><?php echo lang("flowtype"); ?></th>
				<th><?php echo lang("flowfamily"); ?></th>
				<th><?php echo lang("charactertype"); ?></th>
				<th><?php echo lang("quantity"); ?></th>
				<th><?php echo lang("cost"); ?></th>
				<th><?php echo lang("ep"); ?></th>
				<th><?php echo lang("chemicalformula"); ?></th>
				<th><?php echo lang("availability"); ?></th>
				<th><?php echo lang("concentration"); ?></th>
				<th><?php echo lang("pressure"); ?></th>
				<th><?php echo lang("ph"); ?></th>
				<th><?php echo lang("state"); ?></th>
				<th><?php echo lang("quality"); ?></th>
				<th><?php echo lang("outputlocation"); ?></th>
				<th><?php echo lang("substitute_potential"); ?></th>
				<th><?php echo lang("description"); ?></th>
				<th><?php echo lang("comments"); ?></th>
				<th style="width:100px;"><?php echo lang("manage"); ?></th>
			</tr>
			<?php foreach ($company_flows as $key=>$flow): ?>
				<tr>
					<?php if($company_flows[$key+1]['flowname'] == $company_flows[$key]['flowname']): ?>
						<td rowspan="2"><?php echo $flow['flowname']; ?></td>
					<?php elseif($company_flows[$key-1]['flowname'] == $company_flows[$key]['flowname']): ?>

					<?php else: ?>
						<td><?php echo $flow['flowname']; ?></td>
					<?php endif ?>
					<td><?php echo $flow['flowtype']; ?></td>
					<td><?php echo $flow['flowfamily']; ?></td>
					<td><?php echo $flow['character_type']; ?></td>
					<td><?php echo $flow['qntty'].' '.$flow['qntty_unit_name']; ?></td>
					<td><?php echo $flow['cost'].' '.$flow['cost_unit']; ?></td>
					<td><?php echo $flow['ep'].' '.$flow['ep_unit']; ?></td>
					<td><?php echo $flow['chemical_formula']; ?></td>
					<td><?php if($flow['availability']=="t"){echo "Available";}else{echo "Not Available";} ?></td>
					<td><?php echo $flow['concentration'].' '.$flow['concunit']; ?></td>
					<td><?php echo $flow['pression'].' '.$flow['presunit']; ?></td>
					<td><?php echo $flow['ph']; ?></td>
					<td><?php if($flow['state_id']=="1"){echo "Solid";}else if($flow['state_id']=="2"){echo "Liquid";}else{echo "Gas";} ?></td>
					<td><?php echo $flow['quality']; ?></td>
					<td><?php echo $flow['output_location']; ?></td>
					<td><?php echo $flow['substitute_potential']; ?></td>
					<td><?php echo $flow['description']; ?></td>
					<td><?php echo $flow['comment']; ?></td>


					<td>
						<a href="<?php echo base_url('edit_flow/'.$companyID.'/'.$flow['flow_id'].'/'.$flow['flow_type_id']);?>" class="label label-warning"><span class="fa fa-edit"></span> <?php echo lang("edit"); ?></button>
						<a href="<?php echo base_url('delete_flow/'.$companyID.'/'.$flow['id']);?>" class="label label-danger" onclick="return confirm('Are you sure you want to delete this flow?');"><span class="fa fa-times"></span> <?php echo lang("delete"); ?></button>
					</td>

				</tr>
			<?php endforeach ?>
		</table>
	</div>
	<script type="text/javascript">
		$( "#ac" ).click(function() {
			$("#buyukbas").attr("class", "col-md-8");
		  $( "#gizle" ).show( "slow" );
		  $( "#ac" ).hide( "slow" );
		});
	</script>