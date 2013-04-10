<?php

header("Content-Type: text/html; charset=ISO-8859-1",true);

$conectaServidor = true;    		
$abreSessao = true;         		

	if ($conectaServidor == true){
		$link = mysql_connect("localhost", "tecnotec_frango", "frango123!!") or die("MySQL: Não foi possível conectar-se ao servidor!");
		mysql_select_db("tecnotec_frango", $link) or die("MySQL: Não foi possível conectar-se ao banco de dados [".$banco."].");
	}

	if ($abreSessao == true){
		session_start();
	}

function expulsaVisitante() {

    unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);
	
    header("Location: index.php");
	
}
?>