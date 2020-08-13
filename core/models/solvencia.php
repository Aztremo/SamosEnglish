<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class Solvencias extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_solvencia = null;
    private $id_estadosolvencia = null;
    private $id_anio = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdSolvencia($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_solvencia = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdEstado($value)
    {
        if($this->validateNaturalNumber($value)) {
            $this->id_estadosolvencia = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdAnio($value)
    {
        if($this->validateNaturalNumber($value)) {
            $this->id_anio = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdSolvencia()
    {
        return $this->id_solvencia;
    }

    public function getIdEstado()
    {
        return $this->id_estadosolvencia;
    }

    public function getIdAnio()
    {
        return $this->id_anio;
    }
    

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchSolvencia($value)
    {
        $sql = 'SELECT id_solvencia, id_estadosolvencia, id_anio
                FROM solvencia
                WHERE CAST(id_estadosolvencia as character varying) ILIKE ?
                ORDER BY id_solvencia';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createSolvencia()
    {
        
        $sql = 'INSERT INTO solvencia(id_estadosolvencia, id_anio) 
                VALUES(?, ?)';
           $params = array($this->id_estadosolvencia, $this->id_anio);
            return Database::executeRow($sql, $params);
    }

    public function readAllSolvencias()
    {
        $sql = 'SELECT id_solvencia, id_estadosolvencia, id_anio
                FROM solvencia
                ORDER BY id_solvencia';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneSolvencia()
    {
        $sql = 'SELECT id_solvencia, id_estadosolvencia, id_anio FROM solvencia WHERE id_solvencia = ?';
        $params = array($this->id_solvencia);
        return Database::getRow($sql, $params);
    }

    public function updateSolvencia()
    {
        $sql = 'UPDATE solvencia SET id_estadosolvencia = ?, id_anio = ? 
                WHERE id_solvencia = ?';
            $params = array($this->id_estadosolvencia, $this->id_anio , $this->id_solvencia);  
        return Database::executeRow($sql, $params);
    }

    public function deleteSolvencia()
    {
        $sql = 'DELETE FROM solvencia WHERE id_solvencia = ?';
        $params = array($this->id_solvencia);
        return Database::executeRow($sql, $params);
    }
}
?>