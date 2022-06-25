<?php
    require_once('config.php');

    $id=$_GET['id'];

    $sth = $pdo->prepare("SELECT id, nome from cliente WHERE id = :id");
    $sth->bindValue(':id', $id, PDO::PARAM_STR);
    $sth->execute();

    $reg = $sth->fetch(PDO::FETCH_OBJ);
    $nome = $reg->nome;
?>
<h3>Tem certeza de que deseja excluir o registro <?=$id?>?</h3>
<div align="center">
    Nome: <?=$nome?><br>

    <form method="post" action="">
    <input name="id" type="hidden" value="<?=$id?>">
    <input name="enviar" type="submit" value="Excluir!">
    </form>
</div>

<?php
    if(isset($_POST['enviar'])){
    $id = $_POST['id'];
        $sql = "DELETE FROM  cliente WHERE id = :id";
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);   
        if($sth->execute()){
            print "<script>alert('Registro excluído com sucesso!');location='listagem_cliente.php';</script>";
        }else{
            print "Erro ao exclur o registro!<br><br>";
        }
    }


?>