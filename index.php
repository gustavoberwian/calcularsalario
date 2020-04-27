<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculador Salário</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
    <header>
        <div id="logo"><img src="./images/rf.png" alt="Receita Federal"></div>
        <h1>Calcular salário</h1>
    </header>
    <main>
        <form action="./php/action.php" method="POST">
            <input name="name" type="text" pattern="^(?![ ])(?!.*[ ]{2})((?:e|da|do|das|dos|de|d'|D'|la|las|el|los)\s*?|(?:[A-Z][^\s]*\s*?)(?!.*[ ]$))+$" required placeholder="Digite seu nome..."/><br>
            <input name="salary" type="number" pattern="[0-9]+$" required placeholder="Digite seu salário..."/><br>
            <input type="submit" name="Enviar" value="Enviar"/>
        </form>
        <div id="table">
            <?php 
                $dados = file_get_contents("arquivo.txt");
                $dadosFormatados = explode("|", $dados);
            ?>
            <table>
                <th id="nometh">Nome</th>
                <th id="salarioth">Salário Líquido</th>
                <?php                     
                    foreach($dadosFormatados as $key => $value){    
                        if($key%2==0){
                            echo("<tr><td>".$value."</td>");
                        }
                        else{
                            echo("<td>".$value."</td></tr>");
                        }
                    }   
                ?>
            </table>
        </div>
        <form action="./php/action.php" method="POST">
            <div id="limpar">
                <input type="submit" name="Limpar" value="Limpar" />
            </div>  
        </form>              
    </main>
</body>
</html> 