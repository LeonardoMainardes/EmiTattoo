<?php

$host = "localhost";
$usuario = "root";
$senhabd = "";
$bd = "emitattoo";

$mysqli = new mysqli($host, $usuario, $senhabd, $bd);

if($mysqli->error) {

     die("Falha na conexão: ".$mysqli->error);
}
    
?>