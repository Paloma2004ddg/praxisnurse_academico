<?php 
include '../config/conexion.php';
include '../includes/header.php'; 
include '../includes/sidebar.php'; 

try {
    $stmt = $conn->query("SELECT * FROM enfermeria_g3.estudiante ORDER BY apellido ASC");
    $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $estudiantes = [];
    $error = $e->getMessage();
}
?>

<h2>Gestión de Estudiantes</h2>
<hr>

<?php if(isset($error)): ?>
    <div class="alert alert-danger">Error al consultar la base de datos: <?php echo $error; ?></div>
<?php endif; ?>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Semestre</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($estudiantes) > 0): ?>
                    <?php foreach($estudiantes as $est): ?>
                    <tr>
                        <td><?php echo $est['id_estudiante']; ?></td>
                        <td><?php echo $est['cedula']; ?></td>
                        <td><?php echo $est['nombre']; ?></td>
                        <td><?php echo $est['apellido']; ?></td>
                        <td><span class="badge bg-secondary"><?php echo $est['semestre']; ?>° Semestre</span></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5" class="text-center text-muted">No hay estudiantes registrados.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>