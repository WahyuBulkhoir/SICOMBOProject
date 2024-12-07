<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatePikrMember extends Model
{
    use HasFactory;
    
    protected $table = 'candidate_pikr_members';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'cv',
        'jenis_kelamin',
    ];
}
