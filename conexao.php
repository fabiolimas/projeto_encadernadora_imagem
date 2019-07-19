<?php

	$host="localhost";
	$usuario="root";
	$senha="s1imagine01";
	$database="bd_encadernadora";
	$conecta=mysqli_connect($host, $usuario, $senha, $database);
	mysqli_query($conecta, "SET NAMES 'utf8'");
mysqli_query($conecta,'SET character_set_connection=utf8');
mysqli_query($conecta,'SET character_set_client=utf8');
mysqli_query($conecta,'SET character_set_results=utf8');

	



?>