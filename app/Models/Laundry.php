<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laundry extends Model
{
    use HasFactory;

    protected $table = 'laundry';
    protected $fillable = ['name','description','id_owner', 'img'];

    function member(){
        return $this->hasMany(Member::class, 'id_laundry', 'id');
    }

    function ordering()
    {
        return $this->hasMany(Order::class, 'id_laundry', 'id');
    }

    function owner()
    {
        return $this->belongsTo(User::class, 'id_owner', 'id');
    }
}
