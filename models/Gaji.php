<?php
class Gaji{
    private $koneksi;

    public function __construct(){
        global $dbh;
        $this->koneksi = $dbh;
    }
    public function dataGaji(){
        $sql = "SELECT g.*, p.nama, p.nip, d.nama as divisi, j.nama as jabatan
                    FROM gaji g 
                    INNER JOIN pegawai p ON p.id = g.pegawai_id
                    INNER JOIN divisi d ON d.id = p.iddivisi
                    INNER JOIN jabatan j ON j.id = p.idjabatan";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function simpan($data){
        $sql = "INSERT INTO gaji(pegawai_id,gapok,tunjab,bpjs,lain2)
                     VALUES (?,?,?,?,?)";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);    
    }
    public function getGaji($id){
        $sql = "SELECT g.*, p.nip, p.nama, p.foto, d.nama as divisi, j.nama as jabatan
                    FROM gaji g 
                    INNER JOIN pegawai p ON p.id = g.pegawai_id
                    INNER JOIN divisi d ON d.id = p.iddivisi
                    INNER JOIN jabatan j ON j.id = p.idjabatan
                    WHERE g.id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
        $rs = $ps->fetch();
        return $rs;
    }
    public function dataBelumDigaji(){
        $sql = "SELECT pegawai.id as idp, pegawai.nama 
                    FROM pegawai 
                    LEFT JOIN gaji ON pegawai.id = gaji.pegawai_id
                    WHERE gaji.pegawai_id IS NULL";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function ubah($data2){
        $sql = "UPDATE gaji SET gapok=?,tunjab=?,bpjs=?,lain2=?
                    WHERE id=?";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data2);    
    }
    
    public function hapus($id){
        $sql = "DELETE FROM gaji WHERE id=?";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($id);    
    }
}
