<h1>CONSULTAR CLIENTE</h1>
	<form id="form1" name="form1" method="post">
					<center><table>
						<tr>
						<td>Informe o nome do Cliente para Consulta?</td>
						</tr>
						<tr>
						<td>Nome:</td>
						<td><font color="#FF0000">*</font> <input title="Informe o nome do aluno a ser consultado." type="text" name="nome" id="nome" size="30"><br></td>
						</tr>
					</table></center>
					<center><table>
						<tr>
						<td><input type="submit" name="enviar" value="Consultar"/></td>
						<td><input type="button" name="limpar" value="Limpar Campos" onclick="javascript: limparCampo()"></td>
						</tr>
					</table></center>
				</form>
				Ultimos Dados Consultados:
				<hr color="#333333" size="1px" style="margin-bottom:2px; margin-top:2px;" /><br>
				<center><table>
						<tr>
						<td>Nome do Cliente:</td>
						<td><input type="text" name="nome_consulta" id="nome_consulta" size="30" value="<?php if(isset($_SESSION['nome'])) echo $_SESSION['nome']; ?>" disabled="disabled"/><br></td>
						</tr>
						<tr>
						<td>CPF:</td>
						<td><input type="text" name="matricula_consulta" id="matricula_consulta" size="30" value="<?php if(isset($_SESSION['cpf'])) echo $_SESSION['cpf']; ?>" disabled="disabled"/><br></td>
						</tr>
						<tr>
						<td>Endereco:</td>
						<td><input type="text" name="emprestimo_consulta" id="emprestimo_consulta" size="30" value="<?php if(isset($_SESSION['endereco'])) echo $_SESSION['endereco']; ?>" disabled="disabled"/><br></td>
						</tr>
						<tr>
						<td>Data de Nascimento:</td>
						<td><input type="text" name="data_consulta" id="data_consulta" size="30" value="<?php if(isset($_SESSION['dataNascimento'])) echo $_SESSION['dataNascimento']; ?>" disabled="disabled"/><br></td>
						</tr>
						<tr>
						<td>Telefone:</td>
						<td><input type="text" name="email_consulta" id="email_consulta" size="30" value="<?php if(isset($_SESSION['telefone'])) echo $_SESSION['telefone']; ?>" disabled="disabled"/><br></td>
						</tr>
				</center></table>
				
<?php

	$_SESSION['nome'] = "";
	$_SESSION['cpf'] = "";
	$_SESSION['telefone'] = "";
	$_SESSION['endereco'] = "";
	$_SESSION['dataNascimento'] = "";

?>