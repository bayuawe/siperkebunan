<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<h1 class="h3 mb-3"><strong><?= $title; ?></strong></h1>
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Formulir Pohon</h5>
    </div>
    <div class="card-body">
        <form action="/trees/saveTree" method="post">
            <div class="mb-3">
                <label for="id_pohon" class="form-label">ID Pohon</label>
                <input type="text" class="form-control <?= isset($errors['id_pohon']) ? 'is-invalid' : '' ?>" id="id_pohon" name="id_pohon" value="<?= isset($tree) ? $tree['id_pohon'] : '' ?>" required>
                <div class="alert alert-danger" role="alert" <?= isset($errors['id_pohon']) ? 'style="display:block;"' : 'style="display:none;"' ?>>
                    <?= $errors['id_pohon'] ?? '' ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="tahun_tanam" class="form-label">Tahun Tanam</label>
                <input type="date" class="form-control <?= isset($errors['tahun_tanam']) ? 'is-invalid' : '' ?>" id="tahun_tanam" name="tahun_tanam" value="<?= isset($tree) ? $tree['tahun_tanam'] : '' ?>" required>
                <div class="alert alert-danger" role="alert" <?= isset($errors['tahun_tanam']) ? 'style="display:block;"' : 'style="display:none;"' ?>>
                    <?= $errors['tahun_tanam'] ?? '' ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="jenis_bibit" class="form-label">Jenis Bibit</label>
                <input type="text" class="form-control <?= isset($errors['jenis_bibit']) ? 'is-invalid' : '' ?>" id="jenis_bibit" name="jenis_bibit" value="<?= isset($tree) ? $tree['jenis_bibit'] : '' ?>" required>
                <div class="alert alert-danger" role="alert" <?= isset($errors['jenis_bibit']) ? 'style="display:block;"' : 'style="display:none;"' ?>>
                    <?= $errors['jenis_bibit'] ?? '' ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>