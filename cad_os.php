<?php

		include('conexao.php');

		$loja=isset($_POST['lojas'])?$_POST['lojas']:"";
		$busca_lojas="SELECT * FROM  lojas WHERE id_loja='$loja'";
		$query_lojas=mysqli_query($conecta, $busca_lojas);

		while ($lista_loja=mysqli_fetch_array($query_lojas)){

			$id_loja=isset($lista_loja['id_loja'])?$lista_loja['id_loja']:"";
			$nome_loja=isset($lista_loja['nome_loja'])?$lista_loja['nome_loja']:"";
		}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Saida Albuns</title>
	<script type="text/javascript">
		

		function voltar(){

			setTimeout("history.back()",3000);
		}
	</script>
</head>
<body>
		<meta charset="utf-8">
	<img src="imagens/logo.png" id="logo">
	<div id="interface1">


<a href="index_loja.php"><img src="imagens/sair.png" id="sair2" title="Sair"></a>

	<h1>Encadernadora</h1>
			
			

	<form name="form" action="processa_pedido.php" method="post" id="encadernadora">
		
		<?php

		if(isset ($id_loja) == null){


			echo "<center><img src='imagens/alert.png' width=50px><p>Selecione uma loja para continuar</center>";
			echo"<script>voltar()</script>";
			exit();


		}else{

			$os="SELECT * FROM modelo_de_album";
			$query_os=mysqli_query($conecta, $os);
			$tamanho="SELECT * FROM tamanho_de_album";
			$query_tamanho=mysqli_query($conecta, $tamanho);
			$laminacao='SELECT * FROM tipo_laminacao';
			$query_laminacao=mysqli_query($conecta, $laminacao);
			$mod_capa="SELECT * FROM modelo_de_capa";
			$query_modcapa=mysqli_query($conecta, $mod_capa);
			$quant="SELECT * FROM numero_de_pagina";
			$query_quant=mysqli_query($conecta, $quant);
			$cantoneira='SELECT * FROM cantoneira';
			$query_cantoneira=mysqli_query($conecta, $cantoneira);
			$corte='SELECT * FROM corte';
			$query_corte=mysqli_query($conecta, $corte);
			$laminacaocap="SELECT * FROM laminacaocapa limit 2";
			$query_lamcap=mysqli_query($conecta, $laminacaocap);
			$estojo="SELECT * FROM modelo_estojo";
			$query_estojo=mysqli_query($conecta, $estojo);
			$maleta="SELECT * from modelo_maleta";
			$query_maleta=mysqli_query($conecta, $maleta);
			$status=1;
			$status_pag="SELECT * FROM status_pag";
			$query_status=mysqli_query($conecta, $status_pag);

			$servico_add="SELECT * FROM servico_adicional";
			$query_servico=mysqli_query($conecta, $servico_add);
			


			echo "<input type='hidden' name='idloja' value='$id_loja'>
				<input type='hidden' name='status' value='$status'>
			Loja: <input type='text' name='n_loja' value='$nome_loja' readonly><br>
			OS Fotografia: <input type='text' name='osfoto' required><br>
		OS da Encadernadora: <input type='text' name='os' required><br>
		
		<br>
		<fieldset><legend>Dados do Cliente</legend>
		Nome do Cliente: <input type='text' name='nome' required size='70' required><br> 
		Código Goldbiz: <input type='text' name='codigocliente' required><br>
		Email: <input type='email' name='mail' size='50'><br>
		Telefone:<input type='text' name='fone'><br>
		</fieldset>
		
		<fieldset><legend>Venda</legend>
		Vendedor: <input type='text' name='vendedor' required><br>
		Valor Total: <input type='text' name='valor' required><br>
		Status da OS:<select name='status_os' required><option value=''>Status OS</option>";
		if($query_status){
			while($statusp=mysqli_fetch_array($query_status)){

			$id_status=$statusp['id_pagamento'];
			$statusn=$statusp['statuspg'];
			echo "<option value='$id_status'>$statusn</option>";

		}

		}else{
			echo mysqli_error($conecta);
		}
		
		echo"</select><br><br>



		Data Loja: <input type='date' name='dataloja' required>
		</fieldset>

		<br>
		<fieldset><legend>Composição do Album</legend>


		Modelo do album: <select name='modeloalbum' id='modelo' onchange='mudaImagem()' value=''><option value='1'>Escolher Modelo</option>";

		while($lista_albuns=mysqli_fetch_array($query_os)){

				$id_album=$lista_albuns['id_modelo'];
				$nome_album=$lista_albuns['nome_modelo'];


				echo "<option value='$id_album'>$nome_album</option>";

			}
			echo "</select><br><br><br> ";
		echo"Tamanho do Album: <select name='tamanhoalbum' value='' ><option value='4'>Escolher Tamanho</option>";
		while($lista_tamanhos=mysqli_fetch_array($query_tamanho)){

			$id_tamanho=$lista_tamanhos['id_tamanho_album'];
			$nome_tamanho=$lista_tamanhos['nome_tamanho_album'];
			echo "<option value='$id_tamanho'>$nome_tamanho</option>";
		}
		echo"</select>  ";

		echo "<br>Quant. de Páginas: <input type='text' name='paginas' id='npages'  >
				</select><br><br>";

			echo "Laminação das Páginas: <select name ='laminacaoalb' value='' ><option value='6'>Opções de Laminação</option>";
			while($lista_laminacao=mysqli_fetch_array($query_laminacao)){

				$id_laminacao=$lista_laminacao['id_laminacao'];
				$nome_laminacao=$lista_laminacao['nome_laminacao'];

				echo"<option value='$id_laminacao'>$nome_laminacao</option>";
			}
			echo"</select><br><br><br>";
			echo"Modelo da Capa: <select name='modelocapa' value='' ><option value='4'>Escolher Modelo</option>";
			while($lista_modelocapa=mysqli_fetch_array($query_modcapa)){

				$id_modelocap=$lista_modelocapa['id_modelo_capa'];
				$nome_modelocap=$lista_modelocapa['nome_modelo_capa'];

				echo "<option value='$id_modelocap'>$nome_modelocap</option>";


			}
			echo"</select> <br><br>";

			echo "Laminação da Capa(Person.): <select name ='laminacapa' value=''><option value='3'>Opções de Laminação</option>";
			while($lista_lamcap=mysqli_fetch_array($query_lamcap)){

				$id_laminacao=$lista_lamcap['id_laminacaocapa'];
				$nome_laminacao=$lista_lamcap['nome_laminacaocapa'];

				echo"<option value='$id_laminacao'>$nome_laminacao</option>";
			}
			echo"</select><br><br><br>";

			echo"Cantoneira: <select name='cantoneira'  value=''><option value='3'>Tipo de Cantoneira</option>";

			while($lista_cantoneira=mysqli_fetch_array($query_cantoneira)){

				$id_cantoneira=$lista_cantoneira['id_cantoneira'];
				$nome_cantoneira=$lista_cantoneira['nome_cantoneira'];
				echo "<option value='$id_cantoneira'>$nome_cantoneira</option>";

			}
			echo"</select><br><br><br>";
			echo "Corte: <select  name='corte' value=''  ><option value='3'>Escolha uma Opção</option>";

			while($lista_corte=mysqli_fetch_array($query_corte)){

				$id_corte=$lista_corte['id_corte'];
				$nome_corte=$lista_corte['nome_corte'];

				echo "<option value='$id_corte'>$nome_corte</option>";
			}
			echo"</select><br><br><br>";

			
			echo" Estojo: <select name='estojo' value=''><option value='4'>Tipo de Estojo</option>";

			while($lista_estojo=mysqli_fetch_array($query_estojo)){
				$id_estojo=$lista_estojo['id_modelo_estojo'];
				$nome_estojo=$lista_estojo['nome_modelo_estojo'];

				echo"<option value='$id_estojo'>$nome_estojo</option>";
			}
			echo"</select><br><br><br>";

			echo"Maleta: <select name='maleta' value=''><option value='4'>Tipo de Maleta</option>";

			while($lista_maleta=mysqli_fetch_array($query_maleta)){

				$id_maleta=$lista_maleta['id_modelo_maleta'];

				$nome_maleta=$lista_maleta['nome_modelo_maleta'];
				echo"<option value='$id_maleta'>$nome_maleta</option>";
			}
			echo"</select><br><br><br>";

			echo"Serviços Adicionais:<select name='servico_add' value=''><option value='4'>Selecione um serviço</option>";
			while($lista_servico_add=mysqli_fetch_array($query_servico)){

				$id_servico=$lista_servico_add['id_servico'];
				$nome_servico=$lista_servico_add['servico_nome'];

				echo "<option value='$id_servico'>$nome_servico</option>";


			}
			echo"</select>";
			echo"</fieldset>";


		

}

		?>
				
		
				<input type="submit" value="Enviar" id="btn2">
	</form>

<div id="imagem"><img src="" id="image"></div>

<script type="text/javascript">
	
	var imagem=document.querySelector("#image");
	var album=document.querySelector("#modelo");
	function mudaImagem(){


		if(modelo.value == 5){
			imagem.src="imagens/album_gold.png";
			imagem.style="filter:opacity(0.6)";			

		}else if(modelo.value == 6){
			imagem.src="imagens/album_plus.png";
			imagem.style="filter:opacity(0.6)";
		}else if(modelo.value == 8){
			imagem.src="imagens/encarte.png";
			imagem.style="filter:opacity(0.6)";
		}else{
			imagem.src="";
		}

		

	}
	

	

		

		
	
</script>

</div>
</body>
</html>