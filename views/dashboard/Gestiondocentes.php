<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Gestion Docentes');
?>
    
    <main>
        <div class="row">
            <div class="col s12 m12 l3">
                
            </div>
            <!--COMENTARIO DE PRUEBA-->
            <div class="col s12 m12 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                    <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/docentes.jpg" height="320" width="310">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator white-text">Teachers</span><br>
                        <p><a href="docentes.php"><button class="btn grey darken-3 white-text center-align">See more</button></a></p>
                    </div>
                </div>
            </div>

            <div class="col s12 m12 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                    <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/nivel.jpg" height="320" width="310">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator white-text">Teachers level</span><br>
                        <p><a href="niveldocente.php"><button class="btn grey darken-3 white-text center-align">See more</button></a></p>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                    <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/tipodoc.jpg" height="320" width="310">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator white-text">Teachers type</span><br>
                        <p><a href="tipodocente.php"><button class="btn grey darken-3 white-text center-align">See more</button></a></p>
                    </div>
                </div>
            </div>
        </div>
        
<?php
Dashboard::footerTemplate('main.js');
?>
            