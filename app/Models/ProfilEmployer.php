<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilEmployer extends Model
{
    use HasFactory;

    protected $table = 'profil_employer';

    protected $fillable = [
        'nom',
        // 'action',
    ];
}



