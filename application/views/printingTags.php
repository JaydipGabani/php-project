<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 31-01-2017
 * Time: 23:27
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?php echo base_url(); ?>application/img/favicon.jpg">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/css/style.css">

    <script src="<?php echo base_url(); ?>application/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>application/js/JsBarcode.all.min.js"></script>
    <script src="<?php echo base_url(); ?>application/js/handlebars.runtime.min.js"></script>
    <script src="<?php echo base_url(); ?>application/js/main.js"></script>
</head>
<body class="raw">
<div class="col s6 not-printing-dim"> press ctrl + P for printing</div>
<div class="col s6 not-printing-dim"><a href="<?php echo base_url() . 'manifestController' ?>" class='btn'> back </a>
</div>
<?php
//echo json_encode($tags);

foreach ($tags as $tag) {
//$tag=$tags[0];
//     echo json_encode($tag);
    ?>
    <div class="container printing-dim">
        <br><br>
        <div class="row">
            <div class="col s3">
                <img class="top-logo" src="<?php echo base_url(); ?>application/img/nas-logo-vertical.png" alt="">
            </div>
            <div class="col s9 title">
                EXTRUSION INVENTORY TAG
            </div>
        </div>
        <hr>
        <table>
            <tr>
                <td>Date</td>
                <td class="values"><b><?php echo $tag->Date; ?></b></td>
                <td>TagNo</td>
                <td class="values"><b><?php echo $tag->Tag_No; ?></b></td>
            </tr>
            <tr>
                <td>Location</td>
                <td class="values"><b><?php echo $tag->LocOnSite; ?></b></td>
                <td>Barcode</td>
                <td rowspan="2"><img id="barcode<?php echo $tag->Barcode; ?>" src=""/></td>
            </tr>
            <tr>
                <td># of Pcs.</td>
                <td class="values"><b><?php echo $tag->Qty; ?></b></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Length</td>
                <td class="values"><b><?php echo $tag->OrderLength; ?></b></td>
                <td>NorexId</td>
                <td class="values"><b><?php echo $tag->NorexID; ?></b></td>
            </tr>
            <tr>
                <td>Color</td>
                <td class="values"><b><?php echo $tag->Finish; ?></b></td>
                <td>Drawing</td>
                <td rowspan="4">
                    <img
                        src="<?php echo base_url(); ?>application/img/ExtrusionJPEG/<?php echo $tag->Location; ?>/<?php echo $tag->NorexID; ?>.JPG"
                        style="max-height: 300px; height: auto; width: 200px;" alt="">
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
                <td><b></b></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>KEYMARK</td>
                <td><b><?php echo $tag->KeymarkDieNo; ?></b></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>ASTRO</td>
                <td class="values"><b><?php echo $tag->AstroDieNo; ?></b></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>NORTHERN</td>
                <td><b><?php //echo $tag->Northern_Part_Number;
                        ?></b></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Model</td>
                <td class="values"><b><?php echo $tag->Model; ?></b></td>
                <td>Description</td>
                <td class="values"><b><?php echo $tag->Description; ?></b></td>
            </tr>
            <tr>
                <td>Project ID</td>
                <td class="values"><b><?php echo $tag->Projectid; ?></b></td>
                <td>Project Name</td>
                <td class="values"><b><?php echo $tag->pname; ?></b></td>
            </tr>
        </table>
    </div>

    <script>
        JsBarcode("#barcode<?php echo $tag->Barcode; ?>", " <?php echo sprintf('%010d', $tag->Barcode); ?>");
    </script>

    <?php
}
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
