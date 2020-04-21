<?php
class Pegawai
{
    //member1 var
    private $koneksi;
    //member2 constructor
    public function __construct()
    {
        global $dbh; //panggil var instance pdo
        $this->koneksi = $dbh;
    }
    //member3 fungsi2 crud
    public function dataPegawai()
    {
        $sql = "SELECT p.*, j.nama as jabatan, d.nama as divisi
                    FROM pegawai p
                    inner join jabatan j on j.id = p.idjabatan
                    inner join divisi d on d.id = p.iddivisi";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute(); //eksekusi
        $rs = $ps->fetchAll(); // ambil seluruh baris data
        return $rs;
    }
    public function simpan($data)
    {
        $sql = "INSERT INTO pegawai(nip,nama,gender,tempat_lahir,
                    tanggal_lahir,idjabatan,iddivisi,alamat,email,foto)
                    VALUES (?,?,?,?,?,?,?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function detailPegawai($id)
    {
        $sql = "SELECT p.*, j.nama as jabatan, d.nama as divisi
                    FROM pegawai p
                    inner join jabatan j on j.id = p.idjabatan
                    inner join divisi d on d.id = p.iddivisi
                    WHERE p.id = ?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
        $rs = $ps->fetch(); // ambil setu baris data
        return $rs;
    }
    public function ubah($data)
    {
        $sql = "UPDATE pegawai SET 
                    nip=?,nama=?,gender=?,tempat_lahir=?,
                    tanggal_lahir=?,idjabatan=?,iddivisi=?,
                    alamat=?,email=?,foto=?
                    WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function hapus($id)
    {
        $sql = "DELETE FROM pegawai WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }
    public function cariPegawai($nama)
    {
        $sql = "SELECT p.*, j.nama as jabatan, d.nama as divisi
                    FROM pegawai p
                    inner join jabatan j on j.id = p.idjabatan
                    inner join divisi d on d.id = p.iddivisi
                    WHERE p.nama LIKE '%$nama%'";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute(); //eksekusi
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function filterDivisi($id)
    {
        $sql = "SELECT p.*, j.nama as jabatan, d.nama as divisi
                    FROM pegawai p
                    inner join jabatan j on j.id = p.idjabatan
                    inner join divisi d on d.id = p.iddivisi
                    WHERE p.iddivisi = $id";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute(); //eksekusi
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function filterJabatan($id)
    {
        $sql = "SELECT p.*, j.nama as jabatan, d.nama as divisi
                    FROM pegawai p
                    inner join jabatan j on j.id = p.idjabatan
                    inner join divisi d on d.id = p.iddivisi
                    WHERE p.idjabatan = $id";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute(); //eksekusi
        $rs = $ps->fetchAll();
        return $rs;
    }
};
