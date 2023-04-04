<header>
    <?php echo "<br>"?>
    <h3>Cadastrar novo contato</h3>
</header>
<div>

<form class="needs-validation" action="index.php?menuop=insert_contact" method="post" enctype="multipart/form-data" novaLidate>
    <div class="mb-3">
        <label class="form-label" for="nome">Nome</label>
        <input class="form-control" type="text" name="nome" required>
        <div class="valid-feedback">
            Input Correto!.
        </div>
        <div class="invalid-feedback">
            Obrigatório Preenchimento sem caracteres especiais
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label" for="data_nascimento">Data de Nascimento</label>
        <input class="form-control"  type="date" name="data_nascimento" required >
    </div>

    <div class="mb-3">
        <label class="form-label" for="email">Email</label>
        <div class="input-group">
            <span class="input-group-text">@</span>
            <input class="form-control" type="email" name="email" required>
        </div>
       
    </div>

    <div class="mb-3">
        <label class="form-label" for="telefone">Telefone</label>
        <input class="form-control" type="text" name="telefone" required>
        
    </div>

    <div class="mb-3">
        <label for="foto">Imagem contato: </label>
        <input type="file" class="form-control-file" name="foto" id="foto" required>
    </div>

    <div class="mb-3">
        <input class="btn btn-dark" type="submit" value="Adicionar" name="btnAdd">
    </div>

</form>

</div>
