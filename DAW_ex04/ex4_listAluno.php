<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulário</title>

</head>
<body>
<?php

?>
<a href = "ex4_cadAluno.php">Inserir Aluno</a>
<a href = "ex4_altAluno.php">Alterar Aluno</a>
<a href = "ex4_listAluno.php">Listar Aluno</a>
<a href = "ex4_excAluno.php">Excluir Aluno</a>

<h1>Listar aluno</h1>

<table>
    <tr>
        <th>Matrícula</th>
        <th>Nome Aluno</th>
        <th>Email</th>
        <th>Idade</th>
        <th>Ações</th>
    </tr>
    <tr>
        <td>123456</td>
        <td>Jose da Silva</td>
        <td>ze@faeterj-rio.edu.br</td>
        <td>21</td>
        <td><a href="ex4_altAluno.php?matricula=123456">Altera</a>
    </tr>
</table>

</body>
</html>
