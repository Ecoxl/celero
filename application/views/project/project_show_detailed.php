<?php // echo $map['js']; ?>
<?php
    global $company_ids;
    foreach ($companies as $company) {
        $company_ids.= $company['name'].',';
    }
    $company_ids = rtrim($company_ids,',');
?>
<script>
    console.log('<?php echo $company_ids;  ?>');
    function showMapPanelExpand() {
            //var panelWest = $('#cc').layout('panel','south');
            //var panelSouthNorth = $('#cc2').layout('panel','north');
            //$('#p').panel('expand');
            document.getElementById('myFrame').setAttribute('width','100%');
            document.getElementById('myFrame').setAttribute('height','500');
        }

        function showMapPanelCollapse() {
            //var panelWest = $('#cc').layout('panel','south');
            //var panelSouthNorth = $('#cc2').layout('panel','north');
            //$('#p').panel('expand');
            document.getElementById('myFrame').setAttribute('width','0');
            document.getElementById('myFrame').setAttribute('height','0');
        }

</script>
<div class="container">
	<div class="row">

		<div class="col-md-4">

					<?php if($is_consultant_of_project or $is_contactperson_of_project): ?>
			<div style="margin-bottom:20px; overflow:hidden;">
				<?php if($this->session->userdata('project_id')==$projects['id']): ?>
					<a class="btn btn-inverse btn-block" href="<?php echo base_url('closeproject'); ?>"><i class="fa fa-times-circle"></i> <?php echo lang("closeproject"); ?></a>
				<?php else: ?>
					<?php echo form_open('openproject'); ?>
						<input type="hidden" name="projectid" value="<?php echo $projects['id']; ?>">
						<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus-square-o"></i> <?php echo lang("openproject"); ?></button>
					</form>
				<?php endif ?>
			<a style="margin-top: 10px;" class="btn btn-inverse btn-block" href="<?php echo base_url("update_project/".$projects['id']); ?>"><i class="fa fa-pencil-square-o"></i> <?php echo lang("editprojectinfo"); ?></a>
			    <!--<a onclick="event.preventDefault();window.open('../../IS_OpenLayers/map_prj.php?cmpny=<?php echo $company_ids; ?>','mywindow','width=900,height=900');" style = 'margin-right: 20px;' class="btn btn-info btn-sm pull-right" >See Project Companies On map</a>-->
					<!--<a onclick="showMapPanelExpand();document.getElementById('myFrame').setAttribute('src','../../IS_OpenLayers/map_prj_prj.php?prj_id=<?php echo $prj_id; ?>');event.preventDefault();"  class="btn btn-inverse btn-sm" >See Project Companies On map</a>
			    <a class="btn btn-inverse btn-sm" href="#" onclick="showMapPanelCollapse();event.preventDefault();">Close Companies Map</a> -->

			 </div>
			<?php endif ?>
			<div class="clearfix"></div>

			<div class="form-group">
				<div class="swissheader" style="font-size:15px;"><i class="fa fa-users"></i> <?php echo lang("projectconsultants"); ?></div>
					<ul class="nav nav-list">
				<?php foreach ($constant as $cons): ?>
					<li><a style="text-transform:capitalize;" href="<?php echo base_url('user/'.$cons['user_name']); ?>"> <?php echo $cons['name'].' '.$cons['surname']; ?></a></li>
				<?php endforeach ?>
				</ul>
			</div>

			<div class="form-group">
				<div class="swissheader" style="font-size:15px;"><i class="fa fa-building"></i> <?php echo lang("projectcompanies"); ?></div>
					<ul class="nav nav-list">
				<?php foreach ($companies as $company): ?>
					<li><a style="text-transform:capitalize;" href="<?php echo base_url('company/'.$company['id']); ?>"> <?php echo $company['name'];?></a></li>
				<?php endforeach ?>
				</ul>
			</div>

			<div class="form-group">
				<div class="swissheader" style="font-size:15px;"><i class="fa fa-phone"></i> <?php echo lang("projectusers"); ?></div>
					<ul class="nav nav-list">
				<?php foreach ($contact as $con): ?>
					<li><a style="text-transform:capitalize;" href="<?php echo base_url('user/'.$con['user_name']); ?>"> <?php echo $con['name'].' '.$con['surname'];?></a></li>
				<?php endforeach ?>
				</ul>
			</div>
		</div>

		<div class="col-md-8">
			<div class="swissheader">
			<?php echo $projects['name']; ?>
				<?php if($this->session->userdata('project_id')==$projects['id']): ?>
					<small class="pull-right" style="font-size:10px;"><?php echo lang("alreadyopenproject"); ?></small>
				<?php endif ?>
			</div>
			<div class="clearfix"></div>


			<table class="table table-bordered" style="font-size:14px;">
				<tr>
					<td style="width:100px;">
					<?php echo lang("startdate"); ?>
					</td>
					<td>
					<?php echo $projects['start_date']; ?>
					</td>
				</tr>
				<tr>
					<td>
					<?php echo lang("status"); ?>
					</td>
					<td>
					<?php echo $status['name']; ?>
					</td>
				</tr>
				<tr>
					<td>
					<?php echo lang("description"); ?>
					</td>
					<td>
					<?php echo $projects['description']; ?>
					</td>
				</tr>
			</table>
			<div class="swissheader">
			<i class="fa fa-map-marker"></i> <?php echo lang("projectonmap"); ?>
			</div>
                        
                        <!-- harita -->
                        <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
                        <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
                        <?php
                            //print_r($companies);
                            $company_array = array();
                            foreach ($companies as $com => $k) {
                                    $company_array[$com][0] = $k['latitude'];
                                    $company_array[$com][1] = $k['longitude'];
                                    $company_array[$com][2] = "<a href='".base_url('company/'.$k['id'])."'>".$k['name']."</a>";
                            }
                            //print_r($company_array);
                        ?>
                        
                        <!-- leaflet map -->
                        <div id="map"></div>
				<script type="text/javascript">
                                    var planes = <?php echo json_encode($company_array); ?>;
                                    var bounds = new L.LatLngBounds(planes);

                    var map = L.map('map').setView([41.83683, 19.33594], 4);
                            map.fitWorld().zoomIn();

                                            map.on('resize', function(e) {
                                                map.fitWorld({reset: true}).zoomIn();
                                            });
                    mapLink =
                        '<a href="http://openstreetmap.org">OpenStreetMap</a>';
                    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                                            }).addTo(map);

                                            for (var i = 0; i < planes.length; i++) {
                                                    marker = new L.marker([planes[i][0],planes[i][1]])
                                                            .bindPopup(planes[i][2])
                                                            .addTo(map);
                                            }
				</script>
                    <!-- leaflet map end-->    
                        
                        
                        
                        
                        
			<!--<iframe src="../../IS_OpenLayers/map_prj_prj.php?prj_id=<?php echo $prj_id; ?>" id="myFrame"  marginwidth="0" width='100%' height='500' marginheight="0"  align="middle" scrolling="auto"></iframe>-->
			<?php //echo $map['html']; ?>
		</div>
	</div>
</div>
