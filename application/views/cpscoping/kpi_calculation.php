<script type="text/javascript" src="<?php echo asset_url('js/easy-ui-1.4.2.js'); ?>"></script>
<?php if (!empty($kpi_values)): ?>
	<div class="col-md-12" style="margin-bottom: 10px;">
		<a class="btn btn-inverse btn-sm" href="<?php echo base_url('cpscoping/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/show'); ?>"><?php echo lang("gotocp"); ?></a>
		<a href="<?php echo base_url('new_flow/'.$this->uri->segment(3)); ?>/" class="btn btn-inverse btn-sm" id="cpscopinga"><?php echo lang("gotodataset"); ?></a>
	</div>
	<div class="col-md-12" id="8lik">
			<table id="dg" class="easyui-datagrid"
			    data-options="
			        iconCls: 'icon-edit',
			        singleSelect: false,
			        ctrlSelect: true,
			        toolbar: '#tb',
			        url: '<?php echo base_url("kpi_json/".$this->uri->segment(2).'/'.$this->uri->segment(3)); ?>',
			        method: 'get',
			        fitColumns: true,
			        nowrap: false,
			        rownumbers: true,
			        onClickRow: onClickRow
			    ">
				<thead>
				    <tr>
				        <th data-options="field:'allocation_name',align:'left',width:200"><?php echo lang("allocation"); ?></th>
<!-- 				    <th data-options="field:'flow_name',align:'center',width:110">Flow</th>
				        <th data-options="field:'flow_type_name',align:'center',width:80">Flow Type</th> -->
				        <th data-options="field:'kpi',align:'right',width:100">KPI</th>
				        <th data-options="field:'benchmark_kpi',width:100,align:'right',editor:{type:'numberbox',options:{precision:2}}"><?php echo lang("benchmark"); ?><span style="color:red;">*</th>
				        <th data-options="field:'unit_kpi',align:'right',width:50"><?php echo lang("kpiunit"); ?></th>
				        <th data-options="field:'kpidef',align:'center',width:130"><?php echo lang("kpidef"); ?></th>
				        <th data-options="field:'best_practice',width:200,align:'center',editor:'text'"><?php echo lang("CBoptionname"); ?> <span style="color:red;">*</th>				        
				        <th data-options="field:'description',width:300,align:'left',
				        editor:{
							    type:'textbox',
							    options:{
							        multiline:true,
							        prompt:'Describe your cost benefit option...',
							        height:100
							    }
							}"
							><?php echo lang("description"); ?></th>
				        <th data-options="field:'option',width:80,align:'center',editor:{type:'checkbox',options:{on:'Option',off:'Not An Option'}}" formatter="formatOption"><?php echo lang("isoption"); ?>?</th>
				        <th data-options="field:'allocation_id',width:100,align:'center'" formatter="formatDetail"><?php echo lang("editallocation"); ?></th>
				    </tr>
				</thead>
			</table>
    <div id="tb">
    		<p style="float:left;"><?php echo lang("kpiheading1"); ?></p>
        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',plain:true" onclick="accept()"><?php echo lang("saveallchanges"); ?></a>
        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-undo',plain:true" onclick="reject()"><?php echo lang("cancelallchanges"); ?></a>
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
            if(endEditing()){
            	var rows = $('#dg').datagrid('getRows');
    			var prjct_id = <?php echo $this->uri->segment(2); ?>;
				var cmpny_id = <?php echo $this->uri->segment(3); ?>;
				var promises = [];
				$("#alerts").html("");
				$("#myModalsave").modal("show");
				$("#myModalsave .modal-body button").prop("disabled", true);
				$("#myModalsave .modal-body button").text("Saving");
				$("#alerts").fadeIn( "fast" );
				$('#dg').datagrid('unselectAll');
				$.each(rows, function(i, row) {
					$('#dg').datagrid('endEdit', i);
					/* var url = row.isNewRecord ? 'test.php?savetest=true' : 'test.php?updatetest=true'; */
					var url = '../../kpi_insert/'+prjct_id+'/'+cmpny_id+'/'+row.flow_id+'/'+row.flow_type_id+'/'+row.prcss_id+'/'+row.allocation_id;
					var request = $.ajax(url, {
						type:'POST',
						dataType:'json',
						data:row,
						success: function(data, textStatus, jqXHR) {
							insertInline(i+1, data);
							console.log(data);
							//if the returned data is an error it contains color:red 
							if (data.indexOf("red") >= 0) {
								//marks the rows which are incomplete
								$('#dg').datagrid('selectRow', i);
							}
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.log(textStatus, errorThrown);
						},
					});
					promises.push(request);
				});
            }
	    	//allows to do something after all requests in the loop are finished
			$.when.apply(null, promises).done(function(){
				$("#myModalsave .modal-body button").prop("disabled", false);
				$("#myModalsave .modal-body button").text("Done");
				deneme();
			})
        }


        function reject(){
            $('#dg').datagrid('rejectChanges');
            editIndex = undefined;
        }
        function getChanges(){
            var rows = $('#dg').datagrid('getChanges');
            alert(rows.length+' rows are changed!');
        }

        //allows to sort the answers/rows from the asynchronous post from the save (accept() function)
		function insertInline(rownumber, data) {
			var curDomElement;
		  	var prevDomElement;
		  	var insertBefore;
			$('#alerts div').each(function(index) {
				prevDomElement = curDomElement;
				curDomElement = $(this);
				if(parseInt(curDomElement.data('row')) > rownumber){
					insertBefore = curDomElement;
				  	return false;
				}
			});
		  	if(insertBefore){
		    	$("<div data-row="+rownumber+">Row "+rownumber+": "+data+"</div)").insertBefore(insertBefore);
		  	} else {
		    	$("#alerts").append("<div data-row="+rownumber+">Row "+rownumber+": "+data+"</div)");
		  	}
		}

    </script>
    <hr>
<div class="col-md-6">
		<p><?php echo lang("kpiheading2"); ?></p>
<!-- 		<div class="label label-danger">After a save, you should reload the page to see updated graph.</div> -->		
		<div id="chart_div" style="border:2px solid #f0f0f0;"></div>
</div>
<div class="col-md-6">
		<p><b><?php echo lang("searchdocument"); ?></b></p>
			<?php echo form_open_multipart('search_result/'.$this->uri->segment(2).'/'.$this->uri->segment(3)); ?>
			 	<input style="margin-bottom:10px;" type="text" class="form-control" id="search" placeholder="" name="search">
		  	</form>
		<hr>
	 	<p><b><?php echo lang("documentupload"); ?></b> <small>(<?php echo lang("allowedfiletypes") ?>)</small></p>
	 	 	<div class="form-group">
	 	 		<?php
		 	 		if(isset($error)) {
	                    echo "<div style=' color:#E74C3C;margin: 10px 0;padding: 15px;padding-bottom: 0;border: 1px solid;'>Error while uploading, please check file size or document type: ".$error."</div>";
	                }
	                elseif($success) {
	      				echo "<div style=' color:#2eb3e7;margin: 10px 0;padding: 15px;padding-bottom: 20;border: 1px solid;'>You have successfully uploaded a new file.</div>";
	                }
                ?>
				<?php echo form_open_multipart('cpscoping/file_upload/'.$this->uri->segment('2').'/'.$this->uri->segment('3')); ?>
				    <input type="file" name="docuFile" id="docuFile"> <br/>
				    <input type="submit" class="btn btn-info btn-sm" value="<?php echo lang("savefile"); ?>">
		   		</form>
		   	</div>
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

<div class="modal fade" id="myModalsave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel"><?php echo lang("savekpi") ?></h4>
		    </div>
		    <div class="modal-body">
		      	<div id="alerts" style="margin-top: 20px;font-size: 13px;color: darkgrey;"></div>
		      	<br>
	      		<button type="button" data-dismiss="modal" class="btn btn-info btn-block" aria-hidden="true" disabled><?php echo lang("saving"); ?></button>
		    </div>
		    <div class="modal-footer"></div>
	    </div>
 	</div>
</div>
		    
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
	function deneme() {
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
	};
</script>
<script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
	google.setOnLoadCallback(deneme);
</script> 