<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Gestion Alumnos');
?>
    
    <main>
        <div class="row">
            <div class="col s12 m12 l3">    
            </div>
            <!--COMENTARIO DE PRUEBA -->
            <div class="col s12 m12 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                    <div class="card-image  waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/alumnos.jpg">
                    </div>
                    <div class="card-content white-text">
                        <span class="card-title activator white-text ">Alumnos</span><br>
                        <p><a href="alumnos2.php"><button class="btn gradient-45deg-red-pink">Ver más</button></a></p>
                    </div>
                </div>
            </div>

            <div class="col s12 m12 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                    <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/fam.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator white-text">Encargados</span><br>
                        <p><a href="Encargados.php"><button class="btn gradient-45deg-red-pink">Ver más</button></a></p>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                    <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/estadoalum.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator white-text">Estado Alumnos</span><br>
                        <p><a href="estadoalumno.php"><button class="btn gradient-45deg-red-pink">Ver más</button></a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l3">
                
            </div>
            <div class="col s12 m12 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                    <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/estadoperfil.png">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator white-text">Notas</span><br>
                        <p><a href="notas.php"><button class="btn gradient-45deg-red-pink">Ver más</button></a></p>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                    <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/estadoperfil.png">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator white-text">Solvencia</span><br>
                        <p><a href="solvencia.php"><button class="btn gradient-45deg-red-pink">Ver más</button></a></p>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                    <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/estadoperfil.png">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator white-text">Estado Solvencia</span><br>
                        <p><a href="Estadosolvencia.php"><button class="btn gradient-45deg-red-pink">Ver más</button></a></p>
                    </div>
                </div>
            </div>
        </div>

<?php
Dashboard::footerTemplate('main.js');
?>

            