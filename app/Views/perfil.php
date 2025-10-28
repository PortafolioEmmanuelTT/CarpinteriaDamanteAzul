<?= $this->extend('navbar') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="main-body">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
                <li class="breadcrumb-item">
                    <a href="<?= base_url('/') ?>" class="text-decoration-none">
                        <i class="fa-solid fa-house me-1"></i> Inicio
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-user me-1"></i> Perfil de Usuario
                </li>
            </ol>
        </nav>

        <div class="row g-4">
            <!-- Columna lateral -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <img src="https://as1.ftcdn.net/v2/jpg/04/37/05/38/1000_F_437053890_9xpEWlLkRu2E5HTdk1KCGYr8uOMtyeYy.jpg"
                             alt="Foto de perfil del usuario"
                             class="rounded-circle img-fluid" width="150">
                        <div class="mt-3">
                            <h4 class="fw-bold mb-1">Nombre del Perfil</h4>
                            <p class="text-secondary mb-1">Ocupación</p>
                            <p class="text-muted mb-3"><i class="fa-solid fa-location-dot me-1"></i> Ubicación</p>
                            <button class="btn btn-primary btn-sm me-2">
                                <i class="fa-solid fa-pen-to-square me-1"></i> Editar
                            </button>
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="fa-solid fa-gear me-1"></i> Opciones
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Extra info -->
                <div class="card mt-3 shadow-sm border-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fa-solid fa-user-check text-primary me-2"></i> Estado</span>
                            <span class="text-success fw-semibold">Activo</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fa-solid fa-calendar-days text-primary me-2"></i> Miembro desde</span>
                            <span class="text-secondary">Oct 2023</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Columna principal -->
            <div class="col-md-8">
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3 text-primary">
                            <i class="fa-solid fa-id-card me-2"></i> Información del Usuario
                        </h5>
                        <hr>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-semibold text-secondary">Nombre completo</div>
                            <div class="col-sm-8">Nombre del cliente</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-semibold text-secondary">Correo</div>
                            <div class="col-sm-8">correo@ejemplo.com</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-semibold text-secondary">Teléfono</div>
                            <div class="col-sm-8">+52 555 123 4567</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-semibold text-secondary">Dirección</div>
                            <div class="col-sm-8">Ciudad, Estado, País</div>
                        </div>
                    </div>
                </div>

                <!-- Card adicional (opcional) -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="fw-bold text-primary mb-3">
                            <i class="fa-solid fa-chart-line me-2"></i> Actividad reciente
                        </h5>
                        <p class="text-muted mb-0">Sin actividad reciente registrada.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
