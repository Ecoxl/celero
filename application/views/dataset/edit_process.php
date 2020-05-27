	<?php //print_r($process); ?>
	<div class="col-md-6 col-md-offset-3">
		<?php echo form_open_multipart('edit_process/'.$companyID.'/'.$process['id']); ?>
			<p class="lead"><?php echo lang("editprocess"); ?></p>
			<div class="form-group">
				<label for="comment"><?php echo lang("comments"); ?></label>
				<textarea class="form-control" id="comment" name="comment" placeholder="<?php echo lang("comments"); ?>"><?php echo set_value('comment',$process['comment']); ?></textarea>
			</div>
	    <button type="submit" class="btn btn-info"><?php echo lang("savedata"); ?></button>
	    </form>
</div>