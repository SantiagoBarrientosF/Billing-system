<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =  [
        'product_id',
        'name',
        'price',
        'description',
    ];

    protected $primaryKey = ['product_id'];

    public function Customers(){
        return $this->BelongsToMany(Customer::class, 'customer_product');
    }

}
