<?php
//recuperando id que quero editar
$idContact = $_GET["id"]; 
//puxar dados do meu id
$sql = "SELECT * FROM contatosagenda WHERE id={$idContact}";
$result = mysqli_query($conexao, $sql) or die("erro ao puxar dados do id " . mysqli_error($conexao));
$dados =  mysqli_fetch_assoc($result);

?>
<header>
    <?php echo "<br>"?>
    <h3>Editar Contato</h3>
</header>

<div class="row">
    <div class="col-6" >

    <form action="index.php?menuop=att-contato" method="post" enctype="multipart/form-data">
        <div class="mb-3 col-3">
            <label class="form-label" for="id">ID</label>
            <div class="input-group">
                <input class="form-control" type="text" name="id" value="<?=$dados["id"]?>";>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="nome">Nome</label>
            <div class="input-group">
            <input class="form-control" type="text" name="nome" value="<?=$dados["nome"]?>";>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="data_nascimento">Data de Nascimento</label>
            <input class="form-control"type="date" name="data_nascimento" value="<?=$dados["data_nascimento"]?>";>
        </div>

        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <div class="input-group">
                <span class="input-group-text">@</span>
                <input class="form-control"type="email" name="email" value="<?=$dados["email"]?>";>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="telefone">Telefone</label>
            <div class="input-group">
            <input class="form-control"type="text" name="telefone" value="<?=$dados["telefone"]?>";>
            </div>
        </div>

        <div class="mb-3">
            <label for="foto">Imagem contato: </label>
            <img src="imagens/<?=$dados["foto"]?>" width="100">
            <input type="file" class="form-control-file" name="foto" id="foto" required>
        </div>


        <div class="mb-3" >
            <input class= "btn btn-dark" type="submit" value="Atualizar" name="btnAtt">
        </div>

   
    
</div>
</div>
