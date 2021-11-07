<?php
require "forn_config.php";
$valido = false;
$codFornecedor = addslashes($_GET['codFornecedor']);


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $valido = true;
}

if ($valido) {
    $sql = "SELECT * FROM fornecedor WHERE codFornecedor = '$codFornecedor';";
    $sql = $pdo->query($sql);
    if ($sql->rowCount() == 1) {
        $fornecedor = $sql->fetch();
        echo "
        <form action='' method='post'>
            <table>
                <tr>
                    <td style='width: 150px;'>Nome Fantasia: </td>
                    <td><input type='text' value='".$fornecedor['nome_fantasia']."'></td>
                </tr>
                <tr>
                    <td style='width: 150px;'>Razão Social: </td>
                    <td><input type='text' value='".$fornecedor['razao_social']."'></'td>
                </tr>
                <tr>
                    <td style='width: 150px;'>CNPJ: </td>
                    <td><input type='text' value='".$fornecedor['cnpj']."'></td>
                </tr>
                <tr>
                    <td style='width: 150px;'>E-mail: </td>
                    <td><input type='text' value='".$fornecedor['email']."'></td>
                </tr>
                <tr>
                    <td style='width: 150px;'>Telefone 1: </td>
                    <td><input type='text' value='".$fornecedor['tel1']."'></td>
                </tr>
                <tr>
                    <td style='width: 150px;'>Telefone 2: </td>
                    <td><input type='text' value='".$fornecedor['tel2']."'></td>
                </tr>
            </table>
            <input type='submit' value='Apagar'>
        
        </form>";
    } else {
        echo "Fornecedor não encontrado.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sqlCommand = "DELETE FROM fornecedor WHERE codFornecedor = '$codFornecedor';";
    try {
        $sql = "START TRANSACTION;";
        $sql = $pdo->query($sql);
        $sqlCommand = $pdo->query($sqlCommand);
        $sql = "COMMIT;";
        $sql = $pdo->query($sql);
        echo "Fornecedor apagado com sucesso.";
    } catch (\Exception $e) {
        $sql = "ROLLBACK;";
        $sql = $pdo->query($sql);
        echo "Erro ao apagar o fornecedor.<br>";

        $e->getMessage();
    }
}
echo "<br><a href='forn_home.php'><button>HOME</button></a>";