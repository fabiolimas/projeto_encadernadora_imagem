<?php

session_start();

		include('conexao.php');

		
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Saida Albuns</title>
	<script type="text/javascript">
		

		function loginok(){

			setTimeout("window.location='receber_encad.php'", 2000);
		}

		function loginfail(){

			setTimeout("window.location='index.php'", 2000);
		}
		function loginlab(){
			setTimeout("window.location='receber_lab.php'" ,2000);
		}
		function logingeral(){
			setTimeout("window.location='rel_geral.php'",2000);
		}
	</script>
</head>
<body>
	<img src="imagens/logo.png" id="logo">
	<div id="interface">



	<h1>Autenticação</h1>


	<?php


		$usuario=isset($_POST['usuario'])?$_POST['usuario']:"";
		$senha=isset($_POST['senha'])?$_POST['senha']:"";



		$autentica="SELECT * FROM usuarios WHERE nome='$usuario' and senha='$senha'";
		$query_autentica=mysqli_query($conecta, $autentica);

		while($lista_usuarios=mysqli_fetch_array($query_autentica)){

			$id=isset($lista_usuarios['id_usuario'])?$lista_usuarios['id_usuario']:"";
			$nome=isset($lista_usuarios['nome'])?$lista_usuarios['nome']:"";
			

}
			$row=mysqli_num_rows($query_autentica);
			
	
					switch ($id){

					case 1:

					$_SESSION['usuario']=$usuario;
					$_SESSION['senha']=$senha;

					echo "Autenticado com sucesso!...";
					echo "<script>loginok()</script>";

						break;

					case 2:

				$_SESSION['usuario']=$usuario;
				$_SESSION['senha']=$senha;

				echo "Autenticado com sucesso!...";
				echo "<script>loginlab()</script>";

				break;

				case 3:

				$_SESSION['usuario']=$usuario;
				$_SESSION['senha']=$senha;

				echo "Autenticado com sucesso!...";
				echo "<script>logingeral()</script>";

				break;

				default:

					unset ($_SESSION['usuario']);
					unset($_SESSION['senha']);
					
					echo "Falha. Usuario ou senha incorretos";
					echo "<script>loginfail()</script>";
				break;			
						
			}

		
		
		

	?>
		
	
			
	
				
	</form>
</div>
</body>
</html>