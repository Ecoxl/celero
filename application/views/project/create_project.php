<!-- for datepicker -->
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<?php echo $map['js']; ?>

<div class="container">
	<p class="lead"><?php echo lang("createproject"); ?></p>

	<?php if(validation_errors() != NULL ): ?>
	    <div class="alert">
	      <button type="button" class="close" data-dismiss="alert">&times;</button>
	      <?php echo validation_errors(); ?>
	    </div>
    <?php endif ?>

	<?php echo form_open('newproject'); ?>
		<div class="row">
			<div class="col-md-8">
				<div class="form-group">
	    			<label for="projectName"><?php echo lang("name"); ?></label>
	    			<input type="text" class="form-control" id="projectName" placeholder="<?php echo lang("name"); ?>" value="<?php echo set_value('projectName'); ?>" name="projectName">
	 			</div>
	 			<div class="form-group">
	 				<label for="datePicker"><?php echo lang("startdate"); ?></label>
	    			<div class="input-group">
				    	<span class="input-group-btn">
				      		<button class="btn" type="button" style="height: 38px; border: 1px solid;"><span class="fui-calendar"></span></button>
				    	</span>
				    	<input type="text" class="form-control" value="<?php echo set_value('datepicker'); ?>" id="datepicker-01" name="datepicker">
				  	</div>
	 			</div>
	 			<div class="form-group">
	    			<label for="status"><?php echo lang("status"); ?></label>
	    			<div>
		    			<select id="status" class="info select-block" name="status">
		  					<?php foreach ($project_status as $status): ?>
								<option value="<?php echo $status['id']; ?>"><?php echo $status['name']; ?></option>
							<?php endforeach ?>
						</select>
					</div>
	 			</div>
	 			<div class="form-group">
	    			<label for="description"><?php echo lang("description"); ?></label>
	    			<textarea class="form-control" rows="3" name="description" id="description" placeholder="<?php echo lang("description"); ?>" ><?php echo set_value('description'); ?></textarea>
	 			</div>
				<div class="form-group">
				<label for="coordinates"><?php echo lang("coordinates"); ?></label>
				<button type="button" data-toggle="modal" data-target="#myModal2" class="btn btn-block btn-inverse" id="coordinates" ><?php echo lang("selectonmap"); ?></button><br>
				<div class="row">
            <div class="col-md-4">
            <input type="text" class="form-control" id="lat" placeholder="<?php echo lang("lat"); ?>" name="lat" style="color:#333333;" value="<?php /*echo set_value('lat');*/ ?>" readonly/>
            </div>
            <div class="col-md-4">
            <input type="text" class="form-control" id="long" placeholder="<?php echo lang("long"); ?>" name="long" style="color:#333333;" value="<?php /*echo set_value('long');*/ ?>" readonly/>
            </div>
            <div class="col-md-4">
            <input type="text" class="form-control" id="zoomlevel" placeholder="Zoom Level" name="zoomlevel" style="color:#333333;" value="<?php /*echo set_value('long');*/ ?>" />
            </div>
				</div>
 			</div>

	 			<div class="form-group">
	    			<label for="assignedCompanies"><?php echo lang("assigncompany"); ?></label>
	    			<!--  <input type="text" id="companySearch" />	-->
	    			<select multiple="multiple"  title="Choose at least one" class="select-block" id="assignCompany" name="assignCompany[]">

						<?php foreach ($companies as $company): ?>
							<option value="<?php echo $company['id']; ?>"><?php echo $company['name']; ?></option>
						<?php endforeach ?>
					</select>
	 			</div>
	 			<div class="form-group">
	    			<label for="assignedConsultant"><?php echo lang("assignconsultant"); ?></label>
	    			<select multiple="multiple"  title="Choose at least one" class="select-block" id="assignConsultant" name="assignConsultant[]">

						<?php foreach ($consultants as $consultant): ?>
							<option value="<?php echo $consultant['id']; ?>"><?php echo $consultant['name'].' '.$consultant['surname'].' ('.$consultant['user_name'].')'; ?></option>
						<?php endforeach ?>
					</select>
	 			</div>
        <?php $mevcut = $this->session->userdata('user_in'); ?>
	 			<div class="form-group">
    			<label for="assignContactPerson"><?php echo lang("assigncontact"); ?></label>
    			<select  class="select-block" id="assignContactPerson" name="assignContactPerson">
            <option value="<?php echo $mevcut['id']; ?>">Creator of the project (<?php echo $mevcut['username']; ?>)</option>
					</select>
	 			</div>
        <button type="submit" class="btn btn-block btn-primary"><?php echo lang("createproject"); ?></button>

			</div>
			<div class="col-md-4">

			</div>
		</div>
	</form>

    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" rendered="<?php echo $map['js']; ?>" >
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
    var marker;
    var lat,lon;

    $('#myModal2').on('shown.bs.modal', function (e) {
        google.maps.event.trigger(map, 'resize'); // modal acildiktan sonra haritanın resize edilmesi gerekiyor.

        map.setZoom(6);
        if(!marker)
            map.setCenter(new google.maps.LatLng(47.3250690187567,18.52065861225128));
        else
            map.setCenter(marker.getPosition());

        google.maps.event.addListener(map, 'click', function(event) {
            $("#latId").val("Lat:" + event.latLng.lat()); $("#longId").val("Long:" + event.latLng.lng());
            $("#lat").val(event.latLng.lat()); $("#long").val(event.latLng.lng());
            placeMarker(event.latLng);
        });

    });



    function placeMarker(location) {
      if ( marker ) {
        marker.setPosition(location);
      } else {
        marker = new google.maps.Marker({
          position: location,
          map: map
        });
      }
    }

</script>
<script type="text/javascript">
  // Datepicker on projects
  // jQuery UI Datepicker JS init
  var datepickerSelector = '#datepicker-01';
  $(datepickerSelector).datepicker({
    showOtherMonths: true,
    selectOtherMonths: true,
    dateFormat: "yy-mm-dd",
    yearRange: '-1:+1'
  }).prev('.btn').on('click', function (e) {
    e && e.preventDefault();
    $(datepickerSelector).focus();
  });

  // Now let's align datepicker with the prepend button
  $(datepickerSelector).datepicker('widget').css({'margin-left': -$(datepickerSelector).prev('.btn').outerWidth()});
</script>

<script type="text/javascript">
  $(document).ready(function () {
    $('#assignCompany').change(function () {
      var company = $(this).val();
      $.ajax({
        url: "<?php echo base_url('contactperson');?>",
        async: false,
        type: "POST",
        data: "company_id="+company,
        dataType: "json",
        success: function(data) {
          //$('#assignContactPerson option').remove();

          for (var k = 0; k < data.length; k++) {
            for (var i = 0; i < data[k].length; i++) {
              var opt =data[k][i]['id'];
              if($("#assignContactPerson option[value='"+ opt +"']").length == 0)
              {
                $("#assignContactPerson").append(new Option(data[k][i]['name']+' '+data[k][i]['surname']+' - '+data[k][i]['cmpny_name'],data[k][i]['id']));
              }
            }
          }
        }
      })
    });
  });
</script>