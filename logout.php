<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript">
		
		function redirect(){

			setTimeout("window.location='index.php'", 1000);

		}
	</script>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>


<?php

session_start();
session_destroy();

echo "<script>redirect()</script>";
		
?>

</body>
</html>



