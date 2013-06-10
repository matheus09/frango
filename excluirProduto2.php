<?php

include("conectar.php");

?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if ($_POST["codigo_consulta"] != ""){
	
	$codigo = $_POST["codigo_consulta"];

		$query = mysql_query("DELETE FROM produto WHERE codProduto='$codigo'");
			
				echo "<script> if(confirm('Exclusao Efeturado com Sucesso! Deseja excluir outro Produto?')) 
								window.location='excluirProduto.php' 
							else
								window.location='telaInicial.php' </script>";

	}else{
		echo "<script> if(confirm('Existe campo obrigatório não Preenchido! Deseja realizar a consulta novamente?')) 
						window.location='excluirProduto.php' 
					else
						window.location='telaInicial.php' </script>";
	}
}
?>

