<script type="text/javascript">
	//already allocated table fill function
	function aatf() {
	//$( "#aprocess" ).text($('#prcss_name').val());
	//$( "#aflow" ).text($('#flow_name').val());
	//$( "#atype" ).text($('#flow_type_name').val());

		//define variables
 		var project_id = "<?php echo $this->session->userdata('project_id'); ?>";
 		var process_id = "<?php echo $allocation['prcss_id']; ?>";
 		var flow_id = "<?php echo $allocation['flow_id']; ?>";
 		var flow_type_id = "<?php echo $allocation['flow_type_id']; ?>";
 		var cmpny_id = "<?php echo $allocation['cmpny_id']; ?>";

		//get other allocation data for a selected flow and flow type
		$.ajax({ 
			type: "POST",
			dataType:'json',
			url: '<?php echo base_url('cpscoping/allocated_table'); ?>/'+flow_id+'/'+flow_type_id+'/'+cmpny_id+'/'+process_id+'/'+project_id, 
			success: function(data)
			{
				var vPool="";
				for (var i = 0; i < data.length; i++) {
					
					vPool += '<div class="col-md-4"><table style="width:100%;"><tr><td colspan="3" style="height:60px;"><?php echo lang("process"); ?>: ' + data[i].prcss_name + '</td></tr><tr><td><?php echo lang("amount"); ?></td><td>' + data[i].amount + ' ' + data[i].unit_amount + ' <span class="label label-info">' + data[i].error_amount + '%</span></td><td style="width:70px;"><?php echo lang("accuracyrate"); ?>: '+data[i].allocation_amount+'%</td></tr><tr><td><?php echo lang("cost"); ?></td><td>' + data[i].cost + ' ' + data[i].unit_cost + ' <span class="label label-info">' + data[i].error_cost + '%</span></td><td style="width:70px;"><?php echo lang("accuracyrate"); ?>: '+data[i].allocation_cost+'%</td></tr><tr><td><?php echo lang("ep"); ?></td><td>' + data[i].env_impact + ' ' + data[i].unit_env_impact + ' <span class="label label-info">' + data[i].error_ep + '%</span></td><td style="width:70px;"><?php echo lang("accuracyrate"); ?>: '+data[i].allocation_env_impact+'%</td></tr></table></div>';
					//alert(data);

				}
				$( "#aallocated" ).html(vPool);
				//console.log(data);
			}
		});
	}
</script>
<?php //print_r($allocation); ?>
<?php if(validation_errors() != NULL ): ?>
    <div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<div>Form couldn't be saved. Please fix the errors.</div>
      	<div class="popover-content">
      		<?php echo validation_errors(); ?>
      	</div>
    </div>
<?php endif ?>
<?php echo form_open_multipart('cpscoping/edit_allocation/'.$allocation['allocation_id']); ?>
	<div>
		<div class="col-md-3">
			<div><?php echo lang("allocation"); ?></div>
			<hr>
			<div><?php echo lang("process"); ?>: <?php echo $allocation['prcss_name']; ?></div>
			<div><?php echo lang("flowname"); ?>: <?php echo $allocation['flow_name']; ?></div>
			<div><?php echo lang("flowtype"); ?>: <?php echo $allocation['flow_type_name']; ?></div>
		</div>
		<div class="col-md-9">
			<div><?php echo lang("editallocation"); ?></div>
			<hr>
			<div class="form-group clearfix row">
				<label class="control-label col-md-3"><?php echo lang("amount"); ?></label>
				<label class="control-label col-md-3"><?php echo lang("amountunit"); ?></label>
				<label class="control-label col-md-3"><?php echo lang("allocation"); ?> (%)</label>
				<label class="control-label col-md-3"  data-toggle="tooltip"><?php echo lang("accuracyrate"); ?> (%) <i style="color:red;" class="fa fa-question-circle"></i></label>
				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('amount',$allocation['amount']); ?>" id="amount" placeholder="<?php echo lang("number"); ?>" name="amount">
				</div>
				<div class="col-md-3">
					<select name="unit_amount" id="unit_amount" class="btn-group select select-block">
						<option value=""><?php echo lang("pleaseselect"); ?></option>
						<?php foreach ($unit_list as $u): ?>
							<?php $deger = FALSE; ?>
							<?php if($allocation['unit_amount']==$u['name']) {$deger = TRUE;} ?>
							<option value="<?php echo $u['name']; ?>" <?php echo set_select('unit_amount', $u['name'], $deger); ?>><?php echo $u['name']; ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('allocation_amount',$allocation['allocation_amount']); ?>" id="allocation_amount" placeholder="<?php echo lang("percentage"); ?>" name="allocation_amount">
				</div>

				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('error_amount',$allocation['error_amount']); ?>" id="error_amount" placeholder="<?php echo lang("percentage"); ?>" name="error_amount">
				</div>
			</div>
			<hr>
			<div class="form-group clearfix row">
				<label class="control-label col-md-3"><?php echo lang("cost"); ?></label>
				<label class="control-label col-md-3"><?php echo lang("costunit"); ?></label>
				<label class="control-label col-md-3"><?php echo lang("allocation"); ?> (%)</label>
				<label class="control-label col-md-3" data-toggle="tooltip"><?php echo lang("accuracyrate"); ?> (%) <i style="color:red;" class="fa fa-question-circle"></i></label>
				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('cost',$allocation['cost']); ?>" id="cost" placeholder="<?php echo lang("number"); ?>" name="cost">
				</div>
				<div class="col-md-3">
					<select name="unit_cost" id="unit_cost" class="btn-group select select-block">
						<option value=""><?php echo lang("pleaseselect"); ?></option>
						<?php $edeger = FALSE; ?>
						<?php $ddeger = FALSE; ?>
						<?php $tdeger = FALSE; ?>
						<?php $cdeger = FALSE; ?>
						<?php if($allocation['unit_cost']=="Euro") {$edeger = TRUE;} ?>
						<?php if($allocation['unit_cost']=="Dollar") {$ddeger = TRUE;} ?>
						<?php if($allocation['unit_cost']=="TL") {$tdeger = TRUE;} ?>
						<?php if($allocation['unit_cost']=="CHF") {$cdeger = TRUE;} ?>
						<option value="Euro" <?php echo set_select('unit_cost', 'Euro', $edeger); ?>>Euro</option>
						<option value="Dollar" <?php echo set_select('unit_cost', 'Dollar', $ddeger); ?>>Dollar</option>
						<option value="TL" <?php echo set_select('unit_cost', 'TL', $tdeger); ?>>TL</option>
						<option value="CHF" <?php echo set_select('unit_cost', 'CHF', $cdeger); ?>>CHF</option>
					</select>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('allocation_cost',$allocation['allocation_cost']); ?>" id="allocation_cost" placeholder="<?php echo lang("percentage"); ?>" name="allocation_cost">
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('error_cost',$allocation['error_cost']); ?>" id="error_cost" placeholder="<?php echo lang("percentage"); ?>" name="error_cost">
				</div>
			</div>
			<hr>
			<div class="form-group clearfix row">
				<label class="control-label col-md-3"><?php echo lang("environmentalimpact"); ?></label>
				<label class="control-label col-md-3">EP</label>
				<label class="control-label col-md-3"><?php echo lang("allocation"); ?> (%)</label>
				<label class="control-label col-md-3" data-toggle="tooltip"><?php echo lang("accuracyrate"); ?> (%) <i style="color:red;" class="fa fa-question-circle"></i></label>
				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('env_impact',$allocation['env_impact']); ?>" id="env_impact" placeholder="<?php echo lang("number"); ?>" name="env_impact">
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" id="unit_env_impact" value="EP" name="unit_env_impact" readonly>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('allocation_env_impact',$allocation['allocation_env_impact']); ?>" id="allocation_env_impact" placeholder="<?php echo lang("percentage"); ?>" name="allocation_env_impact">
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('error_ep',$allocation['error_ep']); ?>" id="error_ep" placeholder="<?php echo lang("percentage"); ?>" name="error_ep">
				</div>
			</div>
			<hr>
			<div class="form-group clearfix row">
				<label class="control-label col-md-3"><?php echo lang("reference"); ?></label>
				<label class="control-label col-md-3"><?php echo lang("unit"); ?></label>
				<label class="control-label col-md-6"><?php echo lang("nameofref"); ?></label>
				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('reference',$allocation['reference']); ?>" id="reference" placeholder="<?php echo lang("number"); ?>" name="reference">
				</div>
				<div class="col-md-3">
					<select name="unit_reference" id="unit_reference" class="btn-group select select-block">
						<option value=""><?php echo lang("pleaseselect"); ?></option>
						<?php foreach ($unit_list as $u2): ?>
							<?php $deger2 = FALSE; ?>
							<?php if($allocation['unit_reference']==$u2['name']) {$deger2 = TRUE;} ?>
							<option value="<?php echo $u2['name']; ?>" <?php echo set_select('unit_reference', $u2['name'], $deger2); ?>><?php echo $u2['name']; ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" value="<?php echo set_value('nameofref',$allocation['nameofref']); ?>" id="nameofref" placeholder="<?php echo lang("nameofref"); ?>" name="nameofref">
				</div>
			</div>
			<hr>
			<div class="form-group clearfix row">
				<label class="control-label col-md-3">KPI</label>
				<label class="control-label col-md-3">KPI <?php echo lang("unit"); ?></label>
				<label class="control-label col-md-6"><?php echo lang("kpidef"); ?></label>
				<div class="col-md-3">
					<input type="text" class="form-control" id="kpi" placeholder="" name="kpi" readonly>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" id="unit_kpi" placeholder="" name="unit_kpi" readonly>
				</div>
				<div class="col-md-6">
					<input type="text" value="<?php echo set_value('kpidef',$allocation['kpidef']); ?>" class="form-control" id="kpidef" placeholder="<?php echo lang("kpidef"); ?>" name="kpidef">
				</div>
				
			</div>
			<div><button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> <?php echo lang("savedata"); ?></button></div>
			<div style="margin-top:30px;"><?php echo lang("alloheading5"); ?></div>
			<hr>
			<div id="aallocated" class="row">
<!-- 				<span id="aprocess"></span>
				<span id="aflow"></span>
				<span id="atype"></span> -->
				<div class="col-md-12">There is no previously recorded allocation of selected flow with flow type.</div>
			</div>
		</div>
	</div>
</form>
<script type="text/javascript">
	$("#amount").change(hesapla);
	$("#reference").change(hesapla);
	function hesapla() { 
		$("#kpi").val(Number(($("#amount").val()/$("#reference").val()).toFixed(5)));
	}
	$("#unit_amount").change(unit_hesapla);
	$("#unit_reference").change(unit_hesapla);
	function unit_hesapla(){
		$("#unit_kpi").val($("#unit_amount option:selected").text()+"/"+$("#unit_reference option:selected").text());
	}
</script>
<script type="text/javascript">	$( document ).ready(aatf); $( document ).ready(unit_hesapla); $( document ).ready(hesapla);</script>
<script type="text/javascript">
$('[data-toggle="tooltip"]').tooltip({
    position: 'top',
    content: '<span style="color:#fff"><?php echo lang("accuratei"); ?></span>',
    onShow: function(){
        $(this).tooltip('tip').css({
            backgroundColor: '#999',
            borderColor: '#999'
        });
    }
});
</script>