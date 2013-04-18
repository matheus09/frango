<?php

include("conectar.php");

?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if ($_POST["cpf_consulta"] != ""){
	
	$cpf = $_POST["cpf_consulta"];
	
		$query = mysql_query("DELETE FROM cliente WHERE cpf='$cpf'");
			
				echo "<script> if(confirm('Exclusao Efeturado com Sucesso! Deseja excluir outro Cliente?')) 
								window.location='excluirClientes.php' 
							else
								window.location='telaInicial.php' </script>";

	}else{
		echo "<script> if(confirm('Existe campo obrigatório não Preenchido! Deseja realizar a consulta novamente?')) 
						window.location='excluirClientes.php' 
					else
						window.location='telaInicial.php' </script>";
	}
}
?>
