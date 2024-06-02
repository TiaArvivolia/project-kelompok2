<?php
include_once('model/koneksi.php');

class RespondenMahasiswa
{
    public $db;
    protected $table = 't_responden_mahasiswa';

    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        $query = $this->db->prepare("INSERT INTO {$this->table} (responden_nama, responden_nim, responden_prodi, responden_tanggal, responden_email, responden_hp, tahun_masuk, survey_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $query->bind_param('sssssssi', $data['responden_nama'], $data['responden_nim'], $data['responden_prodi'], $data['responden_tanggal'], $data['responden_email'], $data['responden_hp'], $data['tahun_masuk'], $data['survey_id']);
        $query->execute();

        return $query->insert_id;
    }

    public function getData()
    {
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getDataById($id)
    {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE responden_mahasiswa_id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        return $query->get_result();
    }

    public function updateData($data, $id)
    {
        $query = $this->db->prepare("UPDATE {$this->table} SET responden_nama=?, responden_nim=?, responden_prodi=?, responden_tanggal=?, responden_email=?, responden_hp=?, tahun_masuk=?, survey_id=? WHERE responden_mahasiswa_id=?");
        $query->bind_param('ssssssssi', $data['responden_nama'], $data['responden_nim'], $data['responden_prodi'], $data['responden_tanggal'], $data['responden_email'], $data['responden_hp'], $data['tahun_masuk'], $data['survey_id'], $id);
        $query->execute();
    }

    // Add the deleteData method
    public function deleteData($id)
    {
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE responden_mahasiswa_id = ?");
        $query->bind_param('i', $id);
        $query->execute();
    }
}
