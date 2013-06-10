<?php

include("conectar.php");

	if (isset($_POST['enviar'])){	

		if (isset($_POST['cnpj']) && $_POST['cnpj'] != ""){
				
				$cnpj = $_POST["cnpj"];
				
				$query = mysql_query("SELECT * FROM fornecedor WHERE cnpj LIKE '".$cnpj."%'") or die(mysql_error());
									
				while($array = mysql_fetch_array($query)){
					$_SESSION['codigoFornecedor_excluir'] = $array['codFornecedor'];
					$_SESSION['nomeFornecedor_excluir'] = $array['nome'];
					$_SESSION['enderecoFornecedor_excluir'] = $array['endereço'];
					$_SESSION['cnpjFornecedor_excluir'] = $array['cnpj'];
					$_SESSION['telefoneFornecedor_excluir'] = $array['telefone'];
				}
					
		}

	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>SISGEFRAN - Fornecedor</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<!--BEGIN OF TERMS OF USE. DO NOT EDIT OR DELETE THESE LINES. IF YOU EDIT OR DELETE THESE LINES AN ALERT MESSAGE MAY APPEAR WHEN TEMPLATE WILL BE ONLINE-->
<style>#free-flash-header a,#free-flash-header a:hover {color:#c2cae0;}#free-flash-header a:hover {text-decoration:none}</style>
<!--END OF TERMS OF USE-->
<script src="flash/jscripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="flash/jscripts/AC_ActiveX.js" type="text/javascript"></script>
<script src="flash/jscripts/validacoes.js" type="text/javascript"></script>
<script src="flash/jscripts/jquery142.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
<link href="cssmenu/menu_assets/styles.css" rel="stylesheet" type="text/css">
<!--[if lt IE 7]>
  <link rel="stylesheet" type="text/css" href="css/stylesheetie6.css" />
<![endif]-->
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >					
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
									  <table  width="302" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td align="center" style="padding:1px;padding-top:10px;font-family:arial;font-size:7px;">
											<!-- "Home" button -->
											<script type="text/javascript">
												AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','250','height','30','src','flash/item','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/item','flashvars','xml_filename=menu.xml&item_text=Início&item_link=telaAdministrador.php&item_text_size=20&item_ajust=35&item_selected=0' ); //end AC code
											</script>
											<!-- "About us" button -->
											<script type="text/javascript">
												AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','250','height','30','src','flash/item','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/item','flashvars','xml_filename=menu.xml&item_text=Administrador&item_link=administrador.php&item_text_size=20&item_ajust=35&item_selected=0' ); //end AC code
											</script>	
											<!-- "About us" button -->
											<script type="text/javascript">
												AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','250','height','30','src','flash/item','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/item','flashvars','xml_filename=menu.xml&item_text=Funcionário&item_link=funcionario.php&item_text_size=20&item_ajust=35&item_selected=0' ); //end AC code
											</script>	
											<!-- "About us" button -->
											<script type="text/javascript">
												AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','250','height','30','src','flash/item','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/item','flashvars','xml_filename=menu.xml&item_text=Fornecedor&item_link=fornecedor.php&item_text_size=20&item_ajust=35&item_selected=0' ); //end AC code
											</script>
											<!-- "About us" button -->
											<script type="text/javascript">
												AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','250','height','30','src','flash/item','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/item','flashvars','xml_filename=menu.xml&item_text=Estoque&item_link=estoque.php&item_text_size=20&item_ajust=35&item_selected=0' ); //end AC code
											</script>																						
																					
											</td>
									  </tr>
									</table>
								</td>
								<td   style="background-color:#edfaff;">
									<table width="548"  border="0" cellspacing="0" >
									<tr>
									<td width="100%" style="padding:30px">
									<div style="text-align: right; border: 0;"><?php echo "Usuário Logado: "."<b>".$_SESSION['nomeLogado']."</b>".", <a href=index.php style=text-decoration:none> (Sair)</a>" ?></div>
									</table>
									<br>
									<div id='cssmenu'>
									<ul>
									   <li><a href='cadastrarFornecedor.php'><span>  Cadastrar Fornec  </span></a></li>
									   <li><a href='consultarFornecedor.php'><span>  Consultar Fornec  </span></a></li>
									   <li><a href='editarFornecedor.php'><span>  Editar Fornec  </span></a></li>
									   <li class='last'><a href='excluirFornecedor.php'><span>  Excluir Fornec  </span></a></li>
									</ul>
									</div>									
									
									<h1><center>Excluir Fornecedor</center></h1>
													<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
														<center><table>
															<tr>
															<td>Informe o CNPJ do Fornecedor para Consulta?</td>
															</tr>
															<tr>
															<td>CNPJ:</td>
															<td><font color="#FF0000">*</font> <input title="Informe o CNPJ do Fornecedor a ser consultado." type="text" name="cnpj" id="cnpj" size="30" onblur="javascript: validarCNPJ(this,this.value);" onkeypress="javascript: mascaraCNPJ(this, cnpj_mask);"><br></td>
															</tr>
														</table></center>
														<center><table>
															<tr>
															<td><input type="submit" name="enviar" value="Consultar"/></td>
															</tr>
														</table></center>
													</form>
													<br>
													<form id="form2" name="form2" method="post" action="excluirFornecedor2.php">
													Dados a Serem Excluidos:
													<hr color="#333333" size="1px" style="margin-bottom:2px; margin-top:2px;" /><br>
													<center><table>
															<tr>
															<td>Nome do Fornecedor:</td><td><input type="text" name="nome_consulta" id="nome_consulta" size="30" value="<?php if(isset($_SESSION['nomeFornecedor_excluir'])) echo $_SESSION['nomeFornecedor_excluir']; ?>" readonly="readonly"/><br></td>
															</tr>
															<tr>
															<td>CNPJ:</td><td><input type="text" name="cnpj_consulta" id="cnpj_consulta" size="30" value="<?php if(isset($_SESSION['cnpjFornecedor_excluir'])) echo $_SESSION['cnpjFornecedor_excluir']; ?>" readonly="readonly"/><br></td>
															</tr>
															<tr>
															<td>Endereco:</td><td><input type="text" name="endereco_consulta" id="endereco_consulta" size="30" value="<?php if(isset($_SESSION['enderecoFornecedor_excluir'])) echo $_SESSION['enderecoFornecedor_excluir']; ?>" readonly="readonly"/><br></td>
															</tr>
															<tr>
															<td>Telefone:</td><td><input type="text" name="telefone_consulta" id="telefone_consulta" size="30" value="<?php if(isset($_SESSION['telefoneFornecedor_excluir'])) echo $_SESSION['telefoneFornecedor_excluir']; ?>" readonly="readonly"/><br></td>
															</tr>
													</center></table>
													<center><table>
															<tr>
															<td><input type="submit" name="enviar" value="Confirmar Exclusao"/></td>
															<td><input type="Reset" name="apagar" value="Limpar Campos"></td>
															</tr>
														</table></center>
													</form>
													<br>		
								</td>
								</tr>
								</table>
				  </td> 
				</tr>				
				<tr> 
				  <td style="font-family:arial;font-size:8px;">
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

<?php

	$_SESSION['nomeFornecedor_excluir'] = "";
	$_SESSION['enderecoFornecedor_excluir'] = "";
	$_SESSION['cnpjFornecedor_excluir'] = "";
	$_SESSION['telefoneFornecedor_excluir'] = "";

?>

