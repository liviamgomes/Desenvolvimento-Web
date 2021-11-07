<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exportar Fornecedores</title>
    <h3>Exportar Fornecedor</h3>
    <form action="forn_exportar.php" method="POST">
        <input type="submit" name="op" value="Exportar" >
        <br>
    </form>
</head>
<body>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servidor = "localhost";
    $usuario = "root";
    $senha = "senha.123";
    $nomeBanco = "3daw";

    $conn = new mysqli($servidor,$usuario,$senha,$nomeBanco);//$conn é o nome da variavel que se chamará essa conexao

    if($conn->connect_error){
        die("Conexão com erro" . $conn->connect_error); /* exibe mensagem de "conexao com erro"
                                                        e concatena com o erro que virá no connect_error*/
    }

    $sql = "SELECT * FROM fornecedor"; //executa essa query
    $result = $conn->query($sql); //guarda a query na variavel resultado

    $arq = fopen("Fornecedores.txt","w");

    while($linha = $result->fetch_assoc()) //resultado do select é armazenado na variavel linha
    {
        fwrite($arq,$linha["codFornecedor"].$linha["nome_fantasia"].$linha["razao_social"].$linha["cnpj"].$linha["email"].$linha["tel1"].$linha["tel2"]."\n");
    }

    fclose($arq);


}

else{
    $ehPost = false;
}

?>
</body>
</html>
