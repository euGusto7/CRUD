<?php
require_once('config.php');
try{
    $stmte = $pdo->query("SELECT * FROM $tabela");
    $executa = $stmte->execute();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head><title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"> 
</head>

<h1 align="center">CRUD Muito Simples usando PDO</h1>

<div align="center">
<a href="add_cidade.php">Nova Cidade</a>
</div>
<br>

    <table border="2" align="center">
    <tr>
		<td><b>ID</td>
		<td><b>Nome</td>
		<td colspan="2" align="center">Ação</td>
	</tr>
<?php
    if($executa){
        while($reg = $stmte->fetch(PDO::FETCH_OBJ)){ // Para recuperar um ARRAY utilize PDO::FETCH_ASSOC 
?>
    <tr>
		<td><?=$reg->id?></td>
		<td><?=$reg->nome?></td>
		<td><a href="editar.php?id=<?=$reg->id?>">Editar</a></td>
        <td><a href="apagar.php?id=<?=$reg->id?>">Excluir</a></td></tr>
<?php
       }
       print '</table>';
    }else{
           echo 'Erro ao inserir os dados';
    }
}catch(PDOException $e){
      echo $e->getMessage();
}
?>
<br> <br> <br>
<button><a href="index.php">VOLTAR PARA O MENU</a></button>