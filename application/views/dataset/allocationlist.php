<div class="col-md-12">
<?php 
if(empty($allocationlar)):
 echo "You need to open a project that includes this company to list allocations.";
else:
?>
<p class="lead pull-left"><?php echo lang("cpheading2"); ?></p>
<div class="pull-right"><a href="<?php echo base_url('cpscoping/'.$this->session->userdata('project_id').'/'.$companyID.'/allocation'); ?>/" class="btn btn-info" id="cpscopinga"><?php echo lang("createallocation"); ?></a>
</div>
<table class="table table-striped" style="font-size:13px;">
    <tr>
        <th><?php echo lang("processname"); ?></th>
        <th><?php echo lang("flowname"); ?></th>
        <th><?php echo lang("flowtype"); ?></th>
        <th><?php echo lang("manage"); ?></th>
    </tr>
<?php foreach ($allocationlar as $a): ?>
    <?php //print_r($flow_prcss[$i][$k]); ?>
    <tr>
        <td><?php echo $a['prcss_name']; ?></td>
        <td><?php echo $a['flow_name']; ?></td>
        <td><?php echo $a['flow_type_name']; ?></td>
        <td>
            <a class="label label-info" href="<?php echo base_url('cpscoping/edit_allocation/'.$a['allocation_id']); ?>"><?php echo lang("editallocation"); ?></a>
            <a class="label label-danger" href="<?php echo base_url('cpscoping/delete/'.$a['allocation_id'].'/'.$a['project_id'].'/'.$a['company_id']); ?>"><?php echo lang("deleteallocation"); ?></a></td>
    </tr>   
<?php endforeach ?>
</table>
<?php 
endif
?>
</div>