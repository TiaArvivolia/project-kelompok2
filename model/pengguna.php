<?php 
class Pengguna {
    public $db;
    protected $table = 'm_user';

    public function __construct() {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data) {
        $query = $this->db->prepare("INSERT INTO {$this->table} (username, nama, password) VALUES (?, ?, ?)");
        $query->bind_param('sss', $data['username'], $data['nama'], $data['password']);
        $query->execute();
    }

    public function getData() {
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getDataById($id) {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE user_id= ?");
        $query->bind_param('i', $id);
        $query->execute();
        return $query->get_result();
    }

    public function updateData($id, $data) {
        $query = $this->db->prepare("UPDATE {$this->table} SET username = ?, nama = ?, password= ? WHERE user_id = ?");
        $query->bind_param('sssi', $data['username'], $data['nama'], $data['password'], $id);
        $query->execute();
    }

    public function deleteData($id) {
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE user_id= ?");
        $query->bind_param('i', $id);
        $query->execute();
    }

    public function getNama() {
        if (isset($_SESSION['username'])) {
            return $_SESSION['username'];
        } else {
            return null;
        }
    }
    public function getNama_pengguna() {
        if (isset($_SESSION['nama'])) {
            return $_SESSION['nama'];
        } else {
            return null;
        }
    }
}
?>