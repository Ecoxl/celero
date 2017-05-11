<div class="col-md-4 col-md-offset-4">
    <p><?php echo lang("cbaheading4"); ?></p>
    <?php foreach ($com_pro as $cp): ?>
        <div class="">
            <a href="<?php echo base_url('cost_benefit/'.$this->session->userdata('project_id').'/'.$cp['id']); ?>/" class="btn btn-inverse"><?php echo $cp['name']; ?></a>
        </div>
    <?php endforeach ?><br>
    <div><?php echo lang("cbadesc"); ?></div>
</div>