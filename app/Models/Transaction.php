<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Cart;

class Transaction extends Model
{
    protected $table='transaction';
    protected $primaryKey='id';
    protected $fillable=['id','email','total'];
}
