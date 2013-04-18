<?php

include("conectar.php");

?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if (($_POST["nome_consulta"] != "") && ($_POST["cpf_consulta"] != "") && ($_POST["data_consulta"] != "") && ($_POST["endereco_consulta"] != "") && ($_POST["telefone_consulta"] != "")){
	
	$nome = $_POST["nome_consulta"];
	$cpf = $_POST["cpf_consulta"];
	$data = $_POST["data_consulta"];
		$d=explode("/",$data);
		$data=$d[2]."-".$d[1]."-".$d[0];
	
	$endereco = $_POST["endereco_consulta"];
	$telefone = $_POST["telefone_consulta"];
	
		$query = mysql_query("UPDATE cliente SET nome='$nome', cpf='$cpf', telefone='$telefone', endereco='$endereco', dataNascimento='$data' WHERE cpf='$cpf' ") or die(mysql_error());
			
				echo "<script> if(confirm('Edição Efeturado com Sucesso! Deseja editar outro Cliente?')) 
								window.location='editarCliente.php' 
							else
								window.location='telaInicial.php' </script>";

	}else{
		echo "<script> if(confirm('Existe campo obrigatório não Preenchido! Deseja realizar a consulta novamente?')) 
						window.location='editarCliente.php' 
					else
						window.location='telaInicial.php' </script>";
	}
}
?>
