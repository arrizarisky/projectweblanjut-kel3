<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestockHistories extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'barang_id', 'jumlah'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    
}
