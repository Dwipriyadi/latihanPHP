<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaByID($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    //tambahdata(insert)
    public function tambah()
    {
        if ($this->model('Mahasiswa_model')->tambahData($_POST) > 0) {
            //alert pesan data berhasil ditambahkan
            Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');

            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Ditambahkan', 'danger');

            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
    //hapus data
    public function hapus($id)
    {
        if ($this->model('Mahasiswa_model')->hapusData($id) > 0) {
            //alert pesan data berhasil ditambahkan
            Flasher::setFlash('Berhasil', 'Dihapus', 'success');

            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Dihapus', 'danger');

            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }


    public function getubah()
    {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Mahasiswa_model')->ubahData($_POST) > 0) {
            //alert pesan data berhasil ditambahkan
            Flasher::setFlash('Berhasil', 'Diubah', 'success');

            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Diubah', 'danger');

            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
    // controller pencarian
    public function cari()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}
