<?php
include_once('model/koneksi.php');

class RespondenAlumni
{
    public $db;
    protected $table = 't_responden_alumni';

    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        $query = $this->db->prepare("INSERT INTO {$this->table} (responden_nama, responden_nim, responden_prodi, responden_tanggal, responden_email, responden_hp, tahun_lulus, survey_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $query->bind_param('sssssssi', $data['responden_nama'], $data['responden_nim'], $data['responden_prodi'], $data['responden_tanggal'], $data['responden_email'], $data['responden_hp'],  $data['tahun_lulus'], $data['survey_id']);
        $query->execute();

        return $query->insert_id;
    }

    public function getData()
    {
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getDataById($id)
    {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE responden_id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        return $query->get_result();
    }

}
?>