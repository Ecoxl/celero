<div class="container">
    <div class="row">


    <div class="col-md-12" style=" background-color: aliceblue;padding: 15px 20px 25px 15px;">
        <h6>Upload/Update Excel</h6>
        <a class="btn btn-info" href="<?php echo site_url('uploadExcel') ?>">Upload Excel</a>
    </div>
    <div class="col-md-12">
        <?php if(validation_errors() != NULL ): ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div class="popover-content">
                    <?php echo validation_errors(); ?>
                </div>
            </div>
        <?php endif ?>
    </div>
    <div class="col-md-6">
        <h6>Excel Content</h6>
        <table class="table">
            <th>Flow Name</th><th>Ep Value</th><th>Ep Unit</th><th>Add EP to your list</th>
        <?php foreach ($excelcontents as $ec): ?>
            <?php echo form_open_multipart('datasetexcel'); ?>
            <?php //print_r($ec); ?>
                <tr>
                <td>
                    <div class="form-group">
                        <input class="form-control" id="flowname" name="flowname" value="<?php echo $ec[0]; ?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input class="form-control" id="epvalue" name="epvalue" value="<?php echo $ec[1]; ?>">
                        </div>
                    </td>
                    <td>EP</td>
                    <td>
                        <button type="submit" class="btn btn-info">Add EP</button>
                    </td>
                    </tr>
                    </form>
        <?php endforeach ?>
        </table>
    </div>
    <div class="col-md-6">
        <h6>Your EP Data</h6>
        <table class="table">
            <th>Flow Name</th><th>Flow Value</th><th>Delete</th>
            <?php foreach ($userepvalues as $uep): ?>
                <?php //print_r($ec); ?>
                <tr>
                    <td>
                        <?php echo $uep['flow_name']; ?>
                    </td>
                    <td>
                        <?php echo $uep['ep_value']; ?>
                    </td>
                    <td>
                    <a href="<?php echo base_url('deleteuserep/'.$uep['flow_name'].'/'.$uep['ep_value']); ?>" class="label label-info">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    </div>
</div>