<?php

	$langID=$_POST["language"];
        error_reporting(0);
		switch($langID)
			{
				case "c":
				{
					include("compilers/c.php");
					break;
				}
				case "cpp":
				{
					include("compilers/cpp.php");
					break;
				}
				case "java":
				{	
					include("compilers/java.php");
					break;
				}
				case "py":
				{
					include("compilers/python32.php");
					break;
				}
                case "html":
				{
					include("compilers/php.php");
					break;
				}
				case "php":
				{
					include("compilers/php.php");
					break;
				}
				case "js":
				{
					include("compilers/nodejs.php");
					break;
				}
			}
?>
