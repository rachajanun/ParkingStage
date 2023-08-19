<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table="payments";
    protected $fillable=["id","transaction_id","amount","paid_at","status",];
    public $timestamps=false;
}
