<?php
include_once('model/koneksi.php');

class JawabanAlumni
{
  public $db;
  protected $table_name = 't_jawaban_alumni';

  public function __construct()
  {
    global $db;
    $this->db = $db;
    $this->db->set_charset('utf8');
  }

  public function getJawabanById($id)
  {
    $query = "SELECT 
                    ja.jawaban,
                    ra.responden_nama,
                    ms.soal_nama,
                    k.kategori_nama
                  FROM 
                    t_jawaban_alumni ja
                  JOIN 
                    t_responden_alumni ra ON ja.responden_alumni_id = ra.responden_alumni_id
                  JOIN 
                    m_survey_soal ms ON ja.soal_id = ms.soal_id                  
                  JOIN
                    m_kategori k ON ms.kategori_id = k.kategori_id
                  WHERE 
                    ja.responden_alumni_id = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result();
  }
  // untuk mengambil Data dan Di exsport ke file excel
  public function getAllJawaban()
  {
    $query = "SELECT 
    ja.jawaban,
    ra.responden_nama,
    ra.responden_nim,
    ra.responden_prodi,
    ra.responden_tanggal,
    ms.soal_nama,
    k.kategori_nama
  FROM 
    t_jawaban_alumni ja
  JOIN 
    t_responden_alumni ra ON ja.responden_alumni_id = ra.responden_alumni_id
  JOIN 
    m_survey_soal ms ON ja.soal_id = ms.soal_id
  JOIN
    m_kategori k ON ms.kategori_id = k.kategori_id";
return $this->db->query($query);
}
}
?>