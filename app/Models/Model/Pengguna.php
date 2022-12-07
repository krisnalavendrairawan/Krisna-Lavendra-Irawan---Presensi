<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';
    const CREATED_AT = null;
    const UPDATE_AT = null;
    protected $primaryKey = 'nip';
}
