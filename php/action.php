<?php 
    if(isset($_POST['Enviar'])){
        $name = $_POST['name'];
        $salarioBruto = $_POST['salary'];
        $arquivo = fopen("../arquivo.txt","a+");

        if($salarioBruto<=1045){
            $salarioINSS = $salarioBruto-($salarioBruto*0.075);
        }
        else if($salarioBruto>1045.01 && $salarioBruto<=2089.6){
            $salarioINSS = $salarioBruto-($salarioBruto*0.09);
        }
        else if($salarioBruto>2089.6 && $salarioBruto<=3134.4){
            $salarioINSS = $salarioBruto-($salarioBruto*0.12);
        }
        else if($salarioBruto>3134.4 && $salarioBruto<=6101.06){
            $salarioINSS = $salarioBruto-($salarioBruto*0.14);
        }
        else if($salarioBruto>6101.06){
            $salarioINSS = $salarioBruto-671.11;
        }

        if($salarioINSS<=1903.98){
            $salarioLiquido = $salarioINSS;
        }
        else if($salarioINSS>1903.98 && $salarioINSS<=2826.65){
            $salarioLiquido = $salarioINSS-($salarioINSS*0.075)+142.8;
        }
        else if($salarioINSS>2826.65 && $salarioINSS<=3751.05){
            $salarioLiquido = $salarioINSS-($salarioINSS*0.15)+354.8;
        }
        else if($salarioINSS>3751.05 && $salarioINSS<=4664.68){
            $salarioLiquido = $salarioINSS-($salarioINSS*0.225)+636.13;
        }
        else if($salarioINSS>4664.68){
            $salarioLiquido = $salarioINSS-($salarioINSS*0.275)+869.36;
        }

        fwrite($arquivo, "Nome: ".$name." | Renda líquida: ".$salarioLiquido." |\r\n<hr/>");
     
        fclose($arquivo);
        $exibirArq = fopen("../arquivo.txt","r");
        header("Location: ../index.php");
    }
    if(isset($_POST['Limpar'])){
        unlink('../arquivo.txt');
            fopen('../arquivo.txt','w+');

        header("Location: ../index.php");
    }
?>
