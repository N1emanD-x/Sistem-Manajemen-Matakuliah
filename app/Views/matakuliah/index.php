<?= $this->extend('matakuliah/layout') ?>
<?= $this->section('content') ?>

<!-- ==========================================
     NOTIFIKASI sukses/gagal dari session
========================================== -->
<?php if ($notif): ?>
    <div class="notif-<?= $notif_type ?>">
        <?= $notif ?>
    </div>
<?php endif; ?>

<div class="section-title">Data Mata Kuliah</div>

<!-- ==========================================
     TABEL: Daftar semua mata kuliah
========================================== -->
<div class="main-card">
    <div class="main-card-header">
        <span>Daftar Mata Kuliah</span>
        <a href="/sistem-matakuliah/public/index.php/matakuliah/tambah" class="btn-tambah">+ Tambah</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($matakuliah)): ?>
                <?php $no = 1; foreach ($matakuliah as $mk): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td style="color:#f0f0f0; font-family: monospace;">
                        <?= esc($mk['kode_mk']) ?>
                    </td>
                    <td style="color:#f0f0f0;"><?= esc($mk['nama_mk']) ?></td>
                    <td>
                        <span class="badge-sks"><?= $mk['sks'] ?> SKS</span>
                    </td>
                    <td>
                        <span class="badge-semester">Sem <?= $mk['semester'] ?></span>
                    </td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="/sistem-matakuliah/public/index.php/matakuliah/edit/<?= $mk['id'] ?>" class="btn-edit">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <!-- Tombol Hapus dengan konfirmasi -->
                        <a href="/sistem-matakuliah/public/index.php/matakuliah/delete/<?= $mk['id'] ?>" class="btn-hapus"
                            onclick="return confirm('Hapus mata kuliah ini?')">
                            <i class="bi bi-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align:center; color:#6c757d; padding:32px;">
                        Belum ada data mata kuliah
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>