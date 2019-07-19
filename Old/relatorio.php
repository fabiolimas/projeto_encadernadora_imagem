<?php
	include('conexao.php');
/*
* Criando e exportando planilhas do Excel
* /
*/
// Definimos o nome do arquivo que será exportado
$arquivo = 'relatorio.xls';
// Criamos uma tabela HTML com o formato da planilha

$select="SELECT l.loja_nome, e.os_alb, e.data_envio_loja, e.status,e.data_recebe_lab, e.status_receb, e.data_recebe_enca, e.data_envio_enca,e.observacao FROM entrega_alb as e join lojas as l on e.loja_id=l.loja_id order by e.data_envio_loja desc";
$query=mysqli_query($conecta, $select);



$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td colspan="3">Entrada de Albuns</tr>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td><b>Loja</b></td>';
$html .= '<td><b>OS</b></td>';
$html .= '<td><b>Enviado da Loja</b></td>';
$html .= '<td><b>Status OS</b></td>';
$html .= '<td><b>Status</b></td>';
$html .= '<td><b>Recebido Laboratório</b></td>';
$html .= '<td><b>Recebido na Encadernadora</b></td>';
$html .= '<td><b>Enviado da Encadernadora</b></td>';
$html .= '<td><b>Observações</b></td>';
$html .= '</tr>';


while($lista_rel=mysqli_fetch_array($query)){

	$loja=$lista_rel['loja_nome'];
	$os=$lista_rel['os_alb'];
	$data_env_l=$lista_rel['data_envio_loja'];
	$status_os=$lista_rel['status'];
	$status_rec=$lista_rel['status_receb'];
	$data_receb_en=$lista_rel['data_recebe_enca'];
	$data_envi_en=$lista_rel['data_envio_enca'];
	$data_recebe_lab=$lista_rel['data_recebe_lab'];
	$observ=$lista_rel['observacao'];


$html .= '<tr>';
$html .= '<td>'.$loja.'</td>';
$html .= '<td>'.$os.'</td>';
$html .= '<td>'.$data_env_l.'</td>';
$html .= '<td>'.$status_os.'</td>';
$html .= '<td>'.$data_recebe_lab.'</td>';
$html .= '<td>'.$status_rec.'</td>';
$html .= '<td>'.$data_receb_en.'</td>';
$html .= '<td>'.$data_envi_en.'</td>';
$html .= '<td>'.$observ.'</td>';

}
$html .= '</tr>';
$html .= '</table>';
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