<div align = "center"> 
    
    <form method="post" action="add_cliente.php">

        NOME: <input type="text" name="nome" required>
        <br> <br>

        CPF: <input type="number" name="cpf" value="<?=$cpf?>"required><br>
        <input name="id" type="hidden" value="<?=$id?>"> <br>

        RG: <input type="number" name="rg" value="<?=$rg?>"required><br>
        <input name="id" type="hidden" value="<?=$id?>"> <br>

        DATA DE NASCIMENTO:<input type="date" name="data_nascimento" value="<?=$data_nascimento?>"required><br>
        <input name="id" type="hidden" value="<?=$id?>"> <br>

        USUÁRIO: <input type="text" name="usuario"required> <br>
        <br>

        LOGRADOURO: <input type="text" name="logradouro"required>
        <br> <br>

        NÚMERO: <input type="text" name="numero"required>
        <br> <br>

        COMPLEMENTO: <input type="text" name="complemento"required>
        <br> <br>

        BAIRRO: <input type="text" name="bairro"required>
        <br> <br>

        <input name="enviar" type="submit" value="CADASTRAR"required>
          
    </form>

</div>

<?php 
    require_once('config.php');
        if(isset($_POST['enviar'])){
            $nome=$_POST['nome'];
            $cpf=$_POST['cpf'];
            $rg=$_POST['rg'];
            $data_nascimento=$_POST['data_nascimento'];
            $usuario=$_POST['usuario'];
            $logradouro=$_POST['logradouro'];
            $numero=$_POST['numero'];
            $complemento=$_POST['complemento'];
            $bairro=$_POST['bairro'];
    

        try{
            $stmte = $pdo->prepare("INSERT INTO cliente(nome, cpf, rg, data_nascimento, usuario, logradouro, numero, complemento, bairro) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmte -> bindParam(1, $nome, PDO::PARAM_STR);
            $stmte -> bindParam(2, $cpf, PDO::PARAM_STR);
            $stmte -> bindParam(3, $rg, PDO::PARAM_STR);
            $stmte -> bindParam(4, $data_nascimento, PDO::PARAM_STR);
            $stmte -> bindParam(5, $usuario, PDO::PARAM_STR);
            $stmte -> bindParam(6, $logradouro, PDO::PARAM_STR);
            $stmte -> bindParam(7, $numero, PDO::PARAM_STR);
            $stmte -> bindParam(8, $complemento, PDO::PARAM_STR);
            $stmte -> bindParam(9, $bairro, PDO::PARAM_STR);
            
            $executa = $stmte->execute();

            if($executa){
                echo 'Dados inseridos com sucesso';
                header('location: listagem_cliente.php');
            }else{
                echo "erro ao inserir dados";
            }

        
        
        
        }catch(PDOException $e){
            echo $e->GetMessage();
        }
        
        }
    

?>
<br> <br>
<button><a href="index.php">VOLTAR</a></button>
