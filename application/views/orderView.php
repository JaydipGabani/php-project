<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 14-11-2016
 * Time: 19:03
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
     <div class="col s4">
         <input type="file" class="btn" id="my_file_input" />
         <?php
         echo form_open('orderController/BOMExcelData',array('class'=>''));
         ?>
         <input type="hidden" id="my_file_output" name="excelData" />
         <input type="submit" class="btn" />
         <?php
         echo form_close();
         ?>

         <div class="card bom center">
             BOM
         </div>
         <div class="row">
             <select class="col s2" id="bom-option">
                 <option value="Projectid">ProjectId</option>
                 <option value="NorexID">NorexId</option>
                 <option value="AstroDieNo">AstroNo</option>
                 <option value="Qty">Qty</option>
                 <option value="Color">Color</option>
             </select>
             <input type="text" class="col s7" id="bom-search-val">
             <button onclick="searchbom()" class="btn col s3">search</button>
         </div>
         <ul class="order-items collapsible" data-collapsible="accordion">
             <li>
                 <div class="collapsible-header bom">
                     <div class="row">
                         <div class="col s2">
                             Projectid
                         </div>
                         <div class="col s2">
                             NorexID
                         </div>
                         <div class="col s2">
                             AstroNo
                         </div>
                         <div class="col s2">
                             Qty
                         </div>
                         <div class="col s2">
                             Color
                         </div>
                     </div>
                 </div>

             </li>
         </ul>
         <div id="BOM-tuples"></div>
     </div>
     <!--        todo:show ordered-->
     <div class="col s4">
         <div class="card order center">
             Show Ordered
         </div>
         <div class="row">
             <select class="col s2" id="order-list-option">
                 <option value="NorexID">NorexId</option>
                 <option value="Color">Color</option>
                 <option value="Projectid">ProjectId</option>
                 <option value="Qty">Qty</option>
             </select>
             <input type="text" class="col s7" id="order-list-search-val">
             <button onclick="searchorder()" class="btn col s3">search</button>
         </div>
         <ul class="order-items collapsible" data-collapsible="accordion">
             <li>
                 <div class="collapsible-header order">
                     <div class="row">
                         <div class="col s2">
                             NorexId
                         </div>
                         <div class="col s2">
                             Color
                         </div>
                         <div class="col s2">
                             ProjId
                         </div>
                         <div class="col s2">
                             Qty
                         </div>
                     </div>
                 </div>

             </li>
         </ul>
         <div id="order-list"></div>
     </div>
     <!--        todo:instock-->
     <div class="col s4">
         <div class="card instock center">
             In Stock
         </div>
         <div class="row">
             <select class="col s2" id="instock-option">
                 <option value="NorexID">NorexId</option>
                 <option value="Color">Color</option>
                 <option value="Site">Site</option>
                 <option value="LocOnSite">Loction</option>
                 <option value="Qty">Qty</option>
             </select>
             <input type="text" class="col s7" id="instock-search-val">
             <button onclick="searchinstock()" class="btn col s3">search</button>
         </div>
         <ul class="order-items collapsible" data-collapsible="accordion">
             <li>
                 <div class="collapsible-header instock">
                     <div class="row">
                         <div class="col s2">
                             NorexId
                         </div>
                         <div class="col s2">
                             Color
                         </div>
                         <div class="col s2">
                             Site
                         </div>
                         <div class="col s2">
                             Location
                         </div>
                         <div class="col s2">
                             Qty
                         </div>

                     </div>
                 </div>
             </li>
         </ul>
         <div id="Instock"></div>
     </div>
 </div>
 <!--  place order-->


<div class="place-order-footer card">
    <button id="myBtn" class="btn">Place Order</button>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times</span>
                <h5>Place Order</h5>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('orderController/Order',array('class'=>''));
                ?>
                <div class="row">
                    <div class="input-field col s2">
                        <input type="text" name="norexId" class="validate" required>
                        <label for="first_name">Norex ID</label>
                    </div>
                    <div class="input-field col s2">
                        <input type="text" name="color" class="validate" required>
                        <label>Color</label>
                    </div>
                    <div class="input-field col s2">
                        <input type="number" name="pid" class="validate" required>
                        <label>ProjectId</label>
                    </div>
                    <div class="input-field col s2">
                        <input type="number" name="Qty" class="validate" required>
                        <label for="first_name">Qty</label>
                    </div>
                    <input type="submit" name="submit" value="place-order" class="btn col s2"/>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>

    </div>

</div>
<!--end:placeorder-->
<div id="base_url" class="hiddendiv"><?php echo base_url();?></div>
<!--loading handlebar template function-->
<script src="<?php echo base_url();?>application/js/order-module-template.js"></script>
<!--initial loading of page-->
<script>
    var base_url = '<?php echo base_url();?>';
    var allData = JSON.parse('{"server":"",' +
        '"BomDelete":"orderController/deleteBom",' +
        '"orderToStock":"orderController/OrdertoStock",' +
        '"InStock":"orderController/allocate",' +
        '"bomdata":<?php echo json_encode($bomData);?>,'+
        '"orderdata":<?php echo json_encode($orderData);?>,'+
        '"instockdata":<?php echo json_encode($instockData);?>}');
    console.log(allData);
    allData.server=base_url;
    var BOMtemplate = Handlebars.templates['OrderModuleBOM'](allData);
    var OrderListtemplate = Handlebars.templates['OrderModuleOrderlist'](allData);
    var InStocktemplate = Handlebars.templates['OrderModuleInstock'](allData);
    $('#BOM-tuples').html(BOMtemplate);
    $('#order-list').html(OrderListtemplate);
    $('#Instock').html(InStocktemplate);

</script>
<!--search functions-->
<script src="<?php echo base_url();?>application/js/searchFunctions.js"></script>

</body>
</html>


