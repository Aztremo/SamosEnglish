<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/estadogrado.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $estado = new Estadogrado;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $estado->readAllEstado()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'There are no registred grade';
                }
                break;
            case 'search':
                $_POST = $estado->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $estado->searchEstado($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Matches found '.$rows;
                        } else {
                            $result['message'] = 'There is only one match';
                        }
                    } else {
                        $result['exception'] = 'There are no coincidences';
                    }
                } else {
                    $result['exception'] = 'Enter a value to search';
                }
                break;
            case 'create':
                $_POST = $estado->validateForm($_POST);
                
                if($estado->setNombreestado($_POST['nombreestado'])){
                    if ($estado->createEstado()) {
                        $result['status'] = 1;
                        $result['message'] = 'Status added correctly';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Wrong name';
                }
                

                break;
            case 'readOne':
                if ($estado->setId($_POST['id_estadogrado'])) {
                    if ($result['dataset'] = $estado->readOneEstado()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Non-existent status';
                    }
                } else {
                    $result['exception'] = 'Wrong type';
                }
                break;
            case 'update':                
                $_POST = $estado->validateForm($_POST);
                if ($estado->setId($_POST['id_estadogrado'])) {
                    if ($data = $estado->readOneEstado()) {
                        if ($estado->setNombreestado($_POST['nombreestado'])) {
                                    if ($estado->updateEstado()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Status modified correctly';
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                                }
                            } else {
                                $result['exception'] = 'Wrong name';
                            }
                        } else {
                            $result['exception'] = 'Wrong type';
                        }
                
                break;
            case 'delete':
                if ($estado->setId($_POST['id_estadogrado']) ) {
                    if ($estado->deleteEstado()) {
                        $result['status'] = 1;
                        $result['message'] = 'Status removed successfully';
                    } else {
                        $result['exception'] = Database::getException();
                    }    
                } else {
                    $result['exception'] = 'Wrong type';
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
        exit('Access not available');
    }
} else {
    exit('Appeal denied');
}
?>