<?php
namespace App\Models;
use CodeIgniter\Model;

class ModelProgram extends Model
{
    protected $table = 'tb_program';
    protected $primaryKey = 'id_program';
    protected $allowedFields = ['nama_program', 'deskripsi', 'target', 'terkumpul', 'status'];

    public function getProgram()
    {
        return $this->findAll();
    }

    public function saveProgram($data)
    {
        return $this->save($data);
    }

    public function hapusProgram($id)
    {
        return $this->delete($id);
    }
}