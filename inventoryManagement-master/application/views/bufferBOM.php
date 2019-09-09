<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 09-01-2017
 * Time: 11:43
 */
?>

<script src="<?php echo base_url();?>application/js/excel.js"></script>
<script>
    var oFileIn;

    $(function() {
        oFileIn = document.getElementById('my_file_input');
        if(oFileIn.addEventListener) {
            oFileIn.addEventListener('change', filePicked, false);
        }
    });


    function filePicked(oEvent) {
        // Get The File From The Input
        var oFile = oEvent.target.files[0];
        var sFilename = oFile.name;
        // Create A File Reader HTML5
        var reader = new FileReader();

        // Ready The Event For When A File Gets Selected
        reader.onload = function(e) {
            var data = e.target.result;
            var cfb = XLS.CFB.read(data, {type: 'binary'});
            var wb = XLS.parse_xlscfb(cfb);

            // Loop Over Each Sheet
            var sCSV = XLS.utils.make_csv(wb.Sheets['Aluminum']);
            var oJS = XLS.utils.sheet_to_row_object_array(wb.Sheets['Aluminum']);

            $("#my_file_output").val(sCSV);
            console.log(oJS)
        };

        // Tell JS To Start Reading The File.. You could delay this if desired
        reader.readAsBinaryString(oFile);
    }

</script>
<!--        todo:put order-->
<div class="row">
    <div class="col s12">
        <br>
        <input type="file" class="btn" id="my_file_input" />
       <?php
        echo form_open('bufferBOMController/BOMExcelData',array('class'=>''));
        ?>
        <input type="hidden" id="my_file_output" name="excelData" />
        <input type="submit" class="btn" />
        <?php
        echo form_close();
        ?>

        <?php
        echo form_open("bufferBOMController/moveToBOM");
        ?>
        <input type="submit" class="btn right" name="placeallorder" value="Move to BOM"/>
        <?php
        echo form_close();
        ?>
        <br><br>
        <ul class="order-items collapsible" data-collapsible="accordion">
            <li>
                <div class="collapsible-header bom grey">
                    <div class="row">
                        <div class="col s1">
                            Projectid
                        </div>
                        <div class="col s1">
                            ProjectName
                        </div>
                        <div class="col s1">
                            NorexID
                        </div>
                        <div class="col s1">
                            Description
                        </div>
                        <div class="col s1">
                            AstroNo
                        </div>
                        <div class="col s1">
                            KeymarkDie
                        </div>
                        <div class="col s2">
                            Color
                        </div>
                        <div class="col s1">
                            Qty
                        </div>
                        <div class="col s1">
                            Weight(xfeet)
                        </div>
                        <div class="col s1">
                            OrderLength
                        </div>
                        <div class="col s1">
                            TotalLbs
                        </div>
                    </div>
                </div>

            </li>
        </ul>
        <div id="buffer-bom-tuples"></div>
    </div>
    <!--        todo:show ordered-->
</div>
<!--begin:singleorder modal body-->
<!--end:singleorder modal body-->

<!--  place order-->
<?php //echo json_encode($bufferBOMData);?>

<div id="base_url" class="hiddendiv"><?php echo base_url();?></div>
<div id="bufferBOMData" class="hiddendiv"><?php echo json_encode($bufferBOMData);?></div>
<!--loading handlebar template function-->
<script src="<?php echo base_url();?>application/js/order-module-template.js"></script>
<!--initial loading of page-->
<script>
    var base_url = '<?php echo base_url();?>';
    var allData = JSON.parse('{"server":"",' +
        '"ChangeBufferBOM":"bufferBOMController/ChangeBufferBOM",' +
        '"deleteBufferBOM":"bufferBOMController/deleteBufferBOM"}');
    console.log(allData);
    allData.server=base_url;
    allData.bufferBOMData=JSON.parse($('#bufferBOMData').html());
    var bufferOrdertemplate = Handlebars.templates['bufferBOM'](allData);
    $('#buffer-bom-tuples').html(bufferOrdertemplate);

</script>
<script>
    function filter(jsonObj, query) {
        for(var key in query) {
            jsonObj = jsonObj.filter(function (value) {
                if(value.hasOwnProperty(key) && value[key] === query[key])
                    return true;
                return false;
            });
        }
        return jsonObj;
    }

    // Create a copy of allData
    var filteredData = JSON.parse(JSON.stringify(allData));
    filteredData["bufferBOMData"] = filter(filteredData["bufferBOMData"], { "NorexID": "11222", "Qty": "264" } );

    var filteredBufferOrdertemplate = Handlebars.templates['bufferBOM'](filteredData);
    $('#buffer-bom-tuples').html(filteredBufferOrdertemplate);

    console.log(JSON.stringify(filteredData));
</script>

</body>
</html>


