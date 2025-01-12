<?php
namespace App\Models;
use CodeIgniter\Model;

class ModelDonatur extends Model
{
    protected $table = 'tb_donatur';
    protected $primaryKey = 'no_donasi';
    protected $allowedFields = ['nm_donatur', 'tgl_donasi', 'id_program', 'jmlh_nominal', 'status'];

    public function getDonaturTerbaru()
    {
        return $this->select('tb_donatur.*, tb_program.nama_program')
                    ->join('tb_program', 'tb_program.id_program = tb_donatur.id_program')
                    ->orderBy('tgl_donasi', 'DESC')
                    ->limit(5)
                    ->find();
    }

    public function updateTotalTerkumpul($id_program)
    {
        // Hitung total donasi untuk program tersebut
        $total = $this->where('id_program', $id_program)
                     ->where('status', 1)
                     ->selectSum('jmlh_nominal', 'total')
                     ->get()
                     ->getRow()
                     ->total ?? 0;
        
        // Update kolom terkumpul di tb_program
        $this->db->table('tb_program')
                 ->where('id_program', $id_program)
                 ->update(['terkumpul' => $total]);
        
        return $total;
    }
}