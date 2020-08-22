<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/perfiles.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $perfiles = new  Perfiles;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $perfiles->readAllPerfiles()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No registered profiles';
                }
                break;
            case 'search':
                $_POST = $perfiles->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $perfiles->searchPerfiles($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Matches found ' . $rows;
                        } else {
                            $result['message'] = 'There only one match';
                        }
                    } else {
                        $result['exception'] = 'There are no coincidences';
                    }
                } else {
                    $result['exception'] = 'Enter a value to search';
                }
                break;
                case 'create':
                    $_POST = $perfiles->validateForm($_POST);

                   if ($perfiles->setNombreperfil($_POST['nombreperfil'])) {
                       if($perfiles->setDescripcion($_POST['descripcion'])) {
                           if($perfiles->setPorcentaje($_POST['porcentaje'])) {
                               if($perfiles->setFechainicio($_POST['fecha_inicio'])) {
                                   if($perfiles->setFechafin($_POST['fecha_fin'])) {
                                       if($perfiles->setTrimestre($_POST['trimestre'])) {
                                           if(isset($_POST['id_tipo_actividad'])) {
                                               if($perfiles->setIdtipoactividad($_POST['id_tipo_actividad'])) {
                                                   if(isset($_POST['id_asignatura'])) {
                                                       if($perfiles->setIdasignatura($_POST['id_asignatura'])) {
                                                           if(isset($_POST['id_estadoperfil'])) {
                                                               if($perfiles->setIdestadoperfil($_POST['id_estadoperfil'])) {
                                                                   if(isset($_POST['id_docente'])) {
                                                                       if($perfiles->setIddocente($_POST['id_docente'])) {
                                                                           if($perfiles->createPerfiles()) {
                                                                            $result['status'] = 1;
                                                                            $result['message'] = 'Profile added correctly';
                                                                           } else {
                                                                               $result['exception'] = Database::getException();;
                                                                           }
                                                                       } else {
                                                                           $result['exception'] = "Invalid teacher";
                                                                       }
                                                                   } else {
                                                                       $result['exception'] = "Select a teacher";
                                                                   }
                                                               } else {
                                                                   $result['exception'] = "WrongsStatus";
                                                               }
                                                           } else {
                                                               $result['exception'] = "Select a status";
                                                           }
                                                       } else {
                                                           $result['exception'] = "Invalid subject";
                                                       }
                                                   } else {
                                                       $result['exception'] = "Select a subject";
                                                   }
                                               } else {
                                                   $result['exception'] = "Invalid activity type";
                                               }
                                           } else {
                                               $result['exception'] = "Select a activity type";
                                           }
                                       } else {
                                           $result['exception'] = "Wrong trimester";
                                       }
                                   } else {
                                       $result['exception'] = "Invalid start date";
                                   }
                               } else {
                                   $result['exception'] = "Invalid end date";
                               }
                           } else {
                               $result['exception'] = "Invalid percentage";
                           }
                       } else {
                           $result['exception'] = "Invalid description";
                       }
                   } else {
                       $result['exception'] = "Invalid profile name";
                   }
    
                 break;
                 case 'readOne':
                    if ($perfiles->setIdperfil($_POST['id_perfil'])) {
                        if ($result['dataset'] = $perfiles->readOnePerfiles()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'Non-existent profile';
                        }
                    } else {
                        $result['exception'] = 'Wrong profile';
                    }
                    break;
                    case 'update':
                        $_POST = $perfiles->validateForm($_POST);
                        if ($perfiles->setIdperfil($_POST['id_perfil'])) {
                            if ($data = $perfiles->readOneDocente()) {
                                if ($perfiles->setNombreperfil($_POST['nombreperfil'])) {
                                    if ($perfiles->setDescripcion($_POST['descripcion'])) {
                                        if ($perfiles->setPorcentaje($_POST['porcentaje'])) {
                                            if ($perfiles->setFechainicio($_POST['fecha_inicio'])) {
                                                if ($perfiles->setFechafin($_POST['fecha_fin'])) {
                                                    if ($perfiles->setTrimestre($_POST['trimestre'])) {
                                                        if ($perfiles->setIdtipoactividad($_POST['id_tipo_actividad'])) {
                                                            if ($perfiles->setIdasignatura($_POST['id_asignatura'])) {
                                                                if ($perfiles->setIdestadoperfil($_POST['id_estadoperfil'])) {
                                                                    if ($perfiles->setIddocente($_POST['id_docente'])) {                                              
                                                                                if ($docente->updatePerfiles()) {
                                                                                    $result['status'] = 1;
                                                                                    $result['message'] = 'Profile modified correctly';
                                                                                } else {
                                                                                    $result['exception'] = Database::getException();
                                                                                }                                            
                                                                    } else {
                                                                        $result['exception'] = 'Enter a valid data';
                                                                    }
                                                                } else {
                                                                    $result['exception'] = 'Try a valid state';
                                                                }
                                                            }else {
                                                                $result['exception'] = 'Enter a correct subject';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Wrong activity type';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Wrong trimester';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Wrong end date ';
                                                }
                                            } else {
                                                $result['exception'] = 'Wrong start date';
                                            }
                                        } else {
                                            $result['exception'] = 'Invalid percentage';
                                        }
                                    } else {
                                        $result['exception'] = 'Invalid description';
                                    }
                                } else {
                                    $result['exception'] = 'Wrong profile';
                                }
                            } else {
                                $result['exception'] = 'Non-existent profile';
                            }
                        } else {
                            $result['exception'] = 'Wrong data';
                        }
                      break;
                      case 'delete':
                        if ($perfiles->setIdperfil($_POST['id_perfil']) ) {
                            if ($perfiles->deletePerfiles()) {
                                $result['status'] = 1;
                                $result['message'] = 'Profile removed correctly';
                            } else {
                                $result['exception'] = Database::getException();
                            }    
                        } else {
                            $result['exception'] = 'Wrong profile';
                        }
                        break;
                    
                    exit('Action not available within the session');
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