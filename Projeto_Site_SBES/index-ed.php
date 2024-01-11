<?php

if(isset($_POST['submit'])){

//TESTE
/*print_r($_POST['titulo']);  print_r('<br>');
print_r($_POST['nome']);  print_r('<br>');
print_r($_POST['sobre']);  print_r('<br>');
print_r($_POST['local']);  print_r('<br>');
print_r($_POST['data']);  print_r('<br>');
print_r($_FILES['logo']);  print_r('<br>');*/

include_once('connection.php');

$titulo = $_POST['titulo'];
$nome = $_POST['nome'];
$sobre = $_POST['sobre']; //descrição do evento
$local = $_POST['local'];
$data = $_POST['data'];
$logo = $_FILES['logo'];

if($logo !== null){

    preg_match ("/\.(gif|bmp|png|jpg|jpeg|pdf){1}$/i", $logo["name"], $ext);

    if($ext == true){

        $nome_arquivo = $nome.".logo".".".md5(uniqid(time())).".".$ext[1];

        $caminho_arquivo = "logos/".$nome_arquivo;

        move_uploaded_file($logo["tmp_name"], $caminho_arquivo);
    }
}

$result = mysqli_query($mysqli, "INSERT INTO configmenu (titulo,nomeEvent,descricao,local,data,img) VALUES('$titulo','$nome','$sobre','$local','$data','$nome_arquivo')");


}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Titulo-->
    <title><?php echo $titulo ?></title>

    <!--Estilos CSS-->
    <link rel="stylesheet" href="_css/style.css" />
    <link rel="stylesheet" href="_css/footer.css">
    <link rel="stylesheet" type="text/css" href="formulario.css" media="screen">

    <!--Estilos Exportados-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!--Script-->
    <script src="javascript/jscript.js"></script>

</head>  

<body>
    <!--Cabecalho-->
    <header id="cabecalho">
        <img class="img-cabecalho" src="_img/logo-sbc.png">
        <!--Menu-->
        <nav class="menu">
            <a class="menu-item" href="index.html">Home</a>
            <a class="menu-item" href="programacao.html">Programação</a>
            <a class="menu-item" href="palestrantes.html">Palestrantes</a>
            <a class="menu-item" href="subscriber.html">Inscreva-se</a>
            <a class="menu-item" href="login.html">Login</a>
            <a class="menu-item" href="form-config.php">Configurar Site</a>
        </nav>

    </header>
    <!--Conteudo Principal-->
    <main id="conteudo-principal">
        <section class="principal">
            <div id="edition-description">
            <?php
            
            echo '<img class = "img-logo" src="logos/'.$nome_arquivo.'">';

            ?>

            </div>
        </section>
        <!--letreiro menor-->
        <section id="rodape-description">
            <!--Localização do evento-->
            <div id="event-date">
                <p> <?php
                            echo $data;
                    ?></p>
            </div>
            <div id="event-localization">
                <p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path
                            d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg> <?php
                            echo $local;
                    ?>
                </p>
            </div>
            <!--Botão rolagem de tela-->
            <div id="botao">
                <button class="btn-saiba" onclick="btn(window.location.href='subscriber.html')">Quero participar!</button>
                <!--<a class="menu-item" href="subscriber.html"></a>-->
            </div>
        </section>


    </main>
<!--um pouco mais sobre o evento-->
    <article id="context-geral">
        <div class="titulo2">
        <?php echo $nome ?>
        </div>
        <div id="context-event">
            <img class="img-palestra" src="_img/palestra.jpg" />
            <div class="contexto">

            <?php echo $sobre ?>

            </div>
        </div>
    </article>

    <footer>
        <div class="main-content">
            <div class="left box">
                <h2> Nossos contatos</h2>
                <div class="content">
                    <a href="https://api.whatsapp.com/send?phone=5551992526018&text=Oi%20SBC" target="_blank"
                        rel="noopener noreferrer">
                        <p>Whatsapp</p>
                    </a>
                    <a href="https://www.youtube.com/@sbcoficial" target="_blank" rel="noopener noreferrer">
                        <p>Youtube</p>
                    </a>
                    <a href="https://www.instagram.com/sbcoficial/" target="_blank" rel="noopener noreferrer">

                        <p>Instagram</p>
                        <a href="https://www.sbc.org.br/" target="_blank" rel="noopener noreferrer">

                            <p>SBC</p>

                        </a>
                        <a href="mailto:sbc@sbc.org.br" target="_blank" rel="noopener noreferrer">

                            <p>email</p>
                        </a>

                </div>
            </div>
            <!--left box-->
            <div class="center box">
                <h2>Endereço</h2>
                <div class="content">
                    <div class="place">
                        <span class="fas fa-map-marker"></span>
                        <a href="https://goo.gl/maps/j6RjXAZkMVPgZcVa6" target="_blank" rel="noopener noreferrer">
                            <p>Av. Bento Gonçalves, 9500</p>
                        </a>

                    </div>

                </div>
                <div>
                    <p> Setor 4 | Prédio 43.412 | Sala 219 <br> Bairro Agronomia
                        Caixa Postal 15012 <br> CEP 91501-970 Porto Alegre - RS</p>
                </div>
            </div>

        </div>
        </div>

    </footer>
</body>

</html>