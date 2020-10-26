<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script>
    $( function() {
        $( document ).tooltip();
    } );
</script>

<div style="padding:20px;padding-top:0px;">
    <div class="row">
        <div class="col-md-12" style="margin-bottom:30px; background-color:#f0f0f0; padding:20px;">
            <div style="font-weight:800; font-size:20px; margin-right:20px;" class="pull-left">Upload/Update Excel
                <i class="fa fa-info-circle" title="You can upload your own UBP-Data:
                First download the Template, then fill in your data and click on upload excel."></i>
            </div>
            <div class="pull-left">
                <a class="btn btn-info" href="<?php echo site_url('uploadExcel') ?>" style="margin-right:10px;">Upload Excel</a>
                <a class="btn btn-warning" href="<?php echo asset_url('excels/default.xlsx'); ?>">Download Excel Template</a>
            </div>
        </div>
        <div class="col-md-12">
            <?php if (validation_errors() != null): ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <div class="popover-content">
                        <?php echo validation_errors(); ?>
                    </div>
                </div>
            <?php endif?>
        </div>
        <div class="col-md-6">
            <div>
                <div style="font-weight:800; font-size:20px;">Manual UBP value import</div>
                <table class="table table-sm">
                    <th>Name</th>
                    <th>EP Value (UBP/x) <i class="fa fa-info-circle" title="Megapoints UBP oder"></i></th>
                    <th>Unit (x)</th>
                    <th>save</th>
                    <?php echo form_open_multipart('datasetexcel'); ?>
                        <tr>
                            <td>
                            <div class="">
                                <input class="form-control" id="flowname" name="flowname">
                                </div>
                            </td>
                            <td>
                                <div class="">
                                    <input class="form-control" id="epvalue" name="epvalue" style="text-align: right;">
                                </div>
                            </td>
                            <td style="width:60px; vertical-align:middle; text-align: center;">
                                <div class="">
                                    <select style="width:60px;" id="selectize-units" class="info select-block" name="epQuantityUnit">
                                        <option value="">Select</option>

                                        <?php foreach ($units as $unit): ?>
                                            <option value="<?php echo $unit['id']; ?>" <?php echo set_select('epQuantityUnit', $unit['id']); ?>><?php echo $unit['name']; ?></option>
                                        <?php endforeach?>
                                    </select>


                                </div>
                            </td>
                            <td style="width:70px; vertical-align:center; text-align: center;">
                                <button type="submit" class="btn btn-info">Add</button>
                            </td>
                        </tr>
                    </form>
                </table>   
            </div>
            <div style="font-weight:800; font-size:20px;">Excel UBP import</div>
                <table class="table table-sm">
                    <th>Name</th>
                    <th>EP Value (UBP/x)</th>
                    <th>Unit (x)</th>
                    <th>Add <i class="fa fa-info-circle" title="Click here to save the UBP-Data you want (This will make them appear on the right side)"></i></th>
                    <?php foreach ($excelcontents as $ec): ?>
                        <?php echo form_open_multipart('datasetexcel'); ?>
                            <tr>
                            <td>
                                <div class="">
                                    <input class="form-control" id="flowname" name="flowname" title="<?php echo $ec[0]; ?>"
                                    value="<?php echo $ec[0]; ?>" disabled>
                                    <input class="form-control" id="flowname" name="flowname" title="<?php echo $ec[0]; ?>"
                                    value="<?php echo $ec[0]; ?>" type="hidden">
                                    </div>
                                </td>
                                <td>
                                    <div class="">
                                        <input class="form-control" style="text-align: right;" id="epvalue" name="epvalue" value="<?php echo number_format($ec[1], 2, ".", "'"); ?>" disabled>
                                        <input class="form-control" style="text-align: right;" id="epvalue" name="epvalue" value="<?php echo number_format($ec[1], 2, ".", "'"); ?>" type="hidden">
                                    </div>
                                </td>
                                <td style="width:60px; vertical-align:middle; text-align:center;">
                                    <div class="">
                                        <select style="width:60px;" id="selectize-units" class="info select-block" name="epQuantityUnit" disabled>
                                            <option value="<?php echo $ec[3]; ?>" ><?php echo $ec[2]; ?></option>

                                            <?php foreach ($units as $unit): ?>
                                                <option value="<?php echo $unit['id']; ?>" <?php echo set_select('epQuantityUnit', $unit['id']); ?>><?php echo $unit['name']; ?></option>
                                            <?php endforeach?>
                                        </select>
                                        <select style="width:120px;display:none;" id="selectize-units" class="info select-block" name="epQuantityUnit">
                                            <option value="<?php echo $ec[3]; ?>" ><?php echo $ec[2]; ?></option>
                                        </select>
                                    </div>
                                </td>
                                <td style="width:70px; vertical-align:center; text-align: center;">
                                    <button type="submit" class="btn btn-info">Add</button>
                                </td>
                            </tr>
                        </form>
                    <?php endforeach?>
                </table>
            </div>
        <div class="col-md-6">
            <div style="font-weight:800; font-size:20px;">Your saved/imported UBP values</div>
            <table class="table">
                <th>Name</th>
                <th colspan="2">Value  (UBP/x)</th>
                <th>Remove</th>
                <?php foreach ($userepvalues as $uep): ?>
                    <?php //print_r($ec); ?>
                    <tr>
                        <td>
                            <?php echo $uep['flow_name']; ?>
                        </td>
                        <td class="table-numbers" style="width:120px;">
                            <?php echo number_format($uep['ep_value'], 2, ".", "'"); ?>
                        </td>
                        <td class="table-units" style="width:60px;">
                            UBP/<?php echo $uep['qntty_unit_name']; ?>
                        </td>
                        <td style="width:60px; vertical-align:center; text-align: center;">
                            <a href="<?php echo base_url('deleteuserep/' . $uep['flow_name'] . '/' . $uep['ep_value']); ?>" class="label label-info">Delete</a>
                        </td>
                    </tr>
                <?php endforeach?>
            </table>
        </div>
    </div>
</div>