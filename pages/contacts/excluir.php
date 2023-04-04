<header>
    <h3>Excluir Contato</h3>
    <link>
</header>


<?php
$id = mysqli_real_escape_string($conexao,$_GET["id"]);
$sql = "DELETE FROM contatosagenda WHERE id = '{$id}'";

mysqli_query($conexao, $sql) or die("erro ao excluir contato " . mysqli_error($conexao));
echo "Contato excluído com Sucesso";
?>