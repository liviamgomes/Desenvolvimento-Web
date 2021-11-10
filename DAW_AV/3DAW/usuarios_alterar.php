<?php
require "usuarios_config.php";

$valido = false;
$edita = false;
$continua = false;
$matricula = addslashes($_GET['matricula']);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $valido = true;
}

if ($valido) {
    $sql = "SELECT * FROM usuarios WHERE matricula = '$matricula';";
    $sql = $pdo->query($sql);
    if ($sql->rowCount() == 1) {
        $usuarios = $sql->fetch();
        echo "
        <form action='' method='post'>
            <table>
                <tr>
                    <td style='width: 150px;'>Matrícula: </td>
                    <td><input type='text' name='maricula' value='".$usuarios['matricula']."' required></td>
                </tr>
                <tr>
                    <td style='width: 150px;'>Nome: </td>
                    <td><input type='text' name='nome' value='".$usuarios['nome']."' required></'td>
                </tr>
                <tr>
                    <td style='width: 150px;'>CNPJ: </td>
                    <td><input type='text' name='funcao' value='".$usuarios['funcao']."' required></td>
                </tr>
                
            </table>
            <input type='submit' value='Alterar'>
        
        </form>";
    } else {
        echo "Usuário não encontrado.";
    }
}


if ($edita) {
    $sqlCommand = "SELECT * FROM usuarios WHERE matricula = '$matricula';";
    $sqlCommand = $pdo->query($sqlCommand);
    $continua = true;
    if ($sqlCommand->rowCount() >= 1) {
        foreach($sqlCommand->fetchAll() as $usuarios){
            if ($usuarios['matricula'] == $matricula && $usuarios['nome'] != $nome){
                echo "Usuário já cadastrado no sistema.";
                $continua = false;
            }
        }

    } else {
        $continua = true;
    }
    if ($continua) {
        $sqlCommand = "UPDATE usuarios set nome = '$nome', 
            funcao = '$funcao',
            matricula = '$matricula'
            
        WHERE matricula = '$matricula';";
        try {
            $sql = "START TRANSACTION;";
            $sql = $pdo->query($sql);
            $sqlCommand = $pdo->query($sqlCommand);
            $sql = "COMMIT;";
            $sql = $pdo->query($sql);
            echo "Usuário editado com sucesso.";
        } catch (Exception $e) {
            $sql = "ROLLBACK;";
            $sql = $pdo->query($sql);
            echo "Erro na edição do usuário<br>";
            $e->getMessage();
        }
    }
}


echo "<br><a href='usuarios_home.php'><button>HOME</button></a>";