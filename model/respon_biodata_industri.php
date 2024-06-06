<?php
include_once('model/koneksi.php');

class RespondenIndustri
{
    public $db;
    protected $table = 't_responden_industri';

    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        $data['responden_tanggal'] = date("Y-m-d H:i:s");  // Set current date and time
        $query = $this->db->prepare("INSERT INTO {$this->table} (responden_nama, responden_jabatan, responden_perusahaan, responden_tanggal, responden_email, responden_hp, responden_kota, survey_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $query->bind_param('sssssssi', $data['responden_nama'], $data['responden_jabatan'], $data['responden_perusahaan'], $data['responden_tanggal'], $data['responden_email'], $data['responden_hp'],  $data['responden_kota'], $data['survey_id']);
        $query->execute();

        return $query->insert_id;
    }

    public function getData()
    {
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getDataById($id)
    {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE responden_industri_id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        return $query->get_result();
    }

    public function updateData($id, $data)
    {
        $query = $this->db->prepare("UPDATE {$this->table} SET responden_nama = ?, responden_jabatan = ?, responden_perusahaan = ?, responden_email = ?, responden_hp = ?, responden_kota = ?, survey_id = ? WHERE responden_industri_id = ?");
        $query->bind_param('ssssssii', $data['responden_nama'], $data['responden_jabatan'], $data['responden_perusahaan'], $data['responden_email'], $data['responden_hp'], $data['responden_kota'], $data['survey_id'], $id);
        return $query->execute();
    }

    public function deleteData($id)
    {
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE responden_industri_id = ?");
        $query->bind_param('i', $id);
        return $query->execute();
    }
}
?>