<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<h1 class="h3 mb-3"><i class="fas fa-tachometer-alt me-2"></i><strong>Dashboard</strong> Overview</h1>

<div class="row">
    <div class="col-12 col-lg-6 col-xxl-6 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-tree me-2"></i>Statistik Pohon</h5>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h3 class="mb-2"><i class="fas fa-leaf me-2 text-success"></i><?= $totalTree ?></h3>
                        <p class="mb-2">Total Pohon Terdaftar</p>
                        
                        <h4 class="mb-3"><i class="fas fa-seedling me-2 text-primary"></i>Distribusi Jenis Bibit</h4>
                        <?php foreach($treeData as $tree): ?>
                            <div class="mb-1 p-2 bg-light rounded hover-shadow">
                                <i class="fas fa-chevron-right me-2"></i>
                                <span class="text-muted"><?= $tree['jenis_bibit'] ?>:</span>
                                <span class="float-end badge bg-primary"><?= $tree['total'] ?></span>
                            </div>
                        <?php endforeach; ?>

                        <h4 class="mt-3 mb-3"><i class="fas fa-calendar-alt me-2 text-info"></i>Distribusi per Tahun Tanam</h4>
                        <?php foreach($treesByYear as $tree): ?>
                            <div class="mb-1 p-2 bg-light rounded hover-shadow">
                                <i class="fas fa-calendar me-2"></i>
                                <span class="text-muted"><?= $tree['tahun_tanam'] ?>:</span>
                                <span class="float-end badge bg-info"><?= $tree['total'] ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6 col-xxl-6 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-chart-line me-2"></i>Statistik Produksi</h5>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h3 class="mb-2"><i class="fas fa-database me-2 text-warning"></i><?= $totalProductions ?></h3>
                        <p class="mb-2">Total Data Produksi</p>

                        <h4 class="mb-3"><i class="fas fa-chart-bar me-2 text-success"></i>Rata-rata Produksi</h4>
                        <div class="mb-1 p-2 bg-light rounded hover-shadow">
                            <i class="fas fa-fruit me-2"></i>
                            <span class="text-muted">Rata-rata Jumlah Buah:</span>
                            <span class="float-end badge bg-success"><?= number_format($productionStats['avg_buah'], 1) ?></span>
                        </div>
                        <div class="mb-1 p-2 bg-light rounded hover-shadow">
                            <i class="fas fa-check-circle me-2"></i>
                            <span class="text-muted">Rata-rata Buah Matang:</span>
                            <span class="float-end badge bg-success"><?= number_format($productionStats['avg_matang'], 1) ?></span>
                        </div>
                        <div class="mb-1 p-2 bg-light rounded hover-shadow">
                            <i class="fas fa-weight me-2"></i>
                            <span class="text-muted">Rata-rata Berat Janjang:</span>
                            <span class="float-end badge bg-success"><?= number_format($productionStats['avg_berat'], 1) ?> kg</span>
                        </div>
                        <div class="mb-1 p-2 bg-light rounded hover-shadow">
                            <i class="fas fa-layer-group me-2"></i>
                            <span class="text-muted">Total Janjang Panen:</span>
                            <span class="float-end badge bg-warning"><?= number_format($productionStats['total_janjang']) ?></span>
                        </div>
                        <div class="mb-1 p-2 bg-light rounded hover-shadow">
                            <i class="fas fa-tree me-2"></i>
                            <span class="text-muted">Pohon Produktif:</span>
                            <span class="float-end badge bg-warning"><?= number_format($productionStats['total_pohon_produktif']) ?></span>
                        </div>

                        <h4 class="mt-3 mb-3"><i class="fas fa-chart-area me-2 text-danger"></i>Produksi 12 Bulan Terakhir</h4>
                        <?php foreach($monthlyProduction as $prod): ?>
                            <div class="mb-1 p-2 bg-light rounded hover-shadow">
                                <i class="fas fa-calendar-day me-2"></i>
                                <span class="text-muted"><?= $prod['bulan'] ?>/<?= $prod['tahun'] ?>:</span>
                                <span class="float-end badge bg-danger"><?= number_format($prod['total_berat']) ?> kg</span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>