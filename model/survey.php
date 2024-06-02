<?php
include_once('model/koneksi.php');

class Survey
{
    public $db;
    protected $table = 'm_survey';
    protected $user_table = 'm_user'; // Define the user table

    public function __construct()
    {
        global $db; // Menjadikan $db sebagai variabel global
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        // prepare statement untuk query insert
        $query = $this->db->prepare("INSERT INTO {$this->table} (survey_jenis, survey_kode, survey_nama, survey_deskripsi, survey_tanggal, user_id) VALUES (?, ?, ?, ?, ?, ?)");
    
        // binding parameter ke query, "s" berarti string
        $query->bind_param('sssssi', $data['survey_jenis'], $data['survey_kode'], $data['survey_nama'], $data['survey_deskripsi'], $data['survey_tanggal'], $data['user_id']);
    
        // eksekusi query untuk menyimpan ke database
        $query->execute();
    }    

    public function getData()
    {
        // query untuk mengambil data dari tabel m_survey
        return $this->db->query("SELECT s.*, u.nama AS user_name FROM {$this->table} s LEFT JOIN {$this->user_table} u ON s.user_id = u.user_id");
    }

    public function getDataById($id)
    {
        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("SELECT s.*, u.nama AS user_name FROM {$this->table} s LEFT JOIN {$this->user_table} u ON s.user_id = u.user_id WHERE s.survey_id = ?");

        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        return $query->get_result();
    }

    public function updateData($id, $data)
    {
        // query untuk update data
        $query = $this->db->prepare("UPDATE {$this->table} SET survey_jenis = ?, survey_kode = ?, survey_nama = ?, survey_deskripsi = ?, survey_tanggal = ?, user_id = ? WHERE survey_id = ?");

        // binding parameter ke query
        $query->bind_param('sssssii', $data['survey_jenis'], $data['survey_kode'], $data['survey_nama'], $data['survey_deskripsi'], $data['survey_tanggal'], $data['user_id'], $id);

        // eksekusi query
        $query->execute();
    }

    public function deleteData($id)
    {
        // query untuk delete data
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE survey_id = ?");

        // binding parameter ke query
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();
    }

    // Function to get user data
    public function getUserData()
    {
        // query to get data from m_user table
        return $this->db->query("SELECT * FROM {$this->user_table}");
    }
}
?>