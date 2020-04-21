<?php
class Login
{
    //member1 var
    private $koneksi;
    //member2 constructor
    public function __construct()
    {
        global $dbh; //panggil var instance pdo
        $this->koneksi = $dbh;
    }
    //member3 fungsi2 otentikasi user
    public function otentikasi($data)
    {
        $sql = "SELECT * FROM member WHERE username=? AND
                    passwors=SHA1(?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
        $rs = $ps->fetch();
        return $rs;
    }
    public function dataUser()
    {
        $sql = "select * from member";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute(); //eksekusi
        $rs = $ps->fetchAll(); // ambil seluruh baris data
        return $rs;
    }
    public function getUser($data)
    {
        $sql = "select * from member where id=?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($data); //eksekusi
        $rs = $ps->fetch(); // ambil satu baris data yang mau diedit
        return $rs;
    }
    public function simpan($data)
    {
        $sql = "INSERT INTO member(fullname,username,passwors,role,email,foto)
                    VALUES (?,?,SHA1(?),?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function ubah($data)
    {
        $sql = "update member set fullname=?, username=?, passwors=SHA1(?), role=?, email=?, foto=? where id=?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($data); //eksekusi
    }
    public function hapus($id)
    {
        $sql = "delete from member where id=?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
    }
}
