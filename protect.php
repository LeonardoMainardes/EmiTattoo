<?php

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['cod'])) {
    die("Você não pode acessar esta página, por favor efetue o login.<p><a href=\"adm.php\">Entrar</a></p>");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylephp.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>