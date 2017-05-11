
<link rel="stylesheet" type="text/css" href="<?php echo asset_url('is/themes/bootstrap/easyui.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo asset_url('is/themes/icon.css'); ?>">
  
<script type="text/javascript" src="<?php echo asset_url('is/jquery.easyui.min.js'); ?>"></script>
<?php if($language == 'turkish') { ?>
    <script type="text/javascript" src="<?php echo asset_url('is/locale/easyui-lang-tr.js'); ?>"></script>
<?php }  ?>
<!--<script type="text/javascript" src="<?php echo asset_url('is/locale_IS/IS_lang_tr.js'); ?>"></script>-->
<script type="text/javascript" src="http://www.jeasyui.com/easyui/datagrid-detailview.js"></script>

<!--<script src="<?php /*echo asset_url('is/src/datagrid-filter.js');*/ ?>"></script>-->

<?php if($language == 'turkish') { ?>
    <script src="<?php echo asset_url('is/IS_js/scenariosCns_tr.js'); ?>"></script>
<?php } else { ?>
    <script src="<?php echo asset_url('is/IS_js/scenariosCns.js'); ?>"></script>
<?php }  ?>

<!-- Zeynel Dağlı
    02-02-2015
    proje id değeri session içinden alınacak
-->
<input type ="hidden" value='<?php echo $project_id; ?>' id ='prj_id' name='prj_id'></input>
<input type ="hidden" value="<?php echo $userID; ?>" id ="consultant_id"  name="consultant_id"></input>
<div class="col-md-12">
    <div id="cc" class="easyui-layout" data-options="fit:true" style="height:1500px;">

        <!--<div data-options="region:'south',split:true" style="height:550px; padding-bottom:200px;">
            <div class="easyui-layout" data-options="fit:true">
                <div id="zeyn"   data-options="region:'west',split:true" style="width:50%;">
                    <table  id="tt_grid_dynamic"  title="Dynamic table with IS potentials" >
                        
                    </table>
                </div>
                <div id="tt_grid_dynamic5_div" data-options="region:'center'" style="width:50%;">
                    <table id="tt_grid_dynamic5" class="easyui-datagrid" title="IS potentials" style="height:100%"
                        data-options="singleSelect:false,
                                    collapsible:true,
                                    /*url:'datagrid_data1.json',*/
                                    /*url:'../slim_rest/index.php/companies',*/
                                    method:'get',
                                    idField:'id'">

                    </table>
                </div>  
            </div> 
        </div>-->
        
        <!--<div data-options="region:'west',split:true" title="Flow Categories" style="width:10%;">
            <ul id="tt_tree" class="easyui-tree" ></ul>
        </div>-->
        <!--<div id="tt_grid_div" data-options="region:'center',title:'IS Scenarios Analysis Settings'">-->
            
            <!--<div id="p" class="easyui-panel" title="Company/Flow Panel" style="margin: auto 0;height:440px"
                 data-options="iconCls:'icon-save',collapsible:true,closable:true">
                     <table id="tt_grid" data-options="fit:true" class="easyui-datagrid" title="Company Flow Sets" style="" 
                           accesskey=""></table>
                
            </div>-->
            
            <div id="p2" class="easyui-panel" title="<?php echo lang("isprojectspanel"); ?>" style="margin: auto 0;height:480px;"
                 data-options="iconCls:'icon-save',collapsible:true,closable:true">
                   <table id="tt_grid_scenarios" data-options="fit:true"  title="<?php echo lang("isscenarios"); ?>" style=""> 
                </table>  
                
            </div>
            
            <div id="p" class="easyui-panel" title="<?php echo lang("isscompanieslocation"); ?>" 
                 data-options="collapsed:true" 
                 style="margin: auto 0;height:400px">  
                <a href="#" name="add" onclick="event.preventDefault();" 
                     ></a>  
                <iframe src="" id="myFrame" width="100%" marginwidth="0" 
                      height="100%" 
                      marginheight="0" 
                      align="middle" 
                      scrolling="auto">
                  </iframe>
            </div>
            
            <div id="p3" class="easyui-panel" title="<?php echo lang("isprojectdetails"); ?>" style="margin: auto 0;height:300px;"
                 data-options="iconCls:'icon-save',collapsible:true,closable:true">
                   <table id="tt_grid_scenarios_details" data-options="fit:true"   title="<?php echo lang("isscenariodetails"); ?>" style=""> 
                </table>  
                
            </div>
            
            <div id="p4" class="easyui-panel" title="<?php echo lang("isprojecteditdetails"); ?>" style="margin: auto 0;height:200px;"
                 data-options="iconCls:'icon-save',collapsible:true,closable:true">
                   <table id="tt_grid_scenarios_details_edit" data-options="fit:true"   title="<?php echo lang("isscenariodetails"); ?>" style=""> 
                </table>  
                
            </div>
            
            
            
            
             <div id="tb" style="padding:5px;height:auto">
                <div style="margin-bottom:5px">
                    <!--<a href="#" onclick="loadData();" class="easyui-linkbutton" iconCls="icon-add" plain="true"></a>-->
                    <a href="#" name="del" onclick="getColumnsDynamic();getCompaniesISPotentials();" class="easyui-linkbutton" iconCls="icon-edit" plain="true"><?php echo lang("isscenariodetails"); ?></a>
                    <a href="<?php echo base_url('isScopingPrjBaseMDF'); ?>" onclick="" class="easyui-linkbutton" iconCls="icon-back" plain="true"><?php echo lang("gotoismanualpage"); ?></a>
                    <a href="<?php echo base_url('isScopingAutoPrjBaseMDF'); ?>" onclick="" class="easyui-linkbutton" iconCls="icon-back" plain="true"><?php echo lang("gotoisautopage"); ?></a>
                    <a href="#" onclick="closeMapPanel();event.preventDefault();" class="easyui-linkbutton" iconCls="icon-remove" plain="true"><?php echo lang("closemap"); ?></a>
                    <!--<a href="#" onclick="saveAutoPotentials();" class="easyui-linkbutton" iconCls="icon-save" plain="true">Save a table with relevant IS potentials</a>
                    <a href="#" onclick="selectAllCompanies();" class="easyui-linkbutton" iconCls="icon-edit" plain="true">Select all companies</a>
                    <a href="#" onclick="openIsScenarios();" class="easyui-linkbutton" iconCls="icon-edit" plain="true">IS Table management</a>
                    <a href="#" id="printGrid" onclick="/*javascript:window.print();*/" class="easyui-linkbutton" data-options="iconCls:'icon-print'" plain="true">Print</a>-->

                </div>
                 
                 
                 <div id="tb_scenario_details" style="padding:5px;height:auto">
                <div style="margin-bottom:5px">
                    <?php echo lang("isscenarioname"); ?>: <input id="tt_scenario_name" class="easyui-textbox" style="width:400px" data-options="
                            //readonly : true,
                            prompt: 'Scenario name will be displayed here!',
                            iconWidth: 22,
                            icons: [{
                                iconCls:'icon-search',
                                /*handler: function(e){
                                    var v = $(e.data.target).textbox('getValue');
                                    alert('The inputed value is ' + (v ? v : 'empty'));
                                }*/
                            }]
                            ">

                </div>
                 
                 
                 <!--<div>
                    <label style="margin-right:7px;">IS Scenario Type:</label>
                    <input class="easyui-combobox" 
                       name="IS_search" id="IS_search"
                       data-options="
                               url:'<?php /*echo asset_url('is/combobox_data1.json');*/ ?>',
                               method:'get',
                               valueField:'id',
                               textField:'text',
                               panelHeight:'auto',
                               icons:[{
                                   iconCls:'icon-add'
                               }]
                       ">

                 </div>-->
                 
            </div>
                
           
            
        </div>
    </div>
    
   
</div>