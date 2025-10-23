<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'keterangan',
        'tanggal_selesai',
        'selesai',
    ];

    protected $casts = [
        'tanggal_selesai' => 'datetime',
        'selesai' => 'boolean',
    ];
}
