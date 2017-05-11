
<link rel="stylesheet" type="text/css" href="<?php echo asset_url('is/themes/bootstrap/easyui.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo asset_url('is/themes/icon.css'); ?>">


<script src="<?php echo asset_url('is/print/jQuery.print.js'); ?>"></script> 
<script src="<?php echo asset_url('is/src/datagrid-filter.js'); ?>"></script>
<script type="text/javascript" src="http://www.jeasyui.com/easyui/datagrid-detailview.js"></script>
<?php if($language == 'turkish') { ?>
    <script src="<?php echo asset_url('is/IS_js/js2_scen_slim2_project_base_mdf_tr.js'); ?>"></script>
<?php } else { ?>
    <script src="<?php echo asset_url('is/IS_js/js2_scen_slim2_project_base_mdf.js'); ?>"></script>
<?php }  ?>
     
<!-- Zeynel Da�l�
    02-02-2015
    proje id de�eri session i�inden al�nacak
-->

<input type ="hidden" value="<?php echo $project_id; ?>" id ="prj_id"  name="prj_id"></input>  
<input type ="hidden" value="<?php echo $userID; ?>" id ="consultant_id"  name="consultant_id"></input>


    <div class="easyui-layout" id="cc" data-options="" style="width:100%;height:1000px;">
        <!--<div data-options="region:'north'" style="height:50px"></div>-->
        <div data-options="region:'south',split:true" style="height:600px;">
            
            
            <div id="cc2" class="easyui-layout" data-options="fit:true">
                <!--<div data-options="region:'north',split:true,border:false" style="height:50px"></div>-->
                <div data-options="region:'north',split:true,border:true,collapsed:true" style="width:100%;height:400px">
                      <div id="p" class="easyui-panel" title="IS Companies Location" 
                           data-options="iconCls:'icon-ok',tools:'#tt',toolbar:'#tbclosemap'" style="margin: auto 0;height:400px">  
                           
                          <iframe src="../IS_OpenLayers/mapDefault.php" id="myFrame" width="100%" marginwidth="0" 
                                height="100%" 
                                marginheight="0" 
                                align="middle" 
                                scrolling="auto">
                            </iframe>
                          <div id="tt">
                                <a href="javascript:void(0)" onclick="event.preventDefault();closeMapPanel()" 
                                   class="icon-remove" ></a>
                            </div>
                        </div>   
                </div>
                <div id="tbclosemap" style="padding:5px;height:auto">
                    <div style="margin-bottom:5px">
                        <!--<a href="#" onclick="deleteISPotential();" class="easyui-linkbutton" iconCls="icon-cut" plain="true">Remove row</a>-->
                        
                        <a href="#" onclick="closeMapPanel();event.preventDefault();" class="easyui-linkbutton" iconCls="icon-remove" plain="true">Close Map</a>
                        <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-save'"><?php echo lang("save"); ?></a>
                        
                    </div>
                </div>
                
                <div data-options="region:'west',split:true,border:true" style="width:50%;height:200px">
                    <table id="tt_grid_dynamic2" class="easyui-datagrid" title="Step 2:  <?php echo lang("selectfromselectedcompany"); ?>" style=""
                    data-options="singleSelect:false,
                                    collapsible:true,
                                    /*url:'datagrid_data1.json',*/
                                    /*url:'../slim_rest/index.php/companies',*/
                                    method:'get',
                                    idField:'id'">


                    </table>
                </div>
                <!--<div data-options="region:'east',split:true,border:false" style="width:50%"></div>-->
                <div data-options="region:'center',border:true,split:true" style="width:50%;height:200px">   
                      <table id="tt_grid_dynamic3"  title="Step 3:<?php echo lang("specificflow"); ?> " style=""
                    data-options="singleSelect:false,
                                    collapsible:true,
                                    /*url:'datagrid_data1.json',*/
                                    /*url:'../slim_rest/index.php/companies',*/
                                    method:'get',
                                    idField:'id'">

                    </table>
                    
                </div>
                <!--<div data-options="region:'south',split:true,border:true"  style="width:100%;">
                    <div id="p" class="easyui-panel" title="IS Companies Location" data-options="" style="margin: auto 0;height:500px">  
                            <iframe src="../IS_OpenLayers/mapDefault.php" id="myFrame" width="100%" marginwidth="0" 
                                height="100%" 
                                marginheight="0" 
                                align="middle" 
                                scrolling="auto">
                            </iframe>
                        </div>
                </div>-->
                
            </div>
            
        </div>
        <!--<div data-options="region:'east',split:true" title="East" style="width:100px;"></div>-->
        <!--<div data-options="region:'west',split:true" title="Step 1: Flows" style="width:10%;">
            <ul id="tt_tree2" class="easyui-tree" ></ul>
            
        </div>-->
        <div data-options="region:'center',title:'<?php echo lang("ispotentialssettings"); ?> ',iconCls:'icon-ok'">
            
            <div id="p" class="easyui-panel" title="<?php echo lang("manualispotentialssettings"); ?>" style="margin: auto 0;"
                 data-options="iconCls:'icon-save',collapsible:true,closable:true,fit:true">
                     <table id="tt_grid2" data-options="fit:true" class="easyui-datagrid" title="Step 1: <?php echo lang("selectcompanyflowmatching"); ?>" 
                            style="height:440px" 
                           accesskey=""></table>
                
            </div>
            
        </div>
        <div data-options="region:'east',split:true" title="IS potential" style="width:30%;">
            <table id="tt_grid_dynamic4" class="easyui-datagrid" title="Step 4: <?php echo lang("ispotentials"); ?>" style="height:100%"
                data-options="singleSelect:false,
                            collapsible:true,
                            /*url:'datagrid_data1.json',*/
                            /*url:'../slim_rest/index.php/companies',*/
                            method:'get',
                            idField:'id'">

            </table>
            
        </div>
    </div>



    <div id="tb" style="padding:5px;height:auto">
        <div style="margin-bottom:5px">
            <!--<a href="#" onclick="addRow();" class="easyui-linkbutton" iconCls="icon-add" plain="true">Add Potential IS</a>-->
            <a href="#specificFlow" onclick="beginISPotential();" class="easyui-linkbutton" iconCls="icon-edit" plain="true"><?php echo lang("getflowdetailsforthiscompany"); ?></a>
            <!--<a href="#" onclick="beginISPotentialByAllFlows();" class="easyui-linkbutton" iconCls="icon-edit" plain="true">IS Process By All Flows</a>-->
            <!--<a href="#" onclick="beginISPotentialByFlows();" class="easyui-linkbutton" iconCls="icon-edit" plain="true">IS Process By Selected Flows</a>-->
            <!--<a href="#" onclick="openIsScenarios();" class="easyui-linkbutton" iconCls="icon-edit" plain="true">IS Table management</a>-->
            <a href="#" id="printGrid2" onclick="/*javascript:window.print();*/" class="easyui-linkbutton" data-options="iconCls:'icon-print'" plain="true"><?php echo lang("print"); ?></a>
            <!--<a href="#" onclick="savePotentials();" class="easyui-linkbutton" iconCls="icon-save" plain="true">Save a table with relevant IS potentials</a>-->
        </div>
         <div>
            <label style="margin-right:7px;"><?php echo lang("isscenariotype"); ?>:</label>
            <input class="easyui-combobox" 
               name="IS_search2" id="IS_search2"
               data-options="
                       url:'<?php echo asset_url('is/combobox_data1.json'); ?>',
                       method:'get',
                       valueField:'id',
                       textField:'text',
                       panelHeight:'auto',
                       icons:[{
                           iconCls:'icon-add'
                       }]
               ">
         </div>
    </div>

    <div id="tb2" style="padding:5px;height:auto">
        <div style="margin-bottom:5px">
            <a href="#" name="specificFlow" onclick="event.preventDefault();beginFlowPotential();" class="easyui-linkbutton" iconCls="icon-edit" plain="true"><?php echo lang("createflowmatching"); ?></a>
            <!--<a href="#" onclick="addRow();" class="easyui-linkbutton" iconCls="icon-add" plain="true">Add Potential IS</a>-->
            <a href="#" id="printGridPotentials2" onclick="/*javascript:window.print();*/" class="easyui-linkbutton" data-options="iconCls:'icon-print'" plain="true"><?php echo lang("print"); ?></a>
        </div>

    </div>

    <div id="tb4" style="padding:5px;height:auto">
        <div style="margin-bottom:5px">
            <!--<a href="#" onclick="deleteISPotential();" class="easyui-linkbutton" iconCls="icon-cut" plain="true">Remove row</a>-->
            <a href="#" onclick="event.preventDefault();deleteAllISPotential();" class="easyui-linkbutton" iconCls="icon-remove" plain="true"><?php echo lang("clearall"); ?></a>
            <a href="#" onclick="event.preventDefault();savePotentials();" class="easyui-linkbutton" iconCls="icon-save" plain="true"><?php echo lang("savetable"); ?></a>
            <a href="#" onclick="closeMapPanel();event.preventDefault();" class="easyui-linkbutton" iconCls="icon-remove" plain="true"><?php echo lang("closemap"); ?></a>
        </div>
    </div>

    <div id="tb3" style="padding:5px;height:auto">
        <div style="margin-bottom:5px">
            <a href="#" onclick="event.preventDefault();addRow();" class="easyui-linkbutton" iconCls="icon-add" plain="true"><?php echo lang("addpotentialis"); ?></a>
            <a href="#" id="printGridPotentials3" onclick="/*javascript:window.print();*/" class="easyui-linkbutton" data-options="iconCls:'icon-print'" plain="true"><?php echo lang("print"); ?></a>
        </div>
    </div>

    <div id="tb5" style="padding:5px;height:auto">
        <div style="margin-bottom:5px">
            <!--<a href="#" onclick="deleteISPotential();" class="easyui-linkbutton" iconCls="icon-cut" plain="true">Remove row</a>-->
            <a href="#" onclick="event.preventDefault();deleteAllISPotential();" class="easyui-linkbutton" iconCls="icon-remove" plain="true"><?php echo lang("clearall"); ?></a>
            <a href="#" onclick="event.preventDefault();savePotentials();" class="easyui-linkbutton" iconCls="icon-save" plain="true"><?php echo lang("savetable"); ?></a>
            <a href="#" onclick="closeMapPanel();event.preventDefault();" class="easyui-linkbutton" iconCls="icon-remove" plain="true"><?php echo lang("closemap"); ?></a>
        </div>
    </div>

    <div id="saveWindow" class="easyui-window" IS_synergy ="test" title="Save IS Scenario" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:500px;height:300px;padding:10px;">
        <div class="easyui-layout" data-options="fit:true">
            <!--<div data-options="region:'east',split:true" style="width:100px"></div>-->
            <div data-options="region:'center'" style="padding:10px;">
                <script>
                  /*console.log($("#saveWindow"));
                  console.log($("#saveWindow").attr( "IS_synergy" ));
                  console.log($("#saveWindow").attr( "IS_synergy" , "testtttt"));
                  console.log($("#saveWindow").attr( "IS_synergy" ));*/
                    
                </script>
                <form id="ff" method="post">
                <div style="padding:10px 60px 20px 60px">
                    <div style="margin-bottom: 7px;">
                        <label style="margin-right: 19px;
                                      margin-left: -8px;"><?php echo lang("isscenarioname"); ?>:</label>
                        <input id="tt_text" class="easyui-textbox" type="text" name="name" data-options="required:true"></input>
                    </div>
                    <div style="margin-left:-8px;">
                        <label style="margin-right:27px;"><?php echo lang("isscenariotype"); ?>:</label>
                        <input class="easyui-combobox" 
                            name="IS" id="IS"
                            data-options="
                                    url:'<?php echo asset_url('is/combobox_data1.json'); ?>',
                                    method:'get',
                                    valueField:'id',
                                    textField:'text',
                                    panelHeight:'auto',
                                    icons:[{
                                        iconCls:'icon-add'
                                    }]
                            ">
                    </div>
                    <div style="margin-left:-8px;">
                        <label style="margin-right: 17px;
                                        padding-bottom: 3px;"><?php echo lang("isscenariostatus"); ?>:</label>
                        <input class="easyui-combobox" 
                            name="IS_status" id="IS_status"
                            data-options="
                                    
                                    url :'../../../Proxy/SlimProxy.php?url=getScanarioStatus_scn',
                                    //queryParams : { url : 'getScanarioStatus_scn},
                                    method:'get',
                                    valueField:'id',
                                    textField:'text',
                                    panelHeight:'auto',
                                    icons:[{
                                        iconCls:'icon-add'
                                    }],
                                    required:true,
                            ">
                    </div>
                    
                </div>
               
                   
            </div>
            <div data-options="region:'south',border:false" style="text-align:right;padding:5px 0 0;">
                <!--<input type="submit" value="Save IS potentials table">-->
                <a class="easyui-linkbutton" data-options="iconCls:'icon-ok'" href="javascript:void(0)" onclick="saveISScenario();" style="">Save IS potentials table</a>
                <!--<a class="easyui-linkbutton" data-options="iconCls:'icon-ok'" href="javascript:void(0)" onclick="submitForm();" style="">Save IS potentials table</a>-->
                <a class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" href="javascript:void(0)" onclick="windowManualISQuitWithoutSaving();" style="">Quit without saving</a>
            </div>
            </form>
        </div>
    </div>
