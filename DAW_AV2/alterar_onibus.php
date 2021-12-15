<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listar Ônibus</title>
</head>
<body>
<a href="listar_onibus.php">Listar Ônibus</a><br>
<a href="incluir_onibus.php">Incluir Ônibus</a><br>

<h1>Alterar Ônibus</h1>
<br><br>
<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodeDados = "faeterj3dawnoite";
$conn = new mysqli($servidor, $usuario, $senha, $bancodeDados);
if ($conn->connect_error) {
    die("Conexao perdida");
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $sql = "SELECT * from Onibus where id = $id";
    $result = $conn->query($sql);
    $linhaAluno = $result->fetch_assoc();

?>
<form action="" id="onibus" >
    ID:   <input type="text" name="id" id="id"><br>
    Marca:   <input type="text" name="marca" id="marca"><br>
    Modelo:   <input type="text" name="modelo" id="modelo"><br>
    Qtde de assentos:   <input type="text" name="qtdAssentos" id="qtdAssentos"><br>
    Tem banheiro:   <input type="text" name="temBanheiro" id="temBanheiro"><br>
    Tem ar condicionado:   <input type="text" name="temArCondicionado" id="temArCondicionado"><br>
    Chassis:   <input type="text" name="chassis" id="chassis"><br>
    Placa:   <input type="text" name="placa" id="placa"><br>
    <br/>
    <br/>
    <input type="button" value="Enviar" onclick="ValidarForm()">
</form>
<?php
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $temBanheiro = $_POST["temBanheiro"];
    $temArCondicionado = $_POST["temArCondicionado"];
    $chassis = $_POST["chassis"];
    $placa = $_POST["placa"];
    

    $sql = "UPDATE Onibus SET id='$id', marca='$marca', modelo='$modelo', temBanheiro='$temBanheiro', temArCondicionado='$temArCondicionado', chassis='$chassis', placa='$placa' where id = $id";
    $result = $conn->query($sql);
    echo "Ônibus $id alterado com sucesso.";
}
?>
</body>
</html>