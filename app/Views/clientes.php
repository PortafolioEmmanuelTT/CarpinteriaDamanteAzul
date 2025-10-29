<?= $this->extend('navbar') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <h2 class="mb-4 d-flex justify-content-between align-items-center">
        Clientes Registrados
        <button id="btn-add" class="btn btn-success">
            <i class="fa-solid fa-plus me-1"></i> Agregar Cliente
        </button>
    </h2>

    <?php if (!empty($clientes)): ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= esc($cliente['nombre']) ?></td>
                        <td><?= esc($cliente['telefono']) ?></td>
                        <td><?= esc($cliente['direccion']) ?></td>
                        <td>
                            <button class="btn btn-sm btn-info btn-view"
                                    data-nombre="<?= esc($cliente['nombre']) ?>"
                                    data-telefono="<?= esc($cliente['telefono']) ?>"
                                    data-direccion="<?= esc($cliente['direccion']) ?>">
                                <i class="fa-solid fa-eye me-1"></i> Ver
                            </button>
                            <button class="btn btn-sm btn-warning btn-edit"
                                    data-id="<?= $cliente['id'] ?>"
                                    data-nombre="<?= esc($cliente['nombre']) ?>"
                                    data-telefono="<?= esc($cliente['telefono']) ?>"
                                    data-direccion="<?= esc($cliente['direccion']) ?>">
                                <i class="fa-solid fa-pen me-1"></i> Editar
                            </button>
                            <button class="btn btn-sm btn-danger btn-delete" data-id="<?= $cliente['id'] ?>">
                                <i class="fa-solid fa-trash me-1"></i> Eliminar
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-center text-muted">No hay clientes registrados.</p>
    <?php endif; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const root = document;

        // ======== Botón Agregar Cliente ========
        const btnAdd = document.getElementById('btn-add');
        btnAdd.addEventListener('click', function () {
            Swal.fire({
                title: 'Agregar Cliente',
                html: `
                <input id="swal-nombre" class="swal2-input" placeholder="Nombre">
                <input id="swal-telefono" class="swal2-input" placeholder="Teléfono">
                <input id="swal-direccion" class="swal2-input" placeholder="Dirección">
            `,
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar',
                preConfirm: () => {
                    return {
                        nombre: document.getElementById('swal-nombre').value.trim(),
                        telefono: document.getElementById('swal-telefono').value.trim(),
                        direccion: document.getElementById('swal-direccion').value.trim()
                    };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('/clientes/add', { // Tu ruta para crear cliente
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(result.value)
                    })
                        .then(res => {
                            if (!res.ok) throw new Error();
                            return res.json();
                        })
                        .then(() => {
                            Swal.fire('¡Agregado!', 'El cliente ha sido agregado.', 'success')
                                .then(() => location.reload());
                        })
                        .catch(() => {
                            Swal.fire('Error', 'No se pudo agregar el cliente.', 'error');
                        });
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>
