<?php
include_once('model/koneksi.php');

class JawabanTendik
{
  public $db;
  protected $table_name = 't_jawaban_tendik';

  public function __construct()
  {
    global $db;
    $this->db = $db;
    $this->db->set_charset('utf8');
  }

  public function getJawabanById($id)
  {
    $query = "SELECT 
                    jt.jawaban,
                    rt.responden_nama,
                    ms.soal_nama 
                  FROM 
                    t_jawaban_tendik jt
                  JOIN 
                    t_responden_tendik rt ON jt.responden_tendik_id = rt.responden_tendik_id
                  JOIN 
                    m_survey_soal ms ON jt.soal_id = ms.soal_id
                  WHERE 
                    jt.responden_tendik_id = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result();
  }
}
