<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title', 'AdminProject') ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <style>
      :root {
            --body-bg: #f0f2f5;
            --panel-bg: #ffffff;
            --sidebar-bg: #ffffff; 
            --sidebar-text: #495057;
            --sidebar-header-text: #212529;
            --sidebar-hover-bg: #e9ecef;
            --main-text: #212529; 
            --secondary-text: #6c757d;
            --border-color: #dee2e6;
            --form-input-bg: #ffffff;
            --form-input-text: #212529;
            --brand-purple: #8e44ad; 
            --accent-yellow: #ffc107;
        }

        /* Sobreescribe las variables solo si el body tiene la clase 'theme-dark' */
        body.theme-dark {
            --body-bg: #20202d;
            --panel-bg: #2c2c3e;
            --sidebar-bg: #2c2c3e;
            --sidebar-header-text: #ffffff;
            --sidebar-text: #a0a0b0;
            --sidebar-hover-bg: #20202d;
            --main-text:rgb(255, 255, 255); 
            --secondary-text: #a0a0b0; 
            --border-color: #4a4a6a;
            --form-input-bg: #4a4a6a;
            --form-input-text: #e0e0e0;
        }

        /* --- Estilos Generales que usan las variables --- */
        body { background-color: var(--body-bg); color: var(--main-text); font-family: 'Poppins', sans-serif; font-size: 0.9rem; } 
        .main-container { display: flex; min-height: 100vh; } 
        .content-wrapper { flex-grow: 1; padding: 1rem; }
        
        /* Sidebar */
        .sidebar { width: 220px; background-color: var(--sidebar-bg); padding: 20px 0; flex-shrink: 0; border-right: 1px solid var(--border-color); }
        .sidebar-header { padding: 0 20px 20px 20px; font-weight: 600; font-size: 1.2rem; color: var(--sidebar-header-text); text-align: center; }
        .sidebar-nav a { display: flex; align-items: center; padding: 12px 20px; color: var(--sidebar-text); text-decoration: none; font-weight: 500; } 
        .sidebar-nav a:hover { background-color: var(--sidebar-hover-bg); color: var(--brand-purple); }
        .sidebar-nav a.active { background-color: var(--brand-purple); color: #fff !important; border-radius: 0 30px 30px 0; margin-left: -1px; }
        .sidebar-nav a.active i, .sidebar-nav a.active:hover { color: #fff; }
        .sidebar-nav a i { margin-right: 15px; width: 20px; text-align: center; }
        
        /* Contenido y Formularios */
        .offcanvas { background-color: var(--sidebar-bg); }
        .main-panel, .data-panel { background-color: var(--panel-bg); color: var(--main-text); border-radius: 20px; padding: 1.5rem; box-shadow: 0 5px 15px rgba(0,0,0,0.05); } 
        .panel-title, .form-legend { color: var(--main-text); font-weight: 600; }

        /* Reemplaza la regla anterior por estas dos */

        /* Las etiquetas principales ahora usan el color de texto principal del tema */
        .form-label {
            color: var(--main-text) !important; 
        }

        /* El texto pequeño y secundario mantiene el color de texto secundario */
        small.text-muted {
            color: var(--secondary-text) !important;
        }

        .form-control, .form-select { background-color: var(--form-input-bg); border: 1px solid var(--border-color); color: var(--form-input-text); border-radius: 8px; }
        .form-control:focus, .form-select:focus { background-color: var(--form-input-bg); color: var(--form-input-text); border-color: var(--brand-purple); box-shadow: 0 0 0 0.25rem rgba(142, 68, 173, 0.25); }
         .dataTables_wrapper .dataTables_paginate .paginate_button {
      background-color: #f0f0f0;
      border: 1px solid #ccc;
      padding: 5px 10px;
      margin: 0 2px;
      text-decoration: none;
      color: #333;
      border-radius: 4px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
      background-color: #007bff;
      color: white;
      border-color: #007bff;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background-color: #ddd;
    }

     .chrome-tabs {
        border-bottom: 1px solid #dee2e6;
        padding-left: 10px;
    }

    .chrome-tabs .nav-item {
        margin-right: 2px;
    }

    .chrome-tabs .nav-link {
        background-color: #f1f3f4; /* Un gris claro similar al de Chrome */
        border: 1px solid #dee2e6;
        border-bottom: none;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        padding: 0.5rem 1.5rem;
        position: relative;
        top: 1px; /* Para que se "siente" sobre la línea inferior */
        color: #5f6368; /* Color de texto de la pestaña inactiva */
    }

    /* Estilo para la pestaña activa */
    .chrome-tabs .nav-link.active {
        background-color: #ffffff; /* Fondo blanco para que se fusione con el contenido */
        border-color: #dee2e6;
        border-bottom-color: #ffffff; /* Oculta el borde inferior de la pestaña activa */
        color: #0d6efd; /* Color de texto de la pestaña activa */
        font-weight: 500;
    }

    /* Estilo para el hover en pestañas inactivas */
    .chrome-tabs .nav-link:not(.active):hover {
        background-color: #e8eaed;
        border-color: #dee2e6;
    }

    /* Eliminar el borde por defecto de nav-tabs de Bootstrap */
    .nav-tabs {
        border-bottom: none;
    }
    
    /* Ajustes para que DataTables se vea bien */
    .dataTables_wrapper {
        padding-top: 1rem;
    }
    </style>
</head>

<body class="<?= ($settings['default_theme'] ?? 'dark') === 'dark' ? 'theme-dark' : 'theme-light' ?>">


<div class="main-container">
    <aside class="sidebar d-none d-lg-block">
        <div class="sidebar-header">AdminProject</div>
        <nav class="sidebar-nav mt-3">
            <a href="<?= site_url('dashboard') ?>" class="<?= (uri_string() == 'dashboard' || uri_string() == '/') ? 'active' : '' ?>"><i class="fas fa-home"></i> INICIO</a>
            <a href="<?= site_url('ajustes') ?>" class="<?= (strpos(uri_string(), 'ajustes') === 0) ? 'active' : '' ?>"><i class="fas fa-cog"></i> AJUSTES</a>
        </nav>
    </aside>

    <div class="content-wrapper">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <button class="btn btn-secondary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas"><i class="fas fa-bars"></i></button>
            <h4 class="text-center py-3 m-0 flex-grow-1"><?= $this->renderSection('page_title', 'Panel de Administrador') ?></h4>
        </div>
        <?= $this->renderSection('content') ?>
    </div>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel">
    <div class="offcanvas-header"><h5 class="offcanvas-title" id="sidebarOffcanvasLabel">AdminProject</h5><button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button></div>
    <div class="offcanvas-body">
        <nav class="sidebar-nav">
            <a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i> INICIO</a>
            <a href="<?= site_url('ajustes') ?>"><i class="fas fa-cog"></i> AJUSTES</a>
        </nav>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<?= $this->renderSection('scripts') ?>
</body>
</html>