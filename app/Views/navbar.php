<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet"
          crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/f2923602be.js" crossorigin="anonymous" defer></script>

    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar-brand {
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* 🔹 Doble navbar solo visible en escritorio */
        @media (min-width: 992px) {
            .navbar-desktop-top,
            .navbar-desktop-bottom {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 0.5rem 1rem;
            }

            .navbar-desktop-top {
                background-color: #ffffff;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }

            .navbar-desktop-bottom {
                background-color: #e9ecef;
                border-top: 1px solid #dee2e6;
                justify-content: space-evenly;
            }

            .navbar-desktop-bottom a {
                color: #212529;
                font-weight: 500;
                text-decoration: none;
                padding: 0.5rem 1rem;
                transition: color 0.3s ease;
            }

            .navbar-desktop-bottom a:hover {
                color: #0d6efd;
            }

            /* Ocultar menú móvil */
            .navbar-mobile {
                display: none !important;
            }

            .navbar-search form {
                width: 50%;
                margin: 0 auto;
            }
        }

        /* 🔹 Diseño móvil (ya lo tenías, se mantiene igual) */
        @media (max-width: 991.98px) {
            .navbar-desktop-top,
            .navbar-desktop-bottom {
                display: none !important;
            }

            .navbar-collapse {
                background-color: #f8f9fa;
                padding: 1rem;
                border-top: 1px solid #ddd;
            }
        }
    </style>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous" defer></script>
</head>

<body class="d-flex flex-column min-vh-100">

<!-- 🔝 NAVBAR MOVIL -->
<nav class="navbar navbar-expand-lg bg-light shadow-sm navbar-mobile" aria-label="Barra móvil">
    <div class="container-fluid navbar-desktop">
        <button class="navbar-toggler menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Alternar menú">
            <i class="fa-solid fa-bars fa-lg"></i>
        </button>

        <a class="navbar-brand text-center mx-lg-auto" href="<?= base_url('/') ?>">Aplicación Ventas</a>
    </div>

    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav me-auto mb-3 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="<?= base_url('/perfil') ?>"><i class="fa-solid fa-user me-2"></i> Perfil</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('/productos') ?>"><i class="fa-solid fa-box me-2"></i> Productos</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="fa-solid fa-chart-line me-2"></i> Ventas</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="fa-solid fa-truck me-2"></i> Envíos</a></li>
        </ul>

        <form class="d-flex mt-2" role="search" method="get" action="#">
            <input type="search" class="form-control me-2" placeholder="Buscar..." aria-label="Buscar">
            <button class="btn btn-outline-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
</nav>

<!-- 🧭 NAVBAR DOBLE PARA ESCRITORIO -->
<header class="d-none d-lg-block">
    <!-- 🔹 Primer navbar -->
    <div class="navbar-desktop-top">
        <!-- Nombre de la aplicación -->
        <a class="navbar-brand text-end" href="<?= base_url('/') ?>">Aplicación Ventas</a>

        <!-- Buscador -->
        <div class="navbar-search flex-grow-1 text-center">
            <form class="d-flex justify-content-center" role="search" method="get" action="#">
                <input type="search" class="form-control w-50 me-2" placeholder="Buscar..." aria-label="Buscar">
                <button class="btn btn-outline-primary" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>

        <!-- Perfil -->
        <a href="<?= base_url('/perfil') ?>" class="btn btn-outline-primary">
            <i class="fa-solid fa-user me-2"></i> Perfil
        </a>


    </div>

    <!-- 🔹 Segundo navbar -->
    <div class="navbar-desktop-bottom">
        <a href="<?= base_url('/productos') ?>"><i class="fa-solid fa-box me-2"></i> Productos</a>
        <a href="#"><i class="fa-solid fa-chart-line me-2"></i> Ventas</a>
        <a href="#"><i class="fa-solid fa-truck me-2"></i> Envíos</a>
    </div>
</header>

<!-- 📦 CONTENIDO -->
<main class="flex-grow-1 py-5 px-4">
    <?= $this->renderSection('content') ?>
</main>

<!-- ⚫ FOOTER -->
<footer class="bg-dark text-light text-center py-3 mt-auto">
    <small>&copy; <?= date('Y') ?> Aplicación Ventas — Todos los derechos reservados.</small>
</footer>

</body>
</html>
