<?php

	session_start();
	include("conectar.php");

?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

if (isset($_POST['enviar'])){
	
	if (($_POST["funcionario"] != "") && ($_POST["produto"] != "") && ($_POST["cliente"] != "") && ($_POST["dataVenda"] != "") && ($_POST["quantidade"] != "")){
	
	$codFuncionario = $_POST["funcionario"];
	$data = $_POST["dataVenda"];
		$d=explode("/",$data);
		$data=$d[2]."-".$d[1]."-".$d[0];
	
	$codProduto = $_POST["produto"];
	$codCliente = $_POST["cliente"];
	$quantidade = $_POST["quantidade"];
	$tipo = $_POST["opcoes"];
	
	if ($tipo == 2){
		$status = 1;
	}else if ($tipo == 1){
		$status = 0;
	}
	
	$query = mysql_query("SELECT * FROM venda WHERE codVenda = (SELECT MAX(codVenda) FROM venda)");
			
	while($array = mysql_fetch_array($query)){
		$_SESSION['ultimaVenda'] = $array['codVenda'];
	}
	
	$ultimoCod = $_SESSION['ultimaVenda'] + 1; 
	
	$query2 = mysql_query("SELECT * FROM produto WHERE codProduto LIKE '".$codProduto."%'") or die(mysql_error());
			
	while($array2 = mysql_fetch_array($query2)){
		$_SESSION['quantidadeProduto'] = $array2['qtd'];
	}

	if ($_SESSION['quantidadeProduto'] >= $quantidade){
		$sql1 = mysql_query("INSERT INTO venda (codVenda, codFuncionario, codProduto, codCliente, dataVenda, qtdVenda, tipoEntrega, statusEntrega) VALUES ('$ultimoCod', '$codFuncionario', '$codProduto', '$codCliente', '$data', '$quantidade', '$tipo', '$status')") or die( mysql_error());
		$quantidadeRestante = $_SESSION['quantidadeProduto'] - $quantidade;
		
		$sql2 = mysql_query("UPDATE produto SET qtd='$quantidadeRestante' WHERE codProduto='$codProduto' ") or die(mysql_error());
		
		echo "<script> if(confirm('Venda realizada com sucesso, deseja realizar outra venda?')) 
								window.location='vendas.php' 
							else
								window.location='telaInicial.php' </script>";

	}else{
		echo "<script> if(confirm('Quantidade insuficiente no estoque para venda, deseja tentar novamente?')) 
								window.location='vendas.php' 
							else
								window.location='telaInicial.php' </script>";	
	}	
	
	}else{
		echo "<script> if(confirm('Existem campos obrigatórios não preenchidos, deseja tentar novamente?')) 
							window.location='vendas.php' 
						else
							window.location='telaInicial.php' </script>";
	}
}
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>SISGEFRAN - Vendas</title>
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
												AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','250','height','30','src','flash/item','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/item','flashvars','xml_filename=menu.xml&item_text=Início&item_link=telaInicial.php&item_text_size=20&item_ajust=35&item_selected=0' ); //end AC code
											</script>
											<!-- "About us" button -->
											<script type="text/javascript">
												AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','250','height','30','src','flash/item','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/item','flashvars','xml_filename=menu.xml&item_text=Clientes&item_link=clientes.php&item_text_size=20&item_ajust=35&item_selected=0' ); //end AC code
											</script>	
											<!-- "About us" button -->
											<script type="text/javascript">
												AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','250','height','30','src','flash/item','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/item','flashvars','xml_filename=menu.xml&item_text=Produtos&item_link=produtos.php&item_text_size=20&item_ajust=35&item_selected=0' ); //end AC code
											</script>
											<!-- "Services" button -->								
											<script type="text/javascript">
												AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','250','height','30','src','flash/item','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/item','flashvars','xml_filename=menu.xml&item_text=Vendas &item_link=vendas.php&item_text_size=20&item_ajust=35&item_selected=0' ); //end AC code
											</script>
											<!-- "Solutions" button -->								
											<script type="text/javascript">
												AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','250','height','30','src','flash/item','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/item','flashvars','xml_filename=menu.xml&item_text=Reservas&item_link=reserva.php&item_text_size=20&item_ajust=35&item_selected=0' ); //end AC code
											</script>													
											<!-- "Contact" button -->								
											<script type="text/javascript">
												AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','250','height','30','src','flash/item','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','flash/item','flashvars','xml_filename=menu.xml&item_text=Contato&item_link=contato.php&item_text_size=20&item_ajust=35&item_selected=0' ); //end AC code
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
									   <li class='active'><a href='vendas.php'><span>Realizar Venda</span></a></li>
									   <li><a href='alterarVenda.php'><span>Alterar Venda</span></a></li>
									   <li><a href='cancelarVenda.php'><span>Cancelar Venda</span></a></li>
									   <li class='last'><a href='fluxoEntrega.php'><span>Fluxo Entrega à Domicílio</span></a></li>
									</ul>
									</div>	
									
									<h1><center>Realizar Venda</center></h1>
									<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
										<table>
										<tr>
										<td>Código do Funcionário: </td>
										<td><font color="#FF0000">*</font> <select name="funcionario">
										<?php
										 $sql="SELECT * FROM funcionario, usuario WHERE funcionario.codFuncionario=usuario.codUsuario";
										 
										 $result = mysql_query($sql);
										 
										 while ($resultado = mysql_fetch_array($result)){
											$codigoFuncionario = $resultado["codFuncionario"];
											$nomeFuncionario = $resultado["nome"];
											echo "<option value=\"$codigoFuncionario\">$codigoFuncionario - $nomeFuncionario</option>";
										}?>
										</select></td>										
										</tr>
										<tr>
										<td>Código do Produto: </td>
										<td><font color="#FF0000">*</font> <select name="produto">
										<?php
										 $sql="SELECT * FROM `produto`";
										 
										 $result = mysql_query($sql);
										 
										 while ($resultado = mysql_fetch_array($result)){
											$codigoProduto = $resultado["codProduto"];
											$nomeProduto = $resultado["nome"];
											echo "<option value=\"$codigoProduto\">$codigoProduto - $nomeProduto</option>";
										}?>
										</select></td>
										</tr>
										<tr>
										<td>Código do Cliente: </td>
										<td><font color="#FF0000">*</font> <select name="cliente">
										<?php
										 $sql="SELECT * FROM cliente, usuario WHERE cliente.codCliente=usuario.codUsuario";
										 
										 $result = mysql_query($sql);
										 
										 while ($resultado = mysql_fetch_array($result)){
											$codigoCliente = $resultado["codCliente"];
											$nomeCliente = $resultado["nome"];
											echo "<option value=\"$codigoCliente\">$codigoCliente - $nomeCliente</option>";
										}?>
										</select></td>
										</tr>
										<tr>
										<td>Data de Venda: </td>
										<td><font color="#FFFFFF">*</font> <input title="Informe a data da venda." type="date" name="dataVenda" size="50" maxlength="100" onkeyup="Formatadata(this,event)" onblur="VerificaData(this,this.value)" onkeypress="return numeros(event.keyCode, event.which);"/></a><br></td>
										</tr>
										<tr>
										<td>Quantidade Vendida:</td>
										<td><font color="#FFFFFF">*</font> <input title="Informe a quantidade" type="text" name="quantidade"  size="50" maxlength="100" onkeypress="return numeros(event.keyCode, event.which);"/><br></td>
										</tr>
										<br>
										<tr>
										<td><input type="radio" name="opcoes" value="1" />Entregar a domicílio</td>
										<td><input type="radio" name="opcoes" value="2" />Retirar na venda</td>
										</tr>
										</table>
														
										<center><table><tr>
											<td><br><input type="submit" name="enviar" value="Realizar Venda"></td>
											<td><br><input type="Reset" name="apagar" value="Limpar Campos"></td>
											</tr></table></center>
															
										</form>
										<br>
											
											</td>
									  </tr>
									</table>
								</td>
											    
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
