<?php
include_once '../config/conexion.php';

class RotacionController {
    private $db;

    public function __construct($conexion) {
        $this->db = $conexion;
    }

    public function listarCentros() {
        try {
            $stmt = $this->db->query("SELECT * FROM enfermeria_g3.centro_asistencial ORDER BY nombre ASC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}
?>