<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 29-10-2016
 * Time: 01:16
 * can u do virtual function inheritance??
 */
?>
<div class="admin-tab row">
    <div class="col s12">
        <ul class="tabs teal lighten-2">
            <li class="tab col s4"><a class="active" href="#admin-add-norex">Add norex</a></li>
            <li class="tab col s4"><a href="#admin-update-delete">Update/delete norex</a></li>
            <?php echo $role == 'admin' ? '<li class="tab col s4"><a href="#admin-user">User</a></li>' : '' ?>
        </ul>
    </div>
    <!--Start:tab 3-->
    <div id="admin-user" class="col s12" style="<?php echo $role == 'engineering' ? 'display:none' : '' ?>">
        <?php echo $AddUserError; ?>
        <div class="row container">
            <?php
            echo form_open('adminController/AddUser', array('class' => 'col s6'));
            ?>
            <div class="input-field">
                <input type="text" name="name" class="validate" required>
                <label for="first_name">Name</label>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" name="userName" class="validate" maxlength="10" required>
                    <label for="first_name">Username</label>
                </div>
                <div class="input-field col s6">
                    <select name="role" required>
                        <option value="0" disabled selected>Choose Role</option>
                        <option value="1">admin</option>
                        <option value="2">Warehouse</option>
                        <option value="3">Purchasing</option>
                        <option value="4">Engineering</option>
                    </select>
                    <label for="first_name">Role</label>
                </div>
            </div>
            <div class="input-field">
                Default Password: 123456
            </div>
            <div class="input-field">
                <input type="submit" value="Add" class="btn">
            </div>

            <?php
            echo form_close();
            ?>
            <div class="col s6">
                <div class="admin-list-user">
                    <ul class="collection">
                        <?php foreach ($UserList as $obj) { ?>

                            <li class="collection-item avatar">
                                <?php
                                echo form_open('adminController/DeleteUser', array('class' => 'col s6'));
                                ?>
                                <span class="title"><?php echo $obj->name; ?></span>
                                <p>
                                    U:<?php echo $obj->uname; ?>
                                </p>
                                <div class="secondary-content">
                                    <?php
                                        if($obj->role == 1){
                                            echo 'Admin';
                                        }elseif($obj->role == 2){
                                            echo 'Warehouse';
                                        }elseif($obj->role == 3){
                                            echo 'Purchasing';
                                        }elseif($obj->role == 4){
                                            echo 'Engineering';
                                        }
                                    ?>
                                    <input type="hidden" name="uname" value="<?php echo $obj->uname; ?>">
                                    <input type="submit" class="btn" value="d">
                                </div>
                                <?php
                                echo form_close();
                                ?>
                            </li>

                        <?php } ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!--    end: tab3-->
    <!--    start: tab1-->
    <div id="admin-add-norex" class="col s12">
        <?php echo $AddNorexError ?>
        <?php
        echo form_open('adminController/addNorex', array('enctype' => 'multipart/form-data'))
        ?>
        <div class="row container">
            <div class="col s4">
                <div class="col s10 input-field">
                    <input type="number" name="NOREX" class="validate" required min="1000">
                    <label for="first_name">NorexId</label>
                </div>
            </div>
            <div class="col s4">
                <div class="col s10 input-field">
                    <input type="number" name="ASTRO" class="validate" required min="0">
                    <label for="first_name">AstroDieNo</label>
                </div>
            </div>
            <div class="col s4">
                <div class="col s10 input-field">
                    <input type="text" name="WINSYS" class="validate">
                    <label for="first_name">WINSYS</label>
                </div>
            </div>
        </div>
        <div class="row container">
            <div class="col s4">
                <div class="col s10 input-field">
                    <input type="text" name="KEYMARK" class="validate" required pattern="[A-Z]-[0-9][0-9][0-9][0-9][0-9]|null">
                    <label for="first_name">KEYMARK</label>
                </div>
            </div>
            <div class="col s4">
                <div class="col s10 input-field">
                    <select id="Location" required name="LOCATION">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="1">Teterboro</option>
                        <option value="2">Carlstadt</option>
                    </select>
                    <label for="Location">LOCATION</label>
                </div>
            </div>
            <div class="col s4">
                <div class="col s10 input-field">
                    <input type="text" name="DESCRIPTION" class="validate" required>
                    <label for="first_name">DESCRIPTION</label>
                </div>
            </div>
        </div>
        <div class="row container">
            <div class="col s4">
                <div class="col s10 input-field">
                    <input type="text" name="LBFT" class="validate" required>
                    <label>LBFT</label>
                </div>
            </div>
            <div class="col s4">
                <div class="col s10 input-field">
                    <select class="validate" required name="SH">
                        <option value="S" selected>S</option>
                        <option value="H">H</option>
                    </select>
                    <label>SH</label>
                </div>
            </div>
            <div class="col s4">
                <div class="col s10 input-field">
                    <input type="text" name="CAVITY" class="validate" value="NA" required>
                    <label>CAVITY</label>
                </div>
            </div>
        </div>
        <div class="row container">
            <div class="col s4">
                <div class="col s10 input-field">
                    <input type="text" name="EASCO" class="validate">
                    <label>EASCO</label>
                </div>
            </div>
            <div class="col s4">
                <div class="col s10 input-field">
                    <input type="text" name="MODEL" class="validate" required>
                    <label>MODEL</label>
                </div>
            </div>
            <div class="col s4 center">
                <div class="file-field input-field btn">
                    <span>Image</span>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 center">
                <input type="submit" class="btn" value="Add" name="submit">
            </div>
        </div>
        <?php
        echo form_close();
        ?>
    </div>
    <!--    end:tab1-->
    <!--    start: tab2-->
    <div id="admin-update-delete" class="col s12">
        <?php echo $UpdateNorex ?>
        <div class="row">
            <div class="col s8">
                <div class="row">
                    <div class="col s4">
                        <div class="row">
                            <?php
                            echo form_open('adminController/Search', array('class' => 'admin-fatch-norex'));
                            ?>
                            <div class="input-field col s12">
                                <input type="number" name="Norex" class="validate" required>
                                <label for="first_name">Norex ID</label>
                            </div>
                            <div class="input-field col s12">
                                <select name="Location" required>
                                    <option value="1" selected>Teterboro</option>
                                    <option value="2">Carlstadt</option>
                                </select>
                                <label for="first_name">Location</label>
                            </div>
                            <div class="input-field col s2">
                                <input type="submit" name="submit" class="btn"/>
                            </div>
                            <?php
                            echo form_close();
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s4">
                        noerx:<?php echo isset($itemDisplay[0]->NOREX) == 1 ? ($itemDisplay[0]->NOREX) : (""); ?>
                        <br>Astro:<?php echo isset($itemDisplay[0]->ASTRO) == 1 ? ($itemDisplay[0]->ASTRO) : (""); ?>
                        <br>Winsys:<?php echo isset($itemDisplay[0]->WINSYS) == 1 ? ($itemDisplay[0]->WINSYS) : (""); ?>
                        <br>Keymark:<?php echo isset($itemDisplay[0]->KEYMARK) == 1 ? ($itemDisplay[0]->KEYMARK) : (""); ?>
                        <br>Description:<?php echo isset($itemDisplay[0]->DESCRIPTION) == 1 ? ($itemDisplay[0]->DESCRIPTION) : (""); ?>
                    </div>
                    <div class="col s4">
                        Location:<?php echo isset($itemDisplay[0]->LOCATION) == 1 ? ($itemDisplay[0]->LOCATION == 1 ? 'Teterboro' : 'Carlstadt') : (""); ?>
                        <br>Model:<?php echo isset($itemDisplay[0]->MODEL) ? ($itemDisplay[0]->MODEL) : (""); ?>
                        <br>LB/FT:<?php echo isset($itemDisplay[0]->LBFT) == 1 ? ($itemDisplay[0]->LBFT) : (""); ?>
                        <br>sh:<?php echo isset($itemDisplay[0]->SH) == 1 ? ($itemDisplay[0]->SH) : (""); ?>
                        <br>Cavity:<?php echo isset($itemDisplay[0]->CAVITY) == 1 ? ($itemDisplay[0]->CAVITY) : (""); ?>
                        <!--                         <br>Esco:--><?php //echo isset($itemDisplay[0]->Esco)==1?($itemDisplay[0]->CAVITY):("");?>
                    </div>
                    <div class="col s4 norexImg">
                        <?php
                        $img = isset($itemDisplay[0]->NOREX) == 1 ? ($itemDisplay[0]->LOCATION.'/'.$itemDisplay[0]->NOREX . '.jpg') : ("blank.jpg");
                        echo '<img src="' . base_url() . 'application/img/ExtrusionJPEG/' . $img . '" class="">';
                        ?>

                    </div>
                    <input type="submit" name="submit" value="Delete" disabled class="btn"/>

                </div>
            </div>
            <div class="col s4">
                <?php
                echo form_open('adminController/Update');
                ?>
                <div class="row">
                    <div class="col s12">
                        <div class="card center">
                            Norex Id:
                            <?php echo isset($itemDisplay[0]->NOREX) == 1 ? ($itemDisplay[0]->NOREX) : (""); ?>
                            Location:
                            <?php echo isset($itemDisplay[0]->LOCATION) == 1 ? ($itemDisplay[0]->LOCATION == 1 ? 'Teterboro' : 'Carlstadt') : (""); ?>
                            <input type="hidden" name="NOREX"
                                   value="<?php echo isset($itemDisplay[0]->NOREX) == 1 ? ($itemDisplay[0]->NOREX) : (""); ?>">
                            <input type="hidden" name="LOCATION"
                                   value="<?php echo isset($itemDisplay[0]->LOCATION) == 1 ? ($itemDisplay[0]->LOCATION) : (""); ?>">
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="input-field">
                            <input type="text" name="ASTRO" class="validate"
                                   value="<?php echo isset($itemDisplay[0]->ASTRO) == 1 ? ($itemDisplay[0]->ASTRO) : (""); ?>">
                            <label for="first_name">ASTRO</label>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="input-field">
                            <input type="text" name="WINSYS" class="validate"
                                   value="<?php echo isset($itemDisplay[0]->WINSYS) == 1 ? ($itemDisplay[0]->WINSYS) : (""); ?>">
                            <label for="first_name">WINSYS</label>
                        </div>
                    </div>

                    <div class="col s6">
                        <div class="input-field">
                            <input type="text" name="EASCO" class="validate"
                                   value="<?php echo isset($itemDisplay[0]->EASCO) == 1 ? ($itemDisplay[0]->EASCO) : (""); ?>">
                            <label>EASCO</label>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="input-field">
                            <input type="text" name="KEYMARK" class="validate" pattern="[A-Z]-[0-9][0-9][0-9][0-9][0-9]|null"
                                   value="<?php echo isset($itemDisplay[0]->KEYMARK) == 1 ? ($itemDisplay[0]->KEYMARK) : (""); ?>">
                            <label for="first_name">KEYMARK</label>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="input-field">
                            <input type="text" name="DESCRIPTION" class="validate"
                                   value="<?php echo isset($itemDisplay[0]->DESCRIPTION) == 1 ? ($itemDisplay[0]->DESCRIPTION) : (""); ?>">
                            <label for="first_name">DESCRIPTION</label>
                        </div>
                    </div>

                    <div class="col s6">
                        <div class="input-field">
                            <input type="text" name="MODEL" class="validate"
                                   value="<?php echo isset($itemDisplay[0]->MODEL) ? ($itemDisplay[0]->MODEL) : (""); ?>">
                            <label>MODEL</label>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="input-field">
                            <input type="text" name="LBFT" class="validate"
                                   value="<?php echo isset($itemDisplay[0]->LBFT) == 1 ? ($itemDisplay[0]->LBFT) : (""); ?>">
                            <label>LB/FT</label>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="input-field">
                            <input type="text" name="SH" class="validate"
                                   value="<?php echo isset($itemDisplay[0]->SH) == 1 ? ($itemDisplay[0]->SH) : (""); ?>">
                            <label>S/H</label>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="input-field">
                            <input type="text" name="CAVITY" class="validate"
                                   value="<?php echo isset($itemDisplay[0]->CAVITY) == 1 ? ($itemDisplay[0]->CAVITY) : (""); ?>">
                            <label>CAVITY</label>
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" value="Update" class="btn"/>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
        <!--    end:tab2-->
    </div>
</div>

</body>
</html>

