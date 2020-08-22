<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/encargados.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $carga = new Encargados;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $carga->readAllEncargado()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No registered customers';
                }
                break;
            case 'search':
                $_POST = $carga->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $carga->searchEncargado($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Matches found '.$rows.;
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
                $_POST = $carga->validateForm($_POST);

                if ($carga->setNombres($_POST['nombres'])) {
                    if ($carga->setApellidos($_POST['apellidos'])) {
                        if ($carga->setCorreo($_POST['correo'])) {
                            if ($carga->setDireccion($_POST['direccion'])) {
                                if ($carga->setDui($_POST['dui'])) {
                                    if ($carga->setNacimiento($_POST['fecha'])) {
                                        if ($carga->setTelefono($_POST['telefono'])) {
                                            if ($carga->setTrabajo($_POST['trabajo'])) {
                                                if ($carga->setMunicipio($_POST['municipio'])) {
                                                    if ($carga->setHijos($_POST['hijos'])) {
                                                        if ($carga->createEncargado()) {
                                                            $result['status'] = 1;
                                                            $result['message'] = 'Mandates added correctly';
                                                        } else {
                                                            $result['exception'] = Database::getException();
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Wrong children';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Password less than 6 characters';
                                                }
                                            } else {
                                                $result['exception'] = 'Different keys';
                                            }
                                        } else {
                                            $result['exception'] = 'Wrong phone';
                                        }
                                    } else {
                                        $result['exception'] = 'Wrong date of birth';
                                    }
                                } else {
                                    $result['exception'] = 'Wrong DUI';
                                }
                            } else {
                                $result['exception'] = 'Wrong addres';
                            }
                        } else {
                            $result['exception'] = 'Wrong email';
                        }
                    } else {
                        $result['exception'] = 'Incorrect last names';
                    }
                } else {
                    $result['exception'] = 'Wrong names';
                }
                

                break;
            case 'readOne':
                if ($carga->setId($_POST['id_encargado'])) {
                    if ($result['dataset'] = $carga->readOneEncargado()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Non-existent mandated';
                    }
                } else {
                    $result['exception'] = 'Wrong mandated';
                }
                break;
            case 'update':                
                $_POST = $carga->validateForm($_POST);

                if ($carga->setId($_POST['id_encargado'])) {
                    if ($data = $carga->readOneEncargado()) {
                        if ($carga->setNombres($_POST['nombres'])) {
                            if ($carga->setApellidos($_POST['apellidos'])) {
                                if ($carga->setCorreo($_POST['correo'])) {
                                    if ($carga->setDireccion($_POST['direccion'])) {
                                        if ($carga->setDui($_POST['dui'])) {
                                            if ($carga->setNacimiento($_POST['fecha'])) {
                                                if ($carga->setTelefono($_POST['telefono'])) {
                                                    if ($carga->setTrabajo($_POST['trabajo'])) {
                                                        if ($carga->setMunicipio($_POST['municipio'])) {
                                                            if ($carga->setHijos($_POST['hijos'])) {
                                                                if ($carga->updateEncargado()) {
                                                                    $result['status'] = 1;
                                                                    $result['message'] = 'Mandated added successfully';
                                                                } else {
                                                                    $result['exception'] = Database::getException();
                                                                }
                                                            } else {
                                                                $result['exception'] = 'Wrong children';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Incorrect password';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Different keys';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Wrong phone';
                                                }
                                            } else {
                                                $result['exception'] = 'Wrong date of birth';
                                            }
                                        } else {
                                            $result['exception'] = 'Wrong DUI';
                                        }
                                    } else {
                                        $result['exception'] = 'Wrong Addres';
                                    }
                                } else {
                                    $result['exception'] = 'Wrong Email';
                                }
                            } else {
                                $result['exception'] = 'Incorrect last names';
                            }
                        } else {
                            $result['exception'] = 'Wrong names';
                        }
                    } else {
                        $result['exception'] = 'Non-existent mandated';
                    }
                } else {
                    $result['exception'] = 'Wrong mandates';
                }
                break;
            case 'delete':
                if ($carga->setId($_POST['id_encargado']) ) {
                    if ($carga->deleteEncargado()) {
                        $result['status'] = 1;
                        $result['message'] = 'Mandted successfully removed';
                    } else {
                        $result['exception'] = Database::getException();
                    }    
                } else {
                    $result['exception'] = 'Wrong mandates';
                }
                break;
            default:
                exit('Action not available');
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