<script type="text/javascript" src="<?php echo asset_url('js/easy-ui-1.4.2.js'); ?>"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
	function deneme() {
		google.load("visualization", "1", {packages:["corechart"]});

		var prjct_id = <?php echo $this->uri->segment(2); ?>;
		var cmpny_id = <?php echo $this->uri->segment(3); ?>;

		var prcss_array = new Array();
		var flow_array = new Array();
		var flow_type_array = new Array();
		var kpi = new Array();
		var kpi2 = new Array();
		var index = 0;
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: '<?php echo base_url('kpi_calculation_chart'); ?>/'+prjct_id+'/'+cmpny_id,
			success: function(data){
				if(data['allocation'].length != 0){
					for(var i = 0 ; i < data['allocation'].length ; i++){
						if(data['allocation'][i].benchmark_kpi != 0){
							prcss_array[index] = data['allocation'][i].prcss_name;
							flow_array[index] = data['allocation'][i].flow_name;
							flow_type_array[index] = data['allocation'][i].flow_type_name;

							kpi[index] = 100-data['allocation'][i].kpi/data['allocation'][i].benchmark_kpi*100;
							//console.log(kpi[index]);
							kpi2[index] = 100-Math.abs(kpi[index]);
							index++;
						}
					}
					//console.log(kpi2);
					//var data = new google.visualization.DataTable();
					//console.log(data);
					var newData = new Array(index);
		          	for(var i = 0 ; i < index+1 ; i++){
		          		newData[i] = new Array(4);
		          	}

		          	newData[0][0] = 'Genre';
		          	newData[0][1] = 'Fair Value';
		          	newData[0][2] = 'Error Value';
		          	newData[0][3] = { role: 'annotation' };
		          	newData[0][4] = { role: 'style' };


		          	for(var i = 1 ; i < index+1 ; i++){
		          		newData[i][0] = prcss_array[i-1]+"-"+flow_array[i-1]+"-"+flow_type_array[i-1];
		          		if(kpi[i-1]<0){
		          			newData[i][1] = 100;
		          		}else{
		          		newData[i][1] = kpi2[i-1];
		          		}
		          		newData[i][2] = Math.abs(kpi[i-1]);
		          		newData[i][3] = '';
		          		if(kpi[i-1]<0){
		          			newData[i][4] = 'red';
		          		}else{
		          			newData[i][4] = 'green';
		          	}
		          	}

		          	var data2 = google.visualization.arrayToDataTable(newData);

		          	var options = {
				        height: 600,
				        legend: { position: 'top', maxLines: 30 },
				        bar: { groupWidth: '75%' },
				        isStacked: true,
				        vAxis: {title: "% (<?php echo lang('percentage'); ?>)"},
				        hAxis: {title: '<?php echo lang("processname"); ?> - <?php echo lang("flowname"); ?> - <?php echo lang("flowtypename"); ?>', titleTextStyle: {color: 'green'}},
				        
				    };
				    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
				    chart.draw(data2, options);
				}
			}
		});
	    /*var data = google.visualization.arrayToDataTable([
			['API Category', 'Social', 'Error', { role: 'annotation' } ],
		  	['2011', 98, 53, ''],
		  	['2012', 151, 34, ''],
		  	['2013', 69, 27, ''],
		]);

	    var options = {
		    width: 1000,
		    height: 550,
		    legend: { position: 'top', maxLines: 3, textStyle: {color: 'black', fontSize: 16 } },
			isStacked: true,

			// Displays tooltip on selection.
			// tooltip: { trigger: 'selection' }, 
		 };

	    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
	    chart.draw(data, options);

		// Selects a set point on chart.
		// chart.setSelection([{row:0,column:1}]) 

		// Renders chart as PNG image 
		// chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';*/
	};
</script>
<script type="text/javascript">
	deneme();
</script>
<?php if (!empty($kpi_values)): ?>
	<div class="col-md-12" style="margin-bottom: 10px;">
		<a class="btn btn-inverse btn-sm" href="<?php echo base_url('cpscoping/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/show'); ?>"><?php echo lang("gotocp"); ?></a>
		<a href="<?php echo base_url('new_flow/'.$this->uri->segment(3)); ?>/" class="btn btn-inverse btn-sm" id="cpscopinga"><?php echo lang("gotodataset"); ?></a>
	</div>

	<div class="col-md-12" id="8lik">

		<?php /*

		if(validation_errors() != NULL ){
		    echo '<div class="alert">';
			echo '<button type="button" class="close" data-dismiss="alert">&times;</button>
					<h4>Form couldn\'t be saved</h4>
		      	<p>';
		      		echo validation_errors();
		      	echo '</p>
		    </div>';
		}

		 ?>
		<?php 
  		$kontrol = array(); $index = 0; $prcss_adet = 0; $kontrol_prcss = array(); $index_prcss = 0; 
  	?>
    <table style="width:100%;"><tr><th style="width:100px;">Process</th><th style="width:100px;">Flow</th><th style="width:150px;">KPI</th><th style="width:200px;">Benchmark KPI</th><th>Best Practice</th></tr></table>

		<?php 
			foreach ($kpi_values as $kpi){
					if(!empty($kpi['prcss_name'])){
		   			$kontrol_prcss[$index_prcss] = $kpi['prcss_name'];
		   			$deger = 0;
		   			for($i = 0 ; $i < $index_prcss ; $i++){
		   				if($kontrol_prcss[$i] == $kpi['prcss_name']){
		   					$deger = 1;
		   				}
		   			}
		   			$index_prcss++;
		   			if($deger == 0){
		   				$prcss_adet++;
		   			}
		   		}
	   		}
		?>
	   	<?php foreach ($kpi_values as $kpi): ?>
	   		<?php if(!empty($kpi['prcss_name'])): ?>
	   		<?php
	   			$kontrol[$index] = $kpi['prcss_name'];
	   			$deger = 0;
	   			for($i = 0 ; $i < $index ; $i++){
	   				if($kontrol[$i] == $kpi['prcss_name']){
	   					$deger = 1;
	   				}
	   			}
	   			$index++;
	   			if($deger == 0):
			 ?>
		    	<div style="margin-bottom: 25px;">
		    		<?php 
		    			$kontrol_flow = array(); $index_flow = 0;
		    			$kontrol_flow_type = array();
		    		?>
	   				<?php 
	   					for($i = 0 ; $i < sizeof($kpi_values) ; $i++){
	   						if(!empty($kpi_values[$i]['prcss_name'])){
		   					if($kpi_values[$i]['prcss_name'] == $kpi['prcss_name']){
			   					$kontrol_flow[$index_flow] = $kpi_values[$i]['flow_name'];
			   					$kontrol_flow_type[$index_flow] = $kpi_values[$i]['flow_type_name'];
					   			$deger_flow = 0;
					   			for($k = 0 ; $k < $index_flow ; $k++){
					   				if($kontrol_flow[$k] == $kpi_values[$i]['flow_name'] && $kontrol_flow_type[$k] == $kpi_values[$i]['flow_type_name']){
					   					$deger_flow = 1;
					   				}
					   			}
					   			$index_flow++;
					   			 if($deger_flow == 0): ?>
					   				<?php echo form_open_multipart("kpi_insert/".$this->uri->segment(2)."/".$this->uri->segment(3)."/".$kpi_values[$i]['flow_id']."/".$kpi_values[$i]['flow_type_id']."/".$kpi_values[$i]['prcss_id']); ?>
					   				<table class='table table-bordered' style='margin-bottom:0px;'>
					   				<tr>
					   					<td style="width:100px;"><?php echo $kpi_values[$i]['prcss_name']; ?></td>
					   					<td style="width:100px;"><?php echo $kpi_values[$i]['flow_name']."-".$kpi_values[$i]['flow_type_name']; ?></td>
					   					<td style="width:150px;"><?php echo $kpi_values[$i]['kpi']." ".$kpi_values[$i]['unit_kpi']; ?></td>
					   					<td style="width:200px;"><input type='text' class='form-control' id='benchmark_kpi' name='benchmark_kpi' value='<?php echo $kpi_values[$i]['benchmark_kpi']; ?>'></td>
					   					<td><textarea class='form-control' id='best_practice' name='best_practice' rows='3'><?php echo $kpi_values[$i]['best_practice']; ?></textarea></td>
					   				</tr>

			   						</table>
			   						</form>
			   					<?php endif;
		   					}
		   				}

		   				}
	   				?>
	   			</div>
		    <?php endif ?>
		    <?php endif ?>
	   	<?php endforeach */ ?>

			<table id="dg" class="easyui-datagrid"
			    data-options="
			        iconCls: 'icon-edit',
			        singleSelect: true,
			        toolbar: '#tb',
			        url: '<?php echo base_url("kpi_json/".$this->uri->segment(2).'/'.$this->uri->segment(3)); ?>',
			        method: 'get',
			        fitColumns: true,
			        nowrap: false,
			        onClickRow: onClickRow
			    ">
				<thead>
				    <tr>
				        <th data-options="field:'allocation_name',align:'left',width:250"><?php echo lang("allocation"); ?></th>
<!-- 				    <th data-options="field:'flow_name',align:'center',width:110">Flow</th>
				        <th data-options="field:'flow_type_name',align:'center',width:80">Flow Type</th> -->
				        <th data-options="field:'kpi',align:'center',width:100">KPI</th>
				        <th data-options="field:'benchmark_kpi',width:100,align:'center',editor:{type:'numberbox',options:{precision:5}}"><?php echo lang("benchmark"); ?></th>
				        <th data-options="field:'unit_kpi',align:'center',width:100"><?php echo lang("kpiunit"); ?></th>
				        <th data-options="field:'kpidef',align:'center',width:130"><?php echo lang("kpidef"); ?></th>
				        <th data-options="field:'best_practice',width:200,align:'center',editor:'text'"><?php echo lang("comments"); ?></th>
				        <th data-options="field:'option',width:80,align:'center',editor:{type:'checkbox',options:{on:'Option',off:'Not An Option'}}" formatter="formatOption"><?php echo lang("isoption"); ?>?</th>
				        <th data-options="field:'allocation_id',width:100,align:'center'" formatter="formatDetail"><?php echo lang("editallocation"); ?></th>
				    </tr>
				</thead>
			</table>
    <div id="tb">
    		<p style="float:left;"><?php echo lang("kpiheading1"); ?></p>
        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',plain:true" onclick="accept()"><?php echo lang("saveallchanges"); ?></a>
        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-undo',plain:true" onclick="reject()"><?php echo lang("cancelallchanges"); ?></a>
        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-search',plain:true" onclick="getChanges()"><?php echo lang("seechanges"); ?></a>
    </div>
    <script>
			function formatDetail(value,row){
				var href = 'cpscoping/edit_allocation/'+value;
				return '<a class="label label-info" href="<?php echo base_url("' + href + '"); ?>"><?php echo lang("edit"); ?></a>';
			}
			function formatOption(val,row){
			    if (val == "Option"){
			        return '<span style="color:green;">('+val+')</span>';
			    } else {
			      	return '<span style="color:darkred;">('+val+')</span>';
			    }
			}
		</script>
    <script type="text/javascript">
        var editIndex = undefined;
        function endEditing(){
            if (editIndex == undefined){return true}
            if ($('#dg').datagrid('validateRow', editIndex)){
                $('#dg').datagrid('endEdit', editIndex);
                editIndex = undefined;
                return true;
            } else {
                return false;
            }
        }
        function onClickRow(index){
            if (editIndex != index){
                if (endEditing()){
                    $('#dg').datagrid('selectRow', index)
                            .datagrid('beginEdit', index);
                    editIndex = index;
                } else {
                    $('#dg').datagrid('selectRow', editIndex);
                }
            }
        }
        function accept(){
            if (endEditing()){
            	var rows = $('#dg').datagrid('getRows');
        			var prjct_id = <?php echo $this->uri->segment(2); ?>;
							var cmpny_id = <?php echo $this->uri->segment(3); ?>;
							$("#alerts").html("");
							$("#alerts").fadeIn( "fast" );
							$.each(rows, function(i, row) {
							  $('#dg').datagrid('endEdit', i);
							  /* var url = row.isNewRecord ? 'test.php?savetest=true' : 'test.php?updatetest=true'; */
							  var url = '../../kpi_insert/'+prjct_id+'/'+cmpny_id+'/'+row.flow_id+'/'+row.flow_type_id+'/'+row.prcss_id;
							  $.ajax(url, {
							      type:'POST',
							      dataType:'json',
							      data:row,
					          success: function(data, textStatus, jqXHR) {
					          	console.log(data);
					          	//alert(data);
					          	$("#alerts").append(data);
					          	deneme();
										},
								    error: function(jqXHR, textStatus, errorThrown) {
										  console.log(textStatus, errorThrown);
										}
							  });
							});
							$("#alerts").delay(5000).fadeOut( "fast" );

            }
        }
        function reject(){
            $('#dg').datagrid('rejectChanges');
            editIndex = undefined;
        }
        function getChanges(){
            var rows = $('#dg').datagrid('getChanges');
            alert(rows.length+' rows are changed!');
        }
    </script>
    <div id="alerts" style="margin-top: 20px;font-size: 13px;color: darkgrey;"></div>
    <hr>
<div class="col-md-6">
		<p><?php echo lang("kpiheading2"); ?></p>
<!-- 		<div class="label label-danger">After a save, you should reload the page to see updated graph.</div> -->		
		<div id="chart_div" style="border:2px solid #f0f0f0;"></div>
		</div><div class="col-md-6">
		<p><?php echo lang("searchdocument"); ?></p>
		<?php echo form_open_multipart('search_result/'.$this->uri->segment(2).'/'.$this->uri->segment(3)); ?>
		  <input style="margin-bottom:10px;" type="text" class="form-control" id="search" placeholder="" name="search">
	  </form>
	  <hr>
	  <p><?php echo lang("documentupload"); ?></p>
	  <div class="form-group">
		  	<?php if(validation_errors() != NULL ): ?>
			    <div class="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<h4>Form couldn't be saved</h4>
			      	<p>
			      		<?php echo validation_errors(); ?>
			      	</p>
			    </div>
			<?php endif ?>
			<?php echo form_open_multipart('cpscoping/file_upload/'.$this->uri->segment('2').'/'.$this->uri->segment('3')); ?>
			    <input type="text" class="form-control" id="file_name" placeholder="<?php echo lang("filename"); ?>" name="file_name">
			    <input type="file" name="userfile" id="userfile" size="20" />
					<br/>
			    <button type="submit" class="btn btn-info btn-sm"><?php echo lang("savefile"); ?></button>
		    </form>
		    <hr>
		    <p><?php echo lang("uploadeddocument"); ?></p>
		    <table class="table table-bordered">
		    	<tr>
		    		<th>Index</th>
		    		<th><?php echo lang("filename"); ?></th>
		    		<th><?php echo lang("manage"); ?></th>
		    	</tr>
			    <?php $sayac = 1;foreach ($cp_files as $file): ?>
			    	<tr>
			    		<td>
			    			<?php echo $sayac; $sayac++; ?>
			    		</td>
			    		<td>
			    			<a href="<?php echo base_url("assets/cp_scoping_files/".$file['file_name']); ?>" id="<?php echo $file['id']; ?>"
		    						style="width:100%;background-color: Transparent;
									    background-repeat:no-repeat;
									    border: none;
									    cursor:pointer;
									    overflow: hidden;
									    outline:none;">
								<?php echo $file['file_name']; ?>
							</a>
			    		</td>
			    		<td>
			    			<a onclick="return confirm('Are you sure?')" href="<?php echo base_url("cpscoping/file_delete/".$file['file_name']."/".$this->uri->segment(2)."/".$this->uri->segment(3)); ?>"><?php echo lang("delete"); ?></a>
			    		</td>
			    	</tr>
			    <?php endforeach ?>
		    </table>
		</div>
	</div>

	</div>



<?php else: ?>
	<div class="container">
		<div class="col-md-4"></div>
		<div class="col-md-4" style="margin-bottom: 10px; text-align:center;">
			<a class="btn btn-default btn-sm" href="<?php echo base_url('cpscoping/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/show'); ?>">Show CP Scoping Data</a>
			<p>There is nothing to display!</p>
		</div>
		<div class="col-md-4"></div>
	</div>
<?php endif ?>
		    
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
	function deneme() {
		google.load("visualization", "1", {packages:["corechart"]});

		var prjct_id = <?php echo $this->uri->segment(2); ?>;
		var cmpny_id = <?php echo $this->uri->segment(3); ?>;

		var prcss_array = new Array();
		var flow_array = new Array();
		var flow_type_array = new Array();
		var nameofref = new Array();
		var kpi = new Array();
		var kpi2 = new Array();
		var index = 0;
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: '<?php echo base_url('kpi_calculation_chart'); ?>/'+prjct_id+'/'+cmpny_id,
			success: function(data){
				if(data['allocation'].length != 0){
					//console.log(data['allocation']);
					for(var i = 0 ; i < data['allocation'].length ; i++){
						if(data['allocation'][i].benchmark_kpi != 0){
							prcss_array[index] = data['allocation'][i].prcss_name;
							flow_array[index] = data['allocation'][i].flow_name;
							flow_type_array[index] = data['allocation'][i].flow_type_name;
							nameofref[index] = data['allocation'][i].nameofref;

							kpi[index] = data['allocation'][i].kpi/data['allocation'][i].benchmark_kpi*100;
							//console.log(kpi[index]);
							//kpi2[index] = 100-Math.abs(kpi[index]);
							kpi2[index] = 0;
							index++;
						}
					}
					//console.log(kpi2);
					var data = new google.visualization.DataTable();
					//console.log(data);
					var newData = new Array(index);
		          	for(var i = 0 ; i < index+1 ; i++){
		          		newData[i] = new Array(4);
		          	}

		          	newData[0][0] = 'Genre';
		          	newData[0][1] = '';
		          	newData[0][2] = 'Company performance relative to benchmark';
		          	newData[0][3] = { role: 'annotation' };
		          	newData[0][4] = { role: 'style' };

		          	for(var i = 1 ; i < index+1 ; i++){
		          		newData[i][0] = prcss_array[i-1]+" ("+flow_array[i-1]+"-"+flow_type_array[i-1]+" / "+nameofref[i-1]+")";
		          		if(kpi[i-1]<0){
		          			newData[i][1] = 0;
		          		}
		          		else{
		          		newData[i][1] = kpi2[i-1];
		          		}
		          		
		          			newData[i][2] = Math.abs(Math.round(kpi[i-1]));
		          		
		          		newData[i][3] = '';
		          		//console.log(kpi[i-1]);
		          		if(kpi[i-1]<100){
		          			newData[i][4] = 'green';
		          		}
		          		else if(kpi[i-1]=="100"){
		          			newData[i][4] = 'yellow';
		          		}
		          		else{
		          			newData[i][4] = 'red';
		          		}
		          	}

		          	var data2 = google.visualization.arrayToDataTable(newData);

		          	var options = {
			          	title: 'red: "Exceed Benchmark-KPI" \n yellow: "Equal to Benchmark-KPI" \n green: "Better than Benchmark-KPI"',  
			          	titleTextStyle: {color: '#d0d0d0',bold: 'false'},
			          	legend: { position: "none",  },
					        height: 600,
					        bar: { groupWidth: '75%' },
					        isStacked: true,
					        vAxis: {title: "[%] of Benchmark KPI" ,viewWindow: {max: 370}},
					        hAxis: {title: 'Process and KPI definition', titleTextStyle: {color: 'green'}},				        
					    	};
					    	var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
					    	chart.draw(data2, options);
				}
			}
		});
	    /*var data = google.visualization.arrayToDataTable([
			['API Category', 'Social', 'Error', { role: 'annotation' } ],
		  	['2011', 98, 53, ''],
		  	['2012', 151, 34, ''],
		  	['2013', 69, 27, ''],
		]);

	    var options = {
		    width: 1000,
		    height: 550,
		    legend: { position: 'top', maxLines: 3, textStyle: {color: 'black', fontSize: 16 } },
			isStacked: true,

			// Displays tooltip on selection.
			// tooltip: { trigger: 'selection' }, 
		 };

	    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
	    chart.draw(data, options);

		// Selects a set point on chart.
		// chart.setSelection([{row:0,column:1}]) 

		// Renders chart as PNG image 
		// chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';*/
	};
</script>
<script type="text/javascript">
	deneme();
</script>