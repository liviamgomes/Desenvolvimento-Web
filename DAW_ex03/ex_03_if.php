<?php
$aluno = $_GET["aluno"];
$email = $_GET["email"];
$idade = $_GET["idade"];
$endereco = $_GET["endereco"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulário</title>

</head>
<body>
<h1><?php echo "O nome é $aluno."; ?></h1>
<h1><?php echo "O e-mail é $email."; ?></h1>
<h1><?php echo "A idade é $idade anos."; ?></h1>
<h1><?php echo "O endereço é $endereco."; ?></h1>

</body>
</html>
