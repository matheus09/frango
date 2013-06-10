<?php

include("conectar.php");

?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if ($_POST["cnpj_consulta"] != ""){
	
	$cpf = $_POST["cnpj_consulta"];
	$codigo = $_SESSION['codigoFornecedor_excluir'];
	
		$query = mysql_query("DELETE FROM fornecedor WHERE codFornecedor='$codigo'");
			
				echo "<script> if(confirm('Exclusao Efeturado com Sucesso! Deseja excluir outro Fornecedor?')) 
								window.location='excluirFornecedor.php' 
							else
								window.location='telaAdministrador.php' </script>";

	}else{
		echo "<script> if(confirm('Existe campo obrigatório não Preenchido! Deseja realizar a consulta novamente?')) 
						window.location='excluirFornecedor.php' 
					else
						window.location='telaAdministrador.php' </script>";
	}
}
?>

<?php
	$_SESSION['codigoFornecedor_excluir'] = "";
?>
