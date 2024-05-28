<?php

$pastaDestino = "uploads/";
$nomeArquivo = $_FILES['arquivo']['name'];
Var_dump($_FILES);
var_dump($_FILES['arquivo']['size']);

//Verificar se o arquivo é maior que 2MB
if($_FILES['arquivo']['size'] > 2000000 ){
    echo "O tamanho do arquivo é maior que o limite permitido.";
    die();
}else{
    echo "";
}

//file_exists($pasteDestino . $nomeArquivo);

?>