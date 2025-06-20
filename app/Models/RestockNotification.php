<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestockNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'user_id',
        'is_read',
    ];

}
