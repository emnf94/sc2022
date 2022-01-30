<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeltarget extends Model
{
    protected $table      = 'tg';
    protected $primaryKey = 'tgid';
    protected $allowedFields = ['idrek', 'target', 'tgtglawal', 'tgtglakhir'];
}
