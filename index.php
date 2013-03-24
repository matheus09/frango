<?php
	
	session_start();
	session_unset();
	session_destroy(); 

?>

<?php

if (isset($_POST['enviar'])){

include("conectar.php");

	if (($_POST['login'] != "") && ($_POST['senha'] != "")){
    
    $matricula = $_POST['senha'];
    $senha = $_POST['senha'];
		
		$query = mysql_query("SELECT * FROM funcionario WHERE senha LIKE '".$senha."%'") or die(mysql_error());
			
			while($array = mysql_fetch_array($query)){
				$_SESSION['nomeLogado'] = $array['nome'];
				$_SESSION['login2'] = $array['login'];
				$_SESSION['senha2'] = $array['senha'];
			}
				
				if ((isset($senha) && isset($_SESSION['senha2'])) && ($senha == $_SESSION['senha2'])){
					
					/*$query2 = mysql_query("SELECT * FROM permissao_usuario WHERE login LIKE '".$_SESSION['login2']."%'") or die(mysql_error());
					
					while($array2 = mysql_fetch_array($query2)){
						$_SESSION['codigo_permissao'] = $array2['codigo_permissao'];
						if ($_SESSION['codigo_permissao'] == 1){
							header("Location: telaAdministrador.php");
						}
						else if (($_SESSION['codigo_permissao'] == 2) || ($_SESSION['codigo_permissao'] == 3)){
							header("Location: telaInicial.php");
						}
					}*/
                    $_SESSION['codigo_permissao'] == 1;
			        header("Location: telaInicial.php");
				}else{
					echo "<script>alert('Erro na autenticacao.')</script>";
				}
	}else{
		echo "<script>alert('Existem campos obrigatorios nao preenchidos!')</script>";
	}

}

?>

<html>
	<head>
		<title>SISGEFRAN Online - Tela Login</title>
		<link rel="stylesheet" type="text/css" href="css/meucss.css" />
		<script type="text/javascript" src="javaScript/validacoes.js"></script>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	</head>

	<body>
		<div id="principal">
		
		<div id="head"><center><img src="imagens/banner_biblioteca.jpg" width="1008" height="120"></center></div>
		<div id="conteudo">


		<div id="meio" style="text-align: justify;">

			<hr color="#333333" size="1px" style="margin-bottom:2px; margin-top:2px;" />
				<p align="center" class="style1"><strong>PÁGINA DE AUTENTICAÇÃO</strong></p>
			<hr color="#333333" size="1px" style="margin-bottom:2px; margin-top:2px;" />
			<br><br>
			
			<div id="esquerda" style="text-align: center;">
				<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<center><table>
					<tr>
					<td>Login:</td> 
						<td><input title="Informe a matrícula para fazer login." name="login" type="text" size="30" onkeypress="return numeros(event.keyCode, event.which);"></td>
					</tr>
					<tr>
						<td>Senha:</td>
						<td><input title="Informe a senha para fazer login." type="password" name="senha" size="30"></td>
					</tr>
					<tr></tr>
					<tr>
						<td></td>
						<td><input type="submit" name="enviar" value="       Entrar       " />
							<input type="Reset" name="enviar" value="       Apagar       " /></td>
					</tr>
					<tr>
						<td></td>
						<td><p align="center"><input src="imagens/login/exclamacao.png" type="image"> Esqueceu a senha? Fale com o <br>Administrador do sistema!</p></td>
					</tr>
					</table></center>
				</form>
				
			</div>
			
			<div id="direita" style="text-align: justify;">
				<center><table>	
					<tr>
						<td><p align="center"><input src="imagens/login/login.png" type="image" width="130" height="130"></p></td>
						<td><p align="center"><input src="imagens/login/cadeado.png" type="image" width="130" height="130"></p></td>
					</tr>
				</table></center>
				<br>
				O SISGEFRAN conta com um sistema de login que serve como uma das ferramentas do usuário para que seus cadastros, informações
				e documentos fiquem em total segurança.
				
			</div>
		</div>
		
		<div id="foot">
			<center>Todos os direitos reservados.
			Proibida a reprodução total ou parcial do conteúdo deste sistema sem prévia autorização.</center>
		</div>				
		
		</div>
	</body>
</html>