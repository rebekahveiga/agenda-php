<header>
    <h3>Atualizar contato</h3>
</header>

<?php
    $id = mysqli_real_escape_string($conexao, $_POST["id"]);
    $nome = mysqli_real_escape_string($conexao, $_POST["nome"]);
    $data_nascimento = mysqli_real_escape_string($conexao, $_POST["data_nascimento"]);
    $email =mysqli_real_escape_string($conexao, $_POST["email"]);
    $telefone = mysqli_real_escape_string($conexao, $_POST["telefone"]);
    
    if (isset($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $error = $_FILES['foto']['error'];
        $upload_dir = 'imagens/';

        // Verifica se não houve erros no upload
        if ($error == UPLOAD_ERR_OK) {
            // Move o arquivo para a pasta de uploads
            move_uploaded_file($tmp_name, $upload_dir . $foto);
        } else {
            echo "Erro ao fazer upload da imagem";
            exit();
        }
    } else {
        // Se não houver arquivo de imagem, mantém a imagem atual
        $sql_select = "SELECT foto FROM contatosagenda WHERE id={$id}";
        $result_select = mysqli_query($conexao, $sql_select);
        $row_select = mysqli_fetch_assoc($result_select);
        $foto = $row_select['foto'];
    }

   
    $sql = "UPDATE contatosagenda SET
    nome = '{$nome}',
    data_nascimento = '{$data_nascimento}',
    email = '{$email}',
    telefone = '{$telefone}',
    foto = '{$foto}'
    WHERE id = '{$id}'
    ";

        $result = mysqli_query($conexao, $sql) or die("erro ao executar a consulta. " . mysqli_error($conexao));

        echo "o contato foi atualizado com sucesso<br>"
?>

<img src="https://cdn-icons-png.flaticon.com/512/7653/7653745.png" width="80%" height="800px">






    