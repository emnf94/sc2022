<?php

namespace App\Controllers;

use App\Models\Modelrekening;

class Rekening extends BaseController
{
    public function index()
    {
        return view('layout/rekening');
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'tampildatar' => $this->rek->findAll()
            ];
            $msg = [
                'data' => view('layout/tampildatarek', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('layout/modaltambah')
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
                'reknorek' => [
                    'label' => 'Nomor Rekening',
                    'rules' => 'required|is_unique[mrek.reknorek]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} Sudah ada'
                    ]
                ],
                'reknama' => [
                    'label' => 'Nama Rekening',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'reknorek' => $validation->getError('reknorek'),
                        'reknama' => $validation->getError('reknama')
                    ]
                ];
            } else {
                $simpandata = [
                    'reknorek' => $this->request->getVar('reknorek'),
                    'reknama' => $this->request->getVar('reknama'),
                ];

                $this->rek->insert($simpandata);
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
            $idrek = $this->request->getVar('idrek');

            $rek = new Modelrekening();
            $row = $this->rek->find($idrek);
            $data = [

                'idrek' => $row['idrek'],
                'reknorek' => $row['reknorek'],
                'reknama' => $row['reknama'],
            ];
            $msg = [
                'sukses' => view('layout/modaledit', $data)
            ];
            echo json_encode($msg);
        }
    }
    public function editdata()
    {
        if ($this->request->isAJAX()) {
            $simpandata = [
                'reknorek' => $this->request->getVar('reknorek'),
                'reknama' => $this->request->getVar('reknama'),
            ];

            $idrek = $this->request->getVar('idrek');
            $this->rek->update($idrek, $simpandata);
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

            $rekid = $this->request->getVar('idrek');
            $this->rek->delete($rekid);
            $msg = [
                'sukses' => 'Data rekening berhasil dihapus'
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }
}
