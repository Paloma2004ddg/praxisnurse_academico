<?php
include_once '../config/conexion.php';

class EstudianteController {
    private $db;

    public function __construct($conexion) {
        $this->db = $conexion;
    }

    // Obtener todos los estudiantes
    public function listarEstudiantes() {
        try {
            $stmt = $this->db->query("SELECT * FROM enfermeria_g3.estudiante ORDER BY apellido ASC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    // Registrar un nuevo estudiante
    public function registrarEstudiante($cedula, $nombre, $apellido, $semestre) {
        try {
            $sql = "INSERT INTO enfermeria_g3.estudiante (cedula, nombre, apellido, semestre) VALUES (:cedula, :nombre, :apellido, :semestre)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                'cedula' => $cedula,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'semestre' => $semestre
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>