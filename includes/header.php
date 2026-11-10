<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniNorte Enfermería - Plataforma Académica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: system-ui, -apple-system, sans-serif; }
        .top-navbar { background-color: #002b5c; color: white; padding: 12px 25px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .sub-navbar { background-color: #004080; padding: 8px 25px; }
        .nav-pills .nav-link { color: rgba(255,255,255,0.75); border-radius: 6px; font-size: 0.85rem; font-weight: 500; margin-right: 8px; padding: 6px 14px; }
        .nav-pills .nav-link.active { background-color: #0066cc; color: white; }
        .card-main { border: none; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.03); }
        .badge-pending { background-color: #fff3cd; color: #856404; font-weight: 600; border: 1px solid #ffeeba; }
        .badge-success-custom { background-color: #d4edda; color: #155724; font-weight: 600; border: 1px solid #c3e6cb; }
    </style>
</head>
<body>

    <!-- Barra Superior Principal -->
    <div class="top-navbar d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <div class="bg-warning text-dark p-2 rounded me-3 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                <i class="fas fa-user-nurse"></i>
            </div>
            <div>
                <h6 class="mb-0 fw-bold">UniNorte Enfermería</h6>
                <small class="text-white-50" style="font-size: 0.75rem;">Plataforma Académica de Prácticas Clínicas</small>
            </div>
        </div>
        
        <div class="d-flex align-items-center">
            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2 fw-bold" style="width: 32px; height: 32px; font-size: 0.85rem;">AG</div>
            <div class="me-3 text-end">
                <span class="d-block fw-bold" style="font-size: 0.85rem;">Ana Giménez</span>
                <span class="text-white-50" style="font-size: 0.7rem;">Estudiante | C.I. 4.512.332</span>
            </div>
            <a href="../index.php" class="btn btn-danger btn-sm px-3 py-1" style="font-size: 0.8rem;"><i class="fas fa-sign-out-alt me-1"></i> Cerrar Sesión</a>
        </div>
    </div>