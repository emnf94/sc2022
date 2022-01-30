<?php

namespace App\Controllers;

use App\Models\Modeltarget;
use App\Models\Modelrekening;
use App\Models\Modeltgt;

class Datatarget extends BaseController
{
    public function index()
    {
        return view('datatg/target');
    }
    public function ambildata()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'tampildatag' => $this->vtg->findAll()
            ];
            $msg = [
                'data' => view('datatg/tampildatatarget', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }
    public function ambildatarek()
    {
        $category_id = $this->input->post('id', TRUE);
        $data = $this->tg->find($category_id);
        echo json_encode($data);
    }
    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $rek = new Modelrekening();
            $tg = new Modeltarget();
            $data = [
                'tampildata' => $rek->findAll(),

            ];

            $msg = [
                'data' => view('datatg/modaltambah', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }
    public function simpandata()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([

                'target' => [
                    'label' => 'Target',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tgtglawal' => [
                    'label' => 'tanggal awal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Silahkan pilih {field}'
                    ]
                ],
                'tgtglakhir' => [
                    'label' => 'tanggal akhir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Silahkan pilih {field}'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'rekid' => $validation->getError('rekid'),
                        'target' => $validation->getError('target'),
                        'tgtglawal' => $validation->getError('tgtglawal'),
                        'tgtglakhir' => $validation->getError('tgtglakhir')
                    ]
                ];
            } else {
                $simpandata = [
                    'idrek' => $this->request->getVar('rekid'),
                    'target' => $this->request->getVar('target'),
                    'tgtglawal' => $this->request->getVar('tgtglawal'),
                    'tgtglakhir' => $this->request->getVar('tgtglakhir')
                ];

                $this->tg->insert($simpandata);
                $msg = [
                    'sukses' => 'Data rekening berhasil tersimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }
    public function formedit()
    {
        if ($this->request->isAJAX()) {
            $tgid = $this->request->getVar('tgid');


            $row = $this->tg->find($tgid);
            $data = [
                'tgid' => $row['tgid'],
                'target' => $row['target'],
                'tgtglawal' => $row['tgtglawal'],
                'tgtglakhir' => $row['tgtglakhir'],

            ];
            $msg = [
                'sukses' => view('datatg/modaledit', $data)
            ];
            echo json_encode($msg);
        }
    }
    public function editdata()
    {
        if ($this->request->isAJAX()) {
            $simpandata = [

                'target' => $this->request->getVar('target'),
                'tgtglawal' => $this->request->getVar('tgtglawal'),
                'tgtglakhir' => $this->request->getVar('tgtglakhir'),

            ];

            $tgid = $this->request->getVar('tgid');
            $this->tg->update($tgid, $simpandata);
            $msg = [
                'sukses' => 'Data rekening berhasil diupdate'
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }
    public function hapus()
    {
        if ($this->request->isAJAX()) {

            $tgid = $this->request->getVar('tgid');
            $this->tg->delete($tgid);
            $msg = [
                'sukses' => 'Data rekening berhasil dihapus'
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }
    public function cetak()
    {
        if ($this->request->isAJAX()) {



            $row = $this->tg->findAll();
            $data = [

                'tgtglawal' => $row['tgtglawal'],
                'tgtglakhir' => $row['tgtglakhir'],

            ];
            $msg = [
                'sukses' => view('datatg/modalcetak', $data)
            ];
            echo json_encode($msg);
        }
    }
    public function tgcetak()
    {
    }
}
