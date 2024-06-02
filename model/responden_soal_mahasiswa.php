<?php
include_once('model/koneksi.php');

class RespondenSoal {

    public $db;
    protected $table = 't_jawaban_mahasiswa';

    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertJawaban($data, $responden_mahasiswa_id) {

        $sql = "INSERT INTO {$this->table} (responden_mahasiswa_id, soal_id, jawaban) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("iis", $responden_mahasiswa_id, $data['soal_id'], $data['jawaban']);
        $stmt->execute();
        $stmt->close();
    }
}
?>