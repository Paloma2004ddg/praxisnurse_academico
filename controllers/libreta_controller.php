<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once '../config/conexion.php';

class LibretaController {
    private $db;

    public function __construct($conexion) {
        $this->db = $conexion;
    }

    // Listar todas las actividades de la libreta de forma segura
    public function listarActividades() {
        try {
            $stmt = $this->db->query("SELECT * FROM enfermeria_g3.actividad_libreta ORDER BY id_actividad DESC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    // Registrar nueva actividad clínica (Estudiante)
    public function registrarActividad($id_estudiante, $id_instructor, $apartado, $procedimiento, $horas) {
        try {
            $sql = "INSERT INTO enfermeria_g3.actividad_libreta 
                    (id_estudiante, id_instructor, apartado_clinico, nombre_procedimiento, horas_ejecutadas, estado_validacion) 
                    VALUES (:estudiante, :instructor, :apartado, :procedimiento, :horas, 'PENDIENTE')";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                'estudiante'    => $id_estudiante,
                'instructor'    => $id_instructor,
                'apartado'      => $apartado,
                'procedimiento' => $procedimiento,
                'horas'         => $horas
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    // Actualizar estado de validación (Docente Tutor: APROBADO / RECHAZADO)
    public function actualizarEstado($id_actividad, $nuevo_estado) {
        try {
            $sql = "UPDATE enfermeria_g3.actividad_libreta SET estado_validacion = :estado WHERE id_actividad = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                'estado' => $nuevo_estado,
                'id'     => $id_actividad
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>s