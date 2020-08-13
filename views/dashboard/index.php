<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Login');
?>

<div class="container ">
    <div class="row">
        <!-- Formulario para iniciar sesión -->
        <br>
        <form method="post" id="sesion-form">
            <div class="input-field col s12 m6 offset-m3">
                <i class="material-icons prefix black-text">person_pin</i>
                <input id="alias" type="text" name="alias" class="validate black-text" required/>
                <label for="alias">User</label>
            </div>
            <div class="input-field col s12 m6 offset-m3">
                <i class="material-icons prefix black-text">security</i>
                <input id="clave" type="password" name="clave" class="validate black-text" required/>
                <label for="clave">Paswsword</label><br><br>
            </div>
            <div class="col s12 center-align">
                <button type="submit" class="btn waves-effect deep-purple accent-2 lighten-1 tooltipped" data-tooltip="Ingresar"><i class="material-icons">send</i></button>
            </div>
        </form>
    </div>
</div>

<?php
Dashboard::footerTemplate('index.js');
?>
