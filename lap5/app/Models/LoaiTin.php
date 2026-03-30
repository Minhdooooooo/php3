<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    protected $table = 'loaitin';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'tenLoai',
        'slug',
    ];
}
