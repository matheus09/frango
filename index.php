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
		
		$query = mysql_query("SELECT * FROM funcionario WHERE login = '$matricula'");
			
			while($array = mysql_fetch_array($query)){
				$idFunc = $array['codFuncionario'];
				$_SESSION['login'] = $array['login'];
				$_SESSION['senha'] = $array['senha'];
				
				$query2 = mysql_query("SELECT * FROM usuario WHERE codUsuario = '$idFunc'");
				
				while($array2 = mysql_fetch_array($query2)){
					$_SESSION['nomeLogado'] = $array2['nome'];
				}
				
				$query3 = mysql_query("SELECT * FROM permissao_usuario WHERE codPermissaoUsuario = '$idFunc'");
				
				while($array3 = mysql_fetch_array($query3)){
					$_SESSION['permissao_usuario'] = $array3['codigo_permissao'];
				}
			}
			
			if (($matricula == $_SESSION['login']) && ($senha == $_SESSION['senha'])){
			        header("Location: telaInicial.php");
			}else{
				
				$query4 = mysql_query("SELECT * FROM administrador WHERE login = '$matricula'");
				while($array4 = mysql_fetch_array($query4)){
					$idAdmin = $array4['codAdm'];
					$_SESSION['login2'] = $array4['login'];
					$_SESSION['senha2'] = $array4['senha'];
					
					$query5 = mysql_query("SELECT * FROM usuario WHERE codUsuario = '$idAdmin'");
				
					while($array5 = mysql_fetch_array($query5)){
						$_SESSION['nomeLogado'] = $array5['nome'];
					}
					
					$query6 = mysql_query("SELECT * FROM permissao_usuario WHERE codPermissaoUsuario = '$idAdmin'");
					
					while($array6 = mysql_fetch_array($query6)){
						$_SESSION['permissao_usuario'] = $array6['codigo_permissao'];
					}
				}
				
				if (($matricula == $_SESSION['login2']) && ($senha == $_SESSION['senha2'])){
					header("Location: telaAdministrador.php");
				}else{
					echo "<script>alert('Login ou Senha incorreto!')</script>";
				}	
			}
			

	
	}else{
		echo "<script>alert('Existem campos obrigatorios nao preenchidos!')</script>";
	}

}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>SISGEFRAN</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<!--BEGIN OF TERMS OF USE. DO NOT EDIT OR DELETE THESE LINES. IF YOU EDIT OR DELETE THESE LINES AN ALERT MESSAGE MAY APPEAR WHEN TEMPLATE WILL BE ONLINE-->
<style>#free-flash-header a,#free-flash-header a:hover {color:#c2cae0;}#free-flash-header a:hover {text-decoration:none}</style>
<!--END OF TERMS OF USE-->
<script src="flash/jscripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="flash/jscripts/AC_ActiveX.js" type="text/javascript"></script>
<script src="flash/jscripts/jquery142.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
<!--[if lt IE 7]>
  <link rel="stylesheet" type="text/css" href="css/stylesheetie6.css" />
<![endif]-->
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">																																																																																																																																																																																																																																																																																																																																										
	<div id="holder">

<table width="100%" cellspacing="0" cellpadding="0" style="margin-top:20px; "> 
  <tr> 
    <td align="center" valign="middle"> 
		<table width="850" border="0" cellspacing="0" cellpadding="0" style="border-top: 10px #c8efff solid;"> 

				<tr> 
				  <td style="font-family:arial;font-size:8px;">					
					<!-- Flash Intro Header -->
					<script type="text/javascript">AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','850','height','165','src','flash/header','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/header','flashvars','xml_filename=header.xml&header_image_1=header_image_1.jpg&text_sup_y=50&text_inf_y=10' ); //end AC code</script><noscript>free template</noscript>																																																																																																																																																																																																																																																																																																																																																		
					</td> 
				</tr>
				<tr> 
				  <td width="100%">
				  				<table width="850"  border="0" cellspacing="0" cellpadding="0">
								<tr>
								<td   valign="top" style="padding-top:10px;background-color:#FFFFFF;">				
									<table align=center>
										<center><td><input src="images/login/login.png" type="image" width="130" height="130"></td></center>
									</table>
								</td>
								<td style="background-color:#edfaff;">
									<br><br>
											<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
												<table align=center>
													<tr><td>Login:</td> <td><input title="Informe a login para entrar no sistema." name="login" type="text" size="30" ></td></tr>
													<tr><td>Senha:</td> <td><input title="Informe a senha para fazer login." type="password" name="senha" size="30"></td></tr>
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
												</table>
											</form>		    
											    
								</td>
								</tr>
								</table>
				  </td> 
				</tr>				
				<tr> 
				  <td style="font-family:arial;font-size:8px;">				  
				  <!-- Flash footer -->	
					<div id="copyright">Todos os direitos reservados. Proibida a reprodução total ou parcial do conteúdo deste sistema sem prévia autorização.</div>
				  	</td> 
				</tr>								 
	  </table>
    </td>
  </tr>   
</table>
<br/>
</div>
</body>
</html>
