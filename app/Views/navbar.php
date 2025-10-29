<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Dashboard - Carpintería Diamante Azul</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Font Awesome (kit) -->
    <script src="https://kit.fontawesome.com/f2923602be.js" crossorigin="anonymous" defer></script>

    <!-- SweetAlert2 (no defer porque lo usamos luego, pero se carga antes del script principal) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root{
            --brand-bg: #ffffff;
            --brand-accent: #0d6efd;
            --secondary-bg: #e9ecef;
        }

        body {
            background-color: #f8f9fa;
        }

        .navbar-brand {
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Doble navbar solo visible en escritorio */
        @media (min-width: 992px) {
            .navbar-desktop-top,
            .navbar-desktop-bottom {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 0.5rem 1rem;
            }

            .navbar-desktop-top {
                background-color: var(--brand-bg);
                box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            }

            .navbar-desktop-bottom {
                background-color: var(--secondary-bg);
                border-top: 1px solid #dee2e6;
                justify-content: flex-start;
                gap: 1rem;
                padding: 0.4rem 1rem;
            }

            .navbar-desktop-bottom a {
                color: #212529;
                font-weight: 500;
                text-decoration: none;
                padding: 0.35rem 0.6rem;
                transition: color 0.15s ease, background 0.15s ease;
                border-radius: 6px;
            }

            .navbar-desktop-bottom a:hover,
            .navbar-desktop-bottom a.active {
                color: #fff;
                background: var(--brand-accent);
                text-decoration: none;
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

        /* Diseño móvil */
        @media (max-width: 991.98px) {
            .navbar-desktop-top,
            .navbar-desktop-bottom {
                display: none !important;
            }

            .navbar-collapse {
                background-color: #f8f9fa;
            }
        }

        /* Pequeños estilos para accesibilidad visual */
        .dropdown .btn[aria-expanded="true"] {
            box-shadow: 0 0 0 0.15rem rgba(13,110,253,0.15);
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

<!-- NAVBAR MÓVIL -->
<nav class="navbar navbar-expand-lg bg-light shadow-sm navbar-mobile" aria-label="Barra móvil">
    <div class="container-fluid">
        <a class="navbar-brand d-lg-none" href="<?= base_url('/') ?>">Carpintería Diamante Azul</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContentMobile"
                aria-controls="navbarContentMobile" aria-expanded="false" aria-label="Alternar menú">
            <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContentMobile">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/perfil') ?>"><i class="fa-solid fa-user me-2"></i> Perfil</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/clientes') ?>"><i class="fa-solid fa-users me-2"></i> Clientes</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/productos') ?>"><i class="fa-solid fa-box me-2"></i> Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/pedidos') ?>"><i class="fa-solid fa-truck me-2"></i> Pedidos</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/finanzas') ?>"><i class="fa-solid fa-coins me-2"></i> Finanzas</a></li>
            </ul>


        </div>
    </div>
</nav>

<!-- NAVBAR DOBLE PARA ESCRITORIO -->
<header class="d-none d-lg-block" role="banner" aria-label="Navegación principal">
    <!-- Primer navbar (superior) -->
    <div class="navbar-desktop-top container-fluid">
        <div class="d-flex align-items-center gap-3">
            <a class="navbar-brand" href="<?= base_url('/') ?>">Carpintería Diamante Azul</a>
        </div>

        <div class="d-flex align-items-center gap-2">

            <div class="dropdown">
                <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="userMenuBtn" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user me-2"></i>
                    Usuario Carpintería
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenuBtn">
                    <li><a class="dropdown-item" href="<?= base_url('/perfil') ?>">Mi perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="<?= base_url('/logout') ?>" method="post" class="m-0">
                            <?= csrf_field() ?>
                            <button type="submit" class="dropdown-item">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Segundo navbar (inferior) con enlaces principales -->
    <nav class="navbar-desktop-bottom container-fluid" role="navigation" aria-label="Menú principal">
        <div class="container d-flex align-items-center justify-content-between">
            <a class="<?= (uri_string() === 'clientes') ? 'active' : '' ?>" href="<?= base_url('/clientes') ?>"><i class="fa-solid fa-users me-2"></i> Clientes</a>
            <a class="<?= (uri_string() === 'materiales') ? 'active' : '' ?>" href="<?= base_url('/materiales') ?>"><i class="fa-solid fa-boxes-stacked me-2"></i> Materiales</a>
            <a class="<?= (uri_string() === 'pedidos') ? 'active' : '' ?>" href="<?= base_url('/pedidos') ?>"><i class="fa-solid fa-truck me-2"></i> Pedidos</a>
            <a class="<?= (uri_string() === 'finanzas') ? 'active' : '' ?>" href="<?= base_url('/finanzas') ?>"><i class="fa-solid fa-coins me-2"></i> Finanzas</a>
            <!-- puedes agregar más enlaces aquí -->
        </div>
    </nav>
</header>

<!-- CONTENIDO PRINCIPAL -->
<main class="flex-grow-1 py-5 px-4">
    <?= $this->renderSection('content') ?>
</main>

<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous" defer></script>

<script>
    (function () {
        document.addEventListener('DOMContentLoaded', function () {
            const root = document;

            // ========== Ver cliente ==========
            root.addEventListener('click', function (e) {
                const viewBtn = e.target.closest('.btn-view');
                if (!viewBtn) return;

                const nombre = viewBtn.dataset.nombre || '';
                const telefono = viewBtn.dataset.telefono || '';
                const direccion = viewBtn.dataset.direccion || '';

                Swal.fire({
                    title: nombre || 'Cliente',
                    html: `<p><strong>Teléfono:</strong> ${telefono || '—'}</p>
                       <p><strong>Dirección:</strong> ${direccion || '—'}</p>`,
                    icon: 'info',
                    confirmButtonText: 'Cerrar'
                });
            });

            // ========== Editar cliente ==========
            root.addEventListener('click', function (e) {
                const editBtn = e.target.closest('.btn-edit');
                if (!editBtn) return;

                const id = editBtn.dataset.id;
                const nombre = editBtn.dataset.nombre || '';
                const telefono = editBtn.dataset.telefono || '';
                const direccion = editBtn.dataset.direccion || '';

                Swal.fire({
                    title: 'Editar Cliente',
                    html: `
                    <input id="swal-nombre" class="swal2-input" placeholder="Nombre" value="${nombre}">
                    <input id="swal-telefono" class="swal2-input" placeholder="Teléfono" value="${telefono}">
                    <input id="swal-direccion" class="swal2-input" placeholder="Dirección" value="${direccion}">
                `,
                    showCancelButton: true,
                    confirmButtonText: 'Guardar',
                    preConfirm: () => {
                        return {
                            nombre: document.getElementById('swal-nombre').value.trim(),
                            telefono: document.getElementById('swal-telefono').value.trim(),
                            direccion: document.getElementById('swal-direccion').value.trim()
                        }
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Llamada POST a /update
                        fetch(`/clientes/${id}/update`, {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify(result.value)
                        }).then(res => {
                            if (!res.ok) throw new Error('Error en el servidor');
                            return res.json();
                        }).then(() => {
                            Swal.fire('¡Actualizado!', 'El cliente ha sido actualizado.', 'success')
                                .then(() => location.reload());
                        }).catch(() => {
                            Swal.fire('Error', 'No se pudo actualizar el cliente.', 'error');
                        });
                    }
                });
            });

            // ========== Eliminar cliente ==========
// ========== Eliminar cliente ==========
            root.addEventListener('click', function (e) {
                const delBtn = e.target.closest('.btn-delete');
                if (!delBtn) return;

                const id = delBtn.dataset.id;

                Swal.fire({
                    title: '¿Está seguro?',
                    text: "¡Esta acción es irreversible!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/clientes/${id}/delete`, {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' }
                        })
                            .then(res => {
                                if (!res.ok) throw new Error(); // solo lanzamos error sin detalles
                                return res.json();
                            })
                            .then(() => {
                                Swal.fire('Eliminado!', 'El cliente ha sido eliminado.', 'success')
                                    .then(() => location.reload());
                            })
                            .catch(() => {
                                Swal.fire('Error', 'No se pudo eliminar el cliente.', 'error');
                            });
                    }
                });
            });
        });
    })();
</script>

<!-- FOOTER -->
<footer class="bg-dark text-light text-center py-3 mt-auto">
    <small>&copy; <?= date('Y') ?> Carpintería Diamante Azul — Todos los derechos reservados.</small>
</footer>

</body>
</html>
