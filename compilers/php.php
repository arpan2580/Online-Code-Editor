<?php
exec("del $filename_code");
$code=$_POST["code"];
$filename_code="testing.php";

$file_code=fopen($filename_code,"w+");
fwrite($file_code,$code);
fclose($file_code);
echo "<script type=\"text/javascript\">window.open('$filename_code','_self');</script>";
?>

