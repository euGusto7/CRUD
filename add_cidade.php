<div align = "center"> 
    <form method="post" action="add_cidade.php">

        NOME: <input type="text" name="nome">
        <br> <br>
        <input name="enviar" type="submit" value="CADASTRAR" required>
          
    </form>

</div>

<?php 
    require_once('config.php');
        if(isset($_POST['enviar'])){
            $nome=$_POST['nome'];

        try{
            $stmte = $pdo->prepare("INSERT INTO cidade(nome) VALUES(?)");
            $stmte -> bindParam(1, $nome, PDO::PARAM_STR);
            $executa = $stmte->execute();

            if($executa){
                echo 'Dados inseridos com sucesso';
                header('location: listagem.php');
            }else{
                echo "erro ao inserir dados";
            }

        
        
        
        }catch(PDOException $e){
            echo $e->GetMessage();
        }
        
        }
    

?>
<br> <br>
<button><a href="index.php">VOLTAR PARA O MENU</a></button>