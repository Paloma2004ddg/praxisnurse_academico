<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../config/conexion.php';
include '../controllers/libreta_controller.php';
// Resto del código...

$libretaCtrl = new LibretaController($conn);

// Procesar la acción de aprobación o rechazo si se hizo clic en los botones
if (isset($_POST['accion']) && isset($_POST['id_actividad'])) {
    $id = $_POST['id_actividad'];
    $nuevoEstado = ($_POST['accion'] === 'aprobar') ? 'VALIDADO' : 'RECHAZADO';
    $libretaCtrl->actualizarEstado($id, $nuevoEstado);
    header("Location: bandeja_docente.php");
    exit();
}

// Obtener todas las actividades desde PostgreSQL
$actividades = $libretaCtrl->listarActividades();

include '../includes/header.php';
include '../includes/nav_tabs.php'; 
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h4 class="fw-bold mb-0 text-dark"><i class="fas fa-user-check text-primary me-2"></i> Bandeja de Validación - Docente Tutor</h4>
        <small class="text-muted">Revisión y aprobación de actividades clínicas enviadas por los estudiantes</small>
    </div>
</div>

<div class="card card-main p-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light text-uppercase text-muted" style="font-size: 0.75rem;">
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Apartado Clínico</th>
                    <th>Procedimiento</th>
                    <th>Horas</th>
                    <th>Estado</th>
                    <th>Acciones de Validación</th>
                </tr>
            </thead>
            <tbody style="font-size: 0.85rem;">
                <?php if (count($actividades) > 0): ?>
                    <?php foreach ($actividades as $act): ?>
                    <tr>
                        <td class="fw-bold text-muted">#<?php echo $act['id_actividad']; ?></td>
                        <td><?php echo $act['fecha_ejecucion'] ?? 'N/D'; ?></td>
                        <td class="fw-semibold"><?php echo $act['apartado_clinico'] ?? 'General'; ?></td>
                        <td><?php echo $act['nombre_procedimiento']; ?></td>
                        <td class="fw-bold text-primary"><?php echo $act['horas_ejecutadas']; ?> hrs</td>
                        <td>
                            <?php if ($act['estado_validacion'] == 'VALIDADO' || $act['estado_validacion'] == 'APROBADO'): ?>
                                <span class="badge bg-success px-2 py-1">VALIDADO</span>
                            <?php elseif ($act['estado_validacion'] == 'RECHAZADO'): ?>
                                <span class="badge bg-danger px-2 py-1">RECHAZADO</span>
                            <?php else: ?>
                                <span class="badge bg-warning text-dark px-2 py-1">PENDIENTE</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <form action="" method="POST" class="d-inline">
                                <input type="hidden" name="id_actividad" value="<?php echo $act['id_actividad']; ?>">
                                <button type="submit" name="accion" value="aprobar" class="btn btn-success btn-sm px-2 py-1 fw-bold" style="font-size: 0.75rem;"><i class="fas fa-check me-1"></i> Aprobar</button>
                                <button type="submit" name="accion" value="rechazar" class="btn btn-danger btn-sm px-2 py-1 fw-bold" style="font-size: 0.75rem;"><i class="fas fa-times me-1"></i> Rechazar</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7" class="text-center text-muted py-3">No hay actividades registradas en la base de datos.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>