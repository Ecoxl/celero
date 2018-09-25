<div class="container">
    <h4>Add new excel</h4>
    <div style="border: 1px solid #d0d0d0; padding: 15px; margin-bottom: 20px; overflow:hidden;">
        <i>This will replace your whole excel data. Inserted data won't be affected. Only xls and xlsx filetype is allowed.</i>
        <div style="padding: 20px 0; padding-bottom: 0px;">
            <?php
                if(isset($error)) {
                    echo "<div style=' color:#E74C3C;margin: 10px 0;padding: 15px;padding-bottom: 0;border: 1px solid;'>ERROR:</br>".$error."</div>";
                }
                else {
                    echo "<div style=' color:#2eb3e7;margin: 10px 0;padding: 15px;padding-bottom: 20;border: 1px solid;'>DONE:</br>You have successfully uploaded new file.</div>";
                }
            ?>
            <?php echo form_open_multipart('uploadExcel', "style='margin-top: 10px;float: left;'");?>
            <input type="file" name="excelFile" id="excelFile">
        </div>
        <input type="submit" value="Upload Data" style="float:right;" class="btn btn-info" />
        </form>
    </div>
    <a href="<?php echo site_url('datasetexcel/'.$id) ?>" class="btn btn-default"><span class="glyphicon glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        Return to Excel values management page</a>

</div>