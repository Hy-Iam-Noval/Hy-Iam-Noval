<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_member', 'id_laundry'
    ];

    function listLaundry(){
        return $this->belongsTo(Laundry::class, 'id_laundry', 'id');
    }
}
