<?php

$nomeHost = 'Localhost';
$bdUsuario = 'root';
$bdSenha = '';
$bdNome = 'formulario-inscricao';

$mysqli = new mysqli ($nomeHost,$bdUsuario,$bdSenha,$bdNome);


//TESTE DE CONEXÃO

/*if ($mysqli -> connect_errno){
    echo "Erro na conexão com o Banco de Dados: (". $mysqli->connect_errno.")".$mysqli->connect_errno;
}else{
    echo "Conexão com o Banco de Dados efetuada com sucesso!";
}*/


?>