<?php

require "ex4_config.php";
$valido = false;
$matricula = addslashes($_GET['matricula']);


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $valido = true;
}

if ($valido) {
    $sql = "SELECT * FROM alunos WHERE matricula = '$matricula';";
    $sql = $pdo->query($sql);
    if ($sql->rowCount() == 1) {
        $matricula = $sql->fetch();
        echo "
        <form action='' method='post'>
        
            <table>
                
                <tr>
                    <td style='width: 150px;'>Aluno: </td>
                    <td><input type='text' value='".$aluno['aluno']."'></td>
                </tr>
                <tr>
                    <td style='width: 150px;'>E-mail: </td>
                    <td><input type='text' value='".$email['email']."'></td>
                </tr>
                <tr>
                    <td style='width: 150px;'>Endereço: </td>
                    <td><input type='text' value='".$endereco['endereco']."'></td>
                </tr>
                <tr>
                    <td style='width: 150px;'>Idade: </td>
                    <td><input type='text' value='".$idade['idade']."'></td>
                </tr>
                
            </table>
            <input type='submit' value='Apagar'>
        
        </form>";
    } else {
        echo "Aluno não encontrado.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sqlCommand = "DELETE FROM alunos WHERE matricula = '$matricula';";
    try {
        $sql = "START TRANSACTION;";
        $sql = $pdo->query($sql);
        $sqlCommand = $pdo->query($sqlCommand);
        $sql = "COMMIT;";
        $sql = $pdo->query($sql);
        echo "Aluno excluído com sucesso.";
    } catch (\Exception $e) {
        $sql = "ROLLBACK;";
        $sql = $pdo->query($sql);
        echo "Erro ao excluir aluno.<br>";

        $e->getMessage();
    }
}
echo "<br><a href='home.php'><button>Voltar</button></a>";

?>
