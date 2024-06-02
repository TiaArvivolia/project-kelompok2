<?php
include_once('model/koneksi.php');

class JawabTendik{

    public $db;
    protected $table = 't_jawaban_tendik';

    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertJawaban($data, $responden_tendik_id) {

        foreach ($data['soal_id'] as $index => $soal_id) {
            $jawaban = $data['jawaban'][$soal_id];
            $sql = "INSERT INTO {$this->table} (responden_tendik_id, soal_id, jawaban) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("iis", $responden_tendik_id, $soal_id, $jawaban);
            $stmt->execute();
            $stmt->close();
        }
    }
}
?>