<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?php echo base_url();?>application/img/favicon.jpg">
    <link rel="stylesheet" href="<?php echo base_url();?>application/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>application/css/style.css">

    <script src="<?php echo base_url();?>application/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url();?>application/js/JsBarcode.all.min.js"></script>
    <script src="<?php echo base_url();?>application/js/handlebars.runtime.min.js"></script>
    <script src="<?php echo base_url();?>application/js/main.js"></script>
    </head>
<body class="">
<div class="not-printing-dim"> press ctrl + P for printing</div>
<?php
// foreach ($tags as $tag){
$tag=$tags[0];
echo json_encode($tags);
?>
<div class="container printing-dim">
    <br><br>
    <div class="row">
        <div class="col s3">
            <img class="top-logo" src="<?php echo base_url();?>application/img/nas-logo-vertical.png" alt="">
        </div>
        <div class="col s9 title">
            EXTRUSION INVENTORY TAG
        </div>
    </div>
    <hr>
    <table>
        <tr>
            <td>Date</td>
            <td class="values"><b>12/31/2016</b></td>
            <td>TagNo</td>
            <td class="values"><b><?php //echo $tag->Tag_No; ?>TagNo</b></td>
        </tr>
        <tr>
            <td>Location</td>
            <td class="values"><b><?php echo $tag->Loc; ?></b></td>
            <td>Barcode</td>
            <td rowspan="2"><img id="barcode<?php echo $tag->No; ?>" src=""/></td>
        </tr>
        <tr>
            <td># of Pcs.</td>
            <td class="values"><b><?php echo $tag->Qty; ?></b></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Length</td>
            <td class="values"><b><?php echo $tag->Size; ?></b></td>
            <td>NorexId</td>
            <td class="values"><b><?php echo $tag->Norex_Number; ?></b></td>
        </tr>
        <tr>
            <td>Color</td>
            <td class="values"><b><?php echo $tag->Color; ?></b></td>
            <td>Drawing</td>
            <td rowspan="4">
                <img src="<?php echo base_url();?>application/img/ExtrusionJPEG/<?php echo $tag->Norex_Number; ?>.JPG" height="auto" width="200px" alt="">
            </td>
        </tr>
        <tr>
            <td>Extruder</td>
            <td>Die No.</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>EASCO</td>
            <td><b><?php echo $tag->Easco_Die_; ?></b></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>KEYMARK</td>
            <td><b><?php echo $tag->Keymark_Die_; ?></b></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>ASTRO</td>
            <td class="values"><b><?php echo $tag->Astro_Die_; ?></b></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>NORTHERN</td>
            <td><b><?php echo $tag->Northern_Part_Number; ?></b></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Model</td>
            <td class="values"><b><?php echo $tag->Model; ?></b></td>
            <td>Description</td>
            <td class="values"><b><?php echo $tag->Description; ?></b></td>
        </tr>
    </table>
</div>

<script>
    JsBarcode("#barcode<?php echo $tag->No; ?>", " <?php echo sprintf('%010d', $tag->No); ?>");
</script>

<?php
// }
?>
<script>
    $(window).ready(function () {
        window.print()
    })
</script>

<?php
//echo json_encode($tags);
?>

</body>
</html>