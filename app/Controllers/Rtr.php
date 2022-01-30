<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeltgt;
use App\Models\Modelvrpt;
use App\Models\Modelvtrf;

class Rtr extends BaseController
{
    public function cetaktr()
    {
        $tgla = $this->request->getPost('tglatr');
        $tglb = $this->request->getPost('tglbtr');

        $modelvrpt = new Modelvtrf();

        $dataLaporan = $modelvrpt->cetakReport($tgla, $tglb);

        $data = [
            'datalaporan' => $dataLaporan,

            'tgla' => $tgla,
            'tglb' => $tglb

        ];

        return view('report/cetaktr', $data);
    }
}
