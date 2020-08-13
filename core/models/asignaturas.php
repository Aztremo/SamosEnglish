<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class Asignaturas extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_asignatura = null;
    private $nombreasignatura = null;
    private $id_tipoasignatura = null;
    private $id_estadoasignatura = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdasignatura($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_asignatura = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombreasignatura($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombreasignatura = $value;
            return true;
        } else {
            return false;
        }
    }


    public function setIdtipoasignatura($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_tipoasignatura = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdestadoasignatura($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_estadoasignatura = $value;
            return true;
        } else {
            return false;
        }
    }
    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdasignatura()
    {
        return $this->id_asignatura;
    }

    public function getNombreasignatura()
    {
        return $this->nombreasignatura;
    }
    
    public function getIdTipoasignatura()
    {
        return $this->id_tipoasignatura;
    }

    public function getIdEstadoasignatura()
    {
        return $this->id_estadoasignatura;
    }
    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchAsignaturas($value)
    {
        $sql = 'SELECT id_asignatura, nombreasignatura, tipoasignatura, estado_asignatura
                FROM asignaturas INNER JOIN tipo_asignatura USING(id_tipoasignatura) INNER JOIN estado_asignatura USING(id_estadoasignatura)
                WHERE nombreasignatura ILIKE ?
                ORDER BY nombreasignatura';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createAsignatura()
    {
        $sql = 'INSERT INTO asignaturas( nombreasignatura, id_tipoasignatura, id_estadoasignatura)
                    VALUES(?, ?, ?)';
            $params = array($this->nombreasignatura, $this->id_tipoasignatura, $this->id_estadoasignatura);
            return Database::executeRow($sql, $params);
    }

    public function readAllAsignaturas()
    {
        $sql = 'SELECT id_asignatura, nombreasignatura, tipoasignatura, estado_asignatura
                FROM asignaturas INNER JOIN tipo_asignatura USING(id_tipoasignatura) INNER JOIN estado_asignatura USING(id_estadoasignatura)
                ORDER BY nombreasignatura';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneAsignaturas()
    {
        $sql = 'SELECT id_asignatura, nombreasignatura, id_tipoasignatura, id_estadoasignatura 
                FROM asignaturas 
                WHERE id_asignatura = ?';
        $params = array($this->id_asignatura);
        return Database::getRow($sql, $params);
    }

    public function updateAsignaturas()
    {
        $sql = 'UPDATE asignaturas 
                SET nombreasignatura = ?, id_tipoasignatura = ?, id_estadoasignatura = ? 
                WHERE id_asignatura = ?';
            $params = array($this->tipoasignatura , $this->estadoasignatura);  
        return Database::executeRow($sql, $params);
    }

    public function deleteAsignaturas()
    {
        $sql = 'DELETE FROM asignaturas WHERE id_asignatura = ?';
        $params = array($this->id_asignatura);
        return Database::executeRow($sql, $params);
    }
}
?>