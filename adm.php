<?php

include('conexao.php');

if(isset($_POST['login']) || isset($_POST['senha'])){

    if(strlen($_POST['login']) == 0) {
        echo "Preencha seu usuário";
        } else if(strlen($_POST['senha']) == 0) {
            echo "Preencha sua senha";
            } else {

        $login = $mysqli->real_escape_string($_POST['login']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL:" . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['cod'] = $usuario['cod'];
            $_SESSION['login'] = $usuario['login'];

            header("Location: home.php");

            } else {
            echo "Falha ao logar! Usuário ou senha incorretos.";
        }
      } 
    }
       
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styleadm.css">
        <link rel="icon" href="img/logoicon.jpg">
        <title>Página ADM</title>
    </head>
    <body>
        <center>
        <nav class="menu">
            <ul>
                <li><a href="showall.html" class="menuadm">VOLTAR AO SITE</a></li>     
            </ul>
        </nav>
        <nav class="opacidade">
            <br>
                <img src="img/logo.png"></a>
                <form action="" method="POST">
                    <h3>LOGIN</h3>
                    <br>        
                    <input placeholder="Usuário" type="text" name="login" value=""> <br>
                    <input value="" type="password" name="senha"> <br><br>  
                    <input type="submit" value="ACESSAR">
                    <br><br>
                </form>
        </nav>
        </center>
    </body>
</html>