<?php
include_once('koneksi.php');

class JawabanOrtu
{
  public $db;
  protected $table = 't_jawaban_ortu';

  public function __construct()
  {
    global $db;
    $this->db = $db;
    $this->db->set_charset('utf8');
  }

  public function getJawabanById($id)
  {
    $query = "SELECT 
                    jo.jawaban,
                    ro.responden_nama,
                    ms.soal_nama,
                    k.kategori_nama
                  FROM 
                    t_jawaban_ortu jo
                  JOIN 
                    t_responden_ortu ro ON jo.responden_ortu_id = ro.responden_ortu_id
                  JOIN 
                    m_survey_soal ms ON jo.soal_id = ms.soal_id
                  JOIN
                    m_kategori k ON ms.kategori_id = k.kategori_id
                  WHERE 
                    jo.responden_ortu_id = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result();
  }
// untuk mengambil Data dan Di exsport ke file excel
public function getAllJawaban()
{
  $query = "SELECT 
  jo.jawaban,
  ro.responden_nama,
  ro.responden_pendidikan,
  ro.responden_pekerjaan,
  ro.mahasiswa_nama,
  ro.mahasiswa_nim,
  ro.mahasiswa_prodi,
  ro.responden_tanggal,
  ms.soal_nama,
  k.kategori_nama
FROM 
  t_jawaban_ortu jo
JOIN 
  t_responden_ortu ro ON jo.responden_ortu_id = ro.responden_ortu_id
JOIN 
  m_survey_soal ms ON jo.soal_id = ms.soal_id
  JOIN
  m_kategori k ON ms.kategori_id = k.kategori_id";

return $this->db->query($query);
}
}
?>