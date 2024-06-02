<?php
include_once('model/koneksi.php');

class RespondenOrtu {

    public $db;
    protected $table = 't_jawaban_ortu';

    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertJawaban($data, $responden_ortu_id) {

        $sql = "INSERT INTO {$this->table} (responden_ortu_id, soal_id, jawaban) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("iis", $responden_ortu_id, $data['soal_id'], $data['jawaban']);
        $stmt->execute();
        $stmt->close();
    }
}
?>