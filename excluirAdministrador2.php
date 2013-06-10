<?php

include("conectar.php");

?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if ($_POST["nome_consulta"] != ""){
	
	$nome = $_POST["nome_consulta"];
	$codigo = $_SESSION['codigoAdministrador_excluir'];
	
		$query2 = mysql_query("DELETE FROM administrador WHERE codAdm='$codigo'");
		$query = mysql_query("DELETE FROM usuario WHERE codUsuario='$codigo'");
		$query3 = mysql_query("DELETE FROM permissao_usuario WHERE codPermissaoUsuario='$codigo'");
			
				echo "<script> if(confirm('Exclusao Efeturado com Sucesso! Deseja excluir outro Administrador?')) 
								window.location='excluirAdministrador.php' 
							else
								window.location='telaAdministrador.php' </script>";

	}else{
		echo "<script> if(confirm('Existe campo obrigatório não Preenchido! Deseja realizar a consulta novamente?')) 
						window.location='excluirAdministrador.php' 
					else
						window.location='telaAdministrador.php' </script>";
	}
}
?>

<?php
	$_SESSION['codigoAdministrador_excluir'] = "";
?>
