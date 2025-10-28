<?= $this->extend('navbar') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <div class="row ">
        <div class="col-md-6 col-lg-4">

            <div class="card shadow-sm border-0 h-100">
                <img src="https://th.bing.com/th/id/R.92cf2b9f65c9792e860c7a72511d71f1?rik=zl%2bG%2b9MqIFD7qA&pid=ImgRaw&r=0"
                     alt="Imagen ilustrativa del producto o servicio"
                     class="card-img-top rounded-top">

                <div class="card-body text-center">
                    <h5 class="card-title fw-bold mb-2">Título del Card</h5>
                    <p class="card-text text-muted mb-4">
                        Una breve descripción o detalle del contenido que se muestra aquí.
                    </p>
                    <a href="#" class="btn btn-primary px-4">
                        <i class="fa-solid fa-arrow-right me-2"></i> Vamos
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
