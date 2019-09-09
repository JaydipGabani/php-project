<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 17-02-2017
 * Time: 00:37
 */
?>

<div class="row" style="margin-bottom: 0">
    <div class="input-field col s1">
        <input type="date" value="" class="datepicker" id="Date">
        <label for="Date">Date</label>
    </div>
    <div class="input-field col s1">
        <input type="number" value="" id="NorexID" class="validate" min="1">
        <label for="NorexID">NorexID</label>
    </div>
    <div class="input-field col s1">
        <input type="number" value="" id="Projectid" class="validate" min="1">
        <label for="Projectid">Projectid</label>
    </div>
    <div class="input-field col s1">
        <input type="text" value="" id="AstroDieNo">
        <label for="AstroDieNo">AstroDieNo</label>
    </div>
    <div class="input-field col s1">
        <input type="text" value="" id="KeymarkDieNo">
        <label for="KeymarkDieNo">KeymarkDieNo</label>
    </div>
    <div class="input-field col s1">
        <input type="text" value="" id="Finish">
        <label for="Finish">Finish</label>
    </div>
    <div class="input-field col s1">
        <input type="number" value="" id="PO" min="1" class="validate">
        <label for="PO">PO</label>
    </div>
    <div class="input-field col s1">
        <select id="Location">
            <option value="1" selected>Teterboro</option>
            <option value="2">Carlstadt</option>
        </select>
        <label for="Location">Location</label>
    </div>
    <div class="input-field col s1">
        <input type="text" value="" id="LocOnSite" class="validate"
               pattern="((T|C)-([A-I]([0-9]|10|11|OUT)-([0-9]|10|11|12|13|14|15)-[A-F]))|(NA)">
        <label for="LocOnSite">LocOnSite</label>
    </div>
    <div class="input-field col s1">
        <input type="text" value="" id="Tag_No">
        <label for="Tag_No">TagNo</label>
    </div>
    <div class="input-field col s1">
        <input type="number" value="" id="Barcode" class="validate" min="1">
        <label for="Barcode">Barcode</label>
    </div>
    <div class="input-field col s1">
        <select id="issued">
            <option value="0" selected>inventory</option>
            <option value="1">issued</option>
        </select>
        <label for="issued">Issued</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s1">
        <input type="checkbox" class="filled-in" id="Datec"/>
        <label for="Datec"></label>
    </div>
    <div class="input-field col s1">
        <input type="checkbox" class="filled-in" id="NorexIDc"/>
        <label for="NorexIDc"></label>
    </div>
    <div class="input-field col s1">
        <input type="checkbox" class="filled-in" id="Projectidc"/>
        <label for="Projectidc"></label>
    </div>
    <div class="input-field col s1">
        <input type="checkbox" class="filled-in" id="AstroDieNoc"/>
        <label for="AstroDieNoc"></label>
    </div>
    <div class="input-field col s1">
        <input type="checkbox" class="filled-in" id="KeymarkDieNoc"/>
        <label for="KeymarkDieNoc"></label>
    </div>
    <div class="input-field col s1">
        <input type="checkbox" class="filled-in" id="Finishc"/>
        <label for="Finishc"></label>
    </div>
    <div class="input-field col s1">
        <input type="checkbox" class="filled-in" id="POc"/>
        <label for="POc"></label>
    </div>
    <div class="input-field col s1">
        <input type="checkbox" class="filled-in" id="Locationc"/>
        <label for="Locationc"></label>
    </div>
    <div class="input-field col s1">
        <input type="checkbox" class="filled-in" id="LocOnSitec"/>
        <label for="LocOnSitec"></label>
    </div>
    <div class="input-field col s1">
        <input type="checkbox" class="filled-in" id="Tag_Noc"/>
        <label for="Tag_Noc"></label>
    </div>
    <div class="input-field col s1">
        <input type="checkbox" class="filled-in" id="Barcodec"/>
        <label for="Barcodec"></label>
    </div>
    <div class="input-field col s1">
        <input type="checkbox" class="filled-in" id="issuedc"/>
        <label for="issuedc"></label>
    </div>
</div>

<div class="row">
    <div class="input-field col s3">
        <select id="asc-desc">
            <option value="ASC" selected>Ascending</option>
            <option value="DESC">Descending</option>
        </select>
    </div>
    <div class="input-field col s3">
        <select id="orderby">
            <option value="Barcode" selected>Barcode</option>
            <option value="NorexID">NorexID</option>
            <option value="ProjectID">ProjectID</option>
            <option value="AstroDieNo">AstroDieNo</option>
            <option value="KeymarkDieNo">KeymarkDieNo</option>
            <option value="Finish">Finish</option>
            <option value="PO">PO</option>
            <option value="LocOnSite">LocOnSite</option>
            <option value="Tag_No">TagNo</option>
        </select>
        <label for="orderby">Order By</label>
    </div>
    <div class="input-field col s3">

        <div id="fatchBtn" class="btn">Fetch</div>

    </div>
    <div class="input-field col s6">
        <?php
        echo form_open('recordController/printingTags', array('id' => 'printForm'));
        ?>
        <input type="hidden" name="dataForPrinting" id="dataForPrinting">
        <div id="printBtn" class="btn right">print</div>
        <?php
        echo form_close();
        ?>
    </div>

</div>

<ul id="ajax_table" class="card"></ul>
<div class="container center">
    <button class="btn" id="load_more" data-val="0">
        Load more..
    </button>
</div>
<script>
    $(document).ready(function () {
        var fatchDataForDisplay = {
            'date': '',
            'NorexID': '',
            'AstroDieNo': '',
            'Projectid': '',
            'KeymarkDieNo': '',
            'Finish': '',
            'PO': '',
            'Location': '',
            'LocOnSite': '',
            'Tag_No': '',
            'Barcode': '',
            'issued': '',
            'orderby': 'Barcode',
            'ascDesc': 'ASC'
        };

        var inventoryCheckBoxes = [];
        $(document).on('change', '.inventoryCheckbox', function () {
            if (this.checked) {
                inventoryCheckBoxes.push($(this).attr('data-barcode'));
            } else {
                var ind = inventoryCheckBoxes.indexOf($(this).attr('data-barcode'));
                if (ind > -1) {
                    inventoryCheckBoxes.splice(ind, 1);
                }
            }
            console.log(inventoryCheckBoxes);
        });


        $('#printBtn').click(function () {
            $('#dataForPrinting').val(inventoryCheckBoxes);
            $('#printForm').submit();

        });

        $('#Datec').change(function () {
            if (this.checked) {
                fatchDataForDisplay.date = $('#Date').val();
            } else {
                fatchDataForDisplay['date'] = "";
            }
            console.log(fatchDataForDisplay);
        });
        $('#NorexIDc').change(function () {
            if (this.checked) {
                fatchDataForDisplay.NorexID = $('#NorexID').val();
            } else {
                fatchDataForDisplay['NorexID'] = "";
            }
            console.log(fatchDataForDisplay);
        });
        $('#Projectidc').change(function () {
            if (this.checked) {
                fatchDataForDisplay.Projectid = ($('#Projectid').val());
            } else {
                fatchDataForDisplay['Projectid'] = "";
            }
            console.log(fatchDataForDisplay);
        });
        $('#AstroDieNoc').change(function () {
            if (this.checked) {
                fatchDataForDisplay.AstroDieNo = ($('#AstroDieNo').val());
            } else {
                fatchDataForDisplay['AstroDieNo'] = "";
            }
            console.log(fatchDataForDisplay);
        });
        $('#KeymarkDieNoc').change(function () {
            if (this.checked) {
                fatchDataForDisplay.KeymarkDieNo = ($('#KeymarkDieNo').val());
            } else {
                fatchDataForDisplay['KeymarkDieNo'] = "";
            }
            console.log(fatchDataForDisplay);
        });
        $('#Finishc').change(function () {
            if (this.checked) {
                fatchDataForDisplay.Finish = ($('#Finish').val());
            } else {
                fatchDataForDisplay['Finish'] = "";
            }
            console.log(fatchDataForDisplay);
        });
        $('#POc').change(function () {
            if (this.checked) {
                fatchDataForDisplay.PO = ($('#PO').val());
            } else {
                fatchDataForDisplay['PO'] = "";
            }
            console.log(fatchDataForDisplay);
        });
        $('#Locationc').change(function () {
            if (this.checked) {
                fatchDataForDisplay.Location = ($('#Location').val());
            } else {
                fatchDataForDisplay['Location'] = "";
            }
            console.log(fatchDataForDisplay);
        });
        $('#LocOnSitec').change(function () {
            if (this.checked) {
                fatchDataForDisplay.LocOnSite = ($('#LocOnSite').val());
            } else {
                fatchDataForDisplay['LocOnSite'] = "";
            }
            console.log(fatchDataForDisplay);
        });
        $('#Tag_Noc').change(function () {
            if (this.checked) {
                fatchDataForDisplay.Tag_No = ($('#Tag_No').val());
            } else {
                fatchDataForDisplay['Tag_No'] = "";
            }
            console.log(fatchDataForDisplay);
        });
        $('#Barcodec').change(function () {
            if (this.checked) {
                fatchDataForDisplay.Barcode = ($('#Barcode').val());
            } else {
                fatchDataForDisplay['Barcode'] = "";
            }
            console.log(fatchDataForDisplay);
        });
        $('#issuedc').change(function () {
            if (this.checked) {
                fatchDataForDisplay.issued = ($('#issued').val());
            } else {
                fatchDataForDisplay['issued'] = "";
            }
            console.log(fatchDataForDisplay);
        });
        var getcountry = function (page, fatch) {
            $("#loader").show();
            $.ajax({
                data: {
                    page: page,
                    date: fatchDataForDisplay.date,
                    NorexID: fatchDataForDisplay.NorexID,
                    AstroDieNo: fatchDataForDisplay.AstroDieNo,
                    Projectid: fatchDataForDisplay.Projectid,
                    KeymarkDieNo: fatchDataForDisplay.KeymarkDieNo,
                    Finish: fatchDataForDisplay.Finish,
                    PO: fatchDataForDisplay.PO,
                    Location: fatchDataForDisplay.Location,
                    LocOnSite: fatchDataForDisplay.LocOnSite,
                    Tag_No: fatchDataForDisplay.Tag_No,
                    Barcode: fatchDataForDisplay.Barcode,
                    issued: fatchDataForDisplay.issued,
                    orderby: fatchDataForDisplay.orderby,
                    ascDesc: fatchDataForDisplay.ascDesc
                },
                url: "<?php echo base_url() ?>recordController/getCountry",
                type: 'POST'
            }).done(function (response) {
                $("#ajax_table").append(response);
                $("#loader").hide();
                $('#load_more').data('val', ($('#load_more').data('val') + 1));
            });
        };
        getcountry(0, fatchDataForDisplay);

        $('#fatchBtn').click(function (e) {
            e.preventDefault();
            fatchDataForDisplay.orderby = $('#orderby').val();
            fatchDataForDisplay.ascDesc = $('#asc-desc').val();

            $('#ajax_table').html("");
            var page = $("#load_more").data('val', 0);
            getcountry(0, fatchDataForDisplay);
        });


        $("#load_more").click(function (e) {
            e.preventDefault();
            var page = $(this).data('val');
            getcountry(page, fatchDataForDisplay);

        });

    });

</script>
</body>
</html>
