<?php
function publicationPanel($imgPerfil = null){
?>
<form action="index.php?m=enviarPublicacion" method="post">
    <div class="mi-perfil">
        <div class="image-container">
            <span>Crear Post</span>
            <img src="<?php echo urlsite; ?>./view/img/perfil_img.jpg" alt="Imagen">
            <button type="submit">Enviar</button> 
        </div>
        <!--Titulo y contenido de la nueva publicacion-->
        <div class="input-container">
            <input type="text" name="titulo" placeholder="Título"> 
            <textarea name="contenido" placeholder="Escribe tu idea..."></textarea> 
        </div>
    </div>
</form>

<?php } ?>