<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exportar usuários</title>
    <h3>Exportar usuários</h3>
    <form action="usuarios_exportar.php" method="POST">
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

    $conn = new mysqli($servidor,$usuario,$senha,$nomeBanco);

    if($conn->connect_error){
        die("Conexão com erro" . $conn->connect_error);
    }

    $sql = "SELECT * FROM usuarios"; 
    $result = $conn->query($sql); 

    $arq = fopen("usuarios.txt","w");

    while($linha = $result->fetch_assoc())
    {
        fwrite($arq,$linha["matricula"].$linha["nome"].$linha["funcao"]."\n");
    }

    fclose($arq);


}

else{
    $ehPost = false;
}

?>
</body>
</html>