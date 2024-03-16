<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    <h1>Zona de mi perfil o mi cuenta</h1>
    <p>Publicaciones</p>
    <?php foreach($publis as $p){ ?>
            <div>
                <p> <?php echo $p['Date']; ?></p>
                <p> <?php echo $p['Title']; ?> </p>
                <p> <?php echo $p['Content'];?></p>
                <form action="index.php" method="POST">
                    <button name="editB" value= <?php echo $p["ID_publication"] ?>>Editar</button>
                    <input type="hidden" name="m" value="editPubli">
                </form>
                <form action="index.php" method="POST">
                    <button name="deleB" value= <?php echo $p["ID_publication"] ?>>Eliminar</button>
                    <input type="hidden" name="m" value="deletePubli">
                </form>
                
            </div>
        <?php }?>
</body>
</html>