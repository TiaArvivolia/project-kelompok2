<?php
class Survey
{
    public $db;
    protected $table = 'm_survey';

    public function __construct()
    {
        include_once('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        // prepare statement untuk query insert
        $query = $this->db->prepare("INSERT INTO {$this->table} (survey_id, user_id, survey_jenis, survey_kode, survey_nama, survey_deskripsi, survey_tanggal) VALUES (?,?,?,?,?,?)");

        // binding parameter ke query, "s" berarti string, "ss" berarti dua string, "i" berarti integer
        $query->bind_param('sssssi', $data['survey_id'], $data[' user_id'], $data['survey_jenis'], $data['survey_kode'], $data['survey_nama'], $data['survey_deskripsi'], $data['survey_tanggal']);

        // eksekusi query untuk menyimpan ke database
        $query->execute();
    }


    public function getData()
    {
        // query untuk mengambil data dari tabel bank_soal
        return $this->db->query("select * from {$this->table} ");
    }

    public function getDataById($id)
    {

        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("select * from {$this->table} where survey_id = ?");

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
        $query = $this->db->prepare("update {$this->table} set survey_id= ?, user_id = ?, survey_jenis=?,survey_kode=?,survey_nama=?, survey_deskripsi=?, survey_tanggal=? where survey_id = ?");

        // binding parameter ke query
        $query->bind_param('sssssi', $data['survey_id'], $data[' user_id'], $data['survey_jenis'], $data['survey_kode'], $data['survey_nama'], $data['survey_deskripsi'], $data['survey_tanggal'], $id);

        // eksekusi query
        $query->execute();
    }

    public function deleteData($id)
    {
        // query untuk delete data
        $query = $this->db->prepare("delete from {$this->table} where id_survey = ?");

        // binding parameter ke query
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();
    }
}