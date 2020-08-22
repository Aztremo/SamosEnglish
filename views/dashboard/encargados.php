<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Mandated');
?>

<main>

    <div class="row">
        <!-- Formulario de búsqueda -->
        <form method="post" id="search-form">
            <div class="col l5 "></div>
            <div class="input-field col l3 s m4">
                <i class="material-icons prefix">search</i>
                <input id="search" type="text" name="search"/>
                <label for="search">Seeker</label>
            </div>
            <div class="input-field col l4 s6 m4">
                <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Search"><i class="material-icons">search</i></button>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col l3"></div>
        <div class="col l8 m16 s12">

        <!-- Tabla para mostrar los registros existentes -->
    <table class=" highlight centered white-text">
        <!-- Cabeza de la tabla para mostrar los títulos de las columnas -->
        <thead>
            <tr>
                <th>NAME</th>
                <th>LAST NAME</th>
                <th>EMAIL</th>
                <th>ADDRESS</th>
                <th>CHILDREN QUANTITY</th>
                <th><a href="#" onclick="openCreateModal()" class=" waves-effect tooltipped" data-tooltip="Add mandated"><i class="small material-icons green-text text- accent-4">add_circle</i></a></th>
            </tr>
        </thead>
        <!-- Cuerpo de la tabla para mostrar un registro por fila -->
        <tbody id="tbody-rows">
        </tbody>
    </table>

        </div>
        <div class="col l1 m1"></div>



    </div>

    <div id="save-modal" class="modal">
    <div class="modal-content">
        <h4 id="modal-title" class="center-align white-text"></h4>
        <!-- Formulario para crear o actualizar un registro -->
        <form method="post" id="save-form" enctype="multipart/form-data">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="hide" type="text" id="id_encargado" name="id_encargado"/>
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix white-text">account_box</i>
                    <input type="text" id="nombres" name="nombres" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,50}" class="validate white-text" required/>
                    <label for="nombres">Name</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix white-text">account_box</i>
                    <input type="text" id="apellidos" name="apellidos" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,50}" class="validate white-text" required/>
                    <label for="apellidos">Last Name</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix white-text">email</i>
                    <input type="email" id="correo" name="correo" maxlength="100" class="validate white-text" required/>
                    <label for="correo">Email</label>
                </div>
                <div class="input-field col s12 m6 white-text">
                    <i class="material-icons prefix ">place</i>
                    <input type="text" id="direccion" name="direccion" maxlength="200" class="validate white-text" required/>
                    <label for="direccion">Address</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix white-text">security</i>
                    <input type="text" id="trabajo" name="trabajo" class="validate white-text " required/>
                    <label for="trabajo">Workplace</label>
                </div>
                <div class="input-field col s12 m6">  
                    <i class="material-icons prefix white-text">place</i>
                    <input type="text" id="municipio" name="municipio" class="validate white-text" required/>
                    <label for="municipio">Municipality</label>
                </div>
                <div class="input-field col s12 m3 white-text">
                    <i class="material-icons prefix">cake</i>
                    <input type="date" id="fecha" name="fecha" class="validate white-text" required/>
                    <label for="fecha">Birth</label>
                </div>
                <div class="input-field col s12 m3">
                    <i class="material-icons prefix white-text">phone</i>
                    <input type="text" id="telefono" name="telefono" placeholder="0000-0000" pattern="[2,6,7]{1}[0-9]{3}[0-9]{4}" class="validate white-text " required/>
                    <label for="telefono">Telephone</label>
                </div>
                <div class="input-field col s12 m3">
                    <i class="material-icons prefix white-text">how_to_reg</i>
                    <input type="text" id="dui" name="dui" placeholder="000000000" pattern="[0-9]{9}" class="validate white-text" required/>
                    <label for="dui">DUI</label>
                </div>
                <div class="input-field col s12 m3">
                    <i class="material-icons prefix white-text">security</i>
                    <input type="number" id="hijos" name="hijos" class="validate white-text" max="3" min="1" required/>
                    <label for="hijos">Children Q.</label>
                </div>
                
                
            </div>

            <div class="row center-align">
                <a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancel"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Save"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>

<?php
Dashboard::footerTemplate('encargado.js');
?>



