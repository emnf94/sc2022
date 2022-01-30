<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeltgt;
use App\Models\Modelvrpt;

class Report extends BaseController
{
    public function index()
    {
        return view('report/cetakreport');
    }
    public function cetakr()
    {
        $tgla = $this->request->getPost('tgla');
        $tglb = $this->request->getPost('tglb');

        $modelvrpt = new Modelvrpt();

        $dataLaporan = $modelvrpt->cetakReport($tgla, $tglb);
        $dataB = $modelvrpt->cetakReportvb($tgla, $tglb);

        $data = [
            'datalaporan' => $dataLaporan,
            'datab' => $dataB,

            'tgla' => $tgla,
            'tglb' => $tglb

        ];

        return view('report/cetakre', $data);
    }
}
