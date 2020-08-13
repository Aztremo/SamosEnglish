<?php
/*
*	Clase para manejar la tabla categorias de la base de datos. Es clase hija de Validator.
*/
class Estadoperfil extends Validator
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
    public function searchEstado($value)
    {
        $sql = 'SELECT id_estadoperfil, estado
                FROM estado_perfil
                WHERE estado ILIKE ? 
                ORDER BY estado';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createEstado()
    {
        
        $sql = 'INSERT INTO estado_perfil(estado) VALUES(?)';
            $params = array($this->nombreestado);
            return Database::executeRow($sql, $params);
    }

    public function readAllEstado()
    {
        $sql = 'SELECT id_estadoperfil, estado
                FROM estado_perfil
                ORDER BY estado';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneEstado()
    {
        $sql = 'SELECT id_estadoperfil, estado FROM estado_perfil WHERE id_estadoperfil = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateEstado()
    {
        $sql = 'UPDATE estado_perfil SET estado = ? WHERE id_estadoperfil = ?';
            $params = array($this->nombreestado , $this->id);  
        return Database::executeRow($sql, $params);
    }

    public function deleteEstado()
    {
        $sql = 'DELETE FROM estado_perfil WHERE id_estadoperfil = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
?>