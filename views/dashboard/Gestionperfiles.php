<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Gestion Perfiles');
?>
    
    <main>
        <div class="row">
            <div class="col s12 m12 l3">
                
            </div>
            
            <div class="col s12 m12 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                    <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/perfil.jpg" height="320" width="310">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator white-text">Activities</span><br>
                        <p><a href="perfiles.php"><button class="btn grey darken-3 white-text center-align">See more</button></a></p>
                    </div>
                </div>
            </div>

            <div class="col s12 m12 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                    <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/tipoperfil.png" height="320" width="310"> 
                    </div>
                    <div class="card-content">
                        <span class="card-title activator white-text">Activities type</span><br>
                        <p><a href="tipo_perfil.php"><button class="btn grey darken-3 white-text center-align">See more</button></a></p>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                    <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/estadoperfil.png" height="320" width="310">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator white-text">Acitivites status</span><br>
                        <p><a href="estadoperfil.php"><button class="btn grey darken-3 white-text center-align">See more</button></a></p>
                    </div>
                </div>
            </div>
        </div>
<?php
Dashboard::footerTemplate('main.js');
?>
            