<?php
include('DB/conexao.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION["login_user"]) and isset($_SESSION["senha_user"])){
    $login_user = $_SESSION["login_user"];
    $senha_user = $_SESSION["senha_user"];
    $nome_user = $_SESSION["nome_user"];

    $sql = "SELECT * FROM usuarios WHERE login_user='{$login_user}' AND senha_user='{$senha_user}' ";
    $result = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_assoc($result);
    $lines = mysqli_num_rows($result);
    if($lines == 0){
        //usuario nao existe
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit();
    }
}else{
    header('Location: login.php');
    exit();

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
    <link rel="stylesheet" href="styles/estilo2.css">
   
    
</head>

<body>
    <header class="bg-primary">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-success bg-primary">
                <a class="navbar-brand" href="#">
                <img src="imgs/notebook.png" alt="logo"></a>

            

                <div class="collapse navbar-collapse" if="conteudonavbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="index.php?menuop=home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?menuop=contacts">Contatos</a></li>

                    </ul>
                </div>

                <div class="navbar-nav w-100 justify-content-end">
                    <a href="logout.php" class="nav-link">
                        <i class="bi bi-person"></i>
                        <?=$nome_user?> Sair <i class="bi bi-box-arrow-right"></i>
                    </a>
                </div>

            </nav>
        </div>
    </header>
    <main>
    <div class="container">       
    
    <?php
        if (isset($_GET["menuop"])) {
            $menuop = $_GET["menuop"];
            } else {
            $menuop = "home";
            }
        //inclui a pagina home na index
        switch($menuop){
            case 'home':
                include("pages/home/home.php");
                break;
            
            case 'contacts':
                include("pages/contacts/contatos.php");
                break;

            case 'cadastro':
                include("pages/contacts/cadastro.php");
                break;

            case 'insert_contact':
                include("pages/contacts/insert_contact.php");
                break;

            case 'editar':
                include("pages/contacts/editar.php");
                break;
                
            case 'excluir':
                include("pages/contacts/excluir.php");
                break;

            case 'att-contato':
                include("pages/contacts/att-contato.php");
                break;


            default:
                include("pages/home/home.php");
                break;
        }
        
       
        
        ?>
    </div>

    </main>

    <footer class="container-fluid fixed-bottom bg-primary">
        <div class="text-center">Agenda Contatos</div>
    </footer>
   <!--  <script src="./js/jquery.js"></script>
    <script src="./js/jquery.form.js"></script>
    <script src="./js/upload.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="./js/validacao.js"></script>  -->

</body>
</html>