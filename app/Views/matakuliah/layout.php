<!DOCTYPE html>
<html lang="id">
<head>
    <!-- ==========================================
         HEAD: Meta, Title, Bootstrap CSS
    ========================================== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sistem Matakuliah' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* === DARK MODE BASE === */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            background-color: #111315;
            font-family: 'Segoe UI', sans-serif;
            color: #f0f0f0;
        }

        /* === SIDEBAR === */
        #sidebar {
            width: 220px;
            min-height: 100vh;
            background-color: #1a1d21;
            border-right: 1px solid #2a2d32;
            position: fixed;
            top: 0; left: 0;
            display: flex;
            flex-direction: column;
        }
        .sidebar-brand {
            padding: 24px 20px;
            font-size: 0.95rem;
            font-weight: 600;
            color: #f0f0f0;
            border-bottom: 1px solid #2a2d32;
        }
        .sidebar-brand span {
            color: #6c757d;
            font-weight: 400;
            font-size: 0.75rem;
            display: block;
            margin-top: 2px;
        }
        .sidebar-nav { flex: 1; padding: 12px 0; }
        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 20px;
            color: #6c757d;
            text-decoration: none;
            font-size: 0.88rem;
            transition: all 0.15s;
        }
        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            color: #f0f0f0;
            background-color: #22262b;
        }
        .sidebar-nav a.active {
            border-left: 2px solid #f0f0f0;
        }

        /* === MAIN CONTENT === */
        #main { margin-left: 220px; }

        /* === TOPBAR === */
        #topbar {
            background-color: #1a1d21;
            border-bottom: 1px solid #2a2d32;
            padding: 14px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .page-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #f0f0f0;
        }

        /* === CONTENT === */
        .content { padding: 28px; }
        .section-title {
            font-size: 0.78rem;
            font-weight: 600;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 14px;
        }

        /* === CARD === */
        .main-card {
            background-color: #1a1d21;
            border: 1px solid #2a2d32;
            border-radius: 10px;
            overflow: hidden;
        }
        .main-card-header {
            padding: 16px 20px;
            border-bottom: 1px solid #2a2d32;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .main-card-header span {
            font-size: 0.88rem;
            font-weight: 600;
            color: #f0f0f0;
        }

        /* === TABEL === */
        .table { margin: 0; }
        .table thead th {
            background-color: #1a1d21;
            border-bottom: 1px solid #2a2d32;
            color: #6c757d;
            font-size: 0.78rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 20px;
        }
        .table tbody td {
            background-color: #1a1d21;
            border-bottom: 1px solid #22262b;
            color: #adb5bd;
            font-size: 0.88rem;
            padding: 12px 20px;
            vertical-align: middle;
        }
        .table tbody tr:hover td { background-color: #22262b; }
        .table tbody tr:last-child td { border-bottom: none; }

        /* === TOMBOL === */
        .btn-tambah {
            background: #f0f0f0;
            color: #111315;
            border: none;
            border-radius: 6px;
            padding: 6px 14px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.15s;
        }
        .btn-tambah:hover { background: #d0d0d0; color: #111315; }

        .btn-edit {
            background: transparent;
            border: 1px solid #2a2d32;
            color: #adb5bd;
            border-radius: 6px;
            padding: 4px 10px;
            font-size: 0.78rem;
            text-decoration: none;
            transition: all 0.15s;
            margin-right: 4px;
        }
        .btn-edit:hover { border-color: #f59e0b; color: #f59e0b; }

        .btn-hapus {
            background: transparent;
            border: 1px solid #2a2d32;
            color: #adb5bd;
            border-radius: 6px;
            padding: 4px 10px;
            font-size: 0.78rem;
            text-decoration: none;
            transition: all 0.15s;
        }
        .btn-hapus:hover { border-color: #f87171; color: #f87171; }

        /* === FORM === */
        .form-card {
            background-color: #1a1d21;
            border: 1px solid #2a2d32;
            border-radius: 10px;
            padding: 24px;
            max-width: 540px;
        }
        .form-card-title {
            font-size: 0.88rem;
            font-weight: 600;
            color: #f0f0f0;
            margin-bottom: 20px;
        }
        .form-label {
            color: #adb5bd;
            font-size: 0.82rem;
            margin-bottom: 6px;
        }
        .form-control, .form-select {
            background-color: #111315;
            border: 1px solid #2a2d32;
            color: #f0f0f0;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 0.88rem;
            width: 100%;
        }
        .form-control:focus, .form-select:focus {
            background-color: #111315;
            border-color: #495057;
            color: #f0f0f0;
            box-shadow: none;
            outline: none;
        }
        .form-select option { background-color: #1a1d21; color: #f0f0f0; }
        .form-hint {
            font-size: 0.75rem;
            color: #6c757d;
            margin-top: 4px;
        }
        .error-text {
            font-size: 0.78rem;
            color: #f87171;
            margin-top: 4px;
        }
        .btn-simpan {
            background: #f0f0f0;
            color: #111315;
            border: none;
            border-radius: 6px;
            padding: 8px 20px;
            font-size: 0.85rem;
            font-weight: 600;
            transition: background 0.15s;
            cursor: pointer;
        }
        .btn-simpan:hover { background: #d0d0d0; }
        .btn-batal {
            background: transparent;
            color: #6c757d;
            border: 1px solid #2a2d32;
            border-radius: 6px;
            padding: 8px 20px;
            font-size: 0.85rem;
            text-decoration: none;
            transition: all 0.15s;
        }
        .btn-batal:hover { color: #adb5bd; border-color: #495057; }

        /* === NOTIFIKASI === */
        .notif-success {
            background: #1a2a1a;
            border: 1px solid #2a5c2a;
            color: #86efac;
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 0.85rem;
            margin-bottom: 20px;
        }
        .notif-danger {
            background: #2a1a1a;
            border: 1px solid #5c2a2a;
            color: #f87171;
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 0.85rem;
            margin-bottom: 20px;
        }

        /* === BADGE === */
        .badge-sks {
            background: #1a2030;
            color: #93c5fd;
            font-size: 0.75rem;
            padding: 3px 8px;
            border-radius: 4px;
        }
        .badge-semester {
            background: #1a2a1a;
            color: #86efac;
            font-size: 0.75rem;
            padding: 3px 8px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<!-- ==========================================
     SIDEBAR
========================================== -->
<div id="sidebar">
    <div class="sidebar-brand">
        Sistem MK
        <span>Manajemen Mata Kuliah</span>
    </div>
    <div class="sidebar-nav">
        <a href="/sistem-matakuliah/public/index.php/matakuliah" 
            class="<?= (uri_string() == 'matakuliah') ? 'active' : '' ?>">
            <i class="bi bi-journal-bookmark"></i> Mata Kuliah
        </a>
    </div>
</div>

<!-- ==========================================
     MAIN CONTENT
========================================== -->
<div id="main">

    <!-- TOPBAR -->
    <div id="topbar">
        <div class="page-title"><?= $title ?? 'Dashboard' ?></div>
    </div>

    <!-- KONTEN -->
    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>