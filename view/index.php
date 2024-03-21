<?php
    include("./view/layout/main_header.php");
    include("./view/layout/main_footer.php");
    include("./view/layout/detailsPanel.php");
    include("./view/layout/publication_panel.php");
    if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    if(isset($_SESSION['name'])){
        $account = "<li><a href=". urlsite."/Myaccount". ">Mi cuenta</a></li>";
        $logout = "<li><a href='". urlsite. "/logout'>Cerrar Sesión</a></li>";
        $datos_usuario = $_SESSION['name'];
        $username = $_SESSION['name'];
        $useremail = $_SESSION['email'];
    } else{
        $datos_usuario = '<a class="unirsebtn" href="' .urlsite . '/login">¡Inicia sesión o Registrate!</a>';
        $logout = "";
        $account = "";
        $username = "";
        $useremail = "";
    }     
  
    main_header($datos_usuario);
?>

<!--Panel del perfil-->
    <div id="detailsDiv">
        <b>GreenNet</b><br>
        <p class="nombre-perfil"><?php echo $username ?></p>
        <p class="email-perfil"><?php echo $useremail ?></p>
        <ul>
            <?php echo $account;?>
            <?php echo $logout; ?>
        </ul>
    </div>

    <div class="app">
        <!--Mostrar temas-->
        <aside class="navegacion">
            <div class="temas">
                <h2>Temas</h2>
                <div class="temasopciones">
                <ul>
                    <li>FIN DE LA POBREZA</li>
                    <li>HAMBRE CERO</li>
                    <li>SALUD Y BIENESTAR</li>
                    <li>EDUCACIÓN DE CALIDAD</li>
                    <li>IGUALDAD DE GÉNERO</li>
                    <li>AGUA LIMPIA Y SANEAMIENTO</li>
                    <li>ENERGÍA ASEQUIBLE Y NO CONTAMINANTE</li>
                    <li>TRABAJO DECENTE Y CRECIMIENTO ECONÓMICO</li>
                    <li>INDUSTRIA, INNOVACIÓN E INFRAESTRUCTURA</li>
                    <li>REDUCCIÓN DE LAS DESIGUALDADES</li>
                    <li>CIUDADES Y COMUNIDADES SOSTENIBLE</li>
                    <li>PRODUCCIÓN Y CONSUMO RESPONSABLE</li>
                    <li>ACCIÓN POR EL CLIMA</li>
                    <li>VIDA SUBMARINA</li>
                    <li>VIDA DE ECOSISTEMAS TERRESTRES</li>
                    <li>PAZ, JUSTICIA E INSTITUCIONES SÓLIDAS</li>
                    <li>ALIANZAS PARA LOGRAR LOS OBJETIVOS</li>
                    
                </ul>
                </div>
            </div>
            <!--Buscador-->
            <div class="busqueda">
                <h2>¿Buscas algo?</h2>
                <input type="search" class="search-bar" name="search" id="search" placeholder="Escribe aquí...">
                <div class="populares">
                <h2>Popular</h2>
                <ul>
                    <li>¿3ra guerra mundial 2024?</li>
                    <li>La destrucción de la tierra</li>
                    <li>MrBeast construye 100 pozos en África</li>
                </ul>
                </div>
            </div>
            <span class="copyright">Copyright 2024© GreenNet</span>
        </aside>
        <!-- PUBLICACIONES -->
        <main class="publicaciones">
            <!--Panel para crear publicaciones-->
            <div class="publicacion-crear">
            <?php 
            if(isset($_SESSION['name'])){
                publicationPanel();
            }
            ?>
            <!--Ciclo para imprimir publicaciones-->
            <section class="feed">
                <?php for ($i = count($publicaciones) - 1; $i >= 0; $i--): ?>
                    <?php $publicacion = $publicaciones[$i]; ?>
                    <div class="publicacion">
                        <div class="publicacion-unidad">
                            <!-- Insertar nombre del usuario que hizo el post-->
                            <h2><?php echo $publicacion['Title']; ?></h2>
                            
                            <div class="contenido"><p><?php echo $publicacion['Content']; ?></p></div>
                            <h><?php echo $publicacion['Date']; ?></h><br>
                        </div>
                        <button name="vercomments" class="vercomments" value="" title="Ver comentarios de la publicación">
                            <img src="/view/img/bubble-chat-comment-conversation-mail-message-svgrepo-com.png"></img>0</button>
                    </div><br>
                <?php endfor; ?>
            </section>
        </main>
        <!--Ciclo para imprimir comentarios-->
        <section class="comentarios">
            <div class="publicacion-unidad">
                <div class="contenido">
                    <!--Ciclo para imprimir comentarios-
                    <h1>COMENTARIOS</h1><br>
                    <h2>Aquí se abre un panel con los comentarios de la publicación seleccionada</h2><br><br>
                    <h3>EJEMPLO DE COMENTARIO</h3><br>
                    <h3>En algún punto de mi vida comencé a cuestionarme el hecho de que tanto la familia como la sociedad en general, marcan un camino de por dónde deberías ir o cuáles deberían ser tus metas.</h3><br>
                    <h3>En lugar de intentar adoctrinar a las personas desde pequeñas y hacerles sentir mal por no ser el modelo "perfecto" que se desea; se debería inculcar el encontrar la felicidad.</h3><br>
                    <h3>No todos desean tener una gran empresa y estar entre ejecutivos, el sueño de toda mujer no es casarse y ser ama de casa, no a todas las personas les agrada la idea de vivir en la ciudad de por vida, y así hay varios ejemplos más.</h3><br>
                    -->
                </div>
            </div>
        </section>
        
    </div>
</body>
<?php main_footer();?>
</html>
<?php 
?>