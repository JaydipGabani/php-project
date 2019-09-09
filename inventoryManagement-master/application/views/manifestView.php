<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 09-02-2017
 * Time: 00:15
 */
?>
<script src="<?php echo base_url(); ?>application/js/excel.js"></script>
<script>
    var oFileIn;

    $(function () {
        oFileIn = document.getElementById('my_file_input_Astro');
        if (oFileIn.addEventListener) {
            oFileIn.addEventListener('change', filePickedastro, false);
        }
    });
    function filePickedastro(oEvent) {
        // Get The File From The Input
        var oFile = oEvent.target.files[0];
        var sFilename = oFile.name;
        // Create A File Reader HTML5
        var reader = new FileReader();

        // Ready The Event For When A File Gets Selected
        reader.onload = function (e) {
            var data = e.target.result;
            var cfb = XLS.CFB.read(data, {type: 'binary'});
            var wb = XLS.parse_xlscfb(cfb);

            // Loop Over Each Sheet
            var sCSV = XLS.utils.make_csv(wb.Sheets['Sheet1']);
            var oJS = XLS.utils.sheet_to_row_object_array(wb.Sheets['Sheet1']);

            $("#menifestReaderSubmitAstro").val(sCSV);
            console.log(oJS)
        };

        // Tell JS To Start Reading The File.. You could delay this if desired
        reader.readAsBinaryString(oFile);
    }

</script>
<script>
    var pFileIn;

    $(function () {
        pFileIn = document.getElementById('my_file_input_keymark');
        if (pFileIn.addEventListener) {
            pFileIn.addEventListener('change', filePickedkeymark, false);
        }
    });
    function filePickedkeymark(oEvent) {
        // Get The File From The Input
        var oFile = oEvent.target.files[0];
        var sFilename = oFile.name;
        // Create A File Reader HTML5
        var reader = new FileReader();

        // Ready The Event For When A File Gets Selected
        reader.onload = function (e) {
            var data = e.target.result;
            var cfb = XLS.CFB.read(data, {type: 'binary'});
            var wb = XLS.parse_xlscfb(cfb);

            // Loop Over Each Sheet
            var sCSV = XLS.utils.make_csv(wb.Sheets['NBPManifestCSV']);
            var oJS = XLS.utils.sheet_to_row_object_array(wb.Sheets['NBPManifestCSV']);

            $("#menifestReaderSubmitKeymark").val(sCSV);
            console.log(oJS)
        };

        // Tell JS To Start Reading The File.. You could delay this if desired
        reader.readAsBinaryString(oFile);
    }

</script>

<br>
<div class="row">
    <div class="col s6">
        <input type="file" class="btn col s12" id="my_file_input_Astro"/>
        <?php
        echo form_open('manifestController/manifestReaderAstro', array('class' => ''));
        ?>
        <input type="hidden" id="menifestReaderSubmitAstro" name="excelData" required="required"/>
        <input type="submit" class="btn col s12" value="ASTRO"/>
        <?php
        echo form_close();
        ?>
    </div>
    <div class="col s6">
        <input type="file" class="btn col s12" id="my_file_input_keymark"/>
        <?php
        echo form_open('manifestController/manifestReaderKeymark', array('class' => ''));
        ?>
        <input type="hidden" id="menifestReaderSubmitKeymark" name="excelData" required="required"/>
        <input type="submit" class="btn col s12" value="Keymark"/>
        <?php
        echo form_close();
        ?>
    </div>
    <div class="col s12">
        <br>
        <?php
        echo form_open('manifestController/printManifest', array('class' => 'left'));
        ?>
        <input type="submit" value="print manifests" class="btn"/>
        <?php
        echo form_close();
        ?>

        <?php
        echo form_open('manifestController/clearManifest', array('class' => 'right'));
        ?>
        <input type="submit" value="clear manifests" class="btn"/>
        <?php
        echo form_close();
        ?>
    </div>


</div>
<div class="col s6" id="manifestData1"></div>
<div class="hiddendiv" id="manifestData">
    <?php echo json_encode($manifestData); ?>
</div>


<script>
    Handlebars.registerHelper('locationConverter', function (options) {
        if (options == 1){
            return "Teterboro";
        }else{
            return "Carlstadt";
        }
    });
</script>
<script src="<?php echo base_url(); ?>application/js/order-module-template.js"></script>
<script>
    var base_url = '<?php echo base_url();?>';
    var allData = JSON.parse('{"server":""}');
    allData.server = base_url;
    allData.editTuple = 'manifestController/editTuple';
    allData.manifestData = JSON.parse($('#manifestData').html());
    allData.submitManifest = "manifestController/submitManifest";
    console.log(allData);
    var ManifestTemplate = Handlebars.templates['tempManifestViewManifestData'](allData);
    $('#manifestData1').html(ManifestTemplate);

</script>
</body>
</html>

