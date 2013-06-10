<?php

include("conectar.php");

?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if ($_POST["cpf_consulta"] != ""){
	
	$cpf = $_POST["cpf_consulta"];
	$codigo = $_SESSION['codigoFuncionario_excluir'];
	
		$query2 = mysql_query("DELETE FROM funcionario WHERE codFuncionario='$codigo'");
		$query = mysql_query("DELETE FROM usuario WHERE codUsuario='$codigo'");
		$query3 = mysql_query("DELETE FROM permissao_usuario WHERE codPermissaoUsuario='$codigo'");
			
				echo "<script> if(confirm('Exclusao Efeturado com Sucesso! Deseja excluir outro Funcionário?')) 
								window.location='excluirFuncionario.php' 
							else
								window.location='telaAdministrador.php' </script>";

	}else{
		echo "<script> if(confirm('Existe campo obrigatório não Preenchido! Deseja realizar a consulta novamente?')) 
						window.location='excluirFuncionario.php' 
					else
						window.location='telaAdministrador.php' </script>";
	}
}
?>

<?php
	$_SESSION['codigoFuncionario_excluir'] = "";
?>
