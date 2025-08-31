<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'email', 'rfc', 'phone', 'address'];

    // Un cliente pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un cliente tiene muchas facturas
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}

