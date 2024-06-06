<?php
include_once('model/koneksi.php');

class SurveySoal
{
    public $db;
    protected $table = 'm_survey_soal';
    protected $survey_table = 'm_survey';
    protected $kategori_table = 'm_kategori';

    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        $query = $this->db->prepare("INSERT INTO {$this->table} (survey_id, soal_nama, kategori_id, no_urut, soal_jenis) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param('isiis', $data['survey_id'], $data['soal_nama'], $data['kategori_id'], $data['no_urut'], $data['soal_jenis']);
        return $query->execute();
    }

    public function getData()
    {
        $query = "SELECT s.soal_id, s.soal_nama, s.no_urut, s.soal_jenis, m_survey.survey_nama, m_kategori.kategori_nama
                  FROM {$this->table} s
                  JOIN {$this->survey_table} m_survey ON s.survey_id = m_survey.survey_id
                  JOIN {$this->kategori_table} m_kategori ON s.kategori_id = m_kategori.kategori_id";
        return $this->db->query($query);
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
        return $query->execute();
    }

    public function deleteData($id)
    {
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE soal_id = ?");
        $query->bind_param('i', $id);
        return $query->execute();
    }
}
