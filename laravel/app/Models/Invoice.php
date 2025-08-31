<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'client_id', 'folio', 'date', 'subtotal', 'tax', 'total', 'status'];

    // Factura pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Factura pertenece a un cliente
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Factura tiene muchos items
    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
