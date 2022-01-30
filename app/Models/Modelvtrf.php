<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelvtrf extends Model
{
    protected $table      = 'vtrf';


    public function cetakReport($tgla, $tglb)
    {
        return $this->table('vtg')
            ->where('tglbayar >=', $tgla)
            ->where('tglbayar <=', $tglb)

            ->get();
    }
}
