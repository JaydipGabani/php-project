<?php
//<!DOCTYPE html>
?>
<html>
<body>
<?php
echo form_open('Upload/do_upload',array('enctype'=>'multipart/form-data'))
?>
<!--<form action="" method="post" enctype="multipart/form-data">-->
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="text" name="norex">
    <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>