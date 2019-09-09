<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 06-01-2017
 * Time: 00:08
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
        <div class="row">
            <?php
            echo form_open("orderController/placeAllOrder");
            ?>
            <div class="input-field col s3">
                <input id="POnum" type="number" name="POnum"/>
                <label for="POnum">PO Number</label>
            </div>
            <div class="input-field col s6">
                <p class="left">
                    <input type="radio" id="SelectExtruder:" disabled checked />
                    <label for="SelectExtruder:">Select Extruder:&nbsp;&nbsp;</label>
                </p>
                <p class="left">
                    <input class="with-gap" name="extruder" type="radio" id="astro" value="astro" />
                    <label for="astro">Astro Die</label>
                </p>
                <p class="left">
                    <input class="with-gap" name="extruder" type="radio" id="keymark" value="keymark" />
                    <label for="keymark">Keymark Die</label>
                </p>
                <p class="left">
                    <input class="with-gap" name="extruder" type="radio" id="easco" value="easco" />
                    <label for="easco">Easco Die</label>
                </p>
                <p class="left">
                    <input class="with-gap" name="extruder" type="radio" id="northern" value="northern" />
                    <label for="northern">Northern</label>
                </p>
            </div>
            <div class="col s3">
                <div class="row">
                    <div class="col s12">
                        <input type="hidden" id="checkedOrderList" name="checkedOrderList" value=""/>
                        <input type="submit" class="btn" name="placeCheckedOrder" value="placeCheckedOrder"/>
                    </div>
                    <div class="col s12">
                        <br>
                        <div class="btn" id="placeOrderTrigger">Add order</div>
                    </div>
                </div>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
        <ul class="order-items collapsible" data-collapsible="accordion">
            <li>
                <div class="collapsible-header bom grey" id="buffer-order-title">
                    <div class="row">
                        <div class="col s-half">
                            <input type="checkbox" id="checkbox-title" class="filled-in" onclick="selectAllCheckbox()" />
                            <label for="checkbox-title"></label>
                        </div>
                        <div class="col s-75">
                            Project ID
                        </div>
                        <div class="col s1">
                            Project Name
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
                        <div class="col s1">
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
<!--begin:singleorder modal body-->
<div class="place-order-footer card">

    <!-- The Modal -->
    <div id="placeOrder" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span id="closePlaceOrder" class="close">&times</span>
                <h5>Place Order</h5>
            </div>
            <div class="modal-body">
                <?php
                    echo form_open("bufferOrderController/placeSingleOrder");
                ?>
                    <div class="row">
                        <div class="input-field col s1">
                            <input type="text" name="NorexId" class="validate" id="orderNorex" required>
                            <label for="first_name">Norex ID</label>
                        </div>
                        <div class="input-field col s2">
                            <input type="text" name="Finish" class="validate" id="orderColor" required>
                            <label>Color</label>
                        </div>
                        <div class="input-field col s1">
                            <input type="number" name="Projectid" class="validate" id="orderProject" required>
                            <label>ProjectId</label>
                        </div>
                        <div class="input-field col s1">
                            <input type="number" name="Qty" class="validate" id="orderQty" required>
                            <label for="orderQty">Qty</label>
                        </div>
                        <div id="weight" class="input-field col s1">
                            <input type="number" name="WeightxFeet" class="validate" id="orderWeight" required>
                            <label for="orderWeight">WeightxFeet</label>
                        </div>
                        <div id="orderLength" class="input-field col s1">
                            <input type="number" name="OrderLength" class="validate" id="orderlength" required>
                            <label for="orderlength">OrderLength</label>
                        </div>
                        <div class="input-field col s1">
                            <input type="hidden" name="totallbs" class="validate" id="totallbs">
                            <label for="totallbs" id="totallbslabel">totalLbs</label>
                        </div>
                        <div class="input-field col s1">
                            <div class="btn" id="refreshLbsAddOrder">R</div>
                        </div>
                        <div class="input-field col s1">
                            <input type="submit" name="submit" value="Add order" class="btn"/>
                        </div>
                    </div>
                <?php
                    echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>
<!--end:singleorder modal body-->

<!--  place order-->
<?php //echo json_encode($pendingData);?>

<div id="base_url" class="hiddendiv"><?php echo base_url();?></div>
<div id="pendingData" class="hiddendiv"><?php echo json_encode($pendingData);?></div>
<!--loading handlebar template function-->
<script src="<?php echo base_url();?>application/js/order-module-template.js"></script>
<!--initial loading of page-->
<script>
    var base_url = '<?php echo base_url();?>';
    var allData = JSON.parse('{"server":"",' +
        '"BomAllocate":"bufferOrderController/placeAllOrder",' +
        '"ChangeOrder":"bufferOrderController/ChangeOrder",' +
        '"deleteOrder":"bufferOrderController/deleteOrder"}');

    allData.server=base_url;
    allData.orderdata=JSON.parse($('#pendingData').html());
    console.log(allData);
    var bufferOrdertemplate = Handlebars.templates['bufferOrder'](allData);
    $('#buffer-order-tuples').html(bufferOrdertemplate);

</script>
<!--checkboxes-->
<script type="text/javascript">
    var checkedTuples=[];
    $('.validateQty').blur(function () {
        console.log();
            if($(this).attr('data-Qty')<$(this).val()){

                Materialize.toast('Cannot put Order Qty more then Qty', 4000);
                $(this).focus();
            }
        });
    function selectCheckbox(){
        checkedTuples = [];
        $("input:checkbox[name=bufferOrderCheckbox]:checked").each(function () {
            checkedTuples.push($(this).val() + '|' + $('#extruder-value' + $(this).val()).val());
        });
        console.log(checkedTuples);
        $('#checkedOrderList').val(checkedTuples);
    }
    function selectAllCheckbox() {
        checkedTuples=[];
        var bufferOrderCheckbox=$('input:checkbox[name=bufferOrderCheckbox]');
        if($("input:checkbox[id=checkbox-title]").is(':checked')){
            bufferOrderCheckbox.prop('checked',true);
        }else{
            bufferOrderCheckbox.prop('checked',false);
        }
        $("input:checkbox[name=bufferOrderCheckbox]:checked").each(function(){
            checkedTuples.push($(this).val()+'|'+$('#extruder-value'+$(this).val()).val());
        });
        console.log(checkedTuples);
        $('#checkedOrderList').val(checkedTuples);
    }
</script>
<!--search functions-->
<script src="<?php echo base_url();?>application/js/searchFunctions.js"></script>

</body>
</html>


