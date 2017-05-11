<?php //print_r($users); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
				<div class="swissheader"><?php echo lang("consultants"); ?></div>
				<table class="table-hover" style="clear:both; width: 100%;">
				<?php foreach ($users as $com): ?>
					<tr>
					<td style="padding: 10px 15px;">
						<a href="<?php echo base_url('user/'.$com['user_name']) ?>" style="display:block;">
							<div><b><?php echo $com['name']; ?> <?php echo $com['surname']; ?></b>
							<small style="color:gray;">- @<?php echo $com['user_name']; ?></small></div>
						<div><span style="color:#999999; font-size:12px;"><?php echo $com['description']; ?></span></div>
						</a>
					</td>
					</tr>
				<?php endforeach ?>
				</table>
		</div>
		<div class="col-md-4">
			<div class="well">
				<?php echo lang("consultantsdesc"); ?>
			</div>
		</div>
	</div>
</div>
