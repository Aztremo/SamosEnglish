<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/estadosolvencia.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $tipo_doc = new estadosolvencia;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $tipo_doc->readAllEst()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'there is no registers';
                }
                break;
            case 'search':
                $_POST = $tipo_doc->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $tipo_doc->searchEst($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'There are '.$rows.' coincidences';
                        } else {
                            $result['message'] = 'There is one coincidence';
                        }
                    } else {
                        $result['exception'] = 'There is no coincidence';
                    }
                } else {
                    $result['exception'] = 'Search something';
                }
                break;
            case 'create':
                $_POST = $tipo_doc->validateForm($_POST);
                
                if($tipo_doc->setNombreestado($_POST['nombreTipo'])){
                    if ($tipo_doc->createEst()) {
                        $result['status'] = 1;
                        $result['message'] = 'Added correctly';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Incorrect';
                }
                

                break;
            case 'readOne':
                if ($tipo_doc->setId($_POST['id_tipodocente'])) {
                    if ($result['dataset'] = $tipo_doc->readOneEst()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Incorrect';
                    }
                } else {
                    $result['exception'] = 'Incorrect';
                }
                break;
            case 'update':                
                $_POST = $tipo_doc->validateForm($_POST);
                if ($tipo_doc->setId($_POST['id_tipodocente'])) {
                    if ($data = $tipo_doc->readOneEst()) {
                        if ($tipo_doc->setNombreestado($_POST['nombreTipo'])) {
                                    if ($tipo_doc->updateEst()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Updated correctly';
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                                }
                            } else {
                                $result['exception'] = 'Incorrect';
                            }
                        } else {
                            $result['exception'] = 'Incorrect';
                        }
                
                break;
            case 'delete':
                if ($tipo_doc->setId($_POST['id_tipodocente']) ) {
                    if ($tipo_doc->deleteEst()) {
                        $result['status'] = 1;
                        $result['message'] = 'Deleted correctly';
                    } else {
                        $result['exception'] = Database::getException();
                    }    
                } else {
                    $result['exception'] = 'Incorrect';
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