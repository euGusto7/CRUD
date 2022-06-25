<?php
require_once('config.php');
try{
    $stmte = $pdo->query("SELECT * FROM cliente");
    $executa = $stmte->execute();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head><title></title><link href="css/estilo_index.css" rel="stylesheet" media="screen">
     
</head>

<h1 align="center">CRUD Muito Simples usando PDO</h1>

<div align="center">
<a href="add_cliente.php">NOVO(A) CLIENTE</a>
</div>
<br>

    <table border="2" align="center">
    <tr>
		<td><b>ID</td>
		<td><b>Nome</td>
        <td><b>CPF</td>
        <td><b>RG</td>
        <td><b>Data de Nascimento</td>
        <td><b>Usuario</td>
        <td><b>Logradouro</td>
        <td><b>Numero</td>
        <td><b>Complemento</td>
        <td><b>Bairro</td>

		<td colspan="2" align="center">Ação</td>
	</tr>
<?php        
    if($executa){
        while($reg = $stmte->fetch(PDO::FETCH_OBJ)){ // Para recuperar um ARRAY utilize PDO::FETCH_ASSOC 
?>
    <tr>
		<td><?=$reg->id?></td>
		<td><?=$reg->nome?></td>
        <td><?=$reg->cpf?></td>
        <td><?=$reg->rg?></td>
        <td><?=$reg->data_nascimento?></td>
        <td><?=$reg->usuario?></td>
        <td><?=$reg->logradouro?></td>
        <td><?=$reg->numero?></td>
        <td><?=$reg->complemento?></td>
        <td><?=$reg->bairro?></td>
		<td><a href="editar_cliente.php?id=<?=$reg->id?>">EDITAR</a></td>
        <td><a href="apagar_cliente.php?id=<?=$reg->id?>">EXCLUIR</a></td></tr>
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
<br> <br>
<button><a href="index.php">VOLTAR PARA O MENU</a></button>
