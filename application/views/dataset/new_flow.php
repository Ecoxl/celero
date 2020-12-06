<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script>
    $( function() {
        $( document ).tooltip();
    } );
</script>

<script type="text/javascript">
    function getFlowId(userid) {
        var id = $('.selectize-input .item').html();
        var isnum = /^\d+$/.test(id);
        //alert(isnum);
        if (isnum) {
            alert("You can't enter only numerical characters as a flow name!");
            $("select[id=selectize] option").remove();
        }
        
        //console.log(id);
        var newid = $('select[name=flowname]').val();
        var newisnum = /^\d+$/.test(newid);
        if (!newisnum && newid != "") {
            $('#flow-family').show("slow");
        }
        //getEPValues(id,userid);
    }
</script>
<div class="col-md-4 borderli" <?php if (validation_errors() == NULL) {
    echo "id='gizle'";
} ?>>
    <?php echo form_open_multipart('new_flow/' . $companyID); ?>
    <?php if (validation_errors() == NULL): ?>
        <button id="ac-hide" type="button" class="close" aria-hidden="true">&times;</button>
    <?php endif ?>
    <p class="lead"><?php echo lang("addflow"); ?></p>
    <!-- this is the new automatic Flow selector and EP calculator -->
    <div class="form-group">
        <label for="epcalc"><?php echo lang("epcalc"); ?></label>
        <button type="button" data-toggle="modal" data-target="#myModalEPcalc" class="btn btn-block btn-primary" id="UBP-button"><?php echo lang("epbutton"); ?></button>
        <span class="small">Environmental Impact Calculator is based on the UBP-Values of "Licence" or the data you added under "Import UBP values" page.</span>
        <span class="small">To add a flow which is not in the calculator, you have to define it (and its' UBP) under <a href="<?php echo base_url('datasetexcel'); ?>"><i class="fa fa-globe"></i> Import UBP values</a> page.</span>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-8">
                <label for="quantity"><?php echo lang("quantity"); ?>/a <span style="color:red;">* </span></label>
                <input type="text" class="form-control" id="quantity" name="quantity" style="color:#333333;" value="<?php echo set_value('quantity'); ?>" readonly/>
            </div>
            <div class="col-md-4">
                <label for="quantityUnit"><?php echo lang("quantityunit"); ?> <span style="color:red;">* </span> </label>
                <input type="text" class="form-control" id="quantityUnit" name="quantityUnit" style="color:#333333;" value="<?php echo set_value('quantityUnit'); ?>" readonly/>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <label for="ep"><?php echo lang("flowname"); ?> <span style="color:red;">* </span></label>
                <input type="text" class="form-control" placeholder="Flow name" id="flowname" name="flowname" style="color:#333333;" value="<?php echo set_value('flowname'); ?>" readonly/>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <label for="ep"><strong><?php echo lang("total"); ?> <?php echo lang("ep"); ?> </strong> <span style="color:red;">* </span></label>
                <input type="text" class="form-control" placeholder="EP value" id="ep" name="ep" style="color:#333333;" value="<?php echo set_value('ep'); ?>" readonly/>
            </div>
        </div>
    </div>

    <!--
    <br>
        <button id="manualep-hide-show" type="button" class="close col-md-12" aria-hidden="true" style="float: left;">
            <label>Open form to enter EP manually (not recommended):</label>  
            <i class="fa fa-arrow-down"></i>
        </button>
    <br> -->
    <!-- this allows to enter flows calculate EP values manualy 
    <div id="manualep" style="display: none;">
        <div class="form-group">
            <label for="selectize"><?php echo lang("flowname"); ?> <span style="color:red;">* <?php echo lang("notchangable"); ?></span></label>
            <select id="selectize" onchange="getFlowId('<?php echo $user['id']; ?>')" class="info select-block" name="flowname">
                <option value=""><?php echo lang("pleaseselect"); ?></option>
                <?php foreach ($flownames as $flowname): ?>
                    <option value="<?php echo $flowname['id']; ?>" <?php echo set_select('flowname', $flowname['id']); ?>><?php echo $flowname['name']; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="flowtype"><?php echo lang("flowtype"); ?> <span style="color:red;">* <?php echo lang("notchangable"); ?></span></label>
            <select id="flowtype" class="info select-block" name="flowtype">
                <?php foreach ($flowtypes as $flowtype): ?>
                    <option value="<?php echo $flowtype['id']; ?>" <?php echo set_select('flowtype', $flowtype['id']); ?>><?php echo $flowtype['name']; ?></option>
                <?php endforeach ?>
            </select>
        </div> -->
        <div class="form-group" id="flow-family" style="display:none;">
            <label for="flowfamily"><?php echo lang("flowfamily"); ?> <span style="color:red;">* <?php echo lang("notchangable"); ?></span></label>
            <select id="flowfamily" class="info select-block" name="flowfamily">
                <option value="">Nothing Selected</option>
                <?php foreach ($flowfamilys as $flowfamily): ?>
                    <option value="<?php echo $flowfamily['id']; ?>" <?php echo set_select('flowfamily', $flowfamily['id']); ?>><?php echo $flowfamily['name']; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <!--
        <div class="form-group">
            <div class="row">
                <div class="col-md-8">
                    <label for="quantity"><?php echo lang("quantity"); ?> (<?php echo lang("annual"); ?>) <span
                                style="color:red;">*</span></label>
                    <input class="form-control" onchange="getFlowId('<?php echo $user['id']; ?>')" id="quantity" name="quantity" placeholder="e.g. 12'123'000.00"
                           value="<?php echo set_value('quantity'); ?>">
                </div>
                <div class="col-md-4">
                    <label for="quantityUnit"><?php echo lang("quantity"); ?> <?php echo lang("unit"); ?> <span
                                style="color:red;">*</span></label>
                    <select id="selectize-units" class="info select-block" name="quantityUnit"> 
                        <option value="" disabled selected><?php echo lang("pleaseselect"); ?></option>
                        <?php foreach ($units as $unit): ?>
                            <option value="<?php echo $unit['id']; ?>" <?php echo set_select('quantityUnit', $unit['id']); ?>><?php echo $unit['name']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-8">
                    <label for="ep">EP (<?php echo lang("annual"); ?>)</label>
                    <input class="form-control" id="ep" name="ep" placeholder="e.g. 12'123'000.00"
                           value="<?php echo set_value('ep'); ?>">
                </div>
                <div class="col-md-4">
                    <label for="epUnit"><?php echo lang("epunit"); ?></label>
                    <input type="text" class="form-control" id="epUnit" value="EP" name="epUnit" readonly>
                </div>
            </div>
        </div>
    </div>   -->
    <!--hidden placeholder input (set to "true") for deactivated "availability" selection -->
    <div class="form-group">
        <input class="form-control" id="availability" name="availability" type="hidden"
               value="<?php echo set_value('availability', 'true'); ?>">
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-8">
                <label for="cost"><?php echo lang("cost"); ?>/a <span style="color:red;">*</span></label>
                <input class="form-control" id="cost" name="cost" placeholder="e.g. 12'123'000.00" value="<?php echo set_value('cost'); ?>" >
            </div>
            <div class="col-md-4">
                <label for="cost"><?php echo lang("costunit"); ?> <span style="color:red;">*</span></label>
                <select id="costUnit" class="info select-block" name="costUnit">
                    <option value="CHF" <?php echo set_select('costUnit', 'CHF'); ?>>CHF</option>
                    <option value="Euro" <?php echo set_select('costUnit', 'Euro'); ?>>Euro</option>
                    <option value="Dollar" <?php echo set_select('costUnit', 'Dollar'); ?>>Dollar</option>
                    <option value="TL" <?php echo set_select('costUnit', 'TL'); ?>>TL</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="flowtype"><?php echo lang("flowtype"); ?> 
            <span style="color:red;">* <small><?php echo lang("notchangable"); ?></small></span></label>
        <select id="flowtype" class="info select-block" name="flowtype">
            <?php foreach ($flowtypes as $flowtype): ?>
                <option value="<?php echo $flowtype['id']; ?>" <?php echo set_select('flowtype', $flowtype['id']); ?>><?php echo $flowtype['name']; ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="form-group">
        <label for="state"><?php echo lang("state"); ?></label>
        <select id="state" class="info select-block" name="state">
            <option value="1" <?php echo set_select('state', '1'); ?>>Solid</option>
            <option value="2" <?php echo set_select('state', '2'); ?>>Liquid</option>
            <option value="3" <?php echo set_select('state', '3'); ?>>Gas</option>
            <option value="4" <?php echo set_select('state', '4'); ?>>n/a</option>
        </select>
    </div>

    <div class="form-group">
        <input class="form-control" id="quality" name="quality" type="hidden" placeholder="<?php echo lang("quality"); ?>"
               value="<?php echo set_value('quality', 'true'); ?>">
    </div>

    <div class="form-group">
        <input class="form-control" id="spot" name="spot" value="<?php echo set_value('spot', 'true'); ?>"
               type="hidden" placeholder="<?php echo lang("substitute_potential"); ?>">
    </div>

    <div class="form-group">
        <label for="desc"><?php echo lang("description"); ?></label>
            <textarea class="form-control" rows="5" id="desc" name="desc" placeholder="<?php echo lang("description"); ?>"></textarea>
    </div>

    <button type="submit" class="btn btn-info"><?php echo lang("addflow"); ?></button>
    </form>
    <span class="label label-default"><span style="color:red;">*</span> <?php echo lang("labelarereq"); ?></span>

    <div class="modal fade" id="myModalEPcalc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog-nace">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo lang("selectflowsforep"); ?></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="flowname"><?php echo lang("flowname"); ?></label>
                                <input type="text" class="form-control" id="flowname" name="flowname" style="color:#333333;" readonly/>
                            </div>
                            <div class="col-md-3">
                                <label for="quantity"><?php echo lang("quantity"); ?>/a <span style="color:red;">* </span></label>
                                <input type="text" class="form-control" id="quantity" name="quantity" style="color:#333333;" />
                            </div>
                            <div class="col-md-3">
                                <label for="UBPval"><?php echo lang("UBPperunit"); ?></label>
                                <input type="text" class="form-control" id="UBPval" name="UBPval" style="color:#333333;" readonly/>
                            </div>
                            <div class="col-md-3">
                                <label for="ep"><?php echo lang("total"); ?> <?php echo lang("ep"); ?>/a</label>
                                <input type="text" class="form-control" id="eptotal" name="eptotal" style="color:#333333;" readonly/>
                            </div>
                        </div>
                    </div>
                    <!-- Miller column UBP calculator -->
                    <div id="miller_col"></div>
                    <br>
                    <button type="button" data-dismiss="modal" class="btn btn-info btn-block" aria-hidden="true"><?php echo lang("done"); ?></button>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
</div>
<?php if (validation_errors() == NULL): ?>

<div class="col-md-12" id="buyukbas">

    <!-- error message if flow arleady exist, passed with flash data -->
    <?php if (!$this->session->flashdata('message') == NULL): ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p></p>
                <p><?php echo $this->session->flashdata('message');?></p>
            <p></p>
        </div>
    <?php endif ?>    

    <?php else: ?>
    <div class="col-md-8" id="buyukbas">
        <?php endif ?>
        <p class="lead pull-left"><?php echo lang("companyflows"); ?>
            <i class="fa fa-info-circle" title="Flows describe the total flow of Materials, Water and Energy
            of a company in order to generate products."></i>
        </p>
        <?php if (validation_errors() == NULL): ?>
            <button id="ac" class="btn btn-warning" style="margin-left: 20px;"> <?php echo lang("addflow"); ?></button>
        <?php endif ?>

        <table class="table table-bordered" style="font-size:12px;">
            <tr>
                <th><?php echo lang("flowname"); ?></th>
                <th><?php echo lang("flowtype"); ?></th>
                
                <th colspan="2"><?php echo lang("quantity"); ?></th>
                <th><?php
                    if (empty($company_flows)) {
                        echo lang("cost");
                    } else {
                        echo lang("cost") . " " . $company_flows[0]['cost_unit'];
                    }?>
                </th>
                <th><?php echo lang("ep") . " UBP"; ?>
                    <button id="prefix" class="btn btn-default btn-sm"> pts</button>
                </th>
                <th><?php echo lang("state"); ?></th>
                <th><?php echo lang("description"); ?></th>
                <th style="width:100px;"><?php echo lang("manage"); ?></th>
            </tr>
            <?php foreach ($company_flows as $key => $flow): ?>
                <tr>
                    <?php if ($key < count($company_flows)-1 and  $company_flows[$key + 1]['flowname'] == $company_flows[$key]['flowname']): ?>
                        <td rowspan="2"><?php echo $flow['flowname']; ?></td>

                    <?php elseif ($key != 0 and $company_flows[$key - 1]['flowname'] == $company_flows[$key]['flowname']): ?>

                    <?php else: ?>
                        <td><?php echo $flow['flowname']; ?></td>
                    <?php endif ?>

                    <td><?php echo $flow['flowtype']; ?></td>
                    <td class="table-numbers"><?php echo number_format($flow['qntty'], 2, ".", "'"); ?></td>
                    <td class="table-units"><?php echo $flow['qntty_unit_name']; ?></td>
                    <td align="right"><?php echo number_format($flow['cost'], 0, "", "'"); ?></td>
                    <td align="right"><?php echo number_format($flow['ep'], 0, "", "'"); ?></td>
                    <td><?php if ($flow['state_id'] == "1") {
                            echo "Solid";
                        } else if ($flow['state_id'] == "2") {
                            echo "Liquid";
                        } else if ($flow['state_id'] == "3") {
                            echo "Gas";
                        } else {
                            echo "n/a";
                        } ?></td>
                    <td><?php echo $flow['description']; ?></td>
                    <td>
                        <a href="<?php echo base_url('edit_flow/' . $companyID . '/' . $flow['flow_id'] . '/' . $flow['flow_type_id']); ?>"
                           class="label label-warning"><span
                                    class="fa fa-edit"></span> <?php echo lang("edit"); ?></button>
                            <a href="<?php echo base_url('delete_flow/' . $companyID . '/' . $flow['id']); ?>"
                               class="label label-danger"
                               onclick="return confirm('Are you sure you want to delete this flow?');"><span
                                        class="fa fa-times"></span> <?php echo lang("delete"); ?></button>
                    </td>

                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <script type="text/javascript">

        $("#ac").click(function () {
            //collapses the table to 2/3 
            $("#buyukbas").attr("class", "col-md-8");
            //shows the left "add flow" side panel
            $("#gizle").show("slow");
            //hides the add flow button
            $("#ac").hide("slow");
        });
        $("#ac-hide").click(function () {
            //hides left "add flow" side panel
            $(".borderli").hide( "slow", function() {
                //expands the table to full size after the side panel is gone
                $("#buyukbas").attr("class", "col-md-12");
            });
            //shows the add flow button
            $("#ac").show("slow");
        });

        $("#manualep-hide-show").click(function () {
            if ($("#manualep").is(":hidden")) {
                //alert("hidden");
                $("#manualep").slideDown();
                $("#manualep-hide-show > i").attr("class", "fa fa-arrow-down");
            }
            else {
                $("#manualep").slideUp();
                $("#manualep-hide-show > i").attr("class", "fa fa-arrow-up");
            }


        });

        //a button which allows to display UBP's in kilo pts, Mega pts and Giga pts.
        index = 0;
        var arr_values = [];
        $("#prefix").click(function () {
            if (index > 3) {
                index = 0;
            };

            //creates arr_values with the the column values
            var table_trs = $(".table").find('tr');
            if (index == 0) {
                table_trs.each(function (i) {
                    $tds = $(this).find('td');
                    //position of the UBP column (special case if rowspan=2 is used for input and output flow)
                    var column = 6;
                    if ($tds.length == 17) {
                        column = 5;
                    }
                    value = $tds.eq(column).text();
                    arr_values.push(value);
                });
            };

            //calculates and formats the kilo, Mega and Giga values
            table_trs.each(function (i) {
                $tds = $(this).find('td');
                var column = 6;
                if ($tds.length == 17) {
                    column = 5;
                }
                switch (index) {
                    case 0:
                        var number_calc = arr_values[i].replace(/'/g, "") / 1000;
                        $tds.eq(column).html(number_calc.toLocaleString("de-CH", {
                                maximumFractionDigits: 1,
                                minimumFractionDigits: 1
                            })
                            + "k");
                        $("#prefix").html("kilo pts");
                        break;
                    case 1:
                        var number_calc = arr_values[i].replace(/'/g, "") / 1000000;
                        $tds.eq(column).html(number_calc.toLocaleString("de-CH", {
                                maximumFractionDigits: 1,
                                minimumFractionDigits: 1
                            })
                            + "M");
                        $("#prefix").html("Mega pts");
                        break;
                    case 2:
                        var number_calc = arr_values[i].replace(/'/g, "") / 1000000000;
                        $tds.eq(column).html(number_calc.toLocaleString("de-CH", {
                                maximumFractionDigits: 1,
                                minimumFractionDigits: 1
                            })
                            + "G");
                        $("#prefix").html("Giga pts");
                        break;
                    case 3:
                        $tds.eq(column).html(arr_values[i]);
                        $("#prefix").html("pts");
                        break;
                    default:
                    //alert("default");
                };
            });
            index++;
        });
    </script>

    <script type="text/javascript">
        $('#selectize-units').selectize({
            create: false
        });
    </script>

    <script type="text/javascript">

        //calculates the total ep value in the Env impact calculator
        $('#myModalEPcalc input#quantity').on('input', function() {
            amount = $('#myModalEPcalc input#quantity').val();
            UBPval = $('#myModalEPcalc input#UBPval').val();
            total = amount * UBPval / 1000000;

            //checks if flowfamily needs to be set
            getFlowId('<?php echo $user['id']; ?>');

            //enters total into the modal
            $('#myModalEPcalc input#eptotal').val(total.toFixed(2));

            //enters total into the left side panel
            $('input#ep').val(total.toFixed(2));
            $('#quantity').val(amount);
        });

        function getSelectedText(elementId) {
            var elt = document.getElementById(elementId);

            if (elt.selectedIndex == -1)
                return null;

            return elt.options[elt.selectedIndex].text;
        }

        function getEPValues( flowname, userid )
        {
            jQuery.ajax({
                url: '<?php echo base_url('my_ep_values');?>/'+flowname+'/'+userid,
                type: 'get',
                dataType: "json",
                success:function(data)
                {   
                    //checks if data is empty/blank
                    if($.trim(data)){
                        console.log(data[0]);
                        //console.log(data[0]['ep_value']);
                        var value = document.getElementById("quantity").value;
                        var value1 = getSelectedText('selectize-units');
                        if (typeof data[0]['ep_value'] != 'undefined'){

                            var $select = $("#selectize-units").selectize();
                            var selectize = $select[0].selectize;
                            selectize.setValue(selectize.search(data[0]['qntty_unit_name']).items[0].id);

                            //$('#selectize-units')[0].selectize.disable();
                        }
                        if (typeof data[0]['ep_value'] != 'undefined' && value != "" && value1 != ""){
                            $('#ep').val(data[0]['ep_value']*value);
                            //$('#epUnit').val("EP/"+value1);
                            alert("EP value for this flow automatically set from excel imported user data.")
                        }
                    }
                } 
            });
        }        

        $('#gizle > form').submit(function() {
            if($('#flowfamily').val() == "" && $('#flow-family').is(':visible')){
                alert("Please select a flow family");
                return false;
            } 
        });

        //js function for miller-coloumn NACE-code selector
        miller_column_UBP();
    </script>