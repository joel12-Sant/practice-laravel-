<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_id', 'product_id', 'quantity', 'price', 'tax', 'total'];

    // Cada item pertenece a una factura
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    // Cada item pertenece a un producto
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
