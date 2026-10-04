<?php
echo ($this->extend('Layout/template'));
echo ($this->section('content'));
?>
<div class="row">
<div class="col-12 col-sm-9 col-md-7 col-lg-5 mx-auto mt-5">
    <div class="card shadow-sm">
        <div class="card-header text-center">
            <h2 class="h5 mb-0">Přidat nový ročník závodu</h2>
        </div>
        <div class="card-body">

            <form action="<?= base_url('Pridat/Add'); ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="real_name" class="form-label font-weight-bold">Z kama kam:</label>
                     <p>Pro uložení musí název obsahovat Paris - Nice</p>
                    <input type="text" class="form-control" id="real_name" name="real_name" 
                           value="<?= old('real_name', 'Paris - Nice') ?>" placeholder="" required>
                </div>

                <div class="mb-3">
                    <label for="id_race" class="form-label font-weight-bold">Závod:</label>
                    <select class="form-select" id="id_race" name="id_race" required>
                        <option value="" disabled selected>Vyberte závod</option>
                        <?php foreach ($races as $race): ?>
                            <option value="<?= $race->id ?>" <?= old('id_race') == $race->id ? 'selected' : '' ?>>
                                <?= $race->real_name . ' (' . $race->id . ')'?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="form-text">Pouze mužská kategorie <strong>E</strong>!!!</div>
                </div>

                <div class="mb-3">
                    <label for="year" class="form-label font-weight-bold">Rok:</label>
                    <input type="number" class="form-control" id="year" name="year" 
                           value="<?= old('year', date('Y')) ?>" min="1900" max="2099" required>
                </div>

                <div class="mb-4">
                    <label for="logo" class="form-label font-weight-bold">Logo závodu:</label>
                    <input class="form-control" type="file" id="logo" name="logo" accept="image/*" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-outline-success">
                        <i class="fa-solid fa-plus me-1"></i> Uložit ročník
                    </button>
                </div>
            </form>

        </div>
    </div>
    <div class="my-3 justify-content-center text-center">
        <a href="<?= base_url(); ?>" class="btn btn-outline-primary">
            <i class="fa-solid fa-arrow-left me-1"></i> Zpět na přehled
        </a>
    </div>
</div>
</div>

<?= $this->endSection(); ?>