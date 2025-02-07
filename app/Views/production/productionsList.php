<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<h1 class="h3 mb-3"><strong><?= $title; ?></strong> Menu </h1>
<div class="row">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">Production List <button class="btn btn-primary btn-sm float-end btnAdd" data-bs-toggle="modal" data-bs-target="#formProductionModal">Create New Production</button></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>Id Produksi</th>
                                <th>Tanggal Panen</th>
                                <th>Id Pohon</th>
                                <th>Jumlah Buah</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($Production as $production) : ?>
                                <tr>
                                    <td><?= $production['id_produksi']; ?></td>
                                    <td><?= $production['tanggal_panen']; ?></td>
                                    <td><?= $production['id_pohon']; ?></td>
                                    <td><?= $production['jumlah_buah']; ?></td>
                                    <td><?= $production['created_at']; ?></td>
                                    <td>
                                        <button class="btn btn-success btn-sm btnView" data-bs-toggle="modal" data-bs-target="#viewProductionModal"
                                            data-id="<?= $production['id']; ?>"
                                            data-id_produksi="<?= $production['id_produksi']; ?>"
                                            data-tanggal_panen="<?= $production['tanggal_panen']; ?>"
                                            data-id_pohon="<?= $production['id_pohon']; ?>"
                                            data-jumlah_buah="<?= $production['jumlah_buah']; ?>"
                                            data-buah_matang="<?= $production['buah_matang']; ?>"
                                            data-jumlah_bunga_dompet="<?= $production['jumlah_bunga_dompet']; ?>"
                                            data-jumlah_bunga_jantan="<?= $production['jumlah_bunga_jantan']; ?>"
                                            data-jumlah_bunga_betina="<?= $production['jumlah_bunga_betina']; ?>"
                                            data-jumlah_janjang_panen="<?= $production['jumlah_janjang_panen']; ?>"
                                            data-berat_janjang_panen="<?= $production['berat_janjang_panen']; ?>"
                                            data-created_at="<?= $production['created_at']; ?>">View</button>

                                        <button class="btn btn-info btn-sm btnEdit" data-bs-toggle="modal" data-bs-target="#formProductionModal" 
                                            data-id="<?= $production['id']; ?>"
                                            data-id_produksi="<?= $production['id_produksi']; ?>"
                                            data-tanggal_panen="<?= $production['tanggal_panen']; ?>"
                                            data-id_pohon="<?= $production['id_pohon']; ?>"
                                            data-jumlah_buah="<?= $production['jumlah_buah']; ?>"
                                            data-buah_matang="<?= $production['buah_matang']; ?>"
                                            data-jumlah_bunga_dompet="<?= $production['jumlah_bunga_dompet']; ?>"
                                            data-jumlah_bunga_jantan="<?= $production['jumlah_bunga_jantan']; ?>"
                                            data-jumlah_bunga_betina="<?= $production['jumlah_bunga_betina']; ?>"
                                            data-jumlah_janjang_panen="<?= $production['jumlah_janjang_panen']; ?>"
                                            data-berat_janjang_panen="<?= $production['berat_janjang_panen']; ?>">Update</button>

                                        <button class="btn btn-danger btn-sm btnDelete" 
                                            data-id="<?= $production['id']; ?>"
                                            onclick="return confirm('Are you sure delete this production data?')">Delete</button>
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

<div class="modal fade" id="formProductionModal" tabindex="-1" aria-labelledby="formProductionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formProductionModalLabel">Create New Production</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="productionForm">
                <div class="modal-body">
                    <input type="hidden" name="inputProductionID" id="inputProductionID">
                    <div class="mb-3">
                        <label for="inputIdProduksi" class="col-form-label">Id Produksi:</label>
                        <input type="text" class="form-control" name="inputIdProduksi" id="inputIdProduksi" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputTanggalPanen" class="col-form-label">Tanggal Panen:</label>
                        <input type="date" class="form-control" name="inputTanggalPanen" id="inputTanggalPanen" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputIdPohon" class="col-form-label">Id Pohon:</label>
                        <select class="form-select" name="inputIdPohon" id="inputIdPohon" required>
                            <option value="">Pilih Pohon</option>
                            <?php foreach ($treeList as $tree): ?>
                                <option value="<?= $tree['id_pohon'] ?>"><?= $tree['id_pohon'] ?> - <?= $tree['jenis_bibit'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputJumlahBuah" class="col-form-label">Jumlah Buah:</label>
                        <input type="number" class="form-control" name="inputJumlahBuah" id="inputJumlahBuah" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputBuahMatang" class="col-form-label">Buah Matang:</label>
                        <input type="number" class="form-control" name="inputBuahMatang" id="inputBuahMatang" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputJumlahBungaDompet" class="col-form-label">Jumlah Bunga Dompet:</label>
                        <input type="number" class="form-control" name="inputJumlahBungaDompet" id="inputJumlahBungaDompet" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputJumlahBungaJantan" class="col-form-label">Jumlah Bunga Jantan:</label>
                        <input type="number" class="form-control" name="inputJumlahBungaJantan" id="inputJumlahBungaJantan" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputJumlahBungaBetina" class="col-form-label">Jumlah Bunga Betina:</label>
                        <input type="number" class="form-control" name="inputJumlahBungaBetina" id="inputJumlahBungaBetina" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputJumlahJanjangPanen" class="col-form-label">Jumlah Janjang Panen:</label>
                        <input type="number" class="form-control" name="inputJumlahJanjangPanen" id="inputJumlahJanjangPanen" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputBeratJanjangPanen" class="col-form-label">Berat Janjang Panen:</label>
                        <input type="number" step="0.01" class="form-control" name="inputBeratJanjangPanen" id="inputBeratJanjangPanen" required>
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

<div class="modal fade" id="viewProductionModal" tabindex="-1" aria-labelledby="viewProductionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewProductionModalLabel">View Production Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="fw-bold">Id Produksi:</label>
                    <p id="viewIdProduksi"></p>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Tanggal Panen:</label>
                    <p id="viewTanggalPanen"></p>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Id Pohon:</label>
                    <p id="viewIdPohon"></p>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Jumlah Buah:</label>
                    <p id="viewJumlahBuah"></p>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Buah Matang:</label>
                    <p id="viewBuahMatang"></p>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Jumlah Bunga Dompet:</label>
                    <p id="viewJumlahBungaDompet"></p>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Jumlah Bunga Jantan:</label>
                    <p id="viewJumlahBungaJantan"></p>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Jumlah Bunga Betina:</label>
                    <p id="viewJumlahBungaBetina"></p>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Jumlah Janjang Panen:</label>
                    <p id="viewJumlahJanjangPanen"></p>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Berat Janjang Panen:</label>
                    <p id="viewBeratJanjangPanen"></p>
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
            $('#formProductionModalLabel').html('Create New Production');
            $('.modal-footer button[type=submit]').html('Save Data');
            $('#productionForm').attr('data-action', 'create');
            $('#inputProductionID').val('');
            $('#inputIdProduksi').val('');
            $('#inputTanggalPanen').val('');
            $('#inputIdPohon').val('');
            $('#inputJumlahBuah').val('');
            $('#inputBuahMatang').val('');
            $('#inputJumlahBungaDompet').val('');
            $('#inputJumlahBungaJantan').val('');
            $('#inputJumlahBungaBetina').val('');
            $('#inputJumlahJanjangPanen').val('');
            $('#inputBeratJanjangPanen').val('');
        });

        $(".btnView").click(function() {
            const id_produksi = $(this).data('id_produksi');
            const tanggal_panen = $(this).data('tanggal_panen');
            const id_pohon = $(this).data('id_pohon');
            const jumlah_buah = $(this).data('jumlah_buah');
            const buah_matang = $(this).data('buah_matang');
            const jumlah_bunga_dompet = $(this).data('jumlah_bunga_dompet');
            const jumlah_bunga_jantan = $(this).data('jumlah_bunga_jantan');
            const jumlah_bunga_betina = $(this).data('jumlah_bunga_betina');
            const jumlah_janjang_panen = $(this).data('jumlah_janjang_panen');
            const berat_janjang_panen = $(this).data('berat_janjang_panen');
            const created_at = $(this).data('created_at');

            $('#viewIdProduksi').text(id_produksi);
            $('#viewTanggalPanen').text(tanggal_panen);
            $('#viewIdPohon').text(id_pohon);
            $('#viewJumlahBuah').text(jumlah_buah);
            $('#viewBuahMatang').text(buah_matang);
            $('#viewJumlahBungaDompet').text(jumlah_bunga_dompet);
            $('#viewJumlahBungaJantan').text(jumlah_bunga_jantan);
            $('#viewJumlahBungaBetina').text(jumlah_bunga_betina);
            $('#viewJumlahJanjangPanen').text(jumlah_janjang_panen);
            $('#viewBeratJanjangPanen').text(berat_janjang_panen);
            $('#viewCreatedAt').text(created_at);
        });

        $(".btnEdit").click(function() {
            const id = $(this).data('id');
            const id_produksi = $(this).data('id_produksi');
            const tanggal_panen = $(this).data('tanggal_panen');
            const id_pohon = $(this).data('id_pohon');
            const jumlah_buah = $(this).data('jumlah_buah');
            const buah_matang = $(this).data('buah_matang');
            const jumlah_bunga_dompet = $(this).data('jumlah_bunga_dompet');
            const jumlah_bunga_jantan = $(this).data('jumlah_bunga_jantan');
            const jumlah_bunga_betina = $(this).data('jumlah_bunga_betina');
            const jumlah_janjang_panen = $(this).data('jumlah_janjang_panen');
            const berat_janjang_panen = $(this).data('berat_janjang_panen');

            $('#formProductionModalLabel').html('Update Production');
            $('.modal-footer button[type=submit]').html('Update Data');
            $('#productionForm').attr('data-action', 'update');
            
            $('#inputProductionID').val(id);
            $('#inputIdProduksi').val(id_produksi);
            $('#inputTanggalPanen').val(tanggal_panen);
            $('#inputIdPohon').val(id_pohon);
            $('#inputJumlahBuah').val(jumlah_buah);
            $('#inputBuahMatang').val(buah_matang);
            $('#inputJumlahBungaDompet').val(jumlah_bunga_dompet);
            $('#inputJumlahBungaJantan').val(jumlah_bunga_jantan);
            $('#inputJumlahBungaBetina').val(jumlah_bunga_betina);
            $('#inputJumlahJanjangPanen').val(jumlah_janjang_panen);
            $('#inputBeratJanjangPanen').val(berat_janjang_panen);
        });

        $('#productionForm').submit(function(e) {
            e.preventDefault();
            const action = $(this).attr('data-action');
            const url = action === 'create' ? 
                '<?= base_url('productions/createProduction') ?>' : 
                '<?= base_url('productions/updateProduction') ?>';

            $.ajax({
                url: url,
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#formProductionModal').modal('hide');
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
                url: '<?= base_url('productions/deleteProduction/') ?>' + id,
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