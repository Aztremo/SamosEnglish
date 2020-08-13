<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Gestion Grados');
?>
    
    
    <main>
        <div class="row">
            <div class="col s12 m12 l3">
                
            </div>
            <!--COMENTARIO DE PRUEBA-->
            <div class="col s12 m12 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                    <div class="card-image  waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/alumnos.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator white-text ">Grado</span><br>
                        <p><a href="grado.php"><button class="btn grey darken-3 white-text center-align">Ver más</button></a></p>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                    <div class="card-image  waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/alumnos.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator white-text ">Nivel</span><br>
                        <p><a href="nivel.php"><button class="btn grey darken-3 white-text center-align">Ver más</button></a></p>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                    <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/fam.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator white-text">Estado Grado</span><br>
                        <p><a href="estadogrado.php"><button class="btn grey darken-3 white-text center-align">Ver más</button></a></p>
                    </div>
                </div>
            </div>
        </div>
        
<?php
Dashboard::footerTemplate('main.js');
?>
            