<?php
require_once '../models/conexion.model.php';

class Matricula
{

    private $objetoConexion;

    public function __construct()
    {
        $this->objetoConexion = new Conexion();
    }

    //Crear
    public function create($codMatricula, $fkEstudiante, $fkGrado, $fkSeccion, $fkTurno, $fkEstado, $fkAnioLectivo, $fechaMatricula)
    {
        try {
            $query = "CALL sp_create_matricula(?,?,?,?,?,?,?,?)";
            $stmt = $this->objetoConexion->prepare($query);
            $stmt->bind_param('ssssssss', $codMatricula, $fkEstudiante, $fkGrado, $fkSeccion, $fkTurno, $fkEstado, $fkAnioLectivo, $fechaMatricula);
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
            }
        } catch (Exception $e) {
            error_log("Error en la consulta: " . $e->getMessage());
            return false;
        } finally {
            $stmt->close();
            $this->objetoConexion->cerrarConexion();
        }
    }


    //Leer
    public function read()
    {
        try {
            $consulta = "CALL sp_read_matricula();";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        } 
    }

    //Contar la cantidad de Matrículas por año
    public function readCantidadMatriculasAnio()
    {
        try {
            $consulta = "CALL sp_read_matriculas_anio();";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        } 
    }

    //Leer matricula por ID
    public function readMatricula($ID)
    {
        try {
            $consulta = "call sp_read_matricula_id('$ID');";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        } 
    }
    
    //Leer matricula por grado y año
    public function readGradoAnio($grado, $anio)
    {
        try {
            $consulta = "CALL sp_read_matriculas_grado_anio('$grado', '$anio');";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        } 
    }

    //Actualizar
    public function update($id, $codMatricula, $fkEstudiante, $fkGrado, $fkSeccion, $fkTurno, $fkEstado, $fkAnioLectivo, $fechaMatricula)
    {
        try {
            $query = "CALL sp_update_matricula(?,?,?,?,?,?,?,?,?);";
            $stmt = $this->objetoConexion->prepare($query);
            $stmt->bind_param('sssssssss', $id, $codMatricula, $fkEstudiante, $fkGrado, $fkSeccion, $fkTurno, $fkEstado, $fkAnioLectivo, $fechaMatricula);
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
            }
        } catch (Exception $e) {
            error_log("Error en la cansulta: " . $e->getMessage());
            return false;
        } finally {
            $stmt->close();
            $this->objetoConexion->cerrarConexion();
        }
    }
    
    //Eliminar
    public function delete($ID)
    {
        try {
            $query = "CALL sp_delete_matricula(?);";
            $stmt = $this->objetoConexion->prepare($query);
            $stmt->bind_param('s', $ID);
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
            }
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        } finally {
            $stmt->close();
            $this->objetoConexion->cerrarConexion();
        }
    }
}
