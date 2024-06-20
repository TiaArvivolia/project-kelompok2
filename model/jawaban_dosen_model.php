<?php
include_once('model/koneksi.php');

class JawabanDosen
{
    public $db;
    protected $table_name = 't_jawaban_dosen';

    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function getJawabanById($id)
    {
        $query = "SELECT 
                    jd.jawaban,
                    rd.responden_nama,
                    ms.soal_nama,
                    k.kategori_nama
                  FROM 
                    t_jawaban_dosen jd
                  JOIN 
                    t_responden_dosen rd ON jd.responden_dosen_id = rd.responden_dosen_id
                  JOIN 
                    m_survey_soal ms ON jd.soal_id = ms.soal_id
                  JOIN
                    m_kategori k ON ms.kategori_id = k.kategori_id
                  WHERE 
                    jd.responden_dosen_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }
    
// untuk mengambil Data dan Di exsport ke file excel
public function getAllJawaban()
    {
        $query = "SELECT 
                    jd.jawaban,
                    rd.responden_nama,
                    rd.responden_nip,
                    rd.responden_unit,
                    rd.responden_tanggal,
                    ms.soal_nama,
                    k.kategori_nama
                  FROM 
                    t_jawaban_dosen jd
                  JOIN 
                    t_responden_dosen rd ON jd.responden_dosen_id = rd.responden_dosen_id
                  JOIN 
                    m_survey_soal ms ON jd.soal_id = ms.soal_id
                  JOIN
                    m_kategori k ON ms.kategori_id = k.kategori_id";
        return $this->db->query($query);
    }
}
?>