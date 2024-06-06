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
                    ms.soal_nama 
                  FROM 
                    t_jawaban_industri ji
                  JOIN 
                    t_responden_industri ri ON ji.responden_industri_id = ri.responden_industri_id
                  JOIN 
                    m_survey_soal ms ON ji.soal_id = ms.soal_id
                  WHERE 
                    ji.responden_industri_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>