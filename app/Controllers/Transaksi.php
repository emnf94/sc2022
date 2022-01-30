<?php

namespace App\Controllers;

use App\Models\Modeltarget;
use App\Models\Modelrekening;
use App\Models\Modeltransaksi;

class Transaksi extends BaseController
{
    public function index()
    {
        return view('transaksi/transaksi');
    }
    public function ambildata()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'tampildata' => $this->vtr->findAll()
            ];
            $msg = [
                'data' => view('transaksi/tampildatatrf', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }
    public function formtransaksi()
    {
        if ($this->request->isAJAX()) {
            $rek = new Modelrekening();
            $tg = new Modeltarget();
            $data = [
                'tampildata' => $rek->findAll(),

            ];

            $msg = [
                'data' => view('transaksi/modaltransaksi', $data)
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

                'jmlbayar' => [
                    'label' => 'Harus Diisi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tidak boleh kosong!'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [

                        'jmlbayar' => $validation->getError('jmlbayar')
                    ]
                ];
            } else {
                $simpandata = [
                    'via' => $this->request->getVar('via'),
                    'jumlah' => $this->request->getVar('jmlbayar'),
                    'tglbayar' => $this->request->getVar('tglbayar'),
                    'idrek' => $this->request->getVar('idrek')
                ];

                $this->trf->insert($simpandata);
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
            $id = $this->request->getVar('id');


            $row = $this->trf->find($id);
            $data = [
                'id' => $row['id'],
                'tglbayar' => $row['tglbayar'],
                'via' => $row['via'],
                'jumlah' => $row['jumlah']

            ];
            $msg = [
                'sukses' => view('transaksi/modaledit', $data)
            ];
            echo json_encode($msg);
        }
    }
    public function editdata()
    {
        if ($this->request->isAJAX()) {
            $simpandata = [

                'via' => $this->request->getVar('via2'),
                'tglbayar' => $this->request->getVar('tglbayar'),
                'jumlah' => $this->request->getVar('jumlah'),

            ];

            $id = $this->request->getVar('id');
            $this->trf->update($id, $simpandata);
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

            $id = $this->request->getVar('id');
            $this->trf->delete($id);
            $msg = [
                'sukses' => 'Data rekening berhasil dihapus'
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }
}
