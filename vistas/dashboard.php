<?php 
include '../config/conexion.php';
include '../includes/header.php';
include '../includes/nav_tabs.php'; 
?>

<div class="mb-3">
    <h4 class="fw-bold mb-0 text-dark"><i class="fas fa-chart-line text-primary me-2"></i> Informe Consolidado de Horas Prácticas</h4>
    <small class="text-muted">Métricas globales para Coordinación y Dirección Académica (WF-D08)</small>
</div>

<!-- Tarjetas KPI -->
<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="card card-main p-3 border-start border-4 border-primary">
            <div class="text-muted small fw-bold text-uppercase">Estudiantes Activos</div>
            <div class="d-flex align-items-center mt-2">
                <div class="bg-primary bg-opacity-10 text-primary p-3 rounded me-3"><i class="fas fa-users fs-4"></i></div>
                <h3 class="fw-bold mb-0">42</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card card-main p-3 border-start border-4 border-success">
            <div class="text-muted small fw-bold text-uppercase">Horas Acumuladas</div>
            <div class="d-flex align-items-center mt-2">
                <div class="bg-success bg-opacity-10 text-success p-3 rounded me-3"><i class="fas fa-clock fs-4"></i></div>
                <h3 class="fw-bold mb-0">1,280 hrs</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card card-main p-3 border-start border-4 border-warning">
            <div class="text-muted small fw-bold text-uppercase">Promedio por Alumno</div>
            <div class="d-flex align-items-center mt-2">
                <div class="bg-warning bg-opacity-10 text-warning p-3 rounded me-3"><i class="fas fa-award fs-4"></i></div>
                <h3 class="fw-bold mb-0">30.4 hrs</h3>
            </div>
        </div>
    </div>
</div>

<!-- Tabla Resumen -->
<div class="card card-main p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0 text-secondary">RESUMEN POR ESTUDIANTE (VISTA VW_RESUMEN_HORAS_ESTUDIANTE)</h6>
        <span class="badge bg-light text-dark border"><i class="fas fa-database text-success me-1"></i> Conectado a PostgreSQL</span>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light text-uppercase text-muted" style="font-size: 0.75rem;">
                <tr>
                    <th>Cédula</th>
                    <th>Estudiante</th>
                    <th>Horas Validadas</th>
                    <th>Horas Pendientes</th>
                    <th>Estado General</th>
                </tr>
            </thead>
            <tbody style="font-size: 0.85rem;">
                <tr>
                    <td class="fw-bold text-muted">4.512.332</td>
                    <td class="fw-semibold">Ana Giménez</td>
                    <td class="text-success fw-bold">6 hrs</td>
                    <td class="text-warning fw-bold">4 hrs</td>
                    <td><span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary px-2">EN PROGRESO</span></td>
                </tr>
                <tr>
                    <td class="fw-bold text-muted">3.890.112</td>
                    <td class="fw-semibold">Marcos Ruiz</td>
                    <td class="text-success fw-bold">50 hrs</td>
                    <td class="text-muted">0 hrs</td>
                    <td><span class="badge bg-success bg-opacity-10 text-success border border-success px-2">COMPLETADO</span></td>
                </tr>
                <tr>
                    <td class="fw-bold text-muted">5.102.994</td>
                    <td class="fw-semibold">Carla Benítez</td>
                    <td class="text-success fw-bold">28 hrs</td>
                    <td class="text-warning fw-bold">6 hrs</td>
                    <td><span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary px-2">EN PROGRESO</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>