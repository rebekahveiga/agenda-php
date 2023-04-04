<header>
<head>
    <h3>
        <?php echo "<br>" ?>
        <img src="imgs/user.png" alt="person" width="35px">
        Contatos</h3>
        <?php echo "<br>"?>
        <!-- <link rel="stylesheet" href="styles/estilo2.css"> -->
</head>
</header>
<div>
    <a class="btn btn-secondary" href="index.php?menuop=cadastro ">Adicionar Contato</a>
    <div>
        <?php echo "<br>"?>
        <form action="index.php?menuop=contacts" method="post">Pesquisar Contato</a>
        <div class="input-group">        
            <input class="form-control" type="text" name="pesquisar_ctt">
            <button class="btn btn-sm btn-dark" type="submit">Pesquisar</button>
        </div>
    </div>
</div>
    <?php
   
    $pesquisar_ctt = isset($_POST["pesquisar_ctt"]) ? $_POST["pesquisar_ctt"] : "";
    echo "<br>";


    $sql = "SELECT * FROM contatosagenda 
    WHERE 
    id='{$pesquisar_ctt}' or
    nome LIKE '%{$pesquisar_ctt}%'
    ORDER BY nome ASC
    ";
    $result = mysqli_query($conexao, $sql) or die("erro ao executar a consulta " .mysqli_error($conexao));
    ?>
<div class="container">
<div class="row">
  <?php while($dados = mysqli_fetch_assoc($result)): ?>
  <div class="col-md-6">
    <div class="card mb-3">
      <img src="imagens/<?=$dados["foto"]?>" class="card-img-top img-contato" alt="Foto de <?=$dados["nome"]?>">
      <div class="card-body">
        <h5 class="text-primary"><?=$dados["nome"]?></h5>
        <p class="text-danger"><?=$dados["email"]?></p>
        <p class="text-success"><?=$dados["telefone"]?></p>
        <a href="index.php?menuop=editar&id=<?=$dados['id']?>" class="btn btn-primary">Editar</a>
        <a href="index.php?menuop=excluir&id=<?=$dados['id']?>" class="btn btn-danger">Excluir</a>
      </div>
    </div>
  </div>
  <?php endwhile; ?>
</div>
</div>

<br>
<?php

$sql_total = "SELECT id FROM contatosagenda";
$result = mysqli_query($conexao, $sql_total) or die(mysqli_error($conexao));

?>