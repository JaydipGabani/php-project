<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 03-01-2017
 * Time: 23:30
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
                        <div class="col s1">
                            Color
                        </div>
                        <div class="col s1">
                            Qty
                        </div>
                        <div class="col s1">
                            RQty
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
        <div id="BOM-tuples"></div>
    </div>
    <!--        todo:show ordered-->

</div>
<!--  place order-->
<div id="base_url" class="hiddendiv"><?php echo base_url();?></div>
<div id="bomData" class="hiddendiv"><?php echo json_encode($bomData);?></div>
<!--loading handlebar template function-->
<script src="<?php echo base_url();?>application/js/order-module-template.js"></script>
<!--initial loading of page-->
<script>
    var base_url = '<?php echo base_url();?>';
    var allData = JSON.parse('{"server":"",' +
        '"BomAllocate":"orderController/deleteBom",' +
        '"PlaceOrder":"orderController/PlaceOrder"}');
    allData.server=base_url;
    allData.bomdata=JSON.parse($('#bomData').html());
    console.log(allData);
    var BOMtemplate = Handlebars.templates['allBOMtemplate'](allData);
//    console.log(BOMtemplate);
    $('#BOM-tuples').html(BOMtemplate);

</script>
<!--search functions-->
<script>

//    console.log($('.RQty').html());
   // if($('.RQty').html()=='0'){
     //   $('.collapsible-header').css("background-color","red");
   // }

</script>
<script src="<?php echo base_url();?>application/js/searchFunctions.js"></script>

</body>
</html>


