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
                    $result['exception'] = 'No hay perfiles registrados';
                }
                break;
            case 'search':
                $_POST = $perfiles->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $perfiles->searchPerfiles($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Se encontraron ' . $rows . ' coincidencias';
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
                                                                            $result['message'] = 'Perfil creado correctamente';
                                                                           } else {
                                                                               $result['exception'] = Database::getException();;
                                                                           }
                                                                       } else {
                                                                           $result['exception'] = "Docente no válido";
                                                                       }
                                                                   } else {
                                                                       $result['exception'] = "Seleccione un docente";
                                                                   }
                                                               } else {
                                                                   $result['exception'] = "Estado incorrecto";
                                                               }
                                                           } else {
                                                               $result['exception'] = "Seleccione un estado";
                                                           }
                                                       } else {
                                                           $result['exception'] = "Asignatura no válida";
                                                       }
                                                   } else {
                                                       $result['exception'] = "Seleccione una asignatura";
                                                   }
                                               } else {
                                                   $result['exception'] = "Tipo de actividad no válido";
                                               }
                                           } else {
                                               $result['exception'] = "Seleccione un tipo de actividad";
                                           }
                                       } else {
                                           $result['exception'] = "Trimestre incorrecto";
                                       }
                                   } else {
                                       $result['exception'] = "Fecha fin no válida";
                                   }
                               } else {
                                   $result['exception'] = "Fecha inicio no válida";
                               }
                           } else {
                               $result['exception'] = "Porcentaje no válido";
                           }
                       } else {
                           $result['exception'] = "Descripción no válida";
                       }
                   } else {
                       $result['exception'] = "Nombre de perfil no válido";
                   }
    
                 break;
                 case 'readOne':
                    if ($perfiles->setIdperfil($_POST['id_perfil'])) {
                        if ($result['dataset'] = $perfiles->readOnePerfiles()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'Este Perfil no existe';
                        }
                    } else {
                        $result['exception'] = 'Perfil incorrecto';
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
                                                                                    $result['message'] = 'Perfil modificado correctamente';
                                                                                } else {
                                                                                    $result['exception'] = Database::getException();
                                                                                }                                            
                                                                    } else {
                                                                        $result['exception'] = 'Ingrese un dato valido';
                                                                    }
                                                                } else {
                                                                    $result['exception'] = 'Intente un estado válido';
                                                                }
                                                            }else {
                                                                $result['exception'] = 'Ingrese una asignatura correcta';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Tipo de actividad incorrecto';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Trimestre incorrecto';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Fecha fin incorrecta';
                                                }
                                            } else {
                                                $result['exception'] = 'Fecha inicio valida';
                                            }
                                        } else {
                                            $result['exception'] = 'Porcentaje no valido';
                                        }
                                    } else {
                                        $result['exception'] = 'Descripción no valida';
                                    }
                                } else {
                                    $result['exception'] = 'Perfil incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Perfil inexistente';
                            }
                        } else {
                            $result['exception'] = 'Dato incorrecto';
                        }
                      break;
                      case 'delete':
                        if ($perfiles->setIdperfil($_POST['id_perfil']) ) {
                            if ($perfiles->deletePerfiles()) {
                                $result['status'] = 1;
                                $result['message'] = 'Perfil eliminado correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }    
                        } else {
                            $result['exception'] = 'Perfil incorrecto';
                        }
                        break;
                    
                    exit('Acción no disponible dentro de la sesión');
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