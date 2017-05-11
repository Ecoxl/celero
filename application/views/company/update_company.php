<?php echo $map['js']; ?>
<div class="container">
	<p class="lead"><?php echo lang("editcompanyinfo"); ?></p>

	<?php if(validation_errors() != NULL ): ?>
    <div class="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
      <p>
      	<?php echo validation_errors(); ?>
      </p>
    </div>
  <?php endif ?>

	<?php echo form_open_multipart('update_company/'.$companies['id']);?>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
	  				<div class="fileinput fileinput-new" data-provides="fileinput">
	    				<div class="fileinput-new thumbnail" style="width:100%;">
	      					<img class="img-rounded" style="width:100%;" src="<?php echo asset_url("company_pictures/".$companies['logo']);?>">
	    				</div>
	    				<div class="fileinput-preview fileinput-exists thumbnail" ></div>
	    				<div>
	      					<span class="btn btn-primary btn-file btn-block">
						        <span class="fileinput-new"><span class="fui-image"></span> <?php echo lang("selectimage"); ?></span>
						        <span class="fileinput-exists"><span class="fui-gear"></span> <?php echo lang("change"); ?></span>
						        <input type="file" name="userfile">
	      					</span>
	      					<a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput"><span class="fui-trash"></span> <?php echo lang("remove"); ?></a>
	    				</div>
	  				</div>
				</div>
      </div>
      <div class="col-md-8">
				<div class="form-group">
	    			<label for="companyName"><?php echo lang("companyname"); ?></label>
	    			<input type="text" class="form-control" id="companyName" placeholder="<?php echo lang("companyname"); ?>" value="<?php echo set_value('companyName',$companies['name']); ?>" name="companyName">
	 			</div>
	 			<div class="form-group">
					<label for="naceCode"><?php echo lang("nacecode"); ?></label>
					<select id="selectize" name="naceCode">
						<?php foreach ($all_nace_codes as $anc): ?>
							<?php if($nace_code['code']==$anc['code']) {$d=TRUE;} else {$d=FALSE;} ?>
							<option value="<?php echo $anc['code']; ?>" <?php echo set_select('naceCode', $anc['code'], $d); ?> ><?php echo $anc['code']; ?></option>
						<?php endforeach ?>
					</select>
	 			</div>
				<div class="form-group">
	    			<label for="email"><?php echo lang("email"); ?></label>
	    			<input type="text" class="form-control" id="email" placeholder="<?php echo lang("email"); ?>" value="<?php echo set_value('email',$companies['email']); ?>"  name="email">
	 			</div>
<!-- 	 			<div class="form-group">
	    			<label for="cellPhone">Cell Phone</label>
	    			<input type="text" class="form-control" id="cellPhone" placeholder="Cell Phone" value="<?php echo set_value('cellPhone',$companies['phone_num_1']); ?>" name="cellPhone">
	 			</div> -->
	 			<div class="form-group">
	    			<label for="workPhone"><?php echo lang("workphone"); ?></label>
	    			<input type="text" class="form-control" id="workPhone" placeholder="<?php echo lang("workphone"); ?>" value="<?php echo set_value('workPhone',$companies['phone_num_2']); ?>" name="workPhone">
	 			</div>
	 			<div class="form-group">
	    			<label for="fax"><?php echo lang("faxnumber"); ?></label>
	    			<input type="text" class="form-control" id="fax" placeholder="<?php echo lang("faxnumber"); ?>" value="<?php echo set_value('fax',$companies['fax_num']); ?>" name="fax">
	 			</div>
				<div class="form-group">
	    			<label for="coordinates"><?php echo lang("coordinates"); ?></label><br>
	    			<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-block" id="coordinates" ><?php echo lang("selectonmap"); ?></button>
	    			<div class="row" style="margin-top: 10px;">
		    			<div class="col-md-6">
		    				<input type="text" class="form-control" id="lat" placeholder="<?php echo lang("lat"); ?>" name="lat" style="color:#333333;" value="<?php echo set_value('lat',$companies['latitude']); ?>" readonly/>
		    			</div>
		    			<div class="col-md-6">
		    				<input type="text" class="form-control" id="long" placeholder="<?php echo lang("long"); ?>" name="long" style="color:#333333;" value="<?php echo set_value('long',$companies['longitude']); ?>" readonly/>
		    			</div>
	    			</div>
	 			</div>
	 			<div class="form-group">
	    			<label for="address"><?php echo lang("address"); ?></label>
	    			<textarea class="form-control" rows="3" name="address" id="address" placeholder="<?php echo lang("address"); ?>"><?php echo set_value('address',$companies['address']); ?></textarea>
	 			</div>
	 			<div class="form-group">
	    			<label for="companyDescription"><?php echo lang("description"); ?></label>
	    			<textarea class="form-control" rows="3" name="companyDescription" id="companyDescription" placeholder="<?php echo lang("description"); ?>"><?php echo set_value('companyDescription',$companies['description']); ?></textarea>
	 			</div>
        <button type="submit" class="btn btn-inverse col-md-9"><?php echo lang("save"); ?></button>
        <a href="<?php echo base_url('company/'.$companies['id']); ?>" class="btn btn-warning col-md-2 col-md-offset-1"><?php echo lang("cancel"); ?></a>
			</div>
		</div>
	</form>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" rendered="<?php echo $map['js']; ?>">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" onclick="getCountryIdName();" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Click Map</h4>
	        <hr>
	        <div class="row">
	        	<div class="col-md-6">
	        		<input type="text" class="form-control" id="latId" name="lat" style="color:#333333;" readonly/>
	        	</div>
	        	<div class="col-md-6">
	        		<input type="text" class="form-control" id="longId" name="long"  style="color:#333333;" readonly/>
	        	</div>
	        </div>
	      </div>
	      <div class="modal-body">
	       <?php echo $map['html']; ?>
	      </div>
	      <div class="modal-footer">
	      </div>
	    </div>
	  </div>
</div>

</div>
<script type="text/javascript">
	$('#selectize').selectize({
    create: false
  });


  function getCountryIdName() {
      //alert($('#latId').val());
      //alert($('#longId').val());

      if($('#latId').val()!=""  && $('#longId').val()!="") {
          //alert($('#latId').val());
          $.ajax({
            url : '../../../Proxy/SlimProxy.php',
            data : {
                    url : 'deleteScenario_scn',
                    lat : $('#latId').val(),
                    long : $('#longId').val()
            },
            type: 'GET',
            dataType : 'json',
            success: function(data, textStatus, jqXHR) {
                $('#tt_grid_scenarios').datagrid('reload');
                if(!data['notFound']) {

                } else {
                    console.warn('data notfound-->'+textStatus);

                }
            },
            error: function(jqXHR , textStatus, errorThrown) {
              console.warn('error text status-->'+textStatus);
            }
    });

      }




  }
</script>