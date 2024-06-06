<?php
include_once('model/koneksi.php');

class RespondenDosen
{
    public $db;
    protected $table = 't_responden_dosen';

    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        $query = $this->db->prepare("INSERT INTO {$this->table} (responden_nama, responden_nip, responden_unit, responden_tanggal, survey_id) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param('ssssi', $data['responden_nama'], $data['responden_nip'], $data['responden_unit'], $data['responden_tanggal'], $data['survey_id']);
        $query->execute();

        return $query->insert_id;
    }

    public function getData()
    {
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getDataById($id)
    {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE responden_dosen_id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        return $query->get_result();
    }

    public function updateData($data, $id)
    {
        $query = $this->db->prepare("UPDATE {$this->table} SET responden_nama=?, responden_nip=?, responden_unit=?, responden_tanggal=?, survey_id=? WHERE responden_dosen_id=?");
        $query->bind_param('ssssii', $data['responden_nama'], $data['responden_nip'], $data['responden_unit'], $data['responden_tanggal'], $data['survey_id'], $id);
        $query->execute();
    }

    // Add the deleteData method
    public function deleteData($id)
    {
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE responden_dosen_id = ?");
        $query->bind_param('i', $id);
        $query->execute();
    }
}