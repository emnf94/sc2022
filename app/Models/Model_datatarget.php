<?php

namespace App\Models;

use CodeIgniter\Model;

class Models_datatarget extends Model
{

    public function getTarget()
    {
        return $this->db->table('target')
            ->join('mrek', 'mrek.reknorek=target.rekid')

            ->get()->getResultArray();
    }
}
