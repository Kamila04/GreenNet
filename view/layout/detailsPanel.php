<?php
function userPanel($userName, $userEmail){
?>

<div id="detailsDiv">
        <span>GreenNet</span>
        <p class="nombre-perfil"><?php echo $userName ?></p>
        <p class="email-perfil"><?php echo $userEmail ?></p>
        <ul>
            <li><a href="#">Configuración</a></li>
            <li><a href="#">Cambiar de Cuenta</a></li>
            <?php echo "<li><a href='". urlsite. "/logout'>Cerrar Sesión</a></li>" ?>
        </ul>
    </div>

<?php } ?>

<?php
function registerPanel(){
?>

<div id="detailsDiv">
        <span>GreenNet</span>
        <?php echo '<a class="unirsebtn" href="' .urlsite . '/login">Registrate!</a>' ?>
    </div>

<?php } ?>