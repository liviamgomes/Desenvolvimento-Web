<?php
require "forn_config.php";
$sql = "SELECT * FROM fornecedor;";

$sql = $pdo->query($sql);

echo "<h1>Lista de Fornecedores</h1>";
if ($sql->rowCount() > 0) {
    foreach ($sql->fetchAll() as $fornecedor) {


        echo "<tr>";
        echo "<td>".$fornecedor["codFornecedor"]."</td>";
        echo "<td>".$fornecedor["nome_fantasia"]."</td>";
        echo "<td>".$fornecedor["razao_social"]."</td>";
        echo "<td>".$fornecedor["cnpj"]."</td>";
        echo "<td>".$fornecedor["email"]."</td>";
        echo "<td>".$fornecedor["tel1"]."</td>";
        echo "<td>".$fornecedor["tel2"]."</td>";
        echo "<td>
        
                
                <a href='forn_alterar.php?codFornecedor=".$fornecedor['codFornecedor']."'><button>Alterar</button></a>
                <a href='forn_excluir.php?codFornecedor=".$fornecedor['codFornecedor']."'><button>Excluir</button></a>
                
              </td>
              <br>
              <br>
            </tr>
            ";

    }
} else {
    echo "Nenhum fornecedor cadastrado no sistema.";
}
echo "<a href='forn_home.php'><button>HOME</button></a>"
?>