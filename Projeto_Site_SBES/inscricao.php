<?php

if(isset($_POST['submit'])){

//TESTE
/*print_r($_POST['nome']);    print_r('<br>');    print_r($_POST['cpf']);    print_r('<br>');
print_r($_POST['email']);    print_r('<br>');  print_r($_POST['senha']);
print_r('<br>');   print_r($_POST['telefone']); print_r('<br>');    print_r($_POST['cracha']);    
print_r('<br>'); print_r($_POST['perfil']);    print_r('<br>'); print_r($_POST['data_nascimento']);
print_r('<br>');    print_r($_POST['membro']); print_r('<br>');   print_r($_FILES['anexo']);    print_r('<br>');*/

include_once('connection.php');

$nome= $_POST['nome'];
$cpf = $_POST['cpf'];
$email= $_POST['email'];
$senha= $_POST['senha'];
$telefone= $_POST['telefone'];
$cracha= $_POST['cracha'];
$perfil= $_POST['perfil'];
$data_nascimento = $_POST['data_nascimento'];
$membro= $_POST['membro'];
$anexo= $_FILES['anexo'];


if($anexo !== null){

    preg_match ("/\.(gif|bmp|png|jpg|jpeg|pdf){1}$/i", $anexo["name"], $ext);

    if($ext == true){

        $nome_arquivo = $nome.".comprovante".".".md5(uniqid(time())).".".$ext[1];

        $caminho_arquivo = "anexos/".$nome_arquivo;

        move_uploaded_file($anexo["tmp_name"], $caminho_arquivo);
    }
}

$result = mysqli_query($mysqli, "INSERT INTO inscritos (nome,cpf,email,senha,telefone,nome_cracha,perfil,data_nascimento,membro_sbes,anexo) VALUES('$nome','$cpf','$email','$senha','$telefone','$cracha','$perfil','$data_nascimento','$membro','$nome_arquivo')");

    /*if($perfil == "estudante"){
        echo "ESTUDANTEEEEE";
    }elseif ($perfil == "professor"){
        echo "PROFESSORRR";
    }elseif ($perfil == "profissional"){
        echo "PROFISSIONALSSS";
    }*/

    if($perfil == 'estudante'){
    header ('Location: loja.html');
    }
    elseif($perfil == 'professor'){
    header ('Location: loja2-index.html');
    }
    elseif($perfil == 'profissional'){
    header ('Location: loja3-index.html');
    }
    /*elseif($perfil == 'estudante')&&($anexo !== null){
    header ('Location: loja.html');
    }*/

}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Metadados -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- CSS -->
        
        <link rel="stylesheet" type="text/css" href="_css/style.css" media="screen">
        <link rel="stylesheet" type="text/css" href="_css/form.css" media="screen">
      

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
            <h1 id="titulo">Inscrição SBES</h1>
        </div>
        <div class="box">
        <!-- Início do formulário -->
        <form action="inscricao.php" method="POST" enctype = "multipart/form-data"> <!--enctype para receber os anexos-->

            <fieldset>
                <legend><b>Insira os Seus Dados</b></legend>
                <br>
                <!--Inserir Nome-->
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                 <!--Inserir CPF-->
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" required>
                    <label for="cpf" class="labelInput">CPF</label>
                </div>
                <br><br>
                 <!--Inserir Email-->
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                 <!--Inserir Senha-->
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha de Login</label>
                </div>
                <br><br>
                 <!--Inserir Telefone-->
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br><br>
                 <!--Inserir Nome no Crachá-->
                <div class="inputBox">
                    <input type="text" name="cracha" id="cracha" class="inputUser" required>
                    <label for="cracha" class="labelInput">Nome no Crachá</label>
                </div>
                <br><br>
                 <!--Inserir perfil-->
                <p>Qual o seu perfil:</p>
                <input type="radio" id="estudante" name="perfil" value="estudante" required>
                <label for="estudante">Estudante</label>
                <br>
                <input type="radio" id="professor" name="perfil" value="professor" required>
                <label for="professor">Professor</label>
                <br>
                <input type="radio" id="profissional" name="perfil" value="profissional" required>
                <label for="profissional">Profissional</label>
                <br><br>
                 <!--Inserir Data de nascimento-->
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br>
                  <!--Inserir se voce é membro-->
            <div class="inputBox">
                <label for="membro" id="titulomembro"><strong>Você é membro do SBES?</strong></label>
                <select id="membro" name="membro" required>
                  <option selected disabled value="">Selecione</option>
                  <option value="Sim">Sim</option>
                  <option value="Não">Não</option>
                  <!-- Caixa de Anexo -->
            <div class="campo">
                <label for="experiencia"><strong>Insira aqui os comprovantes para o seu tipo de perfil: </strong></label>
                   <input type="file" name = 'anexo' id="anexo">
                </select>
            </div>
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