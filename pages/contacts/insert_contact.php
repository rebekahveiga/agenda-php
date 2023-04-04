<?php

    $nome = mysqli_real_escape_string($conexao, $_POST["nome"]);
    $data_nascimento = mysqli_real_escape_string($conexao, $_POST["data_nascimento"]);
    $email = mysqli_real_escape_string($conexao, $_POST["email"]);
    $telefone = mysqli_real_escape_string($conexao, $_POST["telefone"]);

    // Verifica se o arquivo foi enviado
    if(isset($_FILES['foto'])) {

        $foto_nome = $_FILES['foto']['name'];
        $foto_tamanho = $_FILES['foto']['size'];
        $foto_tipo = $_FILES['foto']['type'];
        $foto_extensao = pathinfo($foto_nome, PATHINFO_EXTENSION);

        $pasta = "imagens/";
        if(!is_dir($pasta)){
            mkdir($pasta, 0755);
        }

        $foto_tmp = $_FILES['foto']['tmp_name'];
        $foto_novo_nome = uniqid() . '.' . $foto_extensao;

        if(move_uploaded_file($foto_tmp, $pasta.$foto_novo_nome)){
            $foto_caminho = $pasta.$foto_novo_nome;
            echo "Upload realizado com sucesso<br>";
        }else{
            echo "Erro: não foi possível fazer upload do arquivo<br>";
        }

        $foto = mysqli_real_escape_string($conexao, $foto_novo_nome);

    } else {
        $foto = "";
    }

    $sql = "INSERT INTO contatosagenda (
        nome, 
        data_nascimento, 
        email, 
        telefone, 
        foto)
        VALUES(
            '{$nome}', 
            '{$data_nascimento}', 
            '{$email}', 
            '{$telefone}', 
            '{$foto}'
        )
        ";
    
    $result = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta. " . mysqli_error($conexao));

    echo "O contato foi inserido com sucesso<br>";

?>

<img src="https://cdn-icons-png.flaticon.com/512/7653/7653745.png" width="80%" height="800px">
