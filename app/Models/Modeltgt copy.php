<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeltgt extends Model
{
           public function getSiswa()
    { 
        return $this->db->table('target')
            ->join('mrek', 'mrek.reknorek=target.rekid')

            ->get()->getResultArray();
    }
}
