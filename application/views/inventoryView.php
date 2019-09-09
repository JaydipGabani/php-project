<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 28-10-2016
 * Time: 19:36
 */
?>
<div class="inventory-tab row">
    <div class="col s12">
        <ul class="tabs teal lighten-2">
            <li class="tab col s4"><a href="#inventory-search">Search</a></li>
            <li class="tab col s4"><a href="#inventory-add">Add item</a></li>
        </ul>
    </div>
<!--Start:tab 1-->
    <div id="inventory-search" class="col s12">
        <?php
        echo form_open('storageController/formFunction',array('class'=>'inventory-item-search'));
        ?>
        <div class="row">
            <div class="input-field col s4">
                <input type="text" name="norexId" class="validate">
                <label for="first_name">Norex ID</label>
            </div>
            <div class="col s1"></div>
            <div class="col s2">
                <input type="submit" name="submit" value="Search" class="btn"/>
            </div>
            <div class="col s2">
                <input type="submit" name="submit" value="Display" class="btn"/>
            </div>
        </div>
        <?php
        echo form_close();
        ?>


        <ul class="inventory-item-title collection">
            <li class="row collection-item">
                <div class="col s1">
                    RQty
                </div>
                <div class="col s1">
                NorexId
                </div>
                <div class="col s1">
                ProjectId
                </div>
                <div class="col s2">
                    Color
                </div>
                <div class="col s1">
                    Site
                </div>
                <div class="col s2">
                    LocOnSite
                </div>
                <div class="col s1">
                    Qty
                </div>
            </li>
        </ul>
        <?php
          //echo json_encode($displayData);
        ?>
<!--    begin:form for checklist-->
        <?php
        echo form_open('storageController/formFunction',array('id'=>''));
        ?>
        <div id="check-list-delete"></div>
        <input type="hidden" name="checkbox-items" class="validate" id="checkbox-items-array"/>
        <input type="submit" name="submit" value="Delete" class="btn"/>
        <input type="submit" name="submit" value="toInStock" class="btn"/>
<!-- end:form for checklist-->
        <?php
        echo form_close();
        ?>
    </div>
<!--    end: tab1-->
<!--    start: tab2-->
    <div id="inventory-add" class="col s12">
        <h5>Add item:</h5>
        <?php
        echo form_open('StorageController/formFunction',array('class'=>'inventory-item-add'));
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
                <select name="site" required>
                    <option value="1">Location 1</option>
                    <option value="2">Location 2</option>
                </select>
                <label>Site</label>
            </div>
            <div class="input-field col s2">
                <input type="text" name="locationOnSite" class="validate" required>
                <label for="first_name">Location on site</label>
            </div>
            <div class="input-field col s2">
                <input type="number" name="Qty" class="validate" required>
                <label for="first_name">Qty</label>
            </div><div class="input-field col s2">
                <input type="number" name="projid" class="validate" required>
                <label for="first_name">Project Id</label>
            </div>
            <input type="submit" name="submit" value="Add" class="btn col s2"/>
        </div>
        <?php
        echo form_close();
        ?>

    </div>
<!--    end:tab2-->

</div>
<div id="base_url" class="hiddendiv"><?php echo base_url();?></div>




<!--loading handlebar template function-->
<script src="<?php echo base_url();?>application/js/order-module-template.js"></script>
<!--initial loading of page-->
<script>
    var base_url = '<?php echo base_url();?>';
    var displayData = JSON.parse('{}');
    displayData.inventoryDisplay = <?php echo json_encode($displayData);?>;
    displayData.server=base_url;
    console.log(displayData);
    var inventoryTemplate = Handlebars.templates['inventoryModuletemplate'](displayData);
    $('#check-list-delete').html(inventoryTemplate);
</script>
<!--search functions-->
<!--<script src="--><?php //echo base_url();?><!--application/js/searchFunctions.js"></script>-->

<script type="text/javascript">
    var checkedTuples=[];
    function selectCheckbox(){
        checkedTuples=[];
        $("input:checkbox[name=checkboxstoSelect]:checked").each(function(){
            checkedTuples.push($(this).val());
        });
        console.log(checkedTuples);
        $('#checkbox-items-array').val(checkedTuples);
    }
</script>

</body>
</html>
