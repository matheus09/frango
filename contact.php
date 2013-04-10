<?

$your_email = "vanusa-60@hotmail.com";

$headers= "From: ".$_POST['name']." <".$_POST['email'].">\r\n";
$headers.='Content-type: text/html; charset=utf-8';
mail($your_email, $_POST['subject'],  "
<html>
<head>
 <title>Contato Mensagem</title>
</head>
<body>
	Contato Mensagem<br><br>
	Nome : ".$_POST['name']."<br>
	E-mail : ".$_POST['email']."<br>
	Telefone : ".$_POST['telephone']."<br><br>
	Assunto : ".$_POST['subject']."<br>
	Mensagem : <br>".$_POST['message']."<br>
</body>
</html>" , $headers);
header("Location: ./index.htm?page=_contact_message.htm");
?>
