<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PikrMember extends Model
{
    use HasFactory;

    protected $table = 'pikr_members';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'jenis_kelamin',
    ];
}
