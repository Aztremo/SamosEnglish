<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class estadosolvencia extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombreestado = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombreestado($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombreestado = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id;
    }

    public function getNombreestado()
    {
        return $this->nombreestado;
    }
    

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchEst($value)
    {
        $sql = 'SELECT id_estadosolvencia, estados
                FROM estado_solvencia
                WHERE estados ILIKE ? 
                ORDER BY estados';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createEst()
    {
        
        $sql = 'INSERT INTO estado_solvencia(estados) VALUES(?)';
            $params = array($this->nombreestado);
            return Database::executeRow($sql, $params);
    }

    public function readAllEst()
    {
        $sql = 'SELECT id_estadosolvencia, estados
                FROM estado_solvencia
                ORDER BY estados';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneEst()
    {
        $sql = 'SELECT id_estadosolvencia, estados FROM estado_solvencia WHERE id_estadosolvencia = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateEst()
    {
        $sql = 'UPDATE estado_solvencia SET estados = ? WHERE id_estadosolvencia = ?';
            $params = array($this->nombreestado , $this->id);  
        return Database::executeRow($sql, $params);
    }

    public function deleteEst()
    {
        $sql = 'DELETE FROM estado_solvencia WHERE id_estadosolvencia = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
?>