<script type="text/javascript">
	function getProcessId(){
		var id = $('.selectize-input .item').html();
		var isnum = /^\d+$/.test(id);
		if(isnum){
			alert("You can't enter only numerical characters as a flow name!");
			$("select[id=selectize] option").remove();
		}
		var newid = $('select[name=process]').val();
		var newisnum = /^\d+$/.test(newid);
		if(!newisnum && newid !=""){
			$('#process-family').show("slow");
		}	
	}
</script>

		<div class="col-md-3 borderli">
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
		    	<select class="select-block" id="usedFlows" name="usedFlows">
			    	<?php foreach ($company_flows as $flow): ?>
						<option value="<?php echo $flow['cmpny_flow_id']; ?>"><?php echo $flow['flowname'].'('.$flow['flowtype'].')'; ?></option>
					<?php endforeach ?>
				</select>
	    </div>
			<div class="form-group">
				<label for="comment"><?php echo lang("comments"); ?></label>
				<textarea class="form-control" id="comment" name="comment" placeholder="<?php echo lang("comments"); ?>"></textarea>
			</div>
	    <button type="submit" class="btn btn-info"><?php echo lang("addprocess"); ?></button>
	    </form>
	    		<span class="label label-default"><span style="color:red;">*</span> <?php echo lang("labelarereq"); ?>.</span>
	    </div>
		<div class="col-md-9">
			<p class="lead"><?php echo lang("companyprocess"); ?></p>
			<table class="table table-bordered">
			<tr>
				<th><?php echo lang("processname"); ?></th>
				<th><?php echo lang("usedflows"); ?></th>
				<th><?php echo lang("comments"); ?></th>
				<th><?php echo lang("manage"); ?></th>
			</tr>
			<?php $son = ""; ?>
			<?php foreach ($cmpny_flow_prcss as $key=>$attribute): ?>
				<tr>
					<?php if($son !== $attribute['prcessname']): ?>
						<td rowspan="<?php echo $cmpny_flow_prcss_count[$attribute['prcessname']]; ?>"><?php echo $attribute['prcessname']; ?></td>
					<?php endif ?>
					<td>
						<?php echo $attribute['flowname'].'('.$attribute['flow_type_name'].')'; ?>
						<a href="<?php echo base_url('delete_process/'.$companyID.'/'.$attribute['company_process_id'].'/'.$attribute['company_flow_id']);?>" style="float: right;" class="label label-danger" value="<?php echo $attribute['prcessid']; ?>"><span class="fa fa-times"></span> <?php echo lang("delete"); ?>
					</td>
					<?php if($son !== $attribute['prcessname']): ?>
						<td rowspan="<?php echo $cmpny_flow_prcss_count[$attribute['prcessname']]; ?>"><?php echo $attribute['comment']; ?> 
						</td>
						<td rowspan="<?php echo $cmpny_flow_prcss_count[$attribute['prcessname']]; ?>">
							<a href="<?php echo base_url('edit_process/'.$companyID.'/'.$attribute['company_process_id']);?>" class="label label-warning" value="<?php echo $attribute['prcessid']; ?>"><span class="fa fa-edit"></span> <?php echo lang("edit"); ?>
						</td>
					<?php endif ?>
				</tr>
				<?php $son= $attribute['prcessname']; ?>
				<?php endforeach ?>
			</table>
		</div>