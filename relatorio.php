<?php
	include('conexao.php');
/*
* Criando e exportando planilhas do Excel
* /
*/
// Definimos o nome do arquivo que será exportado
$arquivo = 'relatorio.xls';
// Criamos uma tabela HTML com o formato da planilha

$select="SELECT l.nome_loja, p.cliente, p.valor, p.os_fotografia, p.os, p.data_loja, s.status, stp.statuspg, p.data_lab, p.data_encad FROM pedido as p join lojas as l on p.id_loja=l.id_loja join status as s on s.id_status=p.id_status join status_pag as stp on stp.id_pagamento=p.status_pag ";
$query=mysqli_query($conecta, $select);




$html.='<html><head><meta charset=utf-8></head><title></title><body>';
$html .= '<table border="1">';
$html .= '<tr>';
$html .= '<td colspan="10"><b><center>Entrada de Albuns</center></b></tr>';
$html .= '</tr>';
$html.='<tr></tr>';
$html .= '<tr>';
$html .= '<td><b>Loja</b></td>';
$html .= '<td><b>OS Fotografia</b></td>';
$html .= '<td><b>OS Encadernadora</b></td>';
$html.='<td><b>Valor</b></td>';
$html.='<td><b>Cliente</b></td>';
$html .= '<td><b>Enviado da Loja</b></td>';
$html .= '<td><b>Status OS</b></td>';
$html .= '<td><b>Status</b></td>';
$html .= '<td><b>Recebimento Minilab</b></td>';
$html .= '<td><b>Recebimento Encadernadora</b></td>';

$html .= '</tr>';


while($lista_rel=mysqli_fetch_array($query)){

	$loja=$lista_rel['nome_loja'];
	$os=$lista_rel['os'];
	$data_env_l=$lista_rel['data_loja'];
	$status_os=$lista_rel['status'];
	$data_receb_en=$lista_rel['data_encad'];
	$data_recebe_lab=$lista_rel['data_lab'];
	$osfoto=$lista_rel['os_fotografia'];
	$valor=$lista_rel['valor'];
	$cliente=$lista_rel['cliente'];
	$statuspg=$lista_rel['statuspg'];

	if(strlen($valor)>=6){
		$new_valor=substr_replace($valor,',',3,1);
	}else if(strlen($valor)<6){
		$new_valor=substr_replace($valor,',',2,1);

	}
	

$html .= '<tr>';
$html .= '<td>'.$loja.'</td>';
$html .= '<td>'.$osfoto.'</td>';
$html .= '<td>'.$os.'</td>';
$html .= '<td>'.$new_valor.'</td>';
$html .= '<td>'.mb_strtoupper($cliente).'</td>';
$html .= '<td>'.$data_env_l.'</td>';
$html .= '<td>'.$statuspg.'</td>';
$html .= '<td>'.$status_os.'</td>';
$html .= '<td>'.$data_recebe_lab.'</td>';

$html .= '<td>'.$data_receb_en.'</td>';


}
$html .= '</tr>';
$html .= '</table>';
$html.='</body></html>';
// Configurações header para forçar o download
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );
// Envia o conteúdo do arquivo
echo $html;
exit;