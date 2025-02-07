<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<h1 class="h3 mb-3"><strong><?= $title; ?></strong> Menu </h1>
<div class="row">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">Tree List <button class="btn btn-primary btn-sm float-end btnAdd" data-bs-toggle="modal" data-bs-target="#formTreeModal">Create New Tree</button></h5>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($Tree as $tree) : ?>
                                <tr>
                                    <td><?= $tree['id_pohon']; ?></td>
                                    <td><?= $tree['tahun_tanam']; ?></td>
                                    <td><?= $tree['jenis_bibit']; ?></td>
                                    <td><?= $tree['created_at']; ?></td>
                                    <td>
                                        <button class="btn btn-success btn-sm btnView" data-bs-toggle="modal" data-bs-target="#viewTreeModal"
                                            data-id="<?= $tree['id']; ?>"
                                            data-id_pohon="<?= $tree['id_pohon']; ?>"
                                            data-tahun_tanam="<?= $tree['tahun_tanam']; ?>"
                                            data-jenis_bibit="<?= $tree['jenis_bibit']; ?>"
                                            data-created_at="<?= $tree['created_at']; ?>">View</button>

                                        <button class="btn btn-info btn-sm btnEdit" data-bs-toggle="modal" data-bs-target="#formTreeModal" 
                                            data-id="<?= $tree['id']; ?>"
                                            data-id_pohon="<?= $tree['id_pohon']; ?>"
                                            data-tahun_tanam="<?= $tree['tahun_tanam']; ?>"
                                            data-jenis_bibit="<?= $tree['jenis_bibit']; ?>">Update</button>

                                        <button class="btn btn-danger btn-sm btnDelete" 
                                            data-id="<?= $tree['id']; ?>"
                                            onclick="return confirm('Are you sure delete this tree data?')">Delete</button>
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
                <h5 class="modal-title" id="formTreeModalLabel">Create New Tree</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="treeForm">
                <div class="modal-body">
                    <input type="hidden" name="inputTreeID" id="inputTreeID">
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
                    <input type="hidden" name="inputCreatedAt" value="<?= date('Y-m-d H:i:s') ?>">
                    <input type="hidden" name="inputUpdatedAt" value="<?= date('Y-m-d H:i:s') ?>">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Data</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="viewTreeModal" tabindex="-1" aria-labelledby="viewTreeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewTreeModalLabel">View Tree Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="fw-bold">Id Pohon:</label>
                    <p id="viewIdPohon"></p>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Tahun Tanam:</label>
                    <p id="viewTahunTanam"></p>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Jenis Bibit:</label>
                    <p id="viewJenisBibit"></p>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Created At:</label>
                    <p id="viewCreatedAt"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".btnAdd").click(function() {
            $('#formTreeModalLabel').html('Create New Tree');
            $('.modal-footer button[type=submit]').html('Save Data');
            $('#treeForm').attr('data-action', 'create');
            $('#inputTreeID').val('');
            $('#inputIdPohon').val('');
            $('#inputTahunTanam').val('');
            $('#inputJenisBibit').val('');
        });

        $(".btnView").click(function() {
            const id_pohon = $(this).data('id_pohon');
            const tahun_tanam = $(this).data('tahun_tanam');
            const jenis_bibit = $(this).data('jenis_bibit');
            const created_at = $(this).data('created_at');

            $('#viewIdPohon').text(id_pohon);
            $('#viewTahunTanam').text(tahun_tanam);
            $('#viewJenisBibit').text(jenis_bibit);
            $('#viewCreatedAt').text(created_at);
        });

        $(".btnEdit").click(function() {
            const id = $(this).data('id');
            const id_pohon = $(this).data('id_pohon');
            const tahun_tanam = $(this).data('tahun_tanam');
            const jenis_bibit = $(this).data('jenis_bibit');

            $('#formTreeModalLabel').html('Update Tree');
            $('.modal-footer button[type=submit]').html('Update Data');
            $('#treeForm').attr('data-action', 'update');
            
            $('#inputTreeID').val(id);
            $('#inputIdPohon').val(id_pohon);
            $('#inputTahunTanam').val(tahun_tanam);
            $('#inputJenisBibit').val(jenis_bibit);
        });

        $('#treeForm').submit(function(e) {
            e.preventDefault();
            const action = $(this).attr('data-action');
            const url = action === 'create' ? 
                '<?= base_url('trees/createTree') ?>' : 
                '<?= base_url('trees/updateTree') ?>';

            $.ajax({
                url: url,
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#formTreeModal').modal('hide');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + error);
                }
            });
        });

        $(".btnDelete").click(function() {
            const id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('trees/deleteTree/') ?>' + id,
                type: 'POST',
                data: {
                    _method: 'DELETE'
                },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + error);
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>