		<script type="text/javascript">
		function getProcessId(){
		    var id = $('.selectize-input .item').html();
		    var isnum = /^\d+$/.test(id);
		    //alert(isnum);
		    if(isnum){
		    	alert("You can't enter only numerical characters as a flow name!");
		    	$("select[id=selectize] option").remove();
		    }
		    //console.log(id);
		    var newid = $('select[name=process]').val();
				var newisnum = /^\d+$/.test(newid);
				if(!newisnum && newid !=""){
					$('#process-family').show("slow");
				}
		}
	</script>

		<div class="col-md-4 borderli">
		<?php echo form_open_multipart('new_process/'.$companyID); ?>

			<p class="lead"><?php echo lang("addprocess"); ?></p>
			<div class="form-group">
	    	<label for="status"><?php echo lang("processname"); ?> <span style="color:red;">*</span></label>
				<select id="selectize" onchange="getProcessId()" name="process">
					<option value=""><?php echo lang("pleaseselect"); ?></option>
					<?php foreach ($process as $pro): ?>
						<option value="<?php echo $pro['id']; ?>"><?php echo $pro['name']; ?></option>
					<?php endforeach ?>
				</select>
 			</div>
 			<div class="form-group" id="process-family" style="display:none;">
				<label for="processfamily"><?php echo lang("processfamily"); ?> <span style="color:red;">*</span></label>
				<select id="processfamily" class="info select-block" name="processfamily">
					<?php foreach ($processfamilys as $processfamily): ?>
						<option value="<?php echo $processfamily['id']; ?>"><?php echo $processfamily['name']; ?></option>
					<?php endforeach ?>
				</select>
			</div>
 			<div class="form-group">
		    	<label for="description"><?php echo lang("usedflows"); ?> <span style="color:red;">*</span></label>
		    	<select multiple="multiple" class="select-block" id="usedFlows" name="usedFlows[]">
			    	<?php foreach ($company_flows as $flow): ?>
						<option value="<?php echo $flow['cmpny_flow_id']; ?>"><?php echo $flow['flowname'].'('.$flow['flowtype'].')'; ?></option>
					<?php endforeach ?>
				</select>
	    </div>
<!-- 	    <div class="form-group">
				<div class="row">
					<div class="col-md-8">
						<label for="min_rate_util">Minimum rate of utilization</label>
						<input class="form-control" id="min_rate_util" name="min_rate_util" placeholder="Minimum rate of utilization">
					</div>
					<div class="col-md-4">
						<label for="min_rate_util_unit">Utilization Unit</label>
						<select id="min_rate_util_unit" class="info select-block" name="min_rate_util_unit">
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
						<label for="typ_rate_util">Typical rate of utilization</label>
						<input class="form-control" id="typ_rate_util" name="typ_rate_util" placeholder="Typical rate of utilization">
					</div>
					<div class="col-md-4">
						<label for="typ_rate_util_unit">Utilization Unit</label>
						<select id="typ_rate_util_unit" class="info select-block" name="typ_rate_util_unit">
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
						<label for="max_rate_util">Maximum rate of utilization</label>
						<input class="form-control" id="max_rate_util" name="max_rate_util" placeholder="Maximum rate of utilization">
					</div>
					<div class="col-md-4">
						<label for="max_rate_util_unit">Utilization Unit</label>
						<select id="max_rate_util_unit" class="info select-block" name="max_rate_util_unit">
							<?php foreach ($units as $unit): ?>
								<option value="<?php echo $unit['id']; ?>"><?php echo $unit['name']; ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
			</div> -->
			<div class="form-group">
				<label for="comment"><?php echo lang("comments"); ?></label>
				<input class="form-control" id="comment" name="comment" placeholder="<?php echo lang("comments"); ?>">
			</div>
	    <button type="submit" class="btn btn-info"><?php echo lang("addprocess"); ?></button>
	    </form>
	    			<span class="label label-default"><span style="color:red;">*</span> <?php echo lang("labelarereq"); ?>.</span>

	    </div>
		<div class="col-md-8">
			<p class="lead"><?php echo lang("companyprocess"); ?></p>
			<table class="table table-bordered">
			<tr>
				<th><?php echo lang("processname"); ?></th>
				<th><?php echo lang("usedflows"); ?></th>
<!-- 				<th>Minimum rate of utilization</th>
				<th>Typical rate of utilization</th>
				<th>Maximum rate of utilization</th> -->
				<th><?php echo lang("comments"); ?></th>
				<th><?php echo lang("manage"); ?></th>
			</tr>
			<?php foreach ($cmpny_flow_prcss as $key=>$attribute): ?>
				<tr>
					<?php if($son !== $attribute['prcessname']): ?>
						<td rowspan="<?php echo $cmpny_flow_prcss_count[$attribute['prcessname']]; ?>"><?php echo $attribute['prcessname']; ?></td>
					<?php endif ?>

					<td><?php echo $attribute['flowname'].'('.$attribute['flow_type_name'].')'; ?></td>
<!-- 					<td><?php echo $attribute['min_rate_util']; ?> <?php echo $attribute['minrateu']; ?></td>
					<td><?php echo $attribute['typ_rate_util']; ?> <?php echo $attribute['typrateu']; ?></td>
					<td><?php echo $attribute['max_rate_util']; ?> <?php echo $attribute['maxrateu']; ?></td> -->
					<td><?php echo $attribute['comment']; ?></td>
					<td>
						<a href="<?php echo base_url('edit_process/'.$companyID.'/'.$attribute['company_process_id']);?>" class="label label-warning" value="<?php echo $attribute['prcessid']; ?>"><span class="fa fa-edit"></span> <?php echo lang("edit"); ?></button>
						<a href="<?php echo base_url('delete_process/'.$companyID.'/'.$attribute['company_process_id'].'/'.$attribute['company_flow_id']);?>" class="label label-danger" value="<?php echo $attribute['prcessid']; ?>"><span class="fa fa-times"></span> <?php echo lang("delete"); ?></button>
					</td>
				</tr>
				<?php $son= $attribute['prcessname']; ?>
				<?php endforeach ?>
			</table>
		</div>