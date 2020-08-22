<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Subject Management');
?>
    
    <main>
        <div class="row">
            <div class="col s12 m12 l3">
            </div>
            <!--COMENTARIO DE PRUEBA-->
            <div class="col s12 m12 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                    <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/libros.jpg" height="320" width="310">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator white-text">Subjects</span><br>
                        <p><a href="asignaturas.php"><button class="btn grey darken-3 white-text center-align">See more</button></a></p>
                    </div>
                </div>
            </div>

            <div class="col s12 m12 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                    <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/tiposlibros.jpg" height="320" width="310">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator white-text">Subject Type</span><br>
                        <p><a href="Tipoasignatura.php"><button class="btn grey darken-3 white-text center-align">See more</button></a></p>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                    <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/estalibros.jpg" height="320" width="310">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator white-text">Subject Status</span><br>
                        <p><a href="estadoasigantura.php"><button class="btn grey darken-3 white-text center-align">See more</button></a></p>
                    </div>
                </div>
            </div>
        </div>
        
<?php
Dashboard::footerTemplate('main.js');
?>
        
            