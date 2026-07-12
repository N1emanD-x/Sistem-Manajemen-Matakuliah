<?php
/* =============================================
   FILE: app/Models/MatakuliahModel.php
   FUNGSI: Model untuk tabel matakuliah
   - Mendefinisikan tabel dan field yang boleh diisi
   - Menyediakan aturan validasi form
   - CodeIgniter otomatis handle query dasar (CRUD)
     via extend Model
============================================= */
namespace App\Models;

use CodeIgniter\Model;

class MatakuliahModel extends Model
{
    /* --- Nama tabel di database --- */
    protected $table = 'matakuliah';

    /* --- Primary key tabel --- */
    protected $primaryKey = 'id';

    /* --- Field yang boleh diisi (whitelist) --- */
    protected $allowedFields = [
        'kode_mk',
        'nama_mk',
        'sks',
        'semester'
    ];

    /* --- Aktifkan auto timestamp created_at & updated_at --- */
    protected $useTimestamps = true;

    /* --- Aturan validasi form --- */
    protected $validationRules = [
        'kode_mk'  => 'required|max_length[10]|is_unique[matakuliah.kode_mk,id,{id}]',
        'nama_mk'  => 'required|max_length[100]',
        'sks'      => 'required|integer|greater_than[0]|less_than[5]',
        'semester' => 'required|integer|greater_than[0]|less_than[9]',
    ];

    /* --- Pesan error validasi --- */
    protected $validationMessages = [
        'kode_mk' => [
            'required'   => 'Kode mata kuliah wajib diisi.',
            'max_length' => 'Kode mata kuliah maksimal 10 karakter.',
            'is_unique'  => 'Kode mata kuliah sudah digunakan.',
        ],
        'nama_mk' => [
            'required'   => 'Nama mata kuliah wajib diisi.',
            'max_length' => 'Nama mata kuliah maksimal 100 karakter.',
        ],
        'sks' => [
            'required'      => 'SKS wajib diisi.',
            'integer'       => 'SKS harus berupa angka.',
            'greater_than'  => 'SKS minimal 1.',
            'less_than'     => 'SKS maksimal 4.',
        ],
        'semester' => [
            'required'      => 'Semester wajib diisi.',
            'integer'       => 'Semester harus berupa angka.',
            'greater_than'  => 'Semester minimal 1.',
            'less_than'     => 'Semester maksimal 8.',
        ],
    ];
}