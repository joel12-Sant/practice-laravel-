<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Client;
use App\Models\Product;
use App\Models\InvoiceItem;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InvoiceSeeder extends Seeder
{
    public function run()
    {
        $client = Client::first();
        $products = Product::all();

        $invoice = Invoice::create([
            'user_id' => $client->user_id,
            'client_id' => $client->id,
            'folio' => 'FOL-001',
            'date' => Carbon::now(),
            'subtotal' => 0,
            'tax' => 0,
            'total' => 0,
            'status' => 'draft',
        ]);

        $subtotal = 0;
        $taxTotal = 0;

        foreach ($products as $product) {
            $quantity = 2;
            $price = $product->price;
            $tax = ($price * $product->tax / 100) * $quantity;
            $total = ($price * $quantity) + $tax;

            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $price,
                'tax' => $tax,
                'total' => $total,
            ]);

            $subtotal += $price * $quantity;
            $taxTotal += $tax;
        }

        $invoice->update([
            'subtotal' => $subtotal,
            'tax' => $taxTotal,
            'total' => $subtotal + $taxTotal,
        ]);
    }
}

