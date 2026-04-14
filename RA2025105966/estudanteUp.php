<html>
<head>
<title>Alteração de Funcionario</title>
<?php include ('config.php'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="estudanteUp.php?botao=gravar" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan="5" align="center">Alteração de Estudante</td>
  </tr>
  <tr>
    <td width="18%" align="right">Matricula:</td>
    <td width="26%"><input type="number" name="matricula" /></td>

    <td width="18%" align="right">Nome:</td>
    <td width="26%"><input type="text" name="nome" /></td>

    <td width="18%" align="right">nota 1B:</td>
    <td width="26%"><input type="number" name="nota1" /></td>
    
    <td width="18%" align="right">nota 2B:</td>
    <td width="26%"><input type="number" name="nota2" /></td>

    <td width="18%" align="right">Mensalidade:</td>
    <td width="26%"><input type="number" name="mensalidade" /></td>

    <td width="21%"><input type="submit" name="botao" value="Alterar" /></td>
  </tr>
</table>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['botao']) && $_POST['botao'] == "Alterar") {
    $matricula = intval($_POST['matricula']);
    $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $nota1 = mysqli_real_escape_string($mysqli, $_POST['nota1']);
    $nota2 = mysqli_real_escape_string($mysqli, $_POST['nota2']);
    $mensalidade = mysqli_real_escape_string($mysqli, $_POST['mensalidade']);

    // Validação básica
    if ($matricula > 0) {
        // Atualiza a idade se for fornecida
        if ($mensalidade > 0) {
            mysqli_query($mysqli, "UPDATE alunos SET mensalidade='$mensalidade' WHERE matricula='$matricula'");
        }

        if (!empty($nota1)) {
            mysqli_query($mysqli, "UPDATE alunos SET nota1='$nota1' WHERE matricula='$matricula'");
        }

        if (!empty($nota2)) {
            mysqli_query($mysqli, "UPDATE alunos SET nota2='$nota2' WHERE matricula='$matricula'");
        }

        if (!empty($nome)) {
            mysqli_query($mysqli, "UPDATE alunos SET nome='$nome' WHERE matricula='$matricula'");
        } 


        // Fecha a conexão com o banco de dados
        mysqli_close($mysqli);
    } else {
        echo "ID inválido.";
    }
}
?>

<a href="index.html">Home</a>
</body>
</html>