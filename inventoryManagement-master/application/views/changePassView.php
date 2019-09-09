<div class="row custom-container card">
    <?php
    echo form_open('changePass/changePassword',array('class'=>'col s12'));
    ?>
    <div class="row">
		<div class="input-field col s12">
			 <h4>Change Password:</h4>
		</div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input type="text" name="opass" class="validate" required pattern=".{6,10}">
            <label>Old Password</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input type="text" name="pass" class="validate" required pattern=".{6,10}">
            <label>New Password</label>
        </div>
    </div>
    <div class="row center">
        <div class="input-field col s12">
            <input type="hidden" name="uname" value="<?php echo $uname?>">
            <input type="submit" class="btn" name="submit" value="submit">
        </div>
    </div>
    <?php
    echo form_close();
    ?>
</div>

</body>
</html>
