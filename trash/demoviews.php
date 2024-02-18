<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="demo.php" method="POST" enctype="multipart/form-data">
    <label for="">fichier à upload</label>
    <input type="file" name="file">  
    
    <label for="">fichier à upload</label>
    <input type="file" name="multi_file[]" multiple>  

    <label for="">numéro de fichier</label>
    <input type="text" name='id'>
    <button type="submit">envoyer</button>
</form>
    
</body>
</html>