<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    protected $table = 'product';

    protected $fillable = [
        'product_name',
        'unit',
        'type',
        'information',
        'qty',
        'producer',
        'supplier_id',
    ];
}
