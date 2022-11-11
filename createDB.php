<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<body>
<?php
include "DB_Fonctions.php";
	//creation data base ***************
	$dbc=connectServer('localhost','root','',1);
		$dbc2=connectServer('localhost','root','',1);
	
	createDB($dbc,"DBTemp");
	createDB($dbc2,"DBMain");
	mysqli_close($dbc); // Close the connection
	mysqli_close($dbc2);
?>
</body>
</html>
