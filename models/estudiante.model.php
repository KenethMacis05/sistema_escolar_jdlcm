<?php 
require_once '../models/conexion.model.php';

class Estudiante 
{
    private $objetoConexion;    

    public function __construct() {
        $this->objetoConexion = new Conexion();
    }

    //Crear
    public function create($priNombre, $segNombre, $priApellido, $segApellido, $fechaNacimiento, $cedula, $genero, $telefono, $direccion, $correo, $fkTutor) {
        try {
            $query = "CALL sp_create_student(?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->objetoConexion->conectar()->prepare($query);            
            $stmt->bind_param('sssssssssss', $priNombre, $segNombre, $priApellido, $segApellido, $fechaNacimiento, $cedula, $genero, $telefono, $direccion, $correo, $fkTutor);
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta: ". $stmt->error);
            }
        } catch (Exception $e) {
            echo "Error en la consulta: ". $e->getMessage();
            return false;
        } finally {            
            $stmt->close();
        }
    }
    
    //Leer
    public function read() { 
        try {
            $consulta = "CALL sp_read_student();";
            $resultado = $this->objetoConexion->consultar($consulta);

            if ($resultado) {
                return $resultado;                
            } else {
                throw new Exception("No se encontraron estudiantes.");
            }
        } catch (Exception $e) {
            error_log("Error en la cansulta: " . $e->getMessage());
            return false;
        }        
    }

    //Actualizar
    public function update($id, $priNombre, $segNombre, $priApellido, $segApellido, $fechaNacimiento, $cedula, $genero, $telefono, $direccion, $correo, $fkTutor) {
        try {
            $consulta = "CALL sp_update_student('$id', '$priNombre', '$segNombre', '$priApellido', '$segApellido', '$fechaNacimiento', '$cedula', '$genero', '$telefono', '$direccion', '$correo', '$fkTutor');";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: ". $e->getMessage();
            return false;
        }
    }

    //Eliminar
    public function delete($ID) {
        try {
            $consulta = "CALL sp_delete_student('$ID');";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: ". $e->getMessage();
            return false;
        }
    }
}
?>