<?php
namespace App\Models;
use CodeIgniter\Model;

class ModelProgram extends Model
{
    protected $table = 'tb_program';
    protected $primaryKey = 'id_program';
    protected $allowedFields = ['nama_program', 'deskripsi', 'target', 'terkumpul', 'status'];

    // Method yang sudah ada
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

    // Method baru untuk menghitung total program aktif
    public function getTotalProgramAktif()
    {
        return $this->builder()
                    ->countAll();
    }

    // Method baru untuk menghitung total target penyaluran
    public function getTotalPenyaluran()
    {
        return $this->selectSum('target', 'total')
                    ->get()
                    ->getRow()
                    ->total ?? 0;
    }
}