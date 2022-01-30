<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeltgt;
use App\Models\Modelvrpt;

class Rtg extends BaseController
{
    public function cetaktg()
    {
        $tgla = $this->request->getPost('tglatg');
        $tglb = $this->request->getPost('tglbtg');

        $modelvrpt = new Modeltgt();

        $dataLaporan = $modelvrpt->cetakReport($tgla, $tglb);

        $data = [
            'datalaporan' => $dataLaporan,

            'tgla' => $tgla,
            'tglb' => $tglb

        ];

        return view('report/cetaktg', $data);
    }
}
