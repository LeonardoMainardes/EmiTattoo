<?php
    include('protect.php');
    include('conexao.php');

if(isset($_FILES['fotos'])) {
    $arquivo = $_FILES['fotos'];

    if($arquivo['error'])
        die("Falha ao enviar o arquivo!");

    if($arquivo['size'] > 2097152)
        die("Arquivo muito grande! Max: 2MB.");

    $pasta = "upload/";
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));

    if($extensao != "jpg" && $extensao != "png")
        die("Tipo de arquivo não aceito");
    
    $path =  $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($arquivo['tmp_name'], $path);
    if($deu_certo){
        $mysqli->query("INSERT INTO fotos (nome, path, data) VALUES('$nomeDoArquivo','$path', NOW())") or die($mysqli->error);
        echo "Arquivo enviado com sucesso!";
    } else 
        echo "Falha ao enviar o arquivo";
}

    $sql_query = $mysqli->query("SELECT * FROM fotos") or die($mysqli->error);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylephp.css">
    <title>Home</title>
</head>
<body>
    <br>
    <p>
        <a href="logout.php">SAIR</a>
    </p>
        <br>
        <br>
        <h2>Bem vindo a Home,</h2> 
        <h3 id="usuario"><?php echo $_SESSION['login']; ?></h2><br><br>
        <h2>Lista de Fotos</h2><br>
        <a href="upload.html"><h4>Cadastrar fotos</h4></a><br>
        <table border="3" cellpadding="10">
            <thead>
                <th>Preview</th>
                <th>Nome da Foto</th>
                <th>Data de Upload</th>
            </thead>
            <tbody>
                <?php
                    while($arquivo = $sql_query->fetch_assoc()){
                ?>
                    <tr>
                        <td><img height="100"src="<?php echo $arquivo['path']; ?>"></td>
                        <td><a target="_blank"  href="<?php echo $arquivo['path']; ?>"><?php echo $arquivo['nome']; ?></a></td>
                        <td><?php echo date("d/m/Y H:i", strtotime($arquivo['data'])); ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
</body>
</html>