<?php
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
		
		function voltar(){

			setTimeout("window.location='receber.php'", 2000);

		}
	

	</script>
</head>
<body>
	<img src="imagens/logo.png" id="logo">
	<div id="interface">
		<?php 
  
     
    //verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 
 
    //seleciona todos os itens da tabela 
    $cmd = "select * from entrega_alb"; 
    $produtos = mysqli_query($conecta,$cmd); 
 
    //conta o total de itens 
    $total = mysqli_num_rows($produtos); 
 
    //seta a quantidade de itens por página, neste caso, 2 itens 
    $registros = 5; 
 
    //calcula o número de páginas arredondando o resultado para cima 
    $numPaginas = ceil($total/$registros); 
 
    //variavel para calcular o início da visualização com base na página atual 
    $inicio = ($registros*$pagina)-$registros; 
 
    //seleciona os itens por página 
    $lista_recebimento="SELECT l.loja_nome, e.os_alb, e.data_envio_loja, e.status,e.data_recebe_lab, e.data_recebe_enca, e.status_receb FROM entrega_alb as e join lojas as l on l.loja_id=e.loja_id order by e.data_envio_loja LIMIT $inicio,$registros"; 



    $query_lista = mysqli_query($conecta,$lista_recebimento); 
    $total = mysqli_num_rows($query_lista); 
    echo"<table border='1' cellspacing ='0' colspacing='2'>";
		echo"<tr>";
		echo"<td><b>Loja</td>";
		echo"<td><b>Os</td>";
		echo"<td><b>Data de Envio</td>";
		echo"<td><b>Status da OS</td>";
		echo"<td><b>Status</td>";
		echo"<td><b>Recebimento Minilab</td>";
		echo"<td><b>Recebimento Encadernadora</td>";
		echo"<td><b>Enviar P/ Loja</td>";
		echo"</tr>";
     
    //exibe os produtos selecionados 
    while($mostra_recebidos=mysqli_fetch_array($query_lista)){



	$loja=$mostra_recebidos['loja_nome'];
	$os=$mostra_recebidos['os_alb'];
	$dat_envio=$mostra_recebidos['data_envio_loja'];
	$status=$mostra_recebidos['status'];
	$data_recebe_lab=$mostra_recebidos['data_recebe_lab'];
	$status_enca=$mostra_recebidos['status_receb'];

	$data_receb_enca=$mostra_recebidos['data_recebe_enca'];


	echo"<tr>";
			echo"<td>$loja</td>";
			echo"<td>$os</td>";
			echo"<td>".date('d-m-y',strtotime($dat_envio))."</td>";
			echo"<td>$status</td>";
			echo"<td>$status_enca</td>";
			echo"<td>$data_recebe_lab</td>";
			echo"<td>$data_receb_enca</td>";
			echo"<td><a href='envioloja.php?os=$os'><img src='imagens/seta2.png' width=10px id='bt'></a></td>";
}
     
    //exibe a paginação 
   
?>
<?php

 for($i = 1; $i < $numPaginas + 1; $i++) { 
        echo "<a href='paginacao.php?pagina=$i' id='paginacao'>".$i."</a> "; 
    } 



?>
</div>
</body>
</html>