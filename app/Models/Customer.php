<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Customer extends Model
{
    protected $table ='customer';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable =  [
        'dni',
        'name',
        'last_name',
        'email',
        'contact_phone',
        'address',
    ];


    protected $primaryKey = ['dni'];

    public function Products(){
        return $this->BelongsToMany(Product::class, 'customer_product');
    }
}
