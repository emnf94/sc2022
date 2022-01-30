<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelrekening extends Model
{
    protected $table      = 'mrek';
    protected $primaryKey = 'idrek';
    protected $allowedFields = ['reknorek', 'reknama'];
}
