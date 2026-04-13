<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['tenSP', 'gia', 'anHien'];

    protected function casts(): array
    {
        return [
            'gia' => 'integer',
            'anHien' => 'boolean',
        ];
    }
}
