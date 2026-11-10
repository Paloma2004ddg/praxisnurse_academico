<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../config/conexion.php';
// Resto del código...
include '../controllers/libreta_controller.php';

$mensaje = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $libretaCtrl = new LibretaController($conn);
    
    // IDs de prueba fijos (Estudiante 1: Ana Giménez, Instructor 1: Dora Villalba)
    $id_estudiante = 1; 
    $id_instructor = 1; 

    $apartado = intval($_POST['apartado_clinico'] ?? 1); // Valor numérico para INT
    $procedimiento = $_POST['nombre_procedimiento'] ?? '';
    $horas = intval($_POST['horas_ejecutadas'] ?? 0);

    // Envía los 5 argumentos requeridos por la tabla SQL
    $exito = $libretaCtrl->registrarActividad($id_estudiante, $id_instructor, $apartado, $procedimiento, $horas);
    
    if ($exito) {
        header("Location: libreta.php?registrado=ok");
        exit();
    } else {
        $mensaje = "Error al registrar la actividad en la base de datos de PostgreSQL.";
    }
}

include '../includes/header.php';
include '../includes/nav_tabs.php'; 
?>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card card-main p-4">
            <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                <div>
                    <h5 class="fw-bold mb-0 text-dark"><i class="fas fa-file-medical text-primary me-2"></i> Registro de Nueva Actividad Práctica</h5>
                    <small class="text-muted">WF-D02 / WF-D03 - Formulario de envío para validación académica</small>
                </div>
                <span class="badge bg-secondary font-monospace">Esquema enfermeria_g3</span>
            </div>

            <?php if (!empty($mensaje)): ?>
                <div class="alert alert-danger"><?php echo $mensaje; ?></div>
            <?php endif; ?>

            <div class="alert alert-warning border-0 bg-warning bg-opacity-15 d-flex align-items-start mb-4" role="alert">
                <i class="fas fa-exclamation-triangle text-warning me-3 mt-1 fs-5"></i>
                <div class="small">
                    <span class="fw-bold">Advertencia importante:</span><br>
                    El envío de este formulario registra inmediatamente la actividad en la base de datos con estado <b>PENDIENTE</b>. Requerirá la aprobación posterior de su Docente Tutor asignado.
                </div>
            </div>

            <!-- Formulario HTML -->
            <form action="" method="POST">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-bold">Apartado Clínico / Módulo *</label>
                        <select name="apartado_clinico" class="form-select" required>
                            <option selected disabled value="">Seleccione un apartado...</option>
                            <option value="1">1 - Signos Vitales y Vías</option>
                            <option value="2">2 - Cuidados Intermedios</option>
                            <option value="3">3 - Urgencias y Traumatología</option>
                            <option value="4">4 - Materno Infantil</option>
                            <option value="5">5 - Quirófano y Esterilización</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold">Docente Tutor Responsable *</label>
                        <select name="docente_tutor" class="form-select" required>
                            <option selected disabled value="">Seleccione un tutor...</option>
                            <option value="Dra. Dora Villalba">Dra. Dora Villalba</option>
                            <option value="Lic. Esteban Roa">Lic. Esteban Roa</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold">Nombre del Procedimiento Realizado *</label>
                    <input type="text" name="nombre_procedimiento" class="form-control" placeholder="Ej. Administración de Medicamentos e Intracanal" required>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label small fw-bold">Cantidad de Horas Ejecutadas *</label>
                        <div class="input-group">
                            <input type="number" name="horas_ejecutadas" class="form-control" value="4" min="1" max="12" required>
                            <span class="input-group-text bg-light text-muted">hrs</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold">Fecha de Ejecución (Informativa)</label>
                        <div class="input-group">
                            <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" disabled>
                            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt text-muted"></i></span>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 border-top pt-3">
                    <a href="libreta.php" class="btn btn-light px-4">Cancelar</a>
                    <button type="submit" class="btn btn-success px-4"><i class="fas fa-paper-plane me-1"></i> Guardar y Enviar Actividad</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>