<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivos</title>
</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Selecione um arquivo:
  <input type="file" name="arquivo"><br><br>
  <input type="submit" value="Fazer upload" name="submit">
</form>

</body>
</html>