<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/tipoasignatura.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $tipo = new tipoasignatura;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $tipo->readAllTipo()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'There are no registered subject types';
                }
                break;
            case 'search':
                $_POST = $tipo->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $tipo->searchTipo($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Were found '.$rows.' matches found';
                        } else {
                            $result['message'] = 'There is only one match';
                        }
                    } else {
                        $result['exception'] = 'NO matches';
                    }
                } else {
                    $result['exception'] = 'Enter a search parameter';
                }
                break;
            case 'create':
                $_POST = $tipo->validateForm($_POST);
                
                if($tipo->setNombretipo($_POST['nombretipo'])){
                    if ($tipo->createTipo()) {
                        $result['status'] = 1;
                        $result['message'] = 'Subject type added correctly';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                

                break;
            case 'readOne':
                if ($tipo->setId($_POST['id_tipoasignatura'])) {
                    if ($result['dataset'] = $tipo->readOneTipo()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Tipo docente inexistente';
                    }
                } else {
                    $result['exception'] = 'Tipo incorrecta';
                }
                break;
            case 'update':                
                $_POST = $tipo->validateForm($_POST);
                if ($tipo->setId($_POST['id_tipoasignatura'])) {
                    if ($data = $tipo->readOneTipo()) {
                        if ($tipo->setNombretipo($_POST['nombretipo'])) {
                                    if ($tipo->updateTipo()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Subject type updated correctly';
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                                }
                            } else {
                                $result['exception'] = 'Nombre incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Tipo incorrecto';
                        }
                
                break;
            case 'delete':
                if ($tipo->setId($_POST['id_tipoasignatura']) ) {
                    if ($tipo->deleteTipo()) {
                        $result['status'] = 1;
                        $result['message'] = 'Subject type successfully removed';
                    } else {
                        $result['exception'] = Database::getException();
                    }    
                } else {
                    $result['exception'] = 'tipo incorrecto';
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