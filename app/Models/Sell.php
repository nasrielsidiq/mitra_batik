<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function paymet(){
        return $this->belongsTo(PaymentType::class,'id_payment_type', 'id');
    }
}
