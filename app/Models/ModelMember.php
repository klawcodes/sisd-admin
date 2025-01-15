<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMember extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'member_id';
    protected $allowedFields = ['member_username', 'member_password'];
    
    public function verifyLogin($username, $password)
    {
        // Debug: Print parameters
        echo "Debug Model - Checking credentials:<br>";
        echo "Username: " . $username . "<br>";
        echo "Password: " . $password . "<br>";
        
        $result = $this->where([
            'member_username' => $username,
            'member_password' => $password
        ])->first();
        
        // Debug: Print query
        echo "Debug Model - Query: " . $this->db->getLastQuery() . "<br>";
        echo "Debug Model - Result: <br>";
        var_dump($result);
        
        return $result;
    }
}