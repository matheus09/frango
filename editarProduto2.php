<?php

include("conectar.php");

?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if (($_POST["codigo_consulta"] != "") && ($_POST["fornecedor"] != "") && ($_POST["nome_consulta"] != "") && ($_POST["preco_consulta"] != "")){
	
	$codigo = $_POST["codigo_consulta"];
	$codFornecedor = $_POST["fornecedor"];
	$nomeProduto = $_POST["nome_consulta"];
	$preco = $_POST["preco_consulta"];
	$quantidade = $_POST["qtd_consulta"];
	
		$query = mysql_query("UPDATE produto SET codProduto='$codigo', codFornecedor='$codFornecedor', nome='$nomeProduto', preço='$preco', qtd='$quantidade' WHERE codProduto='$codigo' ") or die(mysql_error());
			
				echo "<script> if(confirm('Edição Efeturado com Sucesso! Deseja editar outro Produto?')) 
								window.location='editarProduto.php' 
							else
								window.location='telaInicial.php' </script>";

	}else{
		echo "<script> if(confirm('Existe campo obrigatório não Preenchido! Deseja realizar a consulta novamente?')) 
						window.location='editarProduto.php' 
					else
						window.location='telaInicial.php' </script>";
	}
}
?>
