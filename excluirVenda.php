<?php

include("conectar.php");

?>

<?php

	$id = $_GET['id'];
	$codProduto = $_GET['codProduto'];
	$qtd = $_GET['qtd'];
	
	$query1 = mysql_query("SELECT * FROM produto WHERE codProduto LIKE '".$codProduto."%'") or die(mysql_error());
			
	while($array1 = mysql_fetch_array($query1)){
		$qtdEstoque = $array1['qtd'];
	}
	
	$qtdFinal = $qtdEstoque + $qtd;
	
	$query3 = mysql_query("DELETE FROM venda WHERE codVenda='$id'");
	
	$query2 = mysql_query("UPDATE produto SET qtd='$qtdFinal' WHERE codProduto='$codProduto'");
	
				echo "<script> if(confirm('Cancelamento Efeturado com Sucesso! Deseja cancelar outra venda?')) 
								window.location='cancelarVenda.php' 
							else
								window.location='telaInicial.php' </script>";

?>

