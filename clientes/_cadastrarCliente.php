<?php

include("../conectar.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

if (isset($_POST['enviar'])){
	
	if (($_POST["nome"] != "") && ($_POST["dataNasc"] != "") && ($_POST["cpf"] != "") && ($_POST["fone"] != "") && ($_POST["endereco"] != "")){
	
	$nome = $_POST["nome"];
	$data = $_POST["dataNasc"];
		$d=explode("/",$data);
		$data=$d[2]."-".$d[1]."-".$d[0];
	
	$endereco = $_POST["endereco"];
	$cpf = $_POST["cpf"];
	$fone = $_POST["fone"];

	$sql1 = mysql_query("INSERT INTO cliente (nome, cpf, telefone, endereco, dataNascimento) VALUES ('$nome', '$cpf', '$fone', '$endereco', '$data')") or die( mysql_error());
				
		echo "<script> if(confirm('Cadastro Efeturado com Sucesso!')) 
							window.location='../telaInicial.htm' 
						else
							window.location='../telaInicial.htm' </script>";

	}
}
}
?>

<h1>CADASTRAR CLIENTE</h1>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<table>
	<tr>
	<td>Nome: </td>
	<td><font color="#FF0000">*</font> <input title="Informe o nome (Apenas Letras)." type="text" name="nome" size="50" maxlength="100" ><br></td>
	</tr>
	<tr>
	<td>Data Nascimento: </td>
	<td><font color="#FF0000">*</font> <input title="Informe a data de nascimento (Formato: 00/00/0000)." type="date" name="dataNasc" size="50" maxlength="100" onkeyup="Formatadata(this,event)" onBlur="VerificaData(this.value);" onkeypress="return numeros(event.keyCode, event.which);"/></a><br></td>
	</tr>
	<tr>
	<td>CPF: </td>
	<td><font color="#FF0000">*</font> <input title="Informe o CPF (Exemplo: 999.999.999-99)." type="text" name="cpf" size="50" maxlength="100" onblur="javascript: validarCPF(this.value);" onkeypress="javascript: mascaraCPF(this, cpf_mask);" /><br></td>
	</tr>
	<tr>
	<td>Fone:</td>
	<td><font color="#FF0000">*</font> <input title="Informe o celular da editora (Formato: (00) 0000-0000)." type="text" name="fone"  size="50" maxlength="100" onkeydown="mascara( this )" onkeyup="mascara( this )" onkeypress="return numeros(event.keyCode, event.which);"/><br></td>
	</tr>
	<tr>
	<td>Endereco:</td>
	<td><font color="#FF0000">*</font> <input title="Informe o Endereço." type="text" name="endereco"  size="50" maxlength="100" /><br></td>
	</tr>
	</table>
					
	<center><table><tr>
		<td><br><input type="submit" name="enviar" value="Cadastrar Aluno"></td>
		<td><br><input type="Reset" name="apagar" value="     Apagar tudo    "></td>
		</tr></table></center>
						
	</form>


