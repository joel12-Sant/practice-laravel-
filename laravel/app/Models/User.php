<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Un usuario tiene muchos clientes
    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    // Un usuario tiene muchos productos
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Un usuario tiene muchas facturas
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
