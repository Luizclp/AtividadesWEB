<html>

<head>
<title>Cadastro de Aluno</title>

<?php include ('config.php');  ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="estudante.php" method="post" name="estudante">
<table width="200" border="1">
  <tr>
    <td colspan="2">Cadastro de Estudante</td>
  </tr>
  <tr>
    <td>Nome:</td>
    <td><input type="text" name="nome" ></td>
  </tr>
  <tr>
    <td>Nota 1B:</td>
    <td><input type="number" name="nota1" ></td>
  </tr>
  <tr>
    <td>Nota 2B:</td>
    <td><input type="Number" name="nota2" ></td>
  </tr>
  <tr>
    <td>Mensalidade:</td>
    <td><input type="number" name="mensalidade">
    </td>
  </tr>
  <tr>
    <td colspan="2" align="right"><input type="submit" value="Gravar" name="botao"></td>
    </tr>	
</table>
</form>

<?php
if (@$_POST['botao'] == "Gravar") 
	{
		
		$nome = $_POST['nome'];
		$nota1 = $_POST['nota1'];
		$nota2 = $_POST['nota2'];
    $mensalidade = $_POST['mensalidade'];

		$insere = "INSERT into alunos (nome, nota1, nota2, mensalidade) 
    VALUES ('$nome', '$nota1', '$nota2', '$mensalidade')";
		mysqli_query($mysqli, $insere) or die ("Não foi possivel inserir os dados");
	}

?>

<a href="index.html" >Home </a>
</body>
</html>