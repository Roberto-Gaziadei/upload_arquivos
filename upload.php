<?php

$pastaDestino = "uploads/";
$nomeArquivo = $_FILES['arquivo']['name'];
Var_dump($_FILES['arquivo']['name']);

file_exists($pasteDestino . $nomeArquivo);

?>