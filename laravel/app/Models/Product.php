<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'description', 'price', 'tax'];

    // Un producto pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un producto puede estar en muchos items de factura
    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}

