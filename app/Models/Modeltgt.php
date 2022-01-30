<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeltgt extends Model
{
    protected $table      = 'vtg';
    protected $allowedFields = ['tgid', 'target', 'tgtglawal', 'tgtglakhir,reknama,reknorek'];

    public function cetakReport($tgla, $tglb)
    {
        return $this->table('vtg')
            ->where('tgtglawal >=', $tgla)
            ->where('tgtglakhir <=', $tglb)

            ->get();
    }
}
