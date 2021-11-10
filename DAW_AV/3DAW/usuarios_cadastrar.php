<?php
require "usuarios_config.php";

echo "
<form action='' method='post'>
    <table>
        <tr>
        <td style='width: 170px;'>Nome: </td>
        <td><input type='text' name='nome' required></td>
        </tr>    
        <tr>
        <td style='width: 170px;'>Matrícula: </td>
        <td><input type='text' name='matricula' required></td>
        </tr>        
        <tr>
        <td style='width: 170px;'>Função: </td>
        <td><input type='text' name='funcao' required></td>
        </tr>
 
    </table>
    <input type='submit' value='Cadastrar'>
    
</form>
<br>
<a href='usuarios_home.php'><button>HOME</button></a>
";
$valido = false;


    if ($valido) {
        $sqlCommand = "SELECT * FROM usuarios WHERE matricula = 'matricula';";
        $sqlCommand = $pdo->query($sqlCommand);
        $continua = false;
        if ($sqlCommand->rowCount() >= 1) {
            echo "Matrícula já cadastrada no sistema.";
        } else {
            $continua = true;
        }
        if ($continua) {
            $sqlCommand = "INSERT INTO usuarios set nome = '$nome', 
                funcao = '$funcao',
                matricula = '$matricula';";
                
            try {
                $sql = "START TRANSACTION;";
                $sql = $pdo->query($sql);
                $sqlCommand = $pdo->query($sqlCommand);
                $sql = "COMMIT;";
                $sql = $pdo->query($sql);
                echo "Usuário cadastrado com sucesso.";
            } catch (Exception $e) {
                $sql = "ROLLBACK;";
                $sql = $pdo->query($sql);
                echo "Erro no cadastro<br>";
                $e->getMessage();
            }
        }
    }



