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
        $aluno = $_POST["aluno"];
        $email = $_POST["email"];
        $idade = $_POST["idade"];
        $endereco = $_POST["endereco"];
    }
    else{
        $isPost=false;
    }

    if($isPost){
    echo "<h1>O nome é $aluno.</h1>";
    echo "<h1>O e-mail é $email.</h1>";
    echo "<h1>A idade é $idade anos.</h1>";
    echo "<h1>O endereço é $endereco.</h1>";
    }
?>

<form action= "ex_03_post.php" method="POST">
    Nome    : <br><input type="text" name="aluno"><br><br>
    E-mail  : <br><input type="text" name="email"><br><br>
    Idade   : <br><input type="number" name="idade"><br><br>
    Endereço: <br><input type="text" name="endereco"><br><br>
    <input type="submit" value="ENVIAR">
</form>
</body>
</html>

