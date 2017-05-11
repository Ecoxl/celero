<div class="container">
	<div class="row">
		<div class="col-md-8">
				<div class="swissheader"><?php echo lang("projectcompanies"); ?></div>
				<!-- harita -->
				<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
				<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
				<?php
				$company_array = array();
			 	foreach ($companies as $com => $k) {	 
					$company_array[$com][0] = $k['latitude'];
					$company_array[$com][1] = $k['longitude'];
					$company_array[$com][2] = "<a href='".base_url('company/'.$k['id'])."'>".$k['name']."</a>";
				} 
				//print_r($company_array);
				?>
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
				<!-- harita bitti -->
				<table class="table-hover" style="clear:both; width: 100%;">
					<?php foreach ($companies as $com): ?>
						<tr>
						<td style="padding: 10px 15px;">
							<a href="<?php echo base_url('company/'.$com['id']) ?>">
							<div class="row">
								<div class="col-md-9">
									<div><b><?php echo $com['name'] ?></b></div>
									<div><span style="color:#999999; font-size:12px;"><?php echo $com['description']; ?></span></div>
								</div>
								<div class="col-md-3">
									<a class="btn btn-tuna" href="<?php echo base_url("new_flow/".$com['id']); ?>"><i class="fa fa-database"></i> <?php echo lang("editcompanydata"); ?></a>
									<a class="btn btn-tuna" href="<?php echo base_url("update_company/".$com['id']); ?>"><i class="fa fa-pencil-square-o"></i> <?php echo lang("editcompanyinfo"); ?></a>
								</div>
							</div>
							</a>
						</td>
						</tr>
					<?php endforeach ?>
				</table>
		</div>	
		<div class="col-md-4">
			
		</div>
	</div>
</div>
