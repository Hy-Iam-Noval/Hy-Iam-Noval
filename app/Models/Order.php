<?php

namespace App\Models;

use App\Models\Laundry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
    'laundry_id', 'user_order','total_order','cost', 'payment_completed'
    ];

    function DataOrdering()
    {
        return $this->belongsTo(Laundry::class, 'id_laundry', 'id');
    }
}
