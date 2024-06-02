<?php
include_once('model/koneksi.php');

class RespondenOrtu
{
    public $db;
    protected $table = 't_responden_ortu';

    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->db->set_charset('utf8');
    }
    public function insertData($data)
    {
        $query = $this->db->prepare("
            INSERT INTO {$this->table} 
            (
                responden_nama, 
                responden_jk, 
                responden_umur, 
                responden_tanggal, 
                responden_pendidikan, 
                responden_penghasilan, 
                responden_hp, 
                mahasiswa_nim, 
                mahasiswa_nama, 
                mahasiswa_prodi, 
                survey_id
            ) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $query->bind_param(
            'ssissssissi', 
            $data['responden_nama'], 
            $data['responden_jk'], 
            $data['responden_umur'], 
            $data['responden_tanggal'], 
            $data['responden_pendidikan'], 
            $data['responden_penghasilan'], 
            $data['responden_hp'], 
            $data['mahasiswa_nim'], 
            $data['mahasiswa_nama'], 
            $data['mahasiswa_prodi'], 
            $data['survey_id']
        );
        $query->execute();
    
        return $query->insert_id;
    }
    

    public function getData()
    {
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getDataById($id)
    {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE responden_id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        return $query->get_result();
    }

}
?>