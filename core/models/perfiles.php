<?php
/*
*	Clase para manejar la tabla clientes de la base de datos.
*/
class Perfiles extends Validator
{
    // Aquí van las propiedades y métodos de los clientes.

    private $id_perfil = null;
    private $nombreperfil = null;
    private $descripcion = null;
    private $porcentaje = null;
    private $fecha_inicio = null;
    private $fecha_fin = null;
    private $trimestre = null;
    private $id_tipo_actividad = null;
    private $id_asignatura = null;
    private $id_estadoperfil = null;
    private $id_docente = null;

    // Métodos para asignar valores a los atributos.

    public function setIdperfil($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_perfil = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombreperfil($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombreperfil = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDescripcion($value)
    {
        if ($this->validateAlphabetic($value, 1, 200)) {
            $this->descripcion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPorcentaje($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->porcentaje = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFechainicio($value)
    {
        if ($this->validateDate($value)) {
            $this->fecha_inicio = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFechafin($value)
    {
        if ($this->validateDate($value)) {
            $this->fecha_fin = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTrimestre($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->trimestre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdtipoactividad($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_tipo_actividad = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdasignatura($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_asignatura = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdestadoperfil($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_estadoperfil = $value;
            return true;
        } else {
            return false;
        }
    }
    

    public function setIddocente($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_docente = $value;
            return true;
        } else {
            return false;
        }
    }

    //Métodos para obtener valores de los atributos.

    public function getIdperfil()
    {
        return $this->id_perfil;
    }

    public function getNombreperfil()
    {
        return $this->nombreperfil;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPorcentaje()
    {
        return $this->porcentaje;
    }

    public function getFechainicio()
    {
        return $this->fecha_incio;
    }

    public function getFechafin()
    {
        return $this->fecha_fin;
    }

    public function getTrimestre()
    {
        return $this->trimestre;
    }

    public function getIdtipoactividad()
    {
        return $this->id_tipo_actividad;
    }

    public function getIdasignatura()
    {
        return $this->id_asignatura;
    }

    public function getIdestadoperfil()
    {
        return $this->id_estadoperfil;
    }

    public function getDocente()
    {
        return $this->id_docente;
    }


    //Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).

    public function searchPerfiles($value)
    {
        $sql = 'SELECT id_perfil, nombreperfil, perfiles.descripcion, porcentaje, fecha_inicio, fecha_fin, trimestre, nombre_actividad, nombreasignatura, estado, nombredocente
                FROM perfiles INNER JOIN tipo_perfil USING(id_tipo_actividad) INNER JOIN asignaturas USING(id_asignatura) INNER JOIN estado_perfil USING(id_estadoperfil) INNER JOIN docente2 USING(id_docente)
                WHERE nombreperfil ILIKE ?
                ORDER BY nombreperfil';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createPerfiles()
    {       
        $sql = 'INSERT INTO perfiles( nombreperfil, descripcion, porcentaje, fecha_inicio, fecha_fin, trimestre, id_tipo_actividad, id_asignatura, id_estadoperfil, id_docente)
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            $params = array($this->nombreperfil, $this->descripcion, $this->porcentaje, $this->fecha_inicio, $this->fecha_fin, $this->trimestre, $this->id_tipo_actividad, $this->id_asignatura, $this->id_estadoperfil, $this->id_docente);
            return Database::executeRow($sql, $params);
    }

    public function readAllPerfiles()
    {
        $sql = 'SELECT id_perfil, nombreperfil, perfiles.descripcion, porcentaje, fecha_inicio, fecha_fin, trimestre, nombre_actividad, nombreasignatura, estado, nombredocente
                FROM perfiles INNER JOIN tipo_perfil USING(id_tipo_actividad) INNER JOIN asignaturas USING(id_asignatura) INNER JOIN estado_perfil USING(id_estadoperfil) INNER JOIN docente2 USING(id_docente)
                ORDER BY nombreperfil';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOnePerfiles()
    {
        $sql = 'SELECT id_perfil, nombreperfil, perfiles.descripcion, porcentaje, fecha_inicio, fecha_fin, trimestre, nombre_actividad, nombreasignatura, estado, nombredocente
                FROM perfiles
                WHERE id_perfil = ?';
        $params = array($this->id_perfil);
        return Database::getRow($sql, $params);
    }

    public function updatePerfiles()
    {
        $sql = 'UPDATE perfiles
                    SET nombreperfil = ?, perfiles.descripcion = ?, porcentaje =?, fecha_inicio =?, fecha_fin =?, trimestre =?, nombre_actividad =?, nombreasignatura =?, estado =?, nombredocente =?
                    WHERE id_perfil = ?';
        $params = array($this->nombreperfil, $this->descripcion, $this->porcentaje, $this->fecha_inicio, $this->fecha_fin, $this->trimestre, $this->id_tipo_actividad, $this->id_asignatura, $this->id_estadoperfil, $this->id_docente);
        return Database::executeRow($sql, $params);
    }

    public function deletePerfiles()
    {
        $sql = 'DELETE FROM perfiles WHERE id_perfil = ?';
        $params = array($this->id_perfil);
        return Database::executeRow($sql, $params);
    }
}
?>