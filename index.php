<?php
	
	session_start();
	session_unregister("nomeLogado");
	session_unregister("login2");
	session_unregister("senha2");
	
?>

<?php

if (isset($_POST['enviar'])){

include("conectar.php");

	if (($_POST['login'] != "") && ($_POST['senha'] != "")){
    
    $matricula = $_POST['login'];
    $senha = $_POST['senha'];
		
		$query = mysql_query("SELECT * FROM funcionario WHERE senha LIKE '".$senha."%'") or die(mysql_error());
			
			while($array = mysql_fetch_array($query)){
				$_SESSION['nomeLogado'] = $array['nome'];
				$_SESSION['login2'] = $array['login'];
				$_SESSION['senha2'] = $array['senha'];
			}
				
				if ((isset($senha) && isset($_SESSION['senha2'])) && ($senha == $_SESSION['senha2'])){
					
					$_SESSION['codigo_permissao'] == 1;
			        header("Location: telaInicial.htm");
				}else{
					$_SESSION['errado'] == 1;
				}
	}else{
		echo "<script>alert('Existem campos obrigatorios nao preenchidos!')</script>";
	}

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="We provide free flash templates, free templates, free flash header"/>
<meta name="keywords" content="free flash buttons, free templates, free flash header"/>
<link href="css/stylesheet.css" rel="stylesheet" type="text/css" />
<title>SISGEFRAN</title>
<script src="js/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="js/sound.js" type="text/javascript"></script>
<script src="js/jquery142.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
<!--BEGIN OF TERMS OF USE. DO NOT EDIT OR DELETE THESE LINES. IF YOU EDIT OR DELETE THESE LINES AN ALERT MESSAGE MAY APPEAR WHEN TEMPLATE WILL BE ONLINE-->
<style>#free-flash-header a,#free-flash-header a:hover {color:#c2cae0;}#free-flash-header a:hover {text-decoration:none}</style>

</style>
<![endif]-->
</head>
<body>
	<div id="holder">
	
	<div id="copy" style="height: 75px; position: absolute; bottom: 0px; left:0px; border: none; width: 100%;"></div>
		
	<div id="body_bottom_bgd">
			<div id="page">
				<div id="left_col">																																																																																																																																																																								
					<div id="logo"><img src="images/logo.png"/ alt="free flash template logo"><h1><span class="blue">SISGEFRAN</span> Online</h1></div>																																																	
					<div class="clearboth"></div>	
					<center><table>	
						<tr><td><p align="center"><input src="images/login/login.png" type="image" width="130" height="130"></p></td></tr>
					</table></center>					
	</div-->																							
				</div>
				<div id="right_col">
								<div id="header"><span class="blue">SISGEFRAN</span> Sistema de Gerenciamento de Vendas de Frango</div>
								<div id="left_bgd">																									
											<div id="header_id"></div>
											<script type="text/javascript">
												var hasRightVersion = DetectFlashVer(requiredMajorVersion, requiredMinorVersion, requiredRevision);
													if(hasRightVersion) {
														myFlashHeader('flash/header',540,150,'#FFFFFF','header_id','custom.xml');
												} else {
													alert("Your version of Flash player is rather old. We suggest you to upgrade your Flash player to version "+requiredMinorVersion+" (at least).The latest version  can be downloaded here : http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash.");
													}
												
											</script>
											<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
												<center><table>
													<tr><td>Login:</td> <td><input title="Informe a matrícula para fazer login." name="login" type="text" size="27" ></td></tr>
													<tr><td>Senha:</td> <td><input title="Informe a senha para fazer login." type="password" name="senha" size="27"></td></tr>
													<tr></tr>
													<tr>
														<td></td>
														<td><input type="submit" name="enviar" value="       Entrar       " />
															<input type="Reset" name="enviar" value="       Apagar       " /></td>
													</tr>
													<tr>
														<td></td><td><p align="center"><input src="images/login/exclamacao.png" type="image">Esqueceu a senha? Fale com o <br>Administrador do sistema!</p></td>
													</tr>
													<tr>
														<td></td><td><p align="center"><?php if($_SESSION['errado'] == 1) echo "<input src='images/login/errado.jpg' type='image'>Login incorreto!"; ?></p></td>
													</tr>
												</table></center>
											</form>										
								</div><!--end left_bgd-->
								
				</div><!--end right_col-->
				
				<div class="clearboth"></div>	
			</div>
			<div id="copyright">Todos os direitos reservados. Proibida a reprodução total ou parcial do conteúdo deste sistema sem prévia autorização.</div>
	</div>
<br/>
</div>
</body>
</html>