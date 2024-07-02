<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'location', 'guests', 'arrivals', 'leaving', 'helper', 'status', 'user_id'
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

