<?php
namespace App\Models;
use CodeIgniter\Model;

class ModelDonatur extends Model
{
    protected $table = 'tb_donatur';
    protected $primaryKey = 'no_donasi';
    protected $allowedFields = ['nm_donatur', 'tgl_donasi', 'id_program', 'jmlh_nominal', 'status'];

    // Method untuk mendapatkan total donasi
    public function getTotalDonasi()
    {
        return $this->where('status', 1)
            ->selectSum('jmlh_nominal', 'total')
            ->get()
            ->getRow()
            ->total ?? 0;
    }

    // Method untuk mendapatkan total donatur - versi yang diperbaiki
    public function getTotalDonatur()
    {
        return $this->builder()
            ->countAll();
    }

    // Di ModelDonatur.php
    public function getDonaturTerbaru($page = 1)
    {
        $limit = 5; // jumlah data per halaman
        $offset = ($page - 1) * $limit;

        return $this->select('tb_donatur.*, tb_program.nama_program')
            ->join('tb_program', 'tb_program.id_program = tb_donatur.id_program')
            ->orderBy('tgl_donasi', 'DESC')
            ->limit($limit, $offset)
            ->get()
            ->getResultArray();
    }

    public function countAllDonasi()
    {
        return $this->countAllResults();
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

    public function getDonasiDetail($id)
    {
        return $this->select('tb_donatur.*, tb_program.nama_program')
            ->join('tb_program', 'tb_program.id_program = tb_donatur.id_program')
            ->where('tb_donatur.no_donasi', $id)
            ->first();
    }
}