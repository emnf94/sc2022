<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelvrpt extends Model
{
    protected $table      = 'vrpt';


    public function cetakReport($tgla, $tglb)
    {
        return $this->table('vrpt')
            ->where('tglbayar >=', $tgla)
            ->where('tglbayar <=', $tglb)
            ->groupBy('reknorek')
            ->get();
    }
    public function cetakReportvb($tgla, $tglb)
    {
        return $this->table('vrpt')
            ->where('tglbayar >=', $tgla)
            ->where('tglbayar <=', $tglb)
            ->where('via', "Bendahara")
            ->groupBy('reknorek')
            ->get();
    }
}
