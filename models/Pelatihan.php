<?php
class Pelatihan
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
    public function dataPelatihan()
    {
        $sql = "SELECT pel.*, peg.nama, d.nama as divisi, j.nama as jabatan,
        m.nama as materi
        from pelatihan pel
        inner join pegawai peg on peg.id = pel.pegawai_id
        inner join divisi d on d.id = peg.iddivisi
        inner join jabatan j on j.id = peg.idjabatan
        inner join materi m on m.id = pel.materi_id";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute(); //eksekusi
        $rs = $ps->fetchAll(); // ambil seluruh baris data
        return $rs;
    }
    public function getPelatihan($id)
    {
        $sql = "SELECT pel.*, peg.nama, d.nama as divisi, j.nama as jabatan,
        m.nama as materi
        from pelatihan pel
        inner join pegawai peg on peg.id = pel.pegawai_id
        inner join divisi d on d.id = peg.iddivisi
        inner join jabatan j on j.id = peg.idjabatan
        inner join materi m on m.id = pel.materi_id
        WHERE pel.id = ?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
        $rs = $ps->fetch(); // ambil setu baris data
        return $rs;
    }
    public function simpan($data)
    {
        $sql = "INSERT INTO pelatihan(pegawai_id,materi_id,tgl_mulai,tgl_akhir,keterangan)
                    VALUES (?,?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function ubah($data)
    {
        $sql = "UPDATE pelatihan SET 
                    pegawai_id=?,materi_id=?,tgl_mulai=?,tgl_akhir=?,
                    keterangan=?
                    WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function hapus($id)
    {
        $sql = "DELETE FROM pelatihan WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }
};
