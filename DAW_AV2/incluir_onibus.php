<?php

$id = $_GET["id"];
$marca = $_GET["marca"];
$modelo = $_GET["modelo"];
$temBanheiro = $_GET["temBanheiro"];
$temArCondicionado = $_GET["temArCondicionado"];
$chassis = $_GET["chassis"];
$placa = $_GET["placa"];

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodeDados = "faeterj3dawnoite";
$conn = new mysqli($servidor, $usuario, $senha, $bancodeDados);
if ($conn->connect_error) {
    die("Conexao perdida");
}

$sql = "Insert into onibus('id', 'marca', 'modelo', 'qtdAssentos', 'temBanheiro', 'temArCondicionado', 'chassis', 'placa'
) VALUES ('$id','$marca','$modelo','$qtdAssentos','$temBanheiro','$temArCondicionado','$chassis','$placa')";
$result = $conn->query($sql);
//   if ($conn->query($sql) === TRUE) {
$sucesso = true;

$sql = "SELECT * from onibus where id='$id'";
$result = $conn->query($sql);

//$onibus = array($id, $marca, $modelo, $qtdAssentos, $temBanheiro, $temArCondicionado,$chassis,$placa);
$jOnibus = json_encode($result);
echo $jOnibus;
?>