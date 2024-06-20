<?php
include_once('model/koneksi.php');

class JawabanIndustri
{
    public $db;
    protected $table_name = 't_jawaban_industri';


    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function getJawabanById($id) {
        $query = "SELECT 
                    ji.jawaban,
                    ri.responden_nama,
                    ms.soal_nama,
                    k.kategori_nama
                  FROM 
                    t_jawaban_industri ji
                  JOIN 
                    t_responden_industri ri ON ji.responden_industri_id = ri.responden_industri_id
                  JOIN 
                    m_survey_soal ms ON ji.soal_id = ms.soal_id
                   JOIN
                    m_kategori k ON ms.kategori_id = k.kategori_id
                  WHERE 
                    ji.responden_industri_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }
    // untuk mengambil Data dan Di exsport ke file excel
    public function getAllJawaban()
    {
      $query = "SELECT 
      ji.jawaban,
      ri.responden_nama,
      ri.responden_jabatan,
      ri.responden_perusahaan,
      ri.responden_tanggal,
      ms.soal_nama,
      k.kategori_nama
    FROM 
      t_jawaban_industri ji
    JOIN 
      t_responden_industri ri ON ji.responden_industri_id = ri.responden_industri_id
    JOIN 
      m_survey_soal ms ON ji.soal_id = ms.soal_id
    JOIN
      m_kategori k ON ms.kategori_id = k.kategori_id";
return $this->db->query($query);
}
}
?>