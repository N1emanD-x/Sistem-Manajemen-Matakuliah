<?= $this->extend('matakuliah/layout') ?>
<?= $this->section('content') ?>

<div class="form-card">
    <div class="form-card-title">Form Edit Mata Kuliah</div>

    <!-- Form POST ke route /matakuliah/update/{id} -->
    <form action="/sistem-matakuliah/public/index.php/matakuliah/update/<?= $mk['id'] ?>" method="POST">
        <?= csrf_field() ?>

        <!-- Input Kode MK (terisi data lama) -->
        <div class="mb-3">
            <label class="form-label">Kode Mata Kuliah</label>
            <input type="text" name="kode_mk" class="form-control"
                   value="<?= esc($mk['kode_mk']) ?>" required>
            <div class="form-hint">Maksimal 10 karakter, harus unik.</div>
            <?php if (isset($validation['kode_mk'])): ?>
                <div class="error-text"><?= $validation['kode_mk'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Input Nama MK (terisi data lama) -->
        <div class="mb-3">
            <label class="form-label">Nama Mata Kuliah</label>
            <input type="text" name="nama_mk" class="form-control"
                   value="<?= esc($mk['nama_mk']) ?>" required>
            <?php if (isset($validation['nama_mk'])): ?>
                <div class="error-text"><?= $validation['nama_mk'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Dropdown SKS (selected sesuai data lama) -->
        <div class="mb-3">
            <label class="form-label">SKS</label>
            <select name="sks" class="form-select" required>
                <option value="">Pilih SKS</option>
                <?php foreach ([1,2,3,4] as $s): ?>
                    <option value="<?= $s ?>"
                        <?= $mk['sks'] == $s ? 'selected' : '' ?>>
                        <?= $s ?> SKS
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($validation['sks'])): ?>
                <div class="error-text"><?= $validation['sks'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Dropdown Semester (selected sesuai data lama) -->
        <div class="mb-4">
            <label class="form-label">Semester</label>
            <select name="semester" class="form-select" required>
                <option value="">Pilih Semester</option>
                <?php foreach (range(1, 8) as $sem): ?>
                    <option value="<?= $sem ?>"
                        <?= $mk['semester'] == $sem ? 'selected' : '' ?>>
                        Semester <?= $sem ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($validation['semester'])): ?>
                <div class="error-text"><?= $validation['semester'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Tombol Update & Batal -->
        <div class="d-flex gap-2">
            <button type="submit" class="btn-simpan">Update</button>
            <a href="/sistem-matakuliah/public/index.php/matakuliah" class="btn-batal">Batal</a>
        </div>

    </form>
</div>

<?= $this->endSection() ?>