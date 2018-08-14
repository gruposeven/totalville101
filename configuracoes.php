<?php
date_default_timezone_set('America/Sao_Paulo');

//Configuração de Versão 
$versao = "1.1";
$date_versao = date("d/m/Y H:i:s", mktime(21,0,0,5,9,2018)); // Versão 1.1 implantada em 09/05/2017 as 21:00 
$time_versao = mktime(21,0,0,5,9,2018); // data de implantação em formato timestamp
$fuso_time_atual = strtotime("+3 Hours", time()); //Time atual + 3 Hours
$date_atual = date("d/m/Y H:i:s"); //Data Atual
$diferenca_tempo = $fuso_time_atual - $time_versao; // Diferença de Tempo 
$tempo_versao = date("d/m/Y H:i:s", $diferenca_tempo); // Tempo de duração da versão 


//Conexão ao Banco de Dados


$dsn = 'mysql:dbname=gcond;host=localhost'; //conexão banco de dados servidor interno (Versão BETA)

//$dsn = "mysql:dbname=gcondville101;host=gcondville101.mysql.dbaas.com.br";//conexão banco de dados servidor externo

$dbuser = "gcondville101";
$dbpass = "gcond811215";
try{
	$pdo = new PDO($dsn, $dbuser, $dbpass);

    $pdo->exec("SET CHARACTER SET utf8");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

}catch(PDOException $erro){
	echo "Falha de Conexão com Servidor ".$erro->getMessage(); //Para saber qual o erro da conexão retire as 2 barras
}


?>