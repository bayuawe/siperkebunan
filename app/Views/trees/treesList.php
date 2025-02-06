<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<h1 class="h3 mb-3"><strong>Pohon</strong> Menu </h1>
<div class="row">
    <div class="col-12 col-lg-8 col-xxl-8 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar Pohon <button class="btn btn-primary btn-sm float-end btnAdd" data-bs-toggle="modal" data-bs-target="#formTreeModal">Tambah Pohon Baru</button></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>Id Pohon</th>
                                <th>Tahun Tanam</th>
                                <th>Jenis Bibit</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($Tree as $tree) : ?>
                                <tr>
                                    <td><?= $tree['id_pohon']; ?></td>
                                    <td><?= $tree['tahun_tanam']; ?></td>
                                    <td><?= $tree['jenis_bibit']; ?></td>
                                    <td><?= $tree['created_at']; ?></td>
                                    <td><?= $tree['updated_at']; ?></td>
                                    <td>
                                        <button class="btn btn-info btn-sm btnEdit" data-bs-toggle="modal" data-bs-target="#formTreeModal" data-id="<?= $tree['id_pohon']; ?>" data-tahuntanam="<?= $tree['tahun_tanam']; ?>" data-jenisbibit="<?= $tree['jenis_bibit']; ?>" data-createdat="<?= $tree['created_at']; ?>" data-updatedat="<?= $tree['updated_at']; ?>">Update</button>

                                        <?php if ($tree['id_pohon'] != session()->get('id_pohon')) : ?>
                                            <form action="<?= base_url('trees/deleteTree/' . $tree['id_pohon']); ?>" method="post" class="d-inline">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin menghapus <?= $tree['id_pohon']; ?> ?')">Delete</button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="formTreeModal" tabindex="-1" aria-labelledby="formTreeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formTreeModalLabel">Tambah Pohon Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('trees/createTree'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id_pohon" id="id_pohon">
                    <div class="mb-3">
                        <label for="inputIdPohon" class="col-form-label">Id Pohon:</label>
                        <input type="text" class="form-control" name="inputIdPohon" id="inputIdPohon" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputTahunTanam" class="col-form-label">Tahun Tanam:</label>
                        <input type="date" class="form-control" name="inputTahunTanam" id="inputTahunTanam" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputJenisBibit" class="col-form-label">Jenis Bibit:</label>
                        <input type="text" class="form-control" name="inputJenisBibit" id="inputJenisBibit" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".btnAdd").click(function() {
            $('#formTreeModalLabel').html('Tambah Pohon Baru');
            $('.modal-footer button[type=submit]').html('Simpan Data');
            $('#id_pohon').val('');
            $('#inputIdPohon').val('');
            $('#inputTahunTanam').val('');
            $('#inputJenisBibit').val('');
        });
        $(".btnEdit").click(function() {
            const id_pohon = $(this).data('id');
            const tahun_tanam = $(this).data('tahuntanam');
            const jenis_bibit = $(this).data('jenisbibit');
            $('#formTreeModalLabel').html('Form Data Pohon');
            $('.modal-footer button[type=submit]').html('Update Pohon');
            $('.modal-content form').attr('action', '<?= base_url('trees/updateTree') ?>');
            $('#id_pohon').val(id_pohon);
            $('#inputIdPohon').val(id_pohon);
            $('#inputTahunTanam').val(tahun_tanam);
            $('#inputJenisBibit').val(jenis_bibit);
        });
    });
</script>
<?= $this->endSection(); ?>