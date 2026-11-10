<?php
// index.php
session_start();
if (isset($_POST['rol'])) {
    $_SESSION['rol'] = $_POST['rol']; // 'estudiante' o 'docente'
    $_SESSION['usuario'] = $_POST['usuario'];
    
    if ($_SESSION['rol'] === 'docente') {
        header("Location: vistas/bandeja_docente.php");
    } else {
        header("Location: vistas/libreta.php");
    }
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al Sistema - Plataforma Académica de Enfermería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #f4f6f9; height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-card { width: 420px; border: none; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.08); overflow: hidden; background: #fff; }
        .login-header { background: linear-gradient(135deg, #002b5c 0%, #004080 100%); color: white; padding: 30px 20px; text-align: center; }
        .role-btn { border: 1px solid #dee2e6; background: #f8f9fa; font-weight: 500; font-size: 0.9rem; }
        .btn-check:checked + .role-btn { background: #fff; color: #002b5c; border-color: #002b5c; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .btn-custom { background-color: #002b5c; color: white; font-weight: 600; }
        .btn-custom:hover { background-color: #001f40; color: white; }
    </style>
</head>
<body>

<div class="card login-card">
    <div class="login-header">
        <div class="mb-2"><i class="fas fa-user-nurse fa-2x text-warning"></i></div>
        <h4 class="fw-bold mb-1">Acceso al Sistema</h4>
        <p class="small text-white-50 mb-0">Plataforma Académica de Enfermería - UniNorte</p>
    </div>
    <div class="card-body p-4">
        <form action="" method="POST">
            <label class="form-label small fw-bold text-muted">SELECCIONE SU ROL DE INGRESO</label>
            <div class="btn-group w-100 mb-3" role="group">
                <input type="radio" class="btn-check" name="rol" id="rol1" value="estudiante" checked>
                <label class="btn role-btn" for="rol1"><i class="fas fa-user-graduate me-1"></i> Estudiante</label>

                <input type="radio" class="btn-check" name="rol" id="rol2" value="docente">
                <label class="btn role-btn" for="rol2"><i class="fas fa-chalkboard-teacher me-1"></i> Docente Tutor</label>
            </div>

            <div class="mb-3">
                <label class="form-label small fw-bold text-muted">Cédula de Identidad / Usuario</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="fas fa-id-card text-muted"></i></span>
                    <input type="text" name="usuario" class="form-control" value="4.512.332" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label small fw-bold text-muted">Contraseña</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="fas fa-lock text-muted"></i></span>
                    <input type="password" class="form-control" value="********" required>
                </div>
            </div>

            <button type="submit" class="btn btn-custom w-100 py-2">Ingresar al Sistema &rarr;</button>
        </form>
        <div class="text-center mt-4 pt-2 border-top text-muted" style="font-size: 0.75rem;">
            Universidad del Norte &copy; 2026 | Sistema de Gestión de Prácticas
        </div>
    </div>
</div>

</body>
</html>