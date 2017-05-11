	<?php //print_r($process); ?>
	<div class="col-md-6 col-md-offset-3">
		<?php echo form_open_multipart('edit_process/'.$companyID.'/'.$process['id']); ?>
			<p class="lead"><?php echo lang("editprocess"); ?></p>
	    <!-- <div class="form-group">
				<div class="row">
					<div class="col-md-8">
						<label for="min_rate_util">Minimum rate of utilization</label>
						<input class="form-control" id="min_rate_util" name="min_rate_util" placeholder="Minimum rate of utilization" value="<?php echo set_value('min_rate_util',$process['min_rate_util']); ?>">
					</div>
					<div class="col-md-4">
						<label for="min_rate_util_unit">Utilization Unit</label>
						<select id="min_rate_util_unit" class="info select-block" name="min_rate_util_unit">
							<?php foreach ($units as $unit): ?>
								<?php if($process['min_rate_util_unit']==$unit['id']) {$deger = TRUE;}else{$deger=False;} ?>
								<option value="<?php echo $unit['id']; ?>" <?php echo set_select('min_rate_util_unit', $unit['id'], $deger); ?>><?php echo $unit['name']; ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-8">
						<label for="typ_rate_util">Typical rate of utilization</label>
						<input class="form-control" id="typ_rate_util" name="typ_rate_util" placeholder="Typical rate of utilization" value="<?php echo set_value('typ_rate_util',$process['typ_rate_util']); ?>">
					</div>
					<div class="col-md-4">
						<label for="typ_rate_util_unit">Utilization Unit</label>
						<select id="typ_rate_util_unit" class="info select-block" name="typ_rate_util_unit">
							<?php foreach ($units as $unit): ?>
								<?php if($process['typ_rate_util_unit']==$unit['id']) {$bdeger = TRUE;}else{$bdeger=False;} ?>
								<option value="<?php echo $unit['id']; ?>" <?php echo set_select('typ_rate_util_unit', $unit['id'], $bdeger); ?>><?php echo $unit['name']; ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-8">
						<label for="max_rate_util">Maximum rate of utilization</label>
						<input class="form-control" id="max_rate_util" name="max_rate_util" placeholder="Maximum rate of utilization" value="<?php echo set_value('max_rate_util',$process['max_rate_util']); ?>">
					</div>
					<div class="col-md-4">
						<label for="max_rate_util_unit">Utilization Unit</label>
						<select id="max_rate_util_unit" class="info select-block" name="max_rate_util_unit">
							<?php foreach ($units as $unit): ?>
								<?php if($process['max_rate_util_unit']==$unit['id']) {$adeger = TRUE;}else{$adeger=False;} ?>
								<option value="<?php echo $unit['id']; ?>" <?php echo set_select('max_rate_util_unit', $unit['id'], $adeger); ?>><?php echo $unit['name']; ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
			</div> -->
			<div class="form-group">
				<label for="comment"><?php echo lang("comments"); ?></label>
				<input class="form-control" id="comment" name="comment" placeholder="<?php echo lang("comments"); ?>"  value="<?php echo set_value('comment',$process['comment']); ?>">
			</div>
	    <button type="submit" class="btn btn-info"><?php echo lang("savedata"); ?></button>
	    </form>
	    <span class="label label-default"><span style="color:red;">*</span> <?php echo lang("labelarereq"); ?>.</span>
</div>