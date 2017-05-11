<?php $project_id = $this->session->userdata('project_id');
	if(empty($project_id)){
		$project_id = 0;
	}
 ?>
<div class="col-md-12">
	<?php if(validation_errors() != NULL ): ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<p>
			<?php echo validation_errors(); ?>
		</p>
	</div>
	<?php endif ?>
	<div style="margin-bottom:20px; overflow:hidden;">
		<div class="pull-left"><b><a href="<?php echo base_url('company/'.$company_info['id']); ?>"><?php echo $company_info['name']; ?></a> <?php echo lang("datasetservices"); ?></b></div>
		<div class="pull-right">
		<span class="label label-default"><b><?php echo lang("email"); ?>:</b> <?php echo $company_info['email']; ?></span>
		<span class="label label-default"><b><?php echo lang("cellphone"); ?>:</b> <?php echo $company_info['phone_num_1']; ?></span>
		<span><a href="<?php echo base_url('company/'.$company_info['id']); ?>" class="label label-primary"><?php echo lang("gotocompany"); ?></a></span></div>
	</div>
	<div>
		<ul class="list-inline ultab">
			<li <?php if ($this->uri->segment(1) == "new_flow"){ echo "class='btn-inverse'"; } ?>><a href="<?php echo base_url('new_flow/'.$companyID); ?>"><?php echo lang("flow"); ?></a></li>
			<li <?php if ($this->uri->segment(1) == "new_component"){ echo "class='btn-inverse'"; } ?>><a class="" href="<?php echo base_url('new_component/'.$companyID); ?>"><span +><?php echo lang("component"); ?></span></a></li>
			<li <?php if ($this->uri->segment(1) == "new_process"){ echo "class='btn-inverse'"; } ?>><a class="" href="<?php echo base_url('new_process/'.$companyID); ?>"><?php echo lang("process"); ?></a></li>
			<li <?php if ($this->uri->segment(1) == "new_equipment"){ echo "class='btn-inverse'"; } ?>><a class="" href="<?php echo base_url('new_equipment/'.$companyID); ?>"><?php echo lang("equipment"); ?></a></li>
			<li <?php if ($this->uri->segment(1) == "new_product"){ echo "class='btn-inverse'"; } ?>><a class="" href="<?php echo base_url('new_product/'.$companyID); ?>"><?php echo lang("product"); ?></a></li>
			<li <?php if ($this->uri->segment(1) == "allocationlist"){ echo "class='btn-inverse'"; } ?>><a class="" href="<?php echo base_url('allocationlist/'.$project_id.'/'.$companyID); ?>"><?php echo lang("allocation"); ?></a></li>
			</ul>
	</div>
</div>
