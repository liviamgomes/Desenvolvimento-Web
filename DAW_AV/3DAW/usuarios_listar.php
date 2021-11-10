<?php
require "usuarios_config.php";
$sql = "SELECT * FROM usuarios;";

$sql = $pdo->query($sql);

echo "<h1>Lista de Usuários</h1>";
if ($sql->rowCount() > 0) {
    foreach ($sql->fetchAll() as $usuarios) {


        echo "<tr>";
        echo "<td>".$usuarios["matricula"]."</td>";
        echo "<td>".$usuarios["nome"]."</td>";
        echo "<td>".$usuarios["funcao"]."</td>";
        echo "<td>
        
                
                <a href='usuarios_alterar.php?matricula=".$usuarios['matricula']."'><button>Alterar</button></a>
                <a href='usuarios_excluir.php?matricula=".$usuarios['matricula']."'><button>Excluir</button></a>
                
              </td>
              <br>
              <br>
            </tr>
            ";

    }
} else {
    echo "Nenhum usuário cadastrado no sistema.";
}
echo "<a href='usuarios_home.php'><button>HOME</button></a>"
?>