<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;

    protected $table = 'loaisanphams';

    protected $fillable = ['tenLoai', 'moTa', 'anHien'];

    protected function casts(): array
    {
        return [
            'anHien' => 'boolean',
        ];
    }
}
