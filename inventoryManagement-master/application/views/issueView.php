<label for="S1">Barcode</label>
<input id="S1" class="bcode" type="text" name="S1" autofocus/>

<?php
echo form_open('issueController/updateWentForCutting');
?>
<input type="hidden" id="barcodevalues" name="barcodevalues">
<input type="submit" class="btn" value="submit">
<?php
echo form_close();
?>
<br>
<div id="barcode-chips">

</div>

<script>
    $(function () {
        if (<?php echo $issued == '' ? 0 : 1;?>) {
            Materialize.toast('<?php echo $issued;?>', 4000);
        }
    });
    var barcodevalues = [];

    $('#S1').keypress(function (e) {
        if (e.which == 13) // Enter key = keycode 13
        {
            if (!$(this).val() == "") {
                barcodevalues.push($(this).val());
            }
            $('#barcodevalues').val(barcodevalues);
            $(this).val("");
            $('#barcode-chips').html("");
            barcodevalues.forEach(function (item, index) {
                $('#barcode-chips').append("<button class='chip btn' onclick=getindexfun('" + index + "')>" + item + "</button><br>")
            });
        }
    });
    function getindexfun(i) {
        barcodevalues.splice(i, 1);
        $('#barcodevalues').val(barcodevalues);
        $('#barcode-chips').html("");
        barcodevalues.forEach(function (item, index) {
            $('#barcode-chips').append("<button class='chip btn' onclick=getindexfun('" + index + "')>" + item + "</button><br>")
        });
    }

</script>
</body>
