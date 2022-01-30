<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeltransaksi extends Model
{
    protected $table      = 'transaksih';
    protected $primaryKey = 'id';
    protected $allowedFields = ['via', 'tglbayar', 'jumlah', 'idrek'];
}
