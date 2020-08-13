<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/niveldocente.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $tipo_doc = new niveldocente;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $tipo_doc->readAllNiv()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay nivel regitrados';
                }
                break;
            case 'search':
                $_POST = $tipo_doc->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $tipo_doc->searchNiv($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Se encontraron '.$rows.' coincidencias';
                        } else {
                            $result['message'] = 'Solo existe una coincidencia';
                        }
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
            case 'create':
                $_POST = $tipo_doc->validateForm($_POST);
                
                if($tipo_doc->setNiveldocente($_POST['nombreTipo'])){
                    if ($tipo_doc->createNiv()) {
                        $result['status'] = 1;
                        $result['message'] = 'Nivel agregado correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                

                break;
            case 'readOne':
                if ($tipo_doc->setId($_POST['id_tipodocente'])) {
                    if ($result['dataset'] = $tipo_doc->readOneNiv()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Nivel inexistente';
                    }
                } else {
                    $result['exception'] = 'Nivel incorrecta';
                }
                break;
            case 'update':                
                $_POST = $tipo_doc->validateForm($_POST);
                if ($tipo_doc->setId($_POST['id_tipodocente'])) {
                    if ($data = $tipo_doc->readOneNiv()) {
                        if ($tipo_doc->setNiveldocente($_POST['nombreTipo'])) {
                                    if ($tipo_doc->updateNiv()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Nivel modificado correctamente';
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                                }
                            } else {
                                $result['exception'] = 'Nombre incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Nivel incorrecto';
                        }
                
                break;
            case 'delete':
                if ($tipo_doc->setId($_POST['id_tipodocente']) ) {
                    if ($tipo_doc->deleteNiv()) {
                        $result['status'] = 1;
                        $result['message'] = 'Nivel eliminado correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }    
                } else {
                    $result['exception'] = 'Nivel incorrecto';
                }
                break;
            default:
                exit('Acción no disponible');
        }
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    } else {
        exit('Acceso no disponible');
    }
} else {
    exit('Recurso denegado');
}
?>