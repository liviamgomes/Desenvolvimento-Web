<?php
require "forn_config.php";



$valido = false;
$edita = false;
$continua = false;
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
                    <td><input type='text' name='nome_fantasia' value='".$fornecedor['nome_fantasia']."' required></td>
                </tr>
                <tr>
                    <td style='width: 150px;'>Razão Social: </td>
                    <td><input type='text' name='razao_social' value='".$fornecedor['razao_social']."' required></'td>
                </tr>
                <tr>
                    <td style='width: 150px;'>CNPJ: </td>
                    <td><input type='text' name='CNPJ' value='".$fornecedor['cnpj']."' required></td>
                </tr>
                <tr>
                    <td style='width: 150px;'>E-mail: </td>
                    <td><input type='text' name='email' value='".$fornecedor['email']."' required></td>
                </tr>
                <tr>
                    <td style='width: 150px;'>Telefone 1: </td>
                    <td><input type='text' name='tel1' value='".$fornecedor['tel1']."' required></td>
                </tr>
                <tr>
                    <td style='width: 150px;'>Telefone 2: </td>
                    <td><input type='text' name='tel2' value='".$fornecedor['tel2']."'></td>
                </tr>
            </table>
            <input type='submit' value='Alterar'>
        
        </form>";
    } else {
        echo "Fornecedor não encontrado.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["razao_social"]) && !empty($_POST["razao_social"]) &&
        isset($_POST["nome_fantasia"]) && !empty($_POST["nome_fantasia"]) &&
        isset($_POST["cnpj"]) && !empty($_POST["cnpj"]) &&
        isset($_POST["email"]) && !empty($_POST["email"]) &&
        isset($_POST["tel1"]) && !empty($_POST["tel1"]) &&
        isset($_POST["tel2"])
    ) {
        $razao_social = addslashes(converteMaiusculo($_POST["razao_social"]));
        $nome_fantasia = addslashes(converteMaiusculo($_POST["nome_fantasia"]));
        $CNPJ = addslashes(trataString($_POST["cnpj"]));
        $email = addslashes($_POST["email"]);
        $tel1 = addslashes(trataString($_POST["tel1"]));
        $tel2 = addslashes(trataString($_POST["tel2"]));
        $edita = true;
    }

}

if ($edita) {
    $sqlCommand = "SELECT * FROM fornecedor WHERE cnpj = '$cnpj';";
    $sqlCommand = $pdo->query($sqlCommand);
    $continua = true;
    if ($sqlCommand->rowCount() >= 1) {
        foreach($sqlCommand->fetchAll() as $fornecedor){
            if ($fornecedor['cnpj'] == $cnpj && $fornecedor['codFornecedor'] != $codFornecedor){
                echo "CNPJ já cadastrado no sistema.";
                $continua = false;
            }
        }

    } else {
        $continua = true;
    }
    if ($continua) {
        $sqlCommand = "UPDATE fornecedor set razao_social = '$razao_social', 
            nome_fantasia = '$nome_fantasia',
            cnpj = '$cnpj',
            email = '$email',
            tel1 = '$tel1',
            tel2 = '$tel2'
        WHERE codFornecedor = '$codFornecedor';";
        try {
            $sql = "START TRANSACTION;";
            $sql = $pdo->query($sql);
            $sqlCommand = $pdo->query($sqlCommand);
            $sql = "COMMIT;";
            $sql = $pdo->query($sql);
            echo "Fornecedor editado com sucesso.";
        } catch (Exception $e) {
            $sql = "ROLLBACK;";
            $sql = $pdo->query($sql);
            echo "Erro na edição do Fornecedor<br>";
            $e->getMessage();
        }
    }
}

function trataString($valor) {
    $valor = trim($valor);
    $valor = str_replace(".", "", $valor);
    $valor = str_replace(",", "", $valor);
    $valor = str_replace("-", "", $valor);
    $valor = str_replace("/", "", $valor);
    $valor = str_replace("+", "", $valor);
    $valor = str_replace(" ", "", $valor);
    $valor = str_replace("_", "", $valor);
    return $valor;
}

function converteMaiusculo($palavra) {
    return strtr(strtoupper($palavra), "àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß");
}


echo "<br><a href='forn_home.php'><button>HOME</button></a>";