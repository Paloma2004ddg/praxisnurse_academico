<?php 
include '../config/conexion.php';
include '../includes/header.php';
include '../includes/nav_tabs.php'; 
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h4 class="fw-bold mb-0 text-dark"><i class="fas fa-book-medical text-primary me-2"></i> Mis Actividades Clínicas</h4>
        <small class="text-muted">Historial completo de registros de prácticas hospitalarias ejecutadas</small>
    </div>
    <a href="nueva_actividad.php" class="btn btn-primary btn-sm px-3"><i class="fas fa-plus me-1"></i> Registrar Nueva Actividad</a>
</div>

<div class="card card-main p-3 mb-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center">
            <span class="small text-muted me-2"><i class="fas fa-filter me-1"></i> Filtrar por Estado:</span>
            <select class="form-select form-select-sm" style="width: 180px;">
                <option>Todos los estados</option>
                <option>Pendiente</option>
                <option>Validado</option>
            </select>
        </div>
        <div class="small fw-bold text-muted">
            Total acumulado: <span class="text-dark">12 hrs</span>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light text-uppercase text-muted" style="font-size: 0.75rem;">
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Apartado Clínico</th>
                    <th>Procedimiento Realizado</th>
                    <th>Horas</th>
                    <th>Docente Tutor</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody style="font-size: 0.85rem;">
                <tr>
                    <td class="text-muted fw-bold">#01</td>
                    <td>2026-11-09</td>
                    <td class="fw-semibold">Signos Vitales y Vías</td>
                    <td>Administración de Medicamentos e Intracanal</td>
                    <td class="fw-bold text-primary">4 hrs</td>
                    <td>Lic. María González</td>
                    <td><span class="badge badge-pending px-2 py-1">PENDIENTE</span></td>
                </tr>
                <tr>
                    <td class="text-muted fw-bold">#02</td>
                    <td>2026-11-08</td>
                    <td class="fw-semibold">Cuidados Intermedios</td>
                    <td>Control de Goteo y Colocación de Sonda</td>
                    <td class="fw-bold text-primary">6 hrs</td>
                    <td>Lic. Carlos Benítez</td>
                    <td><span class="badge badge-success-custom px-2 py-1">VALIDADO</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>