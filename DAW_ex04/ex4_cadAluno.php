<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulário</title>

</head>
<body>
<?php
//formulário com request e response no mesmo doc (html e php)
$isPost=true;
if($_SERVER["REQUEST_METHOD"]=="POST") {
    $matricula = $_POST["matricula"];
    $aluno = $_POST["aluno"];
    $email = $_POST["email"];
    $idade = $_POST["idade"];
    $endereco = $_POST["endereco"];
}
else{
    $isPost=false;
}

?>
<a href = "ex4_cadAluno.php">Inserir Aluno</a>
<a href = "ex4_altAluno.php">Alterar Aluno</a>
<a href = "ex4_listAluno.php">Listar Aluno</a>
<a href = "ex4_excAluno.php">Excluir Aluno</a>

<h1>Inserir aluno</h1>

<h1><?php if($isPost){echo "Aluno $aluno inserido com sucesso.";} ?></h1>

<form action= "ex4_cadAluno.php" method="POST">
    Matrícula: <br><input type="text" name="matricula"><br><br>
    Nome     : <br><input type="text" name="aluno"><br><br>
    E-mail   : <br><input type="text" name="email"><br><br>
    Idade    : <br><input type="number" name="idade"><br><br>
    Endereço : <br><input type="text" name="endereco"><br><br>
    <input type="submit" value="ENVIAR">
</form>
</body>
</html>