<?php
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estilo.css" rel="stylesheet" media="screen">
    <title>Menu</title>

</head>
<body>
<input type="checkbox" id="bt_menu">
<label for="bt_menu">&#9776;</label>

<nav class="menu">
	<ul>
    	
          <li><a href="#">Cliente</a>
        	<ul>
            	<li><a href="add_cliente.php">Cadastro</a>
                <li><a href="listagem_cliente.php">Listagem</a>
            </ul>
        </li>
        <li><a href="#">Cidade</a>
        	<ul class="submenu">
            	<li><a href="add_cidade.php">Cadastro</a>
                <li><a href="listagem.php">Listagem</a>
               
            </ul>
        </li>
      
        
    </ul>


	  		
	    
    
    
</body>
</html>

