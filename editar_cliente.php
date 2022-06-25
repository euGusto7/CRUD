<?php 
    require_once('config.php');

    $id=$_GET['id'];

    $sth = $pdo->prepare("SELECT id, nome, usuario, cpf, rg, data_nascimento, logradouro, numero, complemento, bairro from cliente WHERE id = :id");
    $sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um bindValue
    $sth->execute();

    $reg = $sth->fetch(PDO::FETCH_OBJ);
    $nome = $reg->nome;
    $cpf = $reg->cpf;
    $rg = $reg->rg;
    $data_nascimento = $reg->data_nascimento;
    $logradouro = $reg->logradouro;
    $usuario = $reg->usuario;
    $numero = $reg->numero;
    $complemento = $reg->complemento;
    $bairro = $reg->bairro;
    
?>
<div align="center">
    <form method="post" action="">
        Nome<input type="text" name="nome" value="<?=$nome?>"><br>
        <input name="id" type="hidden" value="<?=$id?> required"> <br>

        CPF<input type="number" name="cpf" value="<?=$cpf?>"><br>
        <input name="id" type="hidden" value="<?=$id?>"> <br>

        RG<input type="number" name="rg" value="<?=$rg?>"><br>
        <input name="id" type="hidden" value="<?=$id?>"> <br>

        Data de Nascimento<input type="date" name="data_nascimento" value="<?=$data_nascimento?>"><br>
        <input name="id" type="hidden" value="<?=$id?>"> <br>

        Usuario<input type="text" name="usuario" value="<?=$usuario?>"><br>
        <input name="id" type="hidden" value="<?=$id?>"> <br>

        Logradouro<input type="text" name="logradouro" value="<?=$logradouro?>"><br>
        <input name="id" type="hidden" value="<?=$id?>"> <br>

        Numero<input type="number" name="numero" value="<?=$numero?>"><br>
        <input name="id" type="hidden" value="<?=$id?>"> <br>

        Complemento<input type="text" name="complemento" value="<?=$complemento?>"><br>
        <input name="id" type="hidden" value="<?=$id?>"> <br>

        Bairro<input type="text" name="bairro" value="<?=$bairro?>"><br>
        <input name="id" type="hidden" value="<?=$id?>">

        <input name="enviar" type="submit" value="Editar">
    </form>
</div>

<?php

if(isset($_POST['enviar'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $data_nascimento = $_POST['data_nascimento'];
    $usuario = $_POST['usuario'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    

    $sql = "UPDATE cliente SET nome = :nome, usuario = :usuario, cpf = :cpf, rg = :rg, data_nascimento = :data_nascimento, logradouro = :logradouro, numero = :numero, complemento = :complemento, bairro = :bairro WHERE id = :id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
    $sth->bindParam(':nome', $_POST['nome'], PDO::PARAM_INT);   
    $sth->bindParam(':cpf', $_POST['cpf'], PDO::PARAM_INT);
    $sth->bindParam(':rg', $_POST['rg'], PDO::PARAM_INT);
    $sth->bindParam(':data_nascimento', $_POST['data_nascimento'], PDO::PARAM_INT);
    $sth->bindParam(':usuario', $_POST['usuario'], PDO::PARAM_INT);
    $sth->bindParam(':logradouro', $_POST['logradouro'], PDO::PARAM_INT);
    $sth->bindParam(':numero', $_POST['numero'], PDO::PARAM_INT);
    $sth->bindParam(':complemento', $_POST['complemento'], PDO::PARAM_INT);
    $sth->bindParam(':bairro', $_POST['bairro'], PDO::PARAM_INT);
   if($sth->execute()){
        print "<script>alert('Registro alterado com sucesso!');location='listagem_cliente.php';</script>";
    }else{
        print "Erro ao editar o registro!<br><br>";
    }
}
?>
<a href="listagem_cliente.php">Voltar</a>




