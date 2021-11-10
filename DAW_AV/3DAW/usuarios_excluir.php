<?php
require "usuarios_config.php";
$valido = false;
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
                    <td style='width: 170px;'>Matrícula: </td>
                    <td><input type='text' value='".$usuarios['matricula']."'></td>
                </tr>
                <tr>
                    <td style='width: 170px;'>Nome: </td>
                    <td><input type='text' value='".$usuarios['nome']."'></'td>
                </tr>
                <tr>
                    <td style='width: 170px;'>Função: </td>
                    <td><input type='text' value='".$usuarios['funcao']."'></td>
                </tr>
                
            </table>
            <input type='submit' value='Apagar'>
        
        </form>";
    } else {
        echo "Usuário não encontrado.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sqlCommand = "DELETE FROM usuarios WHERE matricula = '$matricula';";
    try {
        $sql = "START TRANSACTION;";
        $sql = $pdo->query($sql);
        $sqlCommand = $pdo->query($sqlCommand);
        $sql = "COMMIT;";
        $sql = $pdo->query($sql);
        echo "Usuario apagado com sucesso.";
    } catch (\Exception $e) {
        $sql = "ROLLBACK;";
        $sql = $pdo->query($sql);
        echo "Erro ao apagar usuário.<br>";

        $e->getMessage();
    }
}
echo "<br><a href='usuarios_home.php'><button>HOME</button></a>";