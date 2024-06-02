<?php
include_once('model/koneksi.php');

class SurveySoal
{
    public $db;
    protected $table = 'm_survey_soal';
    protected $kategori_table = 'm_kategori';
    protected $survey_table = 'm_survey';

    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        // Dapatkan no_urut tertinggi untuk survey_id yang diberikan
        $maxNoUrut = $this->getMaxNoUrut($data['survey_id']);
        $noUrutBaru = $maxNoUrut + 1;

        // Masukkan data dengan no_urut baru
        $query = $this->db->prepare("INSERT INTO {$this->table} (survey_id, kategori_id, no_urut, soal_jenis, soal_nama) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param('iiiss', $data['survey_id'], $data['kategori_id'], $noUrutBaru, $data['soal_jenis'], $data['soal_nama']);
        $query->execute();
    }

    public function getMaxNoUrut($survey_id)
    {
        $query = $this->db->prepare("SELECT MAX(no_urut) as max_no_urut FROM {$this->table} WHERE survey_id = ?");
        $query->bind_param('i', $survey_id);
        $query->execute();
        $result = $query->get_result();
        $row = $result->fetch_assoc();
        return $row['max_no_urut'] ?? 0;
    }

    public function getData()
    {
        $query = "SELECT s.soal_id, s.soal_nama, k.kategori_nama, s.soal_jenis, sr.survey_nama 
                  FROM {$this->table} s 
                  LEFT JOIN {$this->kategori_table} k ON s.kategori_id = k.kategori_id
                  LEFT JOIN {$this->survey_table} sr ON s.survey_id = sr.survey_id";
        return $this->db->query($query);
    }

    public function getSoalBySurvey(string $survey_nama)
    {
        try {
            $query = $this->db->prepare("SELECT s.soal_nama, k.kategori_nama, s.soal_jenis, sr.survey_nama, s.no_urut 
                      FROM {$this->table} s 
                      JOIN {$this->kategori_table} k ON s.kategori_id = k.kategori_id
                      JOIN {$this->survey_table} sr ON s.survey_id = sr.survey_id
                      WHERE sr.survey_nama =?");
            $query->bind_param('s', $survey_nama);
            $query->execute();

            $result = $query->get_result();

            // Fetch all rows as an associative array
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            return $rows;
        } catch (\Exception $th) {
            var_dump($th);
        }
    }

    public function getDataById($id)
    {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE soal_id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        return $query->get_result();
    }

    public function updateData($id, $data)
    {
        $query = $this->db->prepare("UPDATE {$this->table} SET survey_id = ?, kategori_id = ?, no_urut = ?, soal_jenis = ?, soal_nama = ? WHERE soal_id = ?");
        $query->bind_param('iiissi', $data['survey_id'], $data['kategori_id'], $data['no_urut'], $data['soal_jenis'], $data['soal_nama'], $id);
        $query->execute();
    }

    public function deleteData($id)
    {
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE soal_id = ?");
        $query->bind_param('i', $id);
        $query->execute();
    }

    public function getSoalJenis()
    {
        $query = $this->db->prepare("SELECT DISTINCT soal_jenis FROM {$this->table}");
        $query->execute();
        return $query->get_result();
    }
}