<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 25-01-2017
 * Time: 18:59
 */
?>
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
//$tag=$tags[0];
     ?>
     <div class="printingPO">
         <br><br>
         <div class="row">
             <div class="col s3">
                 <img class="top-logo" src="<?php echo base_url();?>application/img/nas-logo-vertical.png" alt="">
             </div>
             <div class="col s9 title">
                 111 Central Avenue <br>
                 Teterboro, NJ 07608 <br>
                 Tel. (201) 943-6400     Fax (201) 943-1282
             </div>
         </div>
         <div class="PONumber">EXTRUSION PO:______</div>
         <br>
         <div class="right">DATE:______________</div>
         <div>To: ASTRO SHAPES</div>
         <div class="center-align">***ALUMINUM 6063-T6***</div>
         <div>Tolerance:  Minus 0 / Plus 150 Lbs.</div>
         <hr>
         <table >
             <tr>
                 <th>ProjectId</th>
                 <th>PCs.</th>
                 <th>Die#</th>
                 <th>Description</th>
                 <th>Color</th>
                 <th>Length</th>
                 <th>Total lbs.</th>
             </tr>
<!--             --><?php
//             foreach ($POdata as $obj) {
//                 ?>
<!--                 <tr>-->
<!--                     <td>--><?php //$obj->ProjectId; ?><!--</td>-->
<!--                     <td>--><?php //$obj->Qty; ?><!--</td>-->
<!--                     <td>--><?php //$obj->AstroDieNo; ?><!--</td>-->
<!--                     <td>--><?php //$obj->Description; ?><!--</td>-->
<!--                     <td>--><?php //$obj->Color; ?><!--</td>-->
<!--                     <td>--><?php //$obj->Length; ?><!--</td>-->
<!--                     <td>--><?php //$obj->TotalLbs ?><!--</td>-->
<!--                 </tr>-->
<!--                 --><?php
//             }
//             ?>
             <tr>
                 <td>2313</td>
                 <td>10</td>
                 <td>2314</td>
                 <td>some description</td>
                 <td>red</td>
                 <td>20</td>
                 <td>1202</td>
             </tr>
             <tr>
                 <td>2313</td>
                 <td>10</td>
                 <td>2314</td>
                 <td>some description</td>
                 <td>red</td>
                 <td>20</td>
                 <td>1202</td>
             </tr>
             <tr>
                 <td>1010</td>
                 <td>10</td>
                 <td>2314</td>
                 <td>some description</td>
                 <td>red</td>
                 <td>20</td>
                 <td>1202</td>
             </tr>
             <tr>
                 <td>2313</td>
                 <td>10</td>
                 <td>2314</td>
                 <td>some description</td>
                 <td>red</td>
                 <td>20</td>
                 <td>1202</td>
             </tr>
             <tr>
                 <td>2556</td>
                 <td>10</td>
                 <td>2314</td>
                 <td>some description</td>
                 <td>red</td>
                 <td>20</td>
                 <td>1202</td>
             </tr>
             <tr>
                 <td>2556</td>
                 <td>10</td>
                 <td>2314</td>
                 <td>some description</td>
                 <td>red</td>
                 <td>20</td>
                 <td>1202</td>
             </tr>
             <tr>
                 <td>2313</td>
                 <td>10</td>
                 <td>2314</td>
                 <td>some description</td>
                 <td>red</td>
                 <td>20</td>
                 <td>1202</td>
             </tr>
         </table>
     </div>

     <script>
//         JsBarcode("#barcode<?php //echo $tag->No; ?>//", " <?php //echo sprintf('%010d', $tag->No); ?>//");
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