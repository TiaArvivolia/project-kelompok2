<?php
include_once('model/koneksi.php');

class RespondenTendik
{
    public $db;
    protected $table = 't_responden_tendik';

    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        $query = $this->db->prepare("INSERT INTO {$this->table} (responden_nama, responden_nopeg, responden_unit, responden_tanggal, survey_id) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param('ssssi', $data['responden_nama'], $data['responden_nopeg'], $data['responden_unit'], $data['responden_tanggal'], $data['survey_id']);
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