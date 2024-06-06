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
                    ms.soal_nama 
                  FROM 
                    t_jawaban_dosen jd
                  JOIN 
                    t_responden_dosen rd ON jd.responden_dosen_id = rd.responden_dosen_id
                  JOIN 
                    m_survey_soal ms ON jd.soal_id = ms.soal_id
                  WHERE 
                    jd.responden_dosen_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }
}