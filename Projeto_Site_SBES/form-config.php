<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Metadados -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- CSS -->
        
        <link rel="stylesheet" type="text/css" href="_css/style.css" media="screen">
        <link rel="stylesheet" type="text/css" href="_css/form-conf.css" media="screen">
      

        <!-- Estilo Exportado -->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">

        <!-- Título da página (aparece na aba) -->
        <title>Cadastro</title>
        <style>
           
        </style>
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
        </nav>

    </header>
    <main id="conteudo-principal">
        <!-- Cabeçalho com título e subtítulo (ambos com css de id "titulo") -->
        <div>
            <h1 id="titulo">Configurar menu do Site</h1>
        </div>
        <div class="box">
        <!-- Início do formulário -->
        <form action="index-ed.php" method="POST" enctype = "multipart/form-data"> <!--enctype para receber os anexos-->

            <fieldset>
                <legend><b>Insira os Seus Dados</b></legend>
                <br>
                <!--Inserir Título-->
                <div class="inputBox">
                    <input type="text" name="titulo" id="titulo" class="inputUser" required>
                    <label for="titulo" class="labelInput">Título do Site</label>
                </div>
                <br><br>
                 <!--Inserir Nome do Evento-->
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome do Evento</label>
                </div>
                <br><br>
                 <!--Inserir Sobre Evento-->
                <div class="inputBox">
                    <input type="text" row = "3" name="sobre" id="sobre" class="inputUser" required>
                    <label for="sobre" class="labelInput">Descrição do Evento</label>
                </div>
                <br><br>
                <!--Inserir Local do Evento-->
                <div class="inputBox">
                <input type="text" row = "3" name="local" id="local" class="inputUser" required>
                <label for="local" class="labelInput">Local do Evento</label>
                </div>
                <br><br>
                 <!--Inserir Data do Evento-->
                <label for="data"><b>Data do Evento</b></label>
                <input type="date" name="data" id="data" required>
                <br><br>
                  <!--Anexo da Logo do Evento -->
            <div class="logo">
                <label for="logo"><strong></strong></label>
                   <input type="file" name = 'logo' id="logo">
                </select>
            </div>
            <br><br>
                  <!--Botão de envio-->
                <input type="submit" name="submit" id="submit">
                
            </fieldset>
        </form>

        <form action="loja.html" method="POST">
        

        </form>


    </div>  
</main>
    </body>
</html>