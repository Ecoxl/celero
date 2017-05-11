<script type="text/javascript">
$(document).ready(function() {
    $("#projects").change(function() {         
        var secim = $( "#projects" ).val();
        $('#companiess').children().remove();
        $.ajax({ 
            type: "POST",
            dataType:'json',
            url: '<?php echo base_url('cpscoping/pro'); ?>/'+secim, 
            success: function(data)
            {
            	$('#companiess').append('<option value="0">Nothing Selected</option>');
                for(var k = 0 ; k < data.length ; k++){
                    $('#companiess').append('<option value="'+data[k].id+'">'+data[k].name+'</option>');
                }
            }
        });
    });
    $("#companiess").change(function() {         
        var pro = $( "#projects" ).val();
        var com = $( "#companiess" ).val();
        $("#cpscopinga").attr("href", '<?php echo base_url('cpscoping'); ?>/'+pro+'/'+com+'/allocation');
    });
});

</script>


<div class="col-md-3">
    <p><?php echo lang("cpheading"); ?></p>
    <!--
    <select id="projects" class="btn-group select select-block">
        <option value="0">Nothing Selected</option>
        <?php foreach ($c_projects as $p): ?>
            <option value="<?php echo $p['proje_id']; ?>"><?php echo $p['name']; ?></option>
        <?php   endforeach  ?>
    </select>
    <select id="companiess" class="btn-group select select-block">
        <option value="0">Nothing Selected</option>
    </select>
    <a href="#" class="btn btn-default btn-sm" id="cpscopinga">New CP potentials identification</a>-->
    <div><?php echo lang("companiesunder"); ?> <?php echo $this->session->userdata('project_name'); ?></div><br>
    <?php foreach ($com_pro as $cp): ?>
        <div class="boxhead"><?php echo $cp['company_name']; ?></div>
        <div class="boxcontent">
            <a href="<?php echo base_url('cpscoping/'.$this->session->userdata('project_id').'/'.$cp['company_id'].'/allocation'); ?>/" class="btn btn-inverse btn-sm" id="cpscopinga"><?php echo lang("createallocation"); ?></a>
            <a href="<?php echo base_url('new_flow/'.$cp['company_id']); ?>/" class="btn btn-inverse btn-sm" id="cpscopinga"><?php echo lang("datasetmanagement"); ?></a>
        </div>
    <?php endforeach ?><br>
</div>

<div class="col-md-9">
    <p><?php echo lang("cpheading2"); ?></p>
    <?php $i = 0; ?>
    <?php foreach ($com_pro as $cp): ?>
        <?php // print_r($cp); ?>
        <?php if(sizeof($flow_prcss[$i])>0): ?>
        <div class="cp-heading">
            <div class="row">
                <div class="col-md-12"><a href="<?php echo base_url('company/'.$cp['company_id']); ?>"><?php echo $cp['company_name']; ?></a></div>
<!--<div class="col-md-6" style="border-left: 1px solid #C3C3C3;"><b>Project</b><br><a href="<?php echo base_url('project/'.$cp['project_id']); ?>"><?php echo $cp['project_name']; ?></a></div> -->
            </div>
        </div>
        <div class="cp-bar">
            <a style="margin-right:10px;" href="<?php echo base_url('cpscoping/'.$cp['project_id'].'/'.$cp['company_id'].'/show'); ?>" class=" btn-sm btn-info"><?php echo lang("viewcp"); ?></a>
            <a style="margin-right:10px;" href="<?php echo base_url('kpi_calculation/'.$cp['project_id'].'/'.$cp['company_id']); ?>" class=" btn-sm btn-success"><?php echo lang("viewkpi"); ?></a>
            <a href="<?php echo base_url('cost_benefit/'.$cp['project_id'].'/'.$cp['company_id']); ?>" class=" btn-sm btn-warning"><?php echo lang("viewcba"); ?></a>
        </div>
        <table class="table table-striped" style="font-size:12px;">
            <tr>
                <th><?php echo lang("processname"); ?></th>
                <th><?php echo lang("flowname"); ?></th>
                <th><?php echo lang("flowtype"); ?></th>
                <th><?php echo lang("manage"); ?></th>
            </tr>
        <?php endif ?>
        <?php for($k = 0 ; $k < sizeof($flow_prcss[$i]) ; $k++): ?>
            <?php //print_r($flow_prcss[$i][$k]); ?>
            <tr>
                <td><?php echo $flow_prcss[$i][$k]['prcss_name']; ?></td>
                <td><?php echo $flow_prcss[$i][$k]['flow_name']; ?></td>
                <td><?php echo $flow_prcss[$i][$k]['flow_type_name']; ?></td>
                <td>
                    <a class="label label-info" href="<?php echo base_url('cpscoping/edit_allocation/'.$flow_prcss[$i][$k]['allocation_id']); ?>"><?php echo lang("editallocation"); ?></a>
                    <a class="label label-danger" href="<?php echo base_url('cpscoping/delete/'.$flow_prcss[$i][$k]['allocation_id'].'/'.$flow_prcss[$i][$k]['project_id'].'/'.$flow_prcss[$i][$k]['company_id']); ?>"><?php echo lang("deleteallocation"); ?></a></td>
            </tr>   
        <?php endfor ?>
        </table>
        <?php $i++; ?>
    <?php endforeach ?>
</div>