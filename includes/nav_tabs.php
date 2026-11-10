<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$rolActual = $_SESSION['rol'] ?? 'estudiante';
?>
    <!-- Barra de Pestañas Dinámica según el Rol -->
    <div class="sub-navbar">
        <ul class="nav nav-pills">
            <?php if ($rolActual === 'estudiante'): ?>
                <!-- Pestañas exclusivas para Estudiantes (WF-D01 y WF-D02)[span_3](start_span)[span_3](end_span) -->
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'libreta.php' ? 'active' : ''; ?>" href="libreta.php">
                        <i class="fas fa-list-alt me-1"></i> 1. Mis Actividades (WF-D01)
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'nueva_actividad.php' ? 'active' : ''; ?>" href="nueva_actividad.php">
                        <i class="fas fa-plus-circle me-1"></i> 2. Nueva Actividad (WF-D02)
                    </a>
                </li>
            <?php else: ?>
                <!-- Pestañas exclusivas para Docentes (WF-D04 y WF-D08)[span_4](start_span)[span_4](end_span)[span_5](start_span)[span_5](end_span) -->
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'bandeja_docente.php' ? 'active' : ''; ?>" href="bandeja_docente.php">
                        <i class="fas fa-user-check me-1"></i> 3. Bandeja Tutor (WF-D04)
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>" href="dashboard.php">
                        <i class="fas fa-chart-bar me-1"></i> 4. Informe Dirección (WF-D08)
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
    
    <div class="container my-4">