<?php
$CC="node";
$code=$_POST["code"];
$filename_code="main.js";
$command=$CC." ".$filename_code;

$file_code=fopen($filename_code,"w+");
fwrite($file_code,$code);
fclose($file_code);

shell_exec($command);
echo "<script type=\"text/javascript\">window.open('http://localhost','_self');</script>";
exec("del $filename_code");
?>