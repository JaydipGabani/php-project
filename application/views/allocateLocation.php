<?php
echo form_open('allocateLocationController/barcodeValues');
?>
<div class="input-field">
    <input id="scanningBarcode" class="bcode hide-while-printing validate" type="number" min="1" required name="Barcode"
           autofocus/>
    <label for="scanningBarcode" class="hide-while-printing">Barcode</label>
</div>
<input class="btn" type="submit" style="visibility: hidden"/>
<?php
echo form_close();
?>
<?php
$flag = 1;
$tag = '';
if ($ScannedData == "") {
    $flag = 0;
} else {
    $tag = $ScannedData[0];
}
//echo json_encode($tag);
?>


<div class="hide-while-printing">
    <?php
    echo form_open('allocateLocationController/locationAllocated');
    ?>
    <input id="scanned-barcode" type="hidden" name="Barcode" value="<?php echo ($flag == 1) ? $tag->Barcode : ""; ?>"/>
    <div class="row">
        <div class="col s2 input-field">
            <input id="Loc" type="text" name="LocOnSite" class="validate"
                   value="<?php echo ($flag == 1) ? $tag->LocOnSite : "null"; ?>"
                   pattern="((T|C)-([A-I]([0-9]|10|11|OUT)-([0-9]|10|11|12|13|14|15)-[A-F]))|(NA)"/>
            <label for="Loc">Location On Site</label>
        </div>
        <div class="col s2 input-field">
            <input id="finish" type="<?php echo $role == 'worker' ? 'hidden' : 'text' ?>" name="Finish"
                   value="<?php echo ($flag == 1) ? $tag->Finish : "null"; ?>"/>
            <label for="finish">Finish</label>
        </div>
        <div class="col s2 input-field">
            <input id="Qty" type="number" name="Qty" min="0"
                   class="validate"
                   value="<?php echo ($flag == 1) ? $tag->Qty : "0"; ?>"/>
            <label for="Qty">Qty</label>
        </div>
        <div class="col s2 input-field">
            <input id="length" type="<?php echo $role == 'worker' ? 'hidden' : 'number' ?>" name="OrderLength" min="0"
                   class="validate"
                   value="<?php echo ($flag == 1) ? $tag->OrderLength : "0"; ?>"/>
            <label for="length">length</label>
        </div>
    </div>
    <input id="submit-of-locationAllocated" class="btn" type="submit" value="submit"/>
    <?php
    echo form_close();
    ?>
    <?php
    echo form_open('allocateLocationController/updateNorex');
    ?>
    <input id="scanned-barcode" type="hidden" name="Barcode" value="<?php echo ($flag == 1) ? $tag->Barcode : ""; ?>"/>
    <div class="row">
        <div class="col s2 input-field">
            <input id="norex" type="text" name="NorexID"
                   value="<?php echo ($flag == 1) ? $tag->NorexID : "null"; ?>" <?php echo $role == 'worker' ? 'disabled' : '' ?>
                   required/>
            <label for="norex">NorexID</label>
        </div>
        <!--        <div class="col s2">Current Location: -->
        <?php //echo ($flag == 1) ? $tag->Location : "null"; ?><!--</div>-->
        <div class="col s2 input-field">
            <select id="Location" name="Location" <?php echo $role == 'worker' ? 'disabled' : '' ?> required>
                <option value="" disabled selected>Choose your option</option>
                <option value="1">Teterboro</option>
                <option value="2">Carlstadt</option>
            </select>
            <label for="Location">Location</label>

        </div>
    </div>
    <input class="btn" type="submit" value="update NorexID" <?php echo $role == 'worker' ? 'disabled' : '' ?>/>
    <?php
    echo form_close();
    ?>
	<?php
    echo form_open('allocateLocationController/updateProject');
    ?>
    <input id="scanned-barcode" type="hidden" name="Barcode" value="<?php echo ($flag == 1) ? $tag->Barcode : ""; ?>"/>
    <div class="row">
        <div class="col s2 input-field">
            <input id="project" type="text" name="Projectid"
                   value="<?php echo ($flag == 1) ? $tag->Projectid : "null"; ?>" <?php echo $role == 'worker' ? 'disabled' : '' ?>
                   required/>
            <label for="project">Projectid</label>
        </div>
    </div>
    <input class="btn" type="submit" value="update Project" <?php echo $role == 'worker' ? 'disabled' : '' ?>/>
    <?php
    echo form_close();
    ?>

</div>


<div class="container printing-dim">
    <br><br>
    <div class="row">
        <div class="col s3">
            <img class="top-logo" src="<?php echo base_url(); ?>application/img/nas-logo-vertical.png" alt="">
        </div>
        <div class="col s9 title">
            EXTRUSION INVENTORY TAG
        </div>
    </div>
    <hr>
    <table>
        <tr>
            <td>Date</td>
            <td class="values"><b><?php echo ($flag == 1) ? $tag->Date : "null"; ?></b></td>
            <td>TagNo</td>
            <td class="values"><b><?php echo ($flag == 1) ? $tag->Tag_No : "null"; ?></b></td>
        </tr>
        <tr>
            <td>Location</td>
            <td class="values"><b><?php echo ($flag == 1) ? $tag->LocOnSite : "null"; ?></b></td>
            <td>Barcode</td>
            <td rowspan="2"><img id="barcode-in-tag" src=""/></td>
        </tr>
        <tr>
            <td># of Pcs.</td>
            <td class="values"><b><?php echo ($flag == 1) ? $tag->Qty : "null"; ?></b></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Length</td>
            <td class="values"><b><?php echo ($flag == 1) ? $tag->OrderLength : "null"; ?></b></td>
            <td>NorexId</td>
            <td class="values"><b><?php echo ($flag == 1) ? $tag->NorexID : "null"; ?></b></td>
        </tr>
        <tr>
            <td>Color</td>
            <td class="values"><b><?php echo ($flag == 1) ? $tag->Finish : "null"; ?></b></td>
            <td>Drawing</td>
            <td rowspan="4">
                <img
                    src="<?php echo base_url(); ?>application/img/ExtrusionJPEG/<?php echo ($flag == 1)? $tag->Location:'1'; ?>/<?php echo ($flag == 1) ? $tag->NorexID : "blank"; ?>.JPG"
                    height="auto" width="200px" alt="">
            </td>
        </tr>
        <tr>
            <td>Extruder</td>
            <td>Die No.</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>EASCO</td>
            <td><b><?php echo '';//$tag->Easco_Die_; ?></b></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>KEYMARK</td>
            <td><b><?php echo ($flag == 1) ? $tag->KeymarkDieNo : ""; ?></b></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>ASTRO</td>
            <td class="values"><b><?php echo ($flag == 1) ? $tag->AstroDieNo : "null"; ?></b></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>NORTHERN</td>
            <td><b><?php echo '';//$tag->Northern_Part_Number; ?></b></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Model</td>
            <td class="values"><b><?php echo ($flag == 1) ? $tag->Model : "null"; ?></b></td>
            <td>Description</td>
            <td class="values"><b><?php echo ($flag == 1) ? $tag->Description : "null"; ?></b></td>
        </tr>
        <tr>
            <td>Project ID</td>
            <td class="values"><b><?php echo ($flag == 1) ? $tag->Projectid : "null"; ?></b></td>
            <td>Project Name</td>
            <td class="values"><b><?php echo ($flag == 1) ? $tag->pname : "null"; ?></b></td>
        </tr>
    </table>
</div>
<script>
    JsBarcode("#barcode-in-tag", "<?php echo sprintf('%010d', ($flag == 1) ? $tag->Barcode : "0"); ?>");
</script>

<script>
    var loc = $('#Loc');
    var locationOfNorex = $('#Location');
    var finish = $('#finish');
    var Qty = $('#Qty');
    var orderlength = $('#length');
    var norex = $('#norex');
    if (!$('#scanned-barcode').val()) {
        loc.prop('disabled', true);
        locationOfNorex.prop('disabled', true);
        finish.prop('disabled', true);
        Qty.prop('disabled', true);
        orderlength.prop('disabled', true);
        norex.prop('disabled', true);
    }
    else {
        console.log("enable");
    }
</script>
</body>
</html>