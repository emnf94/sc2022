<?php

namespace App\Controllers;

class Layout extends BaseController
{
    public function index()
    {
        return view('layout/beranda');
    }
    public function indexx()
    {
        return view('layout/beranda2');
    }
}
