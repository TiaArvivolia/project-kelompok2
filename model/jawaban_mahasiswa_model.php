<?php
include_once('model/koneksi.php');

class JawabanMahasiswa
{
  public $db;
  protected $table_name = 't_jawaban_mahasiswa';

  public function __construct()
  {
    global $db;
    $this->db = $db;
    $this->db->set_charset('utf8');
  }

  public function getJawabanById($id)
  {
    $query = "SELECT 
                    jm.jawaban,
                    rm.responden_nama,
                    ms.soal_nama 
                  FROM 
                    t_jawaban_mahasiswa jm
                  JOIN 
                    t_responden_mahasiswa rm ON jm.responden_mahasiswa_id = rm.responden_mahasiswa_id
                  JOIN 
                    m_survey_soal ms ON jm.soal_id = ms.soal_id
                  WHERE 
                    jm.responden_mahasiswa_id = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result();
  }
}