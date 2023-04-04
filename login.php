<?php
    //conexao cm db
    include("./DB/conexao.php");
    //verificacao db

    $msg_error = "";

    if(isset($_POST["login_user"]) && isset($_POST["senha_user"]) ){
        $login_user = mysqli_escape_string($conexao, $_POST["login_user"]);
        $senha_user =hash('sha256', $_POST["senha_user"]);

        $sql = "SELECT * FROM usuarios WHERE login_user='{$login_user}' AND senha_user='{$senha_user}' ";
        $result = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_assoc($result);
        $lines = mysqli_num_rows($result);

        if($lines !=0) {
            //encontrou usuario
            session_start();
            $_SESSION["login_user"]= $login_user;
            $_SESSION["senha_user"]= $senha_user;
            $_SESSION["nome_user"]= $dados["nome_user"];

            header('Location: index.php');

        }else{
            //usuario nao existe
            $msg_error="<div class='alert alert-danger mt-3'>
            <p>usuario nao encontrado ou a senha nao confere</p>
            </div>";
        }

    }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Login - Agenda</title>
</head>
<body class="bg-secondary">

<div class="container">
    <div class="row vh-100 align-items-center justify-content-center">
        <div class="col-10 col-sm-8 col-md-6 col-lg-4 p-4 bg-white shadow rounded">
        <div class="row justify-content-center mb-4">
            <img src="./imgs/notebook.png" alt="logo" style="width: 20%; height: auto;">
        </div>

        <form class="needs-validation" action="login.php" method="post" novaLidate>
            <div class="form-group mb-4">
                <label class="form-label" for="login_user">Login</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person-fill"></i>
                    </span>
                    <input class = "form-control" type="text" name="login_user" id="login_user" required>
                    <div class="invalid-feedback">
                        Por favor, coloque um nome válido!
                    </div>
                </div>
                
            </div>
            <div class="form-group mb-4">
                <label class="form-label" for="senha_user">Senha</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-key-fill"></i>
                    </span>
                    <input class = "form-control" type="password" name="senha_user" id="senha_user" required>
                    <div class="invalid-feedback">
                        Por favor, coloque uma senha válida!
                    </div>
                </div>
                <?php
                     echo $msg_error;
                ?>
                
            </div>
            <button class="btn btn-success w-100">
                <i class="bi bi-box-arrow-in-right"></i>
                Entrar
            </button>
        
        </form>
        </div>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="./js/validacao.js"></script> 
    
</body>
</html>