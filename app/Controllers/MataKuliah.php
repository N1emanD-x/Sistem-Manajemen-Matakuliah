<?php
/* =============================================
   FILE: app/Controllers/MataKuliah.php
   FUNGSI: Controller utama Sistem Matakuliah
============================================= */
namespace App\Controllers;

use App\Models\MatakuliahModel;

class MataKuliah extends BaseController
{
    protected $model;
    protected $url = 'http://localhost/sistem-matakuliah/public/index.php/matakuliah';

    public function __construct()
    {
        $this->model = new MatakuliahModel();
    }

    /* index() — Tampil semua data */
    public function index()
    {
        $data = [
            'title'      => 'Data Mata Kuliah',
            'matakuliah' => $this->model->orderBy('semester', 'ASC')->findAll(),
            'notif'      => session()->getFlashdata('notif'),
            'notif_type' => session()->getFlashdata('notif_type'),
        ];
        return view('matakuliah/index', $data);
    }

    /* create() — Form tambah */
    public function create()
    {
        $data = [
            'title'      => 'Tambah Mata Kuliah',
            'validation' => null,
        ];
        return view('matakuliah/create', $data);
    }

    /* store() — Simpan data baru */
    public function store()
    {
        $input = [
            'kode_mk'  => $this->request->getPost('kode_mk'),
            'nama_mk'  => $this->request->getPost('nama_mk'),
            'sks'      => $this->request->getPost('sks'),
            'semester' => $this->request->getPost('semester'),
        ];

        if (!$this->model->validate($input)) {
            $data = [
                'title'      => 'Tambah Mata Kuliah',
                'validation' => $this->model->errors(),
            ];
            return view('matakuliah/create', $data);
        }

        $this->model->insert($input);
        session()->setFlashdata('notif', 'Mata kuliah berhasil ditambahkan!');
        session()->setFlashdata('notif_type', 'success');
        return redirect()->to($this->url);
    }

    /* edit() — Form edit */
    public function edit($id)
    {
        $mk = $this->model->find($id);
        if (!$mk) {
            return redirect()->to($this->url);
        }
        $data = [
            'title'      => 'Edit Mata Kuliah',
            'mk'         => $mk,
            'validation' => null,
        ];
        return view('matakuliah/edit', $data);
    }

    /* update() — Proses update */
    public function update($id)
    {
        $input = [
            'kode_mk'  => $this->request->getPost('kode_mk'),
            'nama_mk'  => $this->request->getPost('nama_mk'),
            'sks'      => $this->request->getPost('sks'),
            'semester' => $this->request->getPost('semester'),
        ];

        if (!$this->model->validate($input)) {
            $data = [
                'title'      => 'Edit Mata Kuliah',
                'mk'         => $this->model->find($id),
                'validation' => $this->model->errors(),
            ];
            return view('matakuliah/edit', $data);
        }

        $this->model->update($id, $input);
        session()->setFlashdata('notif', 'Mata kuliah berhasil diperbarui!');
        session()->setFlashdata('notif_type', 'success');
        return redirect()->to($this->url);
    }

    /* delete() — Hapus data */
    public function delete($id)
    {
        $mk = $this->model->find($id);
        if (!$mk) {
            return redirect()->to($this->url);
        }
        $this->model->delete($id);
        session()->setFlashdata('notif', 'Mata kuliah berhasil dihapus!');
        session()->setFlashdata('notif_type', 'danger');
        return redirect()->to($this->url);
    }
}