<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Teachers Management');
?>

<main>

    <div class="row">
        <!-- Formulario de búsqueda -->
        <form method="post" id="search-form">
            <div class="col l5 "></div>
            <div class="input-field col l3 s m4">
                <i class="material-icons prefix">search</i>
                <input id="search" type="text" name="search"/>
                <label for="search">Search</label>
            </div>
            <div class="input-field col l4 s6 m4">
                <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Search"><i class="material-icons">search</i></button>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col l4"></div>
        <div class="col l6 m16 s12">

        <!-- Tabla para mostrar los registros existentes -->
    <table class=" highlight centered white-text">
        <!-- Cabeza de la tabla para mostrar los títulos de las columnas -->
        <thead>
            <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Address</th>
                    <th>Dui</th>
                    <th>Escale</th>
                    <th>Action</th>
                <th><a href="#" onclick="openCreateModal()" class=" waves-effect tooltipped" data-tooltip="Add Teacher"><i class="small material-icons green-text text- accent-4">add_circle</i></a></th>
            </tr>
        </thead>
        <!-- Cuerpo de la tabla para mostrar un registro por fila -->
        <tbody id="tbody-rows">
        </tbody>
    </table>

        </div>
        <div class="col l3 m1"></div>



    </div>

     <!-- Componente Modal para mostrar una caja de dialogo -->
     <div id="save-modal" class="modal">
        <div class="modal-content">
            <h4 id="modal-title" class="center-align"></h4>
            <!-- Formulario para crear o actualizar un registro -->
            <form method="post" id="save-form">
                <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                <input class="hide" type="text" id="id_docente" name="id_docente" />
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">person</i>
                        <input id="nombredocente" type="text" name="nombredocente" class="validate" required />
                        <label for="nombredocente">Name</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">person</i>
                        <input id="apellidodocente" type="text" name="apellidodocente" class="validate" required />
                        <label for="apellidodocente">Last Name</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">email</i>
                        <input id="correodocente" type="email" name="correodocente" class="validate" required />
                        <label for="correodocente">Email</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">phone</i>
                        <input id="telefonodocente" type="text" name="telefonodocente" class="validate" required />
                        <label for="telefonodocente">Telephone</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">person</i>
                        <input id="direcciondocente" type="text" name="direcciondocente" class="validate" required />
                        <label for="direcciondocente">Address</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">person</i>
                        <input id="duidocente" type="text" name="duidocente" class="validate" required />
                        <label for="duidocente">Dui</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">cake</i>
                        <input id="fecha_nacimientodocente" type="date" name="fecha_nacimientodocente" class="validate" required />
                        <label for="fecha_nacimientodocente">Birthday</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">person</i>
                        <input id="titulos" type="text" name="titulos" class="validate" required />
                        <label for="titulos">Titles</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">person</i>
                        <input id="contra_prof" type="password" name="contra_prof" class="validate" required />
                        <label for="contra_prof">Password</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">person</i>
                        <input id="num_escalafon" type="text" name="num_escalafon" class="validate" required />
                        <label for="num_escalafon">Escale</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">person</i>
                        <input id="id_tipodocente" type="text" name="id_tipodocente" class="validate" required />
                        <label for="id_tipodocente">Tipe</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">person</i>
                        <input id="id_niveldoc" type="text" name= "id_niveldoc" class="validate" required/>
                        <label for ="id_niveldoc">Level</label>
                    </div>
                    
                </div>
                <div class="row center-align">
                    <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancel"><i class="material-icons">cancel</i></a>
                    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Save"><i class="material-icons">save</i></button>
                </div>
            </form>
        </div>
    </div>

    <?php
    Dashboard::footerTemplate('docentes.js');
    ?>