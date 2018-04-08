<div class="col-md-4 col-md-offset-4">
	<?php if(validation_errors() != NULL ): ?>
	    <div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	      	<div class="popover-content">
	      		<?php echo validation_errors(); ?>
	      	</div>
	    </div>
	<?php endif ?>
    <p>excelcontents</p>
    <table>
    	<th>Flow Name</th><th>Ep Value</th><th>Ep Unit</th><th>Add EP to your list</th>
    <?php foreach ($excelcontents as $ec): ?>
    		<?php echo form_open_multipart('datasetexcel/'.$companyID); ?>
            <?php //print_r($ec); ?>
            	<tr>
            	<td>
            		<div class="form-group">
						<input class="form-control" id="flowname" name="flowname" value="<?php echo $ec[0]; ?>">
					</div>
				</td>
            	<td>            		
            		<div class="form-group">
						<input class="form-control" id="epvalue" name="epvalue" value="<?php echo $ec[1]; ?>">
					</div>
				</td>
            	<td>EP</td>
            	<td>
            		<button type="submit" class="btn btn-info">Add EP</button>
            	</td>
            	</tr>
            	</form>
    <?php endforeach ?>
    </table>
    <div></div>
</div>