<?php

include("conectar.php");

if($_SESSION['codigo_permissao'] != 1) {
		echo "<script> if(confirm('Permissao de acesso apenas para Administrador!')) 
							window.location='index.php' 
						else
							window.location='' </script>";
}
?>

<?php

	$situacao = 1;
							
	$query5 = mysql_query("SELECT * FROM emprestimo WHERE situacao ='$situacao' AND dataDevolucao < curdate() AND status_emprestimo = 'NAO ENTREGUE' ") or die(mysql_error());
	while($array5 = mysql_fetch_array($query5)){
		$codigo = $array5['codigo_emprestimo'];
		
		$situacao2 = 2;
		
		if (isset($codigo)){
			$query6 = mysql_query("UPDATE emprestimo SET situacao='$situacao2' WHERE codigo_emprestimo='$codigo' ") or die(mysql_error());
		}else{
			$query7 = mysql_query("UPDATE emprestimo SET situacao='$situacao' WHERE codigo_emprestimo='$codigo' ") or die(mysql_error());
		}
	}
	
	$query8 = mysql_query("SELECT * FROM usuario WHERE dataSuspensao < curdate() ") or die(mysql_error());
	while($array8 = mysql_fetch_array($query8)){
		$matricula = $array8['matricula'];
		
		$data = "0000-00-00";
		
		if (isset($matricula)){
			$query9 = mysql_query("UPDATE usuario SET dataSuspensao='$data' WHERE matricula='$matricula' ") or die(mysql_error());
			$query10 = mysql_query("UPDATE devolucao SET dataSuspensao='$data' WHERE dataSuspensao < curdate() ") or die(mysql_error());
		}
	}
?>

<html>
	<head>
		<title>SISCONTROL-B Online</title>
		<link rel="stylesheet" type="text/css" href="css/meucss.css" />
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	</head>

	<body>
		<div id="principal">
		<div id="head"><center><img src="imagens/banner_biblioteca.jpg" width="1008" height="120"></center></div>
		<div id="conteudo">
		<div style="text-align: right; border: 0;"><?php echo "Usuário Logado: ".$_SESSION['nomeLogado'].", <a href=index.php style=text-decoration:none> (Sair)</a>" ?></div>

		<div id="meio" style="text-align: justify;">

			<center><div class="menu-hv">
			<ul>
				<li><a>Funcionário ou Administrador</a>
				<ul>
					<li><a href="[09]adminfunc/cadastrarFuncAdmin.php">Cadastrar Funcionário/Admin</a></li>
					<li><a href="[09]adminfunc/consultarFuncAdmin.php">Consultar Funcionário/Admin</a></li>
					<li><a href="[09]adminfunc/editarFuncAdmin.php">Editar Funcionário/Admin</a></li>
					<li><a href="[09]adminfunc/excluirFuncAdmin.php">Excluir Funcionário/Admin</a></li>
				</ul>
				</li>
				<li><a>Fornecedores</a>
				<ul>
					<li><a href="[09]adminfunc/cadastrarFuncAdmin.php">Cadastrar Funcionário/Admin</a></li>
					<li><a href="[09]adminfunc/consultarFuncAdmin.php">Consultar Funcionário/Admin</a></li>
					<li><a href="[09]adminfunc/editarFuncAdmin.php">Editar Funcionário/Admin</a></li>
					<li><a href="[09]adminfunc/excluirFuncAdmin.php">Excluir Funcionário/Admin</a></li>
				</ul>
				</li>
			</ul>
			</div></center><br>
			
				<hr color="#333333" size="1px" style="margin-bottom:2px; margin-top:2px;" />
				<center>Sistema de Gerenciamento de Vendas de Frango Assado</center>
				<hr color="#333333" size="1px" style="margin-bottom:2px; margin-top:2px;" />
				<br><br>
				
				<div id="esquerda">
						<br><br>
						SISGEFRAN - Sistema de gerenciamento de vendas de frango assado, nesta página o Administrador do Sistema poderá Cadastrar,
						Consultar, Editar ou Excluir Funcionários, Administradores e Fornecedores.
						<br><br>
						
				</div>

				<div id="direita" style="text-align: center;">				
						<center><table border="0">
						<tr>
						<td><center><img src="imagens/telaAdministrador/administrador.png" height="150" width="150" border="0"/></a></center></td>
						<td></td>
						</tr>
						</table></center>
						
						<a href= "telaInicial.php" style="text-decoration:none" ><img src="imagens/telaAdministrador/trocar.jpg" height="50" width="50" border="0"/>Tela Inicial do SISGEFRAN</a>

				</div>		
						
		</div>
		<div id="foot">
			<center>Todos os direitos reservados.
			Proibida a reprodução total ou parcial do conteúdo deste sistema sem prévia autorização.</center>
		</div>			
		</div>
	</body>
</html>