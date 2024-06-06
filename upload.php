<?php
$pastaDestino = "/uploads/";

// verificar se o tamanho do arquivo é maior que 2 MB
if ($_FILES['arquivo']['size'] > 2000000) {  // condição de guarda 👮
    echo "O tamanho do arquivo é maior que o limite permitido. Limite máximo: 2 MB.";
    die();
}

// verificar se o arquivo é uma imagem
$extensao = strtolower(pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION));

if (
    $extensao != "png" && $extensao != "jpg" &&
    $extensao != "jpeg" && $extensao != "gif" &&
    $extensao != "jfif" && $extensao != "svg"
) { // condição de guarda 👮
    echo "O arquivo não é uma imagem! Apenas selecione arquivos 
    com extensão png, jpg, jpeg, gif, jfif ou svg.";
    die();
}

// verificar se é uma imagem de fato
if (getimagesize($_FILES['arquivo']['tmp_name']) === false) {
    echo "Problemas ao enviar a imagem. Tente novamente.";
    die();
}

$nomeArquivo = uniqid();

// se deu tudo certo até aqui, faz o upload
$fezUpload = move_uploaded_file($_FILES['arquivo']['tmp_name'], 
          __DIR__ . $pastaDestino . $nomeArquivo . "." . $extensao);
if ($fezUpload == true) {
    $conexao = mysqli_connect("localhost", "root", "", "upload-arquivos");
    $sql = "INSERT INTO arquivo (nome_arquivo) VALUES ('$nomeArquivo.$extensao')";
    $resultado = mysqli_query($conexao, $sql);
    if ($resultado != false) {
        header("Location: index.php");
    } else {
        echo "Erro ao registrar o arquivo no banco de dados.";
    }
} else {
    echo "Erro ao mover arquivo.";
}
