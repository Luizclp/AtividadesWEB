<html>
<head>
<title>Relatório de Estudantes</title>
<?php include ('config.php');  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="estudanteLst.php?botao=gravar" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan=10 align="center">Relatório de Estudantes</td>
  </tr>
  <tr>
    <td width="10%" align="right">Nome:</td>
    <td width="10%"><input type="text" name="nome"  /></td>
    <td width="10%" align="right">Nota 1B:</td>
    <td width="10%"><input type="text" name="nota1" size="3" /></td>
    <td width="10%" align="right">Nota 2B:</td>
    <td width="10%"><input type="text" name="nota2" size="3" /></td>
    <td width="10%" align="right">Mensalidade:</td>
    <td width="10%"><input type="text" name="mensalidade" size="3" /></td>
    <td width="10%"><input type="submit" name="botao" value="Gerar" /></td>
  </tr>
</table>
</form>

<?php if (@$_POST['botao'] == "Gerar") { ?>

<table width="95%" border="1" align="center">
  <tr bgcolor="#9999FF">
  <th>Nome</th>
  <th>Média</th>
  <th>Mensalidade</th>
  <th>Desconto</th>
  <th>Líquido</th>
</tr>

<?php

  $mes_atual = date("m");
	$nome = $_POST['nome'];
	$mensalidade = $_POST['mensalidade'];
  $nota1 = $coluna['nota1'];
  $nota2 = $coluna['nota2'];
  $media = ($nota1 + $nota2) / 2;

  if ($media == 10) {
        $perc = 0.20;
    } elseif ($media >= 7) {
        $perc = 0.10;
    } else {
        $perc = 0.05;
    }
  $desconto = $mensalidade * $perc;
  $liquido = $mensalidade - $desconto;
	

	$query = "SELECT *
			  FROM alunos 
			  WHERE matricula > 0 ";
	$query .= ($nome ? " AND nome LIKE '%$nome%' " : "");
	$query .= ($mensalidade ? " AND mensalidade = '$mensalidade' " : "");
	$query .= " ORDER by nome ASC";
        $result = mysqli_query($mysqli, $query);

	while ($coluna=mysqli_fetch_array($result)) 
	{
		
	?>
     <tr>
      <td><?php echo $coluna['nome']; ?></td>
      <td><?php echo number_format($media, 1, ',', '.'); ?></td>
      <td><?php echo number_format($mensalidade, 2, ',', '.'); ?></td>
      <td><?php echo number_format($desconto, 2, ',', '.'); ?></td>
      <td><?php echo number_format($liquido, 2, ',', '.'); ?></td>
    </tr>

    <?php
	
	} // fim while
?>
</table>
<?php	
}
?>

<a href="index.html" >Home </a>

</body>