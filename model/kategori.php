<?php
include_once('model/koneksi.php');

class Kategori
{
    public $db;
    protected $table = 'm_kategori';

    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        $query = $this->db->prepare("INSERT INTO {$this->table} (kategori_nama) VALUES (?)");
        $query->bind_param('s', $data['kategori_nama']);
        $query->execute();
    }

    public function getData()
    {
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getDataById($id)
    {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE kategori_id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        return $query->get_result();
    }

    public function updateData($id, $data)
    {
        $query = $this->db->prepare("UPDATE {$this->table} SET kategori_nama = ? WHERE kategori_id = ?");
        $query->bind_param('si', $data['kategori_nama'], $id);
        $query->execute();
    }

    public function deleteData($id)
    {
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE kategori_id = ?");
        $query->bind_param('i', $id);
        $query->execute();
    }
}
?>