<?php
include_once('model/koneksi.php');

class Soal
{
    public $db;
    protected $table = 'm_survey_soal';

    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function getSoalDosen()
    {
        $result = $this->db->query("SELECT * FROM {$this->table} WHERE survey_id = 1");
        return $result->fetch_all(MYSQLI_ASSOC); // Fetch as associative array
    }
    public function getSoalMahasiswa()
    {
        $result = $this->db->query("SELECT * FROM {$this->table} WHERE survey_id = 2");
        return $result->fetch_all(MYSQLI_ASSOC); // Fetch as associative array
    }
    public function getSoalTendik()
    {
        $result = $this->db->query("SELECT * FROM {$this->table} WHERE survey_id = 3");
        return $result->fetch_all(MYSQLI_ASSOC); // Fetch as associative array
    }
    public function getSoalAlumni()
    {
        $result = $this->db->query("SELECT * FROM {$this->table} WHERE survey_id = 4");
        return $result->fetch_all(MYSQLI_ASSOC); // Fetch as associative array
    }
    public function getSoalOrtu()
    {
        $result = $this->db->query("SELECT * FROM {$this->table} WHERE survey_id = 5");
        return $result->fetch_all(MYSQLI_ASSOC); // Fetch as associative array
    }
    public function getSoalIndustri()
    {
        $result = $this->db->query("SELECT * FROM {$this->table} WHERE survey_id = 6");
        return $result->fetch_all(MYSQLI_ASSOC); // Fetch as associative array
    }

    //     public function saveJawaban($responden_dosen_id, $jawaban)
    //     {
    //         foreach ($jawaban as $soal_id => $jawaban_value) {
    //             $query = $this->db->prepare("INSERT INTO t_jawaban_dosen (responden_dosen_id, soal_id, jawaban) VALUES (?, ?, ?)");
    //             $query->bind_param('iis', $responden_dosen_id, $soal_id, $jawaban_value);
    //             $query->execute();
    //         }
    //     }
}