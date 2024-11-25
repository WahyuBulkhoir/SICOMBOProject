<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory;

    use Sluggable;

    protected $fillable = [
        'title', 'description', 'price', 'quantity', 'category', 'image', 'seller_id',
    ];

    public function Sluggable():array
    {

        return
        [
            'slug'=>
            [
                'source'=>'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
