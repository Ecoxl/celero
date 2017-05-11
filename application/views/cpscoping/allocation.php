<script type="text/javascript">
var pathname = window.location.pathname;
var prj_id = pathname.split("/")[3];
var cmpny_id = pathname.split("/")[4];
$(document).ready(function() {
    $("#prcss_name").change(function() {
    	var prcss_id = $( "#prcss_name").val();
        $('#flow_name').children().remove();
        $('#flow_type_name').children().remove();
        $.ajax({
            type: "POST",
            dataType:'json',
            url: '<?php echo base_url('cp_allocation_array');?>/'+cmpny_id,
            success: function(data)
            {
            	$('#flow_name').append('<option value=""><?php echo lang("pleaseselect"); ?></option>');
           		for(var k = 0 ; k < data.length ; k++){
           			if(data[k].company_process_id == prcss_id){
                    	$('#flow_name').append('<option value="'+data[k].flow_id+'">'+data[k].flowname+'</option>');
                    }
                }
                $('#flow_type_name').append('<option value=""><?php echo lang("pleaseselect"); ?></option>');
           		for(var k = 0 ; k < data.length ; k++){
           			if(data[k].company_process_id == prcss_id){
           					if(!optionExists(data[k].flow_type_id)){
                    	$('#flow_type_name').append('<option value="'+data[k].flow_type_id+'">'+data[k].flow_type_name+'</option>');
           					}
                    }
                }
            }
        });
    });
});

function optionExists(val) {
  return $("#flow_type_name option[value='" + val + "']").length !== 0;
}

//already allocated table fill function
function aatf() {
/*		$( "#aprocess" ).text($('#prcss_name').val());
		$( "#aflow" ).text($('#flow_name').val());
		$( "#atype" ).text($('#flow_type_name').val());*/

		//define variables
 		var project_id = "<?php echo $this->session->userdata('project_id'); ?>";
 		var process_id = $('#prcss_name').val();
 		var flow_id = $('#flow_name').val();
 		var flow_type_id = $('#flow_type_name').val();
 		var cmpny_id = "<?php echo $this->uri->segment(3); ?>";

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
<?php if(validation_errors() != NULL ): ?>
    <div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<div>Form couldn't be saved. Please fix the errors.</div>
      	<div class="popover-content">
      		<?php echo validation_errors(); ?>
      	</div>
    </div>
<?php endif ?>
<?php echo form_open_multipart('cpscoping/'.$project_id.'/'.$company_id.'/allocation'); ?>
	<div>
		<div class="col-md-3">
			<div><span class="badge">1</span> <?php echo lang("alloheading1"); ?></div>
			<hr>
			<div class="form-group row">
				<label for="prcss_name" class="control-label col-md-12"><?php echo lang("selectprocess"); ?></label>
				<div class="col-md-12">
					<select name="prcss_name" id="prcss_name" onchange="aatf()" class="btn-group select select-block">
						<option value=""><?php echo lang("pleaseselect"); ?></option>
						<?php $kontrol = array(); $index = 0;?>
						<?php for($i = 0 ; $i < sizeof($prcss_info) ; $i++): ?>
							<option value="<?php echo $prcss_info[$i]['company_process_id']; ?>"><?php echo $prcss_info[$i]['prcessname']; ?></option>
						<?php endfor ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label for="flow_name" class="control-label col-md-12"><?php echo lang("selectflow"); ?></label>
				<div class="col-md-12">
					<select name="flow_name" id="flow_name" onchange="aatf()" class="btn-group select select-block">
						<option value=""><?php echo lang("pleaseselect"); ?></option>
					</select>
				</div>
			</div>

			<div class="form-group clearfix row">
				<label for="flow_type_name" class="control-label col-md-12"><?php echo lang("selectflowtype"); ?></label>
				<div class="col-md-12">
					<select name="flow_type_name" id="flow_type_name" onchange="aatf()" class="btn-group select select-block">
						<option value=""><?php echo lang("pleaseselect"); ?></option>
					</select>
				</div>
			</div>
			<?php //print_r($company_flows); ?>
			<div><?php echo lang("companyflows"); ?></div>
			<hr>
			<?php if(!empty($company_flows)): ?>
				<table class="table" style="font-size:12px;">
					<tr>
						<th><?php echo lang("name"); ?></th><th><?php echo lang("amount"); ?></th><th><?php echo lang("cost"); ?></th>
					</tr>
				<?php foreach ($company_flows as $f ): ?>
					<tr><td><?php echo $f['flowname']; ?></td><td><?php echo $f['qntty']; ?> <?php echo $f['qntty_unit_name']; ?></td><td><?php echo $f['cost']; ?> <?php echo $f['cost_unit']; ?></td></tr>
				<?php endforeach ?>
				</table>
			<?php else: ?>
				<?php echo lang("alloheading2"); ?>
			<?php endif ?>
			<div><?php echo lang("companyproducts"); ?></div>
			<hr>
			<?php if(!empty($product)): ?>
				<table class="table" style="font-size:12px;">
					<tr>
						<th><?php echo lang("name"); ?></th><th><?php echo lang("quantity"); ?></th><th><?php echo lang("cost"); ?></th><th><?php echo lang("period"); ?></th>
					</tr>
				<?php foreach ($product as $p ): ?>
					<tr><td><?php echo $p['name']; ?></td><td><?php echo $p['quantities']; ?> <?php echo $p['qunit']; ?></td><td><?php echo $p['ucost']; ?> <?php echo $p['ucostu']; ?></td><td><?php echo $p['tper']; ?></td></tr>
				<?php endforeach ?>
				</table>
			<?php else: ?>
				<?php echo lang("alloheading3"); ?>
			<?php endif ?>
		</div>
		<div class="col-md-9">
			<div><span class="badge">2</span> <?php echo lang("alloheading4"); ?></div>
			<hr>
			<div class="form-group clearfix row">
				<label class="control-label col-md-3"><?php echo lang("amount"); ?></label>
				<label class="control-label col-md-3"><?php echo lang("amountunit"); ?></label>
				<label class="control-label col-md-3"><?php echo lang("allocation"); ?> (%)</label>
				<label class="control-label col-md-3" data-toggle="tooltip"><?php echo lang("accuracyrate"); ?> (%) <i style="color:red;" class="fa fa-question-circle"></i></label>
				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('amount'); ?>" id="amount" placeholder="<?php echo lang("number"); ?>" name="amount">
				</div>
				<div class="col-md-3">
					<select name="unit_amount" id="unit_amount" class="btn-group select select-block">
						<option value=""><?php echo lang("pleaseselect"); ?></option>
						<?php foreach ($unit_list as $u): ?>
							<option value="<?php echo $u['name']; ?>" <?php echo set_select('unit_amount', $u['name']); ?>><?php echo $u['name']; ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('allocation_amount'); ?>" id="allocation_amount" placeholder="<?php echo lang("percentage"); ?>" name="allocation_amount">
				</div>

				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('error_amount'); ?>" id="error_amount" placeholder="<?php echo lang("percentage"); ?>" name="error_amount">
				</div>
			</div>
			<hr>
			<div class="form-group clearfix row">
				<label class="control-label col-md-3"><?php echo lang("cost"); ?></label>
				<label class="control-label col-md-3"><?php echo lang("costunit"); ?></label>
				<label class="control-label col-md-3"><?php echo lang("allocation"); ?> (%)</label>
				<label class="control-label col-md-3" data-toggle="tooltip"><?php echo lang("accuracyrate"); ?> (%) <i style="color:red;" class="fa fa-question-circle"></i></label>
				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('cost'); ?>" id="cost" placeholder="<?php echo lang("number"); ?>" name="cost">
				</div>
				<div class="col-md-3">
					<select name="unit_cost" id="unit_cost" class="btn-group select select-block">
						<option value=""><?php echo lang("pleaseselect"); ?></option>
						<option value="Euro" <?php echo set_select('unit_cost', 'Euro'); ?>>Euro</option>
						<option value="Dollar" <?php echo set_select('unit_cost', 'Dolar'); ?>>Dollar</option>
						<option value="TL" <?php echo set_select('unit_cost', 'TL'); ?>>TL</option>
						<option value="CHF" <?php echo set_select('unit_cost', 'CHF'); ?>>CHF</option>
					</select>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('allocation_cost'); ?>" id="allocation_cost" placeholder="<?php echo lang("percentage"); ?>" name="allocation_cost">
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('error_cost'); ?>" id="error_cost" placeholder="<?php echo lang("percentage"); ?>" name="error_cost">
				</div>
			</div>
			<hr>
			<div class="form-group clearfix row">
				<label class="control-label col-md-3"><?php echo lang("environmentalimpact"); ?></label>
				<label class="control-label col-md-3"><?php echo lang("ep"); ?></label>
				<label class="control-label col-md-3"><?php echo lang("allocation"); ?> (%)</label>
				<label class="control-label col-md-3" data-toggle="tooltip"><?php echo lang("accuracyrate"); ?> (%) <i style="color:red;" class="fa fa-question-circle"></i></label>
				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('env_impact'); ?>" id="env_impact" placeholder="<?php echo lang("number"); ?>" name="env_impact">
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" id="unit_env_impact" value="EP" name="unit_env_impact" readonly>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('allocation_env_impact'); ?>" id="allocation_env_impact" placeholder="<?php echo lang("percentage"); ?>" name="allocation_env_impact">
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('error_ep'); ?>" id="error_ep" placeholder="<?php echo lang("percentage"); ?>" name="error_ep">
				</div>
			</div>
			<hr>
			<div class="form-group clearfix row">
				<label class="control-label col-md-3"><?php echo lang("reference"); ?></label>
				<label class="control-label col-md-3"><?php echo lang("unit"); ?></label>
				<label class="control-label col-md-6"><?php echo lang("nameofref"); ?></label>
				<div class="col-md-3">
					<input type="text" class="form-control" value="<?php echo set_value('reference'); ?>" id="reference" placeholder="<?php echo lang("number"); ?>" name="reference">
				</div>
				<div class="col-md-3">
					<select name="unit_reference" id="unit_reference" class="btn-group select select-block">
						<option value=""><?php echo lang("pleaseselect"); ?></option>
						<?php foreach ($unit_list as $u): ?>
							<option value="<?php echo $u['name']; ?>" <?php echo set_select('unit_reference', $u['name']); ?>><?php echo $u['name']; ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" value="<?php echo set_value('nameofref'); ?>" id="nameofref" placeholder="<?php echo lang("nameofref"); ?>" name="nameofref">
				</div>
			</div>
			<hr>
			<div class="form-group clearfix row">
				<label class="control-label col-md-3"><?php echo lang("kpi"); ?></label>
				<label class="control-label col-md-3"><?php echo lang("kpiunit"); ?></label>
				<label class="control-label col-md-6"><?php echo lang("kpidef"); ?></label>
				<div class="col-md-3">
					<input type="text" class="form-control" id="kpi" placeholder="" name="kpi" readonly>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" id="unit_kpi" placeholder="" name="unit_kpi" readonly>
				</div>				
				<div class="col-md-6">
					<input type="text" class="form-control" id="kpidef" placeholder="<?php echo lang("kpidef"); ?>" name="kpidef">
				</div>

			</div>
			<div><button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> <?php echo lang("savedata"); ?></button></div>
			<div style="margin-top:30px;"><span class="badge">3</span> <?php echo lang("alloheading5"); ?></div>
			<hr>
			<div id="aallocated" class="row">
<!-- 				<span id="aprocess"></span>
				<span id="aflow"></span>
				<span id="atype"></span> -->
				<div class="col-md-12"><?php echo lang("alloheading6"); ?></div>
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
<script type="text/javascript">	$( document ).ready(unit_hesapla); $( document ).ready(hesapla);</script>
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
<script type="text/javascript">
$('#flow_type_name').change(function(b){
	 		var cmpny_id = "<?php echo $this->uri->segment(3); ?>";

	var e = document.getElementById("prcss_name");
	var prcss_name = e.options[e.selectedIndex].value;
	var b = document.getElementById("flow_type_name");
	var flow_type_name = b.options[b.selectedIndex].value;
	var a = document.getElementById("flow_name");
	var flow_name = a.options[a.selectedIndex].value;
		console.log(prcss_name+" "+flow_name+" "+flow_type_name);
		//get other allocation data for a selected flow and flow type
		$.ajax({
			type: "POST",
			dataType:'json',
			url: '<?php echo base_url('cpscoping/full_get'); ?>/'+flow_name+'/'+flow_type_name+'/'+cmpny_id+'/'+prcss_name,
			success: function(data)
			{
				document.getElementById('amount').value=data.qntty;
				document.getElementById('cost').value=data.cost;
				document.getElementById('env_impact').value=data.ep;

				document.getElementById('allocation_amount').value="100";
				document.getElementById('allocation_cost').value="100";
				document.getElementById('allocation_env_impact').value="100";

				$('#unit_amount').val(data.qntty_unit_name).change();
				$('#unit_cost').val(data.cost_unit).change();

				var old_aa = $('#allocation_amount').val();
				var old_aa2 = $('#amount').val();

				var old_cc = $('#allocation_cost').val();
				var old_cc2 = $('#cost').val();

				var old_ee = $('#allocation_env_impact').val();
				var old_ee2 = $('#env_impact').val();

				$( "#allocation_amount" ).change(function() {
				  var oran1=$('#allocation_amount').val()/old_aa;
				  //alert("alert"+oran1);
				  $('#amount').val((old_aa2*oran1).toFixed(2));
				});

				$( "#amount" ).change(function() {
				  var oran2=$('#amount').val()/old_aa2;
				  //alert(oran2);
				  $('#allocation_amount').val((old_aa*oran2).toFixed(2));
				});


				$( "#allocation_cost" ).change(function() {
				  var oran3=$('#allocation_cost').val()/old_cc;
				  //alert("alert"+oran3);
				  $('#cost').val((old_cc2*oran3).toFixed(2));
				});

				$( "#cost" ).change(function() {
				  var oran4=$('#cost').val()/old_cc2;
				  //alert(oran4);
				  $('#allocation_cost').val((old_cc*oran4).toFixed(2));
				});


				$( "#allocation_env_impact" ).change(function() {
				  var oran5=$('#allocation_env_impact').val()/old_ee;
				  //alert("alert"+oran5);
				  $('#env_impact').val((old_ee2*oran5).toFixed(2));
				});

				$( "#env_impact" ).change(function() {
				  var oran6=$('#env_impact').val()/old_ee2;
				  //alert(oran6);
				  $('#allocation_env_impact').val((old_ee*oran6).toFixed(2));
				});
			}
		});

});

</script>

<script type="text/javascript">



</script>