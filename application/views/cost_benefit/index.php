<script src="http://d3js.org/d3.v3.min.js"></script>
<div class="col-md-12">
	<div class="lead"><?php echo $company['name']; ?></div>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0; width: 100%;}
.tg td{font-family:Arial, sans-serif;font-size:11px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal; color:#999;}
.tg th{font-family:Arial, sans-serif;font-size:11px;font-weight:700;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal; color:#000;}
.tg .tg-yw4l{vertical-align:top;}
.tg .tg-yw4l input{font-size: 11px; height: 28px;}
</style>
<?php //print_r($allocation); ?>
<?php  $allocation = array_merge($allocation, $is);  //print_r($allocation); ?>
	<p><?php echo lang("cbaheading"); ?></p>
	<?php if (!empty($allocation)): ?>
	<?php $i=1; ?>
	<?php foreach ($allocation as $a): ?>
		<?php if(!empty($a['cp_id'])){$iid=$a['cp_id']; $tip="cp";}else{$iid=$a['is_id'];$tip="is";} ?>
			<?php $attributes = array('id' => 'form-'.$i); ?>
		<?php echo form_open('cba/save/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$iid.'/'.$tip, $attributes); ?>
    <table class="tg costtable">
        <tr>
            <th class="tg-yw4l"><div style="width: 100px;">Option</div></th>
            <th class="tg-yw4l">Yearly CAPEX / rest value (<?php echo $a['unit_cost']; ?>/yr)</th>
            <th class="tg-yw4l" colspan="2">Annual energy and material flows</th>
            <th class="tg-yw4l">unit</th>
            <th class="tg-yw4l">Specific costs (<?php echo $a['unit_cost']; ?>/unit)</th>
            <th class="tg-yw4l">OPEX (<?php echo $a['unit_cost']; ?>)</th>
            <th class="tg-yw4l">EP/ Unit</th>
            <th class="tg-yw4l">EP</th>
            <th class="tg-yw4l">Annual costs (<?php echo $a['unit_cost']; ?>/yr)</th>
            <th class="tg-yw4l">Lifetime (yr)</th>
            <th class="tg-yw4l">Investment (<?php echo $a['unit_cost']; ?>)</th>
            <th class="tg-yw4l">Discount rate (%) not for the existing process</th>
            <th class="tg-yw4l">Yearly CAPEX  (<?php echo $a['unit_cost']; ?>/yr)</th>
            <th class="tg-yw4l" colspan="2">Annual energy and material flows</th>
            <th class="tg-yw4l">unit</th>
            <th class="tg-yw4l">Specific costs (<?php echo $a['unit_cost']; ?>/unit)</th>
            <th class="tg-yw4l">OPEX (<?php echo $a['unit_cost']; ?>)</th>
            <th class="tg-yw4l">EP/ Unit</th>
            <th class="tg-yw4l">EP</th>
            <th class="tg-yw4l">Annual costs (<?php echo $a['unit_cost']; ?>/yr)</th>
            <th class="tg-yw4l">Flow Name</th>
            <th class="tg-yw4l">Differences of energy and material flows</th>
            <th class="tg-yw4l">Unit</th>
            <th class="tg-yw4l">Reduction OPEX (<?php echo $a['unit_cost']; ?>)</th>
            <th class="tg-yw4l">Economic Benefit (<?php echo $a['unit_cost']; ?>)</th>
            <th class="tg-yw4l">Ecological  Benefit (EP)</th>
            <th class="tg-yw4l">Marginal costs (<?php echo $a['unit_cost']; ?>/EP)</th>
            <th class="tg-yw4l">Pay pack time  of Investment (yrs)</th>
            <th class="tg-yw4l">Save</th>
        </tr>
        <tr>
        <td class="tg-yw4l" rowspan="7">							
        <span class="text-info" style="font-weight: 600;">
        	<?php if(empty($a['cmpny_from_name'])) {echo $a['best'];} else {echo $a['flow_name']." input IS potential from ".$a['cmpny_from_name']; } ?>
        </span>
        </td>
        <td class="tg-yw4l" rowspan="7">
        	<div class="  "><input type="text" name="capexold" id="capexold-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['capexold']; ?>" placeholder="You should fill this field."></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-name-1" id="flow-name-1-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-name-1']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-value-1" id="flow-value-1-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-value-1']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-unit-1" id="flow-unit-1-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-unit-1']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-specost-1" id="flow-specost-1-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-specost-1']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-opex-1" id="flow-opex-1-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-opex-1']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eipunit-1" id="flow-eipunit-1-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-eipunit-1']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eip-1" id="flow-eip-1-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-eip-1']; ?>" placeholder="Fill"  ></div>
        </td>
        <td class="tg-yw4l" rowspan="7">
            <div class="  "><input type="text" name="annual-cost-1" id="annual-cost-1-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['annual-cost-1']; ?>" placeholder="Fill" ></div>
        </td>
        <td class="tg-yw4l" rowspan="7">
        	<div class="  "><input type="text" name="ltold" id="ltold-<?php echo $i; ?>" value="<?php echo $a['ltold']; ?>" class="form-control" placeholder="You should fill this field."></div>
        </td>
        <td class="tg-yw4l" rowspan="7">
            <div class="  "><input type="text" name="investment" id="investment-<?php echo $i; ?>" value="<?php echo $a['investment']; ?>" class="form-control" placeholder="You should fill this field."></div>
        </td>
        <td class="tg-yw4l" rowspan="7">
        	<div class="  "><input type="text" name="disrate" id="disrate-<?php echo $i; ?>"  value="<?php echo $a['disrate']; ?>" class="form-control" placeholder="You should fill this field."></div>
        </td>
        <td class="tg-yw4l" rowspan="7">
        	<div class="  "><input type="text" name="capex-1" id="capex-1-<?php echo $i; ?>"  value="<?php echo $a['capex-1']; ?>" class="form-control" placeholder="capex-1" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-name-2" id="flow-name-2-<?php echo $i; ?>"  value="<?php echo $a['flow-name-2']; ?>" class="form-control" placeholder="flow-name-2"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-value-2" id="flow-value-2-<?php echo $i; ?>"  value="<?php echo $a['flow-value-2']; ?>" class="form-control" placeholder="flow-value-2"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-unit-2" id="flow-unit-2-<?php echo $i; ?>"  value="<?php echo $a['flow-unit-2']; ?>" class="form-control" placeholder="flow-unit-2"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-specost-2" id="flow-specost-2-<?php echo $i; ?>"  value="<?php echo $a['flow-specost-2']; ?>" class="form-control" placeholder="flow-specost-2"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-opex-2" id="flow-opex-2-<?php echo $i; ?>"  value="<?php echo $a['flow-opex-2']; ?>" class="form-control" placeholder="flow-opex-2" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eipunit-2" id="flow-eipunit-2-<?php echo $i; ?>"  value="<?php echo $a['flow-eipunit-2']; ?>" class="form-control" placeholder="flow-eipunit-2"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eip-2" id="flow-eip-2-<?php echo $i; ?>"  value="<?php echo $a['flow-eip-2']; ?>" class="form-control" placeholder="flow-eip-2" ></div>
        </td>
        <td class="tg-yw4l" rowspan="7">
            <div class="  "><input type="text" name="annual-cost-2" id="annual-cost-2-<?php echo $i; ?>"  value="<?php echo $a['annual-cost-2']; ?>" class="form-control" placeholder="annual-cost-2" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-name-3" id="flow-name-3-<?php echo $i; ?>"  value="<?php echo $a['flow-name-3']; ?>" class="form-control" placeholder="flow-name-3"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-value-3" id="flow-value-3-<?php echo $i; ?>"  value="<?php echo $a['flow-value-3']; ?>" class="form-control" placeholder="flow-value-3" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-unit-3" id="flow-unit-3-<?php echo $i; ?>"  value="<?php echo $a['flow-unit-3']; ?>" class="form-control" placeholder="flow-unit-3"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-opex-3" id="flow-opex-3-<?php echo $i; ?>"  value="<?php echo $a['flow-opex-3']; ?>" class="form-control" placeholder="flow-opex-3" ></div>
        </td>
        <td class="tg-yw4l" rowspan="7">            
            <div class="  "><input type="text" name="ecoben-1" id="ecoben-1-<?php echo $i; ?>"  value="<?php echo $a['ecoben-1']; ?>" class="form-control" placeholder="ecoben-1" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="ecoben-eip-1" id="ecoben-eip-1-<?php echo $i; ?>"  value="<?php echo $a['ecoben-eip-1']; ?>" class="form-control" placeholder="ecoben-eip-1" ></div>
        </td>
        <td class="tg-yw4l" rowspan="7">
            <div class="  "><input type="text" name="marcos-1" id="marcos-1-<?php echo $i; ?>"  value="<?php echo $a['marcos-1']; ?>" class="form-control" placeholder="marcos-1" ></div>
        </td>
        <td class="tg-yw4l" rowspan="7">
            <div class="  "><input type="text" name="payback-1" id="payback-1-<?php echo $i; ?>"  value="<?php echo $a['payback-1']; ?>" class="form-control" placeholder="payback-1" ></div>
        </td>
        <td class="tg-yw4l" rowspan="7">
            <input type="submit" value="Save" class="btn btn-block btn-info" style="width: 100px;">
        </td>
    </tr>
    <tr>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-name-1-2" id="flow-name-1-2-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-name-1-2']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-value-1-2" id="flow-value-1-2-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-value-1-2']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-unit-1-2" id="flow-unit-1-2-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-unit-1-2']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-specost-1-2" id="flow-specost-1-2-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-specost-1-2']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-opex-1-2" id="flow-opex-1-2-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-opex-1-2']; ?>" placeholder="Fill" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eipunit-1-2" id="flow-eipunit-1-2-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-eipunit-1-2']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eip-1-2" id="flow-eip-1-2-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-eip-1-2']; ?>" placeholder="Fill" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-name-2-2" id="flow-name-2-2-<?php echo $i; ?>"  value="<?php echo $a['flow-name-2-2']; ?>" class="form-control" placeholder="flow-name-2-2"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-value-2-2" id="flow-value-2-2-<?php echo $i; ?>"  value="<?php echo $a['flow-value-2-2']; ?>" class="form-control" placeholder="flow-value-2-2"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-unit-2-2" id="flow-unit-2-2-<?php echo $i; ?>"  value="<?php echo $a['flow-unit-2-2']; ?>" class="form-control" placeholder="flow-unit-2-2"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-specost-2-2" id="flow-specost-2-2-<?php echo $i; ?>"  value="<?php echo $a['flow-specost-2-2']; ?>" class="form-control" placeholder="flow-specost-2-2"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-opex-2-2" id="flow-opex-2-2-<?php echo $i; ?>"  value="<?php echo $a['flow-opex-2-2']; ?>" class="form-control" placeholder="flow-opex-2-2" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eipunit-2-2" id="flow-eipunit-2-2-<?php echo $i; ?>"  value="<?php echo $a['flow-eipunit-2-2']; ?>" class="form-control" placeholder="flow-eipunit-2-2"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eip-2-2" id="flow-eip-2-2-<?php echo $i; ?>"  value="<?php echo $a['flow-eip-2-2']; ?>" class="form-control" placeholder="flow-eip-2-2" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-name-3-2" id="flow-name-3-2-<?php echo $i; ?>"  value="<?php echo $a['flow-name-3-2']; ?>" class="form-control" placeholder="flow-name-3-2"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-value-3-2" id="flow-value-3-2-<?php echo $i; ?>"  value="<?php echo $a['flow-value-3-2']; ?>" class="form-control" placeholder="flow-value-3-2" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-unit-3-2" id="flow-unit-3-2-<?php echo $i; ?>"  value="<?php echo $a['flow-unit-3-2']; ?>" class="form-control" placeholder="flow-unit-3-2"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-opex-3-2" id="flow-opex-3-2-<?php echo $i; ?>"  value="<?php echo $a['flow-opex-3-2']; ?>" class="form-control" placeholder="flow-opex-3-2" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="ecoben-eip-1-2" id="ecoben-eip-1-2-<?php echo $i; ?>"  value="<?php echo $a['ecoben-eip-1-2']; ?>" class="form-control" placeholder="ecoben-eip-1-2" ></div>
        </td>
    </tr>
    <tr>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-name-1-3" id="flow-name-1-3-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-name-1-3']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-value-1-3" id="flow-value-1-3-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-value-1-3']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-unit-1-3" id="flow-unit-1-3-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-unit-1-3']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-specost-1-3" id="flow-specost-1-3-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-specost-1-3']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-opex-1-3" id="flow-opex-1-3-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-opex-1-3']; ?>" placeholder="Fill" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eipunit-1-3" id="flow-eipunit-1-3-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-eipunit-1-3']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eip-1-3" id="flow-eip-1-3-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-eip-1-3']; ?>" placeholder="Fill" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-name-2-3" id="flow-name-2-3-<?php echo $i; ?>"  value="<?php echo $a['flow-name-2-3']; ?>" class="form-control" placeholder="flow-name-2-3"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-value-2-3" id="flow-value-2-3-<?php echo $i; ?>"  value="<?php echo $a['flow-value-2-3']; ?>" class="form-control" placeholder="flow-value-2-3"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-unit-2-3" id="flow-unit-2-3-<?php echo $i; ?>"  value="<?php echo $a['flow-unit-2-3']; ?>" class="form-control" placeholder="flow-unit-2-3"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-specost-2-3" id="flow-specost-2-3-<?php echo $i; ?>"  value="<?php echo $a['flow-specost-2-3']; ?>" class="form-control" placeholder="flow-specost-2-3"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-opex-2-3" id="flow-opex-2-3-<?php echo $i; ?>"  value="<?php echo $a['flow-opex-2-3']; ?>" class="form-control" placeholder="flow-opex-2-3" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eipunit-2-3" id="flow-eipunit-2-3-<?php echo $i; ?>"  value="<?php echo $a['flow-eipunit-2-3']; ?>" class="form-control" placeholder="flow-eipunit-2-3"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eip-2-3" id="flow-eip-2-3-<?php echo $i; ?>"  value="<?php echo $a['flow-eip-2-3']; ?>" class="form-control" placeholder="flow-eip-2-3" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-name-3-3" id="flow-name-3-3-<?php echo $i; ?>"  value="<?php echo $a['flow-name-3-3']; ?>" class="form-control" placeholder="flow-name-3-3"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-value-3-3" id="flow-value-3-3-<?php echo $i; ?>"  value="<?php echo $a['flow-value-3-3']; ?>" class="form-control" placeholder="flow-value-3-3" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-unit-3-3" id="flow-unit-3-3-<?php echo $i; ?>"  value="<?php echo $a['flow-unit-3-3']; ?>" class="form-control" placeholder="flow-unit-3-3"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-opex-3-3" id="flow-opex-3-3-<?php echo $i; ?>"  value="<?php echo $a['flow-opex-3-3']; ?>" class="form-control" placeholder="flow-opex-3-3" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="ecoben-eip-1-3" id="ecoben-eip-1-3-<?php echo $i; ?>"  value="<?php echo $a['ecoben-eip-1-3']; ?>" class="form-control" placeholder="ecoben-eip-1-3" ></div>
        </td>
    </tr>
    <tr>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-name-1-4" id="flow-name-1-4-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-name-1-4']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-value-1-4" id="flow-value-1-4-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-value-1-4']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-unit-1-4" id="flow-unit-1-4-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-unit-1-4']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-specost-1-4" id="flow-specost-1-4-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-specost-1-4']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-opex-1-4" id="flow-opex-1-4-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-opex-1-4']; ?>" placeholder="Fill" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eipunit-1-4" id="flow-eipunit-1-4-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-eipunit-1-4']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eip-1-4" id="flow-eip-1-4-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-eip-1-4']; ?>" placeholder="Fill" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-name-2-4" id="flow-name-2-4-<?php echo $i; ?>"  value="<?php echo $a['flow-name-2-4']; ?>" class="form-control" placeholder="flow-name-2-4"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-value-2-4" id="flow-value-2-4-<?php echo $i; ?>"  value="<?php echo $a['flow-value-2-4']; ?>" class="form-control" placeholder="flow-value-2-4"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-unit-2-4" id="flow-unit-2-4-<?php echo $i; ?>"  value="<?php echo $a['flow-unit-2-4']; ?>" class="form-control" placeholder="flow-unit-2-4"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-specost-2-4" id="flow-specost-2-4-<?php echo $i; ?>"  value="<?php echo $a['flow-specost-2-4']; ?>" class="form-control" placeholder="flow-specost-2-4"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-opex-2-4" id="flow-opex-2-4-<?php echo $i; ?>"  value="<?php echo $a['flow-opex-2-4']; ?>" class="form-control" placeholder="flow-opex-2-4" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eipunit-2-4" id="flow-eipunit-2-4-<?php echo $i; ?>"  value="<?php echo $a['flow-eipunit-2-4']; ?>" class="form-control" placeholder="flow-eipunit-2-4"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eip-2-4" id="flow-eip-2-4-<?php echo $i; ?>"  value="<?php echo $a['flow-eip-2-4']; ?>" class="form-control" placeholder="flow-eip-2-4" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-name-3-4" id="flow-name-3-4-<?php echo $i; ?>"  value="<?php echo $a['flow-name-3-4']; ?>" class="form-control" placeholder="flow-name-3-4"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-value-3-4" id="flow-value-3-4-<?php echo $i; ?>"  value="<?php echo $a['flow-value-3-4']; ?>" class="form-control" placeholder="flow-value-3-4" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-unit-3-4" id="flow-unit-3-4-<?php echo $i; ?>"  value="<?php echo $a['flow-unit-3-4']; ?>" class="form-control" placeholder="flow-unit-3-4"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-opex-3-4" id="flow-opex-3-4-<?php echo $i; ?>"  value="<?php echo $a['flow-opex-3-4']; ?>" class="form-control" placeholder="flow-opex-3-4" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="ecoben-eip-1-4" id="ecoben-eip-1-4-<?php echo $i; ?>"  value="<?php echo $a['ecoben-eip-1-4']; ?>" class="form-control" placeholder="ecoben-eip-1-4" ></div>
        </td>
    </tr>
    <tr>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-name-1-5" id="flow-name-1-5-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-name-1-5']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-value-1-5" id="flow-value-1-5-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-value-1-5']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-unit-1-5" id="flow-unit-1-5-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-unit-1-5']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-specost-1-5" id="flow-specost-1-5-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-specost-1-5']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-opex-1-5" id="flow-opex-1-5-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-opex-1-5']; ?>" placeholder="Fill" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eipunit-1-5" id="flow-eipunit-1-5-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-eipunit-1-5']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eip-1-5" id="flow-eip-1-5-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-eip-1-5']; ?>" placeholder="Fill" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-name-2-5" id="flow-name-2-5-<?php echo $i; ?>"  value="<?php echo $a['flow-name-2-5']; ?>" class="form-control" placeholder="flow-name-2-5"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-value-2-5" id="flow-value-2-5-<?php echo $i; ?>"  value="<?php echo $a['flow-value-2-5']; ?>" class="form-control" placeholder="flow-value-2-5"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-unit-2-5" id="flow-unit-2-5-<?php echo $i; ?>"  value="<?php echo $a['flow-unit-2-5']; ?>" class="form-control" placeholder="flow-unit-2-5"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-specost-2-5" id="flow-specost-2-5-<?php echo $i; ?>"  value="<?php echo $a['flow-specost-2-5']; ?>" class="form-control" placeholder="flow-specost-2-5"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-opex-2-5" id="flow-opex-2-5-<?php echo $i; ?>"  value="<?php echo $a['flow-opex-2-5']; ?>" class="form-control" placeholder="flow-opex-2-5" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eipunit-2-5" id="flow-eipunit-2-5-<?php echo $i; ?>"  value="<?php echo $a['flow-eipunit-2-5']; ?>" class="form-control" placeholder="flow-eipunit-2-5"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eip-2-5" id="flow-eip-2-5-<?php echo $i; ?>"  value="<?php echo $a['flow-eip-2-5']; ?>" class="form-control" placeholder="flow-eip-2-5" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-name-3-5" id="flow-name-3-5-<?php echo $i; ?>"  value="<?php echo $a['flow-name-3-5']; ?>" class="form-control" placeholder="flow-name-3-5"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-value-3-5" id="flow-value-3-5-<?php echo $i; ?>"  value="<?php echo $a['flow-value-3-5']; ?>" class="form-control" placeholder="flow-value-3-5" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-unit-3-5" id="flow-unit-3-5-<?php echo $i; ?>"  value="<?php echo $a['flow-unit-3-5']; ?>" class="form-control" placeholder="flow-unit-3-5"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-opex-3-5" id="flow-opex-3-5-<?php echo $i; ?>"  value="<?php echo $a['flow-opex-3-5']; ?>" class="form-control" placeholder="flow-opex-3-5" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="ecoben-eip-1-5" id="ecoben-eip-1-5-<?php echo $i; ?>"  value="<?php echo $a['ecoben-eip-1-5']; ?>" class="form-control" placeholder="ecoben-eip-1-5" ></div>
        </td>
    </tr>
    <tr>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-name-1-6" id="flow-name-1-6-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-name-1-6']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-value-1-6" id="flow-value-1-6-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-value-1-6']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-unit-1-6" id="flow-unit-1-6-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-unit-1-6']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-specost-1-6" id="flow-specost-1-6-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-specost-1-6']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-opex-1-6" id="flow-opex-1-6-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-opex-1-6']; ?>" placeholder="Fill" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eipunit-1-6" id="flow-eipunit-1-6-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-eipunit-1-6']; ?>" placeholder="Fill"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eip-1-6" id="flow-eip-1-6-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['flow-eip-1-6']; ?>" placeholder="Fill" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-name-2-6" id="flow-name-2-6-<?php echo $i; ?>"  value="<?php echo $a['flow-name-2-6']; ?>" class="form-control" placeholder="flow-name-2-6"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-value-2-6" id="flow-value-2-6-<?php echo $i; ?>"  value="<?php echo $a['flow-value-2-6']; ?>" class="form-control" placeholder="flow-value-2-6"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-unit-2-6" id="flow-unit-2-6-<?php echo $i; ?>"  value="<?php echo $a['flow-unit-2-6']; ?>" class="form-control" placeholder="flow-unit-2-6"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-specost-2-6" id="flow-specost-2-6-<?php echo $i; ?>"  value="<?php echo $a['flow-specost-2-6']; ?>" class="form-control" placeholder="flow-specost-2-6"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-opex-2-6" id="flow-opex-2-6-<?php echo $i; ?>"  value="<?php echo $a['flow-opex-2-6']; ?>" class="form-control" placeholder="flow-opex-2-6" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eipunit-2-6" id="flow-eipunit-2-6-<?php echo $i; ?>"  value="<?php echo $a['flow-eipunit-2-6']; ?>" class="form-control" placeholder="flow-eipunit-2-6"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-eip-2-6" id="flow-eip-2-6-<?php echo $i; ?>"  value="<?php echo $a['flow-eip-2-6']; ?>" class="form-control" placeholder="flow-eip-2-6" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-name-3-6" id="flow-name-3-6-<?php echo $i; ?>"  value="<?php echo $a['flow-name-3-6']; ?>" class="form-control" placeholder="flow-name-3-6"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-value-3-6" id="flow-value-3-6-<?php echo $i; ?>"  value="<?php echo $a['flow-value-3-6']; ?>" class="form-control" placeholder="flow-value-3-6" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-unit-3-6" id="flow-unit-3-6-<?php echo $i; ?>"  value="<?php echo $a['flow-unit-3-6']; ?>" class="form-control" placeholder="flow-unit-3-6"></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="flow-opex-3-6" id="flow-opex-3-6-<?php echo $i; ?>"  value="<?php echo $a['flow-opex-3-6']; ?>" class="form-control" placeholder="flow-opex-3-6" ></div>
        </td>
        <td class="tg-yw4l">
            <div class="  "><input type="text" name="ecoben-eip-1-6" id="ecoben-eip-1-6-<?php echo $i; ?>"  value="<?php echo $a['ecoben-eip-1-6']; ?>" class="form-control" placeholder="ecoben-eip-1-6" ></div>
        </td>
    </tr>
    <tr>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l" style="font-weight:bold; color:black;">Maintenance</td>
        <td class="tg-yw4l"><div class="  "><input type="text" name="maintan-1" id="maintan-1-<?php echo $i; ?>"  value="<?php echo set_value('maintan-1', '0'); ?>" class="form-control" placeholder="maintan-1"></div></td>
        <td class="tg-yw4l" style="font-weight:bold; color:black;">SUM</td>
        <td class="tg-yw4l"><div class="  "><input type="text" name="sum-1" id="sum-1-<?php echo $i; ?>"  value="<?php echo $a['sum-1']; ?>" class="form-control" placeholder="sum-1" ></div></td>
        <td class="tg-yw4l" style="font-weight:bold; color:black;">SUM</td>
        <td class="tg-yw4l"><div class="  "><input type="text" name="sum-2" id="sum-2-<?php echo $i; ?>"  value="<?php echo $a['sum-2']; ?>" class="form-control" placeholder="sum-2" ></div></td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l" style="font-weight:bold; color:black;">Maintenance</td>
        <td class="tg-yw4l"><div class="  "><input type="text" name="maintan-1-2" id="maintan-1-2-<?php echo $i; ?>"  value="<?php echo set_value('maintan-1-2', '0'); ?>" class="form-control" placeholder="maintan-1-2"></div></td>
        <td class="tg-yw4l" style="font-weight:bold; color:black;">SUM</td>
        <td class="tg-yw4l"><div class=""><input type="text" name="sum-1-1" id="sum-1-1-<?php echo $i; ?>"  value="<?php echo $a['sum-1-1']; ?>" class="form-control" placeholder="sum-1-1" ></div></td>
        <td class="tg-yw4l" style="font-weight:bold; color:black;">SUM</td>
        <td class="tg-yw4l"><div class=""><input type="text" name="sum-2-1" id="sum-2-1-<?php echo $i; ?>"  value="<?php echo $a['sum-2-1']; ?>" class="form-control" placeholder="sum-2-1" ></div></td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l" style="font-weight:bold; color:black;">SUM</td>
        <td class="tg-yw4l"><div class=""><input type="text" name="sum-3-1" id="sum-3-1-<?php echo $i; ?>"  value="<?php echo $a['sum-3-1']; ?>" class="form-control" placeholder="sum-3-1" ></div></td>
        <td class="tg-yw4l"><div class=""><input type="text" name="sum-3-2" id="sum-3-2-<?php echo $i; ?>"  value="<?php echo $a['sum-3-2']; ?>" class="form-control" placeholder="sum-3-2" ></div></td>
    </tr>
</table>

    <?php $i++; ?>
	</form>
	<script type="text/javascript">	$( document ).ready(calculate);</script>
    <?php endforeach ?>
<?php endif ?>
<hr>
</div>



<div class="col-md-6">
<?php  $allocation = array_merge($allocation, $is);  //print_r($allocation); ?>
	<?php // echo lang("cbaheading"); ?>
    <p><?php echo lang("cbaheading2"); ?></p>
    <?php //print_r($allocation); ?>
        <?php if (!empty($allocation)): ?>
            <?php //print_r($allocation); ?>
            <table class="table" style="font-size:12px;">
                <tr>
                    <th><?php echo lang("optionandprocess"); ?></th><th><?php echo lang("marginalcost"); ?></th><th><?php echo lang("ecologicalbenefit"); ?></th>
                </tr>
            <?php foreach ($allocation as $a): ?>
                <tr>
                    <td>
                    <?php 
                    if(empty($a['cmpny_from_name'])) {
                        echo "<div style='font-size:13px;'>".$a['best']."</div>";
                        echo "<small style='font-size:11px; color:#999; '>".$a['prcss_name']." - ".$a['flow_name']." - ".$a['flow_type_name']."</small>";

                    }
                    else {
                        echo $a['flow_name']." input IS potential from ".$a['cmpny_from_name']; 
                    } ?>
                    </td>
                    <td><?php echo number_format((float)$a['marcos-1'], 2, '.', ''); ?></td>
                    <td><?php echo number_format((float)$a['sum-3-2'], 4, '.', ''); ?></td></tr>
            <?php endforeach ?>
            </table>
        <?php endif ?>
	<?php if (!empty($allocation)): ?>
        <?php //print_r($allocation); ?>
			<?php $i=1; ?>
			<?php foreach ($allocation as $a): ?>
				<?php if(!empty($a['cp_id'])){$iid=$a['cp_id']; $tip="cp";}else{$iid=$a['is_id'];$tip="is";} ?>
 				<?php $attributes = array('id' => 'form-'.$i); ?>
				<?php // echo form_open('cba/save/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$iid.'/'.$tip, $attributes); ?>
				<!-- <table class="costtable">
					<tr>
						<td>#</td><td><?php echo $i; ?></td>
					</tr>
					<tr>
						<td width="250"><?php echo lang("option"); ?></td>
						<td width="75%">
						<?php //print_r($a); ?>
							<b><?php if(!empty($a['prcss_name'])) {echo $a['prcss_name'];} else {echo "IS potential"; } ?></b> 
							<small class="text-muted"><?php echo $a['flow_name']; ?><?php if(!empty($a['prcss_name'])) {echo "-".$a['flow_type_name']; } ?></small><br>
							<span class="text-info">
								<?php if(empty($a['cmpny_from_name'])) {echo $a['best'];} else {echo $a['flow_name']." input IS potential from ".$a['cmpny_from_name']; } ?>
							</span>
						</td>
					</tr>
					<tr>
						<td><?php echo lang("discountrate"); ?> (%)</td>
						<td><div class="  "><input type="text" name="disrate" id="disrate-<?php echo $i; ?>"  value="<?php echo $a['disrate']; ?>" class="form-control" placeholder="You should fill this field."></div></td>
					</tr>
						<tr><td><?php echo lang("capexold"); ?> (<?php echo $a['unit_cost']; ?>/<?php echo lang("year"); ?>)</td>								
						<td><div class="  "><input type="text" name="capexold" id="capexold-<?php echo $i; ?>" class="form-control  " value="<?php echo $a['capexold']; ?>" placeholder="You should fill this field."></div></td>
					</tr>
					<tr>
						<td><?php echo lang("opexold"); ?> (<?php echo $a['unit_cost']; ?>/<?php echo lang("year"); ?>)</td>
						<td><input type="text" name="opexold" id="opexold-<?php echo $i; ?>" class="form-control"></td>
					</tr>
					<tr>
						<td><?php echo lang("lifetimeold"); ?> (<?php echo lang("year"); ?>)</td>
						<td><div class="  "><input type="text" name="ltold" id="ltold-<?php echo $i; ?>" value="<?php echo $a['ltold']; ?>" class="form-control" placeholder="You should fill this field."></div></td>
					</tr>
					<tr>
						<td><?php echo lang("capexnew"); ?> (<?php echo $a['unit_cost']; ?>/<?php echo lang("year"); ?>)</td>
						<td><div class="  "><input type="text" name="capexnew" id="capexnew-<?php echo $i; ?>" value="<?php echo $a['capexnew']; ?>" class="form-control" placeholder="You should fill this field."></div></td>
					</tr>
					<tr>
						<td><?php echo lang("opexnew"); ?> (<?php echo $a['unit_cost']; ?>/<?php echo lang("year"); ?>)</td>
						<td><input type="text" name="opexnew" id="opexnew-<?php echo $i; ?>" class="form-control"></td>
					</tr>
					<tr>
						<td><?php echo lang("lifetimenew"); ?> (<?php echo lang("year"); ?>)</td>
						<td><div class="  "><input type="text" name="ltnew" id="ltnew-<?php echo $i; ?>" value="<?php echo $a['ltnew']; ?>" class="form-control" placeholder="You should fill this field."></div></td>
					</tr>
					<tr>
						<td><?php echo lang("anncostold"); ?></td>
						<td><input type="text" name="acold" id="acold-<?php echo $i; ?>" class="form-control"></td>
					</tr>
					<tr>
						<td><?php echo lang("anncostnew"); ?></td>
						<td><input type="text" name="acnew" id="acnew-<?php echo $i; ?>" class="form-control"></td>
					</tr>
					<tr>
						<td><?php echo lang("economiccostbenefit"); ?></td>
						<td><input type="text" name="eco" id="eco-<?php echo $i; ?>" class="form-control"></td>
					</tr>
					<tr>
						<td><?php echo lang("unit"); ?></td>
						<td>Euro/<?php echo lang("year"); ?></td>
					</tr>
					<tr>
						<td><?php echo lang("oldcons"); ?></td><td><input type="text" name="oldcons" id="oldcons-<?php echo $i; ?>" class="form-control" value="<?php echo $a['qntty']; ?>"></td>
					</tr>
					<tr>
						<td><?php echo lang("oldcost"); ?></td><td><input type="text" name="oldcost" id="oldcost-<?php echo $i; ?>" class="form-control" value="<?php echo $a['cost']; ?>"></td>
					</tr>
					<tr>
						<td><?php echo lang("oldep"); ?></td><td><input type="text" name="oldep" id="oldep-<?php echo $i; ?>" class="form-control" value="<?php echo $a['ep']; ?>"></td>
					</tr>
					<tr>
						<td><?php echo lang("newcons"); ?></td>
						<td><div class="  "><input type="text" name="newcons" id="newcons-<?php echo $i; ?>" value="<?php echo $a['newcons']; ?>" class="form-control" placeholder="You should fill this field."></div></td>
					</tr>
					<tr>
						<td><?php echo lang("unit"); ?></td>
						<td><input type="hidden" name="unit2" value="<?php echo $a['qntty_unit']; ?>/<?php echo lang('year'); ?>" > <?php echo $a['qntty_unit']; ?>/<?php echo lang("year"); ?></td>
					</tr>
					<tr>
						<td><?php echo $a['unit_cost']; ?>/ <?php echo lang("unit"); ?></td>
						<td><input type="text" name="euunit" id="euunit-<?php echo $i; ?>" class="form-control" value="<?php echo ($a['cost']/$a['qntty']); ?>" ></td>
					</tr>
					<tr>
						<td>EP/ <?php echo lang("unit"); ?></td>
						<td><input type="text" name="eipunit" id="eipunit-<?php echo $i; ?>" class="form-control" value="<?php echo ($a['ep']/$a['qntty']); ?>" ></td>
					</tr>
					<tr>
						<td><?php echo lang("ecologicalbenefit"); ?></td>
						<td><input type="text" name="ecoben" id="ecoben-<?php echo $i; ?>" class="form-control"></td>
					</tr>
					<tr>
						<td><?php echo lang("unit"); ?></td>
						<td>EP/<?php echo lang("year"); ?></td>
					</tr>
					<tr>
						<td><?php echo lang("marginalcost"); ?></td>
						<td><input type="text" name="marcos" id="marcos-<?php echo $i; ?>" class="form-control"></td>	
					</tr>
					<tr>
						<td><?php echo lang("unit"); ?></td><td>$/EP</td>
					</tr>
				</table>
				<input type="submit" value="<?php echo lang("save"); ?>" class="btn btn-block btn-info" style="margin-top:20px;"/> -->
				<script type="text/javascript">

				/*	$('#form-<?php echo $i; ?> input').keydown(function(e){
						
						// Allow: backspace, delete, tab, escape, enter and .
						if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
						     // Allow: Ctrl+A
						    (e.keyCode == 65 && e.ctrlKey === true) || 
						     // Allow: home, end, left, right, down, up
						    (e.keyCode >= 35 && e.keyCode <= 40)) {
						         // let it happen, don't do anything
						         return;
						}
						// Ensure that it is a number and stop the keypress
						if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
						    e.preventDefault();
						}

						//console.log("x<?php echo $i; ?>");
					});*/

					function calculate(){

                        //OPEX old-1
                        $("#flow-opex-1-<?php echo $i; ?>").attr('value',($("#flow-specost-1-<?php echo $i; ?>").val()*$("#flow-value-1-<?php echo $i; ?>").val()).toFixed(2));

                        //OPEX old-2
                        $("#flow-opex-1-2-<?php echo $i; ?>").val(($("#flow-specost-1-2-<?php echo $i; ?>").val()*$("#flow-value-1-2-<?php echo $i; ?>").val()).toFixed(2));

                        //OPEX old-3
                        $("#flow-opex-1-3-<?php echo $i; ?>").val(($("#flow-specost-1-3-<?php echo $i; ?>").val()*$("#flow-value-1-3-<?php echo $i; ?>").val()).toFixed(2));

                        //OPEX old-4
                        $("#flow-opex-1-4-<?php echo $i; ?>").val(($("#flow-specost-1-4-<?php echo $i; ?>").val()*$("#flow-value-1-4-<?php echo $i; ?>").val()).toFixed(2));

                        //OPEX old-5
                        $("#flow-opex-1-5-<?php echo $i; ?>").val(($("#flow-specost-1-5-<?php echo $i; ?>").val()*$("#flow-value-1-5-<?php echo $i; ?>").val()).toFixed(2));

                        //OPEX old-6
                        $("#flow-opex-1-6-<?php echo $i; ?>").val(($("#flow-specost-1-6-<?php echo $i; ?>").val()*$("#flow-value-1-6-<?php echo $i; ?>").val()).toFixed(2));

                        //sum-1
                        $("#sum-1-<?php echo $i; ?>").val(parseInt($("#flow-opex-1-<?php echo $i; ?>").val())+parseInt($("#flow-opex-1-2-<?php echo $i; ?>").val())+parseInt($("#flow-opex-1-3-<?php echo $i; ?>").val())+parseInt($("#flow-opex-1-4-<?php echo $i; ?>").val())+parseInt($("#flow-opex-1-5-<?php echo $i; ?>").val())+parseInt($("#flow-opex-1-6-<?php echo $i; ?>").val())+parseInt($("#maintan-1-<?php echo $i; ?>").val()));

                        //flow eip-1
                        $("#flow-eip-1-<?php echo $i; ?>").val(($("#flow-eipunit-1-<?php echo $i; ?>").val()*$("#flow-value-1-<?php echo $i; ?>").val()).toFixed(4));
                        //flow eip-2
                        $("#flow-eip-1-2-<?php echo $i; ?>").val(($("#flow-eipunit-1-2-<?php echo $i; ?>").val()*$("#flow-value-1-2-<?php echo $i; ?>").val()).toFixed(4));
                        //flow eip-3
                        $("#flow-eip-1-3-<?php echo $i; ?>").val(($("#flow-eipunit-1-3-<?php echo $i; ?>").val()*$("#flow-value-1-3-<?php echo $i; ?>").val()).toFixed(4));
                        //flow eip-4
                        $("#flow-eip-1-4-<?php echo $i; ?>").val(($("#flow-eipunit-1-4-<?php echo $i; ?>").val()*$("#flow-value-1-4-<?php echo $i; ?>").val()).toFixed(4));
                        //flow eip-5
                        $("#flow-eip-1-5-<?php echo $i; ?>").val(($("#flow-eipunit-1-5-<?php echo $i; ?>").val()*$("#flow-value-1-5-<?php echo $i; ?>").val()).toFixed(4));
                        //flow eip-6
                        $("#flow-eip-1-6-<?php echo $i; ?>").val(($("#flow-eipunit-1-6-<?php echo $i; ?>").val()*$("#flow-value-1-6-<?php echo $i; ?>").val()).toFixed(4));

                        //sum-2
                        $("#sum-2-<?php echo $i; ?>").val(parseInt($("#flow-eip-1-<?php echo $i; ?>").val())+parseInt($("#flow-eip-1-2-<?php echo $i; ?>").val())+parseInt($("#flow-eip-1-3-<?php echo $i; ?>").val())+parseInt($("#flow-eip-1-4-<?php echo $i; ?>").val())+parseInt($("#flow-eip-1-5-<?php echo $i; ?>").val())+parseInt($("#flow-eip-1-6-<?php echo $i; ?>").val()));

                        //annual-cost-1
                        $("#annual-cost-1-<?php echo $i; ?>").val((parseInt($("#sum-1-<?php echo $i; ?>").val())+parseInt($("#capexold-<?php echo $i; ?>").val())).toFixed(2));

                        //Ann. costs old option calculation
                        //D3*(J3*(1+J3)^F3)/((1+J3)^F3-1)+E3
                        //capexold*(Discount*(1+Discount)^Lifetimeold)/(((1+Discount)^Lifetimeold)-1)+opexold
                        $("#capex-1-<?php echo $i; ?>").val((
                            parseFloat($("#investment-<?php echo $i; ?>").val()*( 
                                $("#disrate-<?php echo $i; ?>").val()/100 * 
                                    Math.pow(
                                        ((1)+parseFloat($("#disrate-<?php echo $i; ?>").val()/100)),$("#ltold-<?php echo $i; ?>").val()
                                    ))/(parseFloat(
                                    Math.pow(
                                        ((1)+parseFloat($("#disrate-<?php echo $i; ?>").val()/100)),$("#ltold-<?php echo $i; ?>").val()
                                    )
                                )-(1))).toFixed(2))
                        );

                        if(isNaN($("#capex-1-<?php echo $i; ?>").val())){$("#capex-1-<?php echo $i; ?>").val("0");}

                        //OPEX old-2-1
                        $("#flow-opex-2-<?php echo $i; ?>").val(($("#flow-specost-2-<?php echo $i; ?>").val()*$("#flow-value-2-<?php echo $i; ?>").val()).toFixed(2));

                        //OPEX old-2-2
                        $("#flow-opex-2-2-<?php echo $i; ?>").val(($("#flow-specost-2-2-<?php echo $i; ?>").val()*$("#flow-value-2-2-<?php echo $i; ?>").val()).toFixed(2));

                        //OPEX old-2-3
                        $("#flow-opex-2-3-<?php echo $i; ?>").val(($("#flow-specost-2-3-<?php echo $i; ?>").val()*$("#flow-value-2-3-<?php echo $i; ?>").val()).toFixed(2));

                        //OPEX old-2-4
                        $("#flow-opex-2-4-<?php echo $i; ?>").val(($("#flow-specost-2-4-<?php echo $i; ?>").val()*$("#flow-value-2-4-<?php echo $i; ?>").val()).toFixed(2));

                        //OPEX old-2-5
                        $("#flow-opex-2-5-<?php echo $i; ?>").val(($("#flow-specost-2-5-<?php echo $i; ?>").val()*$("#flow-value-2-5-<?php echo $i; ?>").val()).toFixed(2));

                        //OPEX old-2-6
                        $("#flow-opex-2-6-<?php echo $i; ?>").val(($("#flow-specost-2-6-<?php echo $i; ?>").val()*$("#flow-value-2-6-<?php echo $i; ?>").val()).toFixed(2));

                        //flow eip-2
                        $("#flow-eip-2-<?php echo $i; ?>").val(($("#flow-eipunit-2-<?php echo $i; ?>").val()*$("#flow-value-2-<?php echo $i; ?>").val()).toFixed(4));
                        //flow eip-2-2
                        $("#flow-eip-2-2-<?php echo $i; ?>").val(($("#flow-eipunit-2-2-<?php echo $i; ?>").val()*$("#flow-value-2-2-<?php echo $i; ?>").val()).toFixed(4));
                        //flow eip-2-3
                        $("#flow-eip-2-3-<?php echo $i; ?>").val(($("#flow-eipunit-2-3-<?php echo $i; ?>").val()*$("#flow-value-2-3-<?php echo $i; ?>").val()).toFixed(4));
                        //flow eip-2-4
                        $("#flow-eip-2-4-<?php echo $i; ?>").val(($("#flow-eipunit-2-4-<?php echo $i; ?>").val()*$("#flow-value-2-4-<?php echo $i; ?>").val()).toFixed(4));
                        //flow eip-2-5
                        $("#flow-eip-2-5-<?php echo $i; ?>").val(($("#flow-eipunit-2-5-<?php echo $i; ?>").val()*$("#flow-value-2-5-<?php echo $i; ?>").val()).toFixed(4));
                        //flow eip-2-6
                        $("#flow-eip-2-6-<?php echo $i; ?>").val(($("#flow-eipunit-2-6-<?php echo $i; ?>").val()*$("#flow-value-2-6-<?php echo $i; ?>").val()).toFixed(4));

                         //sum-2
                        $("#sum-1-1-<?php echo $i; ?>").val(parseInt($("#flow-opex-2-<?php echo $i; ?>").val())+parseInt($("#flow-opex-2-2-<?php echo $i; ?>").val())+parseInt($("#flow-opex-2-3-<?php echo $i; ?>").val())+parseInt($("#flow-opex-2-4-<?php echo $i; ?>").val())+parseInt($("#flow-opex-2-5-<?php echo $i; ?>").val())+parseInt($("#flow-opex-2-6-<?php echo $i; ?>").val())+parseInt($("#maintan-1-2-<?php echo $i; ?>").val()));

                         //eip2-1
                        $("#sum-2-1-<?php echo $i; ?>").val(parseInt($("#flow-eip-2-<?php echo $i; ?>").val())+parseInt($("#flow-eip-2-2-<?php echo $i; ?>").val())+parseInt($("#flow-eip-2-3-<?php echo $i; ?>").val())+parseInt($("#flow-eip-2-4-<?php echo $i; ?>").val())+parseInt($("#flow-eip-2-5-<?php echo $i; ?>").val())+parseInt($("#flow-eip-2-6-<?php echo $i; ?>").val()));

                        //annual-cost-2
                        $("#annual-cost-2-<?php echo $i; ?>").val(parseInt($("#sum-1-1-<?php echo $i; ?>").val())+parseInt($("#capex-1-<?php echo $i; ?>").val()));

                        //difference-1
                        $("#flow-value-3-<?php echo $i; ?>").val(parseInt($("#flow-value-1-<?php echo $i; ?>").val())-parseInt($("#flow-value-2-<?php echo $i; ?>").val()));
                        //difference-2
                        $("#flow-value-3-2-<?php echo $i; ?>").val(parseInt($("#flow-value-1-2-<?php echo $i; ?>").val())-parseInt($("#flow-value-2-2-<?php echo $i; ?>").val()));
                        //difference-3
                        $("#flow-value-3-3-<?php echo $i; ?>").val(parseInt($("#flow-value-1-3-<?php echo $i; ?>").val())-parseInt($("#flow-value-2-3-<?php echo $i; ?>").val()));                        
                        //difference-4
                        $("#flow-value-3-4-<?php echo $i; ?>").val(parseInt($("#flow-value-1-4-<?php echo $i; ?>").val())-parseInt($("#flow-value-2-4-<?php echo $i; ?>").val()));                        
                        //difference-5
                        $("#flow-value-3-5-<?php echo $i; ?>").val(parseInt($("#flow-value-1-5-<?php echo $i; ?>").val())-parseInt($("#flow-value-2-5-<?php echo $i; ?>").val()));                        
                        //difference-6
                        $("#flow-value-3-6-<?php echo $i; ?>").val(parseInt($("#flow-value-1-6-<?php echo $i; ?>").val())-parseInt($("#flow-value-2-6-<?php echo $i; ?>").val()));


                        //opex_dif-1
                        $("#flow-opex-3-<?php echo $i; ?>").val(parseInt($("#flow-opex-1-<?php echo $i; ?>").val())-parseInt($("#flow-opex-2-<?php echo $i; ?>").val()));
                        //opex_dif-2
                        $("#flow-opex-3-2-<?php echo $i; ?>").val(parseInt($("#flow-opex-1-2-<?php echo $i; ?>").val())-parseInt($("#flow-opex-2-2-<?php echo $i; ?>").val()));
                        //opex_dif-3
                        $("#flow-opex-3-3-<?php echo $i; ?>").val(parseInt($("#flow-opex-1-3-<?php echo $i; ?>").val())-parseInt($("#flow-opex-2-3-<?php echo $i; ?>").val()));                        
                        //opex_dif-4
                        $("#flow-opex-3-4-<?php echo $i; ?>").val(parseInt($("#flow-opex-1-4-<?php echo $i; ?>").val())-parseInt($("#flow-opex-2-4-<?php echo $i; ?>").val()));                        
                        //opex_dif-5
                        $("#flow-opex-3-5-<?php echo $i; ?>").val(parseInt($("#flow-opex-1-5-<?php echo $i; ?>").val())-parseInt($("#flow-opex-2-5-<?php echo $i; ?>").val()));                        
                        //opex_dif-6
                        $("#flow-opex-3-6-<?php echo $i; ?>").val(parseInt($("#flow-opex-1-6-<?php echo $i; ?>").val())-parseInt($("#flow-opex-2-6-<?php echo $i; ?>").val()));

                        //opex_dif-1
                        $("#ecoben-eip-1-<?php echo $i; ?>").val(parseInt($("#flow-eip-1-<?php echo $i; ?>").val())-parseInt($("#flow-eip-2-<?php echo $i; ?>").val()));
                        //opex_dif-2
                        $("#ecoben-eip-1-2-<?php echo $i; ?>").val(parseInt($("#flow-eip-1-2-<?php echo $i; ?>").val())-parseInt($("#flow-eip-2-2-<?php echo $i; ?>").val()));
                        //opex_dif-3
                        $("#ecoben-eip-1-3-<?php echo $i; ?>").val(parseInt($("#flow-eip-1-3-<?php echo $i; ?>").val())-parseInt($("#flow-eip-2-3-<?php echo $i; ?>").val()));                        
                        //opex_dif-4
                        $("#ecoben-eip-1-4-<?php echo $i; ?>").val(parseInt($("#flow-eip-1-4-<?php echo $i; ?>").val())-parseInt($("#flow-eip-2-4-<?php echo $i; ?>").val()));                        
                        //opex_dif-5
                        $("#ecoben-eip-1-5-<?php echo $i; ?>").val(parseInt($("#flow-eip-1-5-<?php echo $i; ?>").val())-parseInt($("#flow-eip-2-5-<?php echo $i; ?>").val()));                        
                        //opex_dif-6
                        $("#ecoben-eip-1-6-<?php echo $i; ?>").val(parseInt($("#flow-eip-1-6-<?php echo $i; ?>").val())-parseInt($("#flow-eip-2-6-<?php echo $i; ?>").val()));

                        //sum-3-1
                        $("#sum-3-1-<?php echo $i; ?>").val(parseInt($("#flow-opex-3-<?php echo $i; ?>").val())+parseInt($("#flow-opex-3-2-<?php echo $i; ?>").val())+parseInt($("#flow-opex-3-3-<?php echo $i; ?>").val())+parseInt($("#flow-opex-3-4-<?php echo $i; ?>").val())+parseInt($("#flow-opex-3-5-<?php echo $i; ?>").val())+parseInt($("#flow-opex-3-6-<?php echo $i; ?>").val()));

                        //sum-3-2
                        $("#sum-3-2-<?php echo $i; ?>").val(parseInt($("#ecoben-eip-1-<?php echo $i; ?>").val())+parseInt($("#ecoben-eip-1-2-<?php echo $i; ?>").val())+parseInt($("#ecoben-eip-1-3-<?php echo $i; ?>").val())+parseInt($("#ecoben-eip-1-4-<?php echo $i; ?>").val())+parseInt($("#ecoben-eip-1-5-<?php echo $i; ?>").val())+parseInt($("#ecoben-eip-1-6-<?php echo $i; ?>").val()));

                        //ecoben-1
                        $("#ecoben-1-<?php echo $i; ?>").val(parseInt($("#annual-cost-2-<?php echo $i; ?>").val())-parseInt($("#annual-cost-1-<?php echo $i; ?>").val()));

                        //marcos-1
                        $("#marcos-1-<?php echo $i; ?>").val((parseInt($("#ecoben-1-<?php echo $i; ?>").val())/parseInt($("#sum-3-2-<?php echo $i; ?>").val())).toFixed(2));

                        //payback-1
                        $("#payback-1-<?php echo $i; ?>").val(((parseInt($("#ltold-<?php echo $i; ?>").val())*parseInt($("#capex-1-<?php echo $i; ?>").val()))/(parseInt($("#sum-1-<?php echo $i; ?>").val())-parseInt($("#sum-1-1-<?php echo $i; ?>").val()))).toFixed(2));
                        //------------------------------

						//OPEX OLD calculation
						$("#opexold-<?php echo $i; ?>").val($("#oldcons-<?php echo $i; ?>").val()*$("#euunit-<?php echo $i; ?>").val());

						//OPEX NEW calculation
						$("#opexnew-<?php echo $i; ?>").val($("#newcons-<?php echo $i; ?>").val()*$("#euunit-<?php echo $i; ?>").val());

						/*
						console.log(
							Math.pow(
										((1)+parseFloat($("#disrate-<?php echo $i; ?>").val()/100)),$("#ltold-<?php echo $i; ?>").val()
								)-(1)
						);
						console.log(parseFloat($("#disrate-<?php echo $i; ?>").val()/100));
						console.log(parseFloat($("#ltold-<?php echo $i; ?>").val()));
						*/

						//Ann. costs new option calculation
						//D3*(J3*(1+J3)^F3)/((1+J3)^F3-1)+E3
						//capexold*(Discount*(1+Discount)^Lifetimeold)/(((1+Discount)^Lifetimeold)-1)+opexold
						/*$("#acnew-<?php echo $i; ?>").val( 
							parseFloat($("#capexnew-<?php echo $i; ?>").val()*( 
								$("#disrate-<?php echo $i; ?>").val()/100 * 
									Math.pow(
										((1)+parseFloat($("#disrate-<?php echo $i; ?>").val()/100)),$("#ltnew-<?php echo $i; ?>").val()
									))/(parseFloat(
									Math.pow(
										((1)+parseFloat($("#disrate-<?php echo $i; ?>").val()/100)),$("#ltnew-<?php echo $i; ?>").val()
									)
								)-(1)))
							+ parseFloat($("#opexnew-<?php echo $i; ?>").val())
						);

						//Ecological Benefit calculation
						$("#ecoben-<?php echo $i; ?>").val(-$("#eipunit-<?php echo $i; ?>").val() * ($("#newcons-<?php echo $i; ?>").val()-$("#oldcons-<?php echo $i; ?>").val()));
						
						//Economic cost-benefit calculation
						$("#eco-<?php echo $i; ?>").val($("#acnew-<?php echo $i; ?>").val()-$("#acold-<?php echo $i; ?>").val());


						//MArgianl-costs calculation
						//=EĞER(W3>0,M3/W3*100,-M3/W3*100)
						if($("#ecoben-<?php echo $i; ?>").val()>0){
							$("#marcos-<?php echo $i; ?>").val($("#eco-<?php echo $i; ?>").val()/$("#ecoben-<?php echo $i; ?>").val()*100);
							$("#marcos-<?php echo $i; ?>").val(toFixed($("#marcos-<?php echo $i; ?>").val(),2));
						}
						else{
							$("#marcos-<?php echo $i; ?>").val(-$("#eco-<?php echo $i; ?>").val()/$("#ecoben-<?php echo $i; ?>").val()*100);
							$("#marcos-<?php echo $i; ?>").val(toFixed($("#marcos-<?php echo $i; ?>").val(),2));
						}*/

					}

					function toFixed ( number, precision ) {
					    var multiplier = Math.pow( 10, precision + 1 ),
					        wholeNumber = Math.floor( number * multiplier );
					    return Math.round( wholeNumber / 10 ) * 10 / multiplier;
					}


					$('#form-<?php echo $i; ?> input').change(calculate);
 				</script>
				<?php $i++; ?>
				<!-- </form> -->
				<script type="text/javascript">	$( document ).ready(calculate);</script>
			<?php endforeach ?>
		<?php endif ?>
</div>
<div class="col-md-6" id="sag4">
	<p><?php echo lang("cbaheading3"); ?></p>
	<div id="rect-demo-ana" style="border:2px solid #f0f0f0;">
    <div id="rect-demo"></div>
  </div>
</div>
<?php
	//array defining
	$t=0;
	$toplameco=0;
	foreach ($allocation as $a) {
		if(empty($a['cmpny_from_name'])) { $tuna_array[$t]['name']=$a['best']."-".$a['prcss_name'];} else {$tuna_array[$t]['name']=$a['flow_name']." input IS potential from ".$a['cmpny_from_name']; }
		
		$tuna_array[$t]['color']='#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
		if($a['marcos-1']>0){
			$tuna_array[$t]['ymax']= $a['marcos-1'];
		}
		else{
			$tuna_array[$t]['ymax']= 0;
		}

		$toplameco+=$a['sum-3-2'];
		$tuna_array[$t]['xmax']= intval($a['sum-3-2']);

		$eksieco = $toplameco - $a['sum-3-2'];
		$tuna_array[$t]['xmin']= $eksieco;

		if($a['marcos-1']>0){
			$tuna_array[$t]['ymin']= "0";
		}
		else{
			$tuna_array[$t]['ymin']= $a['marcos-1'];
		}
		$t++;
	}
	//print_r($tuna_array);
	//echo json_encode($tuna_array);
?>
<script type="text/javascript">
	setTimeout(function()
	{
		tuna_graph();
	}, 1000);

	function tuna_graph(){
	//console.log(list);
	//Tuna Graph
	var data = <?php echo json_encode($tuna_array); ?>;
	//console.log(data);
	var margin = {
	            "top": 10,
	            "right": 30,
	            "bottom": 350,
	            "left": 50
	        };
	var width = $('#sag4').width()-80;
	var height = 500;
	// Set the scales
  var x = d3.scale.linear()
          .domain([0, d3.max(data, function(d) { return d.xmin+d.xmax; })])
      		.range([0,width]).nice();

  var y = d3.scale.linear()
      		.domain([d3.min(data, function(d) { return d.ymin-0.1; }), d3.max(data, function(d) { return d.ymax; })])
      		.range([height, 0]).nice();

  var xAxis = d3.svg.axis().scale(x).orient("bottom");
  var yAxis = d3.svg.axis().scale(y).orient("left");

	// Create the SVG 'canvas'
  var svg = d3.select("#rect-demo-ana").append("svg")
          .attr("class", "chart")
          .attr("mousewheel.zoom", null)
          .attr("width", width + margin.left + margin.right)
          .attr("height", height + margin.top + margin.bottom).append("g")
          .attr("transform", "translate(" + margin.left + "," + margin.right + ")");

  svg.append("g")
    .attr("class", "x axis")
    .attr("transform", "translate(0,"+ y(0) +")")
    .call(xAxis);

  svg.append("g")
    .attr("class", "y axis")
    .call(yAxis);

  //x axis label
	svg.append("text")
		.attr("transform", "translate(" + (width / 2) + " ," + (height + margin.bottom - 305) + ")")
		.style("text-anchor", "middle")
		.text("<?php echo lang('ecologicalbenefit'); ?>");

	//y axis label
	svg.append("text")
		.attr("transform", "rotate(-90)")
		.attr("y", 0 - margin.left)
		.attr("x", 0 - (height / 2))
		.attr("dy", "1em")
		.style("text-anchor", "middle")
		.text("<?php echo lang('marginalcost'); ?>");

	svg.selectAll("rect").
		data(data).
		enter().
		append("svg:rect").
		attr("x", function(datum,index) { return x(datum.xmin); }).
		attr("y", function(datum,index) { return y(datum.ymax); }).
		attr("height", function(datum,index) { return y(datum.ymin)-y(datum.ymax)+(height*0.0001); }).
		attr("width", function(datum, index) { return x(datum.xmax)+(width*0.0001); })
		.attr("fill", function(d, i) { return d.color; })
		.style("opacity", '0.5')
		.on("mouseover", function(datum,index){return tooltip.style("visibility", "visible").html(datum.name);})
		.on("mousemove", function(datum,index){return tooltip.style("top", (d3.event.pageY-10)+"px").style("left",(d3.event.pageX+10)+"px").html(datum.name);})
		.on("mouseout", function(){return tooltip.style("visibility", "hidden");});

		var tooltip = d3.select("body")
		.append("div")
		.style("position", "absolute")
		.style("z-index", "10")
		.style("visibility", "hidden")
		.style("background-color", "white")
		.style("padding", "10px")
		.style("border", "1px solid #d0d0d0")
		.style("border-radius", "2px")
		.style("font-size", "12px")
		.style("max-width", "200px")
		.style("color", "#444");

		// add legend   
		var legend = svg.append("g")
	  .attr("class", "legend")
        //.attr("x", w - 65)
        //.attr("y", 50)
	  .attr("height", 100)
	  .attr("width", 100)
    .attr('transform', 'translate(-20,50)')    
      
    legend.selectAll('rect')
      .data(data)
      .enter()
      .append("circle")
      .attr("r", 7)
      .attr("cx", 1)
      .attr("cy", function(d, i){ return 555 + (i *  19);})
		  .style("fill", function(datum,index) { return datum.color; })
		 	.style("opacity", '0.5')
      
    legend.selectAll('text')
      .data(data)
      .enter()
      .append("text")
		.style("font-size", "12px")
	  .attr("x", 16)
    .attr("y", function(d, i){ return i *  19 + 559;})
	  .text(function(datum,index) { return datum.name; });

	  svg.call(
	  	d3.behavior.zoom()
	  	.x(x).y(y).on("zoom", zoom)
	  	);
 
		function zoom() {
		  svg.select(".x.axis").call(xAxis);
		  svg.select(".y.axis").call(yAxis);
		  svg.selectAll('rect').attr("transform", "translate(" + d3.event.translate + ")scale(" + d3.event.scale + ")");
		}
	}
</script>
<?php $k=1; ?>
<?php foreach ($allocation as $b): ?>
<?php // echo $b['flow_name']; ?>
<script type="text/javascript">
    var flownamedef= "<?php echo $b['flow_name']; ?>";
    var qntty_unit= "<?php echo $b['qntty_unit']; ?>";
    var amount= "<?php echo $b['amount']; ?>";
    var cost= "<?php echo $b['cost']; ?>";
    var env_impact= "<?php echo $b['env_impact']; ?>";
    var k= <?php echo $k; ?>;
    //alert(document.getElementById('flow-name-1-'+k).value);
    if(document.getElementById('flow-name-1-'+k).value==""){
        document.getElementById('flow-name-1-'+k).value = flownamedef;
        document.getElementById('flow-unit-1-'+k).value = qntty_unit;
        document.getElementById('flow-value-1-'+k).value = amount;
        document.getElementById('flow-specost-1-'+k).value = cost/amount;
        document.getElementById('flow-eipunit-1-'+k).value = env_impact/amount;
        //alert(flownamedef);
        //alert("flow_name-1-"+k);
    }
</script>
<?php $k=$k+1; ?>
<?php endforeach ?>