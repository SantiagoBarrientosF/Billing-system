<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable =  [
        'invoice_cod',
        'date',
        'due_date',
        'status',
        'payment_method',
        'total',
       
    ];


    protected $primaryKey = ['invoice_cod'];

    public function Invoice_customer()
    {
        return $this->hasmany(Product::class);
    }


}
