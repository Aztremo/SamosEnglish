<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class Grado extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $cantidad = null;
    private $grado = null;
    private $estado = null;

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

    public function setCantidad($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->cantidad = $value;
            return true;
        } else {
            return false;
        }
    }


    public function setGrado($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->grado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if($this->validateNaturalNumber($value)) {
            $this->estado = $value;
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

    public function getCantidad()
    {
        return $this->cantidad;
    }
    
    public function getGrado()
    {
        return $this->grado;
    }

    public function getEstado()
    {
        return $this->estado;
    }
    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchGrado($value)
    {
        $sql = 'SELECT id_grado, cantidad_alumnos, grado, estadog
                FROM grado INNER JOIN estado_grado USING(id_estadogrado)
                WHERE grado ILIKE ? 
                ORDER BY grado';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createGrado()
    {
        $sql = 'INSERT INTO grado( cantidad_alumnos, grado, id_estadogrado)
                    VALUES(?, ?, ?)';
            $params = array($this->cantidad, $this->grado, $this->estado);
            return Database::executeRow($sql, $params);
    }

    public function readAllGrado()
    {
        $sql = 'SELECT id_grado, cantidad_alumnos, grado, estadog
                FROM grado INNER JOIN estado_grado USING (id_estadogrado)
                ORDER BY grado';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneGrado()
    {
        $sql = 'SELECT id_grado, cantidad_alumnos, grado, id_estadogrado 
                FROM grado 
                WHERE id_grado = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateGrado()
    {
        $sql = 'UPDATE grado 
                SET cantidad_alumnos = ?, id_estadogrado = ? 
                WHERE id_grado = ?';
            $params = array($this->cantidad , $this->estado);  
        return Database::executeRow($sql, $params);
    }

    public function deleteGrado()
    {
        $sql = 'DELETE FROM grado WHERE id_grado = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
?>