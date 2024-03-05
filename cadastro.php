<?php

if(isset($_POST['login'])) {

    include('conexao.php');

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $mysqli->query("INSERT INTO usuario (login, senha) VALUES('$login', '$senha')");
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylephp.css">
    <title>Cadastro</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="login">
        <input type="password" name="senha">
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>