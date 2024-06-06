<?php
include_once('model/koneksi.php');

class RespondenIndustri
{

    public $db;
    protected $table = 't_jawaban_industri';

    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertJawaban($data, $responden_industri_id)
    {

        $sql = "INSERT INTO {$this->table} (responden_industri_id, soal_id, jawaban) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("iis", $responden_industri_id, $data['soal_id'], $data['jawaban']);
        $stmt->execute();
        $stmt->close();
    }
}
