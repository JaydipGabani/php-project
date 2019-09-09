<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 07-01-2017
 * Time: 12:59
 */
?>
<!--        todo:put order-->
<div class="row">
    <div class="col s12">
        <div class="row">
            <select class="col s1" id="bom-option">
                <option value="Projectid">ProjectId</option>
                <option value="NorexID">NorexId</option>
                <option value="AstroDieNo">AstroNo</option>
                <option value="Qty">Qty</option>
                <option value="Color">Color</option>
            </select>
            <input type="text" class="col s2" id="bom-search-val">
            <button onclick="searchbom()" class="btn">search</button>
        </div>

        <?php
        echo form_open("orderController/placeAllOrder");
        ?>
        <input type="submit" class="btn right" name="placeallorder" value="place All Order"/>
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
        <div id="buffer-order-tuples"></div>
    </div>
    <!--        todo:show ordered-->

</div>
<!--  place order-->
<?php //echo json_encode($BufferbomData);?>

<div id="base_url" class="hiddendiv"><?php echo base_url();?></div>
<!--loading handlebar template function-->
<script src="<?php echo base_url();?>application/js/order-module-template.js"></script>
<!--initial loading of page-->
<script>
    var base_url = '<?php echo base_url();?>';
    var allData = JSON.parse('{"server":"",' +
        '"BomAllocate":"orderController/allAllocate",' +
        '"ChangeOrder":"orderController/ChanageOrder",' +
        '"deleteOrder":"orderController/deleteOrder",' +
        '"orderdata":<?php echo json_encode($PlacedOrderData);?>}');
    console.log(allData);
    allData.server=base_url;
    var bufferOrdertemplate = Handlebars.templates['bufferOrder'](allData);
    $('#buffer-order-tuples').html(bufferOrdertemplate);

</script>
<!--search functions-->
<script src="<?php echo base_url();?>application/js/searchFunctions.js"></script>

</body>
</html>