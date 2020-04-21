<?php
class Materi
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
    public function dataMateri()
    {
        $sql = "select * from materi";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute(); //eksekusi
        $rs = $ps->fetchAll(); // ambil seluruh baris data
        return $rs;
    }
    public function getMateri($id)
    {
        $sql = "select * from materi where id=?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
        $rs = $ps->fetch(); // ambil satu baris data yang mau diedit
        return $rs;
    }
    public function ubah($data)
    {
        $sql = "update materi set nama=? where id=?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($data); //eksekusi
    }
    public function hapus($id)
    {
        $sql = "delete from materi where id=?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
    }
    public function input($data)
    {
        $sql = "insert into materi (nama) values (?)";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($data); //eksekusi
    }
}
