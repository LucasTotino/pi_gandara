<?php
// Este arquivo será responsavel por conectar o PHP com o BD
// Será importado (requerido) toda vez que precisarmos de uma conexão
 $host = 'localhost'; // Endereço ou IP da onde está o BD
 $bdName = 'bd_ceres'; // Nome do Banco de dados que desejamos conectar
 $usuario = 'root'; // Nome do usuário para conexão, no XAMPP root é o padrão
 $senha = ''; // Senha do usuário, no XAMPP é em branco.
 
 // A variavel conn irá armazenar a instância da conexão
 // o mysqli é responsavel por fazer a conexão com o mysql/mariadb
 $conn = new mysqli($host, $usuario, $senha, $bdName);

 //Verifica se houve erro na conexão
 if($conn->connect_error){
    // A função die mata a execução do PHP
    die("Erro ao conectar com o BD: " . $conn->connect_error);
 }