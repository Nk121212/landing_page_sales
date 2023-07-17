<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProducts extends Model
{
    use HasFactory;

    protected $table = 'detail_products';

    protected $fillable = [
        'id_products',
        'photo_detail'
    ];
}
