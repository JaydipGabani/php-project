<?php
/**
 * Created by PhpStorm.
 * User: HIT
 * Date: 2/15/2017
 * Time: 9:48 PM
 */
?>
<div class="row">
    <div class="input-field col s4">
        <?php
            echo form_open('storageController');
        ?>
        <input type="text" id="ponumber"> 
        <label for="ponumber">
            Enter PO
        </label>
        <input type="submit" class="btn">
        <?php
            echo form_close();
        ?>
    </div>
    <div class="input-field col s4">

    </div>
    <div class="input-field col s4">

    </div>
</div>

</body>
</html>
