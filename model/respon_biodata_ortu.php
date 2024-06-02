<?php
include_once('model/koneksi.php');

class RespondenOrtu
{
    public $db;
    protected $table = 't_responden_ortu'; // Ubah nama tabel ke 't_responden_ortu'

    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        $query = $this->db->prepare("INSERT INTO {$this->table} (responden_nama, responden_jk, responden_umur, responden_hp, responden_pendidikan, responden_pekerjaan, responden_penghasilan, mahasiswa_nim, mahasiswa_nama, mahasiswa_prodi, responden_tanggal, survey_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $query->bind_param('ssissssssssi', $data['responden_nama'], $data['responden_jk'], $data['responden_umur'], $data['responden_hp'], $data['responden_pendidikan'], $data['responden_pekerjaan'], $data['responden_penghasilan'], $data['mahasiswa_nim'], $data['mahasiswa_nama'], $data['mahasiswa_prodi'], $data['responden_tanggal'], $data['survey_id']);
        $query->execute();

        return $query->insert_id;
    }

    public function getData()
    {
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getDataById($id)
    {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE responden_ortu_id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        return $query->get_result();
    }

    public function updateData($data, $id)
    {
        $query = $this->db->prepare("UPDATE {$this->table} SET responden_nama=?, responden_jk=?, responden_umur=?, responden_hp=?, responden_pendidikan=?, responden_pekerjaan=?, responden_penghasilan=?, mahasiswa_nim=?, mahasiswa_nama=?, mahasiswa_prodi=?, responden_tanggal=?, survey_id=? WHERE responden_ortu_id=?");
        $query->bind_param('ssissssssssii', $data['responden_nama'], $data['responden_jk'], $data['responden_umur'], $data['responden_hp'], $data['responden_pendidikan'], $data['responden_pekerjaan'], $data['responden_penghasilan'], $data['mahasiswa_nim'], $data['mahasiswa_nama'], $data['mahasiswa_prodi'], $data['responden_tanggal'], $data['survey_id'], $id);
        $query->execute();
    }


    // Add the deleteData method
    public function deleteData($id)
    {
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE responden_ortu_id = ?");
        $query->bind_param('i', $id);
        $query->execute();
    }
}
